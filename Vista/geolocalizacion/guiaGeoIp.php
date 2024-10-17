
<?php
    $titulo = "TP 5 - Clases útiles ";
    include_once '../Estructura/header.php';
    $ip_cliente = $_SERVER['REMOTE_ADDR'];
    echo " ip local: " . $_SERVER['REMOTE_ADDR']; 
?>

<body>
    <!-- titulo -->
    <div class="divtitulo">
        <h1><?php echo $titulo;?></h1>
    </div>

    <!-- Cuadro sombreado que rodea todo -->
    <div class="container_auto mt-3 mt-5 p-4 border rounded shadow text-light">

    <!-- Subtitulo en la pagina -->
    <div class="text-center mb-4">

        <!-- Guia explicativa -->
        <h2>Gu&iacute;a y enlaces &uacute;tiles</h2>
        <p>GeoIP2 es una base de datos y una libreria desarrollada por MaxMind que permite identificar la ubicación
            geográfica de una dirección IP. A través de GeoIP2, es posible obtener información como el país, 
            región, ciudad, código postal, latitud, longitud. Esta librería hace que sea fácil realizar 
            búsquedas de direcciones IP en la base de datos y obtener información geográfica. Esta librería 
            permiten que los desarrolladores consulten las bases de datos de GeoIP directamente desde su código</p>
        <p>En la pagina recomiendan descargar la libreria a travez de composer ejecutando el siguiente comando 
            en el directorio raiz: <span style="color: greenyellow;">php composer.phar require geoip2/geoip2:~2.0</span>
        </p>
        </div>

    <div class="mb-2">
        <table>
            <tr>
                <th>PAginas Web con informacion Util</th>
            </tr>
            <tr>
                <td><a href="https://maxmind.github.io/GeoIP2-php/">Manual GeoIp2</a></td>
                <td><a href="https://leafletjs.com/">Manual Leaflet</a></td>
            </tr>
        </table>
    </div>
    </div>
</body>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>
