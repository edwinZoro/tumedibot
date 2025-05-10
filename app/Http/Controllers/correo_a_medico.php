<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\PacienteCorreo;
use Illuminate\Support\Facades\Mail;

class correo_a_medico extends Controller
{
    function enviar_correo(Request $request){

    	$request->validate([
    		'name' => 'required|string|max:30',
    		'email' => 'required|string|email|max:50',
    		'phone' => 'required|numeric',
    		'message' => 'required|string|max:100',
    		'email_doctor' => 'required',
    	],[
    		'name.required' => 'Nombre Completo Obligatorio',
    		'name.string' => 'Nombre Completo deben ser solo caracteres',
    		'name.max' => 'Nombre Completo son máximo 30 caracteres',
    		'email.required' => 'Correo Obligatorio',
    		'email.string' => 'Correo deben ser solo caracteres',
    		'email.email' => 'Correo debe ser un correo con un @',
    		'email.max' => 'Correo son máximo 50 caracteres',
    		'phone.required' => 'Telefono Obligatorio',
    		'phone.numeric' => 'Telefono deben ser solo números',
    		'message.required' => 'Mensaje Obligatorio',
    		'message.string' => 'Mensaje deben ser solo caracteres',
    		'message.max' => 'Mensaje son máximo 100 caracteres',
    	]);

    	$paciente = [$request->name,$request->email,$request->phone,$request->message,$request->email_doctor];

    	Mail::to($paciente[4])->send(new PacienteCorreo($paciente));

    	return back()->with('status_paciente');
    }
}
