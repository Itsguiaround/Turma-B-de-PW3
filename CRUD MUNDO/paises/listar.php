<?php

include("../conexao.php");

$sql="SELECT

Paises.*,

Continentes.nome AS continente,

Governantes_Paises.nome AS governante

FROM Paises

INNER JOIN Continentes

ON Continentes.id_continente=Paises.id_continente

LEFT JOIN Governantes_Paises

ON Governantes_Paises.id_governante_pais=Paises.id_governante_pais

ORDER BY Paises.nome";

$resultado=mysqli_query($conexao,$sql);

?>

<!DOCTYPE html>

<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Países</title>

<link rel="stylesheet" href="../css/style.css">

<script src="../js/script.js"></script>

</head>

<body>

<div class="container">

<h1>Países</h1>

<a class="botao novo" href="cadastrar.php">

Novo País

</a>

<a class="botao voltar" href="../index.php">

Voltar

</a>

<table>

<tr>

<th>ID</th>

<th>Nome</th>

<th>Continente</th>

<th>População</th>

<th>Área</th>

<th>Idioma</th>

<th>Clima</th>

<th>Regime</th>

<th>Moeda</th>

<th>Governante</th>

<th>Editar</th>

<th>Excluir</th>

</tr>

<?php

while($dados=mysqli_fetch_assoc($resultado)){

?>

<tr>

<td><?= $dados["id_pais"] ?></td>

<td><?= $dados["nome"] ?></td>

<td><?= $dados["continente"] ?></td>

<td><?= number_format($dados["populacao"],0,",",".") ?></td>

<td><?= number_format($dados["area_km2"],2,",",".") ?></td>

<td><?= $dados["idioma"] ?></td>

<td><?= $dados["clima"] ?></td>

<td><?= $dados["regime_politico"] ?></td>

<td><?= $dados["moeda"] ?></td>

<td><?= $dados["governante"] ?></td>

<td>

<a

class="botao editar"

href="editar.php?id=<?= $dados["id_pais"] ?>">

Editar

</a>

</td>

<td>

<a

class="botao excluir"

href="excluir.php?id=<?= $dados["id_pais"] ?>"

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