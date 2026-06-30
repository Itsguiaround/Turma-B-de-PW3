<?php

include("../conexao.php");

$paises = mysqli_query($conexao,"
SELECT * FROM Paises
ORDER BY nome");

$governantes = mysqli_query($conexao,"
SELECT * FROM Governantes_Cidades
ORDER BY nome");

if(isset($_POST["salvar"])){

    $nome = $_POST["nome"];
    $pais = $_POST["pais"];
    $populacao = $_POST["populacao"];
    $area = $_POST["area"];
    $clima = $_POST["clima"];
    $fundacao = $_POST["fundacao"];
    $governante = $_POST["governante"];

    if($governante==""){
        $governante="NULL";
    }

    $sql="INSERT INTO Cidades

    (nome,id_pais,populacao,area_km2,clima,data_fundacao,id_governante_cidade)

    VALUES

    ('$nome',
    '$pais',
    '$populacao',
    '$area',
    '$clima',
    '$fundacao',
    $governante)";

    mysqli_query($conexao,$sql);

    header("Location:listar.php");
    exit();

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Cadastrar Cidade</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Nova Cidade</h2>

<form method="POST">

<input
type="text"
name="nome"
placeholder="Nome da Cidade"
required>

<select
name="pais"
required>

<option value="">Selecione o País</option>

<?php

while($p=mysqli_fetch_assoc($paises)){

?>

<option value="<?= $p["id_pais"] ?>">

<?= $p["nome"] ?>

</option>

<?php } ?>

</select>

<input
type="number"
name="populacao"
placeholder="População"
required>

<input
type="number"
step="0.01"
name="area"
placeholder="Área em Km²"
required>

<input
type="text"
name="clima"
placeholder="Clima"
required>

<label>Data de Fundação</label>

<input
type="date"
name="fundacao"
required>

<select
name="governante">

<option value="">Sem Governante</option>

<?php

while($g=mysqli_fetch_assoc($governantes)){

?>

<option value="<?= $g["id_governante_cidade"] ?>">

<?= $g["nome"] ?>

</option>

<?php } ?>

</select>

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