<?php
    $titulo = "TP 4 - Buscar Persona";
    include_once '../Estructura/header.php';
    $objAbmPersona = new AbmPersona();
    // Si no llegan datos del data_submited    
    $datos = data_submitted();
    if(!empty($datos))
    {
      
      
      $objP= $objAbmPersona -> buscarPersona($datos['NroDni']);
?>	

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>

  <div class="container mt-3">
    <h2>ABM Personas</h2>
    <p>Listado de personas incluidas en la base de datos</p>      
    <div>
    <form action="#" method="post">
          <label for="buscar">Buscar Por DNI:</label>
          <input name="NroDni" id="NroDni" type="text" pattern="[0-9]{6,8}" required onchange="buscador()"/>
          <input type="submit" name="buscar" id="buscar" class="btn btn-info" role="button" value="Buscar">
    </form>
    </div>      
    <table class="table table-hover table-striped">
      <thead>
        <tr>
          <th>D.N.I.</th>
          <th>Apellido</th>
          <th>Nombre</th>
          <th>Fecha Nacimiento</th>
          <th>Teléfono</th>
          <th>Domicilio</th>
          <th colspan="2">Menu</th>
        </tr>
      </thead>
      <tbody>
      <?php	
          if( $objP != null){
              
                  
                  echo '<tr><td>'.$objP->getNroDni().'</td>';
                  echo '<td>'.$objP->getApellido().'</td>';
                  echo '<td>'.$objP->getNombre().'</td>';
                  echo '<td>'.$objP->getFechaNac().'</td>';
                  echo '<td>'.$objP->getTelefono().'</td>';
                  echo '<td>'.$objP->getDomicilio().'</td>';
                  echo '<td><a href="persona_editar.php?NroDni='.$objP->getNroDni().'" class="btn btn-outline-info btn-sm" role="button">editar</a></td>';
                  echo '<td><a href="persona_accion.php?accion=borrar&NroDni='.$objP->getNroDni().'" class="btn btn-outline-danger btn-sm" role="button">borrar</a></td></tr>'; 
              
          }
      ?>
      </tbody>
  </table>
  </div>
  <div class="container mt-3"><a href="persona_nuevo.php" class="btn btn-success" role="button">nuevo</a></div>
<?php	
// Si no llegan datos del data_submited    
}else{
    echo "Acceso restringido";
}
?>
