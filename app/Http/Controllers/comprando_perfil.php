<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\FacturaClinica;
use Illuminate\Http\Request;
use App\Models\ReportePago;
use App\Models\Factura;
use App\Models\Estado;
use App\Models\Pais;
use App\Models\Pedido;
use App\Models\User;
class comprando_perfil extends Controller
{
    public function comprando_perfil_medico(User $user){
      $FacturaClinica = FacturaClinica::where('user_id','=',$user->id)->get();
      $Factura = Factura::where('user_id','=',$user->id)->get();
      $estado = Pais::all();
        foreach($FacturaClinica as $f){
            $factu_cli= $f->user_id;
           
        }
        if(isset($factu_cli)===false){
            $factu_cli= 1;
        }      
        foreach($Factura as $fa){
            $factu = $fa->user_id;
           
        }
        if(isset($factu)===false){
            $factu= 1;
        }
    return view('planes.comprar_andromeda_plan',['user' => $user, 'factu_cli'=> $factu_cli,'estado' => $estado,'factu'=>$factu]);
    }
        public function comprando_perfil_medico_b(User $user){
      $FacturaClinica = FacturaClinica::where('user_id','=',$user->id)->get();
      $Factura = Factura::where('user_id','=',$user->id)->get();
      $estado = Pais::all();
        foreach($FacturaClinica as $f){
            $factu_cli= $f->user_id;
           
        }
        if(isset($factu_cli)===false){
            $factu_cli= 1;
        }      
        foreach($Factura as $fa){
            $factu = $fa->user_id;
           
        }
        if(isset($factu)===false){
            $factu= 1;
        }
         return view('planes.fenix_plan',['user' => $user, 'factu_cli'=> $factu_cli,'estado' => $estado,'factu'=>$factu]);
    }
         public function comprando_perfil_medico_c(User $user){
      $FacturaClinica = FacturaClinica::where('user_id','=',$user->id)->get();
      $Factura = Factura::where('user_id','=',$user->id)->get();
      $estado = Pais::all();
        foreach($FacturaClinica as $f){
            $factu_cli= $f->user_id;
           
        }
        if(isset($factu_cli)===false){
            $factu_cli= 1;
        }      
        foreach($Factura as $fa){
            $factu = $fa->user_id;
           
        }
        if(isset($factu)===false){
            $factu= 1;
        }
           return view('planes.pegasus_plan',['user' => $user, 'factu_cli'=> $factu_cli,'estado' => $estado,'factu'=>$factu]);
    }
    public function pagando_perfil_medico(User $user,Pedido $pedido){
         $factura = Factura::where('user_id','=',Auth::id())->get();
         $b = Factura::where('user_id','=',Auth::id())->first();
         $reporte = ReportePago::where('pedidos_id','=',$pedido->id)->first();
      $pdf = \PDF::loadView('planes.comprando_perfil',compact('user','factura','pedido','reporte'));
      return $pdf->stream('facturaMedicoTumedibot.com.pdf');
    }

    public function pagando_perfil_medico_b(User $user){
         $pdf = \PDF::loadView('planes.comprando_perfil_b',compact('user'));
         return $pdf->stream('facturaMedicoTumedibot.com.pdf');
    }

           public function pagando_perfil_medico_c(User $user){
      $pdf = \PDF::loadView('planes.comprando_perfil_c',compact('user'));
      return $pdf->stream('facturaMedicoTumedibot.com.pdf');
    }
}
