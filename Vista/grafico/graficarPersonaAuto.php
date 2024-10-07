<?php
// phpinfo();
$titulo = "TP 5 - Ver Grafico de personas"; // Título en la pestaña
// include_once '../Estructura/header.php';
require_once '../../Control/AbmAuto.php';  
require_once '../../Control/AbmPersona.php';  

require_once '../../Modelo/Auto.php'; 
require_once '../../Modelo/Persona.php';
require_once '../../Modelo/Conector/BaseDatos.php';

require_once ('../Librerias/jpGraph/jpgraph.php');
require_once ('../Librerias/jpGraph/jpgraph_pie.php'); //La librería para gráficos de torta

$objAbmPersona = new AbmPersona();
$objAbmAuto = new AbmAuto();
$listaAutos = $objAbmAuto->buscar(null);
$listaPersona = $objAbmPersona->buscar(null);
$personasConAuto = 0;
$personaSinAuto = 0;
if(count($listaPersona) > 0){
    foreach($listaPersona as $persona){
        $i=0;
        $tieneAuto = false;
        while($i<count($listaAutos) && !$tieneAuto){
            if($persona->getNroDni() == $listaAutos[$i]->getObjDuenio()->getNroDni()){
                $personasConAuto += 1;
                $tieneAuto = true;
            }
            $i++;
        }
        // Si no tiene auto, incrementar el contador de personas sin auto
        if(!$tieneAuto){
            $personaSinAuto += 1;
        }
    }
}
//Configurar los datos para el gráfico
$labels = array('Personas con Auto', 'Personas sin Auto');
$valores = array($personasConAuto, $personaSinAuto);

// Configurar el gráfico
$graph = new PieGraph(900, 350); // Cambiar a PieGraph para gráfico circular
$graph->SetShadow();

$graph->title->Set('Personas con y sin Auto');

//Crear el gráfico de torta
$p1 = new PiePlot($valores);
$p1->SetLegends($labels); // Asignar leyendas
$p1->SetSliceColors(array('lightblue', 'orange')); // Colores para las secciones

$graph->Add($p1);

// Mostrar el gráfico
$graph->Stroke();
?>
