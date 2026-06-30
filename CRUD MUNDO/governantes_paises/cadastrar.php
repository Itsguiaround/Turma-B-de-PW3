<?php

include("../conexao.php");

$paises = mysqli_query($conexao,"
SELECT *
FROM Paises
ORDER BY nome");

if(isset($_POST["salvar"])){

    $pais = $_POST["pais"];
    $nome = $_POST["nome"];
    $partido = $_POST["partido"];
    $nascimento = $_POST["nascimento"];
    $idade = $_POST["idade"];
    $inicio = $_POST["inicio"];
    $fim = $_POST["fim"];

    $sql = "INSERT INTO Governantes_Paises
    (id_pais,nome,partido_politico,data_nascimento,idade,inicio_mandato,fim_mandato)

    VALUES

    ('$pais','$nome','$partido','$nascimento','$idade','$inicio','$fim')";

    mysqli_query($conexao,$sql);

    $id_governante = mysqli_insert_id($conexao);

    mysqli_query($conexao,"
    UPDATE Paises
    SET id_governante_pais = $id_governante
    WHERE id_pais = $pais");

    header("Location:listar.php");
    exit();

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Cadastrar Governante</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Novo Governante</h2>

<form method="POST">

<input
type="text"
name="nome"
placeholder="Nome do Governante"
required>

<input
type="text"
name="partido"
placeholder="Partido Político"
required>

<label>Data de Nascimento</label>

<input
type="date"
name="nascimento"
required>

<input
type="number"
name="idade"
placeholder="Idade"
required>

<label>Início do Mandato</label>

<input
type="date"
name="inicio"
required>

<label>Fim do Mandato</label>

<input
type="date"
name="fim"
required>

<label>País Governado</label>

<select name="pais" required>

<option value="">Selecione um País</option>

<?php

while($p = mysqli_fetch_assoc($paises)){

?>

<option value="<?= $p["id_pais"] ?>">

<?= $p["nome"] ?>

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