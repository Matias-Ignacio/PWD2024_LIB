<?php
$titulo = "TP Clases Útiles - Gestión de Ciudades";
include_once("../Estructura/header.php");
$resp = false;
$objTrans = new AbmCiudad();

if(!isset($datos)) {
    $datos = data_submitted();
} 
if (isset($datos['accion'])){
    if($datos['accion']=='listar'){
        $lista = convert_array($objTrans->buscar(null));
    } else {
        $resp = $objTrans->abm($datos);
        if($resp){
            $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
        }else {
            $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
        }
        echo $mensaje;
        echo("<script>location.href = './index.php?msg=$mensaje';</script>");
    }
    }
        
?>
