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
?>

 <?php
  $_SESSION['alimentos']=0;
  $alimentoS=0;

    $sql = "SELECT * FROM comida WHERE id_usuario = {$_SESSION['id_usuario']} AND fecha = '{$_SESSION['fecha']}';";

    $query = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($query)) {

      $num_comida = $row['num_comida'];
      $id_comida = $row['id_comida'];
      $error = $query;

            $sqlComida = "
    SELECT * FROM alimentos_comida 
    INNER JOIN comida ON comida.id_comida = alimentos_comida.id_comida
    INNER JOIN alimento ON alimento.id_alimento = alimentos_comida.id_alimento
    INNER JOIN unidades ON unidades.id_unidades = alimento.id_unidades
    WHERE comida.id_usuario = {$_SESSION['id_usuario']} AND comida.fecha = '{$_SESSION['fecha']}' AND comida.num_comida= {$num_comida};";

           $queryComida = mysqli_query($db, $sqlComida);
            while ($rowComida = mysqli_fetch_assoc($queryComida)) {
              $alimentoS += ($rowComida['cantidad'] * $rowComida['calorias']);
          

  $_SESSION['alimentos'] = $alimentoS;
            };
  };  ?>

<title>Diario</title>
<main>
  <div class="container">
    <div class="d-flex h-500">
      <div class="d-flex col-sm align-items-center justify-content-between ms-5 me-5 position-relative fw-bold rounded-3 mt-3 mb-3 menudiario">
        <div class="row hoy">

          <div class="d-flex flex-nowrap flex-sm-row">
            <div class="col-sm">
              <button class="flecha diaanterior me-sm-0 me-md-3 me-xl-5">
                < </button>
            </div>
            <div class="col-sm">
              <div class="text-center text-md-start">Hoy</div>
            </div>
            <div class="col-sm">
              <button class="flecha diasiguiente ms-sm-0 ms-md-3 ms-xl-5">></button>
            </div>
          </div>


        </div>

        <div class="icono-calendario me-4 cursor-pointer" id="openModal">

          <i class="fa-solid fa-calendar"></i>

        </div>
        <!-- modal  -->

        <div id="modal" class="modal" id="modalCalendario">
          <div class=" modal-dialog modal-dialog-centered " role="document">
            <div class="container contenedorGrisOsc">
              <!-- header del modal  -->
              <div class="modal-header  text-white ">
                <a class="cerrarModal cursor-pointer bg-light btn btn-secondary btn-icon-only position-relative top-0 start-0 mt-3 ms-3 preventD" aria-label="Close">
                  <i class="fas fa-arrow-left"></i>
                </a>
                <div class="container pt-4 text-center">
                  <h5 id="calendarioModalLabel ">Seleccione una fecha</h5>
                </div>
              </div>

              <div class="modal-body ">
                <!-- aqui va el selector de fecha  -->
                <div class="row">
                  <div class="col">
                    <select id="selectMes" class="form-select" aria-label="Seleccione un mes">
                      <option value="" disabled selected>Mes</option>
                      <option value="01">Enero</option>
                      <option value="02">Febrero</option>
                      <option value="03">Marzo</option>
                      <option value="04">Abril</option>
                      <option value="05">Mayo</option>
                      <option value="06">Junio</option>
                      <option value="07">Julio</option>
                      <option value="08">Agosto</option>
                      <option value="09">Septiembre</option>
                      <option value="10">Octubre</option>
                      <option value="11">Noviembre</option>
                      <option value="12">Diciembre</option>
                    </select>
                  </div>
                  <div class="col">
                    <select id="selectAnio" class="form-select" aria-label="Seleccione un año">
                      <option value="" disabled selected>Año</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                      <option value="2026">2026</option>
                      <option value="2027">2027</option>
                      <option value="2028">2028</option>
                      <option value="2029">2029</option>
                      <option value="2030">2030</option>
                    </select>
                  </div>

                  <div class="col">
                    <select id="selectDia" class="form-select" aria-label="Seleccione un día">
                      <option value="" disabled selected>Día</option>
                      <!-- Options for days will be generated dynamically using JavaScript -->
                    </select>
                  </div>

                </div>
                <div class="row">
                  <div class="col-md-12 mt-4 mb-4">
                    <button id="buscarFecha" type="button" class="btn text-dark brodenegro2 btn-block amarillo fw-700 fs-6 rounded-5 cambiarfecha">Ir</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container-cals p-3 text-center">
    <div class="row elemdiario">
      <p class="fs-2">Bienvenido <?php echo $_SESSION['usuario']; ?> </p>
      <p class="fs-2">Fecha: <?php echo $_SESSION['fecha']; ?> </p>
    </div>
    <div class="row">
      <div class="col-sm elemdiario p-3 fs-4">
        <p>Objetivo</p>
        <p>
          <?php
          $sql = "SELECT objetivo FROM usuario WHERE usuario='{$_SESSION['usuario']}' ;";
          $result = mysqli_query($db, $sql);
          $row = mysqli_fetch_assoc($result);
          $objetivoS = $row['objetivo'];
          echo $objetivoS;
          ?>
        </p>
      </div>
      <div class="container col-1 elemdiario p-3 fs-4 d-flex justify-content-center align-items-center">
        <p>-</p>
      </div>
      <div class="col-sm elemdiario p-3 fs-4">
        <p>Alimentos</p>
        <p>
          <?php
          $alimentoS=0;

          echo $_SESSION['alimentos'];
          
          ?>
        </p>
      </div>
      <div class="container col-1 elemdiario p-3 fs-4 d-flex justify-content-center align-items-center">
        <p>=</p>
      </div>
      <div class="col-sm elemdiario p-3 fs-4">
        <p>Restantes</p>
        <p>
          <?php
          $restantes = $objetivoS - $_SESSION['alimentos'];
          echo $restantes;
          ?>
        </p>
      </div>
    </div>
  </div>
  <!-- Tabla -->
  <div class="container-diario text-center">
    <?php

    $sql = "SELECT * FROM comida WHERE id_usuario = {$_SESSION['id_usuario']} AND fecha = '{$_SESSION['fecha']}';";

    $query = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($query)) {

      $num_comida = $row['num_comida'];
      $id_comida = $row['id_comida'];
      $error = $query;
    ?>
      <div class="comida p-2 rounded-7 mt-3">
        <div>
          <h2 class="fs-2 mt-2">Comida <?php echo $num_comida; ?></h2>
        </div>
        <div class="table-responsive">
          <table class="table table-diario border-0">
            <thead class="thead-dark">
              <tr class="mt-2">
                <th>Alimento</th>
                <th>Cantidad</th>
                <th>Información</th>
              </tr>
            </thead>

            <?php
            $sqlComida = "
    SELECT * FROM alimentos_comida 
    INNER JOIN comida ON comida.id_comida = alimentos_comida.id_comida
    INNER JOIN alimento ON alimento.id_alimento = alimentos_comida.id_alimento
    INNER JOIN unidades ON unidades.id_unidades = alimento.id_unidades
    WHERE comida.id_usuario = {$_SESSION['id_usuario']} AND comida.fecha = '{$_SESSION['fecha']}' AND comida.num_comida= {$num_comida};";

            $queryComida = mysqli_query($db, $sqlComida);
            while ($rowComida = mysqli_fetch_assoc($queryComida)) {
            
              $num_comida = $rowComida['num_comida'];
            ?>
              <tbody>
                <tr class="registrodiario mt-3">
                  <td data-title="Alimento:" class="align-middle cursor-pointer info_alimento">
                    <?php
                    echo $rowComida['alimento'];
                    ?>
                  </td>
                  <td data-title="Cantidad:" class="align-middle">
                    <?php

                    switch ($rowComida['id_unidades']) {
                      case 1:
                        echo ($rowComida['cantidad'] * 100) . " g";
                        break;

                      case 3:
                        echo ($rowComida['cantidad'] * 100) . " ml";
                        break;

                      default:
                        echo $rowComida['cantidad'] . " " . $rowComida['descripcion'];
                        break;
                    }
                    ?>
                  </td>
                  <td data-title="Información:" class="align-middle">
                    <div class="row">
                      <div class="col-sm text-truncate">
                        <p>P:
                          <?php
                          echo ($rowComida['cantidad'] * $rowComida['proteinas']);
                          ?>
                          g</p>
                        <p>C:
                          <?php
                          echo ($rowComida['cantidad'] * $rowComida['carbohidratos']);
                          ?>
                          g</p>
                      </div>
                      <div class="col-sm text-truncate">
                        <p>G:
                          <?php
                          echo ($rowComida['cantidad'] * $rowComida['grasas']);
                          ?>
                          g</p>
                        <p>
                          <?php
                          echo ($rowComida['cantidad'] * $rowComida['calorias']);
                          ?>
                          kcal</p>
                         <!-- ojo aqui  -->
                        <p class="d-none"><?php echo $rowComida['id_alimento']; ?></p>
                      </div>
                    </div>
                  </td>
                  <td class="align-middle">
                    <div class="row">
                      <div class="col-sm">
                        <button class="border-0 bg-transparent">
                          <i class="fa-solid fa-pen-to-square edit editarAlimentodeComida mb-4 mb-sm-0" style="color:#292929;"></i>
                        </button>
                      </div>
                      <div class="col-sm">
                        <button class="border-0 bg-transparent">
                        <p class="d-none"><?php echo $rowComida['id_alimentos_comida']; ?></p>
                          <i class="fa-solid fa-trash eliminarAlimentodeComida" style="color:#292929;"></i>
                        </button>
                      </div>
                    </div>
                  </td>
                </tr>
              </tbody>
            <?php };  ?>
          </table>
          <button class="btn mb-3 mt-1 fs-5 amarillo text-dark addAlimentoComida" data-id_comida="<?php echo $id_comida; ?>">
            Añadir Alimento
          </button>
        </div>
      </div>
    <?php };  ?>



    <div class="row ">
      <div class="col-sm">
        <button class="btn mt-4 fs-5 amarillo text-dark nuevaComida">
          Nueva Comida
        </button>
      </div>
      <div class="col-sm">
        <button class="btn mt-4 fs-5 amarillo text-dark crearAlimento">
          Crear Alimento
        </button>
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
    <?php
    $_SESSION['alimentos'] = $alimentoS;
    echo $alimentoS; ?>
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