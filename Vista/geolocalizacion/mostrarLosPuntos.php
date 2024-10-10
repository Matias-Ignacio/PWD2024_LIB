<?php
$titulo = "TP 5 - Enviar Geolocalización";
include_once '../Estructura/header.php';
require_once '../../vendor/autoload.php'; 

use GeoIp2\Database\Reader;
// Crea el objeto Reader, reutilizándolo para las búsquedas
$cityDbReader = new Reader('../../vendor/GeoLite2-City/GeoLite2-City.mmdb'); 
$datos= data_submitted();

//Obtengo las IPs ingresadas por el usuario
$ip1 = $datos['ip1'];
$ip2 = $datos['ip2'];

//Obtengo las coordenadas de la primera IP
$record1 = $cityDbReader->city($ip1);
$lat1 = $record1->location->latitude;
$lon1 = $record1->location->longitude;

//Obtengo las coordenadas de la segunda IP
$record2 = $cityDbReader->city($ip2);
$lat2 = $record2->location->latitude;
$lon2 = $record2->location->longitude;

//Función para calcular la distancia entre dos puntos usando la fórmula de Haversine
function calcularDistancia($lat1, $lon1, $lat2, $lon2){
    $radioTierra = 6371; //Radio de la Tierra en kilómetros
    //deg2rad es una función predefinida de PHP que convierte un ángulo en grados a 
    //radianes
    $dLat = deg2rad($lat2 - $lat1);
    $dLon = deg2rad($lon2 - $lon1);
    //Las coordenadas geográficas, latitud y longitud, suelen estar en grados
    
    //Formula de  Haversine
    $a = sin($dLat / 2) * sin($dLat / 2) +
        cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * 
        sin($dLon / 2) * sin($dLon / 2);
    $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
    $distancia = $radioTierra * $c;
    return $distancia; // Distancia en kilómetros
}

//Calcular la distancia entre las dos IPs
$distancia = calcularDistancia($lat1, $lon1, $lat2, $lon2);
?>
<div class="divtitulo">
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<style>
    #map {
        height: 400px;
        width: 100%;
    }
</style>
<table  class="table table-bordered text-center" style="background-color: #ffffff;">
    <thead>
        <tr >
            <th>País</th>
            <th>Cdigo Postal</th>
            <th>Ciudad</th>
            <th>Latitud</th>
            <th>Longitud</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        echo '<tr><td>'. $record1->country->name . "\n".'</td>';         // Nombre pais
        echo '<td>' . $record1->postal->code . "\n".'</td>';             // Código postal
        echo '<td>' . $record1->city->name . "\n".'</td>';               // Nombre de la ciudad
        echo '<td>' . $record1->location->latitude . "\n".'</td>';       // Latitud
        echo '<td>' . $record1->location->longitude . "\n".'</tr></td>'; // Longitud
        echo '<tr><td>'. $record2->country->name . "\n".'</td>';         // Nombre pais - IP2
        echo '<td>' . $record2->postal->code . "\n".'</td>';             // Código postal - IP2
        echo '<td>' . $record2->city->name . "\n".'</td>';               // Nombre de la ciudad - IP2
        echo '<td>' . $record2->location->latitude . "\n".'</td>';       // Latitud - IP2
        echo '<td>' . $record2->location->longitude . "\n".'</tr></td>'; // Longitud - IP2
        ?>
        <tr>
            <td colspan="4">
                La distancia entre las dos ubicaciones es de <strong><?php echo round($distancia, 2); ?> kilómetros</strong>
            </td>
        </tr>
    </tbody>
</table>
<body>
    <h2 class='text-center mb-4 text-white'>Mapa de Geolocalización</h2>
    <div id="map"></div>
    <div class="d-flex justify-content-center align-items-center">
        <button class="btn btn-primary mt-5" onclick="history.back();">Atr&aacute;s</button>
    </div>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        // Coordenadas obtenidas de PHP
        const lat1 = <?php echo $lat1; ?>;
        const lon1 = <?php echo $lon1; ?>;
        const lat2 = <?php echo $lat2; ?>;
        const lon2 = <?php echo $lon2; ?>;

        //Crea el mapa centrado en la primera IP
        const map = L.map('map').setView([lat1, lon1], 4);

        // Carga el mapa base desde OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Añadir marcadores en ambas ubicaciones
        //-------------------- Marcador de la ip1 -----------------------------
        L.marker([lat1, lon1]).addTo(map)
            .bindPopup('IP 1: <?php echo $ip1; ?>')
            .openPopup();

        // ------------------- Marcador de la ip2 ------------------------------
        L.marker([lat2, lon2]).addTo(map)
            .bindPopup('IP 2: <?php echo $ip2; ?>')
            .openPopup();

        //Dibujar una línea entre las dos ubicaciones
        const latlngs = [[lat1, lon1], [lat2, lon2]];
        const polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

        // Ajustar el zoom para mostrar todo el recorrido
        map.fitBounds(polyline.getBounds());
    </script>
</body>
</html>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>