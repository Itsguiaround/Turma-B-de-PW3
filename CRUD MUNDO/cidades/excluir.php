<?php

include("../conexao.php");

if(isset($_GET["id"])){

    $id = (int)$_GET["id"];

    $sql = "DELETE FROM Cidades
    WHERE id_cidade = $id";

    mysqli_query($conexao,$sql);

}

header("Location:listar.php");

exit();

?>