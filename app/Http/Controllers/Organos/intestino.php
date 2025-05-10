<?php

namespace App\Http\Controllers\Organos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class intestino extends Controller
{
	public function intestino_vista(Request $request){
            $array = array($request->intestino1,$request->intestino2,$request->intestino3,$request->intestino4,$request->intestino5,$request->intestino6,$request->intestino7,$request->intestino8,$request->intestino9,$request->intestino10,$request->intestino11,$request->intestino12,$request->intestino13,$request->intestino14,$request->intestino15,$request->intestino16,$request->intestino17,$request->intestino18,$request->intestino19,$request->intestino20,$request->intestino21,$request->intestino22,$request->intestino23,$request->intestino24,$request->intestino25,$request->intestino26,$request->intestino27,$request->intestino28);
        $user = Auth::id();
        $mensaje= '. Le sugerimos buscar en las siguientes especialidades médicas y consultar un médico:';
        $d='Usted puede tener la enfermedad:';
        $x= 'Probabilidad de coincidencia de enfermedad:';
        $enfermedades = ['Colitis Ulcerativa','De Crohn','Obstrucción Intestinal','Sindrome Del Intestino Irritable(SII)','Diverticulosis-Diverticulitis','Celíaca','Isquemia intestinal aguda'];
        $enlaces=['https://www.mayoclinic.org/es-es/diseases-conditions/ulcerative-colitis/symptoms-causes/syc-20353326','https://www.mayoclinic.org/es-es/diseases-conditions/crohns-disease/symptoms-causes/syc-20353304','https://www.mayoclinic.org/es-es/diseases-conditions/intestinal-obstruction/symptoms-causes/syc-20351460','https://www.mayoclinic.org/es-es/diseases-conditions/irritable-bowel-syndrome/symptoms-causes/syc-20360016','https://www.mayoclinic.org/es-es/diseases-conditions/diverticulitis/symptoms-causes/syc-20371758','https://www.mayoclinic.org/es-es/diseases-conditions/celiac-disease/symptoms-causes/syc-20352220','https://www.mayoclinic.org/es-es/diseases-conditions/intestinal-ischemia/symptoms-causes/syc-20373946#:~:text=La%20isquemia%20intestinal%20describe%20una,grueso%20(colon)%20o%20ambos.'];
        $ruta = ['/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'];
        $especialidades = ['Medicina General','Coloproctología','Gastroenterología'];
        $probabilidad = ['20%','30%','40%','50%','60%','0%'];
        $probability = "{$probabilidad[0]}";$probability_a = "{$probabilidad[1]}";$probability_b = "{$probabilidad[2]}";$probability_c = "{$probabilidad[3]}";$probability_d = "{$probabilidad[4]}";$probability_zero = "{$probabilidad[5]}";
        $sintomas_enfermedad_a  = [1,2,3,4,5,6];
        $sintomas_enfermedad_b  = [1,6,7,8,9,10,11,12];
        $sintomas_enfermedad_c  = [1,13,14,15,16,17,18];
        $sintomas_enfermedad_d  = [1,7,15,18,19,20,21];
        $sintomas_enfermedad_e  = [1,7,9,10,18,19,20,22,23];
        $sintomas_enfermedad_f  = [7,10,15,16,22,24,25];
        $sintomas_enfermedad_g  = [1,2,19,26,27,28];

        $vacio = [];
        for ($i=0; $i < count($array); $i++){
            $array[$i] ;
            if ($array[$i] != null){
                array_push($vacio, $array[$i]);
            }
        }
          
/*intestino tres elecciones 20%(3)*/
        if(count($vacio)===3) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                  $sintomas_g =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);

     $safe_h = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_g);

     $safe_o = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_p = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_q = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_r = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_s = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_t = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_u = in_array($vacio[2], $sintomas_enfermedad_g);


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
            array_push($sintomas_g, $vacio[0]);
          }

           if($safe_h == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_c, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_e, $vacio[1]);
          }
            if($safe_m == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_g, $vacio[1]);
          }

             if($safe_o == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_p == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_q == true){
            array_push($sintomas_c, $vacio[2]);
          }
          if($safe_r == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_s == true){
            array_push($sintomas_e, $vacio[2]);
          }
            if($safe_t == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_u == true){
            array_push($sintomas_g, $vacio[2]);
          }


       if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

          if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

                if( count($sintomas_f) == 3){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_g) == 3){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       
        elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }



    /*intestino cuatro elecciones 30%(4)*/
        if(count($vacio)===4) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                  $sintomas_g =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);

     $safe_h = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_g);

     $safe_o = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_p = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_q = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_r = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_s = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_t = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_u = in_array($vacio[2], $sintomas_enfermedad_g);

     $safe_oa = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_pa = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_qa = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_ra = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_sa = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_ta = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_ua = in_array($vacio[3], $sintomas_enfermedad_g);


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
            array_push($sintomas_g, $vacio[0]);
          }

           if($safe_h == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_c, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_e, $vacio[1]);
          }
            if($safe_m == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_g, $vacio[1]);
          }

             if($safe_o == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_p == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_q == true){
            array_push($sintomas_c, $vacio[2]);
          }
          if($safe_r == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_s == true){
            array_push($sintomas_e, $vacio[2]);
          }
            if($safe_t == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_u == true){
            array_push($sintomas_g, $vacio[2]);
          }

           if($safe_oa == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_pa == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_qa == true){
            array_push($sintomas_c, $vacio[3]);
          }
          if($safe_ra == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_sa == true){
            array_push($sintomas_e, $vacio[3]);
          }
            if($safe_ta == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_ua == true){
            array_push($sintomas_g, $vacio[3]);
          }


   if( count($sintomas_a) == 4){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 4){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 4){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


       if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

          if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

                if( count($sintomas_f) == 3){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_g) == 3){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       
        elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }




       /*intestino cinco elecciones 30%(5)*/
        if(count($vacio)===5) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                  $sintomas_g =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);

     $safe_h = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_g);

     $safe_o = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_p = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_q = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_r = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_s = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_t = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_u = in_array($vacio[2], $sintomas_enfermedad_g);

     $safe_oa = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_pa = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_qa = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_ra = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_sa = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_ta = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_ua = in_array($vacio[3], $sintomas_enfermedad_g);

     $safe_ob = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_pb = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_qb = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_rb = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_sb = in_array($vacio[4], $sintomas_enfermedad_e);
     $safe_tb = in_array($vacio[4], $sintomas_enfermedad_f);
     $safe_ub = in_array($vacio[4], $sintomas_enfermedad_g);


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
            array_push($sintomas_g, $vacio[0]);
          }

           if($safe_h == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_c, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_e, $vacio[1]);
          }
            if($safe_m == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_g, $vacio[1]);
          }

             if($safe_o == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_p == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_q == true){
            array_push($sintomas_c, $vacio[2]);
          }
          if($safe_r == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_s == true){
            array_push($sintomas_e, $vacio[2]);
          }
            if($safe_t == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_u == true){
            array_push($sintomas_g, $vacio[2]);
          }

           if($safe_oa == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_pa == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_qa == true){
            array_push($sintomas_c, $vacio[3]);
          }
          if($safe_ra == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_sa == true){
            array_push($sintomas_e, $vacio[3]);
          }
            if($safe_ta == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_ua == true){
            array_push($sintomas_g, $vacio[3]);
          }

          if($safe_ob == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_pb == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_qb == true){
            array_push($sintomas_c, $vacio[4]);
          }
          if($safe_rb == true){
            array_push($sintomas_d, $vacio[4]);
          }
           if($safe_sb == true){
            array_push($sintomas_e, $vacio[4]);
          }
            if($safe_tb == true){
            array_push($sintomas_f, $vacio[4]);
          }
           if($safe_ub == true){
            array_push($sintomas_g, $vacio[4]);
          }

   if( count($sintomas_a) == 5){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 5){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 5){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 5){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 5){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 5){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 5){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }


   if( count($sintomas_a) == 4){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 4){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 4){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


       if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

          if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

                if( count($sintomas_f) == 3){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_g) == 3){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       
        elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }



        /*intestino seis elecciones 30%(6)*/
        if(count($vacio)===6) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                  $sintomas_g =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);

     $safe_h = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_g);

     $safe_o = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_p = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_q = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_r = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_s = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_t = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_u = in_array($vacio[2], $sintomas_enfermedad_g);

     $safe_oa = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_pa = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_qa = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_ra = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_sa = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_ta = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_ua = in_array($vacio[3], $sintomas_enfermedad_g);

     $safe_ob = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_pb = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_qb = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_rb = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_sb = in_array($vacio[4], $sintomas_enfermedad_e);
     $safe_tb = in_array($vacio[4], $sintomas_enfermedad_f);
     $safe_ub = in_array($vacio[4], $sintomas_enfermedad_g);

     $safe_oc = in_array($vacio[5], $sintomas_enfermedad_a);
     $safe_pc = in_array($vacio[5], $sintomas_enfermedad_b);
     $safe_qc = in_array($vacio[5], $sintomas_enfermedad_c);
     $safe_rc = in_array($vacio[5], $sintomas_enfermedad_d);
     $safe_sc = in_array($vacio[5], $sintomas_enfermedad_e);
     $safe_tc = in_array($vacio[5], $sintomas_enfermedad_f);
     $safe_uc = in_array($vacio[5], $sintomas_enfermedad_g);


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
            array_push($sintomas_g, $vacio[0]);
          }

           if($safe_h == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_c, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_e, $vacio[1]);
          }
            if($safe_m == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_g, $vacio[1]);
          }

             if($safe_o == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_p == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_q == true){
            array_push($sintomas_c, $vacio[2]);
          }
          if($safe_r == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_s == true){
            array_push($sintomas_e, $vacio[2]);
          }
            if($safe_t == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_u == true){
            array_push($sintomas_g, $vacio[2]);
          }

           if($safe_oa == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_pa == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_qa == true){
            array_push($sintomas_c, $vacio[3]);
          }
          if($safe_ra == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_sa == true){
            array_push($sintomas_e, $vacio[3]);
          }
            if($safe_ta == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_ua == true){
            array_push($sintomas_g, $vacio[3]);
          }

          if($safe_ob == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_pb == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_qb == true){
            array_push($sintomas_c, $vacio[4]);
          }
          if($safe_rb == true){
            array_push($sintomas_d, $vacio[4]);
          }
           if($safe_sb == true){
            array_push($sintomas_e, $vacio[4]);
          }
            if($safe_tb == true){
            array_push($sintomas_f, $vacio[4]);
          }
           if($safe_ub == true){
            array_push($sintomas_g, $vacio[4]);
          }

          if($safe_oc == true){
            array_push($sintomas_a, $vacio[5]);
          }
           if($safe_pc == true){
            array_push($sintomas_b, $vacio[5]);
          }
           if($safe_qc == true){
            array_push($sintomas_c, $vacio[5]);
          }
          if($safe_rc == true){
            array_push($sintomas_d, $vacio[5]);
          }
           if($safe_sc == true){
            array_push($sintomas_e, $vacio[5]);
          }
            if($safe_tc == true){
            array_push($sintomas_f, $vacio[5]);
          }
           if($safe_uc == true){
            array_push($sintomas_g, $vacio[5]);
          }



           if( count($sintomas_a) == 6){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 6){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 6){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 6){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 6){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 6){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 6){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

   if( count($sintomas_a) == 5){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 5){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 5){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 5){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 5){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 5){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 5){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }


   if( count($sintomas_a) == 4){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 4){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 4){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


       if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

          if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

                if( count($sintomas_f) == 3){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_g) == 3){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       
        elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }



         /*intestino seis elecciones 30%(7)*/
        if(count($vacio)===7) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                  $sintomas_g =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);

     $safe_h = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_i = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_j = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_k = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_g);

     $safe_o = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_p = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_q = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_r = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_s = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_t = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_u = in_array($vacio[2], $sintomas_enfermedad_g);

     $safe_oa = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_pa = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_qa = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_ra = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_sa = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_ta = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_ua = in_array($vacio[3], $sintomas_enfermedad_g);

     $safe_ob = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_pb = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_qb = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_rb = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_sb = in_array($vacio[4], $sintomas_enfermedad_e);
     $safe_tb = in_array($vacio[4], $sintomas_enfermedad_f);
     $safe_ub = in_array($vacio[4], $sintomas_enfermedad_g);

     $safe_oc = in_array($vacio[5], $sintomas_enfermedad_a);
     $safe_pc = in_array($vacio[5], $sintomas_enfermedad_b);
     $safe_qc = in_array($vacio[5], $sintomas_enfermedad_c);
     $safe_rc = in_array($vacio[5], $sintomas_enfermedad_d);
     $safe_sc = in_array($vacio[5], $sintomas_enfermedad_e);
     $safe_tc = in_array($vacio[5], $sintomas_enfermedad_f);
     $safe_uc = in_array($vacio[5], $sintomas_enfermedad_g);

     $safe_od = in_array($vacio[6], $sintomas_enfermedad_a);
     $safe_pd = in_array($vacio[6], $sintomas_enfermedad_b);
     $safe_qd = in_array($vacio[6], $sintomas_enfermedad_c);
     $safe_rd = in_array($vacio[6], $sintomas_enfermedad_d);
     $safe_sd = in_array($vacio[6], $sintomas_enfermedad_e);
     $safe_td = in_array($vacio[6], $sintomas_enfermedad_f);
     $safe_ud = in_array($vacio[6], $sintomas_enfermedad_g);


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
            array_push($sintomas_g, $vacio[0]);
          }

           if($safe_h == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_i == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_j == true){
            array_push($sintomas_c, $vacio[1]);
          }
          if($safe_k == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_e, $vacio[1]);
          }
            if($safe_m == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_g, $vacio[1]);
          }

             if($safe_o == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_p == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_q == true){
            array_push($sintomas_c, $vacio[2]);
          }
          if($safe_r == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_s == true){
            array_push($sintomas_e, $vacio[2]);
          }
            if($safe_t == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_u == true){
            array_push($sintomas_g, $vacio[2]);
          }

           if($safe_oa == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_pa == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_qa == true){
            array_push($sintomas_c, $vacio[3]);
          }
          if($safe_ra == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_sa == true){
            array_push($sintomas_e, $vacio[3]);
          }
            if($safe_ta == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_ua == true){
            array_push($sintomas_g, $vacio[3]);
          }

          if($safe_ob == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_pb == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_qb == true){
            array_push($sintomas_c, $vacio[4]);
          }
          if($safe_rb == true){
            array_push($sintomas_d, $vacio[4]);
          }
           if($safe_sb == true){
            array_push($sintomas_e, $vacio[4]);
          }
            if($safe_tb == true){
            array_push($sintomas_f, $vacio[4]);
          }
           if($safe_ub == true){
            array_push($sintomas_g, $vacio[4]);
          }

          if($safe_oc == true){
            array_push($sintomas_a, $vacio[5]);
          }
           if($safe_pc == true){
            array_push($sintomas_b, $vacio[5]);
          }
           if($safe_qc == true){
            array_push($sintomas_c, $vacio[5]);
          }
          if($safe_rc == true){
            array_push($sintomas_d, $vacio[5]);
          }
           if($safe_sc == true){
            array_push($sintomas_e, $vacio[5]);
          }
            if($safe_tc == true){
            array_push($sintomas_f, $vacio[5]);
          }
           if($safe_uc == true){
            array_push($sintomas_g, $vacio[5]);
          }

          if($safe_od == true){
            array_push($sintomas_a, $vacio[6]);
          }
           if($safe_pd == true){
            array_push($sintomas_b, $vacio[6]);
          }
           if($safe_qd == true){
            array_push($sintomas_c, $vacio[6]);
          }
          if($safe_rd == true){
            array_push($sintomas_d, $vacio[6]);
          }
           if($safe_sd == true){
            array_push($sintomas_e, $vacio[6]);
          }
            if($safe_td == true){
            array_push($sintomas_f, $vacio[6]);
          }
           if($safe_ud == true){
            array_push($sintomas_g, $vacio[6]);
          }


      if( count($sintomas_a) == 7){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 7){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 7){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 7){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 7){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 7){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 7){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }


           if( count($sintomas_a) == 6){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 6){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 6){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 6){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 6){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 6){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 6){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

   if( count($sintomas_a) == 5){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 5){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 5){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 5){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 5){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 5){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 5){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }


   if( count($sintomas_a) == 4){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

          if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_f) == 4){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

          if( count($sintomas_g) == 4){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


       if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

          if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

                if( count($sintomas_f) == 3){
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
       }elseif (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

          if( count($sintomas_g) == 3){
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }elseif (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       
        elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }


       elseif(count($vacio)>=8){
            $enfermedad = "Demasiados síntomas, y no corresponden a una enfermedad particular - Recuerde no automedicarse y siempre consultar un especialista ";
            $d = '';
            $x = '';
            $enlace='';
            $mensaje = '';
            $especialidades[0] = '';
            $especialidades[1] = '';
            $especialidades[2] = '';
            $especialidades[3] = '';
            return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
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
            return view('organos.intestino_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
 }

 /*public function lista_medico_intestino_medicina_general(Request $request){
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
  public function lista_medico_intestino_coloproctologia(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'COLOPROCTOLOGÍA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }
  public function lista_medico_intestino_medicina_familiar(Request $request){
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
   public function lista_medico_intestino_gastroenterologia(Request $request){
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
 } */
}
