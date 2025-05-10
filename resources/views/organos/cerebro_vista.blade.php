@extends('layouts.Organos')
@section('titulo')
 tumedibot-cerebro
@endsection
@section('subtitulo')
CEREBRO
@endsection
@section('articulo')
el 
@endsection
@section('subtituloa')
cerebro 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
{{--           <div class="text-center mb-4"> 
            <div class="row">
            <p class="text-dark col-md-8" style="text-align: justify;">
              Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
              proident, sunt in culpa qui officia deserunt mollit anim id est laborum. 
            </p>
            <img style="filter: sepia(50);" class="col-md-4" width="200" height="150" src="../../cerebro.jpg" >
            </div>

          </div> --}}
              
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('cerebro_vista')}}">
                    @csrf
              <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">dos(2)</span>  a <span class="text-light">seis(6)</span>  síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Dolores de cabeza</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Fiebre súbita</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Somnolencia</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Vómitos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Confusión</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Convulsiones</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Pérdida progresiva de tono muscular</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Pérdida progresiva de equilibrio y movilidad</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Pérdida progresiva del caminar</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Pérdida progresiva del habla</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Pérdida progresiva de la habilidad para comer</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Pérdida progresiva de la visión</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Pérdida progresiva de escuchar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Pérdida progresiva de el comportamiento</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Problemas de aprendizaje</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Problemas de la vejiga</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="cerebro17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Problemas respiratorios</label>
              </div>    
             <div class="custom-control custom-checkbox">
                <input id="" name="cerebro18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Pereza</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Deterioro en la memoria y/o concentración </label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="cerebro20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Episodios de ausencia</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="cerebro21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Rigidez en los músculos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Movimientos espasmódicos incontrolables de brazos y piernas</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Pérdida del conocimiento o la conciencia</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Miedo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Ansiedad</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="cerebro26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Cambios en la personalidad</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro27" type="checkbox" class="custom-control-input" value="27"  >
                <label class="custom-control-label" for="">Pensamiento alterado</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro28" type="checkbox" class="custom-control-input" value="28" >
                <label class="custom-control-label" for="">Movimientos bruscos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro29" type="checkbox" class="custom-control-input" value="29" >
                <label class="custom-control-label" for="">Repetir lo mismo una y otra vez</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro30" type="checkbox" class="custom-control-input" value="30"  >
                <label class="custom-control-label" for="">Olvidarse de conversaciones ó eventos programados</label>
              </div>  
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro31" type="checkbox" class="custom-control-input" value="31" >
                <label class="custom-control-label" for="">Colocar objetos personales en lugares no idóneos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro32" type="checkbox" class="custom-control-input" value="32" >
                <label class="custom-control-label" for="">Perderse en lugares conocidos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="cerebro33" type="checkbox" class="custom-control-input" value="33"  >
                <label class="custom-control-label" for="">Olvidar los nombres de personas cercanas</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro34" type="checkbox" class="custom-control-input" value="34" >
                <label class="custom-control-label" for="">Dificultad para manifestar pensamientos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="cerebro35" type="checkbox" class="custom-control-input" value="35" >
                <label class="custom-control-label" for="">Dificultad para ingresar en conversaciones</label>
                </div>
     
                <button id="myBtn" class="button btn btn-sm mt-4"  type="submit"><span></span>
                  <span></span>
                  <span></span>
                  <span></span>Obtener Resultados</button>
                </form>    
      
              @endsection
  
        

