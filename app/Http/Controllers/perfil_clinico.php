<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreClinicas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Rules\ReCaptcha;
use App\Models\Clinica;
use App\Models\Estado;
use App\Models\Pais;
use App\Models\User;
use DB;
class perfil_clinico extends Controller
{
	public function clinica_perfil(Clinica $clinica){

		return view('clinicas.perfil_clinico',['clinica'=>$clinica]);
	}

	public function clinicasGet(){
		$state = Pais::all();
		return view('clinicas.perfil_clinica_form_fill',['state'=>$state]);
	}

	public function clinicasPost(StoreClinicas $request,Clinica $clinica){

	    $data = $request->validated();
      $imagen = $request->file('imagen')->hashName();
      $destino=public_path('imagen_clinicas');
      $request->imagen->move($destino,$imagen);

      $imagenb = $request->file('imagenb')->hashName();
      $destinob=public_path('imagen_clinicasb');
      $request->imagenb->move($destinob,$imagenb);

      $imagenc = $request->file('imagenc')->hashName();  
      $destinoc=public_path('imagen_clinicasc');
      $request->imagenc->move($destinoc,$imagenc);

      $imagend = $request->file('imagend')->hashName();
      $destinod=public_path('imagen_clinicasd');
      $request->imagend->move($destinod,$imagend);

      $imagene = $request->file('imagene')->hashName();
      $destinoe=public_path('imagen_clinicase');
      $request->imagene->move($destinoe,$imagene);

      $imagenf = $request->file('imagenf')->hashName();  
      $destinof=public_path('imagen_clinicasf');
      $request->imagenf->move($destinof,$imagenf);

       Clinica::create([
            'tipo_negocio' => $data['tipo_negocio'],
            'nombre' => $data['nombre'],
            'telefono' => $data['telefono'],
            'whatsapp' => $data['whatsapp'],
            'correo' => $data['correo'],
            'revendedor' => $data['revendedor'],
            'pais_id' => $data['pais'],
            'estado_id' => $data['estado'],
            'ciudad_id' => $data['ciudad'],
            'direccion' => $data['direccion'],
            'perfil_clinica' => $data['perfil_clinica'],                  
            'servicios' => $data['servicios'],
            'foto_a' => $imagen,
            'foto_b' => $imagenb,
            'foto_c' => $imagenc,
            'foto_d' => $imagend,
            'foto_e' => $imagene,
            'foto_f' => $imagenf,
            'facebook' => $data['facebook'],
            'twitter' => $data['twitter'],
            'linkedin' => $data['linkedin'],
            'instagram' => $data['instagram'],
            'pagos' => 'positive',
            'user_id' => Auth::id()
        ]);   

       $clinicas = User::find(Auth::id());
       $clinicas->pagos_clinicas = 'positive';
       $clinicas->save(); 

       return redirect()->route('lista_empresarial')->with('status','ya fue creado su perfil');
	}
        
        public function editar_perfil_empresarial(Clinica $clinica){
            $state = Pais::all();
        return view('clinicas.editar_perfil_clinica',['clinica'=>$clinica,'state'=>$state]);
        }

        public function actualizar_perfil_empresarial(Request $request,Clinica $clinica){
        $v = Validator::make($request->all(), [
            'correo' =>  Rule::unique('clinica','correo')->ignore($clinica),
            'tipo_negocio' => 'required|max:50',
            'nombre' => 'required|max:100',
            'telefono' => 'required|max:255',
            'whatsapp' => 'required|max:255',
            'revendedor' => 'nullable|max:50',
            'estado' => 'required|max:100',
            'municipio' => 'required|max:100',
            'parroquia' => 'required|max:100',
            'direccion' => 'required|max:255',
            'perfil_clinica' => 'required|max:1000',
            'servicios' => 'required|max:500',
            'imagen' =>  'required|file|image|max:10240',
            'imagenb' => 'required|file|image|max:10240',
            'imagenc' => 'required|file|image|max:10240',
            'imagend' => 'required|file|image|max:10240',
            'imagene' => 'required|file|image|max:10240',
            'imagenf' => 'required|file|image|max:10240',
            'facebook' => 'nullable|max:150',
            'twitter' => 'nullable|max:150',
            'instagram' => 'nullable|max:150',
            'linkedin' => 'nullable|max:150',
            //'user_id' => 'required|unique:clinica,user_id',
          'g-recaptcha-response' => ['required', new ReCaptcha],    
        ],[
            'tipo_negocio.required' => 'campo tipo_negocio requerido',
            'tipo_negocio.max' => 'campo tipo_negocio debe ser max 50 caracteres',
            'nombre.required' => 'campo nombre requerido',
            'nombre.max' => 'campo nombre debe ser max 100 caracteres',
            'telefono.required' => 'campo telefono requerido',
            'telefono.max' => 'campo telefono debe ser max 255 caracteres',
            'whatsapp.required' => 'campo whatsapp requerido',
            'whatsapp.max' => 'campo whatsapp debe ser max 255 caracteres',
            'correo.required' => 'campo correo requerido',
            'correo.unique' => 'Ya existe este email en la base de datos',
            'revendedor.nullable' => 'campo ¿Cómo se enteró de la app? requerido',
            'revendedor.max' => 'campo ¿Cómo se enteró de la app? debe ser max 50 caracteres',
            'estado.required' => 'campo estado requerido',
            'estado.max' => 'campo estado debe ser max 100 caracteres',
            'municipio.required' => 'campo municipio requerido',
            'municipio.max' => 'campo municipio debe ser max 50 caracteres',
            'parroquia.required' => 'campo parroquia requerido',
            'parroquia.max' => 'campo parroquia debe ser max 50 caracteres',
            'direccion.required' => 'campo Dirección de la Empresa requerido',
            'direccion.max' => 'campo Dirección de la Empresa debe ser max 255 caracteres',
            'perfil_clinica.required' => 'campo Perfil Empresa requerido',
            'perfil_clinica.max' => 'campo Perfil Empresa debe ser max 1000 caracteres',
            'servicios.required' => 'campo Servicios que ofrece su Empresa requerido',
            'servicios.max' => 'campo Servicios que ofrece su Empresa debe ser max 500 caracteres',
            'imagen.required' => 'campo Foto 1 para perfil empresarial (Carrousel de imágenes) requerido',
            'imagen.image' => 'campo Foto 1 para perfil empresarial (Carrousel de imágenes) Debe ser una imagen (jpg, jpeg, png, bmp, gif, svg o webp)',
            'imagen.max' => 'campo Foto 1 para perfil empresarial (Carrousel de imágenes) tiene un tamaño max de imagen permitido: 5M',
            'imagenb.required' => 'campo Foto 2 para perfil empresarial (Carrousel de imágenes) requerido',
            'imagenb.image' => 'campo Foto 2 para perfil empresarial (Carrousel de imágenes) Debe ser una imagen (jpg, jpeg, png, bmp, gif, svg o webp)',
            'imagenb.max' => 'campo Foto 2 para perfil empresarial (Carrousel de imágenes) tiene un tamaño max de imagen permitido: 5M',
            'imagenc.required' => 'campo Foto 3 para perfil empresarial (Carrousel de imágenes) requerido',
            'imagenc.image' => 'campo Foto 3 para perfil empresarial (Carrousel de imágenes) Debe ser una imagen (jpg, jpeg, png, bmp, gif, svg o webp)',
            'imagenc.max' => 'campo Foto 3 para perfil empresarial (Carrousel de imágenes) tiene un tamaño max de imagen permitido: 5M',
            'imagend.required' => 'campo Foto 4 para perfil empresarial (Sección Acerca de Nosotros) requerido',
            'imagend.image' => 'campo Foto 4 para perfil empresarial (Sección Acerca de Nosotros) Debe ser una imagen (jpg, jpeg, png, bmp, gif, svg o webp)',
            'imagend.max' => 'campo Foto 4 para perfil empresarial (Sección Acerca de Nosotros) tiene un tamaño max de imagen permitido: 5M',
            'imagene.required' => 'campo Foto 5 para perfil empresarial (Sección Servicios) requerido',
            'imagene.image' => 'campo Foto 5 para perfil empresarial (Sección Servicios) Debe ser una imagen (jpg, jpeg, png, bmp, gif, svg o webp)',
            'imagene.max' => 'campo Foto 5 para perfil empresarial (Sección Servicios) tiene un tamaño max de imagen permitido: 5M',
            'imagenf.required' => 'campo Foto 6 para perfil empresarial (Sección Contacto) requerido',
            'imagenf.image' => 'campo Foto 6 para perfil empresarial (Sección Contacto) Debe ser una imagen (jpg, jpeg, png, bmp, gif, svg o webp)',
            'imagenf.max' => 'campo Foto 6 para perfil empresarial (Sección Contacto) tiene un tamaño max de imagen permitido: 5M',
            'facebook.max' => 'campo facebook debe ser max 150 caracteres',
            'twitter.max' => 'campo twitter debe ser max 150 caracteres',
            'instagram.max' => 'campo instagram debe ser max 150 caracteres',
            'linkedin.max' => 'campo linkedin debe ser max 150 caracteres',
            //'user_id.unique' => 'Ya fue usado este usuario para crear un perfil',      
            'g-recaptcha-response.required' => 'El Recaptcha es obligatorio para poder continuar.'
       ] );

        if ($v->fails())
        {
            return redirect()->back()->withInput()->withErrors($v->errors());
        }

      $mi_imagen = public_path('imagen_clinicas/'.$clinica->foto_a);
      unlink($mi_imagen); 
      $imagen = $request->file('imagen')->hashName();
      $destino=public_path('imagen_clinicas');
      $request->imagen->move($destino,$imagen);

      $mi_imagenb = public_path('imagen_clinicasb/'.$clinica->foto_b);
      unlink($mi_imagenb); 
      $imagenb = $request->file('imagenb')->hashName();
      $destinob=public_path('imagen_clinicasb');
      $request->imagenb->move($destinob,$imagenb);

      $mi_imagenc = public_path('imagen_clinicasc/'.$clinica->foto_c);
      unlink($mi_imagenc); 
      $imagenc = $request->file('imagenc')->hashName();
      $destinoc=public_path('imagen_clinicasc');
      $request->imagenc->move($destinoc,$imagenc);

      $mi_imagend = public_path('imagen_clinicasd/'.$clinica->foto_d);
      unlink($mi_imagend); 
      $imagend = $request->file('imagend')->hashName();
      $destinod=public_path('imagen_clinicasd');
      $request->imagend->move($destinod,$imagend);

      $mi_imagene = public_path('imagen_clinicase/'.$clinica->foto_e);
      unlink($mi_imagene); 
      $imagene = $request->file('imagene')->hashName();
      $destinoe=public_path('imagen_clinicase');
      $request->imagene->move($destinoe,$imagene);

      $mi_imagenf = public_path('imagen_clinicasf/'.$clinica->foto_f);
      unlink($mi_imagenf); 
      $imagenf = $request->file('imagenf')->hashName();
      $destinof=public_path('imagen_clinicasf');
      $request->imagenf->move($destinof,$imagenf);

 
    $clinica->tipo_negocio = $request->tipo_negocio;
    $clinica->nombre = $request->nombre;
    $clinica->telefono = $request->telefono;
    $clinica->whatsapp = $request->whatsapp;
    $clinica->correo = $request->correo;
    $clinica->revendedor = $request->revendedor;
    $clinica->estado_id = $request->estado;
    $clinica->municipio_id = $request->municipio;
    $clinica->parroquia_id = $request->parroquia;
    $clinica->direccion = $request->direccion;
    $clinica->perfil_clinica = $request->perfil_clinica;                  
    $clinica->servicios = $request->servicios;
    $clinica->foto_a = $imagen;
    $clinica->foto_b = $imagenb;
    $clinica->foto_c = $imagenc;
    $clinica->foto_d = $imagend;
    $clinica->foto_e = $imagene;
    $clinica->foto_f = $imagenf;
    $clinica->facebook = $request->facebook;
    $clinica->twitter = $request->twitter;
    $clinica->linkedin = $request->linkedin;
    $clinica->instagram = $request->instagram;
    $clinica->save(); 

      return redirect()->route('lista_empresarial')->with('statu','Se ha actualizado Correctamente');

    }

    
       public function delete_perfil_empresarial(Clinica $clinica){
                $user =  Auth::id();
                $mi_imagen = public_path('imagen_clinicas/'.$clinica->foto_a);
                unlink($mi_imagen); 
                $mi_imagenb = public_path('imagen_clinicasb/'.$clinica->foto_b);
                unlink($mi_imagenb);
                $mi_imagenc = public_path('imagen_clinicasc/'.$clinica->foto_c);
                unlink($mi_imagenc); 
                $mi_imagend = public_path('imagen_clinicasd/'.$clinica->foto_d);
                unlink($mi_imagend);
                $mi_imagene = public_path('imagen_clinicase/'.$clinica->foto_e);
                unlink($mi_imagene);
                $mi_imagenf = public_path('imagen_clinicasf/'.$clinica->foto_f);
                unlink($mi_imagenf);
                $clinica = DB::table('clinica')->where('user_id', '=', $user)->delete();
                $clinicas_usuarios = User::find(Auth::id());
                $clinicas_usuarios->pagos_clinicas = 'negative';
                $clinicas_usuarios->save(); 
            return redirect()->back()->with('status','estatusb');
            }  

    
}
