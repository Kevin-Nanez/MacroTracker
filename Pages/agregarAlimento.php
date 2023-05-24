<?php
session_start();

if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 2) {
  include "../includes/headerLogueado.php";
} else if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1) {
  header('Location: reportes.php');
} else {
  echo "<script>alert('Inicie Sesión para acceder al diario'); window.location.href = 'login.php';</script>";
}
include "../includes/db.php";
$numcomida= $_GET['numcomida'];
?>

<title>Añadir Alimento</title>

  <main>
    <!-- Buscador -->
    <div>
      <form class="search-container">
        <button type="submit"><i class="fa fa-search""></i></button>
        <input class="busqueda fw-700" type="text" placeholder="Buscar..." ">
      </form>
    </div>

    <!-- Alimentos -->
    <div class="container-add">
      <div class="row justify-content-center d-flex align-items-center">
        <div class="col-sm fs-4">
          <p class="fw-semibold cursor- mt-3">Huevo entero</p>
        </div>
        <div class="espacioadd col-sm unidades fs-4" id="espacioadd">
          <input type="number">Unidades
        </div>
        <div class=" col-sm fs-4">
          <div class="row">
            <div class="col-sm">
              <p>P: 40g</p>
              <p>C: 2g</p>
            </div>
            <div class="col-sm">
              <p>G: 4g</p>
              <p>200kcal</p>
            </div>
          </div>
        </div>
        <div class="espacioadd col-sm fs-4">
          <button class="btn btn-custom text-dark amarillo">Añadir +</button>
        </div>
      </div>
    </div>
    

    


    <div class="col-sm text-center mb-5">
      <button class="btn mt-4 fs-5 amarillo text-dark crearAlimento">
        Crear Alimento
      </button>
    </div>
  </main>

  <footer class="text-center text-white"">
    <!-- Grid container -->
    <div class="container p-4">
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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
<script src="../js/script.js"></script>

</body>

</html>