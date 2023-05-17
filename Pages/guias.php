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
          <p class="fs-5 text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto nemo
            accusantium necessitatibus tempore. Placeat hic atque, velit non voluptatum alias voluptatibus magni aut eos
            optio ipsam nesciunt ex architecto perferendis facere aspernatur inventore! Ea totam consectetur vero fuga
            consequuntur aspernatur ipsam voluptatum omnis fugit, ratione sed dolore eos quod deleniti unde
            reprehenderit temporibus, tenetur, corporis amet impedit ipsa quas? Et, officia harum. Quam nobis unde nemo
            illum, aliquam est cumque voluptates voluptate.</p>
        </div>
        <div class="col-md-12 col-lg-5">
          <img src="../Assets/img/guias/mantenerpeso.jpg" alt="" height="500px" width="450px"
            style="border-radius: 30px;" class="img-fluid">
        </div>
      </div>
    </div>

    <div class="container-infoali mt-5">
      <h2>¿Qué son los Macronutrientes?</h2>
      <div class="row">
        <div class="col-sm-12  col-lg-7">
          <p class="fs-5 text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto nemo
            accusantium necessitatibus tempore. Placeat hic atque, velit non voluptatum alias voluptatibus magni aut eos
            optio ipsam nesciunt ex architecto perferendis facere aspernatur inventore! Ea totam consectetur vero fuga
            consequuntur aspernatur ipsam voluptatum omnis fugit, ratione sed dolore eos quod deleniti unde
            reprehenderit
            temporibus, tenetur, corporis amet impedit ipsa quas? Et, officia harum. Quam nobis unde nemo illum, aliquam
            est cumque voluptates voluptate.</p>
          <p class="fs-5 text-justify">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Architecto nemo
            accusantium necessitatibus tempore. Placeat hic atque, velit non voluptatum alias voluptatibus magni aut eos
            optio ipsam nesciunt ex architecto perferendis facere aspernatur inventore! Ea totam consectetur vero fuga
            consequuntur aspernatur ipsam voluptatum omnis fugit, ratione sed dolore eos quod deleniti unde
            reprehenderit
            temporibus, tenetur, corporis amet impedit ipsa quas? Et, officia harum. Quam nobis unde nemo illum, aliquam
            est cumque voluptates voluptate.</p>
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