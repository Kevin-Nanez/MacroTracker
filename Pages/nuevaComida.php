<?php
session_start();
include "../includes/db.php";

// verificar que el día esté creado
$sql = "SELECT * FROM dia WHERE id_usuario = {$_SESSION['id_usuario']} AND fecha = '{$_SESSION['fecha']}';";
$result = mysqli_query($db, $sql);
$row = mysqli_fetch_assoc($result);
if (mysqli_num_rows($result) < 1) {
  $sql = "INSERT INTO dia(fecha, id_usuario, objetivo) VALUES ('{$_SESSION['fecha']}', {$_SESSION['id_usuario']}, {$_SESSION['objetivo']});";
  $result = mysqli_query($db, $sql);
}

// ver si existen comidas en el día
$sql1 = "SELECT * FROM comida WHERE id_usuario = {$_SESSION['id_usuario']} AND fecha = '{$_SESSION['fecha']}';";
$result1 = mysqli_query($db, $sql1);
$row1 = mysqli_fetch_assoc($result1);
if (mysqli_num_rows($result1) < 1) { // si no hay comidas en el día
  // agregar comida con el num comida 1
  $sql2 = "INSERT INTO comida (fecha, id_usuario, num_comida) VALUES ('{$_SESSION['fecha']}', {$_SESSION['id_usuario']}, 1);";
  $result2 = mysqli_query($db, $sql2);
  // redirigir al usuario a diario.php
  ob_clean();
  header("Location: diario.php");
  exit;

} else {
  // buscar en qué número de comida va
  $sql = "SELECT MAX(num_comida) AS num_comida FROM comida WHERE id_usuario = {$_SESSION['id_usuario']} AND fecha = '{$_SESSION['fecha']}' GROUP BY fecha;";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);
  $num_comida = $row['num_comida'] + 1;

  // agregar número de comida
  $sql2 = "INSERT INTO comida (fecha, id_usuario, num_comida) VALUES ('{$_SESSION['fecha']}', {$_SESSION['id_usuario']}, {$num_comida});";
  $result2 = mysqli_query($db, $sql2);
  // redirigir al usuario a diario.php
  header("Location: diario.php");
  exit;
}
?>
