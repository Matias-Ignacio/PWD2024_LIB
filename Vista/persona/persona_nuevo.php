<?php
	$titulo = "TP 4 - Nueva persona"; //Titulo en la pestania
	include_once '../Estructura/header.php';
?>

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

<!-- Contenedor de formulario -->
<div class="container_persona mt-5 p-4 rounded shadow text-light">
	<!-- Titulo en la pagina -->
	<h3 class="text-center mb-4">Agregar una nueva persona</h3>
	<div class="row">

		<!-- Formulario -->
		<form method="post" action="persona_accion.php" id="formPersonaNueva" name="formPersonaNueva" class="row g-3 mt-3 needs-validation" novalidate>

			<!-- Numero DNI -->
			<div class="col-md-12 text-primary form-floating">
				<input id="NroDni" name="NroDni" width="80" type="number" min="1000000" class="form-control" placeholder="" pattern="[0-9]{6,8}" required>
				<label for="NroDni" class="form-label">N&uacute;mero de Dni: </label>

				<!-- Mensajes aprobado y error -->
				<div class="valid-feedback">Ok!</div>
				<div class="invalid-feedback">S&oacute;lo se permiten n&uacute; enteros positivos</div>
			</div>

			<!-- Apellido -->
			<div class="col-md-6 text-primary form-floating">
				<input id="Apellido" name="Apellido" width="80" type="text" class="form-control" placeholder="" pattern="^\s*[A-Za-z]+(\s[A-Za-z]+)*\s*$" required>
				<label for="Apellido" class="form-label">Apellido: </label>

				<!-- Mensajes aprobado y error -->
				<div class="valid-feedback">Ok!</div>
				<div class="invalid-feedback">S&oacute;lo se permiten letras o letras separadas por espacios</div>
			</div>

			<!-- Nombre -->
			<div class="col-md-6 text-primary form-floating">
				<input id="Nombre" name="Nombre" width="80" type="text" class="form-control" placeholder="" pattern="^\s*[A-Za-z]+(\s[A-Za-z]+)*\s*$" required>
				<label for="Nombre" class="form-label">Nombre: </label>

				<!-- Mensajes aprobado y error -->
				<div class="valid-feedback">Ok!</div>
				<div class="invalid-feedback">S&oacute;lo se permiten letras o letras separadas por espacios</div>
			</div>

			<!-- Fecha de Nacimiento -->
			<div class="mb-3 form-floating text-primary mb-4">
				<input id="fechaNac" name="fechaNac" width="80" type="date" class="form-control" placeholder="" min="1900-01-01" max="2006-09-01" required>
				<label for="fechaNac" class="form-label">Fecha de Nacimiento - Formato YYY-MM-DD: </label>

				<!-- Mensajes aprobado y error -->
				<div class="valid-feedback">Ok!</div>
				<div class="invalid-feedback">S&oacute;lo se permiten fechas de nacimiento en el formato YYYY-MM-DD</div>
			</div>

			<!-- Telefono -->
			<div class="mb-3 form-floating text-primary mb-4">
				<input id="Telefono" name="Telefono" width="80" type="numb" class="form-control" placeholder="" pattern="^(?!\s*$)[1-9]{1,5}\d*-[1-9]{5,9}\d*$" required>
				<label for="Telefono" class="form-label">Tel&eacute;fono - Formato 299-5443322: </label>

				<!-- Mensajes aprobado y error -->
				<div class="valid-feedback">Ok!</div>
				<div class="invalid-feedback">S&oacute;lo se permiten n&uacute;meros de tel&eacute;fono del formato 111-111111</div>
			</div>

			<!-- Domicilio -->
			<div class="mb-3 form-floating text-primary mb-4">
				<input id="Domicilio" name="Domicilio" width="80" type="text" class="form-control" placeholder="Nombre de la ciudad" pattern="^[A-Za-z0-9\s]*[A-Za-z0-9][A-Za-z0-9\s]*$" required>
				<label for="Domicilio" class="form-label">Domicilio: </label>

				<!-- Mensajes aprobado y error -->
				<div class="valid-feedback">Ok!</div>
				<div class="invalid-feedback">S&oacute;lo se permiten letras o letras y n&uacute;meros separados por un espacio</div>
			</div>

			<!-- Boton Guardar persona nueva -->
			<div class="col-md-4">
				<input id="accion" name ="accion" value="nuevo" type="hidden">
				<button class="btn btn-primary" type="submit">Guardar persona nueva</button>
			</div>
		</form>
	</div>
	<br><br>

	<!-- Boton atras -->
	<div class="col-md-4">
		<button class="btn btn-info" onclick="history.back();">Atr&aacute;s</button>
		<a href="persona_index.php" class="btn btn-primary" role="button">Principal</a>
	</div>
</div>



<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>

<!-- BOOTSTRAP con las validaciones de los campos -->
<script type="text/javascript" src="../Js/validacionTP4.js"></script> 
