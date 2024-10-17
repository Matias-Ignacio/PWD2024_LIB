<?php
$titulo = "TP Clases Útiles - Editar/Agregar Ciudad";
include_once("../Estructura/header.php");
$datos = data_submitted();

$objC = new AbmCiudad();
$obj = NULL;
if (isset($datos['ciu_id']) && $datos['ciu_id'] <> -1)
{
    $listaTabla = $objC->buscar($datos);
    if (count($listaTabla) == 1)
    {
        $obj = $listaTabla[0];
    }
}
?>	

<!-- Titulo en la pagina -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>


<div class="divform">
    <form id="form" name="form" method="post" action="accion.php" class="full-height p-4">
        <input id="ciu_id" name ="ciu_id" type="hidden" value="<?php echo ($obj !=null) ? $obj->getid() : "-1"?>" readonly required >
        <input id="accion" name ="accion" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>" type="hidden">
        <div class="row mb-12">
            <div class="col-sm-12 ">
                <div class="form-group has-feedback">
                    <label for="nombre" class="control-label">Nombre:</label><br>
                    <div class="input-group">
                        <input id="ciu_nombre" name="ciu_nombre" type="text" class="form-control" value="<?php echo ($obj != null) ? $obj->getNombre() : ""?>" required readonly>
                    </div>
                </div>
            </div>
        </div>
        <br>

        <input type="submit" class="btn btn-tpcu btn-block" value="<?php echo ($datos['accion'] != null) ? $datos['accion'] : "nose"?>">
    </form>

    <br>
    <a href="index.php" class="btn btn-primary">Volver</a>
</div>

<!-- Footer -->
<?php
include_once("../Estructura/footer.php");
?>