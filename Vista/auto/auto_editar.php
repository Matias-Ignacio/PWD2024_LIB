<?php
	$titulo = "TP 4 - Editar auto"; //Titulo en la pestania
	include_once '../Estructura/header.php';
	$objAbmAuto = new AbmAuto();
	$objAbmPersona = new AbmPersona();
    $listaPersona = $objAbmPersona->buscar(null);
	$datos = data_submitted();
	$objAuto = NULL;
	if (isset($datos['Patente']))
	{
		$listaAuto = $objAbmAuto->buscar($datos);
		if (count($listaAuto) == 1)
		{
			$objAuto= $listaAuto[0];
		}
	}
?>	

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>


<!-- Cuadro sombreado que rodea todo -->
<div class="container_auto text-primary mt-3 mt-5 p-4 border rounded shadow">

	<!-- Titulo en la pagina -->
	<h3 class="text-center mb-4 text-light">Editar un auto</h3>

	<?php
		if ($objAuto != null)
		{
	?>

	<!-- Contenedor de formulario -->
	<div class="container mb-4">
		<div class="row">

			<!--Formulario -->
			<form method="post" action="auto_accion.php" id="formAutoEditar" name="formAutoEditar" class="row g-3 mt-3 needs-validation" novalidate>

				<!-- Patente -->
				<div class="mb-3 form-floating">
					<input id="Patente" readonly name ="Patente" width="80" type="text" class="form-control" value="<?php echo $objAuto->getPatente()?>" pattern="[A-z\s]{4}[0-9]{3}||[A-z]{2}[0-9]{3}[A-z]{2}" required>
					<label for="Patente" class="form-label">Patente</label>
					<br/>

					<!-- Mensajes aprobado y error -->
					<div class="valid-feedback">Ok!</div>
					<div class="invalid-feedback">S&oacute;lo se permiten patentes con el formato AA 111 AA ó AAA 111</div>
				</div>

				<!-- Marca -->
				<div class="mb-3 form-floating">
					<input id="Marca" name ="Marca" width="80" type="text" value="<?php echo $objAuto->getMarca()?>" class="form-control" pattern="[A-Za-z0-9][A-Za-z0-9\s]*$" required>
					<label for="Marca" class="form-label">Marca</label>
					<br/>

					<!-- Mensajes aprobado y error -->
					<div class="valid-feedback">Ok!</div>
					<div class="invalid-feedback">S&oacute;lo se permiten letras, n&uacute;meros y espacios</div>
				</div>

				<!-- Modelo -->
				<div class="mb-3 form-floating">
					<input id="Modelo" name ="Modelo" width="80" type="text" value="<?php echo $objAuto->getModelo()?>" class="form-control" required>
					<label for="Modelo" class="form-label">Modelo - A&ntilde;o de 4 d&iacute;gitos</label>
					<br/>

					<!-- Mensajes aprobado y error -->
					<div class="valid-feedback">Ok!</div>
					<div class="invalid-feedback">S&oacute;lo se permiten n&uacute;meros enteros positivos</div>
				</div>

				<!-- Dni del Duenio -->
				<div class="mb-3 form-floating">
					<select name="DniDuenio" id="DniDuenio" class="form-control" required>
						<option value="<?php echo $objAuto->getObjDuenio()->getNroDni()?>" selected ><?php echo $objAuto->getObjDuenio()->getNroDni()." - ".$objAuto->getObjDuenio()->getApellido()." ".$objAuto->getObjDuenio()->getNombre();?></option>
						<?php	
						if( count($listaPersona) > 0){
							foreach ($listaPersona as $objPersona) { 
								echo '<option value="'.$objPersona->getNroDni().'">'.$objPersona->getNroDni().' - '.$objPersona->getApellido().' '.$objPersona->getNombre().'</option>';
							}
						}
					?>
					</select>
					<label for="DniDuenio" class="form-label">Dni del Due&ntilde;o</label>

					<!-- Mensajes aprobado y error -->
					<div class="valid-feedback">Ok!</div>
					<div class="invalid-feedback">S&oacute;lo se permiten n&uacute;meros enteros positivos</div>
				</div>

				<!-- Botones atras y editar -->
				<div class="col-md-4">
				<button type="button" class="btn btn-info" onclick="window.location.href='auto_index.php';">Atr&aacute;s</button>
					<input id="accion" name ="accion" value="editar" type="hidden">
					<button class="btn btn-primary" type="submit">Editar</button>
				</div>
			</form>
		</div>
		<?php
			}else{
				echo "<p>No se encontro la clave que desea modificar";
			}
		?>
	</div>
</div>

<!-- BOOTSTRAP con las validaciones de los campos -->
<script type="text/javascript" src="../Js/validacionTP4.js"></script>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>

<script>
	document.getElementById("Modelo").addEventListener("blur", function(){
		validarModelo(this);
	});
</script>
