<?php
session_start();
if (isset($_SESSION['id_usuario']) && !empty($_SESSION['id_usuario']) && $_SESSION['privilegios'] == 1 ) {
  } else {
    echo "<script>alert('No tiene permisos para realizar esta acción'); window.location.href = '../pages/diario.php';</script>";
  }

include "db.php";
$id = $_GET['id'];
$sqlAlimentosComida = "DELETE FROM alimentos_comida WHERE id_comida IN (SELECT id_comida FROM comida WHERE fecha IN (SELECT fecha FROM dia WHERE id_usuario='$id'))";
$resultAlimentosComida = mysqli_query($db, $sqlAlimentosComida);


$sqlComida = "DELETE FROM comida WHERE fecha IN (SELECT fecha FROM dia WHERE id_usuario='$id')";
$resultComida = mysqli_query($db, $sqlComida);


$sqlDia = "DELETE FROM dia WHERE id_usuario='$id'";
$resultDia = mysqli_query($db, $sqlDia);


$sqlUsuario = "DELETE FROM usuario WHERE id_usuario='$id'";
$resultUsuario = mysqli_query($db, $sqlUsuario);

header('Location: ../pages/usuarios.php');

echo "<script>alert('Usuario Eliminado'); window.location.href = '../pages/usuarios.php';</script>";

include "../includes/headerAdmin.php";

?>