<?php
/**
 * Inclua este arquivo no topo de TODA página que exige login:
 *
 *      require_once __DIR__ . '/usuarios/verifica_sessao.php';      // se a página está na raiz (index.php)
 *      require_once __DIR__ . '/../usuarios/verifica_sessao.php';   // se a página está em uma subpasta de módulo
 *                                                                // (continentes/, paises/, cidades/, etc.)
 *
 * Ele garante duas regras da atividade:
 *   1) Só passa quem estiver logado (senão -> tela de login);
 *   2) Quem estiver no primeiro acesso é obrigado a trocar a senha
 *      antes de usar qualquer outra tela do sistema.
 */

session_start();

// ---------------------------------------------------------------------
// AJUSTE AQUI: caminho, a partir da raiz do site, onde o projeto foi
// publicado no seu servidor. Ex.: se a pasta do projeto no htdocs
// chama "CRUD_Mundo", deixe '/CRUD_Mundo/'. Se está na raiz do
// site, deixe '/'.
// ---------------------------------------------------------------------
define('BASE_URL', '/CRUD_MUNDO/');

if (!isset($_SESSION['id_usuario'])) {
    header("Location: " . BASE_URL . "usuarios/login.php");
    exit;
}

// Nome do arquivo que está rodando agora (sem pasta), para não
// entrar em loop de redirecionamento na própria tela de troca de senha.
$arquivo_atual = basename($_SERVER['SCRIPT_NAME']);

if ((int) $_SESSION['primeiro_acesso'] === 1 && $arquivo_atual !== 'trocar_senha.php') {
    header("Location: " . BASE_URL . "usuarios/trocar_senha.php");
    exit;
}
