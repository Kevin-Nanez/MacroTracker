<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Diario</title>
  <!-- local CSS -->
  <link rel="stylesheet" href="../css/layout.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link rel="icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <!-- CDNS -->
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
  <!-- MDB -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" />

</head>

<body>
  <header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
          data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <a class="navbar-brand mt-sm-0 mb-auto" href="#">
            <img src="../Assets/img/Enchanted_Golden_Apple_JE1_BE1.gif" class="ps-2" height="30" alt="MDB Logo"
              loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
            <li class="nav-item">
              <a class="nav-link" href="#">Alimentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="crearAlimento.html">Crear Alimento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="diario.html">Diario</a>
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
          <!-- Icon -->
          <a class="link-secondary me-3" href="#">
            <i class="fas fa-newspaper redirigirNoticias"></i>
            <span class=" badge rounded-pill badge-notification bg-danger">!</span>
          </a>

          <!-- Notifications -->
          <div class="dropdown">
            <a class="link-secondary me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink"
              role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-edit"></i>
            </a>
            <ul class=" dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="ajustesPerfil.html">Mi Perfil</a>
              </li>
              <li>
                <a class="dropdown-item" href="../index.html">Cerrar Sesion</a>
              </li>
            </ul>
          </div>
        </div>
        <!-- Right elements -->
      </div>
      <!-- Container wrapper -->
    </nav>
    <!-- Navbar -->


    <!-- Background image -->
    <div class="p-5 text-center bg-image banner">
      <div class="mask" style="background-color: rgba(0, 0, 0, 0.6);">
        <div class="d-flex justify-content-center align-items-center h-100">
          <!-- Logo y contenido header  -->
          <div class="container text-white">
            <div class="d-flex justify-content-center align-items-center">
              <img src="../Assets/img/Enchanted_Golden_Apple_JE1_BE1.gif" alt="descripción_de_la_imagen">
              <div class="pt-4 text-ligth">
                <h1 class="mb-3 text-center h1logo">MacroTracker</h1>
                <h4 class="mb-3 text-center h4logo">"conócete a ti mismo"</h4>
              </div>
            </div>
          </div>
          <!-- Fin Logo y contenido header  -->

        </div>
      </div>
      <!-- Background image -->
  </header>

  <main>
    <div class="container">
      <div class="d-flex h-500">
        <div class="d-flex col-sm align-items-center justify-content-between ms-5 me-5 position-relative fw-bold rounded-3 mt-3 mb-3 menudiario">
          <div class="row hoy">

            <div class="d-flex flex-nowrap flex-sm-row">
              <div class="col-sm">
                <button class="flecha me-sm-0 me-md-3 me-xl-5">
                  < </button>
              </div>
              <div class="col-sm">
                <div class="text-center text-md-start">Hoy</div>
              </div>
              <div class="col-sm">
                <button class="flecha ms-sm-0 ms-md-3 ms-xl-5">></button>
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
                  <a  class="cerrarModal cursor-pointer bg-light btn btn-secondary btn-icon-only position-relative top-0 start-0 mt-3 ms-3 preventD"
                    aria-label="Close">
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
                      <button id="buscarFecha" type="button"
                        class="btn text-dark brodenegro2 btn-block amarillo fw-700 fs-6 rounded-5">Ir</button>
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
      <div class="row">
        <div class="col-sm elemdiario p-3 fs-4">
          <p>Objetivo</p>
          <p>2400</p>
        </div>
        <div class="container col-1 elemdiario p-3 fs-4 d-flex justify-content-center align-items-center">
          <p>-</p>
        </div>
        <div class="col-sm elemdiario p-3 fs-4">
          <p>Alimentos</p>
          <p>800</p>
        </div>
        <div class="container col-1 elemdiario p-3 fs-4 d-flex justify-content-center align-items-center">
          <p>=</p>
        </div>
        <div class="col-sm elemdiario p-3 fs-4">
          <p>Restantes</p>
          <p>1600</p>
        </div>
      </div>
    </div>
    <!-- Tabla -->
    <div class="container-diario text-center">
      <div class="table-responsive">
        <table class="table table-diario border-0">
          <thead class="thead-dark">
            <tr class="mt-2">
              <th>Alimento</th>
              <th>Cantidad</th>
              <th>Información</th>
             
            </tr>
          </thead>
          <tbody>
            <tr class="registrodiario mt-3">
              <td data-title="Alimento: " class="align-middle cursor-pointer info_alimento">Pechuga de Pollo</td>
              <td data-title="Cantidad: " class="align-middle">100g</td>
              <td data-title="Información:" class="align-middle">
                <div class="row">
                  <div class="col-sm text-truncate">
                    <p>P: 40g</p>
                    <p>C: 2g</p>
                  </div>
                  <div class="col-sm text-truncate">
                    <p>G: 4g</p>
                    <p>200kcal</p>
                  </div>
                </div>
              </td>
              <td class="align-middle">
                <div class="row">
                  <div class="col-sm">
                    <button class="border-0 bg-transparent">
                      <i class="fa-solid fa-pen-to-square edit info_alimento mb-4 mb-sm-0" style="color:#292929;"></i>
                    </button>
                  </div>
                  <div class="col-sm">
                    <button class="border-0 bg-transparent">
                      <i class="fa-solid fa-trash " style="color:#292929;"></i>
                    </button>
                  </div>
                </div>
              </td>
            </tr>
            <tr class="registrodiario mt-3">
              <td data-title="Alimento: " class="align-middle cursor-pointer info_alimento">Pechuga de Pollo</td>
              <td data-title="Cantidad: " class="align-middle">100g</td>
              <td data-title="Información:" class="align-middle">
                <div class="row">
                  <div class="col-sm text-truncate">
                    <p>P: 40g</p>
                    <p>C: 2g</p>
                  </div>
                  <div class="col-sm text-truncate">
                    <p>G: 4g</p>
                    <p>200kcal</p>
                  </div>
                </div>
              </td>
              <td class="align-middle">
                <div class="row">
                  <div class="col-sm">
                    <button class="border-0 bg-transparent">
                      <i class="fa-solid fa-pen-to-square edit info_alimento mb-4 mb-sm-0" style="color:#292929;"></i>
                    </button>
                  </div>
                  <div class="col-sm">
                    <button class="border-0 bg-transparent">
                      <i class="fa-solid fa-trash " style="color:#292929;"></i>
                    </button>
                  </div>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="row ">
        <div class="col-sm">
          <button class="btn mt-4 fs-5 amarillo text-dark redirigirAgregar">
            Agregar Alimento
          </button>
        </div>
        <div class="col-sm">
          <button class="btn mt-4 fs-5 amarillo text-dark redirigirCrearar">
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