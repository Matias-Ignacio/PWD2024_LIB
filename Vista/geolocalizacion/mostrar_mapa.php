<?php
$titulo = "TP 5 - Enviar Geolocalización";
include_once '../Estructura/header.php';
require_once '../../vendor/autoload.php'; 

use GeoIp2\Database\Reader;
//Crea el objeto Reader, reutilizándolo para las búsquedas
$cityDbReader = new Reader('../../vendor/GeoLite2-City/GeoLite2-City.mmdb'); 
$datos= data_submitted();
//Obtengo la IP
$ip = $datos['ip'];
//Realiza la consulta a la base de datos para obtener la información de geolocalización
$record = $cityDbReader->city($ip);

//Obtengo latitud y longitud
$latitud = $record->location->latitude;
$longitud = $record->location->longitude;
?>

<div class="divtitulo">
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>
<head>
    <!-- CDN de la libreria openstreetmap -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
</head>
<!-- Tabla -->
<table class="table table-hover " style="background-color: #ffffff;">
    <thead>
        <tr class = 'mb-4'>
            <th>País</th>
            <th>Cdigo Postal</th>
            <th>Ciudad</th>
            <th>Latitud</th>
            <th>Longitud</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        echo '<tr><td>'. $record->country->name . "\n".'</td>';         // Nombre pais
        echo '<td>' . $record->postal->code . "\n".'</td>';             // Código postal
        echo '<td>' . $record->city->name . "\n".'</td>';               // Nombre de la ciudad
        echo '<td>' . $record->location->latitude . "\n".'</td>';       // Latitud
        echo '<td>' . $record->location->longitude . "\n".'</tr></td>'; // Longitud
        ?>
    </tbody>
</table>

<body>
    <div id="map"></div>
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn btn-primary mt-5" onclick="history.back();">Atr&aacute;s</button>
    </div>

        <!-- CDN de la libreria openstreetmap -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var latitud =  <?php echo $latitud; ?>;
        var longitud =  <?php echo $longitud; ?>;

        //Crear el mapa centrado en las coordenadas
        const map = L.map('map').setView([latitud, longitud], 13);
        //Usa Leaflet para cargar un mapa de OpenStreetMap y centrarlo en las 
        //coordenadas obtenidas. Tambien añade un marcador en la ubicación calculada
        //Cargar el mapa base desde OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        //Agrega un marcador en la ubicación
        L.marker([latitud, longitud]).addTo(map)
            .bindPopup('Ubicación aproximada basada en la IP.')
            .openPopup();
        
        //Al momento de dar click muestra la latitud y longitud donde le des click
        map.on('click', onMapClick)
        function onMapClick(e) {
            alert("Posición: " + e.latlng)
        }
    </script>
</body>
<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>




<!-- **************************************************************************** -->
<!-- **************************************************************************** -->

<?php
//----------------- CODIGO QUE SAQUE DEL REPOSITORIO -------------------
// use GeoIp2\Database\Reader;

// // Crea el objeto Reader, reutilizándolo para las búsquedas
// $cityDbReader = new Reader('../../vendor/GeoLite2-City/GeoLite2-City.mmdb'); // Actualiza la ruta según donde hayas guardado la base de datos

// // IP de prueba (puedes cambiarla por la IP que quieras)
// // * ip de prueba: 128.101.101.101
// $ip = '128.101.101.101';

// // Realiza la consulta a la base de datos para obtener la información de geolocalización
// $record = $cityDbReader->city($ip);

// // Imprimir información de geolocalización
// print($record->country->isoCode . "\n"); // Código ISO del país, e.g. 'US'
// print($record->country->name . "\n"); // Nombre del país, e.g. 'United States'
// // print(isset($record->country->names['zh-CN']) ? $record->country->names['zh-CN'] . "\n" : "No disponible\n"); // Nombre en chino, si existe

// print($record->mostSpecificSubdivision->name . "\n"); // Nombre de la subdivisión, e.g. 'Minnesota'
// print($record->mostSpecificSubdivision->isoCode . "\n"); // Código ISO de la subdivisión, e.g. 'MN'

// print($record->city->name . "\n"); // Nombre de la ciudad, e.g. 'Minneapolis'

// print($record->postal->code . "\n"); // Código postal, e.g. '55455'

// print($record->location->latitude . "\n"); // Latitud, e.g. 44.9733
// print($record->location->longitude . "\n"); // Longitud, e.g. -93.2323

// print($record->traits->network . "\n"); // Información de la red, e.g. '128.101.101.101/32'




// ***********************************************************************************************
// ***********************************************************************************************


//---------- OTRA FORMA MAS RESUMIDA PARA MOSTRAR LOS DATOS -------------------
// use GeoIp2\Database\Reader;

// try {
//     // Ruta a la base de datos GeoLite2 descargada
//     $reader = new Reader('../../vendor/GeoLite2-City.mmdb'); // Asegúrate de que esta ruta es correcta

//     // IP de prueba (puedes cambiarla por la IP que quieras)
//     $ip = '128.101.101.101';

//     // Haciendo una consulta a la base de datos para obtener la información de geolocalización
//     $record = $reader->city($ip);

//     // Mostrando los resultados
//     echo "País: " . $record->country->name . "\n";
//     echo "Ciudad: " . $record->city->name . "\n";
//     echo "Latitud: " . $record->location->latitude . "\n";
//     echo "Longitud: " . $record->location->longitude . "\n";
    
// } catch (\Exception $e) {
//     // Manejo de errores si ocurre alguna excepción
//     echo 'Error: ' . $e->getMessage();
// }