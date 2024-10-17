<?php
use GeoIp2\Database\Reader;
$titulo = "Comercios cercanos";
//Crea el objeto Reader, reutilizándolo para las búsquedas
include_once("../Estructura/header.php");
require_once '../../vendor/autoload.php'; 
$cityDbReader = new Reader('../../vendor/GeoLite2-City/GeoLite2-City.mmdb'); 
$objTrans = new AbmComercio();
$datos = data_submitted();
$ip = $datos['ip'];
//Realiza la consulta a la base de datos para obtener la información de geolocalización
$record = $cityDbReader->city($ip);

//Obtengo latitud y longitud
$latitud = $record->location->latitude;
$longitud = $record->location->longitude;
$ciudad = $record->city->name;

// Prepara un arreglo con la información de los comercios (latitud, longitud, nombre)
$comerciosJsArray = [];
$listaComercios = $objTrans->buscar(null);
foreach($listaComercios as $comercio){
    if($comercio->getobjCiudad()->getNombre() == $ciudad){
        $comerciosJsArray[] = [
            'latitud' => $comercio->getLatitud(),
            'longitud' => $comercio->getLongitud(),
            'nombre' => $comercio->getNombre()
        ];
    }
}
// Transforma el arreglo en JSON para pasarlo a JavaScript
$comerciosJsArray = json_encode($comerciosJsArray);

?>
<div class="divtitulo">
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>
<head>
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
    <script>
        var latitud =  <?php echo $latitud; ?>;
        var longitud =  <?php echo $longitud; ?>;

        // Lista de comercios con latitud, longitud y nombre desde PHP
        var comercios = <?php echo $comerciosJsArray; ?>;
        
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
        
           // ------ Agregar marcadores para cada comercio ---------
        comercios.forEach(function(comercio) {
        L.marker([comercio.latitud, comercio.longitud]).addTo(map)
            .bindPopup('Comercio: ' + comercio.nombre)
            .openPopup();
        });
        //Al momento de dar click muestra la latitud y longitud donde le des click
        map.on('click', onMapClick)
        function onMapClick(e) {
            alert("Posición: " + e.latlng)
        }
    </script>
</body>
<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>

