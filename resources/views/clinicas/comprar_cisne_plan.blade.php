@extends('layouts.facturas_clinicas')
@section('plan')
Facturaci&oacute;n de Plan Cisne
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
        <script type="text/javascript" src="{{asset('startbootstrap-freelancer-gh-pages\startbootstrap-freelancer-gh-pages\js\add_plans.js')}}"></script>
    @endif
{!! htmlScriptTagJsApi() !!}
<form class="enviar" action="{{route('area_empresarial',$user)}}" method="POST">
@csrf
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
                                <select type="text" required require name="tipo_negocio">
                                <option></option>
                                <option value="ambulatorio">Ambulatorio</option>
                                <option value="clinica">Clinica</option>
                                <option value="hospital">Hospital</option>
                                <option value="farmacia">Farmacia</option>
                                <option value="laboratorio">Laboratorio</option>
                                <option value="seguro">Seguro</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="nombre_negocio" required require id="">
                            <span>Nombre de Empresa</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="rif_negocio" required require>
                            <span>ID Empresarial</span>
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
                            <input type="text" name="nombre_representante" required require>
                            <span>Nombre</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" name="apellido_representante" required require>
                            <span>Apellido</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="telefono" required require>
                            <span>Tel&eacute;fono</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="cedula" required require>
                            <span>Nº de identificaci&oacute;n</span>                            
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="plan" value='fenix'>
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
                        <h2>Direcci&oacute;n de Empresa</h2>
                        <p>Agregue los datos donde se encuentra la empresa.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">

                            <label>Pais</label>
                            <select type="text" required require name="estado">
                            <option></option>
                              @foreach($estado as $s)
                              <option value={{$s->nombre_paises}}>{{$s->nombre_paises}}</option>
                              @endforeach
                            </select>  

                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div"> 
                            <input type="text" name="ciudad" required require>
                            <span>Ciudad</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="direccion" required require>
                            <span>Direcci&oacute;n</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="codigo_postal" required require>
                            <span>C&oacute;digo postal</span>
                            
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="plan" value='cisne'>
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
                 		Al enviar se habilitar&aacute; en el menú un enlace &Aacuterea Empresarial. Presione el botón Pagar para hacer su pedido. Puede pagar con Paypal o Bitcoin. 
                 	</p>
                 	<p>
                 		Recuerde no aceptar pagar en efectivo. Tumedibot no es responsable por dinero pagado en efectivo. Gracias por preferirnos. 
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