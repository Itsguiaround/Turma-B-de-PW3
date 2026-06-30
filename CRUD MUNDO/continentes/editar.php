<?php

include("../conexao.php");

$id = $_GET["id"];

$sql = "SELECT * FROM Continentes WHERE id_continente=$id";

$resultado = mysqli_query($conexao,$sql);

$dados = mysqli_fetch_assoc($resultado);

if(isset($_POST["atualizar"])){

$nome=$_POST["nome"];

$pop=$_POST["populacao"];

$area=$_POST["area"];

$total=$_POST["total"];

$sql="UPDATE Continentes SET

nome='$nome',

populacao='$pop',

area_km2='$area',

total_paises='$total'

WHERE id_continente=$id";

mysqli_query($conexao,$sql);

header("Location:listar.php");

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Editar Continente</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Editar Continente</h2>

<form method="POST">

<input

type="text"

name="nome"

value="<?= $dados["nome"] ?>"

required>

<input

type="number"

name="populacao"

value="<?= $dados["populacao"] ?>"

required>

<input

type="number"

step="0.01"

name="area"

value="<?= $dados["area_km2"] ?>"

required>

<input

type="number"

name="total"

value="<?= $dados["total_paises"] ?>"

required>

<button

type="submit"

name="atualizar">

Atualizar

</button>

</form>

<a

class="botao voltar"

href="listar.php">

Voltar

</a>

</div>

</body>

</html>