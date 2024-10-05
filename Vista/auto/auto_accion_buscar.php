<?php
    $titulo = "TP 4 - Autos Buscar"; //Titulo en la pestania
    include_once '../Estructura/header.php';
    /*echo '<div class="divtitulo"> <h1>';
    echo $titulo.'</h1></div>';*/
    $datos = data_submitted();

    if(!empty($datos))
    {
        $resp = false;
        $arregloAuto = Array();
        $objAbmAuto = new AbmAuto();
        $listaAutos = $objAbmAuto->buscar($datos);
        if(!empty($listaAutos)){
            $objAuto = $listaAutos[0];
?>

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>


        <!-- Titulo en la pagina -->
        <div class="container mt-3">
            <h2 class="text-center">Datos del auto buscado</h2>
            <p class="text-center">Detalle de los datos incluidos en la base de datos</p>            
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Patente</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>DNI Propietario</th>
                    </tr>
                </thead>
            <tbody>
    <?php
        echo '<tr><td>'.$listaAutos[0]->getPatente().'</td>';
        echo '<td>'.$objAuto->getMarca().'</td>';
        echo '<td>'.$objAuto->getModelo().'</td>';
        echo '<td>'.$objAuto->getObjDuenio()->getNroDni().'</td>';
    ?>
    </tbody>
    </table>
    </div>
    <?php
        }else{
            echo '<div class="alert text-center p-3"> <h2>No se encontraron los datos del auto</h2></div>';
        }
    ?>
    <div class="container mt-3">    
        <div class="col-md-4">  
            <!-- Boton atras -->
            <button class="btn btn-info" onclick="history.back();">Atr&aacute;s</button>
        </div>
    </div>
    <?php
    // Si no llegan datos del data_submited    
    }else{
        echo '<div class="alert text-center p-3"> <h2>Acceso restringido</h2></div>';
    }
?>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>
