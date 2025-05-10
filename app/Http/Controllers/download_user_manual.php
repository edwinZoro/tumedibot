<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class download_user_manual extends Controller
{
   public function user_manual(){
         $pdf = \PDF::loadView('manual.manualdeusuario');
      return $pdf->download('ManualDeUsuarioTuMediBot.com.pdf');
    }
}
