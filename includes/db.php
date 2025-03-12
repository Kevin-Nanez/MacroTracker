<?php 
$server = "localhost";
$user = "root";
$pass = "";
$database = "macrotracker";

$db= mysqli_connect($server,$user,$pass,$database);

if(!$db){
    echo "hubo un error";
    exit;
}

?>