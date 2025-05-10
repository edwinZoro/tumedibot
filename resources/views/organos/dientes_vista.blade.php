@extends('layouts.Organos')
@section('titulo')
 tumedibot-dientes
@endsection
@section('subtitulo')
DIENTES Y ENCÍAS
@endsection
@section('articulo')
los 
@endsection
@section('subtituloa')
dientes y encías
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('dientes_vista')}}">
                    @csrf
              <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">dos(2)</span>  a <span class="text-light">ocho(8)</span>  síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Encías inflamadas o hinchadas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Encías color rojo oscuro o violeta</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Encías sangrando al cepillarse los dientes o al usar hilo dental</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="dientes4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Mal aliento</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Encías se encogen y hace que los dientes se vean más largos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Encías sensibles</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="dientes7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Cerdas del cepillo dental color rosa luego de terminar cepillado</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Escupir sangre al cepillar dientes ó por usar hilo dental</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Pus entre dientes y encías</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="dientes10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Dientes flojos o pérdida de dientes</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Dolor al masticar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Se crean nuevos espacios entre los dientes</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="dientes13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Cambio en la manera en que unen los dientes al morder</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Saburra lingual<span class="text-warning">(Capa blanca en la lengua)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Sensación de boca seca</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="dientes16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Gusto desagradable</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="dientes17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Obstrucción nasal</label>
              </div>    
             <div class="custom-control custom-checkbox">
                <input id="" name="dientes18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Protuberancia blanca o amarilla dentro de la boca ó alrededor de la lengua</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="dientes19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Sensación de ardor</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="dientes20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Sensación de hormigueo</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="dientes21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Dolor en la protuberancia</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Hormigueo y picazón alrededor de los labios</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="dientes23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Ampollas llenas de líquido en los labios ó la nariz</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Secreción y costras</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Fiebre</label>

                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="dientes26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Dolor en las encías</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="dientes27" type="checkbox" class="custom-control-input" value="27"  >
                <label class="custom-control-label" for="">Dolor de garganta</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes28" type="checkbox" class="custom-control-input" value="28" >
                <label class="custom-control-label" for="">Dolor de cabeza</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="dientes29" type="checkbox" class="custom-control-input" value="29" >
                <label class="custom-control-label" for="">Dolores musculares</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="dientes30" type="checkbox" class="custom-control-input" value="30"  >
                <label class="custom-control-label" for="">Ganglios linfáticos inflamados</label>
              </div>    
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span>
        <span></span>
        <span></span>
        <span></span>Obtener Resultados</button>
                </form>    
           
              @endsection
  
        

