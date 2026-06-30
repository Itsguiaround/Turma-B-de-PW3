<?php

include("../conexao.php");

$cidades = mysqli_query($conexao,"
SELECT
    Cidades.id_cidade,
    Cidades.nome,
    Paises.nome AS pais
FROM Cidades
INNER JOIN Paises
ON Paises.id_pais = Cidades.id_pais
ORDER BY Cidades.nome");

if(isset($_POST["salvar"])){

    $nome = $_POST["nome"];
    $partido = $_POST["partido"];
    $nascimento = $_POST["nascimento"];
    $idade = $_POST["idade"];
    $inicio = $_POST["inicio"];
    $fim = $_POST["fim"];
    $cidade = $_POST["cidade"];
    $sql = "INSERT INTO Governantes_Cidades
    (nome,partido_politico,data_nascimento,idade,inicio_mandato,fim_mandato)

    VALUES

    ('$nome','$partido','$nascimento','$idade','$inicio','$fim')";

    mysqli_query($conexao,$sql);

    $id_governante = mysqli_insert_id($conexao);

    mysqli_query($conexao,"
    UPDATE Cidades
    SET id_governante_cidade = $id_governante
    WHERE id_cidade = $cidade");

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

<label>Cidade Governada</label>

<select name="cidade" required>

<option value="">Selecione uma Cidade</option>

<?php

while($c = mysqli_fetch_assoc($cidades)){

?>

<option value="<?= $c["id_cidade"] ?>">

<?= $c["nome"] ?> - <?= $c["pais"] ?>

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