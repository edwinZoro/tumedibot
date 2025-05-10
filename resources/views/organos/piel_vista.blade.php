@extends('layouts.Organos')
@section('titulo')
tumedibot-piel
@endsection
@section('subtitulo')
PIEL
@endsection
@section('subtituloa')
piel 
@endsection
@section('articulo')
la 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('piel_vista')}}">
                    @csrf
              <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">dos(2)</span>  a <span class="text-light">seis(6)</span>  síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Espinillas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Puntos blancos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Pápulas<span class="text-warning">(Irregularidades sensibles rojas y pequeñas)</span></label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Granos que son pápulas con pus en la punta</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Bultos dolorosos llenos de pus </label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Erupciones en la piel enronjecidas alrededor</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Costras con erupciones en la piel</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Ampollas en los labios</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Hormigueo en los labios</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Dolor en los labios</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Erupcion en los labios</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Ardor en los labios</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Fiebre</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Dolor en las encías</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Dolor muscular</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Dolor de cabeza</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="piel17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Dolor en la garganta</label>
              </div>    
             <div class="custom-control custom-checkbox">
                <input id="" name="piel18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Ronchas rojas</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Ronchas del color de la piel</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="piel20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Hinchazón en el área de las ronchas</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="piel21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Comezón en el área de las ronchas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Inflamación de los labios ó párpados</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Dificultad respiratoria</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Manchas en la piel ásperas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Manchas en la piel seca o escamosa</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="piel26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Manchas duras como una verruga</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel27" type="checkbox" class="custom-control-input" value="27"  >
                <label class="custom-control-label" for="">Comezón en las manchas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel28" type="checkbox" class="custom-control-input" value="28" >
                <label class="custom-control-label" for="">Ardor en las manchas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel29" type="checkbox" class="custom-control-input" value="29" >
                <label class="custom-control-label" for="">Sangrado en las manchas</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel30" type="checkbox" class="custom-control-input" value="30"  >
                <label class="custom-control-label" for="">Enrojecimiento o rubor</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="piel31" type="checkbox" class="custom-control-input" value="31" >
                <label class="custom-control-label" for="">Arañas vasculares</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel32" type="checkbox" class="custom-control-input" value="32" >
                <label class="custom-control-label" for="">Protuberancias hinchadas<span class="text-warning">(Puede ser acné con pus)</span></label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel33" type="checkbox" class="custom-control-input" value="33"  >
                <label class="custom-control-label" for="">Ardor en las protuberancias</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel34" type="checkbox" class="custom-control-input" value="34" >
                <label class="custom-control-label" for="">Nariz agrandada</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel35" type="checkbox" class="custom-control-input" value="35" >
                <label class="custom-control-label" for="">Área roja en la piel que se puede ampliar continuamente</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="piel26" type="checkbox" class="custom-control-input" value="36" >
                <label class="custom-control-label" for="">Hinchazón</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="piel37" type="checkbox" class="custom-control-input" value="37"  >
                <label class="custom-control-label" for="">Sensibilidad</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel38" type="checkbox" class="custom-control-input" value="38" >
                <label class="custom-control-label" for="">Fiebre</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel39" type="checkbox" class="custom-control-input" value="39" >
                <label class="custom-control-label" for="">Manchas rojas</label>
                </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="piel40" type="checkbox" class="custom-control-input" value="40"  >
                <label class="custom-control-label" for="">Sensación de calor</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="piel41" type="checkbox" class="custom-control-input" value="41"  >
                <label class="custom-control-label" for="">Ampollas</label>
              </div>   
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>
                </form>    
           
              @endsection
  
        

