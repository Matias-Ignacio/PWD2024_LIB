
<?php
$titulo = "TP 5 Clases utiles ";
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
    <h2>Guia y enlaces utiles</h2>
    <p>JpGraph es una librería PHP para crear gráficas dinámicas con PHP</p>
    <p>Esta librería existe hace años, hay varias opciones con distinto mantenimiento, pero en general está bastante deperado.
        Se puede descargar desde la <a href="https://jpgraph.net/">página</a> o instalar con composer. Usamos mitoteam/jpgraph para el ejemplo.
         Soporta multitud de funcionalidades por lo que se puede encontrar casi cualquier solución en cuanto a gráficos que se necesite.
         Tiene configuraciones por defecto que facilita llegar a un resultado rapidamente.
    </p>
  </div>

  <div class="mb-2">
    <table>
        <tr>
            <th>PAginas Web con informacion Util</th>
        </tr>
        <tr>
            <td><a href="https://jpgraph.net/download/manuals/chunkhtml/index.html">Manual JpGraph</a></td>
        </tr>
        <tr><td><a href="https://jpgraph.net/download/manuals/classref/index.html">Referencia de clases JpGraph</a></td></tr>
    </table>
  </div> 
</body>
<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>
