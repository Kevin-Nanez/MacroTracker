
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

if (isset($_POST["submit"])) {
  
  $id_usuario= $_SESSION['id_usuario'];
  $alimento = $_POST["alimento"];
  $descripcion = $_POST["descripcion"];
  $proteinas = $_POST["proteinas"];
  $carbos = $_POST["carbos"];
  $grasas = $_POST["grasas"];
  $ckal = $_POST["ckal"];
  $unidades = $_POST["unidades"];

  $sql = "INSERT INTO solicitud_alimento (id_usuario, alimento, descripcion, id_unidades, calorias, proteinas, grasas, carbohidratos)
  VALUES ('{$id_usuario}', '{$alimento}', '{$descripcion}', '{$unidades}', '{$ckal}' , {$proteinas}, {$grasas}, {$carbos})";

    $result = mysqli_query($db, $sql);
    
    if($result){
      echo "<script>alert('Alimento enviado con éxito'); window.location.href = 'diario.php';</script>";
    }
}



?>
<head>
<title>Crear Alimento</title>
</head>

   <!-- MAIN -->
  <main>

    <div class="container contenedorGrisOsc mt-3 mb-3">
        <h1 class="text-light text-center fs-4 fw-bolder mt-3 pt-3">Crear Alimento</h1>
        <form action="crearAlimento.php" method="post" class="p-3" id="formularioCrearAlimento">
          <div class="main-food-info d-flex flex-wrap justify-content-between p-2">
            
            <div class="user-input-box d-flex flex-wrap w-50 pe-2">
              <label class="text-light fs-5 fw-bolder mb-2 mt-2">Alimento</label>
              <input name="alimento" type="text" id="food name" placeholder="" minlength="3" maxlength="35">
            </div>

            <div class="user-input-box d-flex flex-wrap w-50 ps-2 pe-0">
              <label class="text-light fs-5 fw-bolder mb-2 mt-2">Kcal</label>
              <input name="ckal" type="number" id="kcal" placeholder="" min="0">
            </div>
            
            <div class="user-input-box d-flex flex-wrap w-50 pe-2">
              <label class="text-light fs-5 fw-bolder mb-2 mt-2">Descripción</label>
              <input name="descripcion" type="text" id="description" placeholder="" minlength="1" maxlength="125">
            </div>

            <div class="user-input-box d-flex flex-wrap w-50 ps-2 pe-0">
              <label class="text-light fs-5 fw-bolder mb-2 mt-2">Proteínas (g)</label>
              <input name="proteinas" type="number" id="protein" placeholder="" min="0"  step="0.1">
            </div>

            <div class="user-input-box d-flex flex-wrap w-50 pe-2">
              <label class="text-light fs-5 fw-bolder mb-2 mt-2">Contenido</label>
              <select name="unidades" class="form-select " id="content">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="1">100 g</option>
                <option value="2">Una unidad</option>
                <option value="3">100 ml</option>
                <option value="4">Una taza</option>
                <option value="5">Una onza(oz)</option>
                <option value="6">Una cucharada</option>
              </select>
          </div>

          <div class="user-input-box d-flex flex-wrap w-50 ps-2 pe-0">
            <label class="text-light fs-5 fw-bolder mb-2 mt-2">Grasas (g)</label>
            <input name="grasas" type="number" id="fat" placeholder="" min="0" step="0.1">
        </div>

         <!--ESTE NADA MÁS ES DE RELLENO PARA QUE NO SE MUEVA EL ORDEN-->
        <div class="user-input-box"></div>
              

          <div class="user-input-box d-flex flex-wrap w-50 pe-2">
            <label class="text-light fs-5 fw-bolder mb-2 mt-2">Carbohidratos (g)</label>
            <input name="carbos" type="number" id="carbs" placeholder="" min="0"  step="0.1">
          </div>

          <button type="submit" name="submit"
          class=" mt-3 mb-0 btn fs-5 text-dark btn-block amarillo p-3">Enviar</button>

        </form>
    </div>

  </main>

   <!-- FOOTER -->
  <footer class="text-center text-white"">
    <!-- Grid container -->
    <div class="container p-4">
      <!-- Section: Iframe -->
      <section class="">
        <div class="row d-flex justify-content-center">
          <div class="col-lg-6">
            <div class="ratio ratio-16x9">
              <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/4Gc4XGnLa4Y"
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