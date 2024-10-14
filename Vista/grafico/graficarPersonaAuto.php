<?php
$titulo = "TP 5 - Ver Grafico de personas"; // Título en la pestaña

require_once "../../configuracion.php";
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

//Titulo del grafico
$graph->title->Set('Personas con y sin Auto');

//Formato del titulo del grafico
$graph->title->SetFont(FF_VERDANA, FS_BOLD, 14);  //Fuente Verdana, negrita, tamaño 14
$graph->title->SetColor('#1E90FF');  //Color azul (hexadecimal)
$graph->title->SetAlign('center');   //Alineación al centro
$graph->title->SetMargin(15);        //Margen entre el título y el gráfico

//Crear el gráfico de torta
$p1 = new PiePlot($valores);
$p1->SetLegends($labels); // Asignar leyendas
$p1->SetSliceColors(array('lightblue', 'orange')); // Colores para las secciones

$graph->Add($p1);

// Mostrar el gráfico
$graph->Stroke();
?>
