@extends('layouts.robot')
@section('enlace')
humana_03.png
@endsection
@section('formulario')
<ol class="list-group-numbered bg-dark  text-dark card p-1 ml-5" style="box-shadow: 0 0 5px black">
    <div class="row">
    <div class="col-md-8">
  <li class="list-group-horizontal-sm ">
    <a id="cerebro" class="ml-3  list-group-item-action" href="{{route('cerebro_vista')}}">Cerebro</a>
  </li>
  <li class="list-group-horizontal-sm ">
    <a id="ojos" class="ml-3 list-group-item-action" href="{{route('ojos_vista')}}">Ojos</a>             
  </li>
  <li class="list-group-horizontal-sm ">
    <a id="oido" class="ml-3 list-group-item-action" href="{{route('oido_vista')}}">Oído</a>
  </li>
  <li class="list-group-horizontal-sm ">
    <a id="nariz" class="ml-3 list-group-item-action" href="{{route('nariz_vista')}}">Nariz</a>
  </li>

  <li class="list-group-horizontal-sm ">
    <a id="dientes" class="ml-3 list-group-item-action" href="{{route('dientes_vista')}}">Dientes y encías</a>               
  </li>
  <li class="list-group-horizontal-sm ">
    <a id="nervioso" class="ml-3 list-group-item-action" href="{{route('nervios_vista')}}">Sistema nervioso</a>                
  </li>
  <li class="list-group-horizontal-sm ">
    <a id="esofago" class="ml-3 list-group-item-action" href="{{route('esofago_vista')}}">Esofago</a>              
  </li>
  <li class="list-group-horizontal-sm ">
    <a id="pulmon"  class="ml-3 list-group-item-action" href="{{route('pulmon_vista')}}">Pulmón</a>
  </li>
  <li class="list-group-horizontal-sm ">
   <a id="senos"  class="ml-3 list-group-item-action" href="{{route('senos_vista')}}">Senos</a>

 </li>
 <li class="list-group-horizontal-sm ">
  <a id="corazon" class="ml-3 list-group-item-action" href="{{route('corazon_vista')}}">Corazón</a>
</li>
<li class="list-group-horizontal-sm ">
  <a id="higado"  class="ml-3 list-group-item-action" href="{{route('higado_vista')}}">Hígado</a>
</li>
<li class="list-group-horizontal-sm ">
  <a id="estomago" class="ml-3 list-group-item-action" href="{{route('estomago_vista')}}">Estómago</a>
</li>
<li class="list-group-horizontal-sm ">
  <a id="riñon" class="ml-3 list-group-item-action" href="{{route('riñon_vista')}}">Riñon</a>

</li>

<li class="list-group-horizontal-sm ">
  <a id="intestino" class="ml-3 list-group-item-action" href="{{route('intestino_vista')}}">Intestinos</a>
</li>
<li class="list-group-horizontal-sm ">
 <a id="venas"  class="ml-3 list-group-item-action" href="{{route('vulva_vista')}}">Aparato reproductor</a>

</li>
<li class="list-group-horizontal-sm ">
  <a id="vejiga" class="ml-3 list-group-item-action" href="{{route('vejiga_vista')}}">Vejiga</a>

</li>

<li class="list-group-horizontal-sm ">
 <a id="venas"  class="ml-3 list-group-item-action" href="{{route('venas_arterias_vista')}}">Venas y arterias</a>

</li>
<li class="list-group-horizontal-sm ">
 <a id="piel" class="ml-3 list-group-item-action" href="{{route('piel_vista')}}">Piel</a>
</li>


<li class="list-group-horizontal-sm ">
  <a id="pancreas" class="ml-3 list-group-item-action" href="{{route('pancreas_vista')}}">Pancreas</a>
</li>
    </div>
     <div class="col-md-4  align-self-center"><img  class="img-fluid img-a" src="../../medibot_f.png" alt="medibot"></div>

 </ol>
  </div>
@endsection