<div>
     <div class="">
            <style type="text/css">
      .woman{
        color:white;
      } 
      .men{
        color:white ;
      } 
      .back{
        font-size: 60px;
        background:-webkit-linear-gradient(45deg,#2f64db,#13ef7f);
        -webkit-background-clip:text;
        -webkit-text-fill-color:transparent;
        
      }
      .c{
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
      .borderinete{
        border: 2px inset white;
        border-radius: 3px;
      }
      .contained{
        position: relative;
        top: -60px;
        background:linear-gradient(45deg ,#01504d,cyan,#01504d);border:none;box-shadow: 0 0 5px #078360, 0 0 38px white; 
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
        <h1 class="header back fuente_f" >Encontrar Empresas de Salud</h1>
      <div  class="bg-dark  text-white p-5" >
       {{ csrf_field() }}
       <h5 class="pequeño_b person fuente_c"><i class="bi bi-search"></i> Filtre por Tipo de Empresa, Nombre, Pa&iacute;s, Estado, y Ciudad</h5>
       <div class="row">
      <div class="col-md-3 mb-3">
	<label for="negocio" class="pequeño_b  fuente_f"><i class="bi bi-building especialidad"></i> Tipo de Empresa</label>
    <select type="text" wire:model="negocio" class="custom-select d-block w-100" name="negocio" id="negocio" placeholder="Boada">
    	<option></option>
    	<option>Ambulatorio</option>
      <option>Cl&iacute;nica</option>
      <option>Hospital</option>
    	<option>Laboratorio</option>
    	<option>Farmacia</option>
      <option>Seguro</option>
    </select>
    </div>
           <div class="col-md-2 mb-3">
            <label for="nombre" class="pequeño_b fuente_f "><i class="bi bi-building especialidad"></i> Nombre</label>
            <input type="text" wire:model="nombre" class="form-control" name="nombre" id="nombre" placeholder="padre cabrera">
            <div class="invalid-feedback">
              *Llenar Campo Obligatorio*
          </div>
      </div>
    <div class="col-md-3 mb-3">
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
<div class="">
  <table class="container-fluid mt-3">
    @foreach($lista_empresarial as $lista)
{{--   <h1 description="{{$lista->tipo_negocio}} en {{$lista->estado}}" title="{{$lista->tipo_negocio}} en {{$lista->estado}}"> </h1>
  <h1 description="{{$lista->tipo_negocio}} en {{$lista->municipio}}" title="{{$lista->tipo_negocio}} en {{$lista->municipio}}"> </h1>
  <h1 description="{{$lista->tipo_negocio}} en {{$lista->parroquia}}" title="{{$lista->tipo_negocio}} en {{$lista->parroquia}}"> </h1> --}}
    <tr class="card m-2 p-1 bg-dark text-white ani" > 
        <td class="pequeño"> 
        	<div class="row">
        		<div class="col-md-3 my-3">
        			<img class="imagen_clinicasd borderinete" alt="imagen_empresa" src='{{asset("imagen_clinicasd/$lista->foto_d")}}' >
        		</div>
        		<div class="col-md-6">
        			        	  *<span>*</span>* <a class="perfil fuente_f men" href="{{route('perfil_empresarial',[$lista->id,$lista->tipo_negocio,$lista->nombre])}}"><i class="bi bi-eye"></i> Ver Perfil de {{$lista->tipo_negocio}}</a> *<span >*</span>*<br><i class="bi bi-building especialidad"></i>  <span class=" fuente_c " > {{$lista->tipo_negocio}} {{$lista->nombre}}</span> <br><i class="bi bi-geo-alt direccion"></i> En:
                                    @if($lista->estado->nombre_paises === 'ARGENTINA')   
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/ar.png')}}"  >  
                                    @elseif($lista->estado->nombre_paises === 'BOLIVIA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/bo.png')}}"  >
                                    @elseif($lista->estado->nombre_paises === 'CHILE')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/cl.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'COLOMBIA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/co.png')}}"  >          
                                    @elseif($lista->estado->nombre_paises === 'COSTA RICA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/cr.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'CUBA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/cu.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'DOMINICANA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/do.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'ECUADOR')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/ec.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'EL SALVADOR')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/sv.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'ESPAÑA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/es.png')}}" >           
                                    @elseif($lista->estado->nombre_paises === 'GUATEMALA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/gt.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'HONDURAS')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/hn.png')}}"  >          
                                    @elseif($lista->estado->nombre_paises === 'MEXICO')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/mx.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'NICARAGUA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/ni.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'PANAMA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/pa.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'PARAGUAY')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/py.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'PERU')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/pe.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'PUERTO RICO')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/pr.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'URUGUAY')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/uy.png')}}"  >           
                                    @elseif($lista->estado->nombre_paises === 'VENEZUELA')
                                    <img  alt="Bandera pais"  src="{{asset('banderitas/ve.png')}}"  >  
                                    @endif
                           {{$lista->estado->nombre_paises}} | <span class="c">Edo</span> {{$lista->municipio->name}} | <span class="c">Ciudad</span> {{$lista->parroquia->name}}<br><i  class="bi bi-telephone-plus phone"></i> <small>{{$lista->telefono}}</small> <br> <i  class="what {{$lista->whatsapp !== '' ?'bi bi-whatsapp':''}}"></i> <small>{{$lista->whatsapp}}</small>
        		</div>
        		<div class="col-md-3 my-3">
        			<img class="imagen_clinicase borderinete" alt="imagen_empresa" src='{{asset("imagen_clinicasf/$lista->foto_f")}}' >
        		</div>
        	</div>
 </td>
    </tr>
    @endforeach
</table>
</div>
</div>
<div class="d-flex justify-content-center">
   {{ $lista_empresarial->links() }}
</div> 
</div>
</div>

