<?php
$titulo = " Gestion de Comercios";
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

  <!-- Subtitulo en la pagina -->
  <div class="text-center mb-4">
    <h2>Listado de Comercios</h2>
  </div>

    <div class="row float-left">
        <div class="col-md-12 float-left">
        <?php 
        if(isset($datos) && isset($datos['msg']) && $datos['msg']!=null) {
            echo $datos['msg'];
        }
            
        ?>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Ciudad</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>

    <?php
    if(count($lista)>0){
        foreach ($lista as $comercio) {
            echo '<tr><td>'.$comercio->getid().'</td>';
            echo '<td>'.$comercio->getNombre().'</td>';
            echo '<td>'.$comercio->getobjCiudad()->getNombre().'</td>';
            echo '<td><a class="btn btn-info" role="button" href="editar.php?accion=editar&com_id='.$comercio->getid().'">editar</a>';
            echo '<a class="btn btn-primary" role="button" href="editar.php?accion=borrar&com_id='.$comercio->getid().'">borrar</a></td></tr>';
        }
    }
    ?>
            </tbody>
        </table>
    </div>

    <div class="row float-right">
        <div class="col-md-12 float-right">
            <a class="btn btn-success" role="button" href="editar.php?accion=nuevo">nuevo</a>
        </div>
    </div>
</div>

<?php

include_once("../Estructura/footer.php");
?>
