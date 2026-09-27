<?php

$host = "localhost";
$usuario = "root";
$senha = "P1s3G2t5J4@";
$banco = "bd_mundo";

$conexao = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

mysqli_set_charset($conexao,"utf8");

?>