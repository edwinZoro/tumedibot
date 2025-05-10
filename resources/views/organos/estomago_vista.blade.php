@extends('layouts.Organos')
@section('titulo')
 tumedibot-estomago
@endsection
@section('subtitulo')
ESTÓMAGO
@endsection
@section('subtituloa')
estómago 
@endsection
@section('articulo')
el 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('estomago_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-white">dos(2)</span> a <span class="text-white">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Diarrea</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Dolor abdominal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Vómitos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="estomago4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Dolor de cabeza</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Fiebre</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Escalofríos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="estomago7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Acidez</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Eruptos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Barriga hinchada en el área estomacal</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="estomago10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Naúseas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Sentirse lleno velozmente mientras come</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Saciedad incómoda después de una cómida</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="estomago13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Molestia en la parte superior del abdomen</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Siente el sabor líquido del estomago en la boca</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Tos seca</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="estomago16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Asma</label>
              </div>
              <div class="">
                <input id="" name="estomago17" type="checkbox" class="custom-control-input" value="17" />
       <label class="custom-control-label" for="">Problemas para ingerir alimento</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="estomago18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Pérdida de peso escalonada</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="estomago19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Hambre dolorosa</label>
              </div>
            
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

