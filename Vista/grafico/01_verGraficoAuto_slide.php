<?php 
$titulo = "TP 5 - Ver Grafico de autos"; // Título en la pestaña
include_once '../Estructura/header.php';
?>
<style>
    * {box-sizing:border-box}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Hide the images by default */
.mySlides {
  display: none;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  margin-top: -22px;
  padding: 16px;
  color: blue;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: black;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 10s;
}

@keyframes fade {
  from {opacity: .9}
  to {opacity: 1}
}
</style>
<!-- titulo -->
<div >
    <h1 class='text-center mb-4 text-white'><?php echo $titulo;?></h1>
</div>

<!-- Slideshow container -->
<div class="slideshow-container">

  <!-- Full-width images with number and caption text -->
  <div class="mySlides fade">
    <div class="numbertext">1 / 5</div>
    <!-- GRAFICO TORTA - AUTOS-->
    <img src="graficarAutoPorMarca.php" style="width:100%" alt="">
    <div class="text">GRAFICO TORTA - AUTOS</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">2 / 5</div>
    <!-- GRAFICO TORTA- PERSONAS-->
    <img src="graficarPersonaAuto.php" style="width:100%" alt="">
    <div class="text">GRAFICO TORTA- PERSONAS</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">3 / 5</div>
    <!-- GRAFICO TORTA 3D-->
    <img src="graficoAuto3d.php" style="width:100%" alt="Grafico Auto">
    <div class="text">GRAFICO TORTA 3D</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">4 / 5</div>
    <!-- GRAFICO BARRAS-->
    <img src="graficarMarcaPorCantPersonas.php" style="width:100%" alt="grafico_de_radar">
    <div class="text">GRAFICO BARRAS</div>
  </div>

  <div class="mySlides fade">
    <div class="numbertext">5 / 5</div>
    <!-- GRAFICO  RADAR-->
    <img src="graficarAutoPorMarca_radar.php" style="width:100%" alt="">
    <div class="text">GRAFICO  RADAR</div>
  </div>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
  <a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span>
  <span class="dot" onclick="currentSlide(2)"></span>
  <span class="dot" onclick="currentSlide(3)"></span>
  <span class="dot" onclick="currentSlide(4)"></span>
  <span class="dot" onclick="currentSlide(5)"></span>
</div>

<script>
    let slideIndex = 1;
showSlide(slideIndex);
showSlides();

// Next/previous controls
function plusSlides(n) {
  showSlide(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlide(slideIndex = n);
}

function showSlide(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
}






function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}
  slides[slideIndex-1].style.display = "block";
  setTimeout(showSlides, 10000); // Change image every 2 seconds
}
</script>

<!-- Footer -->
<?php include_once '../Estructura/footer.php'; ?>