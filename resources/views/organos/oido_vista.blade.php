@extends('layouts.Organos')
@section('titulo')
 tumedibot-oído
@endsection
@section('subtitulo')
OÍDO
@endsection
@section('subtituloa')
oído y encías
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('oido_vista')}}">
                    @csrf
              <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">dos(2)</span>  a <span class="text-light">seis(6)</span>  síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido1" type="checkbox" class="custom-control-input " value="1"  >
                <label class="custom-control-label " for="">Supuración de un líquido que huele mal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Fiebre</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Malestar general</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="oido4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Dolor de oído</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Vértigos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Zumbidos dentro del oído</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="oido7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Pérdida de audición momentanea</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Sensación de oído lleno</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Mareos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="oido10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Pérdida de equilibrio</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Náuseas ó vómitos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Pérdida auditiva escalonada</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="oido13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Ruidos internos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="oido14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Debilidad muscular en la zona</label>
              </div>
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span>
        <span></span>
        <span></span>
        <span></span>Obtener Resultados</button>
                </form>    
           
              @endsection
  
        

