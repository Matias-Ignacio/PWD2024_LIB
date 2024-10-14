<?php
 use GeoIp2\Database\Reader;

try {
//     // Ruta a la base de datos GeoLite2 descargada

$reader = new Reader('../../vendor/GeoLite2-City.mmdb'); // Asegúrate de que esta ruta es correcta

//     // IP de prueba (puedes cambiarla por la IP que quieras)

$ip = '181.211.96.101';

//     // Haciendo una consulta a la base de datos para obtener la información de geolocalización

   $record = $reader->city($ip);

//     // Mostrando los resultados

echo "País: " . $record->country->name . "\n";

    echo "Ciudad: " . $record->city->name . "\n";

   echo "Latitud: " . $record->location->latitude . "\n";

echo "Longitud: " . $record->location->longitude . "\n";
    
} catch (\Exception $e) {
//     // Manejo de errores si ocurre alguna excepción
     echo 'Error: ' . $e->getMessage();
 }