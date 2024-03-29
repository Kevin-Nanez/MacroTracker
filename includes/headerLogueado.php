<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
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
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar brand -->
          <a class="navbar-brand mt-sm-0 mb-auto" href="../index.php">
            <img src="../Assets/img/Enchanted_Golden_Apple_JE1_BE1.gif" class="ps-2 d-none d-sm-block" height="30" alt="MDB Logo" loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
            <li class="nav-item">
              <a class="nav-link primerElemento" href="../Pages/alimentos.php">Alimentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link primerElemento" href="crearAlimento.php">Crear Alimento</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../Pages/diario.php">Diario</a>
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
          <!-- Icon -->
          <a class="link-secondary me-3" href="../Pages/noticias.php">
            <i class="fas fa-newspaper"></i>
            <span class=" badge rounded-pill badge-notification bg-danger">!</span>
          </a>


          <div class="dropdown">
            <a class="link-secondary me-3 dropdown-toggle hidden-arrow" href="#" id="navbarDropdownMenuLink" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-edit"></i>
            </a>
            <ul class=" dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
              <li>
                <a class="dropdown-item" href="ajustesPerfil.php">Mi Perfil</a>
              </li>
              <li>
                <a class="dropdown-item" href="/includes/logout.php">Cerrar Sesion</a>
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