<?php
session_start();
include "../includes/db.php";

$fecha_actual = $_SESSION['fecha'];

// Aumentar la fecha al día siguiente
$nueva_fecha = date('Y-m-d', strtotime($fecha_actual . ' -1 day'));

// Actualizar la variable de sesión con la nueva fecha
$_SESSION['fecha'] = $nueva_fecha;
  header("Location: diario.php");
  exit;

?>