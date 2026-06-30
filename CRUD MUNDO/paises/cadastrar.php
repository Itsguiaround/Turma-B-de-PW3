<?php

include("../conexao.php");

$continentes = mysqli_query($conexao,"SELECT * FROM Continentes ORDER BY nome");

$governantes = mysqli_query($conexao,"SELECT * FROM Governantes_Paises ORDER BY nome");

if(isset($_POST["salvar"])){

$nome=$_POST["nome"];
$continente=$_POST["continente"];
$populacao=$_POST["populacao"];
$area=$_POST["area"];
$idioma=$_POST["idioma"];
$clima=$_POST["clima"];
$regime=$_POST["regime"];
$moeda=$_POST["moeda"];
$governante=$_POST["governante"];

$sql="INSERT INTO Paises
(nome,id_continente,populacao,area_km2,idioma,clima,regime_politico,moeda,id_governante_pais)

VALUES

('$nome','$continente','$populacao','$area','$idioma','$clima','$regime','$moeda','$governante')";

mysqli_query($conexao,$sql);

header("Location:listar.php");
exit();

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Cadastrar País</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Novo País</h2>

<form method="POST">

<input
type="text"
name="nome"
placeholder="Nome do País"
required>

<select name="continente" required>

<option value="">Selecione o Continente</option>

<?php

while($c=mysqli_fetch_assoc($continentes)){

?>

<option value="<?= $c['id_continente'] ?>">

<?= $c['nome'] ?>

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
name="idioma"
placeholder="Idioma"
required>

<input
type="text"
name="clima"
placeholder="Clima"
required>

<input
type="text"
name="regime"
placeholder="Regime Político"
required>

<input
type="text"
name="moeda"
placeholder="Moeda"
required>

<select name="governante">

<option value="">Selecione o Governante</option>

<?php

while($g=mysqli_fetch_assoc($governantes)){

?>

<option value="<?= $g['id_governante_pais'] ?>">

<?= $g['nome'] ?>

</option>

<?php } ?>

</select>

<button
type="submit"
name="salvar">

Cadastrar

</button>

</form>

<a class="botao voltar" href="listar.php">

Voltar

</a>

</div>

</body>

</html>