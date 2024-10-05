<?php
	$titulo = "TP 4 - Autos x Persona"; //Titulo en la pestania
	include_once '../Estructura/header.php';
	$objAbmPersona = new AbmPersona();
    $objAbmAuto = new AbmAuto();
	$datos = data_submitted();
	$objPersona = NULL;
	if (isset($datos['NroDni']))
    {
		$listaPersona = $objAbmPersona->buscar($datos);
        $enviar['DniDuenio'] = $datos['NroDni'];
        $listaAutos = $objAbmAuto->buscar($enviar);
		if (count($listaPersona) == 1)
        {
			$objPersona = $listaPersona[0];
		}
	}
?>

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>


<!-- Cuadro sombreado que rodea todo -->
<div class="container_persona mt-3 mt-5 p-4 border rounded shadow text-light text-center">

    <!-- Titulo en la pagina -->
    <div class="container mt-3">
        <h2 class="mb-4">Autos por Persona</h2>
        <p class="mb-4">Listado de los autos incluidos en la base de datos</p>

    <!-- Tabla 1 - Datos personas -->
        <table class="table table-hover table-striped">
            <tr class="text-light mb-4"  style="background-color: transparent;">
                <th style="width:200px;">Dni</th>
                <th style="width:200px;">Apellido</th>
                <th style="width:200px;">Nombre</th>
                <th style="width:200px;">Fecha Nacimiento</th>
                <th style="width:200px;">Teléfono</th>
                <th style="width:200px;">Domicilio</th>
                <th style="width:200px;">Editar</th>
                <th style="width:200px;">Eliminar</th>
            </tr>

            <?php
                if ($objPersona != null)
                {

                    echo '<tr><td style="width:200px;">'.$objPersona->getNroDni().'</td>';
                    echo '<td style="width:200px;">'.$objPersona->getApellido().'</td>';
                    echo '<td style="width:200px;">'.$objPersona->getNombre().'</td>';
                    echo '<td style="width:200px;">'.$objPersona->getFechaNac().'</td>';
                    echo '<td style="width:200px;">'.$objPersona->getTelefono().'</td>';
                    echo '<td style="width:200px;">'.$objPersona->getDomicilio().'</td>';
                    echo '<td><a href="../persona/persona_editar.php?NroDni='.$objPersona->getNroDni().'" class="btn btn-color btn-sm" role="button">Editar</a></td>';
                    echo '<td><a href="../persona/persona_accion.php?accion=borrar&NroDni='.$objPersona->getNroDni().'" class="btn btn-outline-danger btn-sm" role="button">Borrar</a></td></tr>';
                }else{
                    echo "<p>No se encontro la clave que desea modificar";
                }
            ?>
        </table>
        <br><br>

        <!-- Tabla 2 - Datos autos -->
        <div class="container mt-3">
            <h2 class="mb-4">Lista de autos</h2>
            <p class="mb-4">Listado de los autos pertenecientes a <?php echo $objPersona->getNombre(); ?> </p>
            <table class="table table-hover table-striped">
                <tr class="text-light mb-4"  style="background-color: transparent;">
                    <th style="width:200px;">Patente</th>
                    <th style="width:200px;">Marca</th>
                    <th style="width:200px;">Modelo</th>
                    <th style="width:200px;">Editar</th>
                    <th style="width:200px;">Eliminar</th>
                    <th style="width:200px;">Cambio de due&ntilde;o</th>
                </tr>

                <?php	
                    if( count($listaAutos) > 0)
                    {
                        foreach ($listaAutos as $objAuto)
                        {
                            echo '<tr><td style="width:200px;">'.$objAuto->getPatente().'</td>';
                            echo '<td style="width:200px;">'.$objAuto->getMarca().'</td>';
                            echo '<td style="width:200px;">'.$objAuto->getModelo().'</td>';
                            echo '<td><a href="auto_editar.php?Patente='.$objAuto->getPatente().'" class="btn btn-color btn-sm" role="button">Editar</a></td>';
                            echo '<td><a href="auto_accion.php?accion=borrar&Patente='.$objAuto->getPatente().'" class="btn btn-outline-danger btn-sm" role="button">Borrar</a></td>'; 
                            echo '<td><a href="auto_cambio_duenio.php?Patente='.$objAuto->getPatente().'" class="btn btn-outline-success btn-sm" role="button">Cambio</a></td></tr>';
                        }
                    }
                ?>
            </table>
            <br><br>
        </div>

        <!-- Botones atras y Agregar nuevo auto -->
        <div class="col-md-4">
            <button class="btn btn-info" onclick="history.back();">Atr&aacute;s</button>
            <a href="auto_nuevo.php" class="btn btn-primary" role="button">Agregar nuevo auto</a>
        </div>
    </div>

<!-- BOOTSTRAP con las validaciones de los campos -->
<script type="text/javascript" src="../Js/bootstrap-validation.js"></script>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>