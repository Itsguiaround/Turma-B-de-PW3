<?php

include("../conexao.php");

if(isset($_POST["salvar"])){

$nome=$_POST["nome"];
$pop=$_POST["populacao"];
$area=$_POST["area"];
$total=$_POST["total"];

$sql="INSERT INTO Continentes
(nome,populacao,area_km2,total_paises)

VALUES

('$nome','$pop','$area','$total')";

mysqli_query($conexao,$sql);

header("Location:listar.php");

}

?>

<!DOCTYPE html>

<html>

<head>

<meta charset="UTF-8">

<link rel="stylesheet" href="../css/style.css">

<title>Cadastrar Continente</title>

</head>

<body>

<div class="container">

<h2>Novo Continente</h2>

<form method="POST">

<input
type="text"
name="nome"
placeholder="Nome"
required>

<input
type="number"
name="populacao"
placeholder="População"
required>

<input
type="number"
step="0.01"
name="area"
placeholder="Área"
required>

<input
type="number"
name="total"
placeholder="Quantidade de Países"
required>

<button
type="submit"
name="salvar">

Cadastrar

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