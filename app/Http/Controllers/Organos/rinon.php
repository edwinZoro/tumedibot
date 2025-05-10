<?php

namespace App\Http\Controllers\Organos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class rinon extends Controller
{
     public function rinon_vista(Request $request){
        $array = array($request->riñon1,$request->riñon2,$request->riñon3,$request->riñon4,$request->riñon5,$request->riñon6,$request->riñon7,$request->riñon8,$request->riñon9,$request->riñon10,$request->riñon11,$request->riñon12,$request->riñon13,$request->riñon14,$request->riñon15,$request->riñon16,$request->riñon17,$request->riñon18,$request->riñon19,$request->riñon20,$request->riñon21,$request->riñon22,$request->riñon23,$request->riñon24,$request->riñon25,$request->riñon26,$request->riñon27,$request->riñon28);
        $user = Auth::id();
        $mensaje= '. Le sugerimos buscar en las siguientes especialidades médicas y consultar un médico:';
        $d='Usted puede tener la enfermedad:';
        $x= 'Probabilidad de coincidencia de enfermedad:';
        $enfermedades = ['Falla renal','Insuficiencia renal aguda','Piedras en los riñones','Quiste renal'];
        $enlaces = ['https://www.mayoclinic.org/es-es/diseases-conditions/kidney-failure/symptoms-causes/syc-20369048','https://www.mayoclinic.org/es-es/diseases-conditions/kidney-failure/symptoms-causes/syc-20369048','https://www.mayoclinic.org/es-es/diseases-conditions/kidney-stones/symptoms-causes/syc-20355755','https://www.mayoclinic.org/es-es/diseases-conditions/kidney-cysts/symptoms-causes/syc-20374134'];
        $ruta = ['/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'];
        $especialidades = ['Medicina General','Gastroenterología','Nefrología'];
        $probabilidad = ['20%','30%','40%','50%','60%','0%'];
        $probability = "{$probabilidad[0]}";$probability_a = "{$probabilidad[1]}";$probability_b = "{$probabilidad[2]}";$probability_c = "{$probabilidad[3]}";$probability_d = "{$probabilidad[4]}";$probability_zero = "{$probabilidad[5]}";
        $sintomas_enfermedad_a  = [1,2,3,4,5,6,7,8,9];
        $sintomas_enfermedad_b  = [8,10,11,12,13,14,15,16,17,18];
        $sintomas_enfermedad_c  = [19,20,21,22,23,24];
        $sintomas_enfermedad_d  = [20,25,26,27,28];


        $vacio = [];
        for ($i=0; $i < count($array); $i++){
            $array[$i] ;
            if ($array[$i] != null){
                array_push($vacio, $array[$i]);
            }
        }

/*riñon dos elecciones 20%(2)*/
        if(count($vacio)===2) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);

     $safe_e = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_f = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_d);


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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_f == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_d, $vacio[1]);
          }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
   
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

    /*riñon tres elecciones 30%(3)*/
        if(count($vacio)===3) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);

     $safe_e = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_f = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_d);

     $safe_i = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_j = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_k = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_l = in_array($vacio[2], $sintomas_enfermedad_d);

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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_f == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_d, $vacio[1]);
          }

          if($safe_i == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_j == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_k == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_l == true){
            array_push($sintomas_d, $vacio[2]);
          }

      if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
    
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }

     /*riñon cuatro elecciones 40%(4)*/
        if(count($vacio)===4) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);

     $safe_e = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_f = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_d);

     $safe_i = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_j = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_k = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_l = in_array($vacio[2], $sintomas_enfermedad_d);

     $safe_m = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_n = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_o = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_p = in_array($vacio[3], $sintomas_enfermedad_d);

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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_f == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_d, $vacio[1]);
          }

          if($safe_i == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_j == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_k == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_l == true){
            array_push($sintomas_d, $vacio[2]);
          }

          if($safe_m == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_n == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_o == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_p == true){
            array_push($sintomas_d, $vacio[3]);
          }

      if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
    
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }



    /*riñon cinco elecciones 50%(5)*/
        if(count($vacio)===5) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);

     $safe_e = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_f = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_d);

     $safe_i = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_j = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_k = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_l = in_array($vacio[2], $sintomas_enfermedad_d);

     $safe_m = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_n = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_o = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_p = in_array($vacio[3], $sintomas_enfermedad_d);

     $safe_q = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_r = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_s = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_t = in_array($vacio[4], $sintomas_enfermedad_d);

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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_f == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_d, $vacio[1]);
          }

          if($safe_i == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_j == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_k == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_l == true){
            array_push($sintomas_d, $vacio[2]);
          }

          if($safe_m == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_n == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_o == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_p == true){
            array_push($sintomas_d, $vacio[3]);
          }

          if($safe_q == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_r == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_s == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_t == true){
            array_push($sintomas_d, $vacio[4]);
          }

      if (count($sintomas_a) == 5) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 5) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 5) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 5) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
    
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }


       /*riñon seis elecciones 60%(6)*/
        if(count($vacio)===6) {
            $sintomas_a =  [];
             $sintomas_b =  [];
              $sintomas_c =  [];
               $sintomas_d =  [];
     $safe_a = in_array($vacio[0], $sintomas_enfermedad_a);
     $safe_b = in_array($vacio[0], $sintomas_enfermedad_b);
     $safe_c = in_array($vacio[0], $sintomas_enfermedad_c);
     $safe_d = in_array($vacio[0], $sintomas_enfermedad_d);

     $safe_e = in_array($vacio[1], $sintomas_enfermedad_a);
     $safe_f = in_array($vacio[1], $sintomas_enfermedad_b);
     $safe_g = in_array($vacio[1], $sintomas_enfermedad_c);
     $safe_h = in_array($vacio[1], $sintomas_enfermedad_d);

     $safe_i = in_array($vacio[2], $sintomas_enfermedad_a);
     $safe_j = in_array($vacio[2], $sintomas_enfermedad_b);
     $safe_k = in_array($vacio[2], $sintomas_enfermedad_c);
     $safe_l = in_array($vacio[2], $sintomas_enfermedad_d);

     $safe_m = in_array($vacio[3], $sintomas_enfermedad_a);
     $safe_n = in_array($vacio[3], $sintomas_enfermedad_b);
     $safe_o = in_array($vacio[3], $sintomas_enfermedad_c);
     $safe_p = in_array($vacio[3], $sintomas_enfermedad_d);

     $safe_q = in_array($vacio[4], $sintomas_enfermedad_a);
     $safe_r = in_array($vacio[4], $sintomas_enfermedad_b);
     $safe_s = in_array($vacio[4], $sintomas_enfermedad_c);
     $safe_t = in_array($vacio[4], $sintomas_enfermedad_d);

     $safe_u = in_array($vacio[5], $sintomas_enfermedad_a);
     $safe_v = in_array($vacio[5], $sintomas_enfermedad_b);
     $safe_w = in_array($vacio[5], $sintomas_enfermedad_c);
     $safe_x = in_array($vacio[5], $sintomas_enfermedad_d);

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
            array_push($sintomas_a, $vacio[1]);
          }
           if($safe_f == true){
            array_push($sintomas_b, $vacio[1]);
          }
           if($safe_g == true){
            array_push($sintomas_c, $vacio[1]);
          }
           if($safe_h == true){
            array_push($sintomas_d, $vacio[1]);
          }

          if($safe_i == true){
            array_push($sintomas_a, $vacio[2]);
          }
           if($safe_j == true){
            array_push($sintomas_b, $vacio[2]);
          }
           if($safe_k == true){
            array_push($sintomas_c, $vacio[2]);
          }
           if($safe_l == true){
            array_push($sintomas_d, $vacio[2]);
          }

          if($safe_m == true){
            array_push($sintomas_a, $vacio[3]);
          }
           if($safe_n == true){
            array_push($sintomas_b, $vacio[3]);
          }
           if($safe_o == true){
            array_push($sintomas_c, $vacio[3]);
          }
           if($safe_p == true){
            array_push($sintomas_d, $vacio[3]);
          }

          if($safe_q == true){
            array_push($sintomas_a, $vacio[4]);
          }
           if($safe_r == true){
            array_push($sintomas_b, $vacio[4]);
          }
           if($safe_s == true){
            array_push($sintomas_c, $vacio[4]);
          }
           if($safe_t == true){
            array_push($sintomas_d, $vacio[4]);
          }

          if($safe_u == true){
            array_push($sintomas_a, $vacio[5]);
          }
           if($safe_v == true){
            array_push($sintomas_b, $vacio[5]);
          }
           if($safe_w == true){
            array_push($sintomas_c, $vacio[5]);
          }
           if($safe_x == true){
            array_push($sintomas_d, $vacio[5]);
          }

      if (count($sintomas_a) == 6) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 6) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 6) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 6) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 5) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 5) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 5) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 5) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 4) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 4) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 4) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 4) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
       }

      if (count($sintomas_a) == 3) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 3) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 3) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 3) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }
    
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
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
            return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
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
            return view('organos.rinon_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
}   

/*public function lista_medico_riñon_medicina_general(Request $request){
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
  public function lista_medico_riñon_nefrologia(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'NEFROLOGÍA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }
  public function lista_medico_riñon_medicina_familiar(Request $request){
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
   public function lista_medico_riñon_gastroenterologia(Request $request){
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
 }     */
}
