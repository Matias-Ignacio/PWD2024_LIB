<?php
    $titulo = "TP Clases Útiles - Nuevo Comercio"; //Titulo en la pestania
    include_once '../../Estructura/header.php';
    //echo '<div class="divtitulo"> <h1>'.$titulo.'</h1></div>';
    $datos = data_submitted();
    //verEstructura($datos);
    $autoLoad = false;
    $objAbmComercio = new AbmComercio();
    $objAbmCiudad = new AbmCiudad();
    $aviso = '';
    $mensaje = "";
    if(!empty(data_submitted()))
    {
        //Buscar en la BDD si ya existe el comercio con ese id
        $enviar['com_id'] = $datos['com_id'];      //Enviamos solo el id
        $listaAuto = $objAbmComercio->buscar($enviar);
        if(empty($listaAuto)){

            if(isset($datos['ciu_id'])){
                $enviar['ciu_id'] = $datos['ciu_id'];
                $listaCiudad = $objAbmCiudad->buscar($enviar);
                if(!empty($listaCiudad)){
                    if($objAbmComercio->alta($datos)){
                        $autoLoad = true;
                    }  
                }else{ //Si la persona duenño no existe
                    $aviso .= "No existe la ciudad en la base de datos.<br>";
                    $aviso .= '<div><a href="../Ejercicio/persona_nuevo.php" class="btn btn-success" role="button">Ingresar Nuevo Dueño</a></div><br>';
                }
            }
        }else{
            $aviso .= "El id ya está registrado en la base de datos <br>";
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
    <h3 class="text-center text-primary">Agregar nuevo comercio</h3>
    <?php
        echo $aviso ;	
        echo $mensaje;
        }else{
            echo '<div class="divform"> <p>NO HAY DATOS</p><br>
                <div class="col-md-4"><button class="btn btn-info" onclick="history.back();">Atr&aacute;s</button></div>
                <div><a href="../Ejercicio/index.php" class="btn btn-success" role="button">Principal</a></div></div>';
        }
    ?>
        <!-- Boton volver -->
        <br><a href="../Ejercicio/index.php" class="btn btn-primary m-3" role="button">Volver</a><br>
</div>

<!-- Footer -->
<?php
    include_once '../../Estructura/footer.php';
?>
