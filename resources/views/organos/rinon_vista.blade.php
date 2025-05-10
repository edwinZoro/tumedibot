@extends('layouts.Organos')
@section('titulo')
 tumedibot-riñon
@endsection
@section('subtitulo')
RIÑÓN
@endsection
@section('subtituloa')
riñón
@endsection
@section('articulo')
el 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('riñon_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-white">dos(2)</span> a <span class="text-white">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Comezón o erupción en la piel</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Calambres musculares</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Estómago revuelto o vómitos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Pies y tobillos hinchados</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Tener menos hambre de lo normal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Orinar más o menos de lo normal</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Orina con espuma o burbujeante</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Dificultad para respirar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Problemas para dormirse o permanecer dormido</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Volumen de orina disminuido<span class="text-warning">(diuresis)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Retiene líquido y provoca hinchazón en piernas, tobillos ó pies</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Fatiga</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Desorientación</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Naúseas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Debilidad</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Ritmo cardíaco irregular</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="riñon17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Dolor u opresión en el pecho pecho</label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="riñon18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Convulsiones o coma en casos severos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Dolor agudo en la espalda, la parte baja del abdomen o la ingle</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="riñon20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Hematuria<span class="text-warning">(sangre en la orina, de color rosado, rojo o café)</span></label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="riñon21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Necesidad constante de orinar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Dolor al orinar</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">No puede orinar o solo orina una pequeña cantidad</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Orina turbia o maloliente</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="riñon25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Fiebre</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon26" type="checkbox" class="custom-control-input" value="26"  >
                <label class="custom-control-label" for="">Dolor o molestias entre las costillas y la pelvis</label>
              </div>    
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon27" type="checkbox" class="custom-control-input" value="27" >
                <label class="custom-control-label" for="">Dolor en el abdomen superior</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="riñon28" type="checkbox" class="custom-control-input" value="28"  >
                <label class="custom-control-label" for="">Cambios en los hábitos urinarios</label>
              </div>  
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

