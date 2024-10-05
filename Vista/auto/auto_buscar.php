<?php
    $titulo = "TP 4 - Buscar Auto"; //Titulo en la pestania
    include_once '../Estructura/header.php';

    $objAbmAuto = new AbmAuto();

    $listaAuto = $objAbmAuto->buscar(null);
?>	

<!-- titulo -->
<div class="divtitulo">
    <h1><?php echo $titulo;?></h1>
</div>


<!-- Cuadro sombreado que rodea todo -->
<div class="container mt-3 mt-5 p-4 rounded shadow">

    <!-- Titulo en la pagina -->
    <h3 class="text-center text-light mb-4">Buscar un auto</h3>

    <!-- Contenedor de formulario -->
    <div class="container">
        <div class="row">

            <!-- Formulario -->
            <form action="auto_accion_buscar.php" method="post" id="formAutoBuscar" name="formAutoBuscar" class="row g-3 mt-3 needs-validation" novalidate>

                <!-- Patente a buscar -->
                <div class="mb-3 form-floating text-primary mb-4">
                    <input type="text" class="form-control" id="Patente" name="Patente" placeholder="AAA 123   ó   AA 456 AA" pattern="^\s*([A-Za-z]{2} \d{3} [A-Za-z]{2}|[A-Za-z]{3} \d{3})\s*$" required>
                    <label for="patente" class="form-label">Ingrese la patente a buscar - Formato permitidos AAA 123   ó   AA 456 AA</label>

                    <!-- Mensajes aprobado y error -->
                    <div class="valid-feedback">Ok!</div>
                    <div class="invalid-feedback">S&oacute;lo se permiten patentes con el formato especificado</div>
                </div>

                <!-- Boton enviar -->
                <div class="col-md-4">
                    <button class="btn btn-primary" type="submit">Buscar</button>
                    <!-- Boton atras -->
                    <button class="btn btn-info" onclick="history.back();">Atr&aacute;s</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- BOOTSTRAP con las validaciones de los campos -->
<script type="text/javascript" src="../Js/bootstrap-validation.js"></script>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>