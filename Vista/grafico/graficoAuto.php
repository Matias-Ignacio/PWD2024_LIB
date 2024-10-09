<?php // content="text/plain; charset=utf-8"


require_once "../Librerias/jpGraph/jpgraph.php";
require_once "../Librerias/jpGraph/jpgraph_pie.php";
require_once "../Librerias/jpGraph/jpgraph_pie3d.php";
require_once "../../configuracion.php";

$abmAuto = new AbmAuto();

$arregloAuto = $abmAuto -> buscar("");
$arregloMarcas = [];

if($arregloAuto != null){
    foreach($arregloAuto as $auto){
        $arregloMarcas[] = $auto -> getMarca();
    }
}

$nuevoArreglo = array_count_values($arregloMarcas);


$data = array_values($nuevoArreglo);
$marca = array_keys($nuevoArreglo);







// Some data


// Create the Pie Graph. 
$graph = new PieGraph(650,700);

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Set A title for the plot
$graph->title->Set("Porcentaje de marcas por auto");

// Create
$p1 = new PiePlot3D($data);
$graph->Add($p1);

$p1 ->SetLegends($marca);
$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);
$graph->Stroke();

?>