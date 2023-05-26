<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 2 ) {
  include "../includes/headerLogueado.php";
} else if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1 ){
  include "../includes/headerAdmin.php";
} else{
  include "../includes/headerNoLogueado.php";
}
?>
<head>
<title>Guias</title>
</head>

  <main>
    <div class="container-infoali">
      <h2>¿Cómo subir, bajar o mantener mi peso?</h2>
      <div class="row p-3">
        <div class="col-md-12 col-lg-7">
          <h3>¿Cómo bajar de peso?</h2>
          <p class="fs-5 text-justify">
          Para bajar de peso, es necesario crear un déficit de calorías consumiendo menos calorías de las que se queman. Controlar la ingesta diaria de calorías y hacer ejercicio regularmente puede ayudar a lograrlo.
          <p>
          <h3>¿Cómo manetener el peso??</h2>
          <p class="fs-5 text-justify">
          Para mantener el peso, es importante equilibrar la ingesta diaria de calorías con el gasto energético. Mantener una alimentación saludable, hacer ejercicio de forma regular y adoptar hábitos sostenibles son clave.
          <p>
          <h3>¿Cómo subir de peso?</h2>
          <p class="fs-5 text-justify">
          Para subir de peso, se requiere un exceso de calorías consumiendo más de las que se queman. Aumentar la ingesta diaria de calorías de manera saludable con alimentos nutritivos y realizar ejercicios de fuerza puede favorecer el aumento de masa muscular.
          <p>
            
        </div>
        <div class="col-md-12 col-lg-5">
          <img src="../Assets/img/guias/mantenerpeso.jpg" alt="" height="500px" width="450px"
            style="border-radius: 30px;" class="img-fluid">
        </div>
      </div>
    </div>

    <div class="container-infoali mt-5">
      <h2>¿Qué son los Macronutrientes?</h2>
      <div class="row text-justify">
        <div class="col-sm-12  col-lg-7">
          <p class="fs-5 text-justify">Los macronutrientes son nutrientes esenciales que proporcionan energía al cuerpo: carbohidratos, proteínas y grasas. Son necesarios en cantidades significativas para el funcionamiento adecuado del organismo.</p>
          <h3>¿Cómo distribuir los Macronutrientes?</h3>
          <p class="fs-5 text-justify">La distribución de los macronutrientes varía según las necesidades individuales. Se recomienda un equilibrio adecuado, como una proporción moderada de carbohidratos, una ingesta suficiente de proteínas y una cantidad adecuada de grasas saludables.</p>
          <h3>¿Qué pasa cuando tengo deficiencias de alguno?</h3>
          <ul>
            <li><p class="fs-5">Cuando hay deficiencia de carbohidratos, puede causar fatiga, falta de energía y disminución del rendimiento físico.</p></li>
            <li><p class="fs-5">La deficiencia de proteínas puede llevar a la pérdida de masa muscular, debilidad y problemas de recuperación. </p></li>
            <li><p class="fs-5">La deficiencia de grasas puede afectar la absorción de vitaminas liposolubles y provocar problemas hormonales.</p></li>
          </ul>
        </div>
        <div class="col-sm-12 col-lg-5 d-flex align-items-center">
          <div class="row">
            <div class="col-sm-12 container">
              <img src="../Assets/img/guias/macronutrientes1.jpg" alt="" width="auto"
                style="border-radius: 30px; max-height:16rem; margin-bottom: 20px;" class="img-fluid">
            </div>
            <div class="col-sm-12 container  ">
              <img src="../Assets/img/guias/macronutrientes2.jpg" alt="" height="300px" width="auto"
                style="border-radius: 30px; margin-bottom: 20px;" class="img-fluid">
            </div>
          </div>
        </div>
      </div>



    </div>

  </main>

  <footer class="text-center text-white"">
    <!-- Grid container -->
    <div class=" container p-4">
    <!-- Section: Iframe -->
    <section class="">
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
          <div class="ratio ratio-16x9">
            <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/P8W_SqjMd9M"
              title="YouTube video" allowfullscreen></iframe>
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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
  <script src="../js/script.js"></script>
</body>

</html>