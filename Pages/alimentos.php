
<?php
session_start();
include "../includes/functions.php";
$queryAlimentos = getAlimentos();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 2 ) {
  include "../includes/headerLogueado.php";
} else if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1 ){
  include "../includes/headerAdmin.php";
} else{
  include "../includes/headerNoLogueado.php";
}
?>
<head>
<title>Alimentos</title>
</head>

<main>
  <!-- Tabla -->
  <div class="container-diario text-center">
    <div class="table-responsive">
      <h2 class="fw-bold">Alimentos</h2>
      <table class="table table-diario border-0">
        <thead class="thead-dark">
          <tr class="mt-2">
            <th>ID</th>
            <th>Alimento</th>
            <th>Macronutrientes</th>

          </tr>
        </thead>
        <tbody>

          <?php while ($alimento = mysqli_fetch_assoc($queryAlimentos)) { ?>

            <tr class="registrodiario mt-3">
              <td data-title="iDAlimento:" class="align-middle cursor-pointer info_alimento"> <?php echo $alimento["id_alimento"];   ?>  </td>
              <td data-title="Cantidad: " class="align-middle"><?php echo $alimento["alimento"];   ?></td>
              <td data-title="Información:" class="align-middle">
                <div class="row">
                  <div class="col-sm text-truncate">
                    <p>P: <?php echo $alimento["proteinas"];   ?>g</p>
                    <p>C: <?php echo $alimento["carbohidratos"];   ?>g</p>
                  </div>
                  <div class="col-sm text-truncate">
                    <p>G: <?php echo $alimento["grasas"];   ?>g</p>
                    <p><?php echo $alimento["calorias"];   ?> kcal</p>
                  </div>
                </div>
              </td>
              <td class="align-middle">
                <div class="row">
                  <div class="col-sm">
                    <button class="border-0 bg-transparent updateAlimentoBD">
                      <i class="fa-solid fa-pen-to-square edit info_alimento mb-4 mb-sm-0" style="color:#292929;"></i>
                    </button>
                  </div>
                  <div class="col-sm">
                    <button class="border-0 bg-transparent borrarAlimentoBD">
                      <i class="fa-solid fa-trash " style="color:#292929;"></i>
                    </button>
                  </div>
                </div>
              </td>
            </tr>

          <?php };  ?>
        </tbody>
      </table>
    </div>
    <button class="btn mt-4 fs-5 amarillo text-dark addFoodAdmin">
      Añadir Alimento
    </button>
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
          <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/P8W_SqjMd9M" title="YouTube video" allowfullscreen></iframe>
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
<script src="../js/diario.js"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
</body>

</html>