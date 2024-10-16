<?php
$titulo = "TP 5 - Ver Grafico de personas"; // Título en la pestaña

require_once "../../configuracion.php";
require_once ('../Librerias/jpGraph/jpgraph.php');
require_once ('../Librerias/jpGraph/jpgraph_bar.php'); //La librería para gráficos de torta

$objAbmPersona = new AbmPersona();
$objAbmAuto = new AbmAuto();
$listaAutos = $objAbmAuto->buscar(null);
$listaPersona = $objAbmPersona->buscar(null);

//Array para almacenar la cantidad de personas por marca
$cantidadPersonasPorMarca = [];

if(count($listaPersona) > 0)
{
    foreach($listaPersona as $persona)
    {
        $i = 0;
        $tieneAuto = false; //Bandera

        while($i < count($listaAutos) && !$tieneAuto)
        {
            if($persona->getNroDni() == $listaAutos[$i]->getObjDuenio()->getNroDni())
            {
                $marca = $listaAutos[$i]->getMarca(); //Obtener la marca del auto
                $tieneAuto = true;

                // Si la marca no está en el array, la agregamos con un contador inicial de 1
                if (!isset($cantidadPersonasPorMarca[$marca]))
                {
                    $cantidadPersonasPorMarca[$marca] = 1;
                }else{
                    // Si ya está en el array, simplemente incrementamos el contador
                    $cantidadPersonasPorMarca[$marca]++;
                }
            }
            $i++;
        }
    }
}

//Ahora que tengo $cantidadPersonasPorMarca, puedo generar el gráfico

//Configurar los datos para el gráfico
$labels = array_keys($cantidadPersonasPorMarca); //Las marcas
$valores = array_values($cantidadPersonasPorMarca); //Las cantidades de personas que tienen autos de esas marcas

//Configurar el gráfico (gráfico de torta o puedes cambiar a barras si prefieres)
$graph = new Graph(900, 600); //Cambiar a PieGraph para gráfico circular

//Escala del gráfico
$graph->SetScale("textlin");

//Titulo del grafico
$graph->title->Set('Cantidad de Personas por Marca de Auto');

//Formato del titulo del grafico
$graph->title->SetFont(FF_VERDANA, FS_BOLD, 14);  //Fuente Verdana, negrita, tamaño 14
$graph->title->SetColor('#1E90FF');  //Color azul (hexadecimal)
$graph->title->SetAlign('center');   //Alineación al centro
$graph->title->SetMargin(15);        //Margen entre el título y el gráfico

//Crear el gráfico de barras
$barplot = new BarPlot($valores);

$barplot->Legend($labels); //Asignar leyendas con las marcas
$barplot->SetFillColor(array('lightblue')); //Color para las barras
$barplot->SetShadow('gray', 3); //Sombra de las barras

//Agregar el gráfico de barras al gráfico principal
$graph->Add($barplot);

//Asignar las etiquetas al eje X
$graph->xaxis->SetTickLabels($labels);

//Mostrar el gráfico
$graph->Stroke();