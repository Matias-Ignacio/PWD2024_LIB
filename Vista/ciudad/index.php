<?php
    $titulo = "Gestión de Ciudades";
    include_once("../Estructura/header.php");
    $datos = data_submitted();
    $datos['accion'] = "listar";
    include_once("accion.php");
?>

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

<!-- Cuadro sombreado que rodea todo -->
<div class="container_auto mt-3 mt-5 p-4 border rounded shadow text-light">

    <!-- Subtitulo en la pagina -->
    <div class="text-center mb-4">
        <h2>Listado de Ciudades</h2>
    </div>

    <div class="row float-left">
        <div class="col-md-12 float-left">
        <?php 
        if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null)
        {
            echo $datos['msg'];
        }
        ?>
        </div>
    </div>

    <!-- Tabla de ciudades -->
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <!-- Titulos de las columnas de la tabla -->
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th class="text-white" scope="col">Nombre</th>
                    <th class="text-white" scope="col">Editar</th>
                    <th class="text-white" scope="col">Eliminar</th>
                </tr>
            </thead>

            <!-- Datos dentro de la tabla -->
            <tbody>
                <?php
                if(count($lista)>0)
                {
                    foreach ($lista as $ciudad)
                    {
                        echo '<tr><td>'.$ciudad['ciu_id'].'</td>';
                        echo '<td>'.$ciudad['ciu_nombre'].'</td>';

                        echo '<td><a class="btn btn-color" role="button" href="editar.php?accion=editar&ciu_id='.$ciudad['ciu_id'].'">editar</a></td>';
                        echo '<td><a class="btn btn-outline-danger" role="button" href="editar.php?accion=borrar&ciu_id='.$ciudad['ciu_id'].'">borrar</a></td></tr>';
                    }
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Boton agregar nueva ciudad -->
    <div class="row float-right">
        <div class="col-md-12 float-right">
            <a class="btn btn-primary" role="button" href="editar.php?accion=nuevo&ciu_id=-1">Nuevo</a>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
include_once("../Estructura/footer.php");
?>
