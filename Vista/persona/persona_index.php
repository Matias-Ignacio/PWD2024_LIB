<?php
    $titulo = "TP 4 - BD Personas"; //Titulo en la pestania
    include_once '../Estructura/header.php';    
    $objAbmPersona = new AbmPersona();
    $listaPersona = $objAbmPersona->buscar(null);


    // Si no llegan datos del data_submited    
    $datos = data_submitted();
    if(!empty($datos))
    {
      if($datos['NroDni'] == 'null'){$datos['NroDni'] = "";}
      $listaPersona= $objAbmPersona->buscarPorDni($datos['NroDni']);  //../Accion/persona_accion_buscar.php
    }

?>	
<script type="text/javascript" src="../Js/validacionTP4.js"></script>

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

<div class="container_persona mt-5 p-4 border rounded shadow text-light">

  <!-- Subtitulo en la pagina -->
  <div class="text-center mb-4">
    <h2>Listado de personas</h2>
    <p>Listado de los personas incluidas en la base de datos</p>
  </div>

  <div class="mb-2">
    <form action="persona_index.php" method="post" class="container mt-5 p-4 border rounded shadow" novalidate>
        <label for="buscar" class="form-label fw-bold">Buscar por DNI:</label>
        <input name="NroDni" id="NroDni" type="text" pattern="[0-9]{0,8}" >
        <input type="submit" name="buscar" id="buscar" class="btn btn-info btn-sm" role="button" value="Buscar">
        <div class="text-important"><i class="bi bi-info-circle-fill"></i> Buscar en vacio para refrescar</div>
    </form>
  </div>  
  

  <table class="table table-hover table-striped ">
    <thead>
      <tr class="text-light mb-4">
        <th>D.N.I.</th>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Fecha Nacimiento</th>
        <th>Teléfono</th>
        <th>Domicilio</th>
        <th class="text-center">Acciones</th>
      </tr>
    </thead>
    <tbody>
    <?php	
        if( count($listaPersona) > 0){
            foreach ($listaPersona as $objPersona) { 
                
                echo '<tr><td>'.$objPersona->getNroDni().'</td>';
                echo '<td>'.$objPersona->getApellido().'</td>';
                echo '<td>'.$objPersona->getNombre().'</td>';
                echo '<td>'.$objPersona->getFechaNac().'</td>';
                echo '<td>'.$objPersona->getTelefono().'</td>';
                echo '<td>'.$objPersona->getDomicilio().'</td>';
                echo '<td class="text-center"><a href="persona_editar.php?NroDni='.$objPersona->getNroDni().'" class="btn btn-color btn-sm" role="button"><i class="bi bi-pencil"></i></a>  ';
                echo '<a href="persona_accion.php?accion=borrar&NroDni='.$objPersona->getNroDni().'" class="btn btn-outline-danger btn-sm" role="button"><i class="bi bi-trash3-fill"></i></a>   ';
                echo '<a href="../auto/autos_persona.php?NroDni='.$objPersona->getNroDni().'" class="btn btn-outline-dark btn-sm" role="button"><i class="bi bi-car-front"></i></a></td></tr>';
              }
        }
    ?>
    </tbody>
  </table>

  <!-- Boton agregar nueva persona -->
  <div class="container mt-3">
      <a href="persona_nuevo.php" class="btn btn-primary" role="button">Agregar nueva persona</a>
      <a href="../auto/auto_index.php" class="btn btn-primary" role="button">Ver Listado de Autos</a>
  </div>
  <br><br>


  <!-- Graficos -->
  
  <!-- Grafico 1 -->
  <div>
    <img src="../grafico/grafico_1_lineas.php" alt="grafico_de_lineas_2D">
  </div>
  <br><br>

  <!-- Grafico 2 -->
  <div>
    <img src="../grafico/grafico_2_torta_2D.php" alt="grafico_de_torta_2D">
  </div>
  <br><br>
</div>



<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>

