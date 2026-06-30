<?php

include("../conexao.php");

$sql = "

SELECT

Governantes_Cidades.*,

Cidades.nome AS cidade,

Paises.nome AS pais

FROM Governantes_Cidades

LEFT JOIN Cidades

ON Cidades.id_governante_cidade = Governantes_Cidades.id_governante_cidade

LEFT JOIN Paises

ON Paises.id_pais = Cidades.id_pais

ORDER BY Governantes_Cidades.nome

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

<th>Cidade Governada</th>

<th>País</th>

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

<td><?= $dados["id_governante_cidade"] ?></td>

<td><?= $dados["cidade"] ?: "Não vinculada" ?></td>

<td><?= $dados["pais"] ?: "-" ?></td>

<td><?= $dados["nome"] ?></td>

<td><?= $dados["partido_politico"] ?></td>

<td><?= date("d/m/Y", strtotime($dados["data_nascimento"])) ?></td>

<td><?= $dados["idade"] ?></td>

<td><?= date("d/m/Y", strtotime($dados["inicio_mandato"])) ?></td>

<td><?= date("d/m/Y", strtotime($dados["fim_mandato"])) ?></td>

<td>

<a
class="botao editar"
href="editar.php?id=<?= $dados["id_governante_cidade"] ?>">

Editar

</a>

</td>

<td>

<a
class="botao excluir"
href="excluir.php?id=<?= $dados["id_governante_cidade"] ?>"
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