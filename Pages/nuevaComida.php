
<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 2 ) {
  include "../includes/headerLogueado.php";
} else if(isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1 ){
  include "../includes/headerAdmin.php";
} else{
    echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = 'diario.php';</script>";
}
include "../includes/db.php";

// verificar que el dia esté creado

// si no,crear el dia

// crear la comida con el id usuario de la sesion y la fecha de la sesion










?>