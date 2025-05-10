@extends('layouts.Organos')
@section('titulo')
 tumedibot-nervios
@endsection
@section('subtitulo')
SISTEMA NERVIOSO CENTRAL
@endsection
@section('articulo')
el 
@endsection
@section('subtituloa')
sistema nervioso central
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('nervios_vista')}}">
                    @csrf
              <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">cuatro(4)</span> a <span class="text-light">nueve(9)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Entumecimiento o debilidad en las piernas, tronco ó extremidades</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Sensación de choques eléctricos al mover el cuello</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Temblores, pasos desordenados ó falta de coordinación</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Pérdida de visión parcial o completa, en un ojo y con dolor</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Visión doble incesante</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Visión borrosa</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Cambios en el habla</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Fatiga</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Mareos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Hormigueo o dolor en distintas partes del cuerpo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Disfunción eréctil o disfunción sexual</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Convulsión</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Confusión temporal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Rígidez en los músculos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Movimiento de brazos y piernas espamódicos sin control</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Pérder el conocimiento o la consciencia</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="nervios17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Miedo o ansiedad</label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="nervios18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Lentitud la moverse<span class="text-warning">(Bradicinesia)</span></label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Alteración de la postura y el equilibrio</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="nervios20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Pérdida de los movimientos automáticos</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="nervios21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Cambios en la escritura</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Depresión</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Apatía</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Aislamiento social</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Cambios de humor</label>

                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="nervios26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Desconfianza en las personas</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios27" type="checkbox" class="custom-control-input" value="27"  >
                <label class="custom-control-label" for="">Irritabilidad y agresividad</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios28" type="checkbox" class="custom-control-input" value="28" >
                <label class="custom-control-label" for="">Cambios en los patrones del sueño</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios29" type="checkbox" class="custom-control-input" value="29" >
                <label class="custom-control-label" for="">Pérdida de la inhibición</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios30" type="checkbox" class="custom-control-input" value="30"  >
                <label class="custom-control-label" for="">Delirios, como asimilar que te estafarón</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="nervios31" type="checkbox" class="custom-control-input" value="31"  >
                <label class="custom-control-label" for="">Anomalías en la manera de caminar</label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="nervios32" type="checkbox" class="custom-control-input" value="32" >
                <label class="custom-control-label" for="">Aumento de la actividad muscular</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios33" type="checkbox" class="custom-control-input" value="33"  >
                <label class="custom-control-label" for="">Espamos musculares</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="nervios34" type="checkbox" class="custom-control-input" value="34"  >
                <label class="custom-control-label" for="">Movimientos involuntarios</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="nervios35" type="checkbox" class="custom-control-input" value="35" >
                <label class="custom-control-label" for="">Amnesia</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios36" type="checkbox" class="custom-control-input" value="36" >
                <label class="custom-control-label" for="">Dificultad para pensar y comprender</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nervios37" type="checkbox" class="custom-control-input" value="37"  >
                <label class="custom-control-label" for="">Falta de concentración</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nervios38" type="checkbox" class="custom-control-input" value="38" >
                <label class="custom-control-label" for="">Alucinación</label>
              </div>
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>
                </form>    
           
              @endsection
  
        

