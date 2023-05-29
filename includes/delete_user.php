<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1 ) {
  } else {
    echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = '../pages/diario.php';</script>";
  }

  include "db.php";
  $id = $_GET['id'];
  
  // Obtener las comidas del usuario y borrar los registros de alimentos_comida
  $sqlComida = "SELECT id_comida FROM comida WHERE id_usuario='$id';";
  $resultComida = mysqli_query($db, $sqlComida);
  

  while ($rowComida = mysqli_fetch_assoc($resultComida)) {
      $idComida = $rowComida['id_comida'];
  // borrar alimentos comida donde el id = alimentos comida 
    $sqlDeleteAlimentosComida = "DELETE FROM alimentos_comida WHERE id_comida={$idComida};";
    echo $sqlDeleteAlimentosComida . "<br>";
    mysqli_query($db, $sqlDeleteAlimentosComida);

  }

  $sqlComida = "SELECT id_comida FROM comida WHERE id_usuario='$id';";
  $resultComida = mysqli_query($db, $sqlComida);

  while ($rowComida = mysqli_fetch_assoc($resultComida)) {
    $idComida = $rowComida['id_comida'];
    $sqlComida = "DELETE FROM comida WHERE id_comida='$idComida';";
    echo $sqlComida . "<br>";
    mysqli_query($db, $sqlComida);
}

//hasta aqui bien
$sql1 = "DELETE FROM comida WHERE fecha IN (SELECT fecha FROM dia WHERE id_usuario={$id});";
echo $sql1 . "<br>";
$result1 = mysqli_query($db, $sql1);

$sqlDia = "DELETE FROM dia WHERE id_usuario={$id};";
$resultDia = mysqli_query($db, $sqlDia);
echo $sqlDia . "<br>";


$sqlUsuario = "DELETE FROM usuario WHERE id_usuario={$id}";
echo $sqlUsuario . "<br>";
$resultUsuario = mysqli_query($db, $sqlUsuario);

header('Location: ../pages/usuarios.php');

echo "<script>alert('Usuario Eliminado'); window.location.href = '../pages/usuarios.php';</script>";

include "../includes/headerAdmin.php";

?>