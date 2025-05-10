<?php 
namespace App\Http\Controllers\Organos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class senos extends Controller
{
    public function senos_vista(Request $request){
        $array = array($request->senos1,$request->senos2,$request->senos3,$request->senos4,$request->senos5,$request->senos6,$request->senos7,$request->senos8,$request->senos9,$request->senos10,$request->senos11,$request->senos12,$request->senos13,$request->senos14,$request->senos15,$request->senos16,$request->senos17,$request->senos18,$request->senos19,$request->senos20,$request->senos21,$request->senos22,$request->senos23,$request->senos24);
        $user= Auth::id();
        $mensaje= '. Le sugerimos buscar en las siguientes especialidades médicas y consultar un médico:';
        $d='Usted puede tener la enfermedad:';
        $x= 'Probabilidad de coincidencia de enfermedad:';
        $enlaces = ['https://www.mayoclinic.org/es-es/diseases-conditions/invasive-lobular-carcinoma/symptoms-causes/syc-20373973','https://www.mayoclinic.org/es-es/diseases-conditions/fibroadenoma/symptoms-causes/syc-20352752','https://www.mayoclinic.org/es-es/diseases-conditions/fibrocystic-breasts/symptoms-causes/syc-20350438','https://www.mayoclinic.org/es-es/diseases-conditions/mastitis/symptoms-causes/syc-20374829','https://www.mayoclinic.org/es-es/diseases-conditions/fibrocystic-breasts/symptoms-causes/syc-20350438#:~:text=Dolor%20de%20mamas%20generalizado%20o,que%20se%20presione%20ni%20oprima'];
        $ruta = ['/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'];
        $enfermedades = ['Carcinoma lobular in situ','Fibroadenoma','Necrosis adiposa','Mastitis','Fibrosis en los senos'];
        $especialidades = ['Medicina General','Ginecología','Mastología'];
        $probabilidad = ['20%','30%','40%','50%','60%','0%'];
        $probability = "{$probabilidad[0]}";$probability_a = "{$probabilidad[1]}";$probability_b = "{$probabilidad[2]}";$probability_c = "{$probabilidad[3]}";$probability_d = "{$probabilidad[4]}";$probability_zero = "{$probabilidad[5]}";
        
        $sintomas_enfermedad_a  = [1,2,3,4,5,6,7];
        $sintomas_enfermedad_b  = [8,9,10,11,12];
        $sintomas_enfermedad_c  = [6,13,14,15,16,17];
        $sintomas_enfermedad_d  = [16,18,19,20,21,22,23];
        $sintomas_enfermedad_e  = [3,18,19,20,24];

        $vacio = [];
        for ($i=0; $i < count($array); $i++){
            $array[$i] ;
            if ($array[$i] != null){
                array_push($vacio, $array[$i]);
            }
        }

        /*senos dos elecciones 20%(2)*/
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
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

     
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }




       /*senos tres elecciones 30%(3)*/
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
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }


       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }


       
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }


         /*senos cuatro elecciones 40%(4)*/
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
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

 
       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }



        /*senos cinco elecciones 40%(5)*/
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
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 5){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 5){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 5){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 5){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 4){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

 
       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }
       }



         /*senos cinco elecciones 40%(6)*/
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
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 6){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 6){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 6){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 6){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 5){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 5){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 5){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 5){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 5){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 4){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 4){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 4){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 4){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 4){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
       }


     if( count($sintomas_a) == 3){
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_b) == 3){
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

     if( count($sintomas_c) == 3){
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_d) == 3){
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

    if( count($sintomas_e) == 3){
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
       }

 
       if (count($sintomas_a) == 2) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_b) == 2) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_c) == 2) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_d) == 2) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       if (count($sintomas_e) == 2) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
       }

       
     elseif (count($sintomas_a) == 1) {
           $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       } elseif (count($sintomas_b) == 1) {
           $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_c) == 1) {
           $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_d) == 1) {
           $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
       }elseif (count($sintomas_e) == 1) {
           $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";
    return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
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
            return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
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
            return view('organos.senos_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
}

/*public function lista_medico_senos_medicina_general(Request $request){
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
  public function lista_medico_senos_ginecologia(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'GINECOLOGÍA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }
  public function lista_medico_senos_medicina_familiar(Request $request){
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
   public function lista_medico_senos_mastologia(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'MASTOLOGÍA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }        */
}