<?php
error_reporting(0);


if (isset($_POST["submit"])) {
  include "../includes/db.php";

  $usuario = $_POST["usuario"];
  $usuario_password = $_POST["usuario_password"];
  $cPassword = $_POST["confpassword"];
  $sexo = $_POST["gender"];
  $altura = $_POST["altura"];
  $peso = $_POST["peso"];
  $edad = $_POST["edad"];
  $daf = $_POST["daf"];

  if ($usuario_password === $cPassword) {
    $sql = "SELECT * FROM usuario WHERE usuario='$usuario'";
    $result = mysqli_query($db, $sql);
    if (!$result->num_rows > 0) {
      $objetivo = ($peso*10)+(6.25*($altura)-(5*$edad));
      if($sexo == "M"){
        $objetivo += 5;
      }else{
        $objetivo -= 161;
      }

      switch($daf){
        case 0:
          $objetivo = $objetivo * 1.2;
          break;
        case 1:
        case 2:
          $objetivo = $objetivo * 1.375;
          break;
        case 3: 
        case 4:
        case 5:
          $objetivo = $objetivo * 1.55;
          break;
        case 6:
          $objetivo = $objetivo * 1.725;
          break;
        case 7:
          $objetivo = $objetivo * 1.8;
          break;
      }

      $sql = "INSERT INTO usuario (usuario ,usuario_password, sexo, edad, altura, peso, dias_af, objetivo)
      VALUES ('{$usuario}', '{$cPassword}', '{$sexo}', '{$edad}', '{$altura}' , {$peso}, {$daf}, {$objetivo})";

      $result = mysqli_query($db, $sql);
      if ($result) {
        echo "<script>alert('Usuario registrado con éxito'); window.location.href = 'login.php';</script>";
        $usuario = "";
        $usuario_password = "";
        $_POST["usuario_password"] = "";
        $_POST["confpassword"] = "";
        $cPassword = "";
        $sexo = "";
        $altura = 0;
        $peso = 0;
        $daf = 0;
        $objetivo = 0;
      } else {
        echo "<script>alert('Error')</script>";
      }
    } else {
      echo "<script>alert('El usuario ya existe')</script>";
    }
  } else {
    echo "<script>alert('Las contraseñas no coinciden')</script>";
  }
}

include "../includes/headerNoLogueado.php";
?>

<main>

  <div class="container contenedorGrisOsc mb-3">
    <p class="text-light text-center fs-4 fw-bolder mt-3 pt-3 ">Registro</p>

    <form class="p-1" action="registro.php" method="post">
      <div class="main-user-info d-flex flex-wrap justify-content-between p-2">

        <div class="user-input-box d-flex flex-wrap w-50">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Usuario</label>
          <div class="container ps-0">
            <input type="text" id="username" name="usuario" placeholder="" minlength="1" maxlength="16">
          </div>
        </div>

        <div class="user-input-box d-flex flex-wrap w-50">
          <div class="container ps-2 pe-0">
            <label class="text-light fs-5 fw-bolder mb-2 mt-2">Edad</label>
            <input name="edad" type="number" id="age" placeholder="" min="1" max="150">
          </div>
        </div>

        <div class="user-input-box d-flex flex-wrap w-50">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Contraseña</label>
          <div class="container ps-0">
            <input name="usuario_password" type="password" id="password" placeholder="" minlength="6" maxlength="20">
          </div>
        </div>

        <div class="user-input-box d-flex flex-wrap w-50 ps-2 pe-0">

          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Altura (cm)</label>
          <input name="altura" type="number" id="height" placeholder="" min="1" max="270">
        </div>

        <div class="user-input-box d-flex flex-wrap w-50">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Confirmar contraseña</label>
          <div class="container ps-0">
            <input name="confpassword" type="password" id="repeatpassword" placeholder="" minlength="6" maxlength="20">
          </div>
        </div>

        <div class="user-input-box d-flex flex-wrap w-50 ps-2 pe-0">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Peso (kg)</label>
          <input name="peso" type="number" id="weight" placeholder="" min="1" max="800" step="0.01">
        </div>


        <div class="gender-details-box mb-2 mt-2">
          <span class="text-light fs-5 fw-bolder mb-2 mt-2">Sexo:</span>
          <div class="gender-category mb-1 mt-1">
            <input type="radio" id="male" name="gender" class="cursor-pointer" value="M">
            <label for="male" class="cursor-pointer text-light fs-6 p-1">Masculino</label>

            <input type="radio" id="female" class="cursor-pointer" name="gender" value="F">
            <label for="female" class="cursor-pointer text-light fs-6 p-1">Femenino</label>

          </div>
        </div>

        <div class="user-input-box d-flex flex-wrap w-50 ps-2 pe-0">
          <label class="text-light fs-5 fw-bolder mb-2 mt-2">Días de actividad física</label>
          <input name="daf" type="number" id="aFDays" placeholder="" min="0" max="7">
        </div>

        <div class="form-submit-btn btn-block text-center ">
          <button type="submit" name="submit" class=" mt-3 mb-4 btn fs-5 text-dark btn-block amarillo p-3 ">Registrarse</button>
        </div>
      </div>
    </form>
  </div>
</main>

<!-- FOOTER -->
<footer class="text-center text-white"">
    <!-- Grid container -->
    <div class=" container p-4">
  <!-- Section: Iframe 
  <section class="">
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6">
        <div class="ratio ratio-16x9 player">
          <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/4OQDKf3Sqfs" title="Alimentos BARATOS para PERDER GRASA 🔥" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
      </div>
    </div>
  </section> -->
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