<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;
use App\Models\Medico;
use App\Models\Pais;
use App\Models\Factura;
use App\Models\Estado;
use App\Rules\ReCaptcha;
use App\Models\Municipio;
use App\Models\Parroquia;
use Illuminate\Http\Request;
use App\Models\Especialidades;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;

class perfil_medico extends Controller
{
    //
    public function __construct(){
    $this->middleware('auth');
    }

 public function showEditView($medico) {
    $medico_id = Medico::where('user_id',$medico)->first();
    $doctor_id = $medico_id->id;
    return view('medicalProfileEditFormComponent', [
        'medico' => $medico, 
        'doctor_id' => $doctor_id
    ]);
}
   public function showEdit($medico)
    {  
         $medicoData = Medico::with(['pais', 'estado', 'ciudad', 'especialidad'])
        ->where('user_id', $medico)
        ->firstOrFail();

    // Forzar la desencriptación para la respuesta JSON
    $decryptedData = $this->decryptModel($medicoData);

    return response()->json([
        'data' => $decryptedData,
        'pais_id' => $medicoData->pais_id,
        'estado_id' => $medicoData->estado_id,
        'ciudad_id' => $medicoData->ciudad_id,
        'especialidad_id' => $medicoData->especialidad_id
    ]);
    }

       // Añadir este método al controlador
    private function decryptModel(Medico $model)
    {
        $encryptedFields = $model->getEncryptedFields();
        $decrypted = $model->toArray();
        
        foreach ($encryptedFields as $field) {
            if (isset($decrypted[$field])) {
                try {
                    $decrypted[$field] = Crypt::decryptString($decrypted[$field]);
                } catch (\Exception $e) {
                    $decrypted[$field] = null;
                }
            }
        }
        
        return $decrypted;
    }

    public function update(Request $request, $medico) {
    \Log::info('Datos recibidos:', $request->all());
    
    $doctor = Medico::findOrFail($medico);
    $data = $request->all();

    // 1. Procesar Foto
    if (!empty($data['foto'])) {
        $this->eliminarArchivoAntiguo($doctor->foto);
        
        // Guardar en public_html/imagen
        $nombreFoto = 'img_' . time() . '_' . $data['foto_name'];
        $rutaRelativa = 'imagen/' . $nombreFoto;
        Storage::disk('public')->put($rutaRelativa, base64_decode($data['foto']));
        $doctor->foto = $rutaRelativa;
    }

    // 2. Procesar Título
    if (!empty($data['titulo_file'])) {
        $this->eliminarArchivoAntiguo($doctor->name_temp);
        
        // Guardar en public_html/medicos/titulos
        $nombreTitulo = 'titulo_' . time() . '_' . $data['titulo_name'];
        $rutaRelativa = 'medicos/titulos/' . $nombreTitulo;
        Storage::disk('public')->put($rutaRelativa, base64_decode($data['titulo_file']));
        
        $doctor->name_original = $data['titulo_name'];
        $doctor->name_temp = $nombreTitulo;
        $doctor->route = $rutaRelativa;
    }

    // 3. Actualizar otros campos (sin encriptación)
    $doctor->update([
        'nombre' => $data['nombre'],
        'apellido' => $data['apellido'],
        'sexo' => $data['sexo'], // Campo sin encriptar
        'telefono' => $data['telefono'], // Campo sin encriptar
        'whatsapp' => $data['whatsapp'], // Campo sin encriptar
        // ... otros campos
    ]);

    return response()->json($doctor);
}

private function eliminarArchivoAntiguo($ruta) {
    if ($ruta && Storage::disk('public')->exists($ruta)) {
        Storage::disk('public')->delete($ruta);
    }
}

  /*  public function update(Request $request, $medico) {
    \Log::info('Datos:', $request->all()); // Debe mostrar datos ahora  
    $doctor = Medico::findOrFail($medico);
    $data = $request->all();

    // 1. Procesar Foto
    if (!empty($data['foto'])) {
        $this->eliminarArchivoAntiguo($doctor->foto_path);
        
        $nombreFoto = $data['foto_name'];
        $rutaFoto = 'imagen/' . uniqid() . '_' . $nombreFoto;
        Storage::put($rutaFoto, base64_decode($data['foto']));
        $doctor->foto = $rutaFoto;
    }

    // 2. Procesar Título
    if (!empty($data['titulo_file'])) {
        $this->eliminarArchivoAntiguo($doctor->titulo_path);
        
        $nombreTitulo = $data['titulo_name'];
        $rutaTitulo = 'medicos/titulos/' . uniqid() . '_' . $nombreTitulo;
        Storage::put($rutaTitulo, base64_decode($data['titulo_file']));
        $doctor->name_original = $nombreTitulo;
        $doctor->name_temp = $nombreTitulo;
        $doctor->route = $rutaTitulo;

            }

    // 3. Actualizar otros campos
    $doctor->update($request->except(['foto', 'titulo_file', 'foto_name', 'titulo_name']));

    return response()->json($doctor);
    }

    private function eliminarArchivoAntiguo($ruta) {
        if ($ruta && Storage::exists($ruta)) {
            Storage::delete($ruta);
        }
    }*/

  /*  public function update(Request $request, $medico) {
        \Log::info('Datos recibidos1:', $request->all()); // Debe mostrar datos ahora

        $doctor = Medico::findOrFail($medico);
        $data = $request->except(['foto', 'titulo_file']);

        // Actualizar campos de archivo
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/perfiles');
            $doctor->foto = str_replace('public/', 'storage/', $path);
        }

        if ($request->hasFile('titulo_file')) {
            $path = $request->file('titulo_file')->store('public/titulos');
            $doctor->titulo_file = str_replace('public/', 'storage/', $path);
        }

        $doctor->update($data);
        return response()->json($doctor);
    }

    public function update(Request $request, $medico) {
    $doctor = Medico::findOrFail($medico);
    $data = $request->except(['foto', 'titulo_file']);

    // =============================================
    // 1. Manejo de la Foto de Perfil
    // =============================================
    if ($request->hasFile('foto')) {
        // Eliminar foto anterior si existe
        if ($doctor->foto && file_exists(public_path('imagen/' . $doctor->foto))) {
            unlink(public_path('imagen/' . $doctor->foto)); // Eliminar archivo físico
        }

        // Guardar nueva foto en /public/imagen
        $imagenNombre = $request->file('foto')->hashName();
        $request->file('foto')->move(public_path('imagen'), $imagenNombre);
        $doctor->foto = $imagenNombre; // Guardar solo el nombre del archivo
    }

    // =============================================
    // 2. Manejo del Título Profesional (PDF/Imagen)
    // =============================================
    if ($request->hasFile('titulo_file')) {
        // Eliminar título anterior si existe
        if ($doctor->name_temp) {
            Storage::disk('public')->delete("medicos/titulos/{$doctor->name_temp}");
        }

        // Guardar nuevo título en /storage/app/public/medicos/titulos
        $archivoTitulo = $request->file('titulo_file');
        $nombreOriginal = $archivoTitulo->getClientOriginalName();
        $nombreTemporal = $archivoTitulo->hashName();

        $archivoTitulo->storeAs('public/medicos/titulos', $nombreTemporal);

        // Actualizar metadatos
        $doctor->name_original = $nombreOriginal;   // Nombre original del archivo
        $doctor->name_temp = $nombreTemporal;       // Nombre único en el sistema
        $doctor->route = Storage::url('medicos/titulos'); // Ruta base de almacenamiento
    }

    // =============================================
    // 3. Actualizar resto de campos y guardar
    // =============================================
    $doctor->update($data);

    return response()->json([
        'success' => true,
        'data' => $doctor,
        'message' => 'Perfil actualizado correctamente'
    ]);
    }*/

    public function medico_perfil(Medico $medico){
                $auth= Auth::id();
          return view('medicos_perfil',['medico'=>$medico, 'auth' => $auth]);
            }
       
    public function editar_perfil_medico(Medico $medico){
                $especialidades = Especialidades::all();
                $state = Pais::all();
            return view('editar_perfil_medico',['medico'=>$medico,'especialidades'=>$especialidades,'state'=>$state]);
            }
    public function delete_perfil_medico(Medico $medico){
                $user =  Auth::id();
                $mi_imagen = public_path('imagen/'.$medico->foto);
                unlink($mi_imagen); 
                $medico = DB::table('medicos')->where('user_id', '=', $user)->delete();
                $medicos = User::find(Auth::id());
                $medicos->pagos = 'negative';
                $medicos->save(); 
            return redirect()->route('lista_medico')->with('statusb','estatusb');
            }        

    public function actualizar_perfil_medico(Request $request,Medico $medico){
        $v = Validator::make($request->all(), [
          'email_dr' =>  Rule::unique('medicos','correo')->ignore($medico),
          'nombre'=> 'required|alpha|max:100',
          'apellido'=> 'required|alpha|max:100',
          'second_name'=> 'nullable|alpha|max:100',
          'last_name'=> 'nullable|alpha|max:100',
          'sexo'=> 'required|max:50',
          'telefono'=> 'required|max:255',
          'whatsapp'=> 'nullable|max:255',
          'revendedor'=> 'nullable|max:50',
          'estado'=> 'required|max:100',
          'municipio'=> 'required|max:100',
          'parroquia'=> 'required|max:100',
          'avenida'=> 'required|max:100',
          'nombre_avenida'=> 'required|max:100',
          'casa_edf_cc'=> 'required|max:100',
          'nombre_cas_edf'=> 'required|max:100',
          'nmro_casa_edf'=> 'required|max:100',
          'hospital_clinica'=> 'required|max:100',
          'nombre_hos_cli'=> 'required|max:100',
          'nmro_hos_cli'=> 'required|max:100',
          'especialidad'=> 'required|max:191',
          'costo_consulta'=> 'required|numeric|max:10000',
          'semana'=> 'required|max:200',
          'experiencia'=> 'required|numeric|max:100',
          'leyenda_dr'=> 'required|max:100',
          'imagen'=> 'required|file|image|max:10240',
          'profesion_file'=> 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
          'perfil_med'=> 'required|max:1500',
          'facebook' => 'nullable|max:150',
          'twitter' => 'nullable|max:150',
          'linkedin' => 'nullable|max:150',
          'instagram' => 'nullable|max:150',
          'g-recaptcha-response' => ['required', new ReCaptcha],    
        ],[
          'nombre.required'=> 'campo nombre requerido',
          'nombre.alpha'=> 'campo nombre debe ser letras(Sin espacios)',
          'nombre.max'=> 'campo nombre debe ser max 100 caracteres',
          'apellido.required'=> 'campo apellido requerido',
          'apellido.alpha'=> 'campo apellido debe ser letras(Sin espacios)',
          'apellido.max'=> 'campo apellido debe ser max 100 caracteres',
          'second_name.alpha' => 'campo segundo nombre debe ser letras(Sin espacios)',
          'second_name.max' => 'campo segundo nombre debe ser max 100 caracteres',
          'last_name.alpha' => 'campo segundo apellido debe ser letras(Sin espacios)',
          'last_name.max' => 'campo segundo apellido debe ser max 100 caracteres',
          'sexo.required'=> 'campo sexo requerido',
          'sexo.max'=> 'campo sexo debe ser max 100 caracteres',
          'telefono.required'=> 'campo telefono requerido',
          'telefono.max'=> 'campo teléfono debe ser max de 255 caracteres',
          'whatsapp.max'=> 'campo whatsapp debe ser max de 255 caracteres',
          'revendedor.max'=> 'campo revendedor debe ser max de 50 caracteres',
          'email_dr.unique'=> 'Ya existe este email en la base de datos',
          'estado.required'=> 'campo estado requerido',
          'estado.max'=> 'campo estado debe ser max 100 caracteres',
          'municipio.required'=> 'campo municipio requerido',
          'municipio.max'=> 'campo municipio debe ser max 100 caracteres',
          'parroquia.required'=> 'campo parroquia requerido',
          'parroquia.max'=> 'campo parroquia debe ser max 100 caracteres',
          'avenida.required'=> 'campo Avenida/Calle requerido',
          'avenida.max'=> 'campo Avenida/Calle debe ser max 100 caracteres',
          'nombre_avenida.required'=> 'campo Nombre de Avenida/Calle requerido',
          'nombre_avenida.max'=> 'campo Nombre de Avenida/Calle debe ser max 100 caracteres',
          'casa_edf_cc.required'=> 'campo Casa/Edificio/Centro Comercial requerido',
          'casa_edf_cc.max'=> 'campo Casa/Edificio/Centro Comercial debe ser max 100 caracteres',
          'nombre_cas_edf.required'=> 'campo Nombre de Casa/Edificio/Centro Comercial requerido',
          'nombre_cas_edf.max'=> 'campo Nombre de Casa/Edificio/Centro Comercial debe ser max 100 caracteres',
          'nmro_casa_edf.required'=> 'campo Nº Casa/Piso-Nº Apartamento/Nº de Local Comercial   requerido',
          'nmro_casa_edf.max'=> 'campo Nº Casa/Piso-Nº Apartamento/Nº de Local Comercial debe ser max 100 caracteres',
          'hospital_clinica.required'=> 'campo Hospital/Clínica requerido',
          'hospital_clinica.max'=> 'campo Hospital/Clínica debe ser max 100 caracteres',
          'nombre_hos_cli.required'=> 'campo Nombre de Hospital/Clínica requerido',
          'nombre_hos_cli.max'=> 'campo Nombre de Hospital/Clínica debe ser max 100 caracteres',
          'nmro_hos_cli.required'=> 'campo Piso y Nº de consultorio requerido',
          'nmro_hos_cli.max'=> 'campo Piso y Nº de consultorio debe ser max 100 caracteres',
          'especialidad.required'=> 'campo especialidad requerido',
          'especialidad.max'=> 'campo especialidad debe ser max 100 caracteres',
          'costo_consulta.required'=> 'campo Costo de Consulta en $ requerido',
          'costo_consulta.numeric'=> 'campo Costo de Consulta en $ deben ser sólo números',
          'costo_consulta.max'=> 'campo Costo de Consulta en $ debe ser max 5 números',
          'semana.required'=> 'campo Horarios de trabajo requerido',
          'semana.max'=> 'campo Horarios de trabajo debe ser max 200 caracteres',
          'experiencia.required'=> 'campo experiencia requerido',
          'experiencia.numeric'=> 'campo experiencia deben ser sólo números',
          'experiencia.max'=> 'campo experiencia debe ser max 2 números',
          'leyenda_dr.required'=> 'campo Usted es requerido',
          'leyenda_dr.max'=> 'campo Usted es debe ser max 100 caracteres',
          'imagen.required'=> 'campo Foto De Doctor requerido',
          'imagen.file'=> 'Debe ser un archivo de imagen obligatorio',
          'imagen.image'=> 'Debe ser una imagen (jpg, jpeg, png, bmp, gif, svg o webp)',
          'imagen.max'=> 'Peso max de imagen permitido: 5M',
          'profesion_file.required'=> 'campo Título es requerido',
          'profesion_file.file'=> 'Debe ser un archivo de pdf,jpg,jpeg,png obligatorio',
          'profesion_file.mimes'=> 'Debe ser un archivo de pdf,jpg,jpeg,png obligatorio',
          'profesion_file.max'=> 'Peso max de archivo Titulo permitido: 5M',
          'perfil_med.required'=> 'campo Perfil médico requerido',
          'perfil_med.max'=> 'Demasiadas palabras en campo: Perfil Médico. Base de datos admite sólo 1500 carácteres(Son aproximadamente 300 palabras)',
          'facebook' => 'campo facebook debe ser max 150 caracteres',
          'twitter' => 'campo twitter debe ser max 150 caracteres',
          'instagram' => 'campo instagram debe ser max 150 caracteres',
          'linkedin' => 'campo linkedin debe ser max 150 caracteres',
          'g-recaptcha-response.required'     => 'El Recaptcha es obligatorio para poder continuar.'
       ] );

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

      $mi_imagen = public_path('imagen/'.$medico->foto);
      unlink($mi_imagen); 

      $name_tempo = $medico->name_temp;
      Storage::disk('public')->delete("medicos/titulos/$name_tempo");

/*      if(Storage::disk('public')->exists('medicos/titulos'.$name_temp)){
        //$path = Storage::disk('public')->path($name_temp);
      }*/

      $imagen = $request->file('imagen')->hashName();
      $destino=public_path('imagen');
      $request->imagen->move($destino,$imagen);
      
      $url = Storage::url('medicos/titulos');  
      $name_original = $request->profesion_file->getClientOriginalName();
      $name_temp = $request->profesion_file->hashName();

      $request->file('profesion_file')->storeAs('public/medicos/titulos', $name_temp );
      $request->profesion_file=$request->convertedFiles;

      $medico->nombre = $request->nombre;
      $medico->apellido = $request->apellido;
      $medico->second_name = $request->second_name;
      $medico->last_name = $request->last_name;
      $medico->sexo = $request->sexo;
      $medico->telefono = $request->telefono;
      $medico->whatsapp = $request->whatsapp;
      $medico->revendedor = $request->revendedor;
      $medico->correo = $request->email_dr;
      $medico->estado_id = $request->estado;
      $medico->municipio_id = $request->municipio;
      $medico->parroquia_id = $request->parroquia;
      $medico->av_calle = $request->avenida;
      $medico->nombre_av_calle = $request->nombre_avenida;
      $medico->ca_ed_cc = $request->casa_edf_cc;
      $medico->nombre_ca_ed_cc = $request->nombre_cas_edf;
      $medico->nmro_ca_ed_cc = $request->nmro_casa_edf;
      $medico->hospital_clinica = $request->hospital_clinica;
      $medico->nombre_hos_cli = $request->nombre_hos_cli;
      $medico->nmro_hos_cli = $request->nmro_hos_cli;
      $medico->especialidad = $request->especialidad;
      $medico->consultorio_costo = $request->costo_consulta;
      $medico->horario = $request->semana;
      $medico->experiencia = $request->experiencia;
      $medico->usted_es = $request->leyenda_dr;
      $medico->foto = $imagen;
      $medico->route = $url;
      $medico->name_original = $name_original;
      $medico->name_temp = $name_temp;
      $medico->perfil_medico = $request->perfil_med;
      $medico->facebook = $request->facebook;
      $medico->twitter = $request->twitter;
      $medico->linkedin = $request->linkedin;
      $medico->instagram = $request->instagram;
  
      $medico->save();
      return redirect()->route('perfil_medico',$medico);

    }
    
    public function perfil_personal(Medico $medico){
        $auth= Auth::id();
        return view('medicos_perfil',['medico'=>$medico, 'auth' => $auth]);
    }


  public function getMunicipio($state_id){

       $municipio =  DB::table('states')->select('id','pais_id','name')->where('pais_id','=',$state_id)->get();
          $result = [
            'dato'=> $municipio,
            'status'=> 200 
          ];
        return response()->json($result);

   }

   public function getParroquia($municipio_id){
        $parroquia = DB::table('ciudades')->select('id','state_id','name')->where('state_id','=',$municipio_id)->get(); 
          $result = [
            'dato'=> $parroquia,
            'status'=> 200 
          ];
        return response()->json($result);
   }

}
