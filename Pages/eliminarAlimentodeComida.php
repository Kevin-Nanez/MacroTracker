
<?php
session_start();
include "../includes/db.php";
if ($_SESSION['privilegios'] == 2) {


  $id = $_GET['id_alimentos_comida'];
  $sql = "DELETE FROM alimentos_comida WHERE id_alimentos_comida = $id;";

    echo $sql;
    $result = mysqli_query($db, $sql);
    
  if (!$result) {
    echo "<script>alert('Error al eliminar');</script>";
  } else {
    echo "<script>alert('Alimento Eliminado'); window.location.href = 'diaro.php';</script>";
  }

  header('Location: diario.php');
} else {
  echo "<script>alert('Inicie sesión'); window.location.href = 'login.php';</script>";
}





?>