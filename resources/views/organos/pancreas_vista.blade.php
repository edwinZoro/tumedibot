@extends('layouts.Organos')
@section('titulo')
 tumedibot-pancreas
@endsection
@section('subtitulo')
PÁNCREAS
@endsection
@section('subtituloa')
páncreas
@endsection
@section('articulo')
el 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('pancreas_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-white">dos(2)</span> a <span class="text-white">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Dolor cólico en la zona alta y derecha abdominal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Ictericia<span class="text-warning">(Coloración amarillenta de los ojos y la piel)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Coluria<span class="text-warning">(Coloración oscura de la orina)</span></label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pancreas4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Fiebre</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Escalofríos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Tiritona<span class="text-warning">(Temblor del cuerpo producido por frío o fiebre)</span></label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pancreas7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Dolor en abdomen continuo e intenso, puede ir hacia espalda</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Naúseas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Vómitos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pancreas10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Latido rápido del corazón</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Diabetes</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Compresión de otros organos por el quiste</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pancreas13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Pérdida de peso</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Anorexia</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="pancreas15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Heces grasosas y malolientes</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="pancreas16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Adelgazamiento</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="pancreas17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Diarrea</label>
              </div>         
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

