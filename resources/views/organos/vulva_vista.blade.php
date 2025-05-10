@extends('layouts.Organos')
@section('titulo')
 tumedibot-aparato reproductor
@endsection
@section('subtitulo')
APARATO REPRODUCTOR
@endsection
@section('articulo')
el 
@endsection
@section('subtituloa')
aparato reproductor
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('vulva_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-light">dos(2)</span> a <span class="text-light">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Dolor al orinar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Dolor durante la actividad sexual</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Picazón vaginal</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vulva4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Inflamación vaginal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Enrojecimiento vaginal</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Flujo vaginal de color blanco</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vulva7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Necesidad de orinar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Ardor al orinar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Orinar poco líquido constantemente</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vulva10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Orina turbia</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Orina color rojo, rosa o marrón</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Mal olor en la orina</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vulva13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Dolor pelvico</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Dolor en la vagina, pelvis o recto</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Menstruación anormal o dolorosa</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vulva16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Sangrado entre periodos de menstruación</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="vulva17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Dolor al defecar</label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="vulva18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Cólicos</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vulva19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Hinchazón abdominal</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="vulva20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Pesadez en la pelvis</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="vulva21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Tejido que sobresale de la vagina</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Problemas urinarios</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vulva23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Dificultad para defecar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Dificultad sexual</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vulva25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Sensación de caerse algo por su vagina</label>
                </div>    
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

