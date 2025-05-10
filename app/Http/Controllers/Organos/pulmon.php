<?php

namespace App\Http\Controllers\Organos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Medico;
use App\Models\Factura;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class pulmon extends Controller
{

    public function pulmon_vista(Request $request){
        $array =array($request->pulmon1,$request->pulmon2,$request->pulmon3,$request->pulmon4,$request->pulmon5,$request->pulmon6,$request->pulmon7,$request->pulmon8,$request->pulmon9,$request->pulmon10,$request->pulmon11,$request->pulmon12,$request->pulmon13,$request->pulmon14,$request->pulmon15,$request->pulmon16,$request->pulmon17,$request->pulmon18,$request->pulmon19,$request->pulmon20,$request->pulmon21,$request->pulmon22,$request->pulmon23,$request->pulmon24,$request->pulmon25,$request->pulmon26,$request->pulmon27,$request->pulmon28,$request->pulmon29,$request->pulmon30,$request->pulmon31,$request->pulmon32,$request->pulmon33,$request->pulmon34,$request->pulmon35,$request->pulmon36,$request->pulmon37,$request->pulmon38);
        $user = Auth::id();
        $mensaje= '. Le sugerimos buscar en las siguientes especialidades médicas y consultar un médico:';
        $d='Usted puede tener la enfermedad:';
        $x= 'Probabilidad de coincidencia de enfermedad:';
        $enfermedades = ['Embolia pulmonar','Obstrucción pulmonar crónica (EPOC)','Fibrosis pulmonar','Hipertensión pulmonar','Insuficiencia respiratoria','Neumonía','Virus respiratorio sincitial'];
        $enlaces = ['https://www.mayoclinic.org/es-es/diseases-conditions/pulmonary-embolism/symptoms-causes/syc-20354647','https://www.mayoclinic.org/es-es/diseases-conditions/copd/symptoms-causes/syc-20353679','https://www.mayoclinic.org/es-es/diseases-conditions/pulmonary-fibrosis/symptoms-causes/syc-20353690','https://www.mayoclinic.org/es-es/diseases-conditions/pulmonary-hypertension/symptoms-causes/syc-20350697','https://www.mayoclinic.org/es-es/diseases-conditions/ards/symptoms-causes/syc-20355576','https://www.mayoclinic.org/es-es/diseases-conditions/pneumonia/symptoms-causes/syc-20354204','https://www.mayoclinic.org/es-es/diseases-conditions/respiratory-syncytial-virus/symptoms-causes/syc-20353098'];
        $ruta = ['/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador','/lista_de_medicos_disponibles_en_tumedibot.com/Super_Buscador'];
        $especialidades = ['Medicina General','Neumonología','Cardiología'];
        $probabilidad = ['20%','30%','40%','50%','60%','0%'];
        $probability = "{$probabilidad[0]}";$probability_a = "{$probabilidad[1]}";$probability_b = "{$probabilidad[2]}";$probability_c = "{$probabilidad[3]}";$probability_d = "{$probabilidad[4]}";$probability_zero = "{$probabilidad[5]}";
        $vacio = [];
        for ($i=0; $i < count($array); $i++){
            $array[$i] ;
            if ($array[$i] != null){
                array_push($vacio, $array[$i]);
            }
        }
        /*pulmon dos elecciones*/
        if(count($vacio)===2){
            if((intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6)){
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";                  
        return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
        }elseif(intval($vacio[0]) >= 7 && (intval($vacio[0]) <=11) && intval($vacio[1]) >= 7 && (intval($vacio[1]) <=11)) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";  
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif (intval($vacio[0]) >= 12 && (intval($vacio[0]) <=17) && intval($vacio[1]) >= 12 && (intval($vacio[1]) <=17)) {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";  
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) || (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22 && intval($vacio[0]) == 14)) {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";   
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif (intval($vacio[0]) >= 23 && (intval($vacio[0]) <=28) && intval($vacio[1]) >= 23 && (intval($vacio[1]) <=28)) {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif (intval($vacio[0]) >= 29 && (intval($vacio[0]) <=34) && intval($vacio[1]) >= 29 && (intval($vacio[1]) <=34) ||(intval($vacio[1]) >= 29 && intval($vacio[1]) <= 34 && intval($vacio[0]) == 23) ) {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif (intval($vacio[0]) >= 35 && (intval($vacio[0]) <=38) && intval($vacio[1]) >= 35 && (intval($vacio[1]) <=38) || (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38 && intval($vacio[0]) == 8) || (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38 && intval($vacio[0]) == 29)) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }   


          if((intval($vacio[0]) <= 6) && (intval($vacio[1]) > 6)){
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";                  
        return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta'));       
        }elseif ((intval($vacio[0]) >= 7  && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 11)) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";  
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12)) {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";  
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18)) {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23)) {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29)) {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 35 && intval($vacio[0]) <=38) && (intval($vacio[1]) >= 35)) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";   
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }           
      }

      /*pulmon tres elecciones*/
      elseif(count($vacio)===3){
        if ( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6)  ) {
            $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";   
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
        }
        elseif(
            (intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11)) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";   
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }

        elseif ( (intval($vacio[0]) >= 12 && (intval($vacio[0]) <=17)) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && (intval($vacio[2]) <=17)))  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }

        elseif ( (intval($vacio[0]) >= 18 && (intval($vacio[0]) <=22)) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && (intval($vacio[2]) <=22)) ||  (intval($vacio[1]) >=18 && intval($vacio[1]) <=22  && intval($vacio[2]) >= 18 && intval($vacio[2]) <= 22 && intval($vacio[0]) == 14) ) {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }

        elseif ( (intval($vacio[0]) >= 23 && (intval($vacio[0]) <=28)) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) ) {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }

        elseif ( (intval($vacio[0]) >= 29 && (intval($vacio[0]) <=34)) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && (intval($vacio[2]) <=34)) || (intval($vacio[1]) >=29 && intval($vacio[1]) <=34  && intval($vacio[2]) >= 29 && intval($vacio[2]) <= 34 && intval($vacio[0]) == 23) ) {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }

        elseif ( (intval($vacio[0]) >= 35 && (intval($vacio[0]) <=38)) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && (intval($vacio[2]) <=38)) || (intval($vacio[1]) >=35 && intval($vacio[1]) <=38  && intval($vacio[2]) >= 35 && intval($vacio[2]) <= 38 && intval($vacio[0]) == 29) || (intval($vacio[1]) >=35 && intval($vacio[1]) <=38)  && intval($vacio[2]) >= 35 && intval($vacio[2]) <= 38 && (intval($vacio[0]) == 8) )  {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }
        if (( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) > 6))  ) {
            $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";   
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
        }elseif((intval($vacio[0]) >= 7 && intval($vacio[0]) <= 11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <= 11) && (intval($vacio[2]) >= 7) || (intval($vacio[1]) >=7 && intval($vacio[1]) <=11  && intval($vacio[2]) >= 7 && intval($vacio[2]) <= 11 && intval($vacio[0]) <= 7) ) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";   
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
        }elseif ((intval($vacio[0]) >= 12 && intval($vacio[0]) <= 17 && intval($vacio[1]) >= 12 && intval($vacio[1]) <= 17 && intval($vacio[2]) >= 12) || (intval($vacio[1]) >=12 && intval($vacio[1]) <=17  && intval($vacio[2]) >= 12 && intval($vacio[2]) <= 17 && intval($vacio[0]) <= 12) )  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
        }elseif ( intval($vacio[0]) >= 18 && intval($vacio[0]) <= 22 && intval($vacio[1]) >= 18 && intval($vacio[1]) <= 22 && intval($vacio[2]) >= 18 || intval($vacio[1]) >=18 && intval($vacio[1]) <=22  && intval($vacio[2]) >= 18 && intval($vacio[2]) <= 22 && intval($vacio[0]) <= 18 ||  intval($vacio[0]) == 14 && intval($vacio[1]) >=18 && intval($vacio[1]) <=22  && intval($vacio[2]) >= 18  || intval($vacio[1]) ==14  && intval($vacio[2]) >= 18 && intval($vacio[2]) <= 22 && intval($vacio[0]) <= 18 ) {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 23 && intval($vacio[0]) <= 28 && intval($vacio[1]) >= 23 && intval($vacio[1]) <= 28 && intval($vacio[2]) >= 23) || (intval($vacio[1]) >=23 && intval($vacio[1]) <=28  && intval($vacio[2]) >= 23 && intval($vacio[2]) <= 28 && intval($vacio[0]) <= 23) ) {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif( (intval($vacio[0]) >= 29 && intval($vacio[0]) <= 34 && intval($vacio[1]) >= 29 && intval($vacio[1]) <= 34 && intval($vacio[2]) >= 29) || (intval($vacio[1]) >=29 && intval($vacio[1]) <=34  && intval($vacio[2]) >= 29 && intval($vacio[2]) <= 34 && intval($vacio[0]) <= 29) || (intval($vacio[1]) == 23  && intval($vacio[2]) >= 29 && intval($vacio[2]) <= 34 && intval($vacio[0]) <= 29)|| (intval($vacio[0]) == 23  && intval($vacio[1]) >= 29 && intval($vacio[1]) <= 34 && intval($vacio[2]) >= 29)  ) {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
        }elseif( (intval($vacio[0]) <= 35 && intval($vacio[1]) >= 35 && intval($vacio[1]) <= 38 && intval($vacio[2]) >= 35 && intval($vacio[2]) <= 38) || (intval($vacio[1]) >=8 && intval($vacio[1]) <35 && intval($vacio[2]) >= 35 && intval($vacio[2]) <= 38 && intval($vacio[0]) == 8)) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }


        elseif( (intval($vacio[0]) <= 6) && (intval($vacio[1]) >= 6) && (intval($vacio[2]) >= 6) ) {
            $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }
          elseif( (intval($vacio[0]) >= 7 && (intval($vacio[0]) <=11)) && (intval($vacio[1]) >= 7) && (intval($vacio[2]) >= 7))  {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 12 && (intval($vacio  [0]) <=17)) && (intval($vacio[1]) >= 12) && (intval($vacio[2]) >= 7))   {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 17 && (intval($vacio[0]) <=22)) && (intval($vacio[1]) >= 17) && (intval($vacio[2]) >= 17))  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 23 && (intval($vacio[0]) <=28)) && (intval($vacio[1]) >= 23) && (intval($vacio[2]) >= 23))  {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif (  (intval($vacio[0]) >= 29 && (intval($vacio[0]) <=34)) && (intval($vacio[1]) >= 29 ) && (intval($vacio[2]) >= 29))  {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }
      
      }

      /*pulmon cuatro elecciones*/
      elseif(count($vacio)===4){
        if ( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6) && (intval($vacio[3]) <= 6) ) {
            $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
        }elseif ((intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) ) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) ) {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) || (intval($vacio[0]) == 14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22)) {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) ) {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) || (intval($vacio[0]) == 23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) ) {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }elseif((intval($vacio[0]) >= 35 && intval($vacio[0]) <=38) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) || (intval($vacio[0]) == 29) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) || (intval($vacio[0]) == 8) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38)) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }   


  if (( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6) && (intval($vacio[3]) >= 6) )) {
            $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));
        }elseif((intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >=7) || (intval($vacio[0]) <= 7) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && (intval($vacio[2]) <= 11)) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <= 11)) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >=12) || (intval($vacio[0]) <= 12) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && (intval($vacio[2]) <= 17)) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <= 17 )) {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >=18) || (intval($vacio[0]) <= 18) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && (intval($vacio[2]) <= 22)) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <= 22 ) || (intval($vacio[0]) == 14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18) && (intval($vacio[3]) >= 18)|| ((intval($vacio[0]) <= 14) && (intval($vacio[1]) == 14) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18)) ) {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >=23) || (intval($vacio[0]) <= 23) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && (intval($vacio[2]) <= 28)) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <= 28 )) {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >=29) || (intval($vacio[0]) <= 29) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && (intval($vacio[2]) <= 34)) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <= 34 ) || (intval($vacio[0]) == 23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29) ||
            intval($vacio[0]) <= 23 && (intval($vacio[1]) == 23) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34)  ) {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        } elseif ( (intval($vacio[0]) <= 35) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >=35 && intval($vacio[3]) <=38) || (intval($vacio[0]) <= 28) && (intval($vacio[1]) == 29) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >=35 && intval($vacio[3]) <=38) || (intval($vacio[0]) == 8) && (intval($vacio[1]) >= 9 && (intval($vacio[1]) <= 34 ) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >=35 && intval($vacio[3]) <=38) || (intval($vacio[0]) <= 28) && (intval($vacio[1]) == 29) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >=35 && intval($vacio[3]) <=38) || (intval($vacio[0]) <= 8) && (intval($vacio[1]) == 8) && (intval($vacio[2]) == 29) && (intval($vacio[3]) >=35 && intval($vacio[3]) <=38) || (intval($vacio[0]) == 8) && (intval($vacio[1]) >=8 && intval($vacio[1]) <=28) && (intval($vacio[2]) == 29) && (intval($vacio[3]) >=35 && intval($vacio[3]) <=38) )) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }

        if (( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) >= 6) && (intval($vacio[3]) >= 6) ) ) {
            $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
        }elseif( (intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7) && (intval($vacio[3]) >= 7) || ((intval($vacio[0]) <= 7) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 7 && (intval($vacio[2]) <= 11)) && (intval($vacio[3]) >= 7) ) ) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12) && (intval($vacio[3]) >= 12) || ((intval($vacio[0]) <= 12) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && (intval($vacio[2]) <= 17)) && (intval($vacio[3]) >= 12) ) || (intval($vacio[0]) <= 12) && (intval($vacio[1]) <= 12) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) ) {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18) && (intval($vacio[3]) >= 18) 
            || ((intval($vacio[0]) <= 18) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >=18 && (intval($vacio[2]) <= 22)) && (intval($vacio[3]) >= 18) ) || (intval($vacio[0]) == 14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18) && (intval($vacio[3]) >= 18)|| ((intval($vacio[0]) <= 14) && (intval($vacio[1]) == 14) && (intval($vacio[2]) >= 18) && (intval($vacio[3]) >= 18)) || ((intval($vacio[0]) <= 18) && (intval($vacio[1]) <= 18) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22)) ) {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23) && (intval($vacio[3]) >= 23) || (intval($vacio[0]) <= 23) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && (intval($vacio[2]) <= 28)) && (intval($vacio[3]) >= 23)    || (intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23) && (intval($vacio[3]) >= 23)  || (intval($vacio[0]) <= 23) && (intval($vacio[1]) <=23) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28)) {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif ((intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29) && (intval($vacio[3]) >= 29) ||((intval($vacio[0]) <= 29) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >=29 && (intval($vacio[2]) <= 34)) && (intval($vacio[3]) >= 29) ) || (intval($vacio[0]) == 23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29) || (intval($vacio[0]) == 23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29) && (intval($vacio[3]) >= 29) || (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[0]) <= 29) && (intval($vacio[1]) <= 29) ) {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));
        }elseif ((intval($vacio[0]) >= 35 && intval($vacio[0]) <=38) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38)  ||  (intval($vacio[0]) >= 35 && intval($vacio[0]) <=38) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >=35) || (intval($vacio[0]) >= 35 && intval($vacio[0]) <=38) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35) && (intval($vacio[3]) >= 35) || (intval($vacio[0]) <= 35) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && (intval($vacio[2]) <= 38)) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <= 38 )
            || ((intval($vacio[0]) <= 35) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >=35 && (intval($vacio[2]) <= 38)) && (intval($vacio[3]) >= 35) ) || (intval($vacio[0]) == 23) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=38) || (intval($vacio[0]) == 8) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35) || (intval($vacio[0]) == 8) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35) && (intval($vacio[3]) >= 35)|| ((intval($vacio[0]) <= 8) && (intval($vacio[1]) == 8) && (intval($vacio[2]) >= 35) && (intval($vacio[3]) >= 35)) || (intval($vacio[0]) == 29) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35) || (intval($vacio[0]) == 29) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35) && (intval($vacio[3]) >= 35)|| ((intval($vacio[0]) <= 29) && (intval($vacio[1]) == 29) && (intval($vacio[2]) >= 35) && (intval($vacio[3]) >= 35))  ) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }

        elseif( (intval($vacio[0]) <= 6) && (intval($vacio[1]) >= 6) && (intval($vacio[2]) >= 6) && (intval($vacio[3]) >= 6)  ) {
            $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }
          elseif( (intval($vacio[0]) >= 7 && (intval($vacio[0]) <=11)) && (intval($vacio[1]) >= 7) && (intval($vacio[2]) >= 7) && (intval($vacio[3]) >= 7))  {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 12 && (intval($vacio  [0]) <=17)) && (intval($vacio[1]) >= 12) && (intval($vacio[2]) >= 12) && (intval($vacio[3]) >= 12) )   {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 17 && (intval($vacio[0]) <=22)) && (intval($vacio[1]) >= 17) && (intval($vacio[2]) >= 17) && (intval($vacio[3]) >= 17))  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 23 && (intval($vacio[0]) <=28)) && (intval($vacio[1]) >= 23) && (intval($vacio[2]) >= 23) && (intval($vacio[3]) >= 23))  {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif (  (intval($vacio[0]) >= 29 && (intval($vacio[0]) <=34)) && (intval($vacio[1]) >= 29 ) && (intval($vacio[2]) >= 29) && (intval($vacio[3]) >= 29))  {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }         
      }
      
      /*pulmon cinco elecciones*/
      elseif(count($vacio)===5) {
        if ((intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6) && (intval($vacio[3]) <= 6) && (intval($vacio[4]) <= 6)) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));       
        }
        elseif( (intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 7 && intval($vacio[4]) <=11)) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17))  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
        }
        elseif( intval($vacio[0]) == 14 && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22)){
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
        }elseif( ( intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28)) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));       
        }elseif( ( intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) || ( intval($vacio[0]) == 23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34)  ) {
                $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));       
        }elseif( ( intval($vacio[0])==8) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])==29) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) ==29) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) ) {
                $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));       
        }

      /** 40%**/
   if ( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6) && (intval($vacio[3]) <= 6) && (intval($vacio[4]) >= 6) ) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b ','x','enlace','user','ruta'));       
        } elseif( (intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >=12) || (intval($vacio[0]) <= 7) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 7 && intval($vacio[4]) <=11)){
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }elseif((intval($vacio[0]) <= 11) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17) || (intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 17))  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b ','x','enlace','user','ruta')); 
        }elseif((intval($vacio[0]) <= 17) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) || (intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 19) || (intval($vacio[0]) == 14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 19) || (intval($vacio[0]) <= 13) && (intval($vacio[1]) == 14) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22))  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }elseif( ( intval($vacio[0]) <= 23) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28) || ( intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23)) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
        }elseif( ( intval($vacio[0]) <= 29) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) || ( intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 34) || ( intval($vacio[0]) == 23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 34) || ( intval($vacio[0]) <= 22) && (intval($vacio[1]) == 23) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) ) {
                $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
        }elseif( ( intval($vacio[0])<=34) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1]) == 8) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) >= 9 && intval($vacio[1]) <= 34) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) == 29) && (intval($vacio[2]) >= 30 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1]) == 8) && (intval($vacio[2]) == 29) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) >= 9 && intval($vacio[1]) <=28) && (intval($vacio[2]) == 29) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) == 29 ) && (intval($vacio[2]) >= 30 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])<=28) && (intval($vacio[1]) == 29) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])==29) && (intval($vacio[1]) >= 30 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38)) {
                $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));
            }



       /**30% **/
           if ((intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6) && (intval($vacio[3]) >= 6) && (intval($vacio[4]) >= 6) ) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
        }elseif( (intval($vacio[0]) <= 6 && intval($vacio[1]) <=6) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 7 && intval($vacio[4]) <=11)  || (intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 12 && intval($vacio[4]) >=12) ||  (intval($vacio[0]) <= 6 && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11)) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >=11)) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }elseif((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 18) && (intval($vacio[4]) >=18)  || (intval($vacio[0]) <= 11) && (intval($vacio[1]) <= 11) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17) || (intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17) || (intval($vacio[0]) <= 11) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 18))  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }elseif((intval($vacio[0]) == 14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 23) || (intval($vacio[0]) <= 13) && (intval($vacio[1]) <= 13) && (intval($vacio[2]) == 14) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) ||(intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 23) && (intval($vacio[4]) >= 23 )  ||  (intval($vacio[0]) <= 17) && (intval($vacio[1]) <= 17) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) ||  (intval($vacio[0]) <= 13) && (intval($vacio[1]) == 14) && (intval($vacio[2]) >= 15 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) || (intval($vacio[0]) <= 14) && (intval($vacio[1]) == 14) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 23) ||  (intval($vacio[0]) == 14) && (intval($vacio[1]) >= 15 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 23) ||  (intval($vacio[0]) == 14) && (intval($vacio[1]) >= 15 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 15 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) || (intval($vacio[0]) == 14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 23) && (intval($vacio[4]) >= 23))  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }elseif( ( intval($vacio[0]) <= 22) && (intval($vacio[1]) <=22) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28) || ( intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 29) && (intval($vacio[4]) >= 29) || ( intval($vacio[0]) <=22) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 29)) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
        }elseif( ( intval($vacio[0]) <= 28 ) && (intval($vacio[1]) <=28) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) || ( intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35) && (intval($vacio[4]) >=35) || ( intval($vacio[0]) <= 22) && (intval($vacio[1]) <=22) && (intval($vacio[2]) == 23) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) || ( intval($vacio[0]) == 23) && (intval($vacio[1]) >= 24 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 24 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) || ( intval($vacio[0]) ==23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35) && (intval($vacio[4]) >= 35 ) || ( intval($vacio[0]) <=22) && (intval($vacio[1]) == 23 ) && (intval($vacio[2]) >= 24 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) || ( intval($vacio[0]) <=22) && (intval($vacio[1]) == 23) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 35)) {
                $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
        }elseif( ( intval($vacio[0])==29) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) >= 35 && intval($vacio[1]) <=38) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1])<=7) && (intval($vacio[2]) == 8) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) >= 9 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 9 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38)
            || ( intval($vacio[0])==8) && (intval($vacio[1]) >= 30 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 30 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1]) == 8) && (intval($vacio[2]) >= 9 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1]) == 8) && (intval($vacio[2]) >= 30 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1]) <=7) && (intval($vacio[2]) == 29) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38)|| (intval($vacio[0]) >= 9 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 9 && intval($vacio[1]) <=28) && (intval($vacio[2]) == 29) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || (intval($vacio[0]) == 29) && (intval($vacio[1]) >= 30 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 30 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) || (intval($vacio[0]) <= 29) && (intval($vacio[1]) == 29) && (intval($vacio[2]) >= 30 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38)|| (intval($vacio[0]) <= 34) && (intval($vacio[1]) <= 34) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38)) {
                $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
        }

         /**20% **/
           if ((intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) > 6) && (intval($vacio[3]) > 6) && (intval($vacio[4]) > 6)) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
        }elseif( (intval($vacio[0]) >=7  && intval($vacio[0]) <=11) && (intval($vacio[1]) >=7  && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 12) && (intval($vacio[3]) >= 12) && (intval($vacio[4]) >= 12) ) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 18) && (intval($vacio[3]) >= 18) && (intval($vacio[4]) >= 18) || (intval($vacio[0]) <= 6 ) && (intval($vacio[1]) >=7  && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 18) || (intval($vacio[0]) <= 6 ) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 18) && (intval($vacio[4]) >= 18) ) {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif((intval($vacio[0]) <= 17) && (intval($vacio[1]) <= 17) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 23) || (intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 23) && (intval($vacio[3]) >= 23) && (intval($vacio[4]) >= 23))  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }elseif( ( intval($vacio[0]) <= 23) && (intval($vacio[1]) <= 23) && (intval($vacio[2]) <= 23) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28) || ( intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 29) && (intval($vacio[3]) >= 29) && (intval($vacio[4]) >= 29) || ( intval($vacio[0]) <= 23) && (intval($vacio[1]) <= 23) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 29) || ( intval($vacio[0]) <= 23) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 29) && (intval($vacio[4]) >= 29)) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
        }elseif( ( intval($vacio[0]) <= 28) && (intval($vacio[1]) <= 28) && (intval($vacio[2]) <= 28) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) || ( intval($vacio[0]) <= 28) && (intval($vacio[1]) <= 28) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 35) || ( intval($vacio[0]) <= 28) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35) && (intval($vacio[4]) >= 35)) {
                $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
        }elseif( ( intval($vacio[0])<=34) && (intval($vacio[1]) <=34) && (intval($vacio[2]) <= 34) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38)) {
                $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
        }



        elseif( (intval($vacio[0]) <= 6) && (intval($vacio[1]) >= 6) && (intval($vacio[2]) >= 6) && (intval($vacio[3]) >= 6) && (intval($vacio[4]) >= 6) || (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) >= 6) && (intval($vacio[3]) >= 6) && (intval($vacio[4]) >= 6) ) {
            $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }
        elseif( (intval($vacio[0]) >= 7 && (intval($vacio[0]) <=11)) && (intval($vacio[1]) >= 7) && (intval($vacio[2]) >= 7) && (intval($vacio[3]) >= 7) && (intval($vacio[4]) >= 7) || (intval($vacio[0]) >= 7 && (intval($vacio[0]) <=11)) && intval($vacio[1]) >= 7 && (intval($vacio[0]) <=11) && (intval($vacio[2]) >= 7) && (intval($vacio[3]) >= 7) && (intval($vacio[4]) >= 7)  )  {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 12 && (intval($vacio  [0]) <=17)) && (intval($vacio[1]) >= 12) && (intval($vacio[2]) >= 12) && (intval($vacio[3]) >= 12) && (intval($vacio[4]) >= 12) || (intval($vacio[0]) >= 12 && (intval($vacio  [0]) <=17)) && intval($vacio[1]) >= 12 && (intval($vacio  [1]) <=17) && (intval($vacio[2]) >= 12) && (intval($vacio[3]) >= 12) && (intval($vacio[4]) >= 12) )   {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 18 && (intval($vacio[0]) <=22)) && (intval($vacio[1]) >= 18) && (intval($vacio[2]) >= 18) && (intval($vacio[3]) >= 18)  && (intval($vacio[4]) >= 18) || (intval($vacio[0]) >= 18 && (intval($vacio[0]) <=22)) && (intval($vacio[1]) >= 17 && (intval($vacio[1]) <=22)) && (intval($vacio[2]) >= 18) && (intval($vacio[3]) >= 18)  && (intval($vacio[4]) >= 18) )  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 23 && (intval($vacio[0]) <=28)) && (intval($vacio[1]) >= 23) && (intval($vacio[2]) >= 23) && (intval($vacio[3]) >= 23) && (intval($vacio[4]) >= 23) || (intval($vacio[0])  >= 23 && (intval($vacio[0]) <=28)) && (intval($vacio[1]) >= 23 && (intval($vacio[1]) <=28)) && (intval($vacio[2]) >= 23) && (intval($vacio[3]) >= 23) && (intval($vacio[4]) >= 23) )  {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 29 && (intval($vacio[0]) <=34)) && (intval($vacio[1]) >= 29 ) && (intval($vacio[2]) >= 29) && (intval($vacio[3]) >= 29) && (intval($vacio[4]) >= 29) || (intval($vacio[0]) >= 29 && (intval($vacio[0]) <=34)) && (intval($vacio[1]) >= 29 && (intval($vacio[1]) <=34) ) && (intval($vacio[2]) >= 29) && (intval($vacio[3]) >= 29) && (intval($vacio[4]) >= 29))  {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }         
      }


      /*pulmon seis elecciones*/
      elseif(count($vacio)===6) {
        if ( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6) && (intval($vacio[3]) <= 6) && (intval($vacio[4]) <= 6) && (intval($vacio[5]) <= 6) ) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));       
        }
        elseif((intval($vacio[0]) <= 6 ) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 7 && intval($vacio[4]) <=11) && (intval($vacio[5]) >= 7 && intval($vacio[5]) <=11)  || (intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 7 && intval($vacio[4]) <=11) && (intval($vacio[5]) >= 12) ) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17) && (intval($vacio[5]) >= 12 && intval($vacio[5]) <=17)  )  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) == 14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 18 && intval($vacio[5]) <=22) )  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
        } elseif ( ( intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28) && (intval($vacio[5]) >= 23 && intval($vacio[5]) <=28) ) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));       
        }
        elseif ( (intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) || ( intval($vacio[0]) == 23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 29 && intval($vacio[5]) <=34)) {
                $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta'));       
        }
        elseif( ( intval($vacio[0])==8) && (intval($vacio[1])==29) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38)) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_d','x','enlace','user','ruta')); 
        }  

        //**50%**//
          if ( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6) && (intval($vacio[3]) <= 6) && (intval($vacio[4]) <= 6) && (intval($vacio[5]) >= 7) ) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));       
        }
        elseif((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17) && (intval($vacio[5]) >= 17) || (intval($vacio[0]) <= 11) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17) && (intval($vacio[5]) >= 12 && intval($vacio[5]) <=17) )  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) == 14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 23)  ||  (intval($vacio[0]) <= 13) && (intval($vacio[1]) == 14) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 18 && intval($vacio[5]) <=22) ||  (intval($vacio[0]) <= 17) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 18 && intval($vacio[5]) <=22) ||  (intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 23))  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
        } elseif ( ( intval($vacio[0]) <= 22) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28) && (intval($vacio[5]) >= 23 && intval($vacio[5]) <=28) || ( intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28) && (intval($vacio[5]) >= 29)) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));       
        }
        elseif ( ( intval($vacio[0]) ==23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 35) || ( intval($vacio[0]) <= 22) && (intval($vacio[1]) == 23) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) || ( intval($vacio[0]) ==23) && (intval($vacio[1]) >= 24 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 35) || ( intval($vacio[0]) <= 28 ) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) || ( intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 35) ) {
                $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta'));       
        }
        elseif( ( intval($vacio[0])<=7) && (intval($vacio[1])==8) && (intval($vacio[2]) == 29) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) >= 9 && intval($vacio[1]) <=28) && (intval($vacio[2]) ==29) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1])==29) && (intval($vacio[2]) >= 30 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1])==8) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) >= 9 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])<=28) && (intval($vacio[1]) == 29) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])==29) && (intval($vacio[1]) >= 30 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38)) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_c','x','enlace','user','ruta')); 
        }  

         //**40%**//
          if ( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6) && (intval($vacio[3]) <= 6) && (intval($vacio[4]) >= 7) && (intval($vacio[5]) >= 7) ) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
        }
        elseif((intval($vacio[0]) <=6) && (intval($vacio[1]) <=6) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 7 && intval($vacio[4]) <=11) && (intval($vacio[5]) >= 7 && intval($vacio[5]) <=11)  || (intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 12) && (intval($vacio[5]) >= 12) || (intval($vacio[0]) <=6) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 7 && intval($vacio[4]) <=11) && (intval($vacio[5]) >= 12)  ) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) <=11) && (intval($vacio[1]) <=11) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17) && (intval($vacio[5]) >= 12 && intval($vacio[5]) <=17) ||(intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 18) && (intval($vacio[5]) >= 18) || (intval($vacio[0]) <=11) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17) && (intval($vacio[5]) >= 18))  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) <=13) && (intval($vacio[1]) <=13) && (intval($vacio[2]) ==14) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 18 && intval($vacio[5]) <=22)  ||  (intval($vacio[0]) ==14) && (intval($vacio[1]) >= 15 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 15 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 18 && intval($vacio[5]) <=22) ||  (intval($vacio[0]) ==14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 23) && (intval($vacio[5]) >= 23) ||  (intval($vacio[0]) <=13) && (intval($vacio[1]) ==14) && (intval($vacio[2]) >= 15 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 18 && intval($vacio[5]) <=22) ||
         (intval($vacio[0]) <=13) && (intval($vacio[1]) ==14) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 23) || (intval($vacio[0]) == 14) && (intval($vacio[1]) >= 15 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 23) || (intval($vacio[0]) <=17) && (intval($vacio[1]) <=17) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 18 && intval($vacio[5]) <=22) || (intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 23) && (intval($vacio[5]) >= 23) || (intval($vacio[0]) <=17) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 23))  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        } elseif ( ( intval($vacio[0]) <=22) && (intval($vacio[1]) <=22) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28) && (intval($vacio[5]) >= 23 && intval($vacio[5]) <=28) || ( intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 29) && (intval($vacio[5]) >= 29) || (intval($vacio[0]) <=22) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28) && (intval($vacio[5]) >= 29) ) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
        }
        elseif ( (intval($vacio[0]) <=22) && (intval($vacio[1]) <=22) && (intval($vacio[2]) == 23 || intval($vacio[2]) == 12) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) || ( intval($vacio[0]) ==23 || intval($vacio[0]) ==12) && (intval($vacio[1]) <= 28) && (intval($vacio[2]) <=28) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) || ( intval($vacio[0]) ==23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 35) && ( intval($vacio[5]) >= 35) || (intval($vacio[0]) <=23) && (intval($vacio[1]) ==23) && (intval($vacio[2]) >= 24 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) || (intval($vacio[0]) <=22) && (intval($vacio[1]) ==23) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 35) || ( intval($vacio[0]) ==23) && (intval($vacio[1]) >= 24 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 35) || ( intval($vacio[0]) <=28) && (intval($vacio[1]) <=28) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) || (intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 35) && ( intval($vacio[5]) >= 35) || (intval($vacio[0]) <=28) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 35)) {
                $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta'));       
        }
        elseif( ( intval($vacio[0])<=7) && (intval($vacio[1])<=7) && (intval($vacio[2]) == 8) && (intval($vacio[3]) ==29) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) >= 9 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 9 && intval($vacio[2]) <=34) && (intval($vacio[3]) ==29) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1])==29) && (intval($vacio[2]) >= 30 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 30 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1])==8) && (intval($vacio[2]) >= 9 && intval($vacio[2]) <=28) && (intval($vacio[3]) ==29) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1])==8) && (intval($vacio[2]) ==29) && (intval($vacio[3]) >= 30 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38)|| ( intval($vacio[0])==8) && (intval($vacio[1]) >= 30 && intval($vacio[1]) <=34) && (intval($vacio[2]) ==29) && (intval($vacio[3]) >= 30 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])<=34) && (intval($vacio[1])<=34) && (intval($vacio[2]) >= 35 && intval($vacio[2]) <=38) && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38)) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_b','x','enlace','user','ruta')); 
        }  

   //**30%**//
          if ( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) <= 6) && (intval($vacio[3]) >= 7) && (intval($vacio[4]) >= 7) && (intval($vacio[5]) >= 7) ) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
        }
        elseif((intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 7 && intval($vacio[4]) <=11) && (intval($vacio[5]) >=12)  || (intval($vacio[0]) <=6) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 12) && (intval($vacio[5]) >= 12) ||(intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 12) && (intval($vacio[4]) >= 12) && (intval($vacio[5]) >= 12)  ) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) <= 11) && (intval($vacio[1]) <= 11) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 12 && intval($vacio[4]) <=17) && (intval($vacio[5]) >=18)  || (intval($vacio[0]) <=11) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 12 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 18) && (intval($vacio[5]) >= 18) ||(intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 12 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 18) && (intval($vacio[4]) >= 18) && (intval($vacio[5]) >= 18) )  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) <=13) && (intval($vacio[1]) <=13) && (intval($vacio[2]) ==14) && (intval($vacio[3]) >= 15 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 18 && intval($vacio[5]) <=22) || (intval($vacio[0]) <=13) && (intval($vacio[1]) <=13) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=13) && (intval($vacio[3]) ==14) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 18 && intval($vacio[5]) <=22) || (intval($vacio[0]) <=13) && (intval($vacio[1])==14) && (intval($vacio[2]) >= 15 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 15 && intval($vacio[3]) <=17) && (intval($vacio[4]) >= 23) && (intval($vacio[5]) >= 23) || (intval($vacio[0]) <=13) && (intval($vacio[1]) ==14) && (intval($vacio[2]) >= 15 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) <=23) || (intval($vacio[0]) ==14) && (intval($vacio[1]) >= 15 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 15 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 23) || (intval($vacio[0]) ==14) && (intval($vacio[1]) >= 15 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 23) && (intval($vacio[5]) >= 23) || (intval($vacio[0]) ==14) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 23) && (intval($vacio[4]) >= 23) && (intval($vacio[5]) >= 23) || (intval($vacio[0]) <= 17) && (intval($vacio[1]) <=17) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 18 && intval($vacio[4]) <=22) && (intval($vacio[5]) >= 23) || (intval($vacio[0]) <=17) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 18 && intval($vacio[3]) <=22) && (intval($vacio[4]) >= 23) && (intval($vacio[5]) >= 23) || (intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18 && intval($vacio[2]) <=22) && (intval($vacio[3]) >= 23) && (intval($vacio[4]) >= 23) && (intval($vacio[5]) >= 23))  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        } elseif ( ( intval($vacio[0]) <=22) && (intval($vacio[1]) <=22) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 23 && intval($vacio[4]) <=28) && (intval($vacio[5]) >= 29) || ( intval($vacio[0]) <=22) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 23 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 29) && (intval($vacio[5]) >= 29) || ( intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 29) && (intval($vacio[4]) >= 29) && (intval($vacio[5]) >= 29)) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
        }
        elseif ( (intval($vacio[0]) <=22) && (intval($vacio[1]) <=22) && (intval($vacio[2]) ==23) && (intval($vacio[3]) >= 24 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && (intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) || (intval($vacio[0]) <=22) && (intval($vacio[1]) <=22) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=22) && (intval($vacio[3]) ==23) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && (intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) || (intval($vacio[0]) <=22) && (intval($vacio[1])==23) && (intval($vacio[2]) >= 24 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 24 && intval($vacio[3]) <=28) && (intval($vacio[4]) >= 35) && (intval($vacio[5]) >= 35) || (intval($vacio[0]) <=22) && (intval($vacio[1]) ==23) && (intval($vacio[2]) >= 24 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && (intval($vacio[5]) <=35) || (intval($vacio[0]) ==23) && (intval($vacio[1]) >= 24 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 24 && intval($vacio[2]) <=17) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && (intval($vacio[5]) >= 35) || (intval($vacio[0]) ==23) && (intval($vacio[1]) >= 24 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 23) && (intval($vacio[5]) >= 35) || (intval($vacio[0]) ==23) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35) && (intval($vacio[4]) >= 35) && (intval($vacio[5]) >= 35) || (intval($vacio[0]) <= 17) && (intval($vacio[1]) <=17) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && (intval($vacio[5]) >= 35) || (intval($vacio[0]) <=17) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 29 && intval($vacio[3]) <=34) && (intval($vacio[4]) >= 35) && (intval($vacio[5]) >= 35) || (intval($vacio[0]) >= 29 && intval($vacio[0]) <=34) && (intval($vacio[1]) >= 29 && intval($vacio[1]) <=34) && (intval($vacio[2]) >= 29 && intval($vacio[2]) <=34) && (intval($vacio[3]) >= 35) && (intval($vacio[4]) >= 35) && (intval($vacio[5]) >= 35) ) {
                $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta'));       
        }
        elseif(( intval($vacio[0])<=34) && ( intval($vacio[1])<=34)  && ( intval($vacio[2])<=34)  && (intval($vacio[3]) >= 35 && intval($vacio[3]) <=38) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])==8) && (intval($vacio[1]) >= 9 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 9 && intval($vacio[2]) <=28) && (intval($vacio[3]) ==29) && (intval($vacio[4]) >= 30 && intval($vacio[4]) <=34) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1])<=7) && (intval($vacio[2]) ==8) && (intval($vacio[3]) >= 9 && intval($vacio[3]) <=28) && (intval($vacio[4]) ==29) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38) || ( intval($vacio[0])<=7) && (intval($vacio[1])==8) && (intval($vacio[2]) >= 9 && intval($vacio[2]) <=28) && (intval($vacio[3]) >= 9 && intval($vacio[3]) <=28) && (intval($vacio[4]) ==29) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38 )) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_a','x','enlace','user','ruta')); 
        }
        //**20%**//
          if ( (intval($vacio[0]) <= 6) && (intval($vacio[1]) <= 6) && (intval($vacio[2]) >= 6) && (intval($vacio[3]) >= 6) && (intval($vacio[4]) >= 6) && (intval($vacio[5]) >= 6) ) {
                $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
        }
        elseif((intval($vacio[0]) >= 7 && intval($vacio[0]) <=11) && (intval($vacio[1]) >= 7 && intval($vacio[1]) <=11) && (intval($vacio[2]) >= 7 && intval($vacio[2]) <=11) && (intval($vacio[3]) >= 7 && intval($vacio[3]) <=11) && (intval($vacio[4]) >= 7 && intval($vacio[4]) <=11) && (intval($vacio[5]) >= 7) ) {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) >= 12 && intval($vacio[0]) <=17) && (intval($vacio[1]) >= 12 && intval($vacio[1]) <=17) && (intval($vacio[2]) >= 17) && (intval($vacio[3]) >= 17) && (intval($vacio[4]) >= 17) && (intval($vacio[5]) >= 17) )  {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }
        elseif((intval($vacio[0]) >= 18 && intval($vacio[0]) <=22) && (intval($vacio[1]) >= 18 && intval($vacio[1]) <=22) && (intval($vacio[2]) >= 18) && (intval($vacio[3]) >= 18) && (intval($vacio[4]) >= 18) && intval($vacio[5]) >= 18  )  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        } elseif ((intval($vacio[0]) >= 23 && intval($vacio[0]) <=28) && (intval($vacio[1]) >= 23 && intval($vacio[1]) <=28) && (intval($vacio[2]) >= 23) && (intval($vacio[3]) >= 23) && (intval($vacio[4]) >= 23 ) && (intval($vacio[5]) >= 23)) {
                $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
        }
        elseif ( (intval($vacio[0]) <=29) && (intval($vacio[1]) <=29) && (intval($vacio[2]) <=29) && ( intval($vacio[3]) <=29) && (intval($vacio[4]) >= 29 && intval($vacio[4]) <=34) && ( intval($vacio[5]) >= 29 && intval($vacio[5]) <=34) ) {
                $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
                return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));       
        }
        elseif(( intval($vacio[0])<=35) && (intval($vacio[1])<=35) && (intval($vacio[2]) <= 35) && (intval($vacio[3]) <=35) && (intval($vacio[4]) >= 35 && intval($vacio[4]) <=38) && (intval($vacio[5]) >= 35 && intval($vacio[5]) <=38)) {
            $enfermedad = " {$enfermedades[6]}";$enlace="{$enlaces[6]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta')); 
        }

        //**0%**//
         elseif( (intval($vacio[0]) <= 6) && (intval($vacio[1]) >= 6) && (intval($vacio[2]) >= 6) && (intval($vacio[3]) >= 6) && (intval($vacio[4]) >= 6) && (intval($vacio[5]) >= 6) ) {
            $enfermedad = " {$enfermedades[0]}";$enlace="{$enlaces[0]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }
        elseif( (intval($vacio[0]) >= 7 && (intval($vacio[0]) <=11)) && (intval($vacio[1]) >= 7) && (intval($vacio[2]) >= 7) && (intval($vacio[3]) >= 7) && (intval($vacio[4]) >= 7) && (intval($vacio[5]) >= 7) )  {
            $enfermedad = " {$enfermedades[1]}";$enlace="{$enlaces[1]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 12 && (intval($vacio  [0]) <=17)) && (intval($vacio[1]) >= 12) && (intval($vacio[2]) >= 12) && (intval($vacio[3]) >= 12) && (intval($vacio[4]) >= 12) && (intval($vacio[5]) >= 12) )   {
            $enfermedad = " {$enfermedades[2]}";$enlace="{$enlaces[2]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 18 && (intval($vacio[0]) <=22)) && (intval($vacio[1]) >= 18) && (intval($vacio[2]) >= 18) && (intval($vacio[3]) >= 18)  && (intval($vacio[4]) >= 18) && (intval($vacio[5]) >= 18)  )  {
            $enfermedad = " {$enfermedades[3]}";$enlace="{$enlaces[3]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 23 && (intval($vacio[0]) <=28)) && (intval($vacio[1]) >= 23) && (intval($vacio[2]) >= 23) && (intval($vacio[3]) >= 23) && (intval($vacio[4]) >= 23) && (intval($vacio[5]) >= 23)  )  {
            $enfermedad = " {$enfermedades[4]}";$enlace="{$enlaces[4]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
        }elseif ( (intval($vacio[0]) >= 29 && (intval($vacio[0]) <=34)) && (intval($vacio[1]) >= 29 ) && (intval($vacio[2]) >= 29) && (intval($vacio[3]) >= 29) && (intval($vacio[4]) >= 29) && (intval($vacio[5]) >= 29) )  {
            $enfermedad = " {$enfermedades[5]}";$enlace="{$enlaces[5]}";    
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability_zero','x','enlace','user','ruta')); 
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
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','x','enlace','user','ruta'));}
            else{
            $enfermedad = "Recuerde no automedicarse y siempre consultar un especialista";
            $x='';
            $d='';
            $enlace='';
            $mensaje='';
            $probability = '';
            $especialidades[2] = 'Cardiología';
            $especialidades[1] = 'Neumonología';
            $especialidades[0] = 'Medicina General';
            return view('organos.pulmon_vista',compact('mensaje','enfermedad','especialidades','d','probability','x','enlace','user','ruta'));}
        }

        /*public function lista_medico_pulmon_medicina_general(Request $request){
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
  public function lista_medico_pulmon_neumonologia(Request $request){
        $user =  Auth::id();
        $factura = Factura::where('user_id','=',$user)->get();
        foreach($factura as $f){
            $factu = $f->user_id;
        }
        if(isset($factu)===false){
            $factu = 1;
        }
        $especialidad= 'NEUMONOLOGÍA';
        
        $lista_medico = Medico::orderBy('id','DESC')
        ->where('pagos','=','positive')
        ->especialidad($especialidad)
        ->Paginate(20);

      return view('lista_medico',['lista_medico' => $lista_medico,'user' =>$user,'factu'=>$factu]);
 }
  public function lista_medico_pulmon_medicina_familiar(Request $request){
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
   public function lista_medico_pulmon_cardiologia(Request $request){
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
 } */
}








