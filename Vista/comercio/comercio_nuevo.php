<?php
	$titulo = "TP Clases Útiles - Comercio nuevo"; //Titulo en la pestania
	include_once '../../Estructura/header.php';
    $objAbmPersona = new AbmPersona();
    $listaPersona = $objAbmPersona->buscar(null);
?>

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

<!-- Contenedor de formulario -->
<div class="container_auto mt-5 p-4 rounded shadow">
    <!-- Titulo en la pagina -->
    <h3 class="text-center text-light mb-4">Ingresar nuevo comercio</h3>
    <div class="row">

		<!-- Formulario -->
		<form method="post" action="../Accion/comercio_accion_nuevo.php" id="formcomercioNuevo" name="formcomercioNuevo" class="row g-3 mt-3 needs-validation" novalidate>

			<!-- id a buscar -->
			<div class="mb-3 form-floating text-primary mb-4">
				<input class="form-control" type="text" id="com_id" name="com_id" placeholder="AAA 111 ó AA 111 AA" pattern="^\s*([A-Za-z]{2} \d{3} [A-Za-z]{2}|[A-Za-z]{3} \d{3})\s*$" required>
				<label for="com_id" class="form-label">Ingrese una patente con el siguiente formato: AAA 111 ó AA 111 AA</label>

				<!-- Mensajes aprobado y error -->
                <div class="valid-feedback">Ok!</div>
                <div class="invalid-feedback">S&oacute;lo se permiten patentes con el formato especificado</div>
            </div>

            <!-- Nombre -->
            <div class="mb-3 form-floating text-primary mb-4">
				<input class="form-control" id="Nombre" name ="Nombre" type="text" pattern="^[A-Za-z0-9\s]*[A-Za-z0-9][A-Za-z0-9\s]*$" placeholder="" required>
				<label for="Nombre" class="form-label">Marca</label>

				<!-- Mensajes aprobado y error -->
                <div class="valid-feedback">Ok!</div>
                <div class="invalid-feedback">S&oacute;lo se permiten letras, n&uacute;meros y espacios</div>
            </div>

            <!-- id ciudad -->
            <div class="mb-3 form-floating text-primary mb-4">
                <input class="form-control" id="ciu_id" name="ciu_id" type="text" placeholder=" " required>
                <label for="ciu_id" class="form-label">Modelo - Formato: A&ntilde;o de 4 d&iacute;gitos</label>

				<!-- Mensajes aprobado y error -->
                <div class="valid-feedback">Ok!</div>
                <div class="invalid-feedback">S&oacute;lo se permiten n&uacute;meros enteros positivos</div>
            </div>

            <!-- Latitud -->
            <div class="mb-3 form-floating text-primary mb-4">
				<select name="Latitud" id="Latitud" class="form-control text-primary mb-4" required>
                    <option value="" selected disabled>Elija DNI</option>
                    <?php	
                    if( count($listaPersona) > 0){
                        foreach ($listaPersona as $objPersona) { 
                            echo '<option value="'.$objPersona->getNroDni().'">'.$objPersona->getNroDni().' - '.$objPersona->getApellido().' '.$objPersona->getNombre().'</option>';
                        }
                    }
                ?>
                </select>
				<label for="Latitud" class="form-label">Dni del Due&ntilde;o</label>

				<!-- Mensajes aprobado y error -->
                <div class="valid-feedback">Ok!</div>
                <div class="invalid-feedback">S&oacute;lo se permiten n&uacute;meros enteros positivos</div>
            </div>

            <!-- Longitud -->
            <div class="mb-3 form-floating text-primary mb-4">
				<select name="Longitud" id="Longitud" class="form-control text-primary mb-4" required>
                    <option value="" selected disabled>Elija DNI</option>
                    <?php	
                    if( count($listaPersona) > 0){
                        foreach ($listaPersona as $objPersona) { 
                            echo '<option value="'.$objPersona->getNroDni().'">'.$objPersona->getNroDni().' - '.$objPersona->getApellido().' '.$objPersona->getNombre().'</option>';
                        }
                    }
                ?>
                </select>
				<label for="Longitud" class="form-label">Dni del Due&ntilde;o</label>

				<!-- Mensajes aprobado y error -->
                <div class="valid-feedback">Ok!</div>
                <div class="invalid-feedback">S&oacute;lo se permiten n&uacute;meros enteros positivos</div>
            </div>


            <!-- Boton Guardar nuevo auto -->
            <div class="col-md-4">
                <button class="btn btn-primary" type="submit">Guardar nuevo auto</button>
                <a href="persona_nuevo.php" class="btn btn-primary" role="button">Agregar nueva persona</a>
            </div>
		</form>
	</div>
    <br><br>
    
    <!-- Boton atras -->
    <div class="col-md-4">
        <button class="btn btn-info" onclick="history.back();">Atr&aacute;s</button>
        <a href="../Ejercicio/auto_index.php" class="btn btn-primary" role="button">Principal</a>
        </div>
</div>

<!-- Footer -->
<?php include_once '../../Estructura/footer.php'; ?>

<!-- BOOTSTRAP con las validaciones de los campos -->
<script type="text/javascript" src="../../Js/validacionTP4.js"></script> 

<script>

document.getElementById("Modelo").addEventListener("blur", function(){
    validarModelo(this);
  });
</script>