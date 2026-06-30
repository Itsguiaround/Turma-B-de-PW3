<?php

include("../conexao.php");

if(isset($_GET["id"])){

    $id = (int)$_GET["id"];

    $verificar = mysqli_query($conexao,"
    SELECT COUNT(*) AS total
    FROM Cidades
    WHERE id_pais=$id");

    $linha = mysqli_fetch_assoc($verificar);

    if($linha["total"]>0){

        echo "<script>

        alert('Este país possui cidades cadastradas e não pode ser excluído.');

        window.location='listar.php';

        </script>";

        exit();

    }

    mysqli_query($conexao,"
    DELETE FROM Paises
    WHERE id_pais=$id");

}

header("Location:listar.php");

exit();

?>