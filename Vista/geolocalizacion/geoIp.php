
<?php
$titulo = "TP Clases Útiles - Enviar Geolocalización ";
include_once '../Estructura/header.php';
?>

<div class="divtitulo">
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>
<body>
<!-- Formulario que envía los datos de latitud y longitud -->
    <form id="form" name="form" action="mostrar_mapa.php" method="get" class="container_cine full-height  p-5">
        <div class="form-group text-center">
            <label for="latitud" class='text-center mb-4 text-white'>Direcci&oacute;n IP:</label>
            <input type="text" id="ip" name="ip" class="form-control"><br><br>  
            <div class="valid-feedback d-none" id="correcto">¡Correcto!</div>  
            <div class= "invalid-feedback d-none" id="incorrecto">Ingrese una IP correcta.</div>
            
            <input type="submit" value="Ver Mapa">
        </div>
    </form>


    <script src="../Js/validacionGeo.js"></script>
</body>
<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>




