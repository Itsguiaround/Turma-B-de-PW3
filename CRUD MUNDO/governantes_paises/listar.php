<?php

include("../conexao.php");

$sql = "

SELECT

Governantes_Paises.*,

Paises.nome AS pais

FROM Governantes_Paises

LEFT JOIN Paises

ON Paises.id_governante_pais = Governantes_Paises.id_governante_pais

ORDER BY Governantes_Paises.nome

";

$resultado = mysqli_query($conexao,$sql);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Governantes</title>

<link rel="stylesheet" href="../css/style.css">

<script src="../js/script.js"></script>

</head>

<body>

<div class="container">

<h1>Governantes</h1>

<a class="botao novo" href="cadastrar.php">

Novo Governante

</a>

<a class="botao voltar" href="../index.php">

Voltar

</a>

<table>

<tr>

<th>ID</th>

<th>País Governado</th>

<th>Nome</th>

<th>Partido</th>

<th>Nascimento</th>

<th>Idade</th>

<th>Início do Mandato</th>

<th>Fim do Mandato</th>

<th>Editar</th>

<th>Excluir</th>

</tr>

<?php

while($dados = mysqli_fetch_assoc($resultado)){

?>

<tr>

<tr>

<td><?= $dados["id_governante_pais"] ?></td>

<td><?= $dados["pais"] ?: "Não vinculado" ?></td>

<td><?= $dados["nome"] ?></td>

<td><?= $dados["partido_politico"] ?></td>

<td><?= date("d/m/Y", strtotime($dados["data_nascimento"])) ?></td>

<td><?= $dados["idade"] ?></td>

<td><?= date("d/m/Y", strtotime($dados["inicio_mandato"])) ?></td>

<td><?= date("d/m/Y", strtotime($dados["fim_mandato"])) ?></td>

<a
class="botao editar"
href="editar.php?id=<?= $dados["id_governante_pais"] ?>">

Editar

</a>

</td>

<td>

<a
class="botao excluir"
href="excluir.php?id=<?= $dados["id_governante_pais"] ?>"
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