<?php
session_start();

if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1) {
  include "../includes/headerAdmin.php";
} else {
  echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = 'diario.php';</script>";
}

include "../includes/db.php";
$id = $_GET['id'];
$sql = "SELECT * FROM alimento WHERE id_alimento='$id';";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);

$alimento = $row['alimento'];
$descripcion = $row['descripcion'];
$proteinas = $row['proteinas'];
$calorias = $row['calorias'];
$carbohidratos = $row['carbohidratos'];
$grasas = $row['grasas'];
$unidades = $row['id_unidades'];

if (isset($_POST["submit"])) {

  $alimento = $_POST["alimento"];
  $descripcion = $_POST["descripcion"];
  $proteinas = $_POST["proteinas"];
  $carbohidratos = $_POST["carbohidratos"];
  $grasas = $_POST["grasas"];
  $calorias = $_POST["calorias"];
  $unidades = $_POST["unidades"];

  if (!empty($alimento) && !empty($descripcion) && !empty($proteinas) && !empty($carbohidratos) && !empty($grasas) && !empty($calorias) && !empty($unidades)) {

    $sql1 = "UPDATE alimento SET alimento = '{$alimento}', descripcion = '{$descripcion}', id_unidades = {$unidades}, calorias = {$calorias}, proteinas = {$proteinas}, grasas = {$grasas}, carbohidratos = {$carbohidratos} WHERE id_alimento = {$id};";

    $result1 = mysqli_query($db, $sql1);
  }
}



?>

<head>
  <title>Modificar Alimento</title>
</head>

<!-- MAIN -->
<main>

  <div class="container contenedorGrisOsc mt-3 mb-3">
    <h1 class="text-light text-center fs-4 fw-bolder mt-3 pt-3">Modificar <?php echo $alimento; ?></h1>
    <form action="#" method="post" class="p-3" id="formularioCrearAlimento" class>
      <div class="main-food-info d-flex flex-wrap justify-content-between p-2">

        <div class="user-input-box d-flex flex-wrap w-50 pe-2">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Alimento</label>
          <input name="alimento" type="text" id="food name" placeholder="" minlength="3" maxlength="35" value="<?php echo $alimento; ?>">
        </div>

        <div class="user-input-box d-flex flex-wrap w-50 ps-2 pe-0">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Kcal</label>
          <input name="calorias" type="number" id="kcal" value="<?php echo $calorias; ?>" min="0">
        </div>

        <div class="user-input-box d-flex flex-wrap w-50 pe-2">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Descripción</label>
          <input name="descripcion" type="text" id="description" placeholder="" minlength="1" maxlength="125" value="<?php echo $descripcion; ?>">
        </div>

        <div class="user-input-box d-flex flex-wrap w-50 ps-2 pe-0">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Proteínas (g)</label>
          <input name="proteinas" type="number" id="protein" value="<?php echo $proteinas; ?>" min="0" step="0.1">
        </div>

        <div class="user-input-box d-flex flex-wrap w-50 pe-2">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Contenido</label>
          <select name="unidades" class="form-select " id="content">
        </div>

        <div class="user-input-box d-flex flex-wrap w-50 ps-2 pe-0">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Grasas (g)</label>
          <input name="grasas" type="number" id="fat" value="<?php echo $grasas; ?>" min="0" step="0.1">
        </div>

        <!--ESTE NADA MÁS ES DE RELLENO PARA QUE NO SE MUEVA EL ORDEN-->
        <div class="user-input-box"></div>


        <div class="user-input-box d-flex flex-wrap w-50 pe-2">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Carbohidratos (g)</label>
          <input name="carbohidratos" type="number" id="carbs" value="<?php echo $carbohidratos; ?>" min="0" step="0.1">
        </div>

        <button name="submit" class=" mt-3 mb-0 btn fs-5 text-dark btn-block amarillo p-3">Guardar</button>

    </form>
  </div>

</main>

<!-- FOOTER -->
<footer class="text-center text-white"">
    <!-- Grid container -->
    <div class=" container p-4">
  <!-- Section: Iframe -->
  <section class="">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6">
        <div class="ratio ratio-16x9">
          <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/4Gc4XGnLa4Y" title="YouTube video" allowfullscreen></iframe>
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