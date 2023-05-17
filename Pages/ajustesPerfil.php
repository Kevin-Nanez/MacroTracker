<?php
session_start();
include "../includes/db.php";
include "../includes/headerLogueado.php";
?>
  <main>

    <div class="container contenedorGrisOsc mt-3 mb-3">
      <a href="diario.php" class="bg-light btn btn-secondary btn-icon-only position-relative top-0 start-0 mt-3 ms-3">
        <i class="fas fa-arrow-left"></i>
      </a>
      <h2  class="text-white font-weight-bold text-center mt-- h1logo">Ajustes y Objetivos de <?php echo $_SESSION['usuario'];  ?></h2>

      <div class="container mt-2">
        <div class="row justify-content-center">
          <div class="col-md-8 mt-2">
            <form action="ajustesPerfil.php" method="post">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group mt-2">
                    <label class="label_gris" for="input1">Edad:</label>
                    <input type="number" name="edad" min="1" max="150" class="form-control" id="input1" value="<?php echo $_SESSION['edad'];?>">
                  </div>

                  <div class="form-group mt-2">
                    <label class="label_gris" for="input2">Altura (cm):</label>
                    <input type="number" min="10" max="270" class="form-control" id="input2" name="altura" value="<?php echo $_SESSION['altura'];?>">
                  </div>
                  <div class="form-group mt-2">
                    <label class="label_gris" for="input3">Peso (kg): </label>
                    <input   name="peso" type="number" min="1" max="800" step="0.01" class="form-control" id="input3" value="<?php echo $_SESSION['peso'];?>">
                  </div> 
                  <div class="form-group mt-2">
                    <label class="label_gris" for="input4">Días de Actividad Física: </label>
                    <input type="number" name="daf" min="0" max="7" class="form-control" id="input4" value="<?php echo $_SESSION['daf'];?>">
                  </div>
                </div>
                <div class="col-md-6">
                <?php

                      $mantenimiento = ($_SESSION['peso']*10)+(6.25*($_SESSION['altura'])-(5*$_SESSION['edad']));
                      if($_SESSION['sexo'] == "M"){
                        $mantenimiento += 5;
                      }else{
                        $mantenimiento -= 161;
                      }
                
                      switch($_SESSION['daf']){
                        case 0:
                          $mantenimiento = $mantenimiento * 1.2;
                          break;
                        case 1:
                        case 2:
                          $mantenimiento = $mantenimiento * 1.375;
                          break;
                        case 3: 
                        case 4:
                        case 5:
                          $mantenimiento = $mantenimiento * 1.55;
                          break;
                        case 6:
                          $mantenimiento = $mantenimiento * 1.725;
                          break;
                        case 7:
                          $mantenimiento = $mantenimiento * 1.8;
                          break;
                      }
                      $mantenimiento = intval($mantenimiento);
                      if($_SESSION['sexo'] == "M" ){
                        $aumentarPeso = $mantenimiento + 400;
                        $bajarPeso = $mantenimiento - 400;
                      } else{
                        $aumentarPeso = $mantenimiento + 300;
                        $bajarPeso = $mantenimiento - 300;
                      }
                      

                ?>
                
                  <div class="form-group mt-2">
                    <label class="label_gris" for="input5">Calorías Mantener El Peso</label>
                    <input type="number" value="<?php echo $mantenimiento?>" class="fw-semibold text-dark form-control amarillo brodenegro1" id="input5" readonly">
                  </div>
                  <div class="form-group mt-2">
                    <label class="label_gris" for="input6">Calorías Aumentar De Peso</label>
                    <input type="text" value="<?php echo $aumentarPeso?>" class="fw-semibold text-dark form-control amarillo brodenegro1" id="input6" readonly>
                  </div>
                  <div class="form-group mt-2">
                    <label class="label_gris" for="input7">Calorías Bajar De Peso</label>
                    <input type="text" value="<?php echo $bajarPeso?>" class="fw-semibold text-dark form-control amarillo brodenegro1" id="input7" readonly>
                  </div>
                  <div class="form-group mt-2">
                    <label class="label_gris" for="input8">Ajuste de Clorías:</label>
                    <input name="objetivo" type="number" min="1" max="12500" class="form-control" value="<?php echo $_SESSION['objetivo'];?>" id="input8">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12 mt-4 mb-4">
                  <button type="submit" name="submit" class="btn text-dark brodenegro2 btn-block amarillo fw-700 fs-6 rounded-5">Guardar</button>
                  <?php
                    if(isset($_POST['submit'])){
                      $altura = $_POST["altura"];
                      $peso = $_POST["peso"];
                      $edad = $_POST["edad"];
                      $daf = $_POST["daf"];
                      $objetivo = $_POST["objetivo"];

                      $sql="UPDATE usuario
                      SET edad = {$edad},
                          altura = {$altura},
                          peso = {$peso},
                          dias_af = {$daf},
                          objetivo = {$objetivo}
                      WHERE id_usuario = {$_SESSION['id_usuario']};
                      ";
                      $result = mysqli_query($db,$sql);
                      $sql = "SELECT * FROM usuario WHERE id_usuario = {$_SESSION['id_usuario']};";

                      $result = mysqli_query($db, $sql);

                      $row = mysqli_fetch_assoc($result);

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
                      
                      echo '<script>window.location.href = window.location.href;</script>';
                    }
                    
                  ?>
                </div>
              </div>
            </form>
          </div>
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
              <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/2zD82iPiZvg" title="CUANDO HACER VOLUMEN O DEFINICION" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

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