<?php
    $titulo = "tp 4 - Personas - Edición o barrado"; //Titulo en la pestania
    include_once '../Estructura/header.php';
    /*echo '<div class="divtitulo"> <h1>';
    echo $titulo.'</h1></div>';*/
    $datos = data_submitted();
    // Si no llegan datos del data_submited    
    $mensaje = 'No se realizaron cambios';   //SI NO PONIA ESTE MENSAJE SALTABA ERROR DE VARIABLE NO DEFINIDA EN EL ANVEGADOR
    if(!empty($datos))
    {
        $resp = false;
        $objAbmPersona = new AbmPersona();

        if (isset($datos['accion']))
        {
            if($datos['accion'] == 'editar')
            {
                if($objAbmPersona->modificacion($datos))
                {
                    $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
                    //$resp = true;
                }
            }

            if($datos['accion'] == 'borrar')
            {
                if(!$objAbmPersona->verificarAuto($datos))
                {
                    if($objAbmPersona->baja($datos))
                    {
                        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
                        //$resp = true;
                    }else{
                        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";}
                }else{
                    $mensaje = "La accion ".$datos['accion']." no pudo concretarse porque la persona tiene un auto";
                }
            }

            if($datos['accion'] == 'nuevo')
            {
                $enviar['NroDni'] = $datos['NroDni'];    //Para buscar solo por dni
                $listaPersona = $objAbmPersona->buscar($enviar);
                if(empty($listaPersona))
                {
                    if($objAbmPersona->alta($datos))
                    {
                        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
                        //$resp = true;
                    }else{$mensaje = "La accion ".$datos['accion']." no pudo concretarse.";}
                }else{
                    $mensaje = "El Dni de la persona ya existe en la base de datos.<br> La accion ".$datos['accion']." no pudo concretarse.";
                }
            }
        }
    ?>

<!-- Titulo en la pagina -->
<h3 class="text-center mt-3 text-primary"">Persona - Edici&oacute;n o borrado</h3>

<!-- Mensaje mostrado en pantalla -->
<div class="alert alert-info text-center p-3 divform">
    <?php	
        echo "<p>".$mensaje."</p>";
        // Si no llegan datos del data_submited    
}else{
    echo "Acceso restringido";
}
    ?>
<!-- Boton volver -->
<br><a href="persona_index.php" class="btn btn btn-info m-3" role="button">Volver</a><br>
</div>


<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>


