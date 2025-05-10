<?php

namespace App\Http\Controllers\Organos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class ojos extends Controller
{
     public function ojos_vista(Request $request){
        $array = array($request->ojos1,$request->ojos2,$request->ojos3,$request->ojos4,$request->ojos5,$request->ojos6,$request->ojos7,$request->ojos8,$request->ojos9,$request->ojos10,$request->ojos11,$request->ojos12,$request->ojos13,$request->ojos14,$request->ojos15,$request->ojos16,$request->ojos17,$request->ojos18,$request->ojos19,$request->ojos20,$request->ojos21,$request->ojos22,$request->ojos23,$request->ojos24,$request->ojos25,$request->ojos26,$request->ojos27,$request->ojos28,$request->ojos29,$request->ojos30,$request->ojos31,$request->ojos32,$request->ojos33,$request->ojos34,$request->ojos35,$request->ojos36,$request->ojos37,$request->ojos38,$request->ojos39,$request->ojos40,$request->ojos41,$request->ojos42,$request->ojos43,$request->ojos44,$request->ojos45,$request->ojos46);
        $user = Auth::id();
        $mensaje= '. Le sugerimos buscar en las siguientes especialidades médicas y consultar un médico:';
        $d='Usted puede tener la enfermedad:';
        $x= 'Probabilidad de coincidencia de enfermedad:';
        $enfermedades = ['Error de refración-Miopía','Error de refración-Hipermetropía','Error de refración-Presbicia','Error de refración-Astigmatismo','Cataratas','Daltonismo','Glaucoma agudo de ángulo cerrado','Neuritis óptica','Degeneración macular','Desprendimiento de retina','Conjutivitis','Orzuelo'];
        $enlaces=['https://www.mayoclinic.org/es-es/diseases-conditions/nearsightedness/symptoms-causes/syc-20375556','https://www.mayoclinic.org/es-es/diseases-conditions/farsightedness/symptoms-causes/syc-20372495','https://www.mayoclinic.org/es-es/diseases-conditions/presbyopia/symptoms-causes/syc-20363328','https://www.mayoclinic.org/es-es/diseases-conditions/astigmatism/symptoms-causes/syc-20353835','https://www.mayoclinic.org/es-es/diseases-conditions/cataracts/symptoms-causes/syc-20353790','https://www.mayoclinic.org/es-es/diseases-conditions/poor-color-vision/symptoms-causes/syc-20354988','https://www.mayoclinic.org/es-es/diseases-conditions/glaucoma/symptoms-causes/syc-20372839','https://www.mayoclinic.org/es-es/diseases-conditions/optic-neuritis/symptoms-causes/syc-20354953','https://www.mayoclinic.org/es-es/diseases-conditions/wet-macular-degeneration/symptoms-causes/syc-20351107','https://www.mayoclinic.org/es-es/diseases-conditions/retinal-detachment/multimedia/retinal-detachment/img-20006758','https://www.mayoclinic.org/es-es/diseases-conditions/pink-eye/symptoms-causes/syc-20376355','https://www.mayoclinic.org/es-es/diseases-conditions/sty/symptoms-causes/syc-20378017e'];
        $especialidades = ['Medicina General','Medicina Interna','Oftalmología'];
        $ruta = ['/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'];
        $probabilidad = ['30%','40%','50%','60%','70%','0%'];
        $probability = "{$probabilidad[0]}";$probability_a = "{$probabilidad[1]}";$probability_b = "{$probabilidad[2]}";$probability_c = "{$probabilidad[3]}";$probability_d = "{$probabilidad[4]}";$probability_zero = "{$probabilidad[5]}";
        $sintomas_enfermedad_a = [1,2,3,4,5];
        $sintomas_enfermedad_b = [2,6,7,8];
        $sintomas_enfermedad_c = [8,9,10];
        $sintomas_enfermedad_d = [1,3,7,11,12];
        $sintomas_enfermedad_e = [1,11,13,14,15,16];
        $sintomas_enfermedad_f = [17,18,19];
        $sintomas_enfermedad_g = [1,3,20,21,22,23];
        $sintomas_enfermedad_h = [24,25,26,27,28];
        $sintomas_enfermedad_i = [29,30,31,32,33,34,35,36];
        $sintomas_enfermedad_j = [1,28,37,38,39];
        $sintomas_enfermedad_k = [23,40,41,42,43];
        $sintomas_enfermedad_l = [41,44,45,46];

        $vacio = [];
        for ($i=0; $i < count($array); $i++){
            $array[$i] ;
            if ($array[$i] != null){
                array_push($vacio, $array[$i]);
            }
        }
        /*ojos dos elecciones 20%(2)*/
        if(count($vacio)===2) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                 $sintomas_g =  [];
                $sintomas_h =  [];
               $sintomas_i =  [];
              $sintomas_j =  [];
             $sintomas_k =  [];
            $sintomas_l =  [];

     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);
     $safe_h = in_array($vacio[0], $sintomas_enfermedad_h);
     $safe_i = in_array($vacio[0], $sintomas_enfermedad_i);
     $safe_j = in_array($vacio[0], $sintomas_enfermedad_j);
     $safe_k = in_array($vacio[0], $sintomas_enfermedad_k);
     $safe_l = in_array($vacio[0], $sintomas_enfermedad_l);

     $safe_m = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_u = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_v = in_array($vacio[1], $sintomas_enfermedad_j);
     $safe_w = in_array($vacio[1], $sintomas_enfermedad_k);
     $safe_x = in_array($vacio[1], $sintomas_enfermedad_l);


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
            array_push($sintomas_h, $vacio[0]);
          }
           if($safe_i == true){
            array_push($sintomas_i, $vacio[0]);
          }
           if($safe_j == true){
            array_push($sintomas_j, $vacio[0]);
          }
           if($safe_k == true){
            array_push($sintomas_k, $vacio[0]);
          }
           if($safe_l == true){
            array_push($sintomas_l, $vacio[0]);
          }

          if($safe_m == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_s == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_h, $vacio[1]);
          }
           if($safe_u == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_v == true){
            array_push($sintomas_j, $vacio[1]);
          }
           if($safe_w == true){
            array_push($sintomas_k, $vacio[1]);
          }
           if($safe_x == true){
            array_push($sintomas_l, $vacio[1]);
          }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 2) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 2) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

     
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
            elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_k) == 1) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_l) == 1) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

        /*ojos tres elecciones 30%(3)*/
        if(count($vacio)===3) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                 $sintomas_g =  [];
                $sintomas_h =  [];
               $sintomas_i =  [];
              $sintomas_j =  [];
             $sintomas_k =  [];
            $sintomas_l =  [];

     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);
     $safe_h = in_array($vacio[0], $sintomas_enfermedad_h);
     $safe_i = in_array($vacio[0], $sintomas_enfermedad_i);
     $safe_j = in_array($vacio[0], $sintomas_enfermedad_j);
     $safe_k = in_array($vacio[0], $sintomas_enfermedad_k);
     $safe_l = in_array($vacio[0], $sintomas_enfermedad_l);

     $safe_m = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_u = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_v = in_array($vacio[1], $sintomas_enfermedad_j);
     $safe_w = in_array($vacio[1], $sintomas_enfermedad_k);
     $safe_x = in_array($vacio[1], $sintomas_enfermedad_l);

     $safe_ma = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_na = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_oa = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_pa = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_qa = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_ra = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_sa = in_array($vacio[2], $sintomas_enfermedad_g);
     $safe_ta = in_array($vacio[2], $sintomas_enfermedad_h);
     $safe_ua = in_array($vacio[2], $sintomas_enfermedad_i);
     $safe_va = in_array($vacio[2], $sintomas_enfermedad_j);
     $safe_wa = in_array($vacio[2], $sintomas_enfermedad_k);
     $safe_xa = in_array($vacio[2], $sintomas_enfermedad_l);


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
            array_push($sintomas_h, $vacio[0]);
          }
           if($safe_i == true){
            array_push($sintomas_i, $vacio[0]);
          }
           if($safe_j == true){
            array_push($sintomas_j, $vacio[0]);
          }
           if($safe_k == true){
            array_push($sintomas_k, $vacio[0]);
          }
           if($safe_l == true){
            array_push($sintomas_l, $vacio[0]);
          }

          if($safe_m == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_s == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_h, $vacio[1]);
          }
           if($safe_u == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_v == true){
            array_push($sintomas_j, $vacio[1]);
          }
           if($safe_w == true){
            array_push($sintomas_k, $vacio[1]);
          }
           if($safe_x == true){
            array_push($sintomas_l, $vacio[1]);
          }

           if($safe_ma == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_na == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_oa == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_pa == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_qa == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_ra == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_sa == true){
            array_push($sintomas_g, $vacio[2]);
          }
           if($safe_ta == true){
            array_push($sintomas_h, $vacio[2]);
          }
           if($safe_ua == true){
            array_push($sintomas_i, $vacio[2]);
          }
           if($safe_va == true){
            array_push($sintomas_j, $vacio[2]);
          }
           if($safe_wa == true){
            array_push($sintomas_k, $vacio[2]);
          }
           if($safe_xa == true){
            array_push($sintomas_l, $vacio[2]);
          }

      if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 3) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 3) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 3) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 3) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 3) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 3) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 2) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 2) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

     
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
            elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_k) == 1) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_l) == 1) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

    /*ojos cuatro elecciones 40%(4)*/
        if(count($vacio)===4) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                 $sintomas_g =  [];
                $sintomas_h =  [];
               $sintomas_i =  [];
              $sintomas_j =  [];
             $sintomas_k =  [];
            $sintomas_l =  [];

     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);
     $safe_h = in_array($vacio[0], $sintomas_enfermedad_h);
     $safe_i = in_array($vacio[0], $sintomas_enfermedad_i);
     $safe_j = in_array($vacio[0], $sintomas_enfermedad_j);
     $safe_k = in_array($vacio[0], $sintomas_enfermedad_k);
     $safe_l = in_array($vacio[0], $sintomas_enfermedad_l);

     $safe_m = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_u = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_v = in_array($vacio[1], $sintomas_enfermedad_j);
     $safe_w = in_array($vacio[1], $sintomas_enfermedad_k);
     $safe_x = in_array($vacio[1], $sintomas_enfermedad_l);

     $safe_ma = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_na = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_oa = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_pa = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_qa = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_ra = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_sa = in_array($vacio[2], $sintomas_enfermedad_g);
     $safe_ta = in_array($vacio[2], $sintomas_enfermedad_h);
     $safe_ua = in_array($vacio[2], $sintomas_enfermedad_i);
     $safe_va = in_array($vacio[2], $sintomas_enfermedad_j);
     $safe_wa = in_array($vacio[2], $sintomas_enfermedad_k);
     $safe_xa = in_array($vacio[2], $sintomas_enfermedad_l);

     $safe_mb = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_nb = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_ob = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_pb = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_qb = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_rb = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_sb = in_array($vacio[3], $sintomas_enfermedad_g);
     $safe_tb = in_array($vacio[3], $sintomas_enfermedad_h);
     $safe_ub = in_array($vacio[3], $sintomas_enfermedad_i);
     $safe_vb = in_array($vacio[3], $sintomas_enfermedad_j);
     $safe_wb = in_array($vacio[3], $sintomas_enfermedad_k);
     $safe_xb = in_array($vacio[3], $sintomas_enfermedad_l);


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
            array_push($sintomas_h, $vacio[0]);
          }
           if($safe_i == true){
            array_push($sintomas_i, $vacio[0]);
          }
           if($safe_j == true){
            array_push($sintomas_j, $vacio[0]);
          }
           if($safe_k == true){
            array_push($sintomas_k, $vacio[0]);
          }
           if($safe_l == true){
            array_push($sintomas_l, $vacio[0]);
          }

          if($safe_m == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_s == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_h, $vacio[1]);
          }
           if($safe_u == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_v == true){
            array_push($sintomas_j, $vacio[1]);
          }
           if($safe_w == true){
            array_push($sintomas_k, $vacio[1]);
          }
           if($safe_x == true){
            array_push($sintomas_l, $vacio[1]);
          }

           if($safe_ma == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_na == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_oa == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_pa == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_qa == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_ra == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_sa == true){
            array_push($sintomas_g, $vacio[2]);
          }
           if($safe_ta == true){
            array_push($sintomas_h, $vacio[2]);
          }
           if($safe_ua == true){
            array_push($sintomas_i, $vacio[2]);
          }
           if($safe_va == true){
            array_push($sintomas_j, $vacio[2]);
          }
           if($safe_wa == true){
            array_push($sintomas_k, $vacio[2]);
          }
           if($safe_xa == true){
            array_push($sintomas_l, $vacio[2]);
          }

           if($safe_mb == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_nb == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_ob == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_pb == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_qb == true){
            array_push($sintomas_e, $vacio[3]);
          }
           if($safe_rb == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_sb == true){
            array_push($sintomas_g, $vacio[3]);
          }
           if($safe_tb == true){
            array_push($sintomas_h, $vacio[3]);
          }
           if($safe_ub == true){
            array_push($sintomas_i, $vacio[3]);
          }
           if($safe_vb == true){
            array_push($sintomas_j, $vacio[3]);
          }
           if($safe_wb == true){
            array_push($sintomas_k, $vacio[3]);
          }
           if($safe_xb == true){
            array_push($sintomas_l, $vacio[3]);
          }

      if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 4) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 4) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 4) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 4) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 4) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 4) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 4) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 4) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 3) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 3) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 3) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 3) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 3) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 3) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 2) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 2) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

     
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
            elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_k) == 1) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_l) == 1) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

  /*ojos cinco elecciones 50%(5)*/
        if(count($vacio)===5) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                 $sintomas_g =  [];
                $sintomas_h =  [];
               $sintomas_i =  [];
              $sintomas_j =  [];
             $sintomas_k =  [];
            $sintomas_l =  [];

     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);
     $safe_h = in_array($vacio[0], $sintomas_enfermedad_h);
     $safe_i = in_array($vacio[0], $sintomas_enfermedad_i);
     $safe_j = in_array($vacio[0], $sintomas_enfermedad_j);
     $safe_k = in_array($vacio[0], $sintomas_enfermedad_k);
     $safe_l = in_array($vacio[0], $sintomas_enfermedad_l);

     $safe_m = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_u = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_v = in_array($vacio[1], $sintomas_enfermedad_j);
     $safe_w = in_array($vacio[1], $sintomas_enfermedad_k);
     $safe_x = in_array($vacio[1], $sintomas_enfermedad_l);

     $safe_ma = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_na = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_oa = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_pa = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_qa = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_ra = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_sa = in_array($vacio[2], $sintomas_enfermedad_g);
     $safe_ta = in_array($vacio[2], $sintomas_enfermedad_h);
     $safe_ua = in_array($vacio[2], $sintomas_enfermedad_i);
     $safe_va = in_array($vacio[2], $sintomas_enfermedad_j);
     $safe_wa = in_array($vacio[2], $sintomas_enfermedad_k);
     $safe_xa = in_array($vacio[2], $sintomas_enfermedad_l);

     $safe_mb = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_nb = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_ob = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_pb = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_qb = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_rb = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_sb = in_array($vacio[3], $sintomas_enfermedad_g);
     $safe_tb = in_array($vacio[3], $sintomas_enfermedad_h);
     $safe_ub = in_array($vacio[3], $sintomas_enfermedad_i);
     $safe_vb = in_array($vacio[3], $sintomas_enfermedad_j);
     $safe_wb = in_array($vacio[3], $sintomas_enfermedad_k);
     $safe_xb = in_array($vacio[3], $sintomas_enfermedad_l);

     $safe_mc = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_nc = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_oc = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_pc = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_qc = in_array($vacio[4], $sintomas_enfermedad_e);
     $safe_rc = in_array($vacio[4], $sintomas_enfermedad_f);
     $safe_sc = in_array($vacio[4], $sintomas_enfermedad_g);
     $safe_tc = in_array($vacio[4], $sintomas_enfermedad_h);
     $safe_uc = in_array($vacio[4], $sintomas_enfermedad_i);
     $safe_vc = in_array($vacio[4], $sintomas_enfermedad_j);
     $safe_wc = in_array($vacio[4], $sintomas_enfermedad_k);
     $safe_xc = in_array($vacio[4], $sintomas_enfermedad_l);


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
            array_push($sintomas_h, $vacio[0]);
          }
           if($safe_i == true){
            array_push($sintomas_i, $vacio[0]);
          }
           if($safe_j == true){
            array_push($sintomas_j, $vacio[0]);
          }
           if($safe_k == true){
            array_push($sintomas_k, $vacio[0]);
          }
           if($safe_l == true){
            array_push($sintomas_l, $vacio[0]);
          }

          if($safe_m == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_s == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_h, $vacio[1]);
          }
           if($safe_u == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_v == true){
            array_push($sintomas_j, $vacio[1]);
          }
           if($safe_w == true){
            array_push($sintomas_k, $vacio[1]);
          }
           if($safe_x == true){
            array_push($sintomas_l, $vacio[1]);
          }

           if($safe_ma == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_na == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_oa == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_pa == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_qa == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_ra == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_sa == true){
            array_push($sintomas_g, $vacio[2]);
          }
           if($safe_ta == true){
            array_push($sintomas_h, $vacio[2]);
          }
           if($safe_ua == true){
            array_push($sintomas_i, $vacio[2]);
          }
           if($safe_va == true){
            array_push($sintomas_j, $vacio[2]);
          }
           if($safe_wa == true){
            array_push($sintomas_k, $vacio[2]);
          }
           if($safe_xa == true){
            array_push($sintomas_l, $vacio[2]);
          }

           if($safe_mb == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_nb == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_ob == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_pb == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_qb == true){
            array_push($sintomas_e, $vacio[3]);
          }
           if($safe_rb == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_sb == true){
            array_push($sintomas_g, $vacio[3]);
          }
           if($safe_tb == true){
            array_push($sintomas_h, $vacio[3]);
          }
           if($safe_ub == true){
            array_push($sintomas_i, $vacio[3]);
          }
           if($safe_vb == true){
            array_push($sintomas_j, $vacio[3]);
          }
           if($safe_wb == true){
            array_push($sintomas_k, $vacio[3]);
          }
           if($safe_xb == true){
            array_push($sintomas_l, $vacio[3]);
          }

           if($safe_mc == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_nc == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_oc == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_pc == true){
            array_push($sintomas_d, $vacio[4]);
          }
           if($safe_qc == true){
            array_push($sintomas_e, $vacio[4]);
          }
           if($safe_rc == true){
            array_push($sintomas_f, $vacio[4]);
          }
           if($safe_sc == true){
            array_push($sintomas_g, $vacio[4]);
          }
           if($safe_tc == true){
            array_push($sintomas_h, $vacio[4]);
          }
           if($safe_uc == true){
            array_push($sintomas_i, $vacio[4]);
          }
           if($safe_vc == true){
            array_push($sintomas_j, $vacio[4]);
          }
           if($safe_wc == true){
            array_push($sintomas_k, $vacio[4]);
          }
           if($safe_xc == true){
            array_push($sintomas_l, $vacio[4]);
          }

       if (count($sintomas_a) == 5) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 5) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 5) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 5) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 5) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 5) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 5) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 5) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 5) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 5) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 5) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 5) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 4) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 4) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 4) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 4) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 4) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 4) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 4) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 4) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 3) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 3) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 3) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 3) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 3) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 3) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 2) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 2) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

     
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
            elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_k) == 1) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_l) == 1) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

       /*ojos seis elecciones 60%(6)*/
        if(count($vacio)===6) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
                $sintomas_e =  [];
                 $sintomas_f =  [];
                 $sintomas_g =  [];
                $sintomas_h =  [];
               $sintomas_i =  [];
              $sintomas_j =  [];
             $sintomas_k =  [];
            $sintomas_l =  [];

     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);
     $safe_e = in_array($vacio[0], $sintomas_enfermedad_e);
     $safe_f = in_array($vacio[0], $sintomas_enfermedad_f);
     $safe_g = in_array($vacio[0], $sintomas_enfermedad_g);
     $safe_h = in_array($vacio[0], $sintomas_enfermedad_h);
     $safe_i = in_array($vacio[0], $sintomas_enfermedad_i);
     $safe_j = in_array($vacio[0], $sintomas_enfermedad_j);
     $safe_k = in_array($vacio[0], $sintomas_enfermedad_k);
     $safe_l = in_array($vacio[0], $sintomas_enfermedad_l);

     $safe_m = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_u = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_v = in_array($vacio[1], $sintomas_enfermedad_j);
     $safe_w = in_array($vacio[1], $sintomas_enfermedad_k);
     $safe_x = in_array($vacio[1], $sintomas_enfermedad_l);

     $safe_ma = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_na = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_oa = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_pa = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_qa = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_ra = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_sa = in_array($vacio[2], $sintomas_enfermedad_g);
     $safe_ta = in_array($vacio[2], $sintomas_enfermedad_h);
     $safe_ua = in_array($vacio[2], $sintomas_enfermedad_i);
     $safe_va = in_array($vacio[2], $sintomas_enfermedad_j);
     $safe_wa = in_array($vacio[2], $sintomas_enfermedad_k);
     $safe_xa = in_array($vacio[2], $sintomas_enfermedad_l);

     $safe_mb = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_nb = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_ob = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_pb = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_qb = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_rb = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_sb = in_array($vacio[3], $sintomas_enfermedad_g);
     $safe_tb = in_array($vacio[3], $sintomas_enfermedad_h);
     $safe_ub = in_array($vacio[3], $sintomas_enfermedad_i);
     $safe_vb = in_array($vacio[3], $sintomas_enfermedad_j);
     $safe_wb = in_array($vacio[3], $sintomas_enfermedad_k);
     $safe_xb = in_array($vacio[3], $sintomas_enfermedad_l);

     $safe_mc = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_nc = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_oc = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_pc = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_qc = in_array($vacio[4], $sintomas_enfermedad_e);
     $safe_rc = in_array($vacio[4], $sintomas_enfermedad_f);
     $safe_sc = in_array($vacio[4], $sintomas_enfermedad_g);
     $safe_tc = in_array($vacio[4], $sintomas_enfermedad_h);
     $safe_uc = in_array($vacio[4], $sintomas_enfermedad_i);
     $safe_vc = in_array($vacio[4], $sintomas_enfermedad_j);
     $safe_wc = in_array($vacio[4], $sintomas_enfermedad_k);
     $safe_xc = in_array($vacio[4], $sintomas_enfermedad_l);

     $safe_md = in_array($vacio[5], $sintomas_enfermedad_a);
     $safe_nd = in_array($vacio[5], $sintomas_enfermedad_b);
     $safe_od = in_array($vacio[5], $sintomas_enfermedad_c);
     $safe_pd = in_array($vacio[5], $sintomas_enfermedad_d);
     $safe_qd = in_array($vacio[5], $sintomas_enfermedad_e);
     $safe_rd = in_array($vacio[5], $sintomas_enfermedad_f);
     $safe_sd = in_array($vacio[5], $sintomas_enfermedad_g);
     $safe_td = in_array($vacio[5], $sintomas_enfermedad_h);
     $safe_ud = in_array($vacio[5], $sintomas_enfermedad_i);
     $safe_vd = in_array($vacio[5], $sintomas_enfermedad_j);
     $safe_wd = in_array($vacio[5], $sintomas_enfermedad_k);
     $safe_xd = in_array($vacio[5], $sintomas_enfermedad_l);


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
            array_push($sintomas_h, $vacio[0]);
          }
           if($safe_i == true){
            array_push($sintomas_i, $vacio[0]);
          }
           if($safe_j == true){
            array_push($sintomas_j, $vacio[0]);
          }
           if($safe_k == true){
            array_push($sintomas_k, $vacio[0]);
          }
           if($safe_l == true){
            array_push($sintomas_l, $vacio[0]);
          }

          if($safe_m == true){
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_s == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_h, $vacio[1]);
          }
           if($safe_u == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_v == true){
            array_push($sintomas_j, $vacio[1]);
          }
           if($safe_w == true){
            array_push($sintomas_k, $vacio[1]);
          }
           if($safe_x == true){
            array_push($sintomas_l, $vacio[1]);
          }

           if($safe_ma == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_na == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_oa == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_pa == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_qa == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_ra == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_sa == true){
            array_push($sintomas_g, $vacio[2]);
          }
           if($safe_ta == true){
            array_push($sintomas_h, $vacio[2]);
          }
           if($safe_ua == true){
            array_push($sintomas_i, $vacio[2]);
          }
           if($safe_va == true){
            array_push($sintomas_j, $vacio[2]);
          }
           if($safe_wa == true){
            array_push($sintomas_k, $vacio[2]);
          }
           if($safe_xa == true){
            array_push($sintomas_l, $vacio[2]);
          }

           if($safe_mb == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_nb == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_ob == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_pb == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_qb == true){
            array_push($sintomas_e, $vacio[3]);
          }
           if($safe_rb == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_sb == true){
            array_push($sintomas_g, $vacio[3]);
          }
           if($safe_tb == true){
            array_push($sintomas_h, $vacio[3]);
          }
           if($safe_ub == true){
            array_push($sintomas_i, $vacio[3]);
          }
           if($safe_vb == true){
            array_push($sintomas_j, $vacio[3]);
          }
           if($safe_wb == true){
            array_push($sintomas_k, $vacio[3]);
          }
           if($safe_xb == true){
            array_push($sintomas_l, $vacio[3]);
          }

           if($safe_mc == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_nc == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_oc == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_pc == true){
            array_push($sintomas_d, $vacio[4]);
          }
           if($safe_qc == true){
            array_push($sintomas_e, $vacio[4]);
          }
           if($safe_rc == true){
            array_push($sintomas_f, $vacio[4]);
          }
           if($safe_sc == true){
            array_push($sintomas_g, $vacio[4]);
          }
           if($safe_tc == true){
            array_push($sintomas_h, $vacio[4]);
          }
           if($safe_uc == true){
            array_push($sintomas_i, $vacio[4]);
          }
           if($safe_vc == true){
            array_push($sintomas_j, $vacio[4]);
          }
           if($safe_wc == true){
            array_push($sintomas_k, $vacio[4]);
          }
           if($safe_xc == true){
            array_push($sintomas_l, $vacio[4]);
          }

           if($safe_md == true){
            array_push($sintomas_a, $vacio[5]);
          }
           if($safe_nd == true){
            array_push($sintomas_b, $vacio[5]);
          }
           if($safe_od == true){
            array_push($sintomas_c, $vacio[5]);
          }
           if($safe_pd == true){
            array_push($sintomas_d, $vacio[5]);
          }
           if($safe_qd == true){
            array_push($sintomas_e, $vacio[5]);
          }
           if($safe_rd == true){
            array_push($sintomas_f, $vacio[5]);
          }
           if($safe_sd == true){
            array_push($sintomas_g, $vacio[5]);
          }
           if($safe_td == true){
            array_push($sintomas_h, $vacio[5]);
          }
           if($safe_ud == true){
            array_push($sintomas_i, $vacio[5]);
          }
           if($safe_vd == true){
            array_push($sintomas_j, $vacio[5]);
          }
           if($safe_wd == true){
            array_push($sintomas_k, $vacio[5]);
          }
           if($safe_xd == true){
            array_push($sintomas_l, $vacio[5]);
          }

       if (count($sintomas_a) == 6) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 6) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 6) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 6) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 6) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 6) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 6) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 6) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 6) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 6) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 6) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 6) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_a) == 5) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 5) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 5) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 5) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 5) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 5) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 5) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 5) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 5) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 5) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 5) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 5) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 4) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 4) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 4) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 4) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 4) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 4) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 4) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 4) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 3) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 3) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 3) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 3) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 3) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 3) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_k) == 2) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_l) == 2) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

     
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
            elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_k) == 1) {
           $enfermedad = " {$enfermedades[10]}";$enlace="{$enlaces[10]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_l) == 1) {
           $enfermedad = " {$enfermedades[11]}";$enlace="{$enlaces[11]}";
    return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }
              elseif(count($vacio)>=7){
            $enfermedad = "Demasiados síntomas, y no corresponden a una enfermedad particular - Recuerde no automedicarse y siempre consultar un especialista ";
            $d = '';
            $x = '';
            $enlace = '';
            $mensaje = '';
            $especialidades[0] = '';
            $especialidades[1] = '';
            $especialidades[2] = '';
            $especialidades[3] = '';
            return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
            else{
            $enfermedad = "Recuerde no automedicarse y siempre consultar un especialista";
            $d = '';
            $x = '';
            $enlace = '';
            $mensaje = '';
            $especialidades[0] = '';
            $especialidades[1] = '';
            $especialidades[2] = '';
            $especialidades[3] = '';
            return view('organos.ojos_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
}

 /*public function lista_medico_ojos_oftalmologia(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'OFTALMOLOGÍA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }
  public function lista_medico_ojos_medicina_general(Request $request){
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
  public function lista_medico_ojos_medicina_familiar(Request $request){
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
  public function lista_medico_ojos_medicina_interna(Request $request){
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
