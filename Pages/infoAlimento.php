<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 2 ) {
  include "../includes/headerLogueado.php";
} else if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1 ){
  include "../includes/headerAdmin.php";
} else{
  include "../includes/headerNoLogueado.php";
}
include "../includes/db.php";

$id = $_GET['id'];
$cantidad = $_GET['cantidad'];
$calorias = $_GET['calorias'];
$proteinas = $_GET['proteinas'];
$grasas = $_GET['grasas'];
$carbihidratos = $_GET['carbihidratos'];

$sql = "SELECT * FROM alimento WHERE id_alimento = $id;";

$result = mysqli_query($db,$sql);
$row = mysqli_fetch_assoc($result);
$alimento = $row['alimento'];
$descripcion = $row['descripcion'];

?>

<head>
<title>Info Alimento</title>
</head>
  <main>
    <div class="container-infoali">
      <h3><?php echo $alimento;?></h3>
      <div class="row">
        <div class="col-sm mb-1">
          <p class="fs-3 mt-2 mb-1" id="txtcantidad">Cantidad:</p>
          <p class="fs-4"><?php echo $cantidad;?></p>
        </div>
        <div class="col-sm">
          <p class="fs-3 mt-2 mb-1 pe-sm-4">Macronutrientes:</p>
          <div class="row mb-1">
          <div class="col-sm">
              <p id="proteinas" class="fs-4">kcal: <?php echo $calorias;?></p>
            </div>
            <div class="col-sm">
              <p id="proteinas" class="fs-4">P: <?php echo $proteinas;?>g</p>
            </div>
            <div class="col-sm">
              <p id="carbohidratos" class="fs-4">C: <?php echo $carbihidratos;?>g</p>
            </div>
            <div class="col-sm">
              <p id="grasas" class="fs-4">G: <?php echo $grasas;?>g</p>
            </div>
          </div>
        </div>
      </div>
      <p class="fs-4 text-center"><?php echo $descripcion;?>.</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm text-center">
          <a href="guias.php">
            <div style="position: relative;">
              <img src="../Assets/img/infoalimentos/guíadealimentacion.jpg" alt="Guías" class="imgenlace mx-auto d-block">
              <strong><em><p class="txtenlace" style="color: white;">Guías</p></strong></em>
            </div>
          </a>
        </div>
        <div class="col-sm text-center">
          <a href="noticias.php">
            <div style="position: relative;">
              <img src="../Assets/img/infoalimentos/noticiasalimentacion.jpg" alt="Noticias" class="imgenlace mx-auto d-block">
              <strong><em><p class="txtenlace">Noticias</p></strong></em>
            </div>
          </a>
        </div>
        <div class="col-sm text-center">
          <a href="diario.php">
            <div style="position: relative;">
              <img src="../Assets/img/infoalimentos/diarioalimentacion.jpg" alt="Diario" class="imgenlace mx-auto d-block">
              <strong><em><p class="txtenlace">Diario</p></strong></em>
            </div>
          </a>
        </div>
      </div>
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
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
  <script src="../js/script.js"></script>
</body>

</html>
