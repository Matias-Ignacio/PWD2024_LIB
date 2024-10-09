<?php 
$titulo = "TP 5 - Ver Grafico de persona"; // Título en la pestaña
include_once '../Estructura/header.php';

?>
<!-- titulo -->
<div >
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>
<!-- GRAFICO -->
<div class="text-center">  
    <img src="02_graficarPersonaAuto.php" alt="">
</div>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>