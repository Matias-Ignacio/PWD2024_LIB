<?php
    $titulo = "TP 4 - Nuevo auto"; //Titulo en la pestania
    include_once '../Estructura/header.php';
    //echo '<div class="divtitulo"> <h1>'.$titulo.'</h1></div>';
    $datos = data_submitted();
    //verEstructura($datos);
    $autoLoad = false;
    $objAbmAuto = new AbmAuto();
    $objAbmDuenio = new AbmPersona();
    $aviso = '';
    $mensaje = "";
    if(!empty(data_submitted()))
    {
        //Buscar en la BDD si ya existe el auto con esa patente
        $enviar['Patente'] = $datos['Patente'];      //Enviamos solo la patente
        $listaAuto = $objAbmAuto->buscar($enviar);
        if(empty($listaAuto)){

            if(isset($datos['DniDuenio'])){
                $enviar['NroDni'] = $datos['DniDuenio'];
                $listaPersona = $objAbmDuenio->buscar($enviar);
                if(!empty($listaPersona)){
                    if($objAbmAuto->alta($datos)){
                        $autoLoad =true;
                    }  
                }else{ //Si la persona duenño no existe
                    $aviso .= "No existe el propietario en la base de datos.<br>";
                    $aviso .= '<div><a href="../persona/persona_nuevo.php" class="btn btn-success" role="button">Ingresar Nuevo Dueño</a></div><br>';
                }
            }
        }else{
            $aviso .= "La patente ya está registrada en la base de datos <br>";
        }
    

    if($autoLoad){
        $mensaje = "La carga en la base de datos se realizo correctamente.";
    }else {
        $mensaje = "La carga no pudo concretarse.";
    }
?>

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

<div class="alert text-center p-3 divform">
    <!-- Titulo en la pagina -->
    <h3 class="text-center text-primary">Agregar nuevo auto</h3>
    <?php
        echo $aviso ;	
        echo $mensaje;
        }else{
            echo '<div class="divform"> <p>NO HAY DATOS</p><br>
                <div class="col-md-4"><button class="btn btn-info" onclick="history.back();">Atr&aacute;s</button></div>
                <div><a href="auto_index.php" class="btn btn-success" role="button">Principal</a></div></div>';
        }
    ?>
        <!-- Boton volver -->
        <br><a href="auto_index.php" class="btn btn-primary m-3" role="button">Volver</a><br>
</div>
<?php        include_once '../Estructura/footer.php'; ?>
