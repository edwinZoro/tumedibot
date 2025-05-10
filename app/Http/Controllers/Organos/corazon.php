<?php

namespace App\Http\Controllers\Organos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Factura;                   
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class corazon extends Controller
{
    public function corazon_vista(Request $request){
        $array =array($request->corazon1,$request->corazon2,$request->corazon3,$request->corazon4,$request->corazon5,$request->corazon6,$request->corazon7,$request->corazon8,$request->corazon9,$request->corazon10,$request->corazon11,$request->corazon12,$request->corazon13,$request->corazon14,$request->corazon15,$request->corazon16,$request->corazon17,$request->corazon18,$request->corazon19,$request->corazon20,$request->corazon21,$request->corazon22,$request->corazon23,$request->corazon24,$request->corazon25,$request->corazon26,$request->corazon27);
        $user=Auth::id();
        $mensaje= '. Le sugerimos buscar en las siguientes especialidades médicas y consultar un médico:';
        $d='Usted puede tener una enfermedad:';
        $x= 'Probabilidad de coincidencia de enfermedad:';
        $enfermedades = ['Cardíaca en los vasos sanguineos','Cardíaca causada por latidos anormales (arritmias cardíacas)','Cardíaca causada por defectos cardíacos','Causada por infecciones cardíacas','Cardíaca causada por problemas en la válvula cardíaca (valvulopatía)'];
        $enlaces = ['https://www.mayoclinic.org/es-es/diseases-conditions/heart-disease/symptoms-causes/syc-20353118','https://www.mayoclinic.org/es-es/diseases-conditions/heart-disease/symptoms-causes/syc-20353118','https://www.mayoclinic.org/es-es/diseases-conditions/heart-disease/symptoms-causes/syc-20353118','https://www.mayoclinic.org/es-es/diseases-conditions/heart-disease/symptoms-causes/syc-20353118','https://www.mayoclinic.org/es-es/diseases-conditions/heart-disease/symptoms-causes/syc-20353118'];
        $ruta = ['/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'];
        $especialidades = ['Medicina General','Cardiología','Cardiovascular'];
        $probabilidad = ['20%','30%','40%','50%','60%','0%'];
        $probability = "{$probabilidad[0]}";$probability_a = "{$probabilidad[1]}";$probability_b = "{$probabilidad[2]}";$probability_c = "{$probabilidad[3]}";$probability_d = "{$probabilidad[4]}";$probability_zero = "{$probabilidad[5]}";
        $vacio = [];
        for ($i=0; $i < count($array); $i++){
            $array[$i] ;
            if ($array[$i] != null){
                array_push($vacio, $array[$i]);
            }
        }
        /*Corazon dos elecciones 20%*/
        if(count($vacio)===2){
            if((intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4)){
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
            }elseif ((intval($vacio[0]) >= 5) && (intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5) && (intval($vacio[1]) <=10)) {
                $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18)) {
                $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";     
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) >= 18 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=25)) { 
                $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";     
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }
            elseif ((intval($vacio[0]) >= 26 && intval($vacio[0]) <=27) && (intval($vacio[1]) >= 26 && intval($vacio[1]) <=27)) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";     
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            } 
            /*Corazon dos elecciones 0%*/
            if((intval($vacio[0]) <= 4) && (intval($vacio[1]) > 4)){
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));       
            }elseif ((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) > 10)) {
                $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) > 18)) {
                $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";     
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) >= 18 && intval($vacio[0]) <=25) && (intval($vacio[1]) > 25)) {
                $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";     
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }
            elseif ((intval($vacio[0]) >= 26 && intval($vacio[0]) <=27) && (intval($vacio[1]) > 26)) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";     
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }

        }

        /*Corazon tres elecciones 30%*/
        elseif(count($vacio)===3){
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4)) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
            }elseif((intval($vacio[0]) >= 5 && (intval($vacio[0]) <=10)) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && (intval($vacio[2]) <=10))) {
                $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
            }elseif ( ( intval($vacio[0]) >= 11 && intval($vacio[0]) <=18 && intval($vacio[1]) >= 11 && intval($vacio[1]) <=18 && intval($vacio[2]) >= 11 && intval($vacio[2]) <=18))   {
                $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
            }elseif ( (intval($vacio[0]) >= 19 && intval($vacio[0]) <=25 && intval($vacio[1]) >= 19 && intval($vacio[1]) <=25  && intval($vacio[2]) >= 19 && intval($vacio[2]) <=25)) {
                $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
            }elseif ((intval($vacio[1]) >= 26 && intval($vacio[1]) <=27) && (intval($vacio[2]) >= 26 && intval($vacio[2]) <=27 && intval($vacio[0]) < 26) ) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
            }  
            /*Corazon tres elecciones 20%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) > 4)) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
            }elseif((intval($vacio[0]) < 5) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && (intval($vacio[2]) <=10)) ||  (intval($vacio[0]) >= 5 && (intval($vacio[0]) <=10)) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) > 5)){
                $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }elseif ( ( intval($vacio[0]) < 11 && intval($vacio[1]) >= 11 && intval($vacio[1]) <=18 && intval($vacio[2]) >= 11 && intval($vacio[2]) <=18 )  ||  ( intval($vacio[0]) >= 11 && intval($vacio[0]) <=18 && intval($vacio[1]) >= 11 && intval($vacio[1]) <=18 && intval($vacio[2]) > 18 )  )  {
                $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
            }elseif ( ( intval($vacio[0]) >= 19 && intval($vacio[0]) <=25 && intval($vacio[1]) >= 19 && intval($vacio[1]) <=25  && intval($vacio[2]) >= 19 && intval($vacio[2]) <=25 ) ||  ( intval($vacio[0]) >= 19 && intval($vacio[0]) <=25 && intval($vacio[1]) >= 19 && intval($vacio[1]) <=25  && intval($vacio[2]) >25 ) ) {
                $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
            }
            elseif ( (intval($vacio[1]) >= 26 && intval($vacio[1]) <=27) && (intval($vacio[2]) >= 26 && intval($vacio[2]) <=27 && intval($vacio[0]) < 26 )) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
            }    
            /*Corazon tres elecciones 0%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) > 4) && (intval($vacio[2]) > 4)) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
            }elseif((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >10 && intval($vacio[2]) > 10)) {
                $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }elseif ( ( intval($vacio[0]) >= 11 && intval($vacio[0]) <=18 && intval($vacio[1]) >18 && intval($vacio[2]) >18))  {
                $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
            }elseif ( ( intval($vacio[0]) <19 && intval($vacio[1]) >= 19 && intval($vacio[1]) <=25  && intval($vacio[2]) >25)) {
                $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
            }
            elseif (intval($vacio[0]) < 27 &&  intval($vacio[1]) <27 && intval($vacio[2]) > 26 ) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
            } 
        }

        /*Corazon cuatro elecciones 40%*/
        elseif(count($vacio)===4){
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && (intval($vacio[3]) <= 4)) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
            }
            elseif ((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) ) {
                $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18))  {
                $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) >= 19 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25))  {
                $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
            }
            elseif ( (intval($vacio[0]) <= 25 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 26 && intval($vacio[2]) <=27 && intval($vacio[3]) >= 26 && intval($vacio[3]) <= 27   )) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
            }  
            /*Corazon cuatro elecciones 30%*/
            if((intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && (intval($vacio[3]) > 4)){
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
            }
            elseif ((intval($vacio[0]) < 5) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10)  ||  (intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) > 10) ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));  
            }elseif ((intval($vacio[0]) < 11) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18)  ||  (intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) > 18) )  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) < 19) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25)  || (intval($vacio[0]) >= 19 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) > 25) )  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));  
            }
            elseif ( (intval($vacio[0]) <25 ) && (intval($vacio[1]) < 25) && intval($vacio[2]) >= 26 && intval($vacio[2]) <= 27   && intval($vacio[3]) >= 26 && intval($vacio[3]) <= 27)  {
                $enfermedad = "{$enfermedades[4]}";$enlace="{$enlaces[4]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));  
            }
            /*Corazon cuatro elecciones 20%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) > 4) && (intval($vacio[3]) > 4)) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
            }
            elseif ((intval($vacio[0]) <5) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) > 10)  || (intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >10) && (intval($vacio[3]) >10)) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }elseif (intval($vacio[0]) < 11 && (intval($vacio[1]) < 11) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18)  ||  (intval($vacio[0]) < 11) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >18) ||  (intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) > 18) && (intval($vacio[3]) > 18) )  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25)  ||  (intval($vacio[0]) < 19) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >25) ||  (intval($vacio[0]) >= 19 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >25) && (intval($vacio[3]) >25) )  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }
            elseif ( (intval($vacio[0]) < 25 && intval($vacio[1]) <25) && (intval($vacio[2]) >= 26 && intval($vacio[2]) <=27 && intval($vacio[3]) >= 26 && intval($vacio[3]) <= 27)) {
                $enfermedad = "{$enfermedades[4]}";$enlace="{$enlaces[4]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }
            /*Corazon cuatro elecciones 0%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) > 4) && (intval($vacio[2]) > 4) && (intval($vacio[3]) > 4)) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));       
            }
            elseif ((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >10) && (intval($vacio[2]) >10) && (intval($vacio[3]) > 10)) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) > 18) && (intval($vacio[2]) >18) && (intval($vacio[3]) >18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }elseif ((intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) < 19) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) )  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }
            elseif ( intval($vacio[0]) < 25 && intval($vacio[1]) <25 && intval($vacio[2]) <=25 && intval($vacio[3]) >= 26 && intval($vacio[3]) <= 27 ) {
                $enfermedad = "{$enfermedades[4]}";$enlace="{$enlaces[4]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }

        }
        
        /*Corazon cinco elecciones 50%*/
        elseif(count($vacio)===5) {
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && (intval($vacio[3]) <= 4)  && intval($vacio[4]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
            }
            elseif((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10)  ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));  
            }
            elseif((intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18) )  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));; 
            }
            elseif((intval($vacio[0]) >= 19 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25))  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
            }

            /*Corazon cinco elecciones 40%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && (intval($vacio[3]) <= 4)  && intval($vacio[4]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
            }
            elseif((intval($vacio[0]) < 5) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10)  || (intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) > 10)   ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 11) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18)  || (intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) > 18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 19) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25)  ||  (intval($vacio[0]) >= 19 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) > 25)) {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
            }
            /*Corazon cinco elecciones 30%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && (intval($vacio[3]) > 4)  && intval($vacio[4]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));      
            }
            elseif((intval($vacio[0]) < 5) && (intval($vacio[1]) < 5) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10)  || (intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >10) && (intval($vacio[4]) >10) || (intval($vacio[0]) < 5) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) > 10)) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 11) && (intval($vacio[1]) < 11) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18)  || (intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >18) && (intval($vacio[4]) >18) || (intval($vacio[0]) < 11) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25)  ||  (intval($vacio[0]) >= 19 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) > 25) && (intval($vacio[4]) > 25) ||  (intval($vacio[0]) < 19) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) > 25))  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
            }
            /*Corazon cinco elecciones 20%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) > 4) && (intval($vacio[3]) > 4)  && intval($vacio[4]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
            }
            elseif((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >10) && (intval($vacio[3]) > 10) && (intval($vacio[4]) > 10)  || (intval($vacio[0]) <10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) > 10) && (intval($vacio[4]) > 10)  ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >18) && (intval($vacio[3]) >18) && (intval($vacio[4]) >18)  || (intval($vacio[0]) < 11) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) > 18) && (intval($vacio[4]) > 18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >25)  ||  (intval($vacio[0]) < 19) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) > 25) && (intval($vacio[4]) > 25) ||  (intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) < 19) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) )  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }
            elseif(intval($vacio[0]) < 25  && intval($vacio[1]) < 25 && intval($vacio[2]) < 25 && (intval($vacio[3]) >= 25 && intval($vacio[3]) <=27) && (intval($vacio[4]) >= 25 && intval($vacio[4]) <=27)) {
                $enfermedad = "{$enfermedades[4]}";$enlace="{$enlaces[4]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
            }  
            /*Corazon cinco elecciones 0%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) > 4) && (intval($vacio[2]) > 4) && (intval($vacio[3]) > 4)  && intval($vacio[4]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));       
            }
            elseif((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >10) && (intval($vacio[2]) >10) && (intval($vacio[3]) > 10) && (intval($vacio[4]) > 10) ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >18) && (intval($vacio[2]) >18) && (intval($vacio[3]) >18) && (intval($vacio[4]) >18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) < 19) && (intval($vacio[3]) < 19) && (intval($vacio[4]) >19) )  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
            }
            elseif(intval($vacio[0]) < 25  && intval($vacio[1]) < 25 && intval($vacio[2]) < 25 && (intval($vacio[3]) < 25) && (intval($vacio[4]) >= 25 && intval($vacio[4]) <=27)) {
                $enfermedad = "{$enfermedades[4]}";$enlace="{$enlaces[4]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));
            }       
        }     
        
        /*Corazon seis elecciones 60%*/
        elseif(count($vacio)===6) {
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && (intval($vacio[3]) <= 4)  && intval($vacio[4]) > 4 && intval($vacio[5]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
            }
            elseif((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10) && (intval($vacio[5]) >= 5 && intval($vacio[5]) <=10) ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18) && (intval($vacio[5]) >= 11 && intval($vacio[5]) <=18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) >= 19 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) && (intval($vacio[5]) >= 19 && intval($vacio[5]) <=25))  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
            } 
            
            /*Corazon seis elecciones 50%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && (intval($vacio[3]) <= 4)  && intval($vacio[4]) > 4 && intval($vacio[5]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
            }
            elseif((intval($vacio[0]) < 5) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10) && (intval($vacio[5]) >= 5 && intval($vacio[5]) <=10)  ||(intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10) && (intval($vacio[5]) > 10)  ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 11) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18) && (intval($vacio[5]) >= 11 && intval($vacio[5]) <=18)  || (intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18) && (intval($vacio[5]) > 18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 19) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) && (intval($vacio[5]) >= 19 && intval($vacio[5]) <=25)  ||  (intval($vacio[0]) >= 19 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) && (intval($vacio[5]) > 25)   )  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
            }  
            /*Corazon seis elecciones 40%*/
            if( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && (intval($vacio[3]) <= 4)  && intval($vacio[4]) > 4 && intval($vacio[5]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
            }
            elseif((intval($vacio[0]) < 5 ) && (intval($vacio[1]) < 5) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10) && (intval($vacio[5]) >= 5 && intval($vacio[5]) <=10)  || (intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) > 10) && (intval($vacio[5]) > 10) || (intval($vacio[0]) < 5 ) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10) && (intval($vacio[5]) > 10) ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 11) && (intval($vacio[1]) < 11) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18) && (intval($vacio[5]) >= 11 && intval($vacio[5]) <=18)  || (intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) > 18) && (intval($vacio[5]) > 18) || (intval($vacio[0]) < 11) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18) && (intval($vacio[5]) > 18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) && (intval($vacio[5]) >= 19 && intval($vacio[5]) <=25)  ||  (intval($vacio[0]) >= 19 && intval($vacio[0]) <=25) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) > 25) && (intval($vacio[5]) > 25) ||  (intval($vacio[0]) < 19) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) && (intval($vacio[5]) > 25))  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
            }  
            /*Corazon seis elecciones 30%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && (intval($vacio[3]) > 4)  && intval($vacio[4]) > 4 && intval($vacio[5]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
            }elseif((intval($vacio[0]) < 5) && (intval($vacio[1]) < 5) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10) && (intval($vacio[5]) > 10)  || (intval($vacio[0]) < 5) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) > 10) && (intval($vacio[5]) > 10) || (intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) > 10) && (intval($vacio[4]) > 10) && (intval($vacio[5]) > 10)  ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
            }elseif((intval($vacio[0]) < 11) && (intval($vacio[1]) < 11) && (intval($vacio[2]) < 11) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18) && (intval($vacio[5]) >= 11 && intval($vacio[5]) <=18)  ||(intval($vacio[0]) < 11) && (intval($vacio[1]) < 11) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >= 11 && intval($vacio[4]) <=18) && (intval($vacio[5]) > 18) ||(intval($vacio[0]) < 11) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) > 18) && (intval($vacio[5]) >18) ||(intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) > 18) && (intval($vacio[4]) > 18) && (intval($vacio[5]) > 18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
            }elseif((intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) < 19) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) && (intval($vacio[5]) >= 19 && intval($vacio[5]) <=25)  ||  (intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) && (intval($vacio[5]) > 25) ||  (intval($vacio[0]) < 19) && (intval($vacio[1]) >= 19 && intval($vacio[1]) <=25) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) > 25) && (intval($vacio[5]) > 25) )  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
            }
            /*Corazon seis elecciones 20%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) > 4) && (intval($vacio[3]) > 4)  && intval($vacio[4]) > 4 && intval($vacio[5]) > 4 || ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) <= 4) && (intval($vacio[2]) <= 4) && intval($vacio[3]) >= 4  && intval($vacio[4]) >=4 && intval($vacio[5]) >=4 ) ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
            }
            elseif((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) > 10) && (intval($vacio[3]) > 10) && (intval($vacio[4]) > 10) && (intval($vacio[5]) > 10 )  || (intval($vacio[0]) < 5 ) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) > 10) && (intval($vacio[4]) > 10) && (intval($vacio[5]) > 10) || (intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) >= 5 && intval($vacio[1]) <=10) && (intval($vacio[2]) >= 5 && intval($vacio[2]) <=10) && (intval($vacio[3]) >= 5 && intval($vacio[3]) <=10) && (intval($vacio[4]) >= 5 && intval($vacio[4]) <=10) && (intval($vacio[5]) >= 5 && intval($vacio[5]) <=10) ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }
            elseif((intval($vacio[0]) >= 11 && intval($vacio[0]) <=18) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) > 18) && (intval($vacio[3]) > 18) && (intval($vacio[4]) > 18) && (intval($vacio[5]) > 18)  ||(intval($vacio[0]) < 11) && (intval($vacio[1]) >= 11 && intval($vacio[1]) <=18) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) > 18) && (intval($vacio[4]) > 18) && (intval($vacio[5]) > 18) ||(intval($vacio[0]) < 11) && (intval($vacio[1]) < 11) && (intval($vacio[2]) >= 11 && intval($vacio[2]) <=18) && (intval($vacio[3]) >= 11 && intval($vacio[3]) <=18) && (intval($vacio[4]) >18) && (intval($vacio[5]) >18))  {
                $enfermedad = "{$enfermedades[2]}";$enlace="{$enlaces[2]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
            }
            elseif((intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) < 19) && (intval($vacio[3]) < 19) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) && (intval($vacio[5]) >= 19 && intval($vacio[5]) <=25)  ||  (intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) < 19) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) >= 19 && intval($vacio[4]) <=25) && (intval($vacio[5]) >25) ||  (intval($vacio[0]) < 19) && (intval($vacio[1]) < 19) && (intval($vacio[2]) >= 19 && intval($vacio[2]) <=25) && (intval($vacio[3]) >= 19 && intval($vacio[3]) <=25) && (intval($vacio[4]) > 25) && (intval($vacio[5]) > 25) )  {
                $enfermedad = "{$enfermedades[3]}";$enlace="{$enlaces[3]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }elseif(intval($vacio[0]) <= 25 && intval($vacio[1]) <= 25 && intval($vacio[2]) <= 25 && intval($vacio[3]) <= 25 && intval($vacio[4]) > 25 && intval($vacio[5]) > 25) {
                $enfermedad = "{$enfermedades[4]}";$enlace="{$enlaces[4]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
            }    
            /*Corazon seis elecciones 0%*/
            if ( (intval($vacio[0]) <= 4) && (intval($vacio[1]) > 4) && (intval($vacio[2]) > 4) && (intval($vacio[3]) > 4)  && intval($vacio[4]) > 4 && intval($vacio[5]) > 4 ) {
                $enfermedad = "{$enfermedades[0]}";$enlace="{$enlaces[0]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));       
            }
            elseif((intval($vacio[0]) >= 5 && intval($vacio[0]) <=10) && (intval($vacio[1]) > 10) && (intval($vacio[2]) > 10) && (intval($vacio[3]) > 10) && (intval($vacio[4]) > 10) && (intval($vacio[5]) > 10 ) ) {
                $enfermedad = "{$enfermedades[1]}";$enlace="{$enlaces[1]}";   
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
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
            return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
            else{
                $enfermedad = "Recuerde no automedicarse y siempre consultar un especialista";
                $d = '';
                $x = '';
                $enlace='';
                $mensaje = '';
                $especialidades[0] = 'Buscar';
                $especialidades[1] = 'Buscar';
                $especialidades[2] = 'Buscar';
                return view('organos.corazon_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
            }

/*            public function lista_medico_corazon_medicina_general(Request $request){
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
            public function lista_medico_corazon_cardiologia(Request $request){
                $user =  Auth::id();
                $factura = Factura::where('user_id','=',$user)->get();
                foreach($factura as $f){
                    $factu = $f->user_id;
                }
                if(isset($factu)===false){
                    $factu = 1;
                }  
                $especialidad= 'CARDIOLOGÍA';
                
                $lista_medico = Medico::orderBy('id','DESC')
                ->where('pagos','=','positive')
                ->especialidad($especialidad)
                ->Paginate(20);

                return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
            }
            public function lista_medico_corazon_medicina_familiar(Request $request){
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
            public function lista_medico_corazon_cardiovascular(Request $request){
                $user =  Auth::id();
                $factura = Factura::where('user_id','=',$user)->get();
                foreach($factura as $f){
                    $factu = $f->user_id;
                }
                if(isset($factu)===false){
                    $factu = 1;
                }  
                $especialidad= 'CARDIOVASCULAR';
                
                $lista_medico = Medico::orderBy('id','DESC')
                ->where('pagos','=','positive')
                ->especialidad($especialidad)
                ->Paginate(20);

                return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
            }*/ 
        }






