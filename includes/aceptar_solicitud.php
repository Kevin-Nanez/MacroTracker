
<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1) {

  include "../includes/headerAdmin.php";
  include "db.php";
  $id = $_GET['id'];
  $sql = "SELECT * FROM solicitud_alimento WHERE id_solicitud = $id";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_assoc($result);

  $alimento = $row['alimento'];
  $descripcion = $row['descripcion'];
  $id_unidades = $row['id_unidades'];
  $calorias = $row['calorias'];
  $proteinas = $row['proteinas'];
  $grasas = $row['grasas'];
  $carbohidratos = $row['carbohidratos'];

  $sqlinsert = "INSERT INTO alimento (alimento, descripcion, calorias, proteinas, grasas, carbohidratos, id_unidades) VALUES ('$alimento','$descripcion', $calorias, $proteinas, $grasas, $carbohidratos, $id_unidades);";
  $resultinsert = mysqli_query($db, $sqlinsert);

  if ($resultinsert) {
    $sql = "DELETE FROM solicitud_alimento WHERE id_solicitud = $id";
    $result = mysqli_query($db, $sql);

    if (!$result) {
      echo "<script>alert('Error al eliminar');</script>";
    } else {
      echo "<script>alert('Solicitud Eliminada'); window.location.href = '../pages/aprobarAlimentos.php';</script>";
    }


    header('Location: ../pages/aprobarAlimentos.php');
  } else {
    echo "<script>alert('Error al ingresar la comida');</script>";
  }
} else {
  echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = '../pages/alimentos.php';</script>";
}





?>