<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 2) {
  include "../includes/headerLogueado.php";
} else if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1) {
  include "../includes/headerAdmin.php";
} else {
  include "../includes/headerNoLogueado.php";
}
?>

<head>
  <title>Noticias</title>
</head>


<main class="container contenedorGrisOsc mt-5 mb-5 ">
  <div class="cards container pt-3 pe-0">
    <div class="container ">
      <div class="row p-2">
        <h1 class="text-white text-center pb-1">Noticias</h1>

        <div class="container-fluid bg-light col-md-5 col-lg-6 col-xl-8 col-12 rounded-7">
          <h5 class="text-dark mt-2">
            Nuevos hallazgos en la ciencia del entrenamiento
          </h5>

          <p class="text-justify p-1 text-dark">
            ¿Cuándo entreno, por la mañana o por la tarde?. A partir de ahora no volveremos a preguntarnos cuando es más adecuado entrenar en el gimnasio. Un artículo en el Journal of Strength and Conditioning Research han revelado que los hombres aumentan la masa muscular y la fuerza independientemente de si se entrena tanto por la mañana o como por la tarde.
          </p>
          <a target="_blank" class="text-decoration-none" href="https://www.vitonica.com/complementos/nuevos-hallazgos-en-la-ciencia-del-entrenamiento-i">Noticia Completa</a>
        </div>
        <div class="container bg-light p-0 col-md-6 col-lg-5 col-12 col-xl-3 d-flex align-items-center justify-content-center">
          <div>
            <img class="img-fluid paddingsmall" src="../Assets/img/noticias/tiempo.jpg" alt="frutas y verduras con contenido calorico">
          </div>
        </div>
      </div>
      <!-- fin row 1 -->
      <div class="row p-2 rowreverse mt-3 mb-3 ">
        <div class="container  bg-light p-0 col-md-6 col-lg-5 col-12 col-xl-3 d-flex align-items-center justify-content-center">
          <div>
            <img class="img-fluid paddingsmall" src="../Assets/img/noticias/edulcorantes.jpeg" alt="frutas y verduras con contenido calorico">
          </div>
        </div>
        <div class=" pb-1 container-fluid bg-light col-md-5 col-lg-6 col-xl-8 col-12 rounded-7">
          <h5 class="text-dark mt-2">
            El verdadero mensaje de la OMS sobre los edulcorantes
          </h5>

          <p class="text-justify p-1 text-dark">
            La Organización Mundial de la Salud desaconseja en su última guía el consumo de estos productos para adelgazar o reducir el riesgo de enfermedades crónicas. ¿Significa eso que debemos dejar de usarlos?
          </p>
          <p class="text-justify p-1 text-dark">
            Para evitar sus dañinas consecuencias sobre la salud sin renunciar al sabor dulce, buena parte de los consumidores hemos abrazado como si no hubiera un mañana los edulcorantes. Cero azúcares y todo el dulce —o más— que nuestras papilas puedan soportar.
          </p>
          <a class="text-decoration-none pb-3" target="_blank" href="https://elpais.com/gastronomia/el-comidista/2023-05-17/el-verdadero-mensaje-de-la-oms-sobre-los-edulcorantes.html">Noticia Completa</a>
        </div>
      </div>

      <!-- fin row 2 -->
      <div class="row p-2 pb-3">
        <div class="container-fluid bg-light col-md-5 col-lg-6 col-xl-8 col-12 rounded-7">
          <h5 class="text-dark mt-2">
            ¿Qué PASA si comes AGUACATE TODOS los DÍAS? 🤯 (REVELADO)
          </h5>

          <p class="text-justify p-1 text-dark">

            Este video del famoso influencer fitness Aries Terrón explora los beneficios del aguacate y desmiente los mitos sobre su consumo. Se mencionan sus propiedades para combatir la grasa abdominal, regular el azúcar en sangre, reducir el colesterol y proteger el corazón. Además, se destaca su aporte de grasas saludables, vitaminas y minerales. Sin embargo, tambien advierte sobre los riesgos de consumir la semilla de aguacate debido a sus compuestos negativos y falta de estudios en humanos.
          </p>
          <a class="text-decoration-none" target="_blank" href="https://youtu.be/CzxpxcCz1VE">Noticia Completa</a>
        </div>
        <div class="container bg-light p-0 col-md-6 col-lg-5 col-12 col-xl-3 d-flex align-items-center justify-content-center">
          <div>
            <img class="img-fluid paddingsmall" src="../Assets/img/noticias/aguacate.jpg" alt="frutas y verduras con contenido calorico">
          </div>
        </div>
      </div>
      <!-- fin row 3 -->
    </div>
  </div>
</main>


<footer class="text-center text-white"">
    <!-- Grid container -->
    <div class=" container p-4">
  <!-- Section: Iframe -->
  <section>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6">
        <div class="ratio ratio-16x9">
          <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/-IBWc0NKsf0" title="LAS CALORÍAS Y SU PAPEL EN LA GANANCIA DE MÚSCULO / PÉRDIDA DE GRASA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Iframe -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    <h6>Kevin Josefath Nañez de la Rosa</h6>
    <h6>Jorge Luis Picazo Picazo</h6>
    <h6>Daniel Eduardo Mesias Cortina</h6>
    <a class="text-white" target="_blank" href="https://www.uanl.mx/">UANL</a>
  </div>
  <!-- Copyright -->
</footer>

<!-- CDNS -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>

<script src="js/script.js"></script>
</body>

</html>