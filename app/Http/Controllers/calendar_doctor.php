<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\CitaPaciente;
use App\Models\HistorialPaciente;
use App\Notifications\NuevaCitaPaciente; 
use App\Notifications\NuevaCitaPacienteMail; 
use App\Models\MedicoPaciente;
use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Medico;
use App\Models\Nota;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class calendar_doctor extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'message' => 'No autenticado',
                'status' => 401
            ], 401);
        }

        $medico = $user->medico;
        if (!$medico) {
            return response()->json([
                'message' => 'El usuario no tiene un médico asociado',
                'status' => 404
            ], 404);
        }
        $citas = Cita::where('id_medico', $medico->id)
            ->with('paciente:id,nombre_paciente,email_paciente,tlf_paciente,edad,peso,estatura', 'historiales.notas', 'historiales.archivos')
            ->get();
        return response()->json([
            'dato' => $citas,
            'status' => 200
        ]);
    }

    public function fetchDoctorAppointments($id)
    {
        $medico = Medico::find($id);
        if (!$medico) {
            return response()->json([
                'message' => 'Médico no encontrado',
                'status' => 404
            ], 404);
        }
        $citas = Cita::where('id_medico', $medico->id)
            ->with('paciente:id,nombre_paciente,email_paciente,tlf_paciente,edad,peso,estatura', 'historiales.notas', 'historiales.archivos')
            ->get();
        return response()->json([
            'dato' => $citas,
            'status' => 200
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Medico $medico, User $user, Request $request)
    {
        return view('prove_fetch', compact('medico', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        if (!$user) {
            return response()->json([
                'message' => 'No autenticado',
                'status' => 401
            ], 401);
        }
        $medico = $user->medico;
        if (!$medico) {
            return response()->json([
                'message' => 'El usuario no tiene un médico asociado',
                'status' => 404
            ], 404);
        }
        $request->validate([
            'name' => 'required',
            'color' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);
        $cita = new Cita;
        $cita->name = $request->name;
        $cita->color = $request->color;
        $cita->start = $request->start;
        $cita->end = $request->end;
        $cita->id_medico = $medico->id;
        $cita->estado = 1;
        $cita->save();
        $result = [
            'data' => $cita,
            'code' => 200,
            'message' => 'Appointment made successfully!',
        ];
        return response()->json($result);
    }

    public function update(Request $request){

        $validatedData = $request->validate([
            'id_paciente' => 'integer|required|exists:pacientes,id',
            'motivo_consulta' => 'string',
            'sintomas' => 'string|nullable',
            'name' => 'nullable',
            'color' =>'nullable',
            'start' =>'nullable',
            'end' => 'nullable',
            'medico' => 'nullable',
            'newTypeAppointment' => 'string|required'
        ]);

        $paciente = Paciente::find($request->id_paciente);
        if (!$paciente) {
            return response()->json([
                'error' => 'Patient not found.',
                'code' => 404
            ]);
        }

            $cita = new Cita;        
            $cita->id_paciente = $validatedData['id_paciente'];
            $cita->motivo_consulta = $validatedData['motivo_consulta'];
            $cita->sintomas = $validatedData['sintomas'];
            $cita->estado = 2;
            $cita->name = $validatedData['name'];
            $cita->color = $validatedData['color'];
            $cita->start = $validatedData['start'];
            $cita->end = $validatedData['end'];
            $cita->id_medico = $validatedData['medico'];
            $cita->estado_cita = 'pendiente';
            $cita->tipo = $validatedData['newTypeAppointment'];
            $cita->save();

            $historial = new HistorialPaciente;
            $historial->id_paciente = $validatedData['id_paciente'];
            $historial->id_cita = $cita->id;
            $historial->save();


            // Guardar en la tabla de Medico Paciente
            $medico_paciente = new MedicoPaciente;
            $medico_paciente->medico_id = $validatedData['medico'];
            $medico_paciente->paciente_id = $validatedData['id_paciente'];
            $medico_paciente->origen = 'medico';
            $medico_paciente->visible = 1;
            $medico_paciente->save();

            // Enviar la notificación al médico
            $paciente_mail = Paciente::findOrFail($validatedData['id_paciente']);
            $paciente_mail->notify(new NuevaCitaPacienteMail($paciente_mail, $cita));    
        if ($cita) {
            return response()->json([
                'data' => $cita,
                'code' => 200,
                'message' => 'Appointment updated successfully!',
            ]);
        } else {
            return response()->json([
                'error' => 'Appointment not found.',
                'code' => 404
            ]);
        }

    }

  public function patientAppointed(Request $request)
    {
    \Log::info($request);
    $validatedData = $request->validate([
        // 'id_cita' => 'integer|required|exists:citas,id',
        'nombre' => 'string|required',
        'telefono' => 'string|required',
        'email' => 'string|required|email',
        'edad' => 'integer|required|min:1|max:150',
        'peso' => 'string|required',
        'estatura' => 'required|numeric|min:0.5|max:3',
        'motivo_consulta' => 'string|required',
        'sintomas' => 'string|nullable',
        'newTypeAppointment' => 'string|required',
        //'id_medico' => 'integer|required'
    ]);

    // Guardar en la tabla de Pacientes
    $paciente = new Paciente;
    $paciente->nombre_paciente = $validatedData['nombre'];
    $paciente->tlf_paciente = $validatedData['telefono'];
    $paciente->email_paciente = $validatedData['email'];
    $paciente->edad = $validatedData['edad'];
    $paciente->peso = $validatedData['peso'];
    $paciente->estatura = $validatedData['estatura'];
    $paciente->user_id = auth()->user()->id;
    $paciente->save();

    // Guardar en la tabla de Citas
    $cita = new CitaPaciente;
    $cita->id_paciente = $paciente->id;
    $cita->id_medico = $request->id_medico;
    $cita->motivo_consulta = $request->motivo_consulta;
    $cita->sintomas = $request->sintomas;
    $cita->estado = 2;
    $cita->estado_cita = 'pendiente';
    $cita->tipo = $request->newTypeAppointment;
    $cita->save();

    // Guardar en la tabla de Historial de Pacientes
    //$historial = new HistorialPaciente;
    //$historial->id_paciente = $paciente->id;
    //$historial->id_cita = $cita->id;
    //$historial->save();

    // Guardar en la tabla de Medico Paciente
    $medico_paciente = new MedicoPaciente;
    $medico_paciente->medico_id = $request->id_medico;
    $medico_paciente->paciente_id = $paciente->id;
    $medico_paciente->origen = 'paciente';
    $medico_paciente->visible = 0;
    $medico_paciente->save();

    // Enviar la notificación al médico
    $medico = Medico::findOrFail($request->id_medico);
    $medico->notify(new NuevaCitaPaciente($paciente, $cita));

    // Retornar una única respuesta JSON con todos los datos guardados
    return response()->json([
        'paciente' => $paciente,
        'cita' => $cita,
       // 'historial' => $historial,
        'medico_paciente' => $medico_paciente,
        'code' => 200, // Usualmente se usa 201 para indicar que se ha creado un nuevo recurso
        'message' => 'Datos del paciente y cita, guardados exitosamente! El médico agendará la fecha',
    ]);
    }

     public function patientNewAppointed(Request $request)
    {
    \Log::info($request);
    $validatedData = $request->validate([
        'motivo_consulta' => 'string|required',
        'sintomas' => 'string|nullable',
        'newTypeAppointment' => 'string|required',
    ]);

    // Guardar en la tabla de Citas
    $cita = new CitaPaciente;
    $cita->id_paciente = $request->id_paciente;
    $cita->id_medico = $request->id_medico;
    $cita->motivo_consulta = $validatedData['motivo_consulta'];
    $cita->sintomas = $validatedData['sintomas'];
    $cita->estado = 2;
    $cita->estado_cita = 'pendiente';
    $cita->tipo = $validatedData['newTypeAppointment'];
    $cita->save();

    // Guardar en la tabla de Historial de Pacientes
    // $historial = new HistorialPaciente;
    // $historial->id_paciente = $request->id_medico;
    // $historial->id_cita = $cita->id;
    // $historial->save();

    // Guardar en la tabla de Medico Paciente
    $medico_paciente = new MedicoPaciente;
    $medico_paciente->medico_id = $request->id_medico;
    $medico_paciente->paciente_id = $request->id_paciente;

    $medico_paciente->origen = 'paciente';
    $medico_paciente->visible = 0;
    $medico_paciente->save();

    // Enviar la notificación al médico
    $paciente = Paciente::where('id',$request->id_paciente)->first();
    $medico = Medico::findOrFail($request->id_medico);
    $medico->notify(new NuevaCitaPaciente($paciente, $cita));

    // Retornar una única respuesta JSON con todos los datos guardados
    return response()->json([
        //'paciente' => $paciente,
        'cita' => $cita,
        //'historial' => $historial,
        'medico_paciente' => $medico_paciente,
        'code' => 201, // Usualmente se usa 201 para indicar que se ha creado un nuevo recurso
        'message' => 'Datos del paciente, cita, historial y médico-paciente guardados exitosamente!',
    ]);
    }

    public function update_time(Request $request, $id)
    {
        $validatedData = $request->validate([
            'start' => 'required',
            'end' => 'required',
        ]);
        $cita = Cita::find($id);
        if (!$cita) {
            return response()->json([
                'error' => 'Appointment not found.',
                'code' => 404
            ]);
        }
        $cita->start = $validatedData['start'];
        $cita->end = $validatedData['end'];
        $cita->save();
        return response()->json([
            'data' => $cita,
            'code' => 200,
            'message' => 'Appointment updated successfully!',
        ]);
    }

    public function finish(Request $request, $id)
    {
        $validatedData = $request->validate([
            'sintomas' => 'string|nullable',
            'diagnostico' => 'string|required',
            'tratamiento' => 'string|required',
            'examen_fisico' => 'string|nullable',
            'examen_funcional' => 'string|nullable',
            'examen_paraclinico' => 'string|nullable',
            'conclusion' => 'string|nullable',
        ]);
        $historial = HistorialPaciente::find($id);
        if (!$historial) {
            return response()->json([
                'error' => 'History not found.',
                'code' => 404
            ]);
        }
        $cita = Cita::find($historial->id_cita);
        $cita->sintomas = $validatedData['sintomas'];
        $cita->estado = 3;
        $cita->save();
        $historial->diagnostico = $validatedData['diagnostico'];
        $historial->tratamiento = $validatedData['tratamiento'];
        $historial->examen_fisico = $validatedData['examen_fisico'] ?? null;
        $historial->examen_funcional = $validatedData['examen_funcional'] ?? null;
        $historial->examen_paraclinico = $validatedData['examen_paraclinico'] ?? null;
        $historial->conclusiones = $validatedData['conclusion'] ?? null;
        $historial->save();
        return response()->json([
            'data' => $cita,
            'code' => 200,
            'message' => 'Appointment finished successfully!',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
       $patient = Paciente::where('user_id',auth()->user()->id)->first();
       if($patient){
        $ma = "si";
       }else{
        $ma = "no";
       }
        return view('calendar', compact('medico','ma'));
    }

     public function showEdit($medico)
          {        

             return view('medicalProfileEditFormComponent');
          }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function paciente_data(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'color' => 'required',
            'nombre_paciente' => 'required',
            'tlf_paciente' => 'required|numeric',
            'email_paciente' => 'required',
            'edad' => 'required',
            'peso' => 'required',
            'estatura' => 'required',
            'paciente' => 'required',
            'id_calendario' => 'required',
            'motivo_consulta' => 'string',
        ], [
            'tlf_paciente.numeric' => 'Campo tlf debe ser numerico'
        ]);

        if ($validatedData) {
            $name = $request->name;
            $color = $request->color;
            $nombre_paciente = $request->nombre_paciente;
            $tlf_paciente = $request->tlf_paciente;
            $email_paciente = $request->email_paciente;
            $edad = $request->edad;
            $peso = $request->peso;
            $estatura = $request->estatura;
            $paciente = $request->paciente;
            $id_calendario = $request->id_calendario;
            $motivo_consulta = $request->motivo_consulta;
            $enfermedades = $request->enfermedades;

            $calendar = Paciente::find($id_calendario);
            $calendar->name = $name;
            $calendar->color = $color;
            $calendar->nombre_paciente = $nombre_paciente;
            $calendar->tlf_paciente = $tlf_paciente;
            $calendar->email_paciente = $email_paciente;
            $calendar->edad = $edad;
            $calendar->peso = $peso;
            $calendar->estatura = $estatura;
            $calendar->paciente = $paciente;
            $calendar->motivo_consulta = $motivo_consulta;
            $calendar->enfermedades = $enfermedades;
            $calendar->save();

            $result = [
                'data' => $calendar,
                'code' => 200,
                'message' => 'inserted user successfully!',
            ];
            return response()->json($result);
        }
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function redirected()
    {
        return view('lista_medico');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {
            $cita = Cita::find($id)->delete();
            $result = [
                'code' => 200,
                'message' => 'deleted user successfully!',
            ];
            return response()->json($result);
        }
    }

    //Notas
    public function notes_create(Request $request)
    {
        $validatedData = $request->validate([
            'id_historial' => 'integer|required|exists:historial_clinico,id',
            'contenido' => 'string|required'
        ]);
        $historial = HistorialPaciente::find($validatedData['id_historial']);
        if (!$historial) {
            return response()->json([
                'message' => 'No se ha encontrado un historial al qué asociar la nota.',
                'status' => 404
            ], 404);
        }
        $note = new Nota;
        $note->id_historial = $validatedData['id_historial'];
        $note->contenido = $validatedData['contenido'];
        $note->save();
        $result = [
            'data' => $note,
            'code' => 200,
            'message' => 'Note created successfully!'
        ];
        return response()->json($result, 200);
    }

    public function notes_delete($id)
    {
        $note = Nota::find($id);
        if ($note) {
            $note->delete();
            $result = [
                'code' => 200,
                'message' => 'Note deleted successfully!.',
            ];
        } else {
            $result = [
                'error' => 'Note not found.',
                'code' => 404,
            ];
        }
        return response()->json($result);
    }

    public function notes_update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'contenido' => 'required|string',
        ]);
        $note = Nota::find($id);
        if ($note) {
            $note->contenido = $validatedData['contenido'];
            $note->save();
            return response()->json([
                'data' => $note,
                'code' => 200,
                'message' => 'Note updated successfully!.',
            ]);
        } else {
            return response()->json([
                'error' => 'Note not found.',
                'code' => 404
            ]);
        }
    }

    //Pacientes
    public function pacientesIndex(Medico $medico, User $user, Request $request)
    {
        return view('pacientesIndex', compact('medico', 'user'));
    }

    public function pacientesList()
    {
        $pacientes = Paciente::all();
        return response()->json([
            'dato' => $pacientes,
            'status' => 200
        ]);
    }

    public function pacientesCreate(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'string|required',
            'telefono' => 'integer|required',
            'email' => 'string|required|email',
            'edad' => 'integer|required|min:1|max:150',
            'peso' => 'string|required',
            'estatura' => 'required|numeric|min:0.5|max:3',
        ]);
        $paciente = new Paciente;
        $paciente->nombre_paciente = $validatedData['nombre'];
        $paciente->tlf_paciente = $validatedData['telefono'];
        $paciente->email_paciente = $validatedData['email'];
        $paciente->edad = $validatedData['edad'];
        $paciente->peso = $validatedData['peso'];
        $paciente->estatura = $validatedData['estatura'];
        $paciente->save();
        $result = [
            'data' => $paciente,
            'code' => 200,
            'message' => 'Patient created successfully!'
        ];
        return response()->json($result, 200);
    }

    public function pacientesUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nombre' => 'string|required',
            'telefono' => 'integer|required',
            'email' => 'string|required|email',
            'edad' => 'integer|required|min:1|max:150',
            'peso' => 'string|required',
            'estatura' => 'required|numeric|min:0.5|max:3',
        ]);
        $paciente = Paciente::find($id);
        if (!$paciente) {
            return response()->json(['message' => 'Patient not found!'], 404);
        }
        $paciente->nombre_paciente = $validatedData['nombre'];
        $paciente->tlf_paciente = $validatedData['telefono'];
        $paciente->email_paciente = $validatedData['email'];
        $paciente->edad = $validatedData['edad'];
        $paciente->peso = $validatedData['peso'];
        $paciente->estatura = $validatedData['estatura'];
        $paciente->save();
        $result = [
            'data' => $paciente,
            'code' => 200,
            'message' => 'Patient updated successfully!'
        ];

        return response()->json($result, 200);
    }

    //medicalProfileForm
    public function medicalProfileForm()
    {
        return view('medicalProfileFormComponent');
    }

            //companyProfileForm
    public function companyProfileForm()
    {
        return view('companyProfileFormComponent');
    }


    //Historial
    public function historyIndex()
    {
        $historiales = HistorialPaciente::all();
        return response()->json([
            'dato' => $historiales,
            'status' => 200
        ]);
    }




    public function historyPatient($id)
    {
        $historiales = HistorialPaciente::where('id_paciente', $id)->with(['notas', 'archivos', 'cita', 'cita.medico'])->get();
        if ($historiales->isEmpty()) {
            return response()->json([
                'message' => 'No se encontraron historiales para este paciente.',
                'status' => 404
            ]);
        }
        return response()->json([
            'dato' => $historiales,
            'status' => 200
        ]);
    }

    public function historyPatientUpdate(Request $request, $id)
    {
        $validatedData = $request->validate([
            'motivo' => 'string|nullable',
            'sintomas' => 'string|nullable',
            'diagnostico' => 'string|required',
            'tratamiento' => 'string|required',
            'examen_fisico' => 'string|nullable',
            'examen_funcional' => 'string|nullable',
            'examen_paraclinico' => 'string|nullable',
            'conclusion' => 'string|nullable',
        ]);
        $historial = HistorialPaciente::find($id);
        if (!$historial) {
            return response()->json([
                'message' => 'History not found.',
                'status' => 404
            ]);
        }
        $historial->load(['notas', 'archivos', 'cita', 'cita.medico']);
        $cita = Cita::find($historial->id_cita);
        if (!$cita) {
            return response()->json([
                'message' => 'Appointment not found.',
                'status' => 404
            ]);
        }
        $cita->sintomas = $validatedData["sintomas"];
        $cita->motivo_consulta = $validatedData["motivo"];
        $cita->save();

        $historial->diagnostico = $validatedData['diagnostico'];
        $historial->tratamiento = $validatedData['tratamiento'];
        $historial->examen_fisico = $validatedData['examen_fisico'] ?? null;
        $historial->examen_funcional = $validatedData['examen_funcional'] ?? null;
        $historial->examen_paraclinico = $validatedData['examen_paraclinico'] ?? null;
        $historial->conclusiones = $validatedData['conclusion'] ?? null;
        $historial->save();

        return response()->json([
            'message' => 'History Updated Successfully.',
            'dato' => $historial,
            'code' => 200
        ]);
    }
    public function uploadLogo(Request $request, $id)
    {
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $user = Medico::findOrFail($id);
        if ($user->logo) {
            Storage::delete($user->logo);
        }
        $file = $request->file('logo');
        $originalFilename = $file->getClientOriginalName();
        $path = $file->storeAs('logos', $originalFilename, 'public');
        $user->logo = $path;
        $user->save();
        return response()->json([
            'message' => 'Logo actualizado con éxito.',
            'logo_path' => $path,
            'original_filename' => $originalFilename
        ], 200);
    }
    public function deleteLogo($id)
    {
        $user = Medico::findOrFail($id);
        if ($user->logo) {
            Storage::delete($user->logo);
            $user->logo = null;
            $user->save();
            return response()->json([
                'message' => 'Logo eliminado con éxito.'
            ], 200);
        } else {
            return response()->json([
                'message' => 'No hay logo para eliminar.'
            ], 404);
        }
    }

    public function editPatient(Request $request){

        $paciente = Paciente::find($request->id_paciente);
        \Log::info($paciente);
        $paciente->nombre_paciente = $request->nombre;
        $paciente->tlf_paciente = $request->telefono;
        $paciente->email_paciente = $request->email;
        $paciente->edad = $request->edad;
        $paciente->peso = $request->peso;
        $paciente->estatura = $request->estatura;
        $paciente->save();

        return response()->json([
            'paciente' => $paciente,
            'code' => 200,
            'message' => 'Paciente Actualizado'
        ]);

    }
}
