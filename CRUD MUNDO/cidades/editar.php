<?php

include("../conexao.php");

$id = (int)$_GET["id"];

$paises = mysqli_query($conexao,"
SELECT * FROM Paises
ORDER BY nome");

$governantes = mysqli_query($conexao,"
SELECT * FROM Governantes_Cidades
ORDER BY nome");

$sql = "SELECT * FROM Cidades
WHERE id_cidade = $id";

$resultado = mysqli_query($conexao,$sql);

$dados = mysqli_fetch_assoc($resultado);

if(isset($_POST["atualizar"])){

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

    $sql="UPDATE Cidades SET

    nome='$nome',
    id_pais='$pais',
    populacao='$populacao',
    area_km2='$area',
    clima='$clima',
    data_fundacao='$fundacao',
    id_governante_cidade=$governante

    WHERE id_cidade=$id";

    mysqli_query($conexao,$sql);

    header("Location:listar.php");
    exit();

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Editar Cidade</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Editar Cidade</h2>

<form method="POST">

<input
type="text"
name="nome"
value="<?= $dados['nome'] ?>"
required>

<select
name="pais"
required>

<?php

while($p=mysqli_fetch_assoc($paises)){

$selected = ($p["id_pais"]==$dados["id_pais"]) ? "selected" : "";

?>

<option
value="<?= $p["id_pais"] ?>"
<?= $selected ?>>

<?= $p["nome"] ?>

</option>

<?php } ?>

</select>

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
type="text"
name="clima"
value="<?= $dados["clima"] ?>"
required>

<label>Data de Fundação</label>

<input
type="date"
name="fundacao"
value="<?= $dados["data_fundacao"] ?>"
required>

<select
name="governante">

<option value="">Sem Governante</option>

<?php

while($g=mysqli_fetch_assoc($governantes)){

$selected = ($g["id_governante_cidade"]==$dados["id_governante_cidade"]) ? "selected" : "";

?>

<option
value="<?= $g["id_governante_cidade"] ?>"
<?= $selected ?>>

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

<a
class="botao voltar"
href="listar.php">

Voltar

</a>

</div>

</body>

</html>