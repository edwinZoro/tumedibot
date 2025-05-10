@extends('layouts.Organos')
@section('titulo')
 tumedibot-venas_arterias
@endsection
@section('subtitulo')
VENAS Y ARTERIAS
@endsection
@section('subtituloa')
venas y arterias
@endsection
@section('articulo')
las 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-1 mb-4 bg-dark needs-validation" method="GET" action="{{route('venas_arterias_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-white">dos(2)</span> a <span class="text-white">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias1" type="checkbox" class="custom-control-input" value="1"  />
                <label class="custom-control-label" for="">Dolor arriba y detrás de un ojo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias2" type="checkbox" class="custom-control-input" value="2" />
                <label class="custom-control-label" for="">Una pupila dilatada</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias3" type="checkbox" class="custom-control-input" value="3" />
                <label class="custom-control-label" for="">Cambios en la vista o visión doble</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias4" type="checkbox" class="custom-control-input" value="4"  />
                <label class="custom-control-label" for="">Entumecimiento de un lado del rostro</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias5" type="checkbox" class="custom-control-input" value="5" />
                <label class="custom-control-label" for="">Dolor de cabeza repentino y muy intenso</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias6" type="checkbox" class="custom-control-input" value="6" />
                <label class="custom-control-label" for="">Náuseas y vómitos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias7" type="checkbox" class="custom-control-input" value="7" />
                <label class="custom-control-label" for="">Sensibilidad a la luz</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias8" type="checkbox" class="custom-control-input" value="8" />
                <label class="custom-control-label" for="">Convulsiones</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias9" type="checkbox" class="custom-control-input" value="9" />
                <label class="custom-control-label" for="">Caída del parpado</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias10" type="checkbox" class="custom-control-input" value="10"  />
                <label class="custom-control-label" for="">Rigidez en el cuello</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias11" type="checkbox" class="custom-control-input" value="11" />
                <label class="custom-control-label" for="">Pérdida de conocimiento</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias12" type="checkbox" class="custom-control-input" value="12" />
                <label class="custom-control-label" for="">Confusión</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias13" type="checkbox" class="custom-control-input" value="13"  />
                <label class="custom-control-label" for="">Entumecimiento o debilidad en los brazos o piernas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias14" type="checkbox" class="custom-control-input" value="14" />
                <label class="custom-control-label" for="">Dificultad para hablar o balbuceo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias15" type="checkbox" class="custom-control-input" value="15" />
                <label class="custom-control-label" for="">Pérdida temporal de la visión en un ojo</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias16" type="checkbox" class="custom-control-input" value="16"  />
                <label class="custom-control-label" for="">Caída de los músculos de la cara</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias17" type="checkbox" class="custom-control-input" value="17"  />
                <label class="custom-control-label" for="">Dolor de las piernas cuando caminas<span class="text-warning">(Claudicación)</span></label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias18" type="checkbox" class="custom-control-input" value="18" />
                <label class="custom-control-label" for="">Disminución de la presión arterial en extremidad afectada</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias19" type="checkbox" class="custom-control-input" value="19" / >
                <label class="custom-control-label" for="">Presión arterial alta</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias20" type="checkbox" class="custom-control-input" value="20"  />
                <label class="custom-control-label" for="">Insuficiencia renal</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias21" type="checkbox" class="custom-control-input" value="21" />
                <label class="custom-control-label" for="">Dolor en el pecho<span class="text-warning">(Angina)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias22" type="checkbox" class="custom-control-input" value="22" />
                <label class="custom-control-label" for="">Falta de aire</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias23" type="checkbox" class="custom-control-input" value="23"  />
                <label class="custom-control-label" for="">Fatiga extrema</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias24" type="checkbox" class="custom-control-input" value="24" />
                <label class="custom-control-label" for="">Ataque cardíaco, presión de aplastamiento en el pecho y dolor en el hombro o el brazo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias25" type="checkbox" class="custom-control-input" value="25" />
                <label class="custom-control-label" for="">Sudoración</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias26" type="checkbox" class="custom-control-input" value="26"  />
                <label class="custom-control-label" for="">Debilidad o parálisis del brazo, la pierna o el rostro, de un lado del cuerpo</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias27" type="checkbox" class="custom-control-input" value="27"  />
                <label class="custom-control-label" for="">Entumecimiento u hormigueo en el brazo, la pierna o el rostro, de un lado del cuerpo</label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias28" type="checkbox" class="custom-control-input" value="28" />
                <label class="custom-control-label" for="">Dificultad para tragar</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias29" type="checkbox" class="custom-control-input" value="29"  />
                <label class="custom-control-label" for="">Mareo, confusión, desmayo o coma</label>
              </div>  
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias30" type="checkbox" class="custom-control-input" value="30" />
                <label class="custom-control-label" for="">Sensibilidad al frío</label>
                </div>
               <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias31" type="checkbox" class="custom-control-input" value="31" />
                <label class="custom-control-label" for="">Falta de irrigación sanguínea</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias32" type="checkbox" class="custom-control-input" value="32" />
                <label class="custom-control-label" for="">Palidez</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias33" type="checkbox" class="custom-control-input" value="33"  />
                <label class="custom-control-label" for="">Sensación reducida del tacto</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias34" type="checkbox" class="custom-control-input" value="34" />
                <label class="custom-control-label" for="">Entumecimiento, sensación de hormigueo o dolor como aguijón al calentarse o aliviar el estrés</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias35" type="checkbox" class="custom-control-input" value="35" />
                <label class="custom-control-label" for="">Vasos sanguineos inflamados en la piel o cambio de color</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias36" type="checkbox" class="custom-control-input" value="36"  />
                <label class="custom-control-label" for="">Hematomas</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias37" type="checkbox" class="custom-control-input" value="37"  />
                <label class="custom-control-label" for="">Picazón</label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias38" type="checkbox" class="custom-control-input" value="38" />
                <label class="custom-control-label" for="">Piernas inflamadas o piernas pesadas</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias39" type="checkbox" class="custom-control-input" value="39"  />
                <label class="custom-control-label" for="">Dolor abdominal</label>
              </div>  
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias40" type="checkbox" class="custom-control-input" value="40" />
                <label class="custom-control-label" for="">Dolor en las articulaciones</label>
                </div>
                               <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias41" type="checkbox" class="custom-control-input" value="41" />
                <label class="custom-control-label" for="">Dolor en los músculos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias42" type="checkbox" class="custom-control-input" value="42" />
                <label class="custom-control-label" for="">Fiebre</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias43" type="checkbox" class="custom-control-input" value="43"  />
                <label class="custom-control-label" for="">Erupciones o úlceras</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias44" type="checkbox" class="custom-control-input" value="44" />
                <label class="custom-control-label" for="">Hinchazón en las articulaciones</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="venas_arterias45" type="checkbox" class="custom-control-input" value="45" />
                <label class="custom-control-label" for="">Pérdida de peso</label>
                </div>
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

