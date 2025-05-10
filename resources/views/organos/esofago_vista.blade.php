@extends('layouts.Organos')
@section('titulo')
 tumedibot-esofago
@endsection
@section('subtitulo')
ESÓFAGO
@endsection
@section('articulo')
el 
@endsection
@section('subtituloa')
esófago
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('esofago_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">dos(2)</span> a <span class="text-light">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Siente la comida detenida en medio del pecho</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Siente los líquidos detenidos en medio del pecho</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Regurgitación no ácido, amargo o contenido biliar</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="esofago4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Dolor torácico</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Pérdida de peso</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Dolor de estómago</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="esofago7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Dolor en el pecho no quemante</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Problemas para tragar o se atraganta regularmente</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Dolor al tragar</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="esofago10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Faringitis fuerte</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Tos fuerte, ronquera y asma</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Neumonía</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="esofago13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Sinusitis fuerte</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Levantarse del sueño sintiendo ahogo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Pirosis</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="esofago16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Regurgitación del contenido gástrico</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="esofago17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Disfagia</label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="esofago18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Dolor en el pecho, detrás del esternón, se manifiesta al comer</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="esofago19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Ingerir alimento que se atasca en el esófago</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="esofago20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Acidez</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="esofago21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Regurgitación ácida</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Deposiciones negras</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="esofago23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Vómitos de sangre</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Mareo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="esofago25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Sudoración</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="esofago26" type="checkbox" class="custom-control-input" value="26"  >
                <label class="custom-control-label" for="">Pérdida de consciencia</label>
              </div>     
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

