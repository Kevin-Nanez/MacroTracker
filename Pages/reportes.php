<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1) {
} else {
  echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = 'diario.php';</script>";
}
include "../includes/headerAdmin.php";

include "../includes/db.php";




?>

<head>
  <title>Reportes</title>
</head>
<main>

  <div class="container d-flex flex-wrap gap-4 w-100 mw-100 pt-0 pb-0 ps-4 pe-4 mt-3">
    <div class="full container-fluid fs-3 fw-bold p-3 text-center text-dark border-2 amarillo">
      <p>Reportes</p>
    </div>

    <div class="columns d-flex justify-content-between gap-5 w-100 ">
      <div class="half fs-3 fw-bold p-3 text-center text-dark border-2 amarillo">
        <p>Usuarios</p>
        <table class="table table-striped table-hover table-light">
          <thead class="thead">
            <tr>
              <th class="table-dark">Campo</th>
              <th class="table-dark ">Valor</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sql = "SELECT COUNT(*) AS total_registros FROM usuario";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
            <tr>
              <th scope="row">Usuarios registrados</th>
              <td><?php
                  echo $row['total_registros'];
                  ?></td>
            </tr>
            <tr>
              <?php
              $sql = "SELECT COUNT(*) AS total_hombres FROM usuario WHERE sexo = 'M'";
              $result = mysqli_query($db,$sql);
              $row = mysqli_fetch_assoc($result);
              ?>
              <th scope="row">Hombres</th>
              <td><?php
                  echo $row['total_hombres'];
                  ?></td>
            </tr>
            <tr>
              <?php
              $sql = "SELECT COUNT(*) AS total_mujeres FROM usuario WHERE sexo = 'F'";
              $result = mysqli_query($db, $sql);
              $row = mysqli_fetch_assoc($result);
              ?>
              <th scope="row">Mujeres</th>
              <td><?php
                  echo $row['total_mujeres'];
                  ?></td>
            </tr>
            <tr>
              <?php 
              mysqli_select_db($db,'macrotracker');
                $sql1 ="SELECT ROUND (AVG(peso),2) AS promedio_peso FROM usuario;" ; 
                $result= mysqli_query($db,$sql1);
                $row = mysqli_fetch_assoc($result);
                ?>
                <th scope="row">Peso medio (kg)</th>
                <td>
                  <?php echo $row['promedio_peso'] ;?>
                </td>
            </tr>
            <tr>
            <?php 
              mysqli_select_db($db,'macrotracker');
                $sql ="SELECT ROUND (AVG(altura),2) AS altura FROM usuario;" ; 
                $result= mysqli_query($db,$sql);
                $row = mysqli_fetch_assoc($result);
                ?>
              <th scope="row">Altura media (cm)</th>
              <td><?php echo $row['altura'] ;?></td>
            </tr>
            <tr>
            <?php 
              mysqli_select_db($db,'macrotracker');
                $sql ="SELECT ROUND (AVG(objetivo),2) AS objetivo FROM usuario;" ; 
                $result= mysqli_query($db,$sql);
                $row = mysqli_fetch_assoc($result);
                ?>
              <th scope="row">Objetivo medio (kcal)</th>
              <td><?php echo $row['objetivo'] ;?></td>
            </tr>
            <tr>
            <?php 
              mysqli_select_db($db,'macrotracker');
                $sql ="SELECT ROUND (AVG(edad),2) AS edad FROM usuario;" ; 
                $result= mysqli_query($db,$sql);
                $row = mysqli_fetch_assoc($result);
                ?>
              <th scope="row">Edad media</th>
              <td><?php echo $row['edad'] ;?></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="half fs-3 fw-bold p-3 text-center text-dark border-2 amarillo">
        <p>Alimentos</p>
        <table class="table table-striped table-hover table-light">
          <thead class="thead">
            <tr>
              <th class="table-dark">Campo</th>
              <th class="table-dark ">Valor</th>
            </tr>
          </thead>
          <tbody>
            <tr>
            <?php
            $sql = "SELECT COUNT(*) AS total_alimentos FROM alimento";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
              <th scope="row">Alimentos</th>
              <td><?php echo $row['total_alimentos']?></td>
            </tr>
            <tr>
            <?php
            $sql = "SELECT COUNT(*) AS alimentosgr FROM alimento WHERE id_unidades = 1";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
              <th scope="row">Alimentos medidos en gr</th>
              <td><?php echo $row['alimentosgr']?></td>
            </tr>
            <tr>
            <?php
            $sql = "SELECT COUNT(*) AS alimentosml FROM alimento WHERE id_unidades = 3";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
              <th scope="row">Alimentos medidos en ml</th>
              <td><?php echo $row['alimentosml']?></td>
            </tr>
            <tr>
            <?php
            $sql = "SELECT COUNT(*) AS alimentosu FROM alimento WHERE id_unidades = 2";
            $result = mysqli_query($db, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>
              <th scope="row">Alimentos medidos en unidades</th>
              <td><?php echo $row['alimentosu']?></td>
            </tr>
            <tr>
            <?php 
              mysqli_select_db($db,'macrotracker');
                $sql ="SELECT ROUND (AVG(calorias),2) AS calorias FROM alimento;" ; 
                $result= mysqli_query($db,$sql);
                $row = mysqli_fetch_assoc($result);
                ?>
              <th scope="row">Media de kcal</th>
              <td><?php echo $row['calorias']?></td>
            </tr>
            <tr>
            <?php 
              mysqli_select_db($db,'macrotracker');
                $sql ="SELECT ROUND (AVG(proteinas),2) AS proteinas FROM alimento;" ; 
                $result= mysqli_query($db,$sql);
                $row = mysqli_fetch_assoc($result);
                ?>
              <th scope="row">Media de proteínas (gr)</th>
              <td><?php echo $row['proteinas']?></td>
            </tr>
            <tr>
            <?php 
              mysqli_select_db($db,'macrotracker');
                $sql ="SELECT ROUND (AVG(grasas),2) AS grasas FROM alimento;" ; 
                $result= mysqli_query($db,$sql);
                $row = mysqli_fetch_assoc($result);
                ?>
              <th scope="row">Media de grasas (gr)</th>
              <td><?php echo $row['grasas']?></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="full container-fluid fs-3 fw-bold p-3 text-center text-dark border-2 amarillo">
      <p>Solicitdues</p>
      <button type="button" class="btn btn-secondary text-dark fs-6 aprobar">Alimentos por aprobar</button>
    </div>

</main>

<footer class="text-center text-white"">
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