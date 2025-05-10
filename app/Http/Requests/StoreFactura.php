<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\ReCaptcha;
class StoreFactura extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
           // 'g-recaptcha-response' => ['required', new ReCaptcha],   
            'nombre' => 'required|max:100',
            'apellido' => 'required|max:100',
            'telefono' => 'required|numeric|digits_between:10,14',
            'cedula' => 'required|numeric|digits_between:7,10',
            'estado' => 'required|max:100',
            'ciudad' => 'required|max:100',
            'direccion' => 'required|max:255',
            'codigo_postal' => 'required|numeric|digits_between:4,4',
            'user_id' => 'unique:facturas,user_id',
            'plan' => 'required',
        ];
    }
    
    public function messages()
    {
    return [
        'nombre.required' => 'Es Obligatorio llenar campo Nombre',
        'apellido.required' => 'Es Obligatorio llenar campo Apellido',
        'telefono.required' => 'Es Obligatorio llenar campo Telefono',
        'telefono.digits_between' => 'Campo Telefono debe ser min 10 núm y max 14 núm',
        'telefono.numeric' => 'Campo Telefono debe ser numerico (Sin caracteres especiales, sin puntos, sin comas, sin espacio)',
        'cedula.required' => 'Es Obligatorio llenar campo Cedula',
        'cedula.digits_between' => 'Campo Cédula debe ser min 7 núm y max 10 núm',
        'cedula.numeric' => 'Campo Cédula debe ser numerico (Sin caracteres especiales, sin puntos, sin comas, sin espacio)',
        'estado.required' => 'Es Obligatorio llenar campo Estado',
        'ciudad.required' => 'Es Obligatorio llenar campo Ciudad',
        'direccion.required' => 'Es Obligatorio llenar campo Direccion',
        'codigo_postal.required' => 'Es Obligatorio llenar campo Código Postal',
        'codigo_postal.digits_between' => 'Campo Código Postal debe ser min 4 núm',
        'codigo_postal.numeric' => 'Campo Código Postal debe ser numerico (Sin caracteres especiales, sin puntos, sin comas, sin espacio)',
        'user_id.unique' => 'Ya tiene una factura habilitada, puede editarla en área médico. Si desea cambiar de plan notifiquelo por el chat en el área médico', 
        'plan.required' =>'requerido este campo',
        'g-recaptcha-response.required'     => 'El Recaptcha es obligatorio para poder continuar.'
    ];
    }
}
