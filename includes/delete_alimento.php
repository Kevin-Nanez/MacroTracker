
<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1 ) {
include "../includes/headerAdmin.php";
  } else {
    echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = '../pages/alimentos.php';</script>";
  }

include "db.php";
$id = $_GET['id'];

$sqlAlimentosComida = "DELETE FROM alimentos_comida WHERE id_alimento = $id";
$resultAlimentosComida = mysqli_query($db, $sqlAlimentosComida);
if (!$resultAlimentosComida) {
  echo "<script>alert('Error al eliminar filas en la tabla alimentos_comida');</script>";
}

$sql = "DELETE FROM alimento WHERE id_alimento = $id";
$result = mysqli_query($db, $sql);

if (!$result) {
  echo "<script>alert('Error al eliminar fila en la tabla alimento');</script>";
} else{
  echo "<script>alert('alimento Eliminado'); window.location.href = '../pages/alimentos.php';</script>";
}

header('Location: ../pages/alimentos.php');

?>