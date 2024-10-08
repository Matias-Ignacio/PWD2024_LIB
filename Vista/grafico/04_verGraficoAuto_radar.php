<?php 
$titulo = "Gráfico 4 - cantidad de autos por marca"; // Título en la pestaña
include_once '../Estructura/header.php';
// require_once ('../Librerias/jpGraph/jpgraph.php');
// require_once ('../Librerias/jpGraph/jpgraph_bar.php');
?>
<!-- titulo -->
<div >
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>
<!-- GRAFICO -->
<div  class="text-center">  
    <img src="04_graficarAutoPorMarca_radar.php" alt="">
</div>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>