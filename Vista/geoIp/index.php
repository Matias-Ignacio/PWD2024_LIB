
<?php
$titulo = "TP Clases Útiles - Enviar Geolocalización ";
include_once '../Estructura/header.php';
?>

<div class="divtitulo">
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>
<body>
<!-- Formulario que envía la ip -->
    <form id="form" name="form" action="accion.php" method="get" class="container_cine full-height  p-5">
        <div class="form-group text-center">
            <label for="latitud" class='text-center mb-4 text-white'>Direcci&oacute;n IP:</label>
            <input type="text" id="ip" name="ip" class="form-control"><br><br>  
            <div class="valid-feedback d-none" id="correcto">¡Correcto!</div>  
            <div class= "invalid-feedback d-none" id="incorrecto">Ingrese una IP correcta.</div>
            <div>
                <label for="ejmplo">Ejemplos de direcciones IP por ciudad  </label>
                <select name="ejemplo" id="ejemplo">
                    <option value="">Neuqu&eacute;n: 190.93.194.0</option>
                    <option value="">Centenario: 200.59.235.0</option>
                    <option value="">Cipolletti: 186.127.32.0</option>
                    <option value="">Buenos Aires: 190.173.137.223</option>
                    <option value="">Barcelona: 84.88.0.19</option>
                    <option value="">Quito: 181.211.96.101</option>
                </select>
            </div>    
            <br>
            <input type="submit" value="Ver Mapa">
        </div>
    </form>

    <script src="../Js/validacionGeo.js"></script>
</body>
<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>




