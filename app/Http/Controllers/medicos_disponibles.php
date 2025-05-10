<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\FacturaClinica;
use Illuminate\Support\Facades\Auth;

class medicos_disponibles extends Controller
{
    public function medicos(){
    	$user =  Auth::id();
    	$factura = Factura::where('user_id','=',$user)->get();
        $factura_clinica = FacturaClinica::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }    
        foreach($factura_clinica as $fa){
            $factu_cli = $fa->user_id;
        }
        if(isset($factu_cli)===false){
            $factu_cli = 1;
        }
    	return view('administrator.medicos',["user"=>$user,"factu"=>$factu,"factu_cli"=>$factu_cli]);
    }

    public function navigationAccess(){
        $user = auth()->user();

            if (!$user) {
         return response()->json([
            'hasMedicalAccess' => false,
            'hasEmpresarialAccess' => false,
            'userId' => null,
            'medicoId' => null,
        ]);
        }

        $medico = Medico::where('user_id', $user->id)->first();
        $factura = Factura::where('user_id', $user->id)->first();
        $factura_clinica = FacturaClinica::where('user_id', $user->id)->first();

        $hasMedicalAccess = $factura ? $factura->user_id === $user->id : false;
        $hasEmpresarialAccess = $factura_clinica ? $factura_clinica->user_id === $user->id : false;

        return response()->json([
            'hasMedicalAccess' => $hasMedicalAccess,
            'hasEmpresarialAccess' => $hasEmpresarialAccess,
            'userId' => $user->id, // Incluimos el ID del usuario
            'medicoId' => $medico->id,
        ]);

    }
}
