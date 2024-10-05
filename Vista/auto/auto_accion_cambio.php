<?php
$titulo = "TP 4 - Cambio de dueño"; //Titulo en la paestania
include_once '../Estructura/header.php';
//echo '<div class="divtitulo"> <h1>'.$titulo.'</h1></div>';
$datos = data_submitted();
//verEstructura($datos);
$autoExiste = false;
$personaExiste = false;
$objAbmAuto = new AbmAuto();
$objAbmDuenio = new AbmPersona();
$mensaje = "Fallo Total <br>";

if(!empty(data_submitted())){

    if(isset($datos['NroDni'])){
        $enviar["NroDni"] = $datos["NroDni"];
        $listaPersona = $objAbmDuenio->buscar($enviar);
        if(!empty($listaPersona)){
            $personaExiste =true;
        }else{ //Si la persona duenño no existe
            $mensaje .= "No existe en la base de datos el propietario.<br>";
            $mensaje .= "<div>Desea ingresar un nuevo Dueño. <a href='../Ejercicio/persona_nuevo.php'>click aqui</a></div>";
            $mensaje .= '<button onclick="history.back();">Atras</button>';
        }
    }

    if(isset($datos['Patente'])){
        $enviar["Patente"] = $datos["Patente"];
        $listaAuto = $objAbmAuto->buscar($enviar);
        if(!empty($listaAuto)){
            $autoExiste =true;
        }else{ //Si la persona duenño no existe
            $mensaje .= "No existe en la base de datos el auto solicitado.<br>";
            $mensaje .= "<div>Desea ingresar un nuevo auto. <a href='../Ejercicio/auto_nuevo.php'>click aqui</a></div>";
            $mensaje .= '<button onclick="history.back();">Atras</button>';
        }
    }

    if($autoExiste && $personaExiste){
        if($objAbmAuto->modificarDni($datos)){
            $mensaje = "La carga en la base de datos se realizo correctamente.<br>";
        }else{
            $mensaje = "La carga no pudo concretarse.<br>";     
        }
    }

?>

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

    <!-- Titulo en la pagina -->
    <h3 class="text-center text-light">Cambio de due&ntilde;o del auto</h3>

    <!-- Mensaje mostrado en pantalla -->
    <div class="alert text-center p-3 divform">
        <?php	
    echo $mensaje;
    }else{
        echo '<div class="divform"> <p>NO HAY DATOS</p><br>
        <div><a href="auto_index.php" class="btn btn-success" role="button">Volver</a></div></div>';
    }
    include_once '../Estructura/footer.php';
        ?>
        
    <br><a href="auto_index.php" class="btn btn-primary" role="button">Volver</a><br>
</div>


<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>