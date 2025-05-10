@extends('layouts.facturas_clinicas')
@section('plan')
Actualice Datos de Facturaci&oacute;n
@endsection
@section('formulario')
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(session('status'))
    <script>
                Swal.fire({ 
                    position: 'top-end',
                    icon: 'success',
                    title: 'Actualizado correctamente',
                    text: 'Puede regresar al Área Empresarial',
                    showConfirmButton: false,
                    timer: 3000 
                })
    </script>
   @endif
{!! htmlScriptTagJsApi() !!}
<form class="enviar" action="{{route('facturas_empresarial_actualizar',$user)}}" method="POST">
@csrf
@method('put')
<div class="container_c">
    <div class="card_c">
        <div class="form">
            <div class="left-side">
                <div class="left-heading">
                    <h3>Datos de facturaci&oacute;n</h3>
                </div>
                <div class="steps-content">
                    <h3>Paso <span class="step-number">1</span></h3>
                </div>
                <ul class="progress-bar_c">
                    <li class="active">Datos Empresariales</li>
                    <li>Datos de Representante Empresarial</li>
                    <li>Direcci&oacute;n de Empresa</li>
                    <li>Enviar Formulario</li>
                </ul>
            </div>
            <div class="right-side">
                <div class="main active">
                    <small><i class="bi bi-emoji-heart-eyes-fill"></i></small>
                    <div class="text">
                        <h2>Informaci&oacuten de Empresa</h2>
                        <p>Agregue datos Empresariales.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div"> 
                                <label>Tipo de Empresa</label>
                                <select type="text" required require name="tipo_negocio" value="{{old('tipo_negocio',$factura_empresa->tipo_negocio)}}" >
                                <option></option>
                                <option value="clinica">Clinica</option>
                                <option value="farmacia">Farmacia</option>
                                <option value="laboratorio">Laboratorio</option>
                                <option value="seguro">Seguro</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="nombre_negocio" required require  value="{{old('nombre_negocio',$factura_empresa->nombre_negocio)}}">
                            <span>Nombre de Empresa</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="rif_negocio" required require value="{{old('rif_negocio',$factura_empresa->rif_negocio)}}">
                            <span>R.I.F Empresarial</span>
                        </div>

                    </div>
                    <div class="buttons">
                        <a class="next_button btn btn-sm btn-primary text-white">Siguiente</a>
                    </div>
                </div>
                <div class="main">
                    <small><i class="bi bi-emoji-heart-eyes-fill"></i></small>
                    <div class="text">
                        <h2>Representante Empresarial</h2>
                        <p>Agregue al Representante Empresarial.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="nombre_representante" required require value="{{old('nombre_representante',$factura_empresa->nombre_representante)}}">
                            <span>Nombre</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" name="apellido_representante" required require value="{{old('apellido_representante',$factura_empresa->apellido_representante)}}">
                            <span>Apellido</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="telefono" required require value="{{old('telefono',$factura_empresa->celular)}}">
                            <span>Tel&eacute;fono</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="cedula" required require value="{{old('cedula',$factura_empresa->ci_rif)}}">
                            <span>C&eacute;dula</span>                            
                        </div>
                    </div>
                    <div class="buttons button_space">
                        <a class="back_button btn btn-sm btn-dark text-white">Regresar</a>
                        <a class="next_button btn btn-sm btn-primary text-white">Siguiente</a>
                    </div>
                </div>
                <div class="main">
                    <small><i class="bi bi-emoji-heart-eyes-fill"></i></small>
                    <div class="text">
                        <h2>Direcci&oacute;n de Empresa</h2>
                        <p>Agregue los datos donde se encuentra la empresa.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">

                            <label>Estado</label>
                            <select type="text" required require name="estado">
                            <option></option>
                              @foreach($estado as $s)
                              <option value={{$s->nombre_estado}}>{{$s->nombre_estado}}</option>
                              @endforeach
                            </select>  

                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div"> 
                            <input type="text" name="ciudad" required require value="{{old('ciudad',$factura_empresa->ciudad)}}">
                            <span>Ciudad</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="direccion" required require value="{{old('direccion',$factura_empresa->direccion)}}">
                            <span>Direcci&oacute;n</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="codigo_postal" required require value="{{old('codigo_postal',$factura_empresa->codigo_postal)}}">
                            <span>C&oacute;digo postal</span>
                            
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="user_id" value={{$user->id}}>
                    </div>
                    <div class="buttons button_space">
                        <a class="back_button btn btn-sm btn-dark text-white">Regresar</a>
                        <a class="next_button btn btn-sm btn-primary text-white">Siguiente</a>
                    </div>
                </div>
                 <div class="main">
                 	<small><i class="bi bi-emoji-heart-eyes-fill"></i></small>
                 	<div class="text">
                 		<h2>Por &uacute;ltimo envie el formulario.</h2>
                 		 <p>
                 		Al enviar llegar&aacute; un correo con la informaci&oacuten de pago.
                 		Puede pagar con transferencia o pago m&oacute;vil 
                 	</p>
                 	<p>
                 		Recuerde no aceptar pagar en efectivo. Tumedibot no es responsable por dinero pagado en efectivo.
                 	</p>
                 	</div>
                 	<br>
                    <div class="container bg-dark">
                    <div class="form-group m-b-20">
                    <div class=" g-recaptcha" data-sitekey="6LfZdwgiAAAAAPt84chdFLZYcerFy5TwWpUWy3HG"></div>
                          @if ($errors->has('g-recaptcha-response'))
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                          @endif
                      </div>
                  </div>
                 	<div class="buttons button_space">
                 	<a class="back_button btn btn-sm btn-dark text-white">Regresar</a>
                 	<button class="btn btn-primary text-white" type="submit">Enviar</button>
                 	 </div>
                 </div>
                
                 <div class="main">
                     <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                         <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                        <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                    </svg>
                     
                    <div class="text congrats">
                        <h2>Felicitaciones!</h2>
                        <p>Gracias. <span class="shown_name"></span>-Su informaci&oacute;n de facturaci&oacute;n fue enviada correctamente.</p>
                        <p>Ahora s&oacutelo debe pagar su factura con el monto establecido</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</form>
@endsection