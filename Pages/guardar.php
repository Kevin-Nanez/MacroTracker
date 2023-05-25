
<?php
session_start();
include "../includes/db.php";
if ($_SESSION['privilegios'] == 2) {

  $id_alimentos_comida = $_GET['id_alimentos_comida'];
  $cantidad = $_GET['cantidad'];
  $sql = "UPDATE alimentos_comida
    SET cantidad = {$cantidad}
    WHERE id_alimentos_comida = {$id_alimentos_comida};";
    $result = mysqli_query($db, $sql);
    header("Location: diario.php"); // Redirigir a diario.php
    exit;

} else {
  echo "<script>alert('Inicie sesión'); window.location.href = 'login.php';</script>";
}


?>