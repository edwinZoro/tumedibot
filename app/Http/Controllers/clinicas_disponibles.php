<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Factura;
use App\Models\FacturaClinica;
use Illuminate\Support\Facades\Auth;

class clinicas_disponibles extends Controller
{
	public function clinicas(){
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
    	return view('administrator.clinicas',["user"=>$user,"factu"=>$factu,"factu_cli"=>$factu_cli]);
    }	


}
