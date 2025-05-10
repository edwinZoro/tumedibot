@extends('layouts.plantilla')
@section('t')
tumedibot
@endsection

@section('titulo')
Actualice sus datos en el siguiente formulario
@endsection

@section('back')
{{route('backing')}}
@endsection

@section('formulario')
<div>	
{!! htmlScriptTagJsApi() !!}
<form  style="border-style:dashed;border-color:skyblue;box-shadow: 2px 2px 13px black" class="card p-2 bg-light needs-validation" method="POST" action="{{route('actualizar_medico_perfil',$medico)}}" enctype="multipart/form-data">    
	{{ csrf_field() }}
	@method('put')
		@if($errors->any())
<div class="container my-3">
	<ul class="alert alert-danger">
	@foreach($errors->all() as $error)
	<li class="error text-danger">{{ $error }}</li>
	@endforeach	
</ul>
</div>
@endif
	<h6 class="text-center my-2 text-warning">Advertencia: No acepte pagar efectivo, ni en otra cuenta que no sea la que se proporciona en la factura. Tumedibot no es responsable por dinero pagado en efectivo ni a otras cuentas ajenas a la empresa.</h6>
	<hr>
	<h4>Datos Personales</h4>
	<div class="row">
		<div class="col-md-3 mb-3">
			<label for="nombre">Nombre <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="nombre" id="nombre" placeholder="Agregue su Nombre" value="{{old('nombre',ucfirst($medico->nombre))}}" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-3 mb-3">
			<label for="apellido">Apellido <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="apellido" id="apellido" placeholder="Agregue su Apellido" value="{{old('apellido',ucfirst($medico->apellido))}}"  required>
		</div>
		<div class="invalid-feedback">
			*Llenar Campo Obligatorio*
		</div>
		<div class="col-md-3 mb-3">
			<label >Segundo Nombre</label>
			<input type="text" class="form-control" name="second_name" placeholder="Opcional" value="{{old('second_name',ucfirst($medico->second_name))}}" >	   
		</div>
		<div class="col-md-3 mb-3">
			<label>Segundo Apellido</label>
			<input type="text" class="form-control" name="last_name" placeholder="Opcional" value="{{old('last_name',ucfirst($medico->last_name))}}" >
		</div>
	</div>
	<div class="row">
		<div class="col-md-3 mb-3 w-100">
			<label>Sexo <span class="text-danger">*</span></label>
			<select class="custom-select d-block w-100" type="text" name="sexo" value="{{old('sexo',$medico->sexo)}}" required>
				<option>MASCULINO</option>
				<option>FEMENINO</option>
			</select>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-3 mb-3">
			<label>Tel&eacute;fonos de Consultorio <span class="text-danger">*</span></label>
			<input type="tel" class="form-control" name="telefono" value="{{old('telefono',$medico->telefono)}}" placeholder="Formato de su Pais" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-3 mb-3 w-100">
			<label>Tel&eacute;fonos de Whatsapp</label>
			<input class="form-control" type="text" name="whatsapp" value="{{old('whatsapp',$medico->whatsapp)}}" placeholder="Formato de su Pais" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-3 mb-3 w-100">
			<label >Correo <span class="text-danger">*</span></label>
			<input type="email" class="form-control" name="email_dr" value="{{old('email_dr',$medico->correo)}}" placeholder="Agregue su Correo" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
	</div>
	<hr class="mb-4 ">
	<h4>Dirección de Consultorio</h4>
	<div class="row">
		<div class="col-md-4 mb-3">
			<label>Pais <span class="text-danger">*</span></label>
			<select class="custom-select d-block w-100" type="text" name="estado" value="{{old('estado',$medico->estado)}}" id="state_id"  required>
				<option></option>
				@foreach($state as $s)
				<option value="{{$s->id}}">{{$s->nombre_paises}}</option>
				@endforeach
			</select>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-4 mb-3">
        <label for="municipio" class="form-label">Estado</label>
        <select class="custom-select d-block w-100 {{ $errors->has('municipio') ? 'is-invalid' : ''}}" name="municipio"
          required id="municipio" disabled>
          <option></option>
        </select>
        @if ($errors->has('municipio'))
        <span class="text-danger">{{ $errors->first('municipio') }}</span>
        @endif
      </div>
      <div class="col-md-4 mb-3">
        <label for="parroquia" class="form-label">Ciudad</label>
        <select class="custom-select d-block w-100 {{ $errors->has('parroquia') ? 'is-invalid' : ''}}" name="parroquia"
          required id="parroquia"  disabled>
         <option></option>
        </select>
        @if ($errors->has('parroquia'))
        <span class="text-danger">{{ $errors->first('parroquia') }}</span>
        @endif

      </div>

		<div class="col-md-6 mb-3">
			<label>Avenida/Calle <span class="text-danger">*</span></label>
			<div class="custom-control custom-radio">
				<input id="avenida" name="avenida" type="radio" class="custom-control-input" value="avenida" checked  required>
				<label class="custom-control-label" for="avenida">Avenida</label>
			</div>
			<div class="custom-control custom-radio">
				<input id="calle" name="avenida" type="radio" class="custom-control-input" value="calle" checked required>
				<label class="custom-control-label" for="calle">Calle</label>
			</div>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div> 

		<div class="col-md-6 mb-3">
			<label>Nombre de Avenida/Calle <span class="text-danger">*</span></label>
			<input class="form-control" type="text" name="nombre_avenida" value="{{old('nombre_avenida',$medico->nombre_av_calle)}}" placeholder="Agregue Nombre de Avenida/Calle" required>	
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div >
	</div>
	<div class="row">
		<div class="col-md-4 mb-3">
			<label>Casa/Edificio/Centro Comercial <span class="text-danger">*</span></label>
			<div class="custom-control custom-radio">
				<input id="casa" name="casa_edf_cc" type="radio" class="custom-control-input" value="casa" checked required>
				<label class="custom-control-label" for="casa">Casa</label>
			</div>
			<div class="custom-control custom-radio">
				<input id="edificio" name="casa_edf_cc" type="radio" class="custom-control-input" value="edificio" required>
				<label class="custom-control-label" for="edificio">Edificio</label>
			</div>
			<div class="custom-control custom-radio">
				<input id="centro_c" name="casa_edf_cc" type="radio" class="custom-control-input" value="centro_comercial" required>
				<label class="custom-control-label" for="centro_c">Centro Comercial</label>
			</div>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-4 mb-3">
			<label>Nombre de Casa/Edificio/Centro Comercial <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="nombre_cas_edf" value="{{old('nombre_cas_edf',$medico->nombre_ca_ed_cc)}}" placeholder="Agregue Nombre de Casa/Edificio/Centro C" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-4 mb-3">
			<label>Nº Casa/Piso-Nº Apartamento/Nº de Local Comercial <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="nmro_casa_edf" value="{{old('nmro_casa_edf',$medico->nmro_ca_ed_cc)}}" placeholder="Agregue Nº Casa/Apto/Local C" required> 
		</div>
		<div class="invalid-feedback">
			*Llenar Campo Obligatorio*
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 mb-3">
			<label>Hospital/Clínica <span class="text-danger">*</span></label>
			<div class="custom-control custom-radio">
				<input id="hospital" name="hospital_clinica" type="radio" class="custom-control-input" value="hospital" checked required>
				<label class="custom-control-label" for="hospital">Hospital</label>
			</div>
			<div class="custom-control custom-radio">
				<input id="clinica" name="hospital_clinica" type="radio" class="custom-control-input" value="clínica" required>
				<label class="custom-control-label" for="clinica">Clínica</label>
			</div>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-4 mb-3">
			<label>Nombre de Hospital/Clínica <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="nombre_hos_cli" value="{{old('nombre_hos_cli',$medico->nombre_hos_cli)}}" placeholder="Agregue Nombre de Hospital/Clínica" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-4 mb-3">
			<label>Piso y Nº de consultorio <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="nmro_hos_cli" value="{{old('nmro_hos_cli',$medico->nmro_hos_cli)}}" placeholder="Agregue Piso y Nº de consultorio" required> 
		</div>
		<div class="invalid-feedback">
			*Llenar Campo Obligatorio*
		</div>
	</div>
	<hr class="mb-4 ">
	<h4>Datos del Especialista</h4>
	<div class="row">
		<div class="col-md-6">
			<label>Especialidad <span class="text-danger">*</span></label>
			<select class="custom-select" type="text" width="100" name="especialidad" value="{{old('especialidad',$medico->especialidad)}}" required>
				<option></option>
				@foreach($especialidades as $e)
				<option value="{{$e->nombre_especialidad}}">{{$e->nombre_especialidad}}</option>
				@endforeach
			</select> 
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-6">
			<label>Costo de Consulta en <span class="badge badge-success badge-pill">$</span> <span class="text-danger">*</span></label>
			<input class="form-control" type="number" name="costo_consulta" value="{{old('costo_consulta',$medico->consultorio_costo)}}" min="1" max="10000" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
	</div>
	
	
	<div class="row">
		<div class="col-md-6 my-3">
			<label>Horarios de trabajo <span class="text-danger">*</span></label>
			<input class="form-control" type="text" name="semana" value="{{old('semana',$medico->horario)}}" placeholder="lunes a viernes" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-6 my-3">
			<label>Años de Experiencia <span class="text-danger">*</span></label>
			<input class="form-control" type="number" name="experiencia" value="{{old('experiencia',$medico->experiencia)}}" min="1" max="99" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-6 mb-3">
			<label>T&iacute;tulo (Adjuntar un archivo pdf,png,jpeg,jpg de su t&iacute;tulo profesional) <span class="text-danger">*</span></label>
			<input class="form-control form-custom-file" type="file" name="profesion_file" value="{{old('profesion_file',$medico->name_original)}}" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-6 mb-3">
			<label>Usted es <span class="text-danger">*</span></label>
			<input class="form-control" type="text" name="leyenda_dr" value="{{old('leyenda_dr',$medico->usted_es)}}" placeholder="Neumonologo" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
	</div>
	<div class="row mb-3">
		<div class="col-md-6">
			<div class="imagen">
				<img id="imagen" src="../../suit1920.jpg" alt="imagen-Dr">
			</div>
		</div>
		<div class="col-md-6">
			<label>Foto De Doctor <span class="text-danger">*</span></label>
			<div style="text-indent: 15px" id="pesado" class="alert-danger  mb-3 ">
				Su imágen pesa más de un(1) MegaByte. Reduzca el peso de su imágen para continuar.
			</div>
			<input id="file" class="form-control form-custom-file" type="file" name="imagen" accept="image/*" required>     
			<ol class="list-group-numbered mt-3">
				<li class="list-group-item-primary">La imágen es de carácter obligatorio.</li>
				<li class="list-group-item-primary">Puede agregar la imágen que desee, sin embargo recomendamos agregar una foto suya con su uniforme médico en su consultorio.</li>
				<li class="list-group-item-primary">La imágen no debe pesar más de 1 MegaByte ó el sistema la rechazará.</li>
				<li class="list-group-item-primary">Usted puede agregar una imágen de cualquier dimensión de tamaño sin embargo Las Dimensiones de 2400x3600 es la que recomendamos.</li>
				<li class="list-group-item-primary">Considere que dimensiones muy grandes como 4000x5000 pesa más que una de dimensión más pequeña como 2400x3600.</li>
			</ol> 
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div> 
			
			
		</div>
	</div>
	
	<label >Perfil médico <span class="text-danger">*</span></label>
	<textarea class="ckeditor" name="perfil_med" id="perfil_med" rows="10" cols="10" maxlength="1500" value="{{old('perfil_med',$medico->perfil_medico)}}" required>
		{{old('perfil_med',$medico->perfil_medico)}}
	</textarea>
	<div class="invalid-feedback">
		*Llenar Campo Obligatorio*
	</div>
	<script type="text/javascript">
		CKEDITOR.config.maxlength = 100;
		CKEDITOR.config.uiColor = '#5599ff';

	</script>
	<div class="row mt-3">
		<div class="col-md-3 mb-3">
			<label for="facebook"><img class="filter" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\facebook.svg" width="30" height="30"> Facebook </label>
			<input type="url" class="form-control" name="facebook" value="{{old('facebook',$medico->facebook)}}" id="facebook" placeholder="Opcional" >
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-3 mb-3">
			<label for="twitter"><img class="filter" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\twitter.svg" width="30" height="30"> Twitter</label>
			<input type="url" class="form-control" name="twitter" value="{{old('twitter',$medico->twitter)}}" id="twitter" placeholder="Opcional" >
		</div>
		<div class="invalid-feedback">
			*Llenar Campo Obligatorio*
		</div>
		<div class="col-md-3 mb-3">
			<label><img class="filter" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\linkedin.svg" width="30" height="30"> Linkedin</label>
			<input type="url" class="form-control" name="linkedin" value="{{old('linkedin',$medico->linkedin)}}" placeholder="Opcional">	   
		</div>
		<div class="col-md-3 mb-3">
			<label><img class="filter" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\instagram.svg" width="30" height="30">     Instagram</label>
			<input type="url" class="form-control" name="instagram" value="{{old('instagram',$medico->instagram)}}" placeholder="Opcional">
		</div>
		<input type="hidden" name="user_id" value={{Auth::id()}} >
		<input type="hidden" name="revendedor" value="{{old('revendedor',$medico->revendedor)}}" >
	</div>
	<h5 class="text-danger text-center"><span class="text-danger">*</span> Campos obligatorios.</h5>
	<div class="container text-center">
	  <div class="form-group m-b-20">
	  <div class=" g-recaptcha" data-sitekey="6LfZdwgiAAAAAPt84chdFLZYcerFy5TwWpUWy3HG"></div>
          @if ($errors->has('g-recaptcha-response'))
            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
          @endif
      </div>
	</div>
	<button class="btn btn-success btn-lg btn-block mt-4" type="submit">
		Enviar Formulario
	</button>
	
</input>   
<br>
</form>
</div>	
<style>
	.imagen {
		position: relative;
		padding-bottom: 100%;
	}
	.imagen img{
		position: absolute;
		width: 100%;
		height: 100%;
	}
	.filter{
		filter:drop-shadow(0px 0px 1px green) invert(50%)
	}
</style>
@endsection
@section('js')
<script type="text/javascript" src="{{asset('js/babajaga.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tamacti.js')}}"></script>
@endsection

