<?php
$titulo = "TP Clases Útiles - Gestión de Comercios";
include_once("../Estructura/header.php");
$resp = false;
$objTrans = new AbmComercio();

if(!isset($datos)) {
    $datos = data_submitted();
} 
//var_dump($datos);
if (isset($datos['accion'])){
    if($datos['accion']=='listar'){
        $lista = $objTrans->buscar(null);
    } else {
    $resp = $objTrans->abm($datos);
    if($resp){
        $mensaje = "La accion ".$datos['accion']." se realizo correctamente.";
    }else {
        $mensaje = "La accion ".$datos['accion']." no pudo concretarse.";
    }
    echo("<script>location.href = './index.php?msg=$mensaje';</script>");
}
}
?>
