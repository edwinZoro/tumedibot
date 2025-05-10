<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="">
      <style type="text/css">
      .woman{
        color:yellow;
      } 
      .men{
        color:yellow;
      } 
      .person{
        color:aqua;
      }
      .especialidad{
        color:greenyellow;
      }
      .direccion{
        color:#ff8f8f;
      }
      .phone{
        color:#ffd168;
      }
      .what{
        color:#76ff66;
      }
      .back{
        font-size: 60px;
        background:-webkit-linear-gradient(45deg,#2f64db,#13ef7f);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
        
      }
      .filtering{
        outline-style: dashed;
        outline-width:1px;
        outline-offset: 2px;
        outline-color:white;
        filter:drop-shadow(0px 0px 7px gray)
      }
      .contained{
        position: relative;top: -60px;
        background:linear-gradient(45deg ,#01504d,cyan,#01504d);
        border:none;
        box-shadow: 0 0 5px #078360, 0 0 38px white; 
      }
    @media(max-width: 1373px){
      .pequeño_b{
        font-size: 14px;
      }
    }
    @media(max-width: 1255px){
      .pequeño_b{
        font-size: 13px;
      }
    }
    @media(max-width: 1196px){
      .pequeño_b{
        font-size: 12px;
      }
    }
    @media(max-width: 1138px){
      .pequeño_b{
        font-size: 11px;
      }
    }
    @media(max-width: 1077px){
      .pequeño_b{
        font-size: 10px;
      }
    }
    @media(max-width: 1018px){
      .pequeño_b{
        font-size: 9px;
      }
    }
    @media(max-width: 959px){
      .pequeño_b{
        font-size: 7px;
      }
    }
    @media(max-width: 767px){
      .pequeño_b{
        font-size: 15px;
      }
    }
    @media(max-width: 500px){
      .pequeño{
        font-size: 12px;
      }
    }
      </style>
        <h1 class="header back fuente_f">Encontrar M&eacute;dicos</h1>
      <div  class="bg-dark  text-white p-5" >
       {{ csrf_field() }}
       <h1 class="pequeño_b person fuente_c"><i class="bi bi-search"></i> Filtre por Nombre, Apellido, Especialidad, Precio, Pa&iacute;s, Estado y Ciudad</h1>
       
       <div class="row">
           <div class="col-md-2 mb-3">
            <label for="nombre" class="pequeño_b fuente_f"><i class="bi bi-person person"></i> Nombre</label>
            <input type="text" wire:model="nombre" class="form-control" name="nombre" id="nombre" placeholder="Simón">
            <div class="invalid-feedback">
              *Llenar Campo Obligatorio*
          </div>
      </div>
      <div class="col-md-1 mb-3">
	<label for="apellido" class="pequeño_b fuente_f"><i class="bi bi-person person"></i> Apellido</label>
    <input type="text" wire:model="apellido" class="form-control" name="apellido" id="apellido" placeholder="Boada">
</div>
      <div class="col-md-2">
        <label for="especialidad" class="pequeño_b fuente_f"><i class="bi bi-shield-plus especialidad"></i> Especialidad</label>
        <select wire:model="especialidad" class="custom-select d-block w-100" type="text" name="especialidad" id="especialidad">
            <option></option>
            @foreach($especialidades as $es)
            <option title={{$es->nombre_especialidad}} >{{$es->nombre_especialidad}}</option>
            @endforeach
        </select>  
        <div class="invalid-feedback">
          *Llenar Campo Obligatorio*
      </div>
  </div>
  <div class="col-md-1 mb-3">
    <label for="precio" class="pequeño_b fuente_f"><i class="bi bi-currency-dollar"></i> Precio</label>
    <input type="text" class="form-control" wire:model="precio" name="precio" id="precio" placeholder="20">     
</div>
    <div class="col-md-2 mb-3">
      <label for="estado" class="pequeño_b fuente_f"><i class="bi bi-geo-alt direccion"></i> Pa&iacute;s</label>
      <select class="custom-select d-block w-100" type="text " wire:model="estado" name="estado" id="state_id"  required>
        <option></option>
        @foreach($state as $s)
        <option value="{{$s->id}}">{{$s->nombre_paises}}</option>
        @endforeach
      </select>
      <div class="invalid-feedback">
        *Llenar Campo Obligatorio*
      </div>
    </div>
    <div class="col-md-2 mb-3">
        <label for="municipio" class="pequeño_b fuente_f"><i class="bi bi-geo-alt direccion"></i> Estado</label>
        <select wire:model="municipio" class="custom-select d-block w-100 {{ $errors->has('municipio') ? 'is-invalid' : ''}}" name="municipio"
          required id="municipio" >
          <option></option>
        @foreach($municipio_a as $m)
        <option value="{{$m->id}}">{{$m->name}}</option>
        @endforeach
        </select>
        @if ($errors->has('municipio'))
        <span class="text-danger">{{ $errors->first('municipio') }}</span>
        @endif
      </div>
      <div class="col-md-2 mb-3">
        <label for="ciudad" class="pequeño_b fuente_f"><i class="bi bi-geo-alt direccion"></i> Ciudad</label>
        <select wire:model="ciudad" class="custom-select d-block w-100 {{ $errors->has('parroquia') ? 'is-invalid' : ''}}" name="parroquia"
          required id="parroquia"  >
         <option></option>
        @foreach($parroquia_a as $p)
        <option value="{{$p->id}}">{{$p->name}}</option>
        @endforeach
        </select>
        @if ($errors->has('parroquia'))
        <span class="text-danger">{{ $errors->first('parroquia') }}</span>
        @endif

      </div>
</div>
</div>
<div class="card container p-4 my-1 contained">
  <table class="container-fluid mt-3">
    @foreach($lista_medico as $lista)
{{--<h1 description="{{$lista->especialidad}} en {{$lista->estado}}" title="{{$lista->especialidad}} en {{$lista->estado}}"> </h1>
    <h1 description="{{$lista->especialidad}} en {{$lista->municipio}}" title="{{$lista->especialidad}} en {{$lista->municipio}}"> </h1>
    <h1 description="{{$lista->especialidad}} en {{$lista->parroquia}}" title="{{$lista->especialidad}} en {{$lista->parroquia}}"> </h1> --}}
    <tr class="card m-2 p-1 text-white ani "> 
        <td class="pequeño"> 
    <div class="row ">
            <div class="col-md-3 my-3">
              <img class="imagen_clinicasd my-2 filtering"  src='{{asset("imagen/$lista->foto")}}'> 
            </div>
            <div class="col-md-6">
            *<span class="{{$lista->sexo == 'MASCULINO' ? 'men':'woman'}}">*</span>* <a class="perfil fuente_f {{$lista->sexo == 'MASCULINO'?'men':'woman'}}" href="{{route('perfil_medico',[$lista->id,$lista->nombre,$lista->apellido,$lista->especialidad])}}"><i class="bi bi-eye"></i> Ver Perfil</a> - <a class="perfil fuente_f {{$lista->sexo == 'MASCULINO' ? 'men':'woman'}}"  href="{{route('calendar_view',[$lista->id,Auth::user()])}}"> <i class="bi bi-calendar2-plus"></i> Agendar Cita</a> *<span class="{{$lista->sexo == 'MASCULINO' ? 'men':'woman'}}">*</span>*<br>
            <i class="bi bi-person person"></i> 
            <span  class=" fuente_c {{$lista->sexo == 'MASCULINO' ? 'men':'woman'}}" >   
              @if($lista->sexo === 'MASCULINO' && $lista->especialidad === 'ENFERMERÍA')
              Lcdo {{ucfirst($lista->nombre)}} {{ucfirst($lista->apellido)}}
              @elseif($lista->sexo === 'FEMENINO' && $lista->especialidad === 'ENFERMERÍA')
              Lcda {{ucfirst($lista->nombre)}} {{ucfirst($lista->apellido)}}
              @endif
              @if($lista->sexo === 'MASCULINO' && $lista->especialidad != 'ENFERMERÍA')
              Dr {{ucfirst($lista->nombre)}} {{ucfirst($lista->apellido)}}
              @elseif($lista->sexo === 'FEMENINO' && $lista->especialidad != 'ENFERMERÍA')
              Dra {{ucfirst($lista->nombre)}} {{ucfirst($lista->apellido)}}
              @endif
            </span><br>
          <i class="bi bi-shield-plus especialidad"></i> {{$lista->especialidad->nombre_especialidad}} - <span class="badge bg-success">{{$lista->consultorio_costo}}$ / 
          @if($lista->pais->nombre_paises === 'ARGENTINA')   
           {{$lista->consultorio_costo * config('global.peso_ar')}}ARP
          @elseif($lista->pais->nombre_paises === 'BOLIVIA')
           {{$lista->consultorio_costo * config('global.bol')}}BOB
          @elseif($lista->pais->nombre_paises === 'CHILE')
           {{$lista->consultorio_costo * config('global.peso_cl')}}CLP                     
          @elseif($lista->pais->nombre_paises === 'COLOMBIA')
           {{$lista->consultorio_costo * config('global.peso_co')}}COP          
          @elseif($lista->pais->nombre_paises === 'COSTA RICA')
           {{$lista->consultorio_costo * config('global.cost')}}CRC                     
          @elseif($lista->pais->nombre_paises === 'CUBA')
           {{$lista->consultorio_costo * config('global.peso_cu')}}CUP                     
          @elseif($lista->pais->nombre_paises === 'DOMINICANA')
           {{$lista->consultorio_costo * config('global.peso_do')}}DOP                     
          @elseif($lista->pais->nombre_paises === 'ECUADOR')
           {{$lista->consultorio_costo * config('global.ec')}}$                     
          @elseif($lista->pais->nombre_paises === 'EL SALVADOR')
           {{$lista->consultorio_costo * config('global.sal')}}SVC                   
          @elseif($lista->pais->nombre_paises === 'ESPAÑA')
           {{$lista->consultorio_costo * config('global.esp')}}EUR                    
          @elseif($lista->pais->nombre_paises === 'GUATEMALA')
           {{$lista->consultorio_costo * config('global.quetzal')}}GTQ                     
          @elseif($lista->pais->nombre_paises === 'HONDURAS')
           {{$lista->consultorio_costo * config('global.hon')}}HNL                    
          @elseif($lista->pais->nombre_paises === 'MEXICO')
           {{$lista->consultorio_costo * config('global.mex')}}MXN                     
          @elseif($lista->pais->nombre_paises === 'NICARAGUA')
           {{$lista->consultorio_costo * config('global.nic')}}NIO                     
          @elseif($lista->pais->nombre_paises === 'PANAMA')
           {{$lista->consultorio_costo * config('global.pan')}}PAB                     
          @elseif($lista->pais->nombre_paises === 'PARAGUAY')
           {{$lista->consultorio_costo * config('global.par')}}PYG                     
          @elseif($lista->pais->nombre_paises === 'PERU')
           {{$lista->consultorio_costo * config('global.sol')}}PEN                   
          @elseif($lista->pais->nombre_paises === 'PUERTO RICO')
           {{$lista->consultorio_costo * config('global.pr')}}$                     
          @elseif($lista->pais->nombre_paises === 'URUGUAY')
           {{$lista->consultorio_costo * config('global.uru')}}UYU                    
          @elseif($lista->pais->nombre_paises === 'VENEZUELA')           
           {{$lista->consultorio_costo * config('global.bolivar')}}BsD 
          @endif
          </span> por consulta<br><i class="bi bi-geo-alt direccion"></i> En:                                    
                                    @if($lista->pais->nombre_paises === 'ARGENTINA')   
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/ar.png')}}"  >  
                                    @elseif($lista->pais->nombre_paises === 'BOLIVIA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/bo.png')}}"  >
                                    @elseif($lista->pais->nombre_paises === 'CHILE')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/cl.png')}}" >           
                                    @elseif($lista->pais->nombre_paises === 'COLOMBIA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/co.png')}}"  >          
                                    @elseif($lista->pais->nombre_paises === 'COSTA RICA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/cr.png')}}"  >           
                                    @elseif($lista->pais->nombre_paises === 'CUBA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/cu.png')}}"  >           
                                    @elseif($lista->pais->nombre_paises === 'DOMINICANA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/do.png')}}"  >           
                                    @elseif($lista->pais->nombre_paises === 'ECUADOR')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/ec.png')}}" >           
                                    @elseif($lista->pais->nombre_paises === 'EL SALVADOR')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/sv.png')}}"  >           
                                    @elseif($lista->pais->nombre_paises === 'ESPAÑA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/es.png')}}" >           
                                    @elseif($lista->pais->nombre_paises === 'GUATEMALA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/gt.png')}}"  >           
                                    @elseif($lista->pais->nombre_paises === 'HONDURAS')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/hn.png')}}"  >          
                                    @elseif($lista->pais->nombre_paises === 'MEXICO')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/mx.png')}}"   >           
                                    @elseif($lista->pais->nombre_paises === 'NICARAGUA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/ni.png')}}"   >           
                                    @elseif($lista->pais->nombre_paises === 'PANAMA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/pa.png')}}"  >           
                                    @elseif($lista->pais->nombre_paises === 'PARAGUAY')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/py.png')}}"  >           
                                    @elseif($lista->pais->nombre_paises === 'PERU')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/pe.png')}}"   >           
                                    @elseif($lista->pais->nombre_paises === 'PUERTO RICO')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/pr.png')}}"    >           
                                    @elseif($lista->pais->nombre_paises === 'URUGUAY')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/uy.png')}}"  >           
                                    @elseif($lista->pais->nombre_paises === 'VENEZUELA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/ve.png')}}"    >  
                                    @endif {{ $lista->pais->nombre_paises }} | <span style="color:yellow">Edo</span> {{$lista->estado->name}} | <span style="color:yellow">Ciudad</span> {{$lista->ciudad->name}}<br><i class="bi bi-telephone-plus phone" ></i> <small>{{$lista->telefono}}</small> <br> <i class="what {{$lista->whatsapp !== '' ?'bi bi-whatsapp':''}}"></i> <small>{{$lista->whatsapp}}</small> 
          </div>
          <div class="col-md-3 my-3">     
          @if($lista->pais->nombre_paises === 'ARGENTINA')   
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/ar.png')}}" >  
          @elseif($lista->pais->nombre_paises === 'BOLIVIA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/bo.png')}}">
          @elseif($lista->pais->nombre_paises === 'CHILE')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/cl.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'COLOMBIA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/co.png')}}" >          
          @elseif($lista->pais->nombre_paises === 'COSTA RICA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/cr.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'CUBA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/cu.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'DOMINICANA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/do.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'ECUADOR')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/ec.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'EL SALVADOR')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/sv.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'ESPAÑA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/es.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'GUATEMALA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/gt.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'HONDURAS')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/hn.png')}}" >          
          @elseif($lista->pais->nombre_paises === 'MEXICO')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/mx.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'NICARAGUA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/ni.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'PANAMA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/pa.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'PARAGUAY')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/py.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'PERU')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/pe.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'PUERTO RICO')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/pr.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'URUGUAY')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/uy.png')}}" >           
          @elseif($lista->pais->nombre_paises === 'VENEZUELA')
          <img class="imagen_clinicase my-2 filtering" alt="Bandera pais"  src="{{asset('banderas/ve.png')}}" >  
          @endif
         </div>
    </div>
      </td>
    </tr>
    @endforeach
</table>
</div>

<div class="d-flex justify-content-center">
   {{ $lista_medico->links() }}
</div> 
</div>
</div>
