<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReCaptcha;
class StoreClinicas extends FormRequest
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
           // 'g-recaptcha-response' => ['required', new ReCaptcha],  
            'tipo_negocio' => 'required|max:50',
            'nombre' => 'required|max:100',
            'telefono' => 'required|max:255',
            'whatsapp' => 'required|max:255',
            'correo' => 'required|unique:clinica,correo',
            'revendedor' => 'required|max:50',
            'pais' => 'required|max:100',
            'estado' => 'required|max:100',
            'ciudad' => 'required|max:100',
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
            'user_id' => 'required|unique:clinica,user_id',

        ];
    }

    public function messages()
    {
        return [
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
            'revendedor.required' => 'campo ¿Cómo se enteró de la app? requerido',
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
            'user_id.unique' => 'Ya fue usado este usuario para crear un perfil',      
            'g-recaptcha-response.required' => 'El Recaptcha es obligatorio para poder continuar.'
        ];
    }
}
