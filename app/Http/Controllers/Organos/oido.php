<?php

namespace App\Http\Controllers\Organos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class oido extends Controller
{
      public function oido_vista(Request $request){
        $array = array($request->oido1,$request->oido2,$request->oido3,$request->oido4,$request->oido5,$request->oido6,$request->oido7,$request->oido8,$request->oido9,$request->oido10,$request->oido11,$request->oido12,$request->oido13,$request->oido14);
        $user = Auth::id();
        $mensaje= '. Le sugerimos buscar en las siguientes especialidades médicas y consultar un médico:';
        $d='Usted puede tener la enfermedad:';
        $x= 'Probabilidad de coincidencia de enfermedad:';
        $enfermedades = ['Otitis media','Sindrome de ménière','Laberintitis','Otosclerosis','Colesteatoma','Tapones de cera en el oído'];
        $enlaces = ['https://www.mayoclinic.org/es-es/diseases-conditions/ear-infections/symptoms-causes/syc-20351616','https://www.mayoclinic.org/es-es/diseases-conditions/menieres-disease/symptoms-causes/syc-20374910','https://www.mayoclinic.org/es-es/diseases-conditions/vertigo/symptoms-causes/syc-20370055','https://www.mayoclinic.org/es-es/diseases-conditions/tinnitus/symptoms-causes/syc-20350156','https://www.mayoclinic.org/es-es/departments-centers/otology-and-neurotology/overview/ovc-20426755','https://www.mayoclinic.org/es-es/diseases-conditions/earwax-blockage/symptoms-causes/syc-20353004#:~:text=Si%20segregas%20una%20cantidad%20excesiva,u%20otros%20productos%20en%20ellos.'];
        $especialidades = ['Medicina General','Medicina Interna','Otorrinolaringología'];
        $ruta = ['/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'];
        $probabilidad = ['20%','30%','40%','50%','60%','0%'];
        $probability = "{$probabilidad[0]}";$probability_a = "{$probabilidad[1]}";$probability_b = "{$probabilidad[2]}";$probability_c = "{$probabilidad[3]}";$probability_d = "{$probabilidad[4]}";$probability_zero = "{$probabilidad[5]}";

        $sintomas_enfermedad_a  = [1,2,3,4];
        $sintomas_enfermedad_b  = [5,6,7,8];
        $sintomas_enfermedad_c  = [6,7,9,10,11];
        $sintomas_enfermedad_d  = [6,9,12];
        $sintomas_enfermedad_e  = [1,4,5,14];
        $sintomas_enfermedad_f  = [4,6,8,9,12,13];
   
        $vacio = [];
        for ($i=0; $i < count($array); $i++){
            $array[$i] ;
            if ($array[$i] != null){
                array_push($vacio, $array[$i]);
            }
        }
         /*oido dos elecciones 20%(2)*/
        if(count($vacio)===2) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);

     $safe_g = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_f);


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
            array_push($sintomas_f, $vacio[0]);
          }

           if($safe_g == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_d, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_f, $vacio[1]);
          }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

         /*oido tres elecciones 30%(3)*/
        if(count($vacio)===3) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);

     $safe_g = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_f);

     $safe_ga = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_ha = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_ia = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_ja = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_ka = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_la = in_array($vacio[2], $sintomas_enfermedad_f);


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
            array_push($sintomas_f, $vacio[0]);
          }

           if($safe_g == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_d, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_f, $vacio[1]);
          }

          if($safe_ga == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_ha == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_ia == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_ja == true){
            array_push($sintomas_d, $vacio[2]);
          }
          if($safe_ka == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_la == true){
            array_push($sintomas_f, $vacio[2]);
          }

       if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       } 


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

    /*oido cuatro elecciones 40%(4)*/
        if(count($vacio)===4) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);

     $safe_g = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_f);

     $safe_ga = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_ha = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_ia = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_ja = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_ka = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_la = in_array($vacio[2], $sintomas_enfermedad_f);

     $safe_gb = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_hb = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_ib = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_jb = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_kb = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_lb = in_array($vacio[3], $sintomas_enfermedad_f);


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
            array_push($sintomas_f, $vacio[0]);
          }

           if($safe_g == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_d, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_f, $vacio[1]);
          }

          if($safe_ga == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_ha == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_ia == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_ja == true){
            array_push($sintomas_d, $vacio[2]);
          }
          if($safe_ka == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_la == true){
            array_push($sintomas_f, $vacio[2]);
          }

          if($safe_gb == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_hb == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_ib == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_jb == true){
            array_push($sintomas_d, $vacio[3]);
          }
          if($safe_kb == true){
            array_push($sintomas_e, $vacio[3]);
          }
           if($safe_lb == true){
            array_push($sintomas_f, $vacio[3]);
          }

       if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 4) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 4) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       } 

       if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       } 

       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

     /*oido cinco elecciones 50%(5)*/
        if(count($vacio)===5) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);

     $safe_g = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_f);

     $safe_ga = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_ha = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_ia = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_ja = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_ka = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_la = in_array($vacio[2], $sintomas_enfermedad_f);

     $safe_gb = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_hb = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_ib = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_jb = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_kb = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_lb = in_array($vacio[3], $sintomas_enfermedad_f);

     $safe_gc = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_hc = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_ic = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_jc = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_kc = in_array($vacio[4], $sintomas_enfermedad_e);
     $safe_lc = in_array($vacio[4], $sintomas_enfermedad_f);


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
            array_push($sintomas_f, $vacio[0]);
          }

           if($safe_g == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_d, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_f, $vacio[1]);
          }

          if($safe_ga == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_ha == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_ia == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_ja == true){
            array_push($sintomas_d, $vacio[2]);
          }
          if($safe_ka == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_la == true){
            array_push($sintomas_f, $vacio[2]);
          }

          if($safe_gb == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_hb == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_ib == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_jb == true){
            array_push($sintomas_d, $vacio[3]);
          }
          if($safe_kb == true){
            array_push($sintomas_e, $vacio[3]);
          }
           if($safe_lb == true){
            array_push($sintomas_f, $vacio[3]);
          }

          if($safe_gc == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_hc == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_ic == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_jc == true){
            array_push($sintomas_d, $vacio[4]);
          }
          if($safe_kc == true){
            array_push($sintomas_e, $vacio[4]);
          }
           if($safe_lc == true){
            array_push($sintomas_f, $vacio[4]);
          }

      if (count($sintomas_a) == 5) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 5) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 5) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 5) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 5) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 5) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       } 

       if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 4) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 4) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       } 

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       } 

       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

            /*oido seis elecciones 60%(6)*/
        if(count($vacio)===6) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);

     $safe_g = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_f);

     $safe_ga = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_ha = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_ia = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_ja = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_ka = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_la = in_array($vacio[2], $sintomas_enfermedad_f);

     $safe_gb = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_hb = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_ib = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_jb = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_kb = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_lb = in_array($vacio[3], $sintomas_enfermedad_f);

     $safe_gc = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_hc = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_ic = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_jc = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_kc = in_array($vacio[4], $sintomas_enfermedad_e);
     $safe_lc = in_array($vacio[4], $sintomas_enfermedad_f);

     $safe_gd = in_array($vacio[5], $sintomas_enfermedad_a);
     $safe_hd = in_array($vacio[5], $sintomas_enfermedad_b);
     $safe_id = in_array($vacio[5], $sintomas_enfermedad_c);
     $safe_jd = in_array($vacio[5], $sintomas_enfermedad_d);
     $safe_kd = in_array($vacio[5], $sintomas_enfermedad_e);
     $safe_ld = in_array($vacio[5], $sintomas_enfermedad_f);


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
            array_push($sintomas_f, $vacio[0]);
          }

           if($safe_g == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_d, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_f, $vacio[1]);
          }

          if($safe_ga == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_ha == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_ia == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_ja == true){
            array_push($sintomas_d, $vacio[2]);
          }
          if($safe_ka == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_la == true){
            array_push($sintomas_f, $vacio[2]);
          }

          if($safe_gb == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_hb == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_ib == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_jb == true){
            array_push($sintomas_d, $vacio[3]);
          }
          if($safe_kb == true){
            array_push($sintomas_e, $vacio[3]);
          }
           if($safe_lb == true){
            array_push($sintomas_f, $vacio[3]);
          }

          if($safe_gc == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_hc == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_ic == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_jc == true){
            array_push($sintomas_d, $vacio[4]);
          }
          if($safe_kc == true){
            array_push($sintomas_e, $vacio[4]);
          }
           if($safe_lc == true){
            array_push($sintomas_f, $vacio[4]);
          }

           if($safe_gd == true){
            array_push($sintomas_a, $vacio[5]);
          }
           if($safe_hd == true){
            array_push($sintomas_b, $vacio[5]);
          }
           if($safe_id == true){
            array_push($sintomas_c, $vacio[5]);
          }
           if($safe_jd == true){
            array_push($sintomas_d, $vacio[5]);
          }
          if($safe_kd == true){
            array_push($sintomas_e, $vacio[5]);
          }
           if($safe_ld == true){
            array_push($sintomas_f, $vacio[5]);
          }

       if (count($sintomas_a) == 6) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 6) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 6) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 6) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 6) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 6) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       } 

      if (count($sintomas_a) == 5) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 5) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 5) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 5) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 5) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 5) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       } 

       if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 4) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 4) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       } 

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       } 

       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

             elseif(count($vacio)>=7){
            $enfermedad = "Demasiados síntomas, y no corresponden a una enfermedad particular - Recuerde no automedicarse y siempre consultar un especialista ";
            $d = '';
            $x = '';
            $enlace= '';
            $mensaje = '';
            $especialidades[0] = '';
            $especialidades[1] = '';
            $especialidades[2] = '';
            $especialidades[3] = '';
            return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
            else{
            $enfermedad = "Recuerde no automedicarse y siempre consultar un especialista";
            $d = '';
            $x = '';
            $enlace= '';
            $mensaje = '';
            $especialidades[0] = '';
            $especialidades[1] = '';
            $especialidades[2] = '';
            $especialidades[3] = '';
            return view('organos.oido_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}

}

  /*public function lista_medico_oido_otorrinolaringologia(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'OTORRINOLARINGOLOGÍA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }
  public function lista_medico_oido_medicina_general(Request $request){
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
  public function lista_medico_oido_medicina_familiar(Request $request){
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
  public function lista_medico_oido_medicina_interna(Request $request){
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
 }        */
}
