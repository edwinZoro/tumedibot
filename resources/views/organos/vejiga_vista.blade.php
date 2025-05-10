@extends('layouts.Organos')
@section('titulo')
 tumedibot-vejiga
@endsection
@section('subtitulo')
VEJIGA
@endsection
@section('subtituloa')
vejiga
@endsection
@section('articulo')
la
@endsection
<head>
  <link rel="icon" type="image/x-icon" href='../../icon_medibot.png' />
</head>
       
          @section('formulario')
                <form style="box-shadow: 0 0 5px black" class="card p-3 mb-4 bg-dark needs-validation" method="GET" action="{{route('vejiga_vista')}}">
                    @csrf
                        <label class="text-uppercase text-warning text-center">Seleccione Síntomas De Enfermedad-Solo puede elegir desde <span class="text-white">dos(2)</span> a <span class="text-white">seis(6)</span> síntomas</label>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga1" type="checkbox" class="custom-control-input" value="1"  >
                <label class="custom-control-label" for="">Dolor entre el escroto, y el ano en los hombres<span class="text-warning">(perineo)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga2" type="checkbox" class="custom-control-input" value="2" >
                <label class="custom-control-label" for="">Dolor pélvico crónico</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga3" type="checkbox" class="custom-control-input" value="3" >
                <label class="custom-control-label" for="">Ganas de orinar urgente</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vejiga4" type="checkbox" class="custom-control-input" value="4"  >
                <label class="custom-control-label" for="">Miccion frecuente, frecuentemente en pequeñas cantidades</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga5" type="checkbox" class="custom-control-input" value="5" >
                <label class="custom-control-label" for="">Dolor o malestar mientras se llena la vejiga y alivio después de orinar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga6" type="checkbox" class="custom-control-input" value="6" >
                <label class="custom-control-label" for="">Dolor durante las relaciones sexuales</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vejiga7" type="checkbox" class="custom-control-input" value="7">
                <label class="custom-control-label" for="">Dolor o ardor al orinar</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga8" type="checkbox" class="custom-control-input" value="8" >
                <label class="custom-control-label" for="">Fiebre, cansancio o temblores</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga9" type="checkbox" class="custom-control-input" value="9" >
                <label class="custom-control-label" for="">Urgencia frecuente de orinar</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vejiga10" type="checkbox" class="custom-control-input" value="10"  >
                <label class="custom-control-label" for="">Presión en la región inferior del abdomen</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga11" type="checkbox" class="custom-control-input" value="11" >
                <label class="custom-control-label" for="">Orina con malolor o con apariencia turbia o rojiza</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga12" type="checkbox" class="custom-control-input" value="12" >
                <label class="custom-control-label" for="">Naúseas</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vejiga13" type="checkbox" class="custom-control-input" value="13"  >
                <label class="custom-control-label" for="">Dolor de espalda</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga14" type="checkbox" class="custom-control-input" value="14" >
                <label class="custom-control-label" for="">Orinar ocho veces al día o más de dos veces a la noche</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga15" type="checkbox" class="custom-control-input" value="15" >
                <label class="custom-control-label" for="">Ganas repentinas de orinar</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vejiga16" type="checkbox" class="custom-control-input" value="16"  >
                <label class="custom-control-label" for="">Fuerte necesidad de orinar inmediatamente</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="vejiga17" type="checkbox" class="custom-control-input" value="17"  >
                <label class="custom-control-label" for="">Pérdida de orina luego de haber tenido ganas repentinas de orinar</label>
              </div>    
                  <div class="custom-control custom-checkbox">
                <input id="" name="vejiga18" type="checkbox" class="custom-control-input" value="18" >
                <label class="custom-control-label" for="">Incontinencia</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vejiga19" type="checkbox" class="custom-control-input" value="19"  >
                <label class="custom-control-label" for="">Dificultad para orinar o interrupción del flujo de orina</label>
              </div>    
               <div class="custom-control custom-checkbox">
                <input id="" name="vejiga20" type="checkbox" class="custom-control-input" value="20"  >
                <label class="custom-control-label" for="">Retención aguda de orina</label>
              </div>     
               <div class="custom-control custom-checkbox">
                <input id="" name="vejiga21" type="checkbox" class="custom-control-input" value="21" >
                <label class="custom-control-label" for="">Hematuria<span class="text-warning">(sangre en la orina)</span></label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga22" type="checkbox" class="custom-control-input" value="22" >
                <label class="custom-control-label" for="">Dolor abdominal bajo, puede ir a testiculos y punta del pene</label>
                </div>
                 <div class="custom-control custom-checkbox">
                <input id="" name="vejiga23" type="checkbox" class="custom-control-input" value="23"  >
                <label class="custom-control-label" for="">Orina de color oscuro</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga24" type="checkbox" class="custom-control-input" value="24" >
                <label class="custom-control-label" for="">Emisión de pequeños fragmentos de piedras o arenillas en la orina</label>
              </div>
              <div class="custom-control custom-checkbox">
                <input id="" name="vejiga25" type="checkbox" class="custom-control-input" value="25" >
                <label class="custom-control-label" for="">Infección de orina que no cede con el uso de antibióticos</label>
                </div>
                <button id="myBtn" class="button btn btn-sm mt-4" type="submit"><span></span><span></span><span></span><span></span>Obtener Resultados</button>

                </form>    
           
              @endsection
  
        

