<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
          <a class="navbar-brand mt-sm-0 mb-auto" href="#">
            <img src="../Assets/img/Enchanted_Golden_Apple_JE1_BE1.gif" class="ps-2 d-none d-sm-block" height="30" alt="MDB Logo" loading="lazy" />
          </a>
          <!-- Left links -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
            <li class="nav-item">
              <a class="nav-link primerElemento" href="pages/alimentos.php">Alimentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pages/noticias.php">Noticias</a>
            </li>
          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->

        <!-- Right elements -->
        <div class="d-flex align-items-center">
          <!-- Icon -->
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-semibold">
            <li class="nav-item me-2 me-sm-0">
              <a class="nav-link" href="Pages/login.php">Iniciar Sesión</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Pages/registro.php">Registrarse</a>
            </li>
          </ul>
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

  <main class="mainAside">

    <div class="cards container pt-3 pe-0">
      <div class="container ">
        <div class="row p-2">

          <div class="container-fluid bg-light col-md-5 col-lg-6 col-xl-8 col-12 rounded-7">
            <h2 class="text-dark pt-2 fs-4 mb-0">
              ¿Qué somos?
            </h2>

            <p class="text-justify p-1">
              Somos una herramienta diseñada para ayudarte a llevar un registro de las calorías que consumes diariamente proporcionándote información nutricional sobre los alimentos y bebidas que ingieres. También podemos ayudarte a establecer metas de consumo de calorías, mantener un diario de alimentos, realizar un seguimiento de tus macros (carbohidratos, proteínas y grasas), mantenerte informado sobre nuevas noticias, descubrimientos científicos y modas con respecto a la nutrición alimentaria y ofrecerte guías o consejos nutricionales para ayudarte a alcanzar tus objetivos de salud y bienestar.
          </div>
          <div class="container bg-light p-0 col-md-6 col-lg-5 col-12 col-xl-3 d-flex align-items-center justify-content-center">
            <div>
              <img class="img-fluid paddingsmall" src="Assets/img/index/calorias.jpg" alt="frutas y verduras con contenido calorico">
            </div>
          </div>
        </div>
        <!-- fin row 1 -->

        <div class="row p-2 rowreverse mt-3 mb-3 ">
          <div class="container  bg-light p-0 col-md-6 col-lg-5 col-12 col-xl-3 d-flex align-items-center justify-content-center">
            <div>
              <img class="img-fluid paddingsmall" src="Assets/img/index/calorias.jpg" alt="frutas y verduras con contenido calorico">
            </div>
          </div>
          <div class="container-fluid bg-light col-md-5 col-lg-6 col-xl-8 col-12 rounded-7">
            <h2 class="text-dark pt-2 fs-4 mb-0">
              ¿Como MacroTracker contribuye a la mejora de la salud?
            </h2>

            <p class="text-justify p-1">
            MacroTracker es una herramienta que permite contabilizar las calorías ingeridas y ofrece una serie de beneficios que contribuyen a la mejora de la salud a travez de los siguientes aspectos: 
            </p>
            <ol>
              <li>
                <p>Conciencia alimentaria: Al utilizar MacroTracker, los usuarios se vuelven más conscientes de las calorías que consumen diariamente.</p>
              </li>
              <li>
                <p>Control de peso: El seguimiento y monitoreo de la ingesta calórica a través de MacroTracker permite a los usuarios mantener un peso saludable. </p>
              </li>
              <li>
                <p>Seguimiento de nutrientes: Además de contar calorías, MacroTracker también permite realizar un seguimiento de los macronutrientes (carbohidratos, proteínas y grasas) consumidos.</p>
              </li>
            </ol>
          </div>
        </div>
        <!-- fin row 2 -->
        <div class="row p-2">
          <div class="container-fluid bg-light col-md-5 col-lg-6 col-xl-8 col-12 rounded-7">
            <h2 class="text-dark pt-2 fs-4 mb-0">
              ¿Cómo usar MacroTracker?
            </h2>

            <p class="text-justify p-1">
              Es tan sencillo como iniciar sesión para revisar las múltiples utilidades que tiene el sistema.</p>
            <p class="text-justify p-1">
              Una vez hecho esto, podrás acceder a las diferentes secciones de MacroTracker, así como la función principal de MacroTracker, el contador de calorías, en el cual podrás revisar los diferentes alimentos existentes para poder añadirlos a tu diario, o inclusive en caso de no encontrar el alimento en nuestra base de datos, podrás crear tu el alimento, detallando los valores nutrimentales que contiene. De esta manera, podrás llevar un conteo de los macronutrientes que estarías ingiriendo, así como también buscar cumplir con tu meta-objetivo que te proveerá el sistema dependiendo del plan que desees seguir.
            </p>
          </div>
          <div class="container bg-light p-0 col-md-6 col-lg-5 col-12 col-xl-3 d-flex align-items-center justify-content-center">
            <div>
              <img class="img-fluid paddingsmall" src="Assets/img/index/avenaModificada.jpg" alt="frutas y verduras con contenido calorico">
            </div>
          </div>
        </div>
        <!-- fin row 3 -->
      </div>

    </div>

    <aside class="p-3 ms-0 m-2 mt-4 bg-light rounded-7 d-flex flex-column align-items-center ">
      <h4 class="text-dark text-center fs-5">
        ¿Qué ventajas tiene usar MacroTracker?
      </h4>

      <ol class="text-justify align-self-start ">
        <li>
          <p>Conciencia alimentaria: Al utilizar MacroTracker, estarás más consciente de las calorías que consumes diariamente. Esto te ayudará a tomar decisiones más informadas sobre tu ingesta calórica.</p>
        </li>
        <li>
          <p>Control de peso: Al registrar y monitorear tu ingesta calórica, podrás alcanzar tus objetivos de pérdida, mantenimiento o ganancia de peso.</p>
        </li>
        <li>
          <p>Personalización de metas: MacroTracker te permite establecer metas personalizadas de consumo de calorías según tus necesidades y objetivos individuales.</p>
        </li>
        <li>
          <p>Seguimiento de nutrientes: Además de contar calorías, esta herramienta puede ayudarte a realizar un seguimiento de los macronutrientes (carbohidratos, proteínas y grasas) que consumes.</p>
        </li>
        <li>
          <p>Conocimiento nutricional: MacroTracker proporciona información detallada sobre la composición nutricional de los alimentos y bebidas que consumes.</p>
        </li>
      </ol>

      <a href="Pages/registro.html" class="btn  grisclaro  mt-3">Registrarse</a>
    </aside>


  </main>

  <footer class="text-center text-white"">
    <!-- Grid container -->
    <div class=" container p-4">
    <!-- Section: Iframe -->
    <section>
      <div class="row d-flex justify-content-center">
        <div class="col-lg-6">
          <div class="ratio ratio-16x9">
            <iframe class="shadow-1-strong rounded" width="905" height="509" src="https://www.youtube.com/embed/mBW3gHiWCck" title="Tus Células Necesitan estos Micronutrientes  | Dr. La Rosa" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
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

  <script src="js/script.js"></script>
</body>

</html>