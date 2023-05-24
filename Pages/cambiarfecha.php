<?php
session_start();
include "../includes/db.php";

$dia = $_GET['dia'];
$mes = $_GET['mes'];
$year = $_GET['year'];

$_SESSION['fecha'] = date('Y-m-d', strtotime($year . '-' . $mes . '-' . $dia));


header("Location: diario.php");
exit;

?>