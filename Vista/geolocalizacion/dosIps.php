
<?php
$titulo = "TP 5 - Muestra distancia";
include_once '../Estructura/header.php';
?>
<div class="divtitulo">
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>

<!-- IPs para Probar:
    - 23.235.46.39 (Cloudflare en EE.UU.)
    - 137.82.1.1 (Universidad de Columbia Británica en Canadá)
    - Alemania (Frankfurt): 18.185.0.1 (Amazon AWS)
    - Brasil (São Paulo): 177.71.188.194 (Amazon AWS)
    - Japón (Tokio): 13.112.63.251 (Amazon AWS)
-->

<body>
    <form id="form" name="form" action="mostrarLosPuntos.php" method="get" class="container_cine full-height p-4">
        <div class="form-group text-center">
            <label for="ip1" class="mb-4 text-white">IP 1:</label>
            <input type="text" id="ip1" name="ip1" required><br><br>
        
            <label for="ip2" class=" mb-4 text-white">IP 2:</label>
            <input type="text" id="ip2" name="ip2" required><br><br>

            <input type="submit" value="Calcular Distancia">
        </div>
        
    </form>
</body>
<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>