<?php
    $titulo = "TP 4 - Ver Autos"; //Titulo en la pestania
    include_once '../Estructura/header.php';
    $objAbmAuto = new AbmAuto();
    $listaAuto = $objAbmAuto->buscar(null);
?>	

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

<!-- Cuadro sombreado que rodea todo -->
<div class="container mt-3 mt-5 p-4 border rounded shadow text-light">
    <!-- Titulo en la pagina -->
    <h2 class="text-center mb-4">Listado de autos</h2>
    <p class="text-center mb-4">Listado de los autos incluidos en la base de datos</p>

    <!-- Tabla -->
    <table class="table table-hover table-striped ">
        <thead>
            <tr class= mb-4">
                <th>Patente</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Cambio de due&ntilde;o</th>
            </tr>
        </thead>

        <tbody>
            <?php	
                if(!empty($listaAuto))
                {
                    if( count($listaAuto) > 0)
                    {
                        foreach ($listaAuto as $objAuto)
                        {    
                            echo '<tr><td>'.$objAuto->getPatente().'</td>';
                            echo '<td>'.$objAuto->getMarca().'</td>';
                            echo '<td>'.$objAuto->getModelo().'</td>';
                            echo '<td>'.$objAuto->getObjDuenio()->getNombre().'</td>';
                            echo '<td>'.$objAuto->getObjDuenio()->getApellido().'</td>';
                            echo '<td><a href="auto_editar.php?Patente='.$objAuto->getPatente().'"class="btn btn-color btn-sm" role="button">Editar</a></td>';
                            echo '<td><a href="auto_accion.php?accion=borrar&Patente='.$objAuto->getPatente().'"class="btn btn-outline-danger btn-sm" role="button">Borrar</a></td>'; 
                            echo '<td><a href="auto_accion.php?accion=borrar&Patente='.$objAuto->getPatente().'"class="btn btn-outline-success btn-sm" role="button">Cambio</a></td></tr>'; 
                        }
                    }
                }else{
                    echo "<h2>No hay datos en la base de datos</h2>";
                }
            ?>
        </tbody>
    </table>


<!-- Boton atras -->
<div class="col-md-4">
    <button class="btn btn-info" onclick="history.back();">Atr&aacute;s</button>
    <a href="auto_index.php" class="btn btn-primary" role="button">Principal</a>
</div>
</div>

<!-- BOOTSTRAP con las validaciones de los campos -->
<script type="text/javascript" src="../Js/bootstrap-validation.js"></script>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>