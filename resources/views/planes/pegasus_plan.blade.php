@extends('layouts.Facturas')
@section('plan')
Facturaci&oacuten de Plan Pegasus
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
   @else
    <script>
            $('.enviar').submit(function(e){
                e.preventDefault();
                Swal.fire({
                      title: 'Se ha agregado correctamente',
                      text: 'Se ha habilitado en el menú un botón Área Médico',
                      icon: 'success',
                      iconColor:'green',
                      showCancelButton:'true',
                      cancelButtonText:'cerrar',
                      cancelButtonColor:'#007bff',
                    })
            });
    </script>
   @endif
</div>
{!! htmlScriptTagJsApi() !!}
<form class="enviar" action="{{route('area_medico',$user)}}" method="POST">
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
                    <li class="active">Datos Personales</li>
                    <li>Direcci&oacuten</li>
                    <li>Enviar Formulario</li>
                </ul>
            </div>
            <div class="right-side">
                <div class="main active">
                    <small><i class="bi bi-emoji-heart-eyes-fill"></i></small>
                    <div class="text">
                        <h2>Informaci&oacuten personal</h2>
                        <p>Agregue sus datos personales.</p>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="nombre" required require id="user_name">
                            <span>Nombre</span>
                        </div>
                        <div class="input-div"> 
                            <input type="text" name="apellido" required require>
                            <span>Apellido</span>
                        </div>
                    </div>
                    <div class="input-text">
                        <div class="input-div">
                            <input type="text" name="telefono" required require>
                            <span>Tel&eacutefono</span>
                        </div>
                        <div class="input-div">
                            <input type="text" name="cedula" required require>
                            <span>Nº de Identificaci&oacute;n</span>
                        </div>
                    </div>
                    <div class="buttons">
                        <a class="next_button btn btn-sm btn-primary text-white">Siguiente</a>
                    </div>
                </div>
                <div class="main">
                    <small><i class="bi bi-emoji-heart-eyes-fill"></i></small>
                    <div class="text">
                        <h2>Direcci&oacuten</h2>
                        <p>Agregue los datos donde usted vive.</p>
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
                            <span>C&oacutedigo postal</span>
                            
                        </div>
                    </div>
                    <div>
                        <input type="hidden" name="plan" value='pegasus'>
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
                 		<h2>Por &uacuteltimo envie el formulario.</h2>
                 		 <p>
                 		Al enviar Se Habilitar&aacute; un enlace &Aacute;rea M&eacute;dico  
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
                        <p>Gracias. <span class="shown_name"></span>-Su informaci&oacuten de facturaci&oacuten fue enviada correctamente.</p>
                        <p>Ahora s&oacutelo debe pagar su factura con el monto establecido</p>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
</form>
@endsection