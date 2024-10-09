<?php 
$titulo = "TP 5 - Ver Grafico de autos"; // Título en la pestaña
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
    <img src="01_graficarAutoPorMarca.php" alt="">
</div>

<br><br>
<div class="text-center">
    <img src="01_graficoAuto.php" alt="Grafico Auto">
</div>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>