
<?php
$titulo = "TP 5 - Enviar Geolocalización ";
include_once '../Estructura/header.php';
?>

<div class="divtitulo">
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>
<body>
<!-- Formulario que envía los datos de latitud y longitud -->
    <form id="form" name="form" action="mostrar_mapa.php" method="get" class="container_cine full-height  p-5">
        <div class="form-group text-center">
            <label for="latitud" class='text-center mb-4 text-white'>Direccion IP:</label>
            <input type="text" id="ip" name="ip" class="form-control"><br><br>    
        
            <label for="latitud" class='text-center mb-4 text-white'>Latitud:</label>
            <input type="text" id="latitud" name="latitud" class="form-control"><br><br>

            <label for="longitud" class='text-center mb-4 text-white'>Longitud:</label>
            <input type="text" id="longitud" name="longitud" class="form-control" ><br><br>

            <input type="submit" value="Ver Mapa">
        </div>
    </form>
</body>
<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>




