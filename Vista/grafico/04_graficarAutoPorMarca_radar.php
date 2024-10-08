<?php
// phpinfo();
$titulo = "Gráfico 4 - cantidad de autos por marca"; // Título en la pestaña
// include_once '../Estructura/header.php';
require_once '../../Control/AbmAuto.php';  
require_once '../../Modelo/Auto.php'; 
require_once '../../Modelo/Persona.php';
require_once '../../Modelo/Conector/BaseDatos.php';

require_once ('../Librerias/jpGraph/jpgraph.php');
require_once ('../Librerias/jpGraph/jpgraph_radar.php'); // La librería para gráficos de radar

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
    
    // Crear el gráfico de radar
    $graph = new RadarGraph(900, 600); // Cambiar a RadarGraph para gráfico de radar
    $graph->SetShadow();
    $graph->title->Set('Cantidad de Autos por Marca');

    // Crear un gráfico radar para las cantidades
    $plot = new RadarPlot($cantidades);
    $plot->SetLegend('Cantidad de Autos'); // Leyenda para el gráfico
    $plot->SetColor('blue'); // Color de la línea
    $plot->SetFill(true); // Rellenar el área
    $plot->SetFillColor('lightblue'); // Color de relleno
    $plot->SetLineWeight(2); // Grosor de la línea

    // Añadir el gráfico radar al gráfico
    $graph->Add($plot);

    // Establecer las etiquetas para las marcas
    $graph->SetTitles($marcas);

    // Mostrar el gráfico
    $graph->Stroke();
} else {
    echo "Error al obtener los datos de los autos por marca.";
}
?>
