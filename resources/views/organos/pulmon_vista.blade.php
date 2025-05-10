@extends('layouts.Organos')
@section('titulo')
 tumedibot-pulmón
@endsection
@section('subtitulo')
PULMÓN
@endsection
@section('articulo')
el 
@endsection
@section('subtituloa')
pulmón
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('pulmon_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-white">dos(2)</span> a <span class="text-white">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Falta de aliento</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Respiración rápida</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Dolor o malestar de pecho, empeorará al toser ó al respirar hondo</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Aumento de la frecuencia cardíaca</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Toser sangre</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Presión arterial muy baja, mareos o desmayo</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Tos frecuente o tos con mocos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Sibilancias<span class="text-warning">(Silbidos al respirar)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Un silbido o chirrido cuando respira</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Falta de aliento, particularmente haciendo ejercicio</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Siente presión de pecho</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Dificultad para respirar</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Tos entrecortada y seca</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Cansancio</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Pérdida de peso sin razón alguna</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Dolor múscular y articular</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon17" type="checkbox" class="custom-control-input" value="17" />
       <label class="custom-control-label" for="">Puntas de pies y dedos se agrandan y las uñas se curvan</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Problema para respirar mientras hace algo, como caminar un ratico</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Dolor de pecho</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon20" type="checkbox" class="custom-control-input" value="20" >
                <label class="custom-control-label" for="">Ritmo cardiaco acelerado</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Dolor en la parte superior derecha del abdomen</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Falta de apetito</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon23" type="checkbox" class="custom-control-input" value="23" >
                <label class="custom-control-label" for="">Dificultad para respirar</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon24" type="checkbox" class="custom-control-input" value="24"  >
                <label class="custom-control-label" for="">Siente que no puede respirar suficiente aire</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Piel, labios y uñas pueden tener un color azulado</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pulmon26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Tiene mucho sueño</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon27" type="checkbox" class="custom-control-input" value="27" >
                <label class="custom-control-label" for="">Latidos cardiacos irregulares</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon28" type="checkbox" class="custom-control-input" value="28" >
                <label class="custom-control-label" for="">Pérdida de conocimiento</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon29" type="checkbox" class="custom-control-input" value="29" >
                <label class="custom-control-label" for="">Fiebre</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon30" type="checkbox" class="custom-control-input" value="30" >
                <label class="custom-control-label" for="">Escalofríos</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon31" type="checkbox" class="custom-control-input" value="31" >
                <label class="custom-control-label" for="">Tos, usualmente con flema</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon32" type="checkbox" class="custom-control-input" value="32" >
                <label class="custom-control-label" for="">Dolor de pecho cuando respira o tose</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon33" type="checkbox" class="custom-control-input" value="33" >
                <label class="custom-control-label" for="">Nauseas y/o vómitos</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon34" type="checkbox" class="custom-control-input" value="34" >
                <label class="custom-control-label" for="">Diarrea</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="pulmon35" type="checkbox" class="custom-control-input" value="35" >
                <label class="custom-control-label" for="">Congestión nasal</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon36" type="checkbox" class="custom-control-input" value="36" >
                <label class="custom-control-label" for="">Tos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon37" type="checkbox" class="custom-control-input" value="37" >
                <label class="custom-control-label" for="">Poco apetito</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pulmon38" type="checkbox" class="custom-control-input" value="38" >
                <label class="custom-control-label" for="">Estornudos</label>
                </div>
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

