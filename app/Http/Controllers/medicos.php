<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pais;
use App\Models\State;
use App\Models\Medico;
use App\Models\Estado;
use App\Models\Ciudad;
use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\FacturaClinica;
use App\Models\Especialidades;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreMedicos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage; 
use Spatie\Permission\Models\Permission;
class medicos extends Controller
{
    public function perfilesMedicosAutenticated(User $user){
      $FacturaClinica = FacturaClinica::where('user_id','=',$user->id)->get();
      $Factura = Factura::where('user_id','=',$user->id)->get();
        foreach($FacturaClinica as $f){
            $factu_cli= $f->user_id;
           
        }
        if(isset($factu_cli)===false){
            $factu_cli= 1;
        }      
        foreach($Factura as $fa){
            $factu = $fa->user_id;
           
        }
        if(isset($factu)===false){
            $factu= 1;
        }
      return view('perfilesMedicosAutenticated',['user' => $user, 'factu_cli'=> $factu_cli,'factu'=>$factu]);
    }

    public function MedicosGet(){
        $especialidad = Especialidades::all();
        $state = Pais::all();
        return view('perfilMedico',['especialidad'=>$especialidad, 'state'=>$state]);    
    }
    public function Medicos(StoreMedicos $request,Medico $medico){     
     // Log::info($request->all());
      $data = $request->validated();
      $imagen = $request->file('foto')->hashName();
      $destino=public_path('imagen');
      $request->foto->move($destino,$imagen);

      $url = Storage::url('medicos/titulos');  
      $name_original = $data['titulo_file']->getClientOriginalName();
      $name_temp = $data['titulo_file']->hashName();

      //$titulo = $request->file('titulo_file')->hashName();
      //$request->file('titulo_file')->storeAs('public/medicos/titulos', $titulo);

      //$request->file('profesion_file')->storeAs('public/medicos/titulos', $name_temp );
      //$data['profesion_file']=$request->convertedFiles;
      //dd($data['especialidad_id']);
      // Sanitizar HTML
      $purifier = new \HTMLPurifier(config('purifier.config'));
      $perfilMedico = $purifier->purify($data['perfil_med']);
      $tratamientos = $purifier->purify($data['tratamientos']);

       Medico::create([
            'nombre' => $data['nombre'],
            'apellido' => $data['apellido'],
            'second_name' => $data['second_name'],
            'last_name' => $data['last_name'],
            'sexo' => $data['sexo'],
            'telefono' => $data['telefono'],
            'whatsapp' => $data['whatsapp'],
            'correo' => $data['email_dr'],
            //'revendedor' => $data['revendedor'],
            'pais_id' => $data['pais'],
            'estado_id' => $data['estado'],
            'ciudad_id' => $data['ciudad'],
            'direccion' => $data['direccion_completa'],
            'especialidad_id' => $data['especialidad_id'],
            'consultorio_costo' => $data['costo_consulta'],
            'horario' => $data['horario'],
            'experiencia' => $data['experiencia'],                       
            'usted_es' => $data['leyenda_dr'],
            'foto' => $imagen,
            'perfil_medico' => $data['perfil_med'],
            'tratamientos' => $data['tratamientos'],
            'facebook' => $data['facebook'],
            'twitter' => $data['twitter'],
            'linkedin' => $data['linkedin'],
            'instagram' => $data['instagram'],
            'pagos' => 'positive',
            'route' => $url,
            'name_original' => $name_original,
            'name_temp' => $name_temp,
            'user_id' => Auth::id()
        ]);   

       $medicos = User::find(Auth::id());
       $medicos->pagos = 'positive';
       $medicos->save(); 
     
       // return redirect()->route('lista_medico')->with('statusa','estatusa');   
        
        return response()->json(['success' => true, 'redirect' => route('lista_medico')]);
    }

    public function downloading($name_temp){

      if (Storage::disk('public')->exists('medicos/titulos/'.$name_temp)) {
    return Storage::disk('public')->download('medicos/titulos/'.$name_temp);
  }else{
    return redirect()->back();
  }
      
      
    }
}
