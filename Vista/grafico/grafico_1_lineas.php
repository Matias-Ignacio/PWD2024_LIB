<?php
//require_once ('../../../Library/vendor/autoload.php');
require_once ('../Librerias/jpGraph/jpgraph.php');
require_once ('../Librerias/jpGraph/jpgraph_line.php');

$datay1 = array(20,15,23,15,80,20,45,10,5,45,60);
$datay2 = array(12,9,12,8,41,15,30,8,48,36,14,25);
$datay3 = array(5,17,32,24,4,2,36,2,9,24,21,23);

// Setup the graph
$graph = new Graph(900,600);
$graph->SetScale("textlin"); //Indica  que el eje X es tipo texto y el eje Y es lineal. 

$theme_class = new UniversalTheme;
                                    // Se aplicaun estilo al grafico. Ajusta el estilo visual general, como colores de fondo, fuentes y detalles graficos
$graph->SetTheme($theme_class);
$graph->img->SetAntiAliasing(false); // desactiva  temporalmente el suavizado de bordes para optimizar el rendimiento grafico al principio
$graph->title->Set('Evolucion de pedidos');
$graph->SetBox(false);

$graph->img->SetAntiAliasing(); //Se habilita el suavizado para mejorar la calidad visual del gráfico.

$graph->yaxis->HideZeroLabel(); // Oculta  la etiqueta  del valor cero en el eje Y
$graph->yaxis->HideLine(false); // Muestra la línea del eje Y
$graph->yaxis->HideTicks(false,false); // Muestra  las marcas de division principales y secundarias en el eje Y

$graph->xgrid->Show(); // Muestra la cuadrícula del eje X
$graph->xgrid->SetLineStyle("solid"); // Establece que las lineas de la cuadricula sean solidas
$graph->xaxis->SetTickLabels(array('Ene','Feb','Mar','Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic')); // Se establece las etiquetas para las marcas del eje X  como  los meses del año.
$graph->xgrid->SetColor('#E3E3E3');// Define el color de la cuadricula como un gris claro

// Create the first line
$p1 = new LinePlot($datay1); // Se crea un gráfico de línea para los datos $datay1
$graph->Add($p1); // El grafico de linea se añade al grafico principal
$p1->SetColor("#6495ED");
$p1->SetLegend('Tienda 1'); // se añade una etiqueta  "Tienda 1" para esta linea

// Create the second line
$p2 = new LinePlot($datay2);
$graph->Add($p2);
$p2->SetColor("#B22222");
$p2->SetLegend('Tienda 2');

// Create the third line
$p3 = new LinePlot($datay3);
$graph->Add($p3);
$p3->SetColor("#FF1493");
$p3->SetLegend('Tienda 3');

$graph->legend->SetFrameWeight(1); // Establece un marco alrededor de la leyenda con una grosor de 1 pixal.

$graph->legend->SetPos(0.5,0.98,'center','bottom'); // coloca la leyenda en el centro en la parte inferior del grafico

// Output line
$graph->Stroke();
?>