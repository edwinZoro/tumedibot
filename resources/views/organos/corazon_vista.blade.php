@extends('layouts.Organos')
@section('titulo')
 tumedibot-corazon
@endsection
@section('subtitulo')
CORAZÓN
@endsection
@section('subtituloa')
corazón
@endsection
@section('articulo')
el 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('corazon_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-white">dos(2)</span> a <span class="text-white">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Dolor, presión ó molestia en el pecho<span class="text-warning">(angina de pecho)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Falta de aire</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Dolor, entumecimiento, debilidad y frío en piernas ó brazos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="corazon4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Dolor en cuello, mandíbula, garganta, abdomen superior o espalda</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Siente aleteo de pecho</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Latidos cardíacos acelerados<span class="text-warning">(taquicardia)</span> </label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="corazon7" type="checkbox" class="custom-control-input" value="7"  >
                <label class="custom-control-label" for="">Latidos cardíacos lentos<span class="text-warning">(bradicardia)</span> </label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Aturdimiento</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Mareos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="corazon10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Desmayo<span class="text-warning">(síncope)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Hinchazon en piernas, abdomen ó alrededor de los ojos </label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Color de piel gris pálido o azul<span class="text-warning"></span> (cianosis)</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="corazon13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">En un bebé, la falta de aliento durante el amamantamiento</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Problemas para respirar mientras hace ejercicio</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Cansarse mientras hace ejercicio no potente</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="corazon16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Hinchazón de las manos, los tobillos o los pies</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon17" type="checkbox" class="custom-control-input" value="17" >
                <label class="custom-control-label" for="">Falta de aliento cuando haces actividad o descansas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Hinchazón en las piernas, los tobillos y los pies</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="corazon19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Fatiga</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon20" type="checkbox" class="custom-control-input" value="20" >
                <label class="custom-control-label" for="">Latidos irregulares que se sienten rápidos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Fiebre</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="corazon22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Hinchazon en las piernas o el abdomen</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon23" type="checkbox" class="custom-control-input" value="23" >
                <label class="custom-control-label" for="">Cambios en el ritmo cardíaco</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="corazon24" type="checkbox" class="custom-control-input" value="24"  >
                <label class="custom-control-label" for="">Tos persistente o seca</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Erupciones cutáneas o manchas inusuales</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="corazon26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Ritmo cardíaco irregular</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="corazon27" type="checkbox" class="custom-control-input" value="27" >
                <label class="custom-control-label" for="">Pies o tobillos hinchados</label>
                </div>
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

