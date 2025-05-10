<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\ReportePagoClinica;
use App\Models\FacturaClinica;
use App\Models\PedidoClinica;
use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Estado;
use App\Models\Pais;
use App\Models\User;

class comprando_perfil_empresarial extends Controller
{
    public function comprando_perfil_empresarial_cisne(User $user){
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
    return view('clinicas.comprar_cisne_plan',['user' => $user, 'factu_cli'=> $factu_cli,'estado' => $estado,'factu'=>$factu]);
    }

    public function comprando_perfil_empresarial_aioria(User $user){
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
         return view('clinicas.comprar_aioria_plan',['user' => $user, 'factu_cli'=> $factu_cli,'estado' => $estado,'factu'=>$factu]);
    }

    public function comprando_perfil_empresarial_dragon(User $user){
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
           return view('clinicas.comprar_dragon_plan',['user' => $user, 'factu_cli'=> $factu_cli,'estado' => $estado,'factu'=>$factu]);
    }


    public function pagando_perfil_empresarial_cisne(User $user,PedidoClinica $pedido){
         $FacturaClinica = FacturaClinica::where('user_id','=',Auth::id())->get();
         $b = FacturaClinica::where('user_id','=',Auth::id())->first();
         $reporte = ReportePagoClinica::where('pedidos_clinicas_id','=',$pedido->id)->first();
         $pdf = \PDF::loadView('clinicas.comprando_perfil_empresarial',compact('user','FacturaClinica','pedido','reporte'));
      return $pdf->stream('FacturaEmpresarialTumedibot.com.pdf');
    }

/*    public function pagando_perfil_empresarial_aioria(User $user){
         $pdf = \PDF::loadView('planes.comprando_perfil_b',compact('user'));
         return $pdf->stream('FacturaEmpresarial.pdf');
    }

           public function pagando_perfil_empresarial_dragon(User $user){
      $pdf = \PDF::loadView('planes.comprando_perfil_c',compact('user'));
      return $pdf->stream('FacturaEmpresarial.pdf');
    }*/
}
