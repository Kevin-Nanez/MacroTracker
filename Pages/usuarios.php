<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1 ) {
} else {
  echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = 'update_user.php?id={$id}';</script>";
}
include "../includes/headerAdmin.php";
include "../includes/functions.php";
// obtiene todos los alimentos y los guarda en una variable
$queryUsuarios = getUsuarios();

include "../includes/db.php";




?>




<head>
<title>Usuarios</title>
</head>

  <main>
    <!-- Tabla -->
    <div class="container-diario text-center">
      <div class="table-responsive">
        <h2 class="fw-bold">Usuarios</h2>
        <table class="table table-diario border-0">
          <thead class="thead-dark">
            <tr class="mt-2">
              <th>ID</th>
              <th>Usuario</th>
              <th>Peso</th>
              <th>Altura</th>
              <th>Sexo</th>
              <th>Edad</th>
            </tr>

          </thead>
          <tbody>

          <?php while ($usuario = mysqli_fetch_assoc($queryUsuarios)) { ?>

            <tr class="registrodiario mb-3">
              <td data-title="ID:" class="align-middle"> <?php echo $usuario["id_usuario"];?> </td>
              <td data-title="Usuario: " class="align-middle"><?php echo $usuario["usuario"];?></td>
              <td data-title="Peso: " class="align-middle"><?php echo $usuario["peso"];?> kg</td>
              <td data-title="Altura: " class="align-middle"><?php echo $usuario["altura"];?> cm</td>
              <td data-title="Sexo: " class="align-middle"><?php echo $usuario["sexo"];?></td>
              <td data-title="Edad: " class="align-middle"><?php echo $usuario["edad"];?> Años</td>

              <td class="align-middle">
                <div class="row">
                  <div class="col-sm">
                    <button class="border-0 bg-transparent updateUsuario">
                      <i class="fa-solid fa-pen edit info_usuario mb-4 mb-sm-0" style="color:#292929;"></i>
                    </button>
                  </div>
                  <div class="col-sm">
                    <button class="border-0 bg-transparent borrarUsuario" >
                      <i class="fa-solid fa-trash" style="color:#292929;"></i>
                    </button>
                  </div>
                </div>
              </td>
            </tr>

            <?php };  ?>

          </tbody>
        </table>
      </div>
          <button class="btn mt-4 fs-5 amarillo text-dark addUserAdmin">
            Añadir Usuario
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
  <script src="../js/diario.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
</body>

</html>