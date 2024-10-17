<?php
$titulo = "TP Clases Útiles - Gestión de Comercios";
include_once("../Estructura/header.php");
$datos = data_submitted();
$datos['accion']="listar";
include_once("accion.php");
?>

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

<!-- Cuadro sombreado que rodea todo -->
<div class="container_auto mt-3 mt-5 p-4 border rounded shadow text-light">

    <!-- Titulo de la tabla -->
    <div class="text-center mb-4">
        <h2>Listado de Comercios</h2>
        <p>Listado de los comercios incluidos en la base de datos</p>
    </div>

    <div class="row float-left">
        <div class="col-md-12 float-left">
        <?php 
        if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null){
            echo $datos['msg'];
        }
            
        ?>
        </div>
    </div>

    <!-- Tabla de Comercios -->
    <div class="table-responsive">
        <table class="table table-striped table-sm">

            <!-- Titulos de las columnas de la tabla -->
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th class="text-white" scope="col">Nombre</th>
                    <th class="text-white" scope="col">Ciudad</th>
                    <th class="text-white" scope="col">Latitud</th>
                    <th class="text-white" scope="col">Longitud</th>
                    <th class="text-white" scope="col">Editar</th>
                    <th class="text-white" scope="col">Eliminar</th>
                </tr>
            </thead>

            <!-- Datos dentro de la tabla -->
            <tbody>
                <?php
                if(count($lista)>0){
                    foreach ($lista as $comercio){
                        echo '<tr><td>'.$comercio->getid().'</td>';
                        echo '<td>'.$comercio->getNombre().'</td>';
                        echo '<td>'.$comercio->getobjCiudad()->getNombre().'</td>';
                        echo '<td>'.$comercio->getLatitud().'</td>';
                        echo '<td>'.$comercio->getLongitud().'</td>';
                        echo '<td><a class="btn btn-color" role="button" href="editar.php?accion=editar&com_id='.$comercio->getid().'">editar</a></td>';
                        echo '<td><a class="btn btn-outline-danger" role="button" href="editar.php?accion=borrar&com_id='.$comercio->getid().'">borrar</a></td></tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Boton agregar nuevo Comercio -->
    <div class="row float-right">
        <div class="col-md-12 float-right">
            <a class="btn btn-primary" role="button" href="auto_nuevo.php" >Nuevo</a>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
include_once("../Estructura/footer.php");
?>
