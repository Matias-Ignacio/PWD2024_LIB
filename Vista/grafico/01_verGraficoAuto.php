<?php 
$titulo = "TP 5 - Ver Grafico de autos"; // Título en la pestaña
include_once '../Estructura/header.php';
?>
<!-- titulo -->
<div >
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>

<!-- GRAFICO TORTA - AUTOS-->
<div  class="text-center">  
    <img src="graficarAutoPorMarca.php" alt="">
</div><br><br>


<!-- GRAFICO TORTA- PERSONAS-->
<div class="text-center">  
    <img src="graficarPersonaAuto.php" alt="">
</div><br><br>


<!-- GRAFICO TORTA 3D-->
<div class="text-center">
    <img src="graficoAuto3d.php" alt="Grafico Auto">
</div><br><br>


<!-- GRAFICO BARRAS-->
<div  class="text-center">  
    <img src="graficarMarcaPorCantPersonas.php" alt="grafico_de_radar">
</div><br><br>


<!-- GRAFICO  RADAR-->
<div  class="text-center">  
    <img src="graficarAutoPorMarca_radar.php" alt="">
</div><br><br>


<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>