<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 2) {

} else if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1) {

} else {
  echo "<script>alert('Inicie Sesión para acceder al diario'); window.location.href = 'login.php';</script>";
}
include "../includes/db.php";
$id_alimento = $_GET['id_alimento'];
$cantidad = $_GET['cantidad'];
$id_comida = $_GET['idcomida'];

 $sql = "INSERT INTO alimentos_comida (id_alimento, id_comida, cantidad) VALUES ({$id_alimento},{$id_comida},{$cantidad});";

 mysqli_query($db, $sql);
header('Location: diario.php');

?>