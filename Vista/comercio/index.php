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
                    <th class="text-white" scope="col"></th>
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
            echo '<td><a class="btn btn-color" role="button" href="editar.php?accion=editar&com_id='.$comercio->getid().'"><i class="bi bi-pencil"></i></a>   ';
            echo '<button class="btn btn-outline-danger" role="button" onclick="confirmarBorrar('.$comercio->getid().', \'borrar.php?accion=borrar&com_id=\')"><i class="bi bi-trash3-fill"></i></button></td></tr>';
        }
    }


    ?>
</tbody>
        </table>
    </div>

    <!-- Boton agregar nuevo Comercio -->
    <div class="row float-right">
        <div class="col-md-12 float-right">
        <a class="btn btn-primary" role="button" href="editar.php?accion=nuevo&ciu_id=-1">Nuevo</a>
        </div>
    </div>
</div>

<!-- Modal de Confirmación -->
<div class="modal fade" id="modalConfirmacion" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Confirmación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                ¿Estás seguro de que deseas eliminar este comercio?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" id="btnConfirmar" class="btn btn-danger">Borrar</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
let comercioId = '';
let urlAccion = '';

function confirmarBorrar(id, url) {
    comercioId = id;
    urlAccion = url;
    var myModal = new bootstrap.Modal(document.getElementById('modalConfirmacion'), {
        keyboard: false
    });
    myModal.show();
}

document.getElementById('btnConfirmar').addEventListener('click', function() {
    // Redirige a la URL de borrado con el ID del comercio
    window.location.href = urlAccion + comercioId;
});
</script>

<!-- Footer -->
<?php
include_once("../Estructura/footer.php");
?>
