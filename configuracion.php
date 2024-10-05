<?php header('Content-Type: text/html; charset=utf-8');
header ("Cache-Control: no-cache, must-revalidate ");

/////////////////////////////
// CONFIGURACION APP//
/////////////////////////////

$PROYECTO ='PWD2024_LIB';

//variable que almacena el directorio del proyecto
$ROOT =$_SERVER['DOCUMENT_ROOT']."/".$PROYECTO."/";


include_once ($ROOT.'Util/funciones.php');

$GLOBALS['ROOT']=$ROOT;

?>
