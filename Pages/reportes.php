<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1 ) {
} else {
  echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = 'diario.php';</script>";
}


include "../includes/headerAdmin.php";
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
                          <th class="table-dark" >Campo</th>
                          <th class="table-dark ">Valor</th>
                        </tr>
                      </thead>
                <tbody>
                  <tr>
                    <th scope="row">Usuarios registrados</th>
                    <td>10</td>
                  </tr>
                  <tr>
                    <th scope="row">Hombres</th>
                    <td>7</td>
                  </tr>
                  <tr>
                    <th scope="row">Mujeres</th>
                    <td>3</td>
                  </tr>
                  <tr>
                    <th scope="row">Peso medio (kg)</th>
                    <td>68</td>
                  </tr>
                  <tr>
                    <th scope="row">Altura media (cm)</th>
                    <td>174</td>
                  </tr>
                  <tr>
                    <th scope="row">Objetivo medio</th>
                    <td>2200</td>
                  </tr>
                  <tr>
                    <th scope="row">Edad media</th>
                    <td>22</td>
                  </tr>
                </tbody>
              </table>
          </div>
          
          <div class="half fs-3 fw-bold p-3 text-center text-dark border-2 amarillo">
            <p>Alimentos</p>
            <table class="table table-striped table-hover table-light">
                <thead class="thead">
                    <tr>
                      <th class="table-dark" >Campo</th>
                      <th class="table-dark ">Valor</th>
                    </tr>
                  </thead>
            <tbody>
              <tr>
                <th scope="row">Alimentos</th>
                <td>30</td>
              </tr>
              <tr>
                <th scope="row">Alimentos medidos en gr</th>
                <td>20</td>
              </tr>
              <tr>
                <th scope="row">Alimentos medidos en ml</th>
                <td>10</td>
              </tr>
              <tr>
                <th scope="row">Alimentos medidos en unidades</th>
                <td>4</td>
              </tr>
              <tr>
                <th scope="row">Media de kcal</th>
                <td>174</td>
              </tr>
              <tr>
                <th scope="row">Media de proteínas (gr)</th>
                <td>10</td>
              </tr>
              <tr>
                <th scope="row">Media de grasas (gr)</th>
                <td>22</td>
              </tr>
            </tbody>
          </table>    
      </div>  
     </div>
      
        <div class="full container-fluid fs-3 fw-bold p-3 text-center text-dark border-2 amarillo">
          <p>Solicitdues</p>
          <button type="button" class="btn btn-secondary text-dark fs-6">Alimentos por aprobar</button>
      </div> 

  </main>

  <footer class="text-center text-white"">
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