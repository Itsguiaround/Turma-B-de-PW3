<?php

include("../conexao.php");

if(isset($_GET["id"])){

    $id = (int)$_GET["id"];

    $pais = mysqli_query($conexao,"
    SELECT COUNT(*) AS total
    FROM Paises
    WHERE id_governante_pais = $id");

    $totalPais = mysqli_fetch_assoc($pais);

    $cidade = mysqli_query($conexao,"
    SELECT COUNT(*) AS total
    FROM Cidades
    WHERE id_governante_pais = $id");

    $totalCidade = mysqli_fetch_assoc($cidade);

    if($totalPais["total"] > 0 || $totalCidade["total"] > 0){

        echo "<script>

        alert('Este governante está vinculado a um país ou cidade e não pode ser excluído.');

        window.location='listar.php';

        </script>";

        exit();

    }

    mysqli_query($conexao,"
    DELETE FROM Governantes_Paises
    WHERE id_governante_pais = $id");

}

header("Location:listar.php");

exit();

?>