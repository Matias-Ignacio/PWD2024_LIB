<?php

function data_submitted() {
    $_AAux= array();
    if (!empty($_POST)){
        $_AAux =$_POST;
    }else{
        if(!empty($_GET)) {
            $_AAux =$_GET;
        }
    }
    if (!empty($_FILES)){
        $_AAux = array_merge($_AAux, $_FILES);
    }    
    if (count($_AAux)){
        foreach ($_AAux as $indice => $valor) {
            if ($valor=="")
                $_AAux[$indice] = 'null'	;
        }
    }
    return $_AAux;
}

// auto load register 
spl_autoload_register(function ($class_name){
    //echo($class_name);
    //echo($_SESSION['ROOT']); 
    $directorys = array(
        $GLOBALS['ROOT'].'Modelo/',
        $GLOBALS['ROOT'].'Modelo/Conector/',
        $GLOBALS['ROOT'].'Control/'
        );
    //print_r($directorys) ;
    foreach($directorys as $directory){

        if(file_exists($directory.$class_name .'.php')){
            // echo "se incluyo".$directory.$class_name . '.php';
            require_once($directory.$class_name .'.php');
            return;
        }
    }
});


function dismount($object) {
    $reflectionClass = new ReflectionClass(get_class($object));
    $array = array();
    foreach ($reflectionClass->getProperties() as $property) {
        $property->setAccessible(true);
        $array[$property->getName()] = $property->getValue($object);
        $property->setAccessible(false);
    }
    return $array;
}

function convert_array($param) {
    $_AAux= array();
    if (!empty($param)) {
        if (count($param)){
            foreach($param as $obj) {
                array_push($_AAux,dismount($obj));    
            }
        }
    }
    
    return $_AAux;
}
?>