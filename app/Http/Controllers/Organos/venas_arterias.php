<?php

namespace App\Http\Controllers\Organos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class venas_arterias extends Controller
{
     public function venas_arterias_vista(Request $request){
        $array = array($request->venas_arterias1,$request->venas_arterias2,$request->venas_arterias3,$request->venas_arterias4,$request->venas_arterias5,$request->venas_arterias6,$request->venas_arterias7,$request->venas_arterias8,$request->venas_arterias9,$request->venas_arterias10,$request->venas_arterias11,$request->venas_arterias12,$request->venas_arterias13,$request->venas_arterias14,$request->venas_arterias15,$request->venas_arterias16,$request->venas_arterias17,$request->venas_arterias18,$request->venas_arterias19,$request->venas_arterias20,$request->venas_arterias21,$request->venas_arterias22,$request->venas_arterias23,$request->venas_arterias24,$request->venas_arterias25,$request->venas_arterias26,$request->venas_arterias27,$request->venas_arterias28,$request->venas_arterias29,$request->venas_arterias30,$request->venas_arterias31,$request->venas_arterias32,$request->venas_arterias33,$request->venas_arterias34,$request->venas_arterias35,$request->venas_arterias36,$request->venas_arterias37,$request->venas_arterias38,$request->venas_arterias39,$request->venas_arterias40,$request->venas_arterias41,$request->venas_arterias42,$request->venas_arterias43,$request->venas_arterias44,$request->venas_arterias45);
        $user = Auth::id();
        $mensaje= '. Le sugerimos buscar en las siguientes especialidades médicas y consultar un médico:';
        $d='Usted puede tener la enfermedad:';
        $x= 'Probabilidad de coincidencia de enfermedad:';
        $enfermedades = ['Aneurisma sin rotura','Aneurisma con rotura','Aterosclerosis en las venas que conducen al cerebro','Aterosclerosis en las venas que conducen a los brazos o piernas','Aterosclerosis en las venas que conducen a los riñones','De las arterias coronarias','De las arterias carótidas','Fenómeno de Raynaud','Venas varicosas','Vasculitis'];
        $enlaces=['https://www.mayoclinic.org/es-es/diseases-conditions/brain-aneurysm/symptoms-causes/syc-2036148','https://www.mayoclinic.org/es-es/diseases-conditions/brain-aneurysm/diagnosis-treatment/drc-20361595','https://www.mayoclinic.org/es-es/diseases-conditions/arteriosclerosis-atherosclerosis/symptoms-causes/syc-20350569','https://www.mayoclinic.org/es-es/diseases-conditions/arteriosclerosis-atherosclerosis/symptoms-causes/syc-20350569','https://www.mayoclinic.org/es-es/diseases-conditions/arteriosclerosis-atherosclerosis/symptoms-causes/syc-20350569','https://www.mayoclinic.org/es-es/diseases-conditions/coronary-artery-disease/symptoms-causes/syc-20350613','https://www.mayoclinic.org/es-es/diseases-conditions/carotid-artery-disease/symptoms-causes/syc-20360519#:~:text=La%20enfermedad%20de%20las%20arterias%20car%C3%B3tidas%20es%20causada%20por%20una,microsc%C3%B3picas%20dentro%20de%20la%20arteria.','https://www.mayoclinic.org/es-es/diseases-conditions/raynauds-disease/symptoms-causes/syc-20363571','https://www.mayoclinic.org/es-es/diseases-conditions/varicose-veins/symptoms-causes/syc-20350643','https://www.mayoclinic.org/es-es/diseases-conditions/vasculitis/symptoms-causes/syc-20363435'];
        $ruta = ['/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'];
        $especialidades = ['Medicina General','Medicina Interna','Angiología'];
        $probabilidad = ['20%','30%','40%','50%','60%','0%'];
        $probability = "{$probabilidad[0]}";$probability_a = "{$probabilidad[1]}";$probability_b = "{$probabilidad[2]}";$probability_c = "{$probabilidad[3]}";$probability_d = "{$probabilidad[4]}";$probability_zero = "{$probabilidad[5]}";
        $sintomas_enfermedad_a  = [1,2,3,4,5];
        $sintomas_enfermedad_b  = [3,5,6,7,8,9,10,11,12];
        $sintomas_enfermedad_c  = [13,14,15,16];
        $sintomas_enfermedad_d  = [17,18];
        $sintomas_enfermedad_e  = [19,20];
        $sintomas_enfermedad_f  = [21,22,23,24,25];
        $sintomas_enfermedad_g  = [5,15,26,27,28,29];
        $sintomas_enfermedad_h  = [30,31,32,33,34];
        $sintomas_enfermedad_i  = [35,36,37,38];
        $sintomas_enfermedad_j  = [22,23,34,39,40,41,42,43,44,45];


        $vacio = [];
        for ($i=0; $i < count($array); $i++){
            $array[$i] ;
            if ($array[$i] != null){
                array_push($vacio, $array[$i]);
            }
            }

      /*venas_arterias dos elecciones 20%(2)*/
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


     $safe_k = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_j);


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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_m == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_h, $vacio[1]);
          }
          if($safe_s == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_j, $vacio[1]);
          }

       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }


  /*venas_arterias tres elecciones 30%(3)*/
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


     $safe_k = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_j);

     $safe_ka = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_la = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_ma = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_na = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_oa = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_pa = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_qa = in_array($vacio[2], $sintomas_enfermedad_g);
     $safe_ra = in_array($vacio[2], $sintomas_enfermedad_h);
     $safe_sa = in_array($vacio[2], $sintomas_enfermedad_i);
     $safe_ta = in_array($vacio[2], $sintomas_enfermedad_j);


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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_m == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_h, $vacio[1]);
          }
          if($safe_s == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_j, $vacio[1]);
          }

          if($safe_ka == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_la == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_ma == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_na == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_oa == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_pa == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_qa == true){
            array_push($sintomas_g, $vacio[2]);
          }
           if($safe_ra == true){
            array_push($sintomas_h, $vacio[2]);
          }
          if($safe_sa == true){
            array_push($sintomas_i, $vacio[2]);
          }
           if($safe_ta == true){
            array_push($sintomas_j, $vacio[2]);
          }

     if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 3) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 3) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 3) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 3) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }


/*venas_arterias cuatro elecciones 40%(4)*/
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


     $safe_k = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_j);

     $safe_ka = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_la = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_ma = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_na = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_oa = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_pa = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_qa = in_array($vacio[2], $sintomas_enfermedad_g);
     $safe_ra = in_array($vacio[2], $sintomas_enfermedad_h);
     $safe_sa = in_array($vacio[2], $sintomas_enfermedad_i);
     $safe_ta = in_array($vacio[2], $sintomas_enfermedad_j);

     $safe_kb = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_lb = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_mb = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_nb = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_ob = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_pb = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_qb = in_array($vacio[3], $sintomas_enfermedad_g);
     $safe_rb = in_array($vacio[3], $sintomas_enfermedad_h);
     $safe_sb = in_array($vacio[3], $sintomas_enfermedad_i);
     $safe_tb = in_array($vacio[3], $sintomas_enfermedad_j);


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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_m == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_h, $vacio[1]);
          }
          if($safe_s == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_j, $vacio[1]);
          }

          if($safe_ka == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_la == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_ma == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_na == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_oa == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_pa == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_qa == true){
            array_push($sintomas_g, $vacio[2]);
          }
           if($safe_ra == true){
            array_push($sintomas_h, $vacio[2]);
          }
          if($safe_sa == true){
            array_push($sintomas_i, $vacio[2]);
          }
           if($safe_ta == true){
            array_push($sintomas_j, $vacio[2]);
          }

          if($safe_kb == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_lb == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_mb == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_nb == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_ob == true){
            array_push($sintomas_e, $vacio[3]);
          }
           if($safe_pb == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_qb == true){
            array_push($sintomas_g, $vacio[3]);
          }
           if($safe_rb == true){
            array_push($sintomas_h, $vacio[3]);
          }
          if($safe_sb == true){
            array_push($sintomas_i, $vacio[3]);
          }
           if($safe_tb == true){
            array_push($sintomas_j, $vacio[3]);
          }

       if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 4) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 4) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 4) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 4) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 4) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 4) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

     if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 3) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 3) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 3) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 3) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }


       /*venas_arterias cinco elecciones 50%(5)*/
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


     $safe_k = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_j);

     $safe_ka = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_la = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_ma = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_na = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_oa = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_pa = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_qa = in_array($vacio[2], $sintomas_enfermedad_g);
     $safe_ra = in_array($vacio[2], $sintomas_enfermedad_h);
     $safe_sa = in_array($vacio[2], $sintomas_enfermedad_i);
     $safe_ta = in_array($vacio[2], $sintomas_enfermedad_j);

     $safe_kb = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_lb = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_mb = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_nb = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_ob = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_pb = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_qb = in_array($vacio[3], $sintomas_enfermedad_g);
     $safe_rb = in_array($vacio[3], $sintomas_enfermedad_h);
     $safe_sb = in_array($vacio[3], $sintomas_enfermedad_i);
     $safe_tb = in_array($vacio[3], $sintomas_enfermedad_j);

     $safe_kc = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_lc = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_mc = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_nc = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_oc = in_array($vacio[4], $sintomas_enfermedad_e);
     $safe_pc = in_array($vacio[4], $sintomas_enfermedad_f);
     $safe_qc = in_array($vacio[4], $sintomas_enfermedad_g);
     $safe_rc = in_array($vacio[4], $sintomas_enfermedad_h);
     $safe_sc = in_array($vacio[4], $sintomas_enfermedad_i);
     $safe_tc = in_array($vacio[4], $sintomas_enfermedad_j);


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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_m == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_h, $vacio[1]);
          }
          if($safe_s == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_j, $vacio[1]);
          }

          if($safe_ka == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_la == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_ma == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_na == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_oa == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_pa == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_qa == true){
            array_push($sintomas_g, $vacio[2]);
          }
           if($safe_ra == true){
            array_push($sintomas_h, $vacio[2]);
          }
          if($safe_sa == true){
            array_push($sintomas_i, $vacio[2]);
          }
           if($safe_ta == true){
            array_push($sintomas_j, $vacio[2]);
          }

          if($safe_kb == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_lb == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_mb == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_nb == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_ob == true){
            array_push($sintomas_e, $vacio[3]);
          }
           if($safe_pb == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_qb == true){
            array_push($sintomas_g, $vacio[3]);
          }
           if($safe_rb == true){
            array_push($sintomas_h, $vacio[3]);
          }
          if($safe_sb == true){
            array_push($sintomas_i, $vacio[3]);
          }
           if($safe_tb == true){
            array_push($sintomas_j, $vacio[3]);
          }

          if($safe_kc == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_lc == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_mc == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_nc == true){
            array_push($sintomas_d, $vacio[4]);
          }
           if($safe_oc == true){
            array_push($sintomas_e, $vacio[4]);
          }
           if($safe_pc == true){
            array_push($sintomas_f, $vacio[4]);
          }
           if($safe_qc == true){
            array_push($sintomas_g, $vacio[4]);
          }
           if($safe_rc == true){
            array_push($sintomas_h, $vacio[4]);
          }
          if($safe_sc == true){
            array_push($sintomas_i, $vacio[4]);
          }
           if($safe_tc == true){
            array_push($sintomas_j, $vacio[4]);
          }

       if (count($sintomas_a) == 5) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 5) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 5) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 5) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 5) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 5) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 5) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 5) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 5) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }
       if (count($sintomas_j) == 5) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 4) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 4) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 4) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 4) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 4) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_j) == 4) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

     if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 3) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 3) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 3) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 3) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }


        /*venas_arterias seis elecciones 60%(6)*/
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


     $safe_k = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_l = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_m = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_n = in_array($vacio[1], $sintomas_enfermedad_d);
     $safe_o = in_array($vacio[1], $sintomas_enfermedad_e);
     $safe_p = in_array($vacio[1], $sintomas_enfermedad_f);
     $safe_q = in_array($vacio[1], $sintomas_enfermedad_g);
     $safe_r = in_array($vacio[1], $sintomas_enfermedad_h);
     $safe_s = in_array($vacio[1], $sintomas_enfermedad_i);
     $safe_t = in_array($vacio[1], $sintomas_enfermedad_j);

     $safe_ka = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_la = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_ma = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_na = in_array($vacio[2], $sintomas_enfermedad_d);
     $safe_oa = in_array($vacio[2], $sintomas_enfermedad_e);
     $safe_pa = in_array($vacio[2], $sintomas_enfermedad_f);
     $safe_qa = in_array($vacio[2], $sintomas_enfermedad_g);
     $safe_ra = in_array($vacio[2], $sintomas_enfermedad_h);
     $safe_sa = in_array($vacio[2], $sintomas_enfermedad_i);
     $safe_ta = in_array($vacio[2], $sintomas_enfermedad_j);

     $safe_kb = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_lb = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_mb = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_nb = in_array($vacio[3], $sintomas_enfermedad_d);
     $safe_ob = in_array($vacio[3], $sintomas_enfermedad_e);
     $safe_pb = in_array($vacio[3], $sintomas_enfermedad_f);
     $safe_qb = in_array($vacio[3], $sintomas_enfermedad_g);
     $safe_rb = in_array($vacio[3], $sintomas_enfermedad_h);
     $safe_sb = in_array($vacio[3], $sintomas_enfermedad_i);
     $safe_tb = in_array($vacio[3], $sintomas_enfermedad_j);

     $safe_kc = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_lc = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_mc = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_nc = in_array($vacio[4], $sintomas_enfermedad_d);
     $safe_oc = in_array($vacio[4], $sintomas_enfermedad_e);
     $safe_pc = in_array($vacio[4], $sintomas_enfermedad_f);
     $safe_qc = in_array($vacio[4], $sintomas_enfermedad_g);
     $safe_rc = in_array($vacio[4], $sintomas_enfermedad_h);
     $safe_sc = in_array($vacio[4], $sintomas_enfermedad_i);
     $safe_tc = in_array($vacio[4], $sintomas_enfermedad_j);

     $safe_kd = in_array($vacio[5], $sintomas_enfermedad_a);
     $safe_ld = in_array($vacio[5], $sintomas_enfermedad_b);
     $safe_md = in_array($vacio[5], $sintomas_enfermedad_c);
     $safe_nd = in_array($vacio[5], $sintomas_enfermedad_d);
     $safe_od = in_array($vacio[5], $sintomas_enfermedad_e);
     $safe_pd = in_array($vacio[5], $sintomas_enfermedad_f);
     $safe_qd = in_array($vacio[5], $sintomas_enfermedad_g);
     $safe_rd = in_array($vacio[5], $sintomas_enfermedad_h);
     $safe_sd = in_array($vacio[5], $sintomas_enfermedad_i);
     $safe_td = in_array($vacio[5], $sintomas_enfermedad_j);


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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_l == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_m == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_n == true){
            array_push($sintomas_d, $vacio[1]);
          }
           if($safe_o == true){
            array_push($sintomas_e, $vacio[1]);
          }
           if($safe_p == true){
            array_push($sintomas_f, $vacio[1]);
          }
           if($safe_q == true){
            array_push($sintomas_g, $vacio[1]);
          }
           if($safe_r == true){
            array_push($sintomas_h, $vacio[1]);
          }
          if($safe_s == true){
            array_push($sintomas_i, $vacio[1]);
          }
           if($safe_t == true){
            array_push($sintomas_j, $vacio[1]);
          }

          if($safe_ka == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_la == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_ma == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_na == true){
            array_push($sintomas_d, $vacio[2]);
          }
           if($safe_oa == true){
            array_push($sintomas_e, $vacio[2]);
          }
           if($safe_pa == true){
            array_push($sintomas_f, $vacio[2]);
          }
           if($safe_qa == true){
            array_push($sintomas_g, $vacio[2]);
          }
           if($safe_ra == true){
            array_push($sintomas_h, $vacio[2]);
          }
          if($safe_sa == true){
            array_push($sintomas_i, $vacio[2]);
          }
           if($safe_ta == true){
            array_push($sintomas_j, $vacio[2]);
          }

          if($safe_kb == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_lb == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_mb == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_nb == true){
            array_push($sintomas_d, $vacio[3]);
          }
           if($safe_ob == true){
            array_push($sintomas_e, $vacio[3]);
          }
           if($safe_pb == true){
            array_push($sintomas_f, $vacio[3]);
          }
           if($safe_qb == true){
            array_push($sintomas_g, $vacio[3]);
          }
           if($safe_rb == true){
            array_push($sintomas_h, $vacio[3]);
          }
          if($safe_sb == true){
            array_push($sintomas_i, $vacio[3]);
          }
           if($safe_tb == true){
            array_push($sintomas_j, $vacio[3]);
          }

          if($safe_kc == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_lc == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_mc == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_nc == true){
            array_push($sintomas_d, $vacio[4]);
          }
           if($safe_oc == true){
            array_push($sintomas_e, $vacio[4]);
          }
           if($safe_pc == true){
            array_push($sintomas_f, $vacio[4]);
          }
           if($safe_qc == true){
            array_push($sintomas_g, $vacio[4]);
          }
           if($safe_rc == true){
            array_push($sintomas_h, $vacio[4]);
          }
          if($safe_sc == true){
            array_push($sintomas_i, $vacio[4]);
          }
           if($safe_tc == true){
            array_push($sintomas_j, $vacio[4]);
          }

           if($safe_kd == true){
            array_push($sintomas_a, $vacio[5]);
          }
           if($safe_ld == true){
            array_push($sintomas_b, $vacio[5]);
          }
           if($safe_md == true){
            array_push($sintomas_c, $vacio[5]);
          }
           if($safe_nd == true){
            array_push($sintomas_d, $vacio[5]);
          }
           if($safe_od == true){
            array_push($sintomas_e, $vacio[5]);
          }
           if($safe_pd == true){
            array_push($sintomas_f, $vacio[5]);
          }
           if($safe_qd == true){
            array_push($sintomas_g, $vacio[5]);
          }
           if($safe_rd == true){
            array_push($sintomas_h, $vacio[5]);
          }
          if($safe_sd == true){
            array_push($sintomas_i, $vacio[5]);
          }
           if($safe_td == true){
            array_push($sintomas_j, $vacio[5]);
          }

       if (count($sintomas_a) == 6) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 6) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 6) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 6) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 6) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 6) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 6) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 6) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 6) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }
       if (count($sintomas_j) == 6) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_a) == 5) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 5) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 5) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 5) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 5) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 5) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 5) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 5) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 5) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }
       if (count($sintomas_j) == 5) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }


       if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 4) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 4) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 4) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 4) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 4) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }
       if (count($sintomas_j) == 4) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

     if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 3) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 3) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 3) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 3) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 3) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 3) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_f) == 2) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_g) == 2) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_h) == 2) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
       if (count($sintomas_i) == 2) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_j) == 2) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_f) == 1) {
           $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_g) == 1) {
           $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_h) == 1) {
           $enfermedad = " {$enfermedades[7]}";$enlace="{$enlaces[7]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_i) == 1) {
           $enfermedad = " {$enfermedades[8]}";$enlace="{$enlaces[8]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_j) == 1) {
           $enfermedad = " {$enfermedades[9]}";$enlace="{$enlaces[9]}";
    return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
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
            return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
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
            return view('organos.venas_arterias_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
 }

/* public function lista_medico_venas_arterias_medicina_general(Request $request){
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
  public function lista_medico_venas_arterias_medicina_interna(Request $request){
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
 }
  public function lista_medico_venas_arterias_medicina_familiar(Request $request){
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
   public function lista_medico_venas_arterias_angiologia(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'ANGIOLOGÍA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }        */
}
