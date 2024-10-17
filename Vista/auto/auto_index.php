<?php
    $titulo = "TP 4 - BD Autos"; //Titulo en la pestania
    include_once '../Estructura/header.php';

    $objAbmAuto = new AbmAuto();
    $listaAuto = $objAbmAuto->buscar(null);

    // Si no llegan datos del data_submited    
    $datos = data_submitted();
    if(!empty($datos))
    {
      if($datos['Patente'] == 'null'){$datos['Patente'] = "";}
      $listaAuto= $objAbmAuto->buscarPorPatente($datos['Patente']);  //../Accion/persona_accion_buscar.php
    }

?>	

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

<!-- Cuadro sombreado que rodea todo -->
<div class="container_auto mt-3 mt-5 p-4 border rounded shadow text-light">

  <!-- Subtitulo en la pagina -->
  <div class="text-center mb-4">
    <h2>Listado de autos</h2>
    <p>Listado de los autos incluidos en la base de datos</p>
  </div>

  <div class="mb-2">
    <form action="auto_index.php" method="post" class="container mt-5 p-4 border rounded shadow" novalidate>
        <label for="buscar" class="form-label fw-bold">Buscar por Patente:</label>
        <input name="Patente" id="Patente" type="text" pattern="[A-z0-9]" >
        <input type="submit" name="buscar" id="buscar" class="btn btn-info btn-sm" role="button" value="Buscar">
        <div class="text-important"><i class="bi bi-info-circle-fill"></i> Buscar en vacio para refrescar</div>
    </form>
  </div> 

  <table class="table table-hover table-striped ">
    <thead>
      <tr class="text-light mb-4">
        <th>Patente</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>DNI Propietario</th>
        <th class="text-center">Acciones</th>
      </tr>
    </thead>

    <tbody>
      <?php	
        if(count($listaAuto) > 0)
        {
            foreach ($listaAuto as $objAuto)
            { 
                echo '<tr><td class="uppercase">'.$objAuto->getPatente().'</td>';
                echo '<td>'.$objAuto->getMarca().'</td>';
                echo '<td>'.$objAuto->getModelo().'</td>';
                echo '<td>'.$objAuto->getObjDuenio()->getNroDni().'</td>';
                echo '<td class="text-center"><a href="auto_editar.php?Patente='.$objAuto->getPatente().'" class="btn btn-color btn-sm" role="button"><i class="bi bi-pencil"></i></a>  ';
                echo '<a href="auto_accion.php?accion=borrar&Patente='.$objAuto->getPatente().'" class="btn btn-outline-danger btn-sm" role="button"><i class="bi bi-trash3-fill"></i></a>  '; 
                echo '<a href="auto_cambio_duenio.php?Patente='.$objAuto->getPatente().'" class="btn btn-outline-success btn-sm" role="button">Cambio</a>  '; 
                echo '<a href="autos_persona.php?NroDni='.$objAuto->getObjDuenio()->getNroDni().'" class="btn btn-outline-dark btn-sm" role="button">Ver Dueño</a></td></tr>';
              }
        }
      ?>
    </tbody>
  </table>

  <!-- Boton Agregar nuevo auto -->
  <div class="container mt-3">
    <a href="auto_nuevo.php" class="btn btn-primary" role="button">Agregar nuevo auto</a>
    <a href="../persona/persona_index.php" class="btn btn-primary" role="button">Ver Listado de Personas</a>
  </div>
</div>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>
