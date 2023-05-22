
<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1) {
  include "../includes/headerAdmin.php";
  include "db.php";
  $id = $_GET['id'];
  $sql = "DELETE FROM solicitud_alimento WHERE id_solicitud = $id";
  $result = mysqli_query($db, $sql);

  if (!$result) {
    echo "<script>alert('Error al eliminar');</script>";
  } else {
    echo "<script>alert('Solicitud Eliminada'); window.location.href = '../pages/aprobarAlimentos.php';</script>";
  }

  header('Location: ../pages/aprobarAlimentos.php');
} else {
  echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = '../pages/alimentos.php';</script>";
}





?>