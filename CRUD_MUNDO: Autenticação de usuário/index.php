<?php
require_once __DIR__ . '/usuarios/verifica_sessao.php';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Sistema Mundo</title>

<link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="container">

<h1>Sistema Mundo</h1>

<p>
Gerenciamento de Continentes, Países,
Cidades e Governantes.
</p>

<p>
Logado como: <strong><?php echo htmlspecialchars($_SESSION['login']); ?></strong>
&nbsp;|&nbsp;
<a href="usuarios/logout.php">Sair</a>
</p>

<div class="menu">

<a href="continentes/listar.php">
🌎 Continentes
</a>

<a href="paises/listar.php">
🏳️ Países
</a>

<a href="cidades/listar.php">
🏙️ Cidades
</a>

<a href="governantes_paises/listar.php">
👑 Governantes dos Países
</a>

<a href="governantes_cidades/listar.php">
🏛️ Governantes das Cidades
</a>

</div>

</div>
</body>

</html>
