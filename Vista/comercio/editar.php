<?php
$titulo = "TP Clases Útiles - Editar/Agregar Comercio";
include_once("../Estructura/header.php");
$datos = data_submitted();

$objCE = new AbmCiudad();
$objC = new AbmComercio();

$obj =NULL;
if (isset($datos['com_id']) && $datos['com_id'] <> -1){
    $listaTabla = $objC->buscar($datos);
    if (count($listaTabla)==1){
        $obj= $listaTabla[0];
    }
}

$listaCiudad = $objCE->buscar(null);
?>

<!-- Titulo en la pagina -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

<div class="divform">
    <form method="post" action="accion.php">
        <input id="com_id" name ="com_id" type="hidden" value="<?php echo ($obj !=null) ? $obj->getid() : "-1"?>" readonly required >
        <input id="accion" name ="accion" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>" type="hidden">
        <div class="row mb-12">
            <div class="col-sm-12 ">
                <div class="form-group has-feedback">
                    <label for="nombre" class="control-label">Nombre:</label>
                    <div class="input-group">
                        <input style="margin-bottom: 5px;"id="com_nombre" name ="com_nombre" type="text" class="form-control" value="<?php echo ($obj !=null) ? $obj->getNombre() : ""?>" required >

                    </div>
                </div>
            </div>
        </div>
        <br>

        <div class="row mb-3">
            <div class="col-sm-12 ">
                <div class="form-group has-feedback">
                    <label for="nombre" class="control-label">Ciudad:</label>
                    <div class="input-group">

                        <select class="form-control" id="ciudad" name="ciudad" >
                            <?php
                            foreach ($listaCiudad as $ciudad):
                                if ($obj != null && $obj->getobjCiudad()->getid()==$ciudad->getid())
                                    echo '<option selected value="'.$ciudad->getid().'">'.$ciudad->getNombre().' </option>';
                                    else
                                echo '<option value="'.$ciudad->getid().'">'.$ciudad->getNombre().'</option>';
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        
        <input type="submit" class="btn btn-tpcu btn-block" value="<?php echo ($datos['accion'] !=null) ? $datos['accion'] : "nose"?>">
    </form>
    <br>

    <a href="index.php" class="btn btn-primary">Volver</a>
</div>

<!-- Footer -->
<?php
include_once("../Estructura/footer.php");
?>