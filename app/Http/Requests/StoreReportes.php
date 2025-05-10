<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class StoreReportes extends FormRequest
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
            'banco_emisor' => 'required|max:100',
            'banco_receptor' => 'required|max:100',
            'nmro_referencia' => 'required|numeric|digits_between:4,11',
            'monto_pagado' => 'required|max:100',
            'metodo_transaccion' => 'required|max:100',
            'pedido_id' => 'required|unique:reporte_pagos,pedidos_id'
        ];
    }

    public function messages(){
        return [
             'nmro_referencia.max' => 'En Nro de Referencia debe agregar máximo 11 números',
             'banco_emisor.required' => 'campo Banco Emisor es Obligatorio',
             'banco_emisor.alpha' => 'campo Banco Emisor es Solo Letras (Sin espacios en blanco)',
             'banco_emisor.max' => 'campo Banco Emisor es 100 caracteres max',
             'banco_receptor.required' => 'campo Banco Receptor es Obligatorio',
             'banco_receptor.alpha' => 'campo Banco Receptor es Solo Letras (Sin espacios en blanco)',
             'banco_receptor.max' => 'campo Banco Receptor es 100 caracteres max',
             'nmro_referencia.required' => 'campo Nro de Referencia es Obligatorio',
             'nmro_referencia.numeric' => 'campo Nro de Referencia es Solo Numeros',
             'nmro_referencia.digits_between' => 'campo Nro de Referencia debe ser entre min 4 y max 11 numeros',
             'monto_pagado.required' => 'campo Monto Pagado es Obligatorio',
             'monto_pagado.max' => 'campo Monto Pagado es 100 caracteres max',
             'metodo_transaccion.required' => 'campo Metodo Transaccion es Obligatorio',
             'metodo_transaccion.max' => 'campo Metodo Transaccion es 100 caracteres max',
             'pedido_id.unique' => 'Paciencia estamos confirmando su pago, 
             la confirmación del pago suele tardar entre 1 a 3 días. 
             puede agregar otro reporte una vez confirmemos este, previamente debe por supuesto generar un pago. ',
             'pedido_id.required' => 'Vaya al Área Médico. Debe generar un pedido haciendo click en el botón Pagar ',
        ];
    }
}
