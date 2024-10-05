<?php
    $titulo = "TP 4 - Lista Personas"; //Titulo en la pestania
    include_once '../Estructura/header.php';
    $objAbmPersona = new AbmPersona();

    $listaPersona = $objAbmPersona->buscar(null);
?>	

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>


<!-- Cuadro sombreado que rodea todo -->
<div class="container_persona mt-5 p-4 border rounded shadow text-libht">
    <!-- Titulo en la pagina -->
    <h3 class="text-center mb-4">Lista de personas</h3>
    <!-- Tabla -->
    <table class="table table-hover table-striped">
        <thead>
            <tr class="text-light mb-4">
                <th style="width:200px;">Apellido</th>
                <th style="width:200px;">Nombre</th>
                <th style="width:200px;">Autos</th>
            </tr>
        </thead>
        <tbody>
            <?php	
                if(count($listaPersona) > 0)
                {
                    foreach ($listaPersona as $objPersona)
                    {
                        echo '<tr><td style="width:200px;">'.$objPersona->getApellido().'</td>';
                        echo '<td style="width:200px;">'.$objPersona->getNombre().'</td>';
                        echo '<td><a href="../auto/autos_persona.php?NroDni='.$objPersona->getNroDni().'" class="btn btn-color btn-sm" role="button">Ver Autos</a></td></tr>';
                    }
                }
            ?>
        </tbody>
    </table>

    <!-- Boton atras -->
    <div class="col-md-4">
        <button class="btn btn-info" onclick="history.back();">Atr&aacute;s</button>
        <a href="persona_index.php" class="btn btn-primary" role="button">Principal</a>
    </div>
</div>
<!-- BOOTSTRAP con las validaciones de los campos -->
<script type="text/javascript" src="../Js/bootstrap-validation.js"></script>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>