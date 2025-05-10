<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReCaptcha;
class ActualizarFacturaEmpresarial extends FormRequest
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
            'g-recaptcha-response' => ['required', new ReCaptcha],   
            'tipo_negocio' => 'required|max:100',
            'nombre_negocio' => 'required|max:100',
            'rif_negocio' => 'required|max:100|alpha_dash',
            'nombre_representante' => 'required|max:100|alpha',
            'apellido_representante' => 'required|max:100|alpha',
            'telefono' => 'required|numeric|digits_between:10,11',
            'cedula' => 'required|numeric|digits_between:7,8',
            'estado' => 'required|max:100',
            'ciudad' => 'required|max:100',
            'direccion' => 'required|max:100',
            'codigo_postal' => 'required|numeric|digits_between:4,4',
            'user_id' => 'required',
        ];
    }

            public function messages()
    {
        return [
            'tipo_negocio.required' => 'Campo Tipo de Empresa es Obligatorio',
            'tipo_negocio.max' => 'No puede agregar más de 100 caracteres en Campo Tipo De Empresa',
            'nombre_negocio.required' => 'Campo Nombre de Empresa es Obligatorio',
            'nombre_negocio.max' => 'No puede agregar más de 100 caracteres en Campo Nombre de Empresa',
            'rif_negocio.required' => 'Campo R.I.F Empresarial es Obligatorio',
            'rif_negocio.max' => 'No puede agregar más de 100 caracteres en Campo R.I.F Empresarial',
            'rif_negocio.alpha_dash' => 'Campo R.I.F Empresarial debe contener solo una letra, numeros y guiones (No comas, Ni espacios en blanco u otro caracter especial)',
            'nombre_representante.required' => 'Campo Nombre del Representante es Obligatorio',
            'nombre_representante.max' => 'No puede agregar más de 100 caracteres en Campo Nombre del Representante',
            'nombre_representante.alpha' => 'Campo Nombre del Representante Debe agregar solo caracteres alfabeticos (Sin Espacios)',
            'apellido_representante.required' => 'Campo Nombre del Representante es Obligatorio',
            'apellido_representante.max' => 'No puede agregar más de 100 caracteres en Campo Apellido del Representante',
            'apellido_representante.alpha' => 'Campo Apellido del Representante Debe agregar solo caracteres alfabeticos (Sin Espacios)',
            'telefono.required' => 'Campo Telefono es Obligatorio',
            'telefono.numeric' => 'Campo Telefono debe ser numerico',
            'telefono.digits_between' => 'Campo Telefono Debe agregar entre 10 y 11 números',
            'cedula.required' => 'Campo Cedula es Obligatorio',
            'cedula.numeric' => 'Campo Cedula debe ser numerico',
            'cedula.digits_between' => 'Campo Cedula Debe agregar entre 7 y 8 números',
            'estado.required' => 'Campo Estado es Obligatorio',  
            'estado.max' => 'No puede agregar más de 100 caracteres en Campo Estado',
            'ciudad.required' => 'Campo Ciudad es Obligatorio',
            'ciudad.max' => 'No puede agregar más de 100 caracteres en Campo Ciudad',
            'direccion.required' => 'Campo Direccion es Obligatorio',
            'direccion.max' => 'No puede agregar más de 100 caracteres en Campo Direccion',
            'codigo_postal.required' => 'Campo Código Postal es Obligatorio',
            'codigo_postal.numeric' => 'Campo Código Postal debe ser numerico',
            'codigo_postal.digits_between' => 'Campo Código Postal Debe agregar 4 números',
            'user_id.unique' => 'Este ID de Usuario ya fue utilizado. (Ya tiene Factura)',
            'g-recaptcha-response.required'     => 'El Recaptcha es obligatorio para poder continuar.'    
           ];
    }
}
