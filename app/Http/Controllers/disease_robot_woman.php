<?php

namespace App\Http\Controllers;
use App\Models\Factura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FacturaClinica;
use Illuminate\Support\Facades\Storage;

class disease_robot_woman extends Controller
{
    public function robot_woman(){
        $user = Auth::id();
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
        return view('robot_disease_woman',['user'=>$user,'factu'=>$factu,'factu_cli'=>$factu_cli]);
    }
}
