<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\FacturaClinica;
use Illuminate\Http\Request;
use App\Models\Factura;
class disease_robot extends Controller
{
        public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function robot(){
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
    	return view('robot_disease',['user'=>$user,'factu'=>$factu,'factu_cli'=>$factu_cli]);
    }

    public function robot_out(){
    	return redirect('/');
    }
}
