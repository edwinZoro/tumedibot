@extends('layouts.plantilla')
@section('t')
tumedibot
@endsection
@section('titulo')
Edite sus datos en el siguiente formulario
@endsection
@section('back')
{{route('back_clinicas')}}
@endsection

@section('formulario')		
<div>
{!! htmlScriptTagJsApi() !!}
<form  style="border-style:dashed;border-color:skyblue;box-shadow: 2px 2px 13px black" class="card p-2 bg-light needs-validation" method="POST" action="{{route('clinicas_actualizar',$clinica)}}" enctype="multipart/form-data">
	{{ csrf_field() }}
	@method('PUT')
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
	<h4>Datos De Empresa</h4>
	<div class="row">
		<div class="col-md-4 mb-3 w-100">
			<label>Tipo de Negocio <span class="text-danger">*</span></label>
			<select class="custom-select d-block w-100" type="text" id="tipo_negocio" name="tipo_negocio" value="{{old('tipo_negocio',ucfirst($clinica->tipo_negocio))}}" required>
				<option></option>
				<option>Ambulatorio</option>
				<option>Cl&iacute;nica</option>
				<option>Hospital</option>
				<option>Laboratorio</option>
				<option>Farmacia</option>
				<option>Seguro</option>
			</select>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-4 mb-3">
			<label for="nombre">Nombre de Empresa <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="nombre" id="nombre" value="{{old('nombre',ucfirst($clinica->nombre))}}" placeholder="Agregue Nombre de Empresa" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="invalid-feedback">
			*Llenar Campo Obligatorio*
		</div>
		<div class="col-md-4 mb-3 ">
			<label >Correo <span class="text-danger">*</span></label>
			<input type="email" class="form-control" name="correo" value="{{old('correo',$clinica->correo)}}" placeholder="Agregue Correo Empresarial" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>

	</div>
	<div class="row">
	   <div class="col-md-6 mb-3">
			<label>Teléfonos de Empresa <span class="text-danger">*</span></label>
			<input type="tel" class="form-control" name="telefono" value="{{old('telefono',$clinica->telefono)}}" placeholder="Formato de su pais" required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
	    <div class="col-md-6 mb-3">
			<label>Teléfonos de Whatsapp</label>
			<input type="tel" class="form-control" name="whatsapp" value="{{old('whatsapp',$clinica->whatsapp)}}" placeholder="Formato de su pais" >
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
	</div>
	<hr class="mb-4 ">
	<h4>Dirección de Empresa</h4>
	<div class="row">
		<div class="col-md-4 mb-3">
			<label>Pais <span class="text-danger">*</span></label>
			<select class="custom-select d-block w-100" type="text" name="estado" value="{{old('estado',$clinica->estado_id)}}" id="state_id"  required>
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
	</div>
	<div class="row">
				<div class="col-md-12 mb-3">
				<label>Dirección de la Empresa <span class="text-danger">*</span></label>
				<input class="form-control" type="text" name="direccion" value="{{old('direccion',$clinica->direccion)}}" placeholder="Agregue Direccion de Empresa" required>	
				<div class="invalid-feedback">
					*Llenar Campo Obligatorio*
				</div>
			</div >
	</div>

	


	<hr class="mb-4 ">
	<h4>Datos de Perfil Empresa</h4>
	<div class="row">
		<div class="col-md-12 mb-3">
	<label >Perfil Empresa <span class="text-danger">*</span></label>
	<textarea  class="ckeditor" name="perfil_clinica" value="{{old('perfil_clinica',$clinica->perfil_clinica)}}" id="perfil_clinica" rows="8" cols="10" minlength="0" maxlength="500" required> Agregue un perfil acerca de la empresa y a que se dedica. Un perfil bien redactado llamará la atención de más pacientes. Tomese su tiempo para escribir su perfil.
		- No debe ser mayor a 500 caracteres (Aprox 100 palabras).
		- No agregue servicios que ofrece tales como: Odontología, Perfil 20, Equipos Médicos, ... Puede agregarlos en el siguiente campo.  
	</textarea>
</div>
	</div>
		<script type="text/javascript">
		CKEDITOR.config.maxlength = 100;
		CKEDITOR.config.uiColor = '#5599ff';
	</script>
	
	
	<div class="row">
		<div class="col-md-12 mb-3">
			<label>Servicios que ofrece su Empresa <span class="text-danger">*</span></label>
			<input class="form-control" type="text" name="servicios" value="{{old('servicios',$clinica->servicios)}}" placeholder="Pediatría, Gastroenterología, Odontología, Cirugía, Medicina General, Equipos Médicos,Perfil 20 ..." required>
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>

	</div>
	<!--Carrousel-->
	<div class="row mb-3">
		<div class="col-sm-6">
			<div class="imagen">
				<img id="imagen" src="../../surgery.jpg" alt="surgery">
			</div>
		</div>
		<div class="col-sm-6">
			<label>Foto 1 para perfil empresarial (Carrousel de im&aacute;genes) <span class="text-danger">*</span></label>
			<div style="text-indent: 15px" id="pesado" class="alert-danger  mb-3 ">
				Su imágen pesa más de cinco(5) MegaByte. Reduzca el peso de su imágen para continuar.
			</div>
			<input id="file" class="form-control form-custom-file" type="file" name="imagen" value="{{old('imagen',$clinica->imagen)}}" accept="image/*" required>     
			<ol class="list-group-numbered mt-3">
				<li class="list-group-item-primary">La imágen 1 es de carácter obligatorio.</li>
				<li class="list-group-item-primary">Puede agregar la imágen que desee, sin embargo recomendamos agregar una foto popular de su cuenta de instagram. Ya que encima de esta foto habrá un botón de esta red social. Dicho botón se habilitará automaticamente si llena el campo Instagram</li>
				<li class="list-group-item-primary">La imágen no debe pesar más de 5 MegaByte ó el sistema la rechazará.</li>
				<li class="list-group-item-primary">Usted puede agregar una imágen de cualquier dimensión de tamaño sin embargo Las Dimensiones de 1920x1281 es la que recomendamos.</li>
				<li class="list-group-item-primary">Considere que dimensiones muy grandes como 3000x3000 pesa más que una de dimensión más pequeña como 1500x1500.</li>
			</ol> 
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div> 
			
			
		</div></div>	
		<div class="row mb-3">
		<div class="col-sm-6">
			<div class="imagen">
				<img id="imagenb"  src='../../resonancia.jpg' alt="resonancia">
			</div>
		</div>
		<div class="col-sm-6">
			<label>Foto 2 para perfil empresarial (Carrousel de im&aacute;genes) <span class="text-danger">*</span></label>
			<div style="text-indent: 15px" id="pesadob"  class="alert-danger  mb-3 ">
				Su imágen pesa más de cinco(5) MegaByte. Reduzca el peso de su imágen para continuar.
			</div>
			<input id="fileb" class="form-control form-custom-file" type="file" name="imagenb" value="{{old('imagenb',$clinica->imagenb)}}" accept="image/*" required>     
			<ol class="list-group-numbered mt-3">
				<li class="list-group-item-primary">La imágen 2 es de carácter obligatorio.</li>
				<li class="list-group-item-primary">Puede agregar la imágen que desee, sin embargo recomendamos agregar una foto popular de su cuenta de facebook. Ya que encima de esta foto habrá un botón de esta red social. Dicho botón se habilitará automaticamente si llena el campo Facebook</li>
				<li class="list-group-item-primary">La imágen no debe pesar más de 5 MegaByte ó el sistema la rechazará.</li>
				<li class="list-group-item-primary">Usted puede agregar una imágen de cualquier dimensión de tamaño sin embargo Las Dimensiones de 1920x1281 es la que recomendamos.</li>
				<li class="list-group-item-primary">Considere que dimensiones muy grandes como 3000x3000 pesa más que una de dimensión más pequeña como 1500x1500.</li>
			</ol> 
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div> 
			
			
		</div></div>		
		<div class="row mb-3">
		<div class="col-sm-6">
			<div class="imagen">
				<img id="imagenc"  src="../../mapaclinica.png" alt="mapaclinica">
			</div>
		</div>
		<div class="col-sm-6">
			<label>Foto 3 para perfil empresarial (Carrousel de im&aacute;genes) <span class="text-danger">*</span></label>
			<div style="text-indent: 15px" id="pesadoc"  class="alert-danger  mb-3 ">
				Su imágen pesa más de cinco(5) MegaByte. Reduzca el peso de su imágen para continuar.
			</div>
			<input id="filec" class="form-control form-custom-file" type="file" name="imagenc" value="{{old('imagenc',$clinica->imagenc)}}" accept="image/*" required>     
			<ol class="list-group-numbered mt-3">
				<li class="list-group-item-primary">La imágen 3 es de carácter obligatorio.</li>
				<li class="list-group-item-primary">Puede agregar la imágen que desee, sin embargo recomendamos agregar una foto de mapa de googlemaps como el ejemplo a la izquierda.</li>
				<li class="list-group-item-primary">La imágen no debe pesar más de 5 MegaByte ó el sistema la rechazará.</li>
				<li class="list-group-item-primary">Usted puede agregar una imágen de cualquier dimensión de tamaño sin embargo Las Dimensiones de 1200x815 es la que recomendamos. La imagen que observa es de ese tamaño</li>
				<li class="list-group-item-primary">Considere que dimensiones muy grandes como 3000x3000 pesa más que una de dimensión más pequeña como 1500x1500.</li>
{{-- 				<li class="list-unstyled mt-2">
					<label>Titulo de texto de la Foto 3</label>
					<input id="text" class="form-control " type="text" name="" placeholder="Encuentrenos con googlemaps" value="" >   </li>
 --}}			</ol> 
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div> 
			
			
		</div></div>	
		<!--Galeria-->
		<div class="row mb-3">
		<div class="col-sm-6">
			<div class="imagen">
				<img id="imagend" src="../../micros.jpg" alt="imagen-Dr">
			</div>
		</div>
		<div class="col-sm-6">
			<label>Foto 4 para perfil empresarial (Sección Acerca de Nosotros), Tambien ser&aacute; 1ra im&aacute;gen de mini perfil en lista de busqueda <span class="text-danger">*</span></label>
			<div style="text-indent: 15px" id="pesadod" class="alert-danger  mb-3 ">
				Su imágen pesa más de cinco(5) MegaByte. Reduzca el peso de su imágen para continuar.
			</div>
			<input id="filed" class="form-control form-custom-file" type="file" name="imagend" value="{{old('imagend',$clinica->imagend)}}" accept="image/*" required>     
			<ol class="list-group-numbered mt-3">
				<li class="list-group-item-primary">La imágen 4 es de carácter obligatorio.</li>
				<li class="list-group-item-primary">Puede agregar la imágen que desee, sin embargo recomendamos agregar una foto que refleje su empresa.</li>
				<li class="list-group-item-primary">La imágen no debe pesar más de 5 MegaByte ó el sistema la rechazará.</li>
				<li class="list-group-item-primary">Usted puede agregar una imágen de cualquier dimensión de tamaño sin embargo Las Dimensiones de 1920x1278 es la que recomendamos.</li>
				<li class="list-group-item-primary">Considere que dimensiones muy grandes como 3000x3000 pesa más que una de dimensión más pequeña como 1500x1500.</li>
			</ol> 
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div> 
			
			
		</div></div>	
		<div class="row mb-3">
		<div class="col-sm-6">
			<div class="imagen">
				<img id="imagene"  src='../../laboratory.jpg' alt="imagen-Dr">
			</div>
		</div>
		<div class="col-sm-6">
			<label>Foto 5 para perfil empresarial (Sección Servicios) <span class="text-danger">*</span></label>
			<div style="text-indent: 15px" id="pesadoe"  class="alert-danger  mb-3 ">
				Su imágen pesa más de cinco(5) MegaByte. Reduzca el peso de su imágen para continuar.
			</div>
			<input id="filee" class="form-control form-custom-file" type="file" name="imagene" value="{{old('imagene',$clinica->imagene)}}" accept="image/*" required>     
			<ol class="list-group-numbered mt-3">
				<li class="list-group-item-primary">La imágen 5 es de carácter obligatorio.</li>
				<li class="list-group-item-primary">Puede agregar la imágen que desee, sin embargo recomendamos agregar una foto que refleje los servicios que ofrece su empresa.</li>
				<li class="list-group-item-primary">La imágen no debe pesar más de 5 MegaByte ó el sistema la rechazará.</li>
				<li class="list-group-item-primary">Usted puede agregar una imágen de cualquier dimensión de tamaño sin embargo Las Dimensiones de 1292x1000 es la que recomendamos.</li>
				<li class="list-group-item-primary">Considere que dimensiones muy grandes como 3000x3000 pesa más que una de dimensión más pequeña como 1500x1500.</li>
			</ol> 
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div> 
			
			
		</div></div>		
		<div class="row mb-3">
		<div class="col-sm-6">
			<div class="imagen">
				<img id="imagenf"  src="../../mapaclinica.png" alt="imagen-Dr">
			</div>
		</div>
		<div class="col-sm-6">
			<label>Foto 6 para perfil empresarial (Sección Contacto), Tambien ser&aacute; 2da im&aacute;gen de mini perfil en lista de busqueda<span class="text-danger">*</span></label>
			<div style="text-indent: 15px" id="pesadof"  class="alert-danger  mb-3 ">
				Su imágen pesa más de cinco(5) MegaByte. Reduzca el peso de su imágen para continuar.
			</div>
			<input id="filef" class="form-control form-custom-file" type="file" name="imagenf" value="{{old('imagenf',$clinica->imagenf)}}" accept="image/*" required>     
			<ol class="list-group-numbered mt-3">
				<li class="list-group-item-primary">La imágen 6 es de carácter obligatorio.</li>
				<li class="list-group-item-primary">Puede agregar la imágen que desee, sin embargo recomendamos agregar una foto de mapa de googlemaps como el ejemplo a la izquierda.</li>
				<li class="list-group-item-primary">La imágen no debe pesar más de 5 MegaByte ó el sistema la rechazará.</li>
				<li class="list-group-item-primary">Usted puede agregar una imágen de cualquier dimensión de tamaño sin embargo Las Dimensiones de 1200x815 es la que recomendamos. La imagen que observa es de ese tamaño</li>
				<li class="list-group-item-primary">Considere que dimensiones muy grandes como 3000x3000 pesa más que una de dimensión más pequeña como 1500x1500.</li>
			</ol> 
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div> 
			
			
		</div></div>	
	<div class="row mt-3">
		<div class="col-md-3 mb-3">
			<label for="facebook"><img class="filter" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\facebook.svg" width="30" height="30"> Facebook </label>
			<input type="url" class="form-control" name="facebook" value="{{old('facebook',$clinica->facebook)}}" id="facebook" placeholder="Opcional" >
			<div class="invalid-feedback">
				*Llenar Campo Obligatorio*
			</div>
		</div>
		<div class="col-md-3 mb-3">
			<label for="twitter"><img class="filter" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\twitter.svg" width="30" height="30"> Twitter</label>
			<input type="url" class="form-control" name="twitter" value="{{old('twitter',$clinica->twitter)}}" id="twitter" placeholder="Opcional" >
		</div>
		<div class="invalid-feedback">
			*Llenar Campo Obligatorio*
		</div>
		<div class="col-md-3 mb-3">
			<label><img class="filter" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\linkedin.svg" width="30" height="30"> Linkedin</label>
			<input type="url" class="form-control" name="linkedin" value="{{old('linkedin',$clinica->linkedin)}}" placeholder="Opcional">	   
		</div>
		<div class="col-md-3 mb-3">
			<label><img class="filter" src="..\..\bootstrap-4.0.0\bootstrap-4.0.0\icons-1.5.0\icons-1.5.0\icons\instagram.svg" width="30" height="30">     Instagram</label>
			<input type="url" class="form-control" name="instagram" value="{{old('instagram',$clinica->instagram)}}" placeholder="Opcional">
		</div>
		<input type="hidden" name="user_id" value={{Auth::id()}} >
		<input type="hidden" name="revendedor" value="{{old('revendedor',$clinica->revendedor)}}" >
	</div>
	<h5 class="text-danger text-center"><span class="text-danger">*</span> Campos obligatorios.</h5>
	<div class="container">
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
@section('js')
<script type="text/javascript" src="{{asset('js/roronoa.js')}}"></script>
<script type="text/javascript" src="{{asset('js/tamacti.js')}}"></script>
@endsection
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer>
  </script>
@endsection

