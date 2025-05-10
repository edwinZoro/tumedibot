@extends('layouts.Organos')
@section('titulo')
 tumedibot-senos
@endsection
@section('subtitulo')
SENOS
@endsection
@section('articulo')
los 
@endsection
@section('subtituloa')
senos
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('senos_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">dos(2)</span> a <span class="text-light">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Inflamación del seno</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Irritación cutánea</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Dolor en los senos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="senos4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Dolor en el pezón</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Enrojecimiento o engrosamiento del pezón</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Secreción del pezón</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="senos7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Bulto en axilas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Presencia de nódulo mamario</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Nódulo es redondo</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="senos10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Nódulo se mueve</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Nódulo es firme, liso ó gomoso</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Al tocar nódulo, no siente dolor</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="senos13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Bulto redondo, liso y firme en el seno</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Bulto se puede mover</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Bulto duro irregular en el seno</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="senos16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Enrojecimiento en la piel</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="senos17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Cambio de tamaño en el seno</label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="senos18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Sensibilidad en los senos ó sensación de calor</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="senos19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Hinchazón de los senos</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="senos20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Tejido mamario grueso o bulto</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="senos21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Dolor o ardor al amamantar al bébe</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Fiebre</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="senos23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Malestar general</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="senos24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Masa en uno o ambos senos</label>
              </div>    
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

