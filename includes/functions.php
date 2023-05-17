<?php 

function getAlimentos(){
    try{
        require "db.php";

        $sql = "SELECT a.*, u.descripcion as unidad_descripcion
        FROM alimento a
        INNER JOIN unidades u ON a.id_unidades = u.id_unidades;";

        $query = mysqli_query($db,$sql);

        return $query;
        mysqli_close($db);
    }
    catch(\Throwable $th){
        var_dump($th);
    }
}

function getUsuarios(){
    try{
        require "db.php";

        $sql = "SELECT * FROM usuario";

        $query = mysqli_query($db,$sql);

        return $query;
        mysqli_close($db);
    }
    catch(\Throwable $th){
        var_dump($th);
    }
}



?>