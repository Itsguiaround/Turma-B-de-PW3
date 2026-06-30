<?php

include("../conexao.php");

$id = $_GET["id"];

$sql = "SELECT * FROM Governantes_Paises WHERE id_governante_pais = $id";

$resultado = mysqli_query($conexao, $sql);

$dados = mysqli_fetch_assoc($resultado);

if(isset($_POST["atualizar"])){

    $nome = $_POST["nome"];
    $partido = $_POST["partido"];
    $nascimento = $_POST["nascimento"];
    $idade = $_POST["idade"];
    $inicio = $_POST["inicio"];
    $fim = $_POST["fim"];

    $sql = "UPDATE Governantes_Paises SET

    nome='$nome',
    partido_politico='$partido',
    data_nascimento='$nascimento',
    idade='$idade',
    inicio_mandato='$inicio',
    fim_mandato='$fim'

    WHERE id_governante_pais=$id";

    mysqli_query($conexao,$sql);

    header("Location:listar.php");
    exit();

}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Editar Governante</title>

<link rel="stylesheet" href="../css/style.css">

</head>

<body>

<div class="container">

<h2>Editar Governante</h2>

<form method="POST">

<input
type="text"
name="nome"
value="<?= $dados['nome'] ?>"
required>

<input
type="text"
name="partido"
value="<?= $dados['partido_politico'] ?>"
required>

<label>Data de Nascimento</label>

<input
type="date"
name="nascimento"
value="<?= $dados['data_nascimento'] ?>"
required>

<input
type="number"
name="idade"
value="<?= $dados['idade'] ?>"
required>

<label>Início do Mandato</label>

<input
type="date"
name="inicio"
value="<?= $dados['inicio_mandato'] ?>"
required>

<label>Fim do Mandato</label>

<input
type="date"
name="fim"
value="<?= $dados['fim_mandato'] ?>"
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