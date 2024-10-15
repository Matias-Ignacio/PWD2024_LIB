<?php //content="text/plain; charset=utf-8"
require_once "../Librerias/jpGraph/jpgraph.php";
require_once "../Librerias/jpGraph/jpgraph_pie.php";
require_once "../Librerias/jpGraph/jpgraph_pie3d.php";
require_once "../../configuracion.php";

$abmAuto = new AbmAuto();
$arregloAuto = $abmAuto->buscar("");
$arregloMarcas = [];

if($arregloAuto != null){
    foreach($arregloAuto as $auto){
        $arregloMarcas[] = $auto->getMarca();
    }
}
$nuevoArreglo = array_count_values($arregloMarcas);

$data = array_values($nuevoArreglo);
$marca = array_keys($nuevoArreglo);

//Crear gráfico de torta en 3D
$graph = new PieGraph(900,600);

//Tema del gráfico
$theme_class = new VividTheme;
$graph->SetTheme($theme_class);

//Título del gráfico
$graph->title->Set('Porcentaje de marcas por auto');
$graph->title->SetFont(FF_VERDANA, FS_BOLD, 14);
$graph->title->SetColor('#1E90FF');
$graph->title->SetAlign('center');
$graph->title->SetMargin(10);

//Ajustar márgenes del gráfico
$graph->img->SetMargin(40,40,50,50);

//Crear gráfico de torta en 3D
$p1 = new PiePlot3D($data);
$graph->Add($p1);

//Ajustar tamaño del gráfico de torta
$p1->SetSize(0.4);  //Puedes ajustar este valor entre 0.3 y 0.5

//Configuración de leyendas
$p1->SetLegends($marca);
$p1->ShowBorder();
$p1->SetColor('black');
$p1->ExplodeSlice(1);

//Posición y tamaño de las leyendas
$graph->legend->SetPos(0.5,0.95,'center','bottom');
$graph->legend->SetFont(FF_FONT1,FS_NORMAL,10);

//Mostrar gráfico
$graph->Stroke();
