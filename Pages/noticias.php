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
<title>Noticias</title>
</head>


  <main class="container contenedorGrisOsc mt-5 mb-5 ">
    <div class="cards container pt-3 pe-0">
      <div class="container ">
        <div class="row p-2">
          <h1 class="text-white text-center pb-1">Noticias</h1>

          <div class="container-fluid bg-light col-md-5 col-lg-6 col-xl-8 col-12 rounded-7">
            <h5 class="text-dark mt-2">
              Noticia 1
            </h5>

            <p class="text-justify p-1 text-dark">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis labore incidunt dolorem unde a fuga
              ducimus nemo id ut minima sequi accusantium, aspernatur facilis quasi eaque fugit similique temporibus et?
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Expedita perspiciatis repudiandae dignissimos.
              Neque provident expedita reprehenderit dolor veritatis, placeat qui nulla nisi quibusdam sed reiciendis
              beatae rem, explicabo ex nesciunt.
            </p>
          </div>
          <div
            class="container bg-light p-0 col-md-6 col-lg-5 col-12 col-xl-3 d-flex align-items-center justify-content-center">
            <div>
              <img class="img-fluid paddingsmall" src="../Assets/img/index/calorias.jpg"
                alt="frutas y verduras con contenido calorico">
            </div>
          </div>
        </div>
        <!-- fin row 1 -->
        <div class="row p-2 rowreverse mt-3 mb-3 ">
          <div
            class="container  bg-light p-0 col-md-6 col-lg-5 col-12 col-xl-3 d-flex align-items-center justify-content-center">
            <div>
              <img class="img-fluid paddingsmall" src="../Assets/img/index/calorias.jpg"
                alt="frutas y verduras con contenido calorico">
            </div>
          </div>
          <div class="container-fluid bg-light col-md-5 col-lg-6 col-xl-8 col-12 rounded-7">
            <h5 class="text-dark mt-2">
              Noticia 2
            </h5>

            <p class="text-justify p-1 text-dark">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis labore incidunt dolorem unde a fuga
              ducimus nemo id ut minima sequi accusantium, aspernatur facilis quasi eaque fugit similique temporibus et?
              Lorem ipsum dolor sit amet consectetur, adipisicing elit. Libero corporis beatae architecto est delectus
              quae amet ad sed quos, doloribus natus atque, maxime fugit impedit neque nesciunt. Omnis, mollitia alias.
            </p>
          </div>
        </div>

        <!-- fin row 2 -->
        <div class="row p-2">
          <div class="container-fluid bg-light col-md-5 col-lg-6 col-xl-8 col-12 rounded-7">
            <h5 class="text-dark mt-2">
              Noticia 3
            </h5>

            <p class="text-justify p-1 text-dark">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab, impedit. Alias earum porro autem maxime
              illum. Sunt deserunt, libero quo veritatis, modi dicta aperiam recusandae itaque consequuntur nemo aut
              tempore. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Repellat dolorem animi harum a nobis
              nulla doloremque maxime error libero! Consequuntur eos dolor ipsam inventore facilis a, officia officiis
              nisi reiciendis?
            </p>
          </div>
          <div
            class="container bg-light p-0 col-md-6 col-lg-5 col-12 col-xl-3 d-flex align-items-center justify-content-center">
            <div>
              <img class="img-fluid paddingsmall" src="../Assets/img/index/avenaModificada.jpg"
                alt="frutas y verduras con contenido calorico">
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
            <iframe class="shadow-1-strong rounded"  src="https://www.youtube.com/embed/-IBWc0NKsf0" title="LAS CALORÍAS Y SU PAPEL EN LA GANANCIA DE MÚSCULO / PÉRDIDA DE GRASA" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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