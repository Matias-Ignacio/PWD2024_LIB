<?php 
    $titulo = "Gráfico 3 - Cantidad de personas que tienen cierta marca de auto"; // Título en la pestaña
    include_once '../Estructura/header.php';
    // require_once ('../Librerias/jpGraph/jpgraph.php');
    // require_once ('../Librerias/jpGraph/jpgraph_bar.php');
?>

<!-- titulo -->
<div>
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>

<!-- Grafico -->
<div  class="text-center">  
    <img src="03_graficarMarcaPorCantPersonas.php" alt="grafico_de_radar">
</div>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>