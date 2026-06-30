<?php

include("../conexao.php");

$sql="SELECT

Cidades.*,

Paises.nome AS pais,

Governantes_Cidades.nome AS governante

FROM Cidades

INNER JOIN Paises

ON Paises.id_pais = Cidades.id_pais

LEFT JOIN Governantes_Cidades

ON Governantes_Cidades.id_governante_cidade = Cidades.id_governante_cidade

ORDER BY Cidades.nome";

$resultado=mysqli_query($conexao,$sql);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Cidades</title>

<link rel="stylesheet" href="../css/style.css">

<script src="../js/script.js"></script>

</head>

<body>

<div class="container">

<h1>Cidades</h1>

<a
class="botao novo"
href="cadastrar.php">

Nova Cidade

</a>

<a
class="botao voltar"
href="../index.php">

Voltar

</a>

<table>

<tr>

<th>ID</th>

<th>Nome</th>

<th>País</th>

<th>População</th>

<th>Área</th>

<th>Clima</th>

<th>Fundação</th>

<th>Governante</th>

<th>Editar</th>

<th>Excluir</th>

</tr>

<?php

while($dados=mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?= $dados["id_cidade"] ?></td>

<td><?= $dados["nome"] ?></td>

<td><?= $dados["pais"] ?></td>

<td><?= number_format($dados["populacao"],0,",",".") ?></td>

<td><?= number_format($dados["area_km2"],2,",",".") ?></td>

<td><?= $dados["clima"] ?></td>

<td><?= date("d/m/Y",strtotime($dados["data_fundacao"])) ?></td>

<td><?= $dados["governante"] ?></td>

<td>

<a
class="botao editar"
href="editar.php?id=<?= $dados["id_cidade"] ?>">

Editar

</a>

</td>

<td>

<a
class="botao excluir"
href="excluir.php?id=<?= $dados["id_cidade"] ?>"
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