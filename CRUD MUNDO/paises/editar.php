<?php

include("../conexao.php");

$id = $_GET["id"];

$continentes = mysqli_query($conexao,"SELECT * FROM Continentes ORDER BY nome");

$governantes = mysqli_query($conexao,"SELECT * FROM Governantes_Paises ORDER BY nome");

$sql = "SELECT * FROM Paises WHERE id_pais = $id";

$resultado = mysqli_query($conexao,$sql);

$dados = mysqli_fetch_assoc($resultado);

if(isset($_POST["atualizar"])){

    $nome = $_POST["nome"];
    $continente = $_POST["continente"];
    $populacao = $_POST["populacao"];
    $area = $_POST["area"];
    $idioma = $_POST["idioma"];
    $clima = $_POST["clima"];
    $regime = $_POST["regime"];
    $moeda = $_POST["moeda"];
    $governante = $_POST["governante"];

    if($governante==""){
        $governante="NULL";
    }

    $sql = "UPDATE Paises SET

    nome='$nome',
    id_continente='$continente',
    populacao='$populacao',
    area_km2='$area',
    idioma='$idioma',
    clima='$clima',
    regime_politico='$regime',
    moeda='$moeda',
    id_governante_pais=$governante

    WHERE id_pais=$id";

    mysqli_query($conexao,$sql);

    header("Location:listar.php");
    exit();

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Editar País</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Editar País</h2>

<form method="POST">

<input
type="text"
name="nome"
value="<?= $dados['nome'] ?>"
required>

<select name="continente" required>

<?php

while($c=mysqli_fetch_assoc($continentes)){

$selected = ($c["id_continente"]==$dados["id_continente"]) ? "selected" : "";

?>

<option value="<?= $c["id_continente"] ?>" <?= $selected ?>>

<?= $c["nome"] ?>

</option>

<?php } ?>

</select>

<input
type="number"
name="populacao"
value="<?= $dados['populacao'] ?>"
required>

<input
type="number"
step="0.01"
name="area"
value="<?= $dados['area_km2'] ?>"
required>

<input
type="text"
name="idioma"
value="<?= $dados['idioma'] ?>"
required>

<input
type="text"
name="clima"
value="<?= $dados['clima'] ?>"
required>

<input
type="text"
name="regime"
value="<?= $dados['regime_politico'] ?>"
required>

<input
type="text"
name="moeda"
value="<?= $dados['moeda'] ?>"
required>

<select name="governante">

<option value="">Sem Governante</option>

<?php

while($g=mysqli_fetch_assoc($governantes)){

$selected = ($g["id_governante_pais"]==$dados["id_governante_pais"]) ? "selected" : "";

?>

<option value="<?= $g["id_governante_pais"] ?>" <?= $selected ?>>

<?= $g["nome"] ?>

</option>

<?php } ?>

</select>

<button
type="submit"
name="atualizar">

Atualizar

</button>

</form>

<a class="botao voltar" href="listar.php">

Voltar

</a>

</div>

</body>

</html>