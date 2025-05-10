@extends('layouts.Organos')
@section('titulo')
 tumedibot-higado
@endsection
@section('subtitulo')
HÍGADO
@endsection
@section('subtituloa')
hígado
@endsection
@section('articulo')
el 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('higado_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-white">cinco(5)</span> a <span class="text-white">nueve(9)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Fatiga</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Tiene hemorragias o hematomas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Pérdida de apetito</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="higado4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Náuseas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Hinchazón de las piernas, los pies o los tobillos <span class="text-warning">(edema)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Pérdida de peso</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="higado7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Picazón en la piel</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Color amarillento en piel y parte blanca de los ojos <span class="text-warning">(ictericia)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Abdomen hinchado<span class="text-warning">(ascitis)</span> o las piernas</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="higado10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Vasos sanguineos en forma de arañas en la piel</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Palmas de las manos roja</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Atrofia testicular ó sin apetito sexual</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="higado13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Confusión, somnolencia y dificultad en el habla</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Dolor abdominal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Cambio de color en los ojos a marrón dorado</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="higado16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Dificultad para expresarse, tragar ó la coordinacón física</label>
              </div>
              <div class="">
                <input id="" name="higado17" type="checkbox" class="custom-control-input" value="17" />
       <label class="custom-control-label" for="">Movimientos descontrolados o rigidez muscular</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Fiebre</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="higado19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Orina oscura</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado20" type="checkbox" class="custom-control-input" value="20" >
                <label class="custom-control-label" for="">Heces de color arcilla</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Dolor articular</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="higado22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Debilidad</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado23" type="checkbox" class="custom-control-input" value="23" >
                <label class="custom-control-label" for="">Diabetes</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="higado24" type="checkbox" class="custom-control-input" value="24"  >
                <label class="custom-control-label" for="">Sin apetito sexual</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Impotencia</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="higado26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Insuficiencia cardíaca</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="higado27" type="checkbox" class="custom-control-input" value="27" >
                <label class="custom-control-label" for="">Insuficiencia hepática</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="higado28" type="checkbox" class="custom-control-input" value="28" >
                <label class="custom-control-label" for="">Piel de color bronce o gris</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="higado29" type="checkbox" class="custom-control-input" value="29" >
                <label class="custom-control-label" for="">Pérdida de memoria</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="higado30" type="checkbox" class="custom-control-input" value="30" >
                <label class="custom-control-label" for="">Dolor o molestia en la parte superior derecha del abdomen</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="higado31" type="checkbox" class="custom-control-input" value="31" >
                <label class="custom-control-label" for="">Venas parecen arañas en la piel</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="higado32" type="checkbox" class="custom-control-input" value="32" >
                <label class="custom-control-label" for="">Bazo agrandado</label>
                </div>
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
             
           
              @endsection
  
        

