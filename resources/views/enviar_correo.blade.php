<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="color-scheme" content="light">
<meta name="supported-color-schemes" content="light">
<style type="text/css">
	.container{
		margin: 5%;
		padding: 2%;
		background: rgba(0,0,0,0.2);
	}
	.inside{
		margin: 1em;
		padding: 30px;
		background: white;
	}
	.color{
		color: green;
	}
	h3{
		text-align: center;
	}
	p{
		text-align: justify;
	}
</style>
<body>
	<div class="container">
		<div class="inside">
			<h3>Mensaje tu<span class="color">medi</span>bot</h3>
			<p>El siguiente es un mensaje procedente de un paciente desde tumedibot.com</p>
			<ul>
				<li><b>Nombre de Paciente: {{$paciente[0]}}</b></li>
				<li><b>Correo de Paciente: {{$paciente[1]}}</b></li>
				<li><b>Telefono de Paciente: {{$paciente[2]}}</b></li>
			</ul>
			<p><b>Mensaje Del Paciente: {{$paciente[3]}}</b></p>
		</div>
	</div>
</body>
</html>