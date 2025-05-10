<?php

namespace App\Http\Requests;
use App\Rules\ReCaptcha;
use Illuminate\Foundation\Http\FormRequest;

class StoreMedicos extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
      //'g-recaptcha-response' => ['required', new ReCaptcha],    
      'nombre'=> 'required|alpha|max:100',
      'apellido'=> 'required|alpha|max:100',
      'second_name'=> 'nullable|alpha|max:100',
      'last_name'=> 'nullable|alpha|max:100',
      'sexo'=> 'required|max:50',
      'telefono'=> 'required|max:255',
      'whatsapp'=> 'nullable|max:255',
      'email_dr'=> 'unique:medicos,correo',
     //'revendedor'=> 'nullable|max:50',
      'pais'=> 'required|max:100',
      'estado'=> 'required|max:100',
      'ciudad'=> 'required|max:100',
      'direccion_completa' => 'required|max:500',
      'especialidad_id'=> 'required|max:191',
      'costo_consulta'=> 'required|numeric|max:10000',
      'horario'=> 'required|max:300',
      'experiencia'=> 'required|numeric|max:100',
      'leyenda_dr'=> 'required|max:100',
      //'imagen'=> 'required|file|image|max:10240',
      //'profesion_file'=> 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
      'perfil_med'=> 'required|max:1500',
      'facebook' => 'nullable|max:150',
      'twitter' => 'nullable|max:150',
      'linkedin' => 'nullable|max:150',
      'instagram' => 'nullable|max:150',    
      'tratamientos' => 'required|max:1500',
      'foto' => 'required|file|image|max:10240',
      'titulo_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
      'user_id' => 'required|unique:medicos,user_id',
        ];
    }

    public function messages()
    {
        return [
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
      'revendedor.max'=> 'campo ¿Cómo se enteró de la app? debe ser max de 50 caracteres',
      'email_dr.unique'=> 'Ya existe este email en la base de datos',
      'pais.required'=> 'campo estado requerido',
      'pais.max'=> 'campo estado debe ser max 100 caracteres',
      'estado.required'=> 'campo municipio requerido',
      'estado.max'=> 'campo municipio debe ser max 100 caracteres',
      'ciudad.required'=> 'campo parroquia requerido',
      'ciudad.max'=> 'campo parroquia debe ser max 100 caracteres',
      'direccion.required'=> 'campo parroquia requerido',
      'direccion.max'=> 'campo parroquia debe ser max 100 caracteres',
      'especialidad_id.required'=> 'campo especialidad requerido',
      'especialidad_id.max'=> 'campo especialidad debe ser max 100 caracteres',
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
      'tratamientos.required' => 'El campo tratamientos es requerido',
      'tratamientos.max' => 'Máximo 1500 caracteres para tratamientos',
      'foto.required' => 'La foto es requerida',
      'titulo_file.required' => 'El archivo de título es requerido',
      'user_id.unique' => 'Sólo puede crear un (1) médico',
      //'g-recaptcha-response.required'     => 'El Recaptcha es obligatorio para poder continuar.'
        ];
    }
}
