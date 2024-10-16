
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
        <p>JpGraph es una librería PHP para crear gr&aacute;ficas din&aacute;micas con PHP</p>
        <p>Esta librer&iacute;a existe hace años, hay varias opciones con distinto mantenimiento, pero en general est&aacute; bastante deperado.</p>
        <p>Se puede descargar desde la <a href="https://jpgraph.net/">p&aacute;gina</a> o instalar con composer</p> <p>Usamos mitoteam/jpgraph para el ejemplo. Soporta multitud de funcionalidades por lo que se puede encontrar casi cualquier soluci&oacute;n en cuanto a gr&aacute;ficos que se necesite.</p>
        <p>Tiene configuraciones por defecto que facilita llegar a un resultado r&aacute;pidamente.</p>
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
  </div>
</body>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>
