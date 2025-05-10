@extends('layouts.Organos')
@section('titulo')
 tumedibot-intestino
@endsection
@section('subtitulo')
INTESTINO GRUESO Y DELGADO
@endsection
@section('articulo')
el 
@endsection
@section('subtituloa')
intestino grueso y delgado
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('intestino_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-white">tres(3)</span> a <span class="text-white">siete(7)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Dolor abdominal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Diarrea con sangre</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Pérdida de peso</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="intestino4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Hemorragia rectal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Llagas en la piel</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Dolor en las articulaciones</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="intestino7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Diarrea</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Calambres</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Fiebre</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="intestino10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Naúseas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Pérdida de apetito</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Cambios en la piel con protuberancias rojas y sensibles</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="intestino13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Retorcijones</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Inflamación</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Gases Fuertes</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="intestino16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Vientre hinchado</label>
              </div>
              <div class="">
                <input id="" name="intestino17" type="checkbox" class="custom-control-input" value="17" />
       <label class="custom-control-label" for="">No puede eliminar gases</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Estreñimiento</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="intestino19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Distensión abdominal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino20" type="checkbox" class="custom-control-input" value="20" >
                <label class="custom-control-label" for="">Alteración del ritmo intestinal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Meteorismo</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="intestino22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Vómitos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino23" type="checkbox" class="custom-control-input" value="23" >
                <label class="custom-control-label" for="">Cansansio</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="intestino24" type="checkbox" class="custom-control-input" value="24"  >
                <label class="custom-control-label" for="">Heces grasosas, malolientes flotantes</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Dolor de estomago</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="intestino26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Necesidad incesante de defecar</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="intestino27" type="checkbox" class="custom-control-input" value="27" >
                <label class="custom-control-label" for="">Deposiciones forzadas y frecuentes</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="intestino28" type="checkbox" class="custom-control-input" value="28" >
                <label class="custom-control-label" for="">Confusión mental en adultos mayores</label>
                </div>
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

