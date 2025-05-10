@extends('layouts.Organos')
@section('titulo')
tumedibot-ojos
@endsection
@section('subtitulo')
OJOS
@endsection
@section('articulo')
los 
@endsection
@section('subtituloa')
ojos 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('ojos_vista')}}">
                    @csrf
              <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">dos(2)</span>  a <span class="text-light">seis(6)</span>  síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Vision Borrosa o distorsionada</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Entrecerrar los ojos ó los párpados para ver mejor</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Dolores de cabeza</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Miopía nocturna<span class="text-warning">(Problemas para ver de noche)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Frotar sus ojos con frecuencia</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Objetos cercanos se ven borrosos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Vista cansada, ardor en los ojos y/o dolor en los ojos </label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Malestar en los ojos o dolor de cabezas al cumplir tareas visuales</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Levantar lectura más de lo normal para observar las letras</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Visión borrosa a una distancia de lectura normal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Dificultad con la visión nocturna </label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Bizco</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Colores que parecen desteñidos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Las lamparas o el Sol se ven demasiados brillantes</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Ver doble</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Cambios frecuentes en la receta de sus lentes</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="ojos17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">No distingue distintos tonos de rojo y verde</label>
              </div>    
             <div class="custom-control custom-checkbox">
                <input id="" name="ojos18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">No distingue distintos tonos de azul y amarillo</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">No distingue cualquier color</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="ojos20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Dolor ocular</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="ojos21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Náuseas y vómitos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Halos alrededor de las luces</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Enrojecimiento en los ojos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Dolor ocular al mover el ojo</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Pérdida de la visión en un ojo ó reducción momentanea</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="ojos26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Pérdida del campo visual</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos27" type="checkbox" class="custom-control-input" value="27"  >
                <label class="custom-control-label" for="">Pérdida de  la visión del color</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos28" type="checkbox" class="custom-control-input" value="28" >
                <label class="custom-control-label" for="">Destellos luminosos<span class="text-warning">(Fotopsias)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos29" type="checkbox" class="custom-control-input" value="29" >
                <label class="custom-control-label" for="">Distorsiones visuales, como líneas rectas que parecen dobladas</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos30" type="checkbox" class="custom-control-input" value="30"  >
                <label class="custom-control-label" for="">Reducción de la visión central en uno o ambos ojos</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="ojos31" type="checkbox" class="custom-control-input" value="31" >
                <label class="custom-control-label" for="">Necesita luz más brillante para leer</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos32" type="checkbox" class="custom-control-input" value="32" >
                <label class="custom-control-label" for="">Problema para adaptarse a los niveles bajos de luz</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos33" type="checkbox" class="custom-control-input" value="33"  >
                <label class="custom-control-label" for="">Mayor visión borrosa de las palabras en un libro</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos34" type="checkbox" class="custom-control-input" value="34" >
                <label class="custom-control-label" for="">Disminución de la intensidad o el brillo de los colores</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos35" type="checkbox" class="custom-control-input" value="35" >
                <label class="custom-control-label" for="">Problemas para identificar caras humanas</label>

                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="ojos26" type="checkbox" class="custom-control-input" value="36" >
                <label class="custom-control-label" for="">Un punto ciego bien definido en el campo de la visión</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos37" type="checkbox" class="custom-control-input" value="37"  >
                <label class="custom-control-label" for="">Moscas Volantes<span class="text-warning">(Miodesopias)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos38" type="checkbox" class="custom-control-input" value="38" >
                <label class="custom-control-label" for="">Cortina oscura que oculta la visión escalonadamente</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos39" type="checkbox" class="custom-control-input" value="39" >
                <label class="custom-control-label" for="">Pupila dilatada o enrojecimiento</label>
                </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="ojos40" type="checkbox" class="custom-control-input" value="40"  >
                <label class="custom-control-label" for="">Picazón en uno o ambos ojos</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="ojos41" type="checkbox" class="custom-control-input" value="41"  >
                <label class="custom-control-label" for="">Sensación arenosa en uno o ambos ojos</label>
              </div>   
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos42" type="checkbox" class="custom-control-input" value="42"  >
                <label class="custom-control-label" for="">Secreción en uno o ambos ojos, se forma una costra en la noche.</label>
              </div> 
            <div class="custom-control custom-checkbox">
                <input id="" name="ojos43" type="checkbox" class="custom-control-input" value="43"  >
                <label class="custom-control-label" for="">Lagrimeo</label>
              </div>   
                 <div class="custom-control custom-checkbox">
                <input id="" name="ojos44" type="checkbox" class="custom-control-input" value="44"  >
                <label class="custom-control-label" for="">Un bulto rojo en el párpado parecido a un forúnculo o un grano</label>
              </div> 
                      <div class="custom-control custom-checkbox">
                <input id="" name="ojos45" type="checkbox" class="custom-control-input" value="45"  >
                <label class="custom-control-label" for="">Dolor en el párpado</label>
              </div> 
                      <div class="custom-control custom-checkbox">
                <input id="" name="ojos46" type="checkbox" class="custom-control-input" value="46"  >
                <label class="custom-control-label" for="">Hinchazón en los párpados</label>
              </div> 
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span>
        <span></span>
        <span></span>
        <span></span>Obtener Resultados</button>
                </form>    
           
              @endsection
  
        

