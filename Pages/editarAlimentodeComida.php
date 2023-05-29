
<?php
session_start();
include "../includes/db.php";
if ($_SESSION['privilegios'] == 2) {
  include "../includes/headerLogueado.php";

  $id = $_GET['id_alimentos_comida'];
  $sql = "SELECT alimentos_comida.*, alimento.*, unidades.*
  FROM alimentos_comida
  INNER JOIN alimento ON alimentos_comida.id_alimento = alimento.id_alimento
  INNER JOIN unidades ON alimento.id_unidades = unidades.id_unidades
  WHERE alimentos_comida.id_alimentos_comida = {$id};";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);


} else {
  echo "<script>alert('Inicie sesión'); window.location.href = 'login.php';</script>";
}


?>

<head>
<title>Editar Alimento</title>
</head>



<div class="container-add">
      <div class="row justify-content-center d-flex align-items-center">
        <div class="col-sm fs-4">
          <p class="fw-semibold cursor- mt-3 nombre-alimento"><?php echo $row["alimento"]; ?></p>
        </div>
        <div class="espacioadd col-sm unidades fs-4" id="espacioadd">
          <input type="number" min="0" class="cantidadalimento"><?php echo $row["descripcion"]; ?>
        </div>
        <div class="col-sm fs-4">
          <div class="row">
            <div class="col-sm">
              <p>P: <?php echo $row["proteinas"]; ?>g</p>
              <p>C: <?php echo $row["carbohidratos"]; ?>g</p>
            </div>
            <div class="col-sm">
              <p>G: <?php echo $row["grasas"]; ?>g</p>
              <p><?php echo $row["calorias"]; ?> kcal</p>
            </div>
          </div>
        </div>
          <div class="d-none">
            <p><?php echo $row["id_alimentos_comida"]; ?></p>
          </div>
        <div class="espacioadd col-sm fs-4">
        <button class="btn btn-custom text-dark amarillo guardar" data-id="<?php echo $alimento["id_alimento"]; ?>">Guardar</button>
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
  <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
<script src="../js/script.js"></script>


</body>

</html>