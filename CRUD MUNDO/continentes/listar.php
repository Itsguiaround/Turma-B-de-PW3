<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../conexao.php");

$sql = "SELECT * FROM Continentes";

$resultado = mysqli_query($conexao, $sql);

if(!$resultado){
    die(mysqli_error($conexao));
}

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Continentes</title>

<link rel="stylesheet" href="../css/style.css">

<script src="../js/script.js"></script>

</head>

<body>

<div class="container">

<h1>Continentes</h1>

<a class="botao novo" href="cadastrar.php">
Novo Continente
</a>

<a class="botao voltar" href="../index.php">
Voltar
</a>

<table>

<tr>

<th>ID</th>

<th>Nome</th>

<th>População</th>

<th>Área (Km²)</th>

<th>Total Países</th>

<th>Editar</th>

<th>Excluir</th>

</tr>

<?php

while($dados=mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?= $dados["id_continente"] ?></td>

<td><?= $dados["nome"] ?></td>

<td><?= number_format($dados["populacao"],0,",",".") ?></td>

<td><?= number_format($dados["area_km2"],2,",",".") ?></td>

<td><?= $dados["total_paises"] ?></td>

<td>

<a class="botao editar"

href="editar.php?id=<?= $dados["id_continente"] ?>">

Editar

</a>

</td>

<td>

<a

class="botao excluir"

href="excluir.php?id=<?= $dados["id_continente"] ?>"

onclick="return confirmarExclusao()">

Excluir

</a>

</td>

</tr>

<?php

}

?>

</table>

</div>

</body>

</html>