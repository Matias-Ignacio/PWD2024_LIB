<?php
// phpinfo();
$titulo = "Gráfico 3 - cantidad de personas que tienen cierta marca de auto"; // Título en la pestaña
// include_once '../Estructura/header.php';
require_once '../../Control/AbmAuto.php';  
require_once '../../Control/AbmPersona.php';
require_once '../../Modelo/Auto.php'; 
require_once '../../Modelo/Persona.php';
require_once '../../Modelo/Conector/BaseDatos.php';
require_once ('../Librerias/jpGraph/jpgraph.php');
require_once ('../Librerias/jpGraph/jpgraph_pie.php'); // La librería para gráficos de torta

$objAbmPersona = new AbmPersona();
$objAbmAuto = new AbmAuto();
$listaAutos = $objAbmAuto->buscar(null);
$listaPersona = $objAbmPersona->buscar(null);

// Array para almacenar la cantidad de personas por marca
$cantidadPersonasPorMarca = [];

// Inicializar el array con las marcas y contadores
foreach ($listaAutos as $auto) {
    $marca = $auto->getMarca(); // Obtén la marca del auto
    $dniDuenio = $auto->getObjDuenio()->getNroDni(); // Obtén el DNI del dueño

    // Si la marca no existe en el array, inicialízala
    if (!isset($cantidadPersonasPorMarca[$marca])) {
        $cantidadPersonasPorMarca[$marca] = [
            'cantidad' => 0,
            'duenos' => [] // Array para almacenar los DNIs de los dueños
        ];
    }

    // Solo contar si el dueño no está ya en la lista de dueños de esa marca
    if (!in_array($dniDuenio, $cantidadPersonasPorMarca[$marca]['duenos'])) {
        $cantidadPersonasPorMarca[$marca]['cantidad'] += 1; // Incrementa la cantidad de dueños
        $cantidadPersonasPorMarca[$marca]['duenos'][] = $dniDuenio; // Agrega el DNI a la lista de dueños
    }
}

// Convertir el array a solo marcas y cantidades
$resultado = [];
foreach ($cantidadPersonasPorMarca as $marca => $datos) {
    $resultado[] = [
        'Marca' => $marca,
        'Cantidad' => $datos['cantidad']
    ];
}

// Ahora $resultado tiene el formato deseado
print_r($resultado);

// Comprobar si el resultado está vacío
if (empty($resultado)) {
    die("No se encontraron datos para generar el gráfico.");
}

// Configurar los datos para el gráfico
$labels = array();
$valores = array();

// Aquí se asume que $resultado es el array que contiene las marcas y cantidades de personas que tienen autos
foreach ($resultado as $dato) {
    $labels[] = $dato['Marca']; // Añadir la marca a las etiquetas
    $valores[] = $dato['Cantidad']; // Añadir la cantidad de dueños a los valores
}

// Configurar el gráfico
$graph = new PieGraph(900, 350); // Cambiar a PieGraph para gráfico circular
$graph->SetShadow();

$graph->title->Set('Cantidad de Personas por Marca de Auto');

// Crear el gráfico de torta
$p1 = new PiePlot($valores);
$p1->SetLegends($labels); // Asignar leyendas con las marcas
$p1->SetSliceColors(array('lightblue', 'orange', 'green', 'red', 'purple', 'yellow')); // Colores para las secciones

$graph->Add($p1);

// Mostrar el gráfico
$graph->Stroke();
?>
