@extends('layouts.Organos')
@section('titulo')
 tumedibot-nariz
@endsection
@section('subtitulo')
NARIZ
@endsection
@section('articulo')
la 
@endsection
@section('subtituloa')
nariz 
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('nariz_vista')}}">
                    @csrf
              <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">dos(2)</span>  a <span class="text-light">seis(6)</span>  síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Obstrucción de una o ambas fosas nasales</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Epistaxis<span class="text-warning">(Sangrado nasal)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Dolor en el rostro</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Respiración con ruido mientras duerme</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Fosas nasales se alternan entre la obstrucción de un lado a otro</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Dormir de un lado más que del otro</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Insuficiencia respiratoria nasal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Ronquidos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Infecciones nasales<span class="text-warning">(Sinusitis)</span></label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Dolor de cabeza</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Mucosidad seca gruesa</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Sequedad faríngea o carraspera</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Reducción del olfato</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Tos seca</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Estornudos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Congestión nasal ó nariz goteando</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="nariz17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Mucosidad en la garganta</label>
              </div>    
             <div class="custom-control custom-checkbox">
                <input id="" name="nariz18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Lagrimeo</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Enrojecimiento y picazón en los ojos</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="nariz20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Picazón en la nariz y la garganta</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="nariz21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Respiración por la boca</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Fatiga</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Dolor de oído</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Dolor en el maxilar superior y en los dientes</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Dolor de garganta</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="nariz26" type="checkbox" class="custom-control-input" value="26" >
                <label class="custom-control-label" for="">Mal aliento</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz27" type="checkbox" class="custom-control-input" value="27"  >
                <label class="custom-control-label" for="">Inflamación</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz28" type="checkbox" class="custom-control-input" value="28" >
                <label class="custom-control-label" for="">Secreción espesa y descolorida de la nariz</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz29" type="checkbox" class="custom-control-input" value="29" >
                <label class="custom-control-label" for="">Dolor, sensibilidad e hinchazón alrededor de los ojos, las mejillas, la nariz o la frente</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz30" type="checkbox" class="custom-control-input" value="30"  >
                <label class="custom-control-label" for="">Reducción del sentido del olfato y del gusto</label>
              </div>  
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz31" type="checkbox" class="custom-control-input" value="31" >
                <label class="custom-control-label" for="">Nariz tupida</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz32" type="checkbox" class="custom-control-input" value="32" >
                <label class="custom-control-label" for="">Sudoración</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="nariz33" type="checkbox" class="custom-control-input" value="33"  >
                <label class="custom-control-label" for="">Mareos</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz34" type="checkbox" class="custom-control-input" value="34" >
                <label class="custom-control-label" for="">Náuseas y Vómitos, debido a la ingesta de sangre</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="nariz35" type="checkbox" class="custom-control-input" value="35" >
                <label class="custom-control-label" for="">Taquicardia</label>
                </div>
                <div class="custom-control custom-checkbox">
                <input id="" name="nariz36" type="checkbox" class="custom-control-input" value="36" >
                <label class="custom-control-label" for="">Hipotensión</label>
                </div>  
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span>
        <span></span>
        <span></span>
        <span></span>Obtener Resultados</button>
                </form>    
           
              @endsection
  
        

