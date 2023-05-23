<?php
session_destroy();
session_start();

if (isset($_POST["submit"])) {
    include "../includes/db.php";

    $usuario = $_POST["usuario"];
    $usuario_password = $_POST["usuario_Password"];
    $sql = "SELECT * FROM usuario WHERE usuario='{$usuario}' AND usuario_Password ='{$usuario_password}';";
    $result = mysqli_query($db, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);

        if (isset($row['usuario']) && isset($row['usuario_Password'])) {
            $usuarioC = $row['usuario'];
            $usuario_Password = $row['usuario_Password'];
            $id_usuarioC = $row['id_usuario'];
            $edadC = $row['edad'];
            $pesoC = $row['peso'];
            $alturaC = $row['altura'];
            $dafC = $row['dias_af'];
            $sexoC = $row['sexo'];
            $objetivoC = $row['objetivo'];
            $privilegios = $row['privilegios'];
            
          $_SESSION['usuario'] = $usuarioC;
          $_SESSION['id_usuario'] = $id_usuarioC;
          $_SESSION['edad'] = $edadC;
          $_SESSION['peso'] = $pesoC;
          $_SESSION['altura'] = $alturaC;
          $_SESSION['daf'] = $dafC;
          $_SESSION['sexo'] = $sexoC;
          $_SESSION['objetivo'] = $objetivoC;
          $_SESSION['privilegios'] = $privilegios;
          $_SESSION['fecha'] = date('Y-m-d');

          echo "<script>alert('Usuario: {$_SESSION['id_usuario']} Contraseña: $usuario_Password'); window.location.href = 'diario.php';</script>";
          
          //header('Location: diario.php');
        } else {
            echo "<script>alert('No se pudo obtener información de usuario')</script>";
        }
    } else {
        echo "<script>alert('Contraseña o usuario incorrectos')</script>";
    }
}

include "../includes/headerNoLogueado.php";
?>



  <!-- MAIN -->
  <main>
    <div class="container contenedorGrisOsc mb-3 mt-3 pb-2">
        <form action="login.php" method="post">

          <p class="text-light text-center fs-4 fw-bolder mt-3 pt-3">Bienvenido</p>

          <div class="user">
          <p class="text-light fs-4 fw-bolder mb-2">Usuario</p>
          <input name="usuario" type="text" class="form-control mb-2" placeholder="" minlength="1" maxlength="16">
          </div>

          <div class="password">
          <p class="text-light fs-4 fw-bolder">Contraseña</p>
          <input name="usuario_Password" type="password" class="form-control mb-4" placeholder="" minlength="6" maxlength="20">
          </div>

          <div>
          <button type="submit"  name="submit" class="mb-3 btn fs-5 text-dark btn-block amarillo p-3 ">Iniciar Sesión</button>
          </div>
              
          <div class="bottom text-center mb-"> 
          <span><a  href="registro.html" class="text-decoration-underline mb-1">Registrarse</a></span>
          </div>
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

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
  <!-- MDB -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"></script>
  <script src="../js/script.js"></script>

</body>

</html>