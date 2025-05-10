<?php

namespace App\Http\Controllers\Organos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class esofago extends Controller
{
     public function esofago_vista(Request $request){
        $array = array($request->esofago1,$request->esofago2,$request->esofago3,$request->esofago4,$request->esofago5,$request->esofago6,$request->esofago7,$request->esofago8,$request->esofago9,$request->esofago10,$request->esofago11,$request->esofago12,$request->esofago13,$request->esofago14,$request->esofago15,$request->esofago16,$request->esofago17,$request->esofago18,$request->esofago19,$request->esofago20,$request->esofago21,$request->esofago22,$request->esofago23,$request->esofago24,$request->esofago25,$request->esofago26);
        $user= Auth::id();
        $mensaje= '. Le sugerimos buscar en las siguientes especialidades médicas y consultar un médico:';
        $d='Usted puede tener la enfermedad:';
        $x= 'Probabilidad de coincidencia de enfermedad:';
        $enlaces = ['https://www.mayoclinic.org/es-es/diseases-conditions/achalasia/symptoms-causes/syc-20352850','https://www.mayoclinic.org/es-es/diseases-conditions/gerd/symptoms-causes/syc-20361940','https://www.mayoclinic.org/es-es/diseases-conditions/barretts-esophagus/symptoms-causes/syc-20352841','https://www.mayoclinic.org/es-es/diseases-conditions/esophagitis/symptoms-causes/syc-20361224','https://www.mayoclinic.org/es-es/diseases-conditions/esophageal-varices/symptoms-causes/syc-20351538'];
        $enfermedades = ['Acalasia','Reflujo Gastroesofágico(ERGE)','Esófago de Barret','Esofagitis','Varices Esofágicas'];
        $ruta = ['/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'];
        $especialidades = ['Medicina General','Medicina Interna','Gastroenterología'];
        $probabilidad = ['20%','30%','40%','50%','60%','0%'];
        $probability = "{$probabilidad[0]}";$probability_a = "{$probabilidad[1]}";$probability_b = "{$probabilidad[2]}";$probability_c = "{$probabilidad[3]}";$probability_d = "{$probabilidad[4]}";$probability_zero = "{$probabilidad[5]}";
        $sintomas_enfermedad_a  = [1,2,3,4,5];
        $sintomas_enfermedad_b  = [3,6,7,8,9,10,11,12,13,14];
        $sintomas_enfermedad_c  = [3,6,7,8,15,16,17];
        $sintomas_enfermedad_d  = [8,9,18,19,20,21];
        $sintomas_enfermedad_e  = [22,23,24,25,26];

        $vacio = [];
        for ($i=0; $i < count($array); $i++){
            $array[$i] ;
            if ($array[$i] != null){
                array_push($vacio, $array[$i]);
            }
        }
/*esofago dos elecciones 20%(2)*/
        if(count($vacio)===2) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);

     $safe_f = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_e);


          if($safe_a == true){
            array_push($sintomas_a, $vacio[0]);
          }
           if($safe_b == true){
            array_push($sintomas_b, $vacio[0]);
          }
           if($safe_c == true){
            array_push($sintomas_c, $vacio[0]);
          }
           if($safe_d == true){
            array_push($sintomas_d, $vacio[0]);
          }
           if($safe_e == true){
            array_push($sintomas_e, $vacio[0]);
          }

           if($safe_f == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_e, $vacio[1]);
          }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

     
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }




       /*esofago tres elecciones 30%(3)*/
        if(count($vacio)===3) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);

     $safe_f = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_e);

     $safe_k = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_l = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_m = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_n = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_o = in_array($vacio[2], $sintomas_enfermedad_e);


          if($safe_a == true){
            array_push($sintomas_a, $vacio[0]);
          }
           if($safe_b == true){
            array_push($sintomas_b, $vacio[0]);
          }
           if($safe_c == true){
            array_push($sintomas_c, $vacio[0]);
          }
           if($safe_d == true){
            array_push($sintomas_d, $vacio[0]);
          }
           if($safe_e == true){
            array_push($sintomas_e, $vacio[0]);
          }

           if($safe_f == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_e, $vacio[1]);
          }

          if($safe_k == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_l == true){
            array_push($sintomas_b, $vacio[2]);
          }
            if($safe_m == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_n == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_o == true){
            array_push($sintomas_e, $vacio[2]);
          }


     if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }


       
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }


         /*esofago cuatro elecciones 40%(4)*/
        if(count($vacio)===4) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);

     $safe_f = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_e);

     $safe_k = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_l = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_m = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_n = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_o = in_array($vacio[2], $sintomas_enfermedad_e);

     $safe_p = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_q = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_r = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_s = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_t = in_array($vacio[3], $sintomas_enfermedad_e);

          if($safe_a == true){
            array_push($sintomas_a, $vacio[0]);
          }
           if($safe_b == true){
            array_push($sintomas_b, $vacio[0]);
          }
           if($safe_c == true){
            array_push($sintomas_c, $vacio[0]);
          }
           if($safe_d == true){
            array_push($sintomas_d, $vacio[0]);
          }
           if($safe_e == true){
            array_push($sintomas_e, $vacio[0]);
          }

           if($safe_f == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_e, $vacio[1]);
          }

          if($safe_k == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_l == true){
            array_push($sintomas_b, $vacio[2]);
          }
            if($safe_m == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_n == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_o == true){
            array_push($sintomas_e, $vacio[2]);
          }


          if($safe_p == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_q == true){
            array_push($sintomas_b, $vacio[3]);
          }
            if($safe_r == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_s == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_t == true){
            array_push($sintomas_e, $vacio[3]);
          }

     if( count($sintomas_a) == 4){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

 
       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }



        /*esofago cinco elecciones 40%(5)*/
        if(count($vacio)===5) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);

     $safe_f = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_e);

     $safe_k = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_l = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_m = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_n = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_o = in_array($vacio[2], $sintomas_enfermedad_e);

     $safe_p = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_q = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_r = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_s = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_t = in_array($vacio[3], $sintomas_enfermedad_e);

     $safe_u = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_v = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_w = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_x = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_y = in_array($vacio[4], $sintomas_enfermedad_e);

          if($safe_a == true){
            array_push($sintomas_a, $vacio[0]);
          }
           if($safe_b == true){
            array_push($sintomas_b, $vacio[0]);
          }
           if($safe_c == true){
            array_push($sintomas_c, $vacio[0]);
          }
           if($safe_d == true){
            array_push($sintomas_d, $vacio[0]);
          }
           if($safe_e == true){
            array_push($sintomas_e, $vacio[0]);
          }

           if($safe_f == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_e, $vacio[1]);
          }

          if($safe_k == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_l == true){
            array_push($sintomas_b, $vacio[2]);
          }
            if($safe_m == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_n == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_o == true){
            array_push($sintomas_e, $vacio[2]);
          }


          if($safe_p == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_q == true){
            array_push($sintomas_b, $vacio[3]);
          }
            if($safe_r == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_s == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_t == true){
            array_push($sintomas_e, $vacio[3]);
          }

           if($safe_u == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_v == true){
            array_push($sintomas_b, $vacio[4]);
          }
            if($safe_w == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_x == true){
            array_push($sintomas_d, $vacio[4]);
          }
           if($safe_y == true){
            array_push($sintomas_e, $vacio[4]);
          }

     if( count($sintomas_a) == 5){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 5){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 5){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 5){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 5){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 4){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

 
       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }



         /*esofago cinco elecciones 40%(6)*/
        if(count($vacio)===6) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);

     $safe_f = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_e);

     $safe_k = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_l = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_m = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_n = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_o = in_array($vacio[2], $sintomas_enfermedad_e);

     $safe_p = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_q = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_r = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_s = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_t = in_array($vacio[3], $sintomas_enfermedad_e);

     $safe_u = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_v = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_w = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_x = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_y = in_array($vacio[4], $sintomas_enfermedad_e);

     $safe_ua = in_array($vacio[5], $sintomas_enfermedad_a);
     $safe_va = in_array($vacio[5], $sintomas_enfermedad_b);
     $safe_wa = in_array($vacio[5], $sintomas_enfermedad_c);
     $safe_xa = in_array($vacio[5], $sintomas_enfermedad_d);
     $safe_ya = in_array($vacio[5], $sintomas_enfermedad_e);

          if($safe_a == true){
            array_push($sintomas_a, $vacio[0]);
          }
           if($safe_b == true){
            array_push($sintomas_b, $vacio[0]);
          }
           if($safe_c == true){
            array_push($sintomas_c, $vacio[0]);
          }
           if($safe_d == true){
            array_push($sintomas_d, $vacio[0]);
          }
           if($safe_e == true){
            array_push($sintomas_e, $vacio[0]);
          }

           if($safe_f == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_e, $vacio[1]);
          }

          if($safe_k == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_l == true){
            array_push($sintomas_b, $vacio[2]);
          }
            if($safe_m == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_n == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_o == true){
            array_push($sintomas_e, $vacio[2]);
          }


          if($safe_p == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_q == true){
            array_push($sintomas_b, $vacio[3]);
          }
            if($safe_r == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_s == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_t == true){
            array_push($sintomas_e, $vacio[3]);
          }

           if($safe_u == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_v == true){
            array_push($sintomas_b, $vacio[4]);
          }
            if($safe_w == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_x == true){
            array_push($sintomas_d, $vacio[4]);
          }
           if($safe_y == true){
            array_push($sintomas_e, $vacio[4]);
          }


           if($safe_ua == true){
            array_push($sintomas_a, $vacio[5]);
          }
           if($safe_va == true){
            array_push($sintomas_b, $vacio[5]);
          }
            if($safe_wa == true){
            array_push($sintomas_c, $vacio[5]);
          }
           if($safe_xa == true){
            array_push($sintomas_d, $vacio[5]);
          }
           if($safe_ya == true){
            array_push($sintomas_e, $vacio[5]);
          }

    if( count($sintomas_a) == 6){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 6){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 6){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 6){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 6){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 5){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 5){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 5){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 5){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 5){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 4){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

 
       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }
              elseif(count($vacio)>=7){
            $enfermedad = "Demasiados síntomas, y no corresponden a una enfermedad particular - Recuerde no automedicarse y siempre consultar un especialista ";
            $d = '';
            $x = '';
            $enlace='';
            $mensaje = '';
            $especialidades[0] = '';
            $especialidades[1] = '';
            $especialidades[2] = '';
            $especialidades[3] = '';
            return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
            else{
            $enfermedad = "Recuerde no automedicarse y siempre consultar un especialista";
            $d = '';
            $x = '';
            $enlace='';
            $mensaje = '';
            $especialidades[0] = '';
            $especialidades[1] = '';
            $especialidades[2] = '';
            $especialidades[3] = '';
            return view('organos.esofago_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
} 

/*public function lista_medico_esofago_medicina_general(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'MEDICINA GENERAL';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }
  public function lista_medico_esofago_gastroenterologia(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'GASTROENTEROLOGÍA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }
  public function lista_medico_esofago_medicina_familiar(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'MEDICINA FAMILIAR';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }
   public function lista_medico_esofago_medicina_interna(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'MEDICINA INTERNA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }       */
}
