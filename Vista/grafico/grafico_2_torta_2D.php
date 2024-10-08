<?php

require_once ('../Librerias/jpGraph/jpgraph.php');
require_once ('../Librerias/jpGraph/jpgraph_pie.php');



// Some data
$data = array(40,21,17,14,23);

// Create the Pie Graph. 
$graph = new PieGraph(350,250);

$theme_class = "DefaultTheme";
//$graph->SetTheme(new $theme_class());

// Set A title for the plot
$graph->title->Set("A Simple Pie Plot");
$graph->SetBox(true);


// Create
$p1 = new PiePlot($data);
//Agregado
$p1->ExplodeSlice(2,10);
$p1->ExplodeSlice(1,12);

$graph->Add($p1);

$p1->ShowBorder();
$p1->SetColor('black');
$p1->SetSliceColors(array('#1E90FF','#2E8B57','#ADFF2F','#DC143C','#BA55D3'));
$graph->Stroke();
?>