<?php
$titulo = "TP 5 - Ver Grafico de autos"; // Título en la pestaña
require_once "../../configuracion.php";
require_once ('../Librerias/jpGraph/jpgraph.php');
require_once ('../Librerias/jpGraph/jpgraph_pie.php'); //La librería para gráficos de torta

// Extraer los datos del controlador
$marcas = array();
$cantidades = array();
$objAbmAuto = new AbmAuto();

// Obtener la cantidad de autos por marca desde AbmAuto
$datosAutos = $objAbmAuto->obtenerCantidadAutosPorMarca();

// Verificar si se obtuvieron datos correctamente
if ($datosAutos !== false) {
    foreach ($datosAutos as $dato) {
        $marcas[] = $dato['Marca'];        // Nombre de la marca
        $cantidades[] = $dato['cantidad']; // Cantidad de autos
    }
    
    // Configurar el gráfico
    $graph = new PieGraph(900, 600); // Cambiar a PieGraph para gráfico circular
    $graph->SetShadow();

    //Titulo del grafico
    $graph->title->Set('Cantidad de Autos por Marca');

    //Formato del titulo del grafico
    $graph->title->SetFont(FF_VERDANA, FS_BOLD, 14);  //Fuente Verdana, negrita, tamaño 14
    $graph->title->SetColor('#1E90FF');  //Color azul (hexadecimal)
    $graph->title->SetAlign('center');   //Alineación al centro
    $graph->title->SetMargin(15);        //Margen entre el título y el gráfico

    //Crear el gráfico de torta
    $p1 = new PiePlot($cantidades);
    $p1->SetLegends($marcas); // Asignar leyenda con las marcas
    $p1->SetSliceColors(array('lightblue', 'blue', 'green', 'orange', 'red', 'yellow')); // Colores para las secciones

    $graph->Add($p1);

    //Mostrar el gráfico
    $graph->Stroke();
} else {
    echo "Error al obtener los datos de los autos por marca.";
}
?>
