<?php

include("../conexao.php");

if(isset($_GET["id"])){

$id=$_GET["id"];

$sql="DELETE FROM Continentes

WHERE id_continente=$id";

mysqli_query($conexao,$sql);

}

header("Location:listar.php");

exit();

?>