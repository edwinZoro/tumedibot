@extends('layouts.Facturas')
@section('plan')
Actualice Datos de Facturaci&oacute;n
@endsection
@section('formulario')
<div class="container">
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
{!! htmlScriptTagJsApi() !!}
<form class="enviar" action="{{route('f_andromeda_actualizar')}}" method="POST">
@csrf
@method('put')
<div class="container_c">
    <div class="card_c">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3>Datos de facturaci&oacuten</h3>
                </div>
                <div class="steps-content">
                    <h3>Paso <span class="step-number">1</span></h3>
                </div>
                <ul class="progress-bar_c">
                    <li class="active">Datos Personales</li>
                    <li>Direcci&oacute;n</li>
                    <li>Enviar Formulario</li>
                </ul>
            </div>
            <div class="right-side">
                <div class="main active">
                    <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-sunglasses-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v.116A4.22 4.22 0 0 1 8 5c.35 0 .69.04 1 .116V5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-1.994-1.839A2.99 2.99 0 0 0 8 6c-.393 0-.74.064-1.006.161A2 2 0 0 1 5 8h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM4.969 9.75A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .866-.5z"/>
</svg></small>
                    <div class="text">
                        <h2>Informaci&oacute;n personal</h2>
                        <p>Agregue sus datos personales.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="nombre" value="{{old('nombre',ucfirst($factura_b->nombre))}}" required require id="user_name">
                            <span>Nombre</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" name="apellido" value="{{old('apellido',ucfirst($factura_b->apellido))}}" required require>
                            <span>Apellido</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="telefono" value="{{old('telefono',ucfirst($factura_b->celular))}}" required require>
                            <span>Tel&eacute;fono</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="cedula" value="{{old('cedula',ucfirst($factura_b->ci_rif))}}" required require>
                            <span>Nº de Identificaci&oacute;n</span>
                        </div>
                    </div>
                    <div class="buttons">
                        <a class="next_button btn btn-sm btn-primary text-white">Siguiente</a>
                    </div>
                </div>
                <div class="main">
                    <small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-sunglasses-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v.116A4.22 4.22 0 0 1 8 5c.35 0 .69.04 1 .116V5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-1.994-1.839A2.99 2.99 0 0 0 8 6c-.393 0-.74.064-1.006.161A2 2 0 0 1 5 8h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM4.969 9.75A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .866-.5z"/>
</svg></small>
                    <div class="text">
                        <h2>Direcci&oacute;n</h2>
                        <p>Agregue los datos donde usted vive.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="estado" value="{{old('estado',ucfirst($factura_b->estado))}}" required require>
                            <span>Pais</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" name="ciudad" value="{{old('ciudad',ucfirst($factura_b->ciudad))}}" required require>
                            <span>Ciudad</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="direccion" value="{{old('direccion',ucfirst($factura_b->direccion))}}" required require>
                            <span>Direcci&oacute;n</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="codigo_postal" value="{{old('codigo_postal',ucfirst($factura_b->codigo_postal))}}" required require>
                            <span>C&oacute;digo postal</span>
                            
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="user_id" value="{{old('user_id',$factura_b->user_id)}}">
                    </div>
                    <div class="buttons button_space">
                        <a class="back_button btn btn-sm btn-dark text-white">Regresar</a>
                        <a class="next_button btn btn-sm btn-primary text-white">Siguiente</a>
                    </div>
                </div>
                 <div class="main">
                 	<small><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-emoji-sunglasses-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zM2.31 5.243A1 1 0 0 1 3.28 4H6a1 1 0 0 1 1 1v.116A4.22 4.22 0 0 1 8 5c.35 0 .69.04 1 .116V5a1 1 0 0 1 1-1h2.72a1 1 0 0 1 .97 1.243l-.311 1.242A2 2 0 0 1 11.439 8H11a2 2 0 0 1-1.994-1.839A2.99 2.99 0 0 0 8 6c-.393 0-.74.064-1.006.161A2 2 0 0 1 5 8h-.438a2 2 0 0 1-1.94-1.515L2.31 5.243zM4.969 9.75A3.498 3.498 0 0 0 8 11.5a3.498 3.498 0 0 0 3.032-1.75.5.5 0 1 1 .866.5A4.498 4.498 0 0 1 8 12.5a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .866-.5z"/>
</svg></small>
                 	<div class="text">
                 		<h2>Por &uacuteltimo envie el formulario.</h2>
                 		 <p>
                 		Al enviar Se Habilitar&aacute; un enlace &Aacute;rea M&eacute;dico. 
                 	</p>
                 	<p>
                 		Recuerde no aceptar pagar en efectivo. Tumedibot no es responsable por dinero pagado en efectivo.
                 	</p>
                 	</div>
                 	<br>
                     <div class="container bg-dark">
                  <div class="form-group m-b-20">
                  <div class=" g-recaptcha" data-sitekey="6LeY-ggiAAAAAGHrYMvGjE3abrVvij_y7HkS053A"></div>
                        @if ($errors->has('g-recaptcha-response'))
                          <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        @endif
                    </div>
                </div>
                 	<div class="buttons button_space">
                 	<a class="back_button btn btn-sm btn-dark text-white">Regresar</a>
                 	<input class="btn btn-sm btn-primary text-white" type="submit"></input>
                 	 </div>
                 </div>
                
                 <div class="main">
                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                     
                    <div class="text congrats">
                        <h2>Felicitaciones!</h2>
                        <p>Gracias. <span class="shown_name"></span>-Su informaci&oacuten de facturaci&oacute;n fue enviada correctamente.</p>
                        <p>Ahora s&oacute;lo debe pagar su factura con el monto establecido</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</form>
@endsection