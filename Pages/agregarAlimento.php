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
$numcomida = $_GET['numcomida'];

$sql = "SELECT a.*, u.descripcion as unidad_descripcion
FROM alimento a
INNER JOIN unidades u ON a.id_unidades = u.id_unidades;";

$queryAlimentos = mysqli_query($db, $sql);

?>

<head>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.busqueda').on('input', function() {
        var searchText = $(this).val().toLowerCase();
        $('.container-add').each(function() {
          var alimentoNombre = $(this).find('.nombre-alimento').text().toLowerCase();
          if (alimentoNombre.includes(searchText)) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });
    });
  </script>
  <title>Añadir Alimento</title>
</head>


<main>
  <!-- Buscador -->
  <div>
    <form class="search-container">
      <button type="submit"><i class="fa fa-search"></i></button>
      <input class="busqueda fw-700" type="text" placeholder="Buscar...">
    </form>
  </div>

  <?php while ($alimento = mysqli_fetch_assoc($queryAlimentos)) { ?>
    <!-- Alimentos -->
    <div class="container-add">
      <div class="row justify-content-center d-flex align-items-center">
        <div class="col-sm fs-4">
          <p class="fw-semibold cursor- mt-3 nombre-alimento"><?php echo $alimento["alimento"]; ?></p>
        </div>
        <div class="espacioadd col-sm unidades fs-4" id="espacioadd">
          <input type="number" min="0" class="cantidadalimento"><?php echo $alimento["unidad_descripcion"]; ?>
        </div>
        <div class="col-sm fs-4">
          <div class="row">
            <div class="col-sm">
              <p>P: <?php echo $alimento["proteinas"]; ?>g</p>
              <p>C: <?php echo $alimento["carbohidratos"]; ?>g</p>
            </div>
            <div class="col-sm">
              <p>G: <?php echo $alimento["grasas"]; ?>g</p>
              <p><?php echo $alimento["calorias"]; ?> kcal</p>
            </div>
          </div>
        </div>
        <div class="d-none">
          <?php $id_comida = $_GET['id_comida'];?>
          <p class="idalimento"><?php echo $alimento["id_alimento"]; ?></p>
          <p class="id_comida"><?php echo $id_comida; ?></p>
        </div>
        <div class="espacioadd col-sm fs-4">
        <button class="btn btn-custom text-dark amarillo addAlimentoComidacant" data-id="<?php echo $alimento["id_alimento"]; ?>">Añadir +</button>
        </div>
      </div>
    </div>
  <?php }; ?>
    


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