<?php
session_start();
require_once __DIR__ . '/../conexao.php';

// Se já está logado e já trocou a senha do primeiro acesso, não faz sentido
// ver a tela de login de novo.
if (isset($_SESSION['id_usuario']) && (int) $_SESSION['primeiro_acesso'] === 0) {
    header("Location: ../index.php");
    exit;
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login_digitado = trim($_POST['login']);
    $senha_digitada = $_POST['senha'];

    $stmt = mysqli_prepare($conexao, "SELECT id_usuario, login, senha, primeiro_acesso, tentativas_erradas, bloqueado FROM Usuarios WHERE login = ?");
    mysqli_stmt_bind_param($stmt, "s", $login_digitado);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);
    $usuario = mysqli_fetch_assoc($resultado);

    if (!$usuario) {
        // Login nem existe: registra a tentativa sem id_usuario e mostra
        // mensagem genérica (não revela se o usuário existe ou não).
        $stmt_log = mysqli_prepare($conexao, "INSERT INTO Logs(id_usuario, login_tentativa, status) VALUES (NULL, ?, 'falha')");
        mysqli_stmt_bind_param($stmt_log, "s", $login_digitado);
        mysqli_stmt_execute($stmt_log);

        $mensagem = "Usuário ou senha inválidos.";

    } elseif ((int) $usuario['bloqueado'] === 1) {

        $stmt_log = mysqli_prepare($conexao, "INSERT INTO Logs(id_usuario, login_tentativa, status) VALUES (?, ?, 'bloqueado')");
        mysqli_stmt_bind_param($stmt_log, "is", $usuario['id_usuario'], $login_digitado);
        mysqli_stmt_execute($stmt_log);

        $mensagem = "Usuário bloqueado por excesso de tentativas incorretas. Procure o administrador do sistema.";

    } elseif (password_verify($senha_digitada, $usuario['senha'])) {

        // Senha correta: zera o contador de erros e registra sucesso.
        mysqli_query($conexao, "UPDATE Usuarios SET tentativas_erradas = 0 WHERE id_usuario = " . (int) $usuario['id_usuario']);

        $stmt_log = mysqli_prepare($conexao, "INSERT INTO Logs(id_usuario, login_tentativa, status) VALUES (?, ?, 'sucesso')");
        mysqli_stmt_bind_param($stmt_log, "is", $usuario['id_usuario'], $login_digitado);
        mysqli_stmt_execute($stmt_log);

        $_SESSION['id_usuario'] = $usuario['id_usuario'];
        $_SESSION['login'] = $usuario['login'];
        $_SESSION['primeiro_acesso'] = (int) $usuario['primeiro_acesso'];

        if ($_SESSION['primeiro_acesso'] === 1) {
            header("Location: trocar_senha.php");
        } else {
            header("Location: ../index.php");
        }
        exit;

    } else {

        // Senha errada: incrementa o contador. Ao chegar em 3, bloqueia.
        $novas_tentativas = (int) $usuario['tentativas_erradas'] + 1;

        if ($novas_tentativas >= 3) {
            mysqli_query($conexao, "UPDATE Usuarios SET tentativas_erradas = $novas_tentativas, bloqueado = 1 WHERE id_usuario = " . (int) $usuario['id_usuario']);

            $stmt_log = mysqli_prepare($conexao, "INSERT INTO Logs(id_usuario, login_tentativa, status) VALUES (?, ?, 'bloqueado')");
            mysqli_stmt_bind_param($stmt_log, "is", $usuario['id_usuario'], $login_digitado);
            mysqli_stmt_execute($stmt_log);

            $mensagem = "Usuário bloqueado por excesso de tentativas incorretas. Procure o administrador do sistema.";
        } else {
            mysqli_query($conexao, "UPDATE Usuarios SET tentativas_erradas = $novas_tentativas WHERE id_usuario = " . (int) $usuario['id_usuario']);

            $stmt_log = mysqli_prepare($conexao, "INSERT INTO Logs(id_usuario, login_tentativa, status) VALUES (?, ?, 'falha')");
            mysqli_stmt_bind_param($stmt_log, "is", $usuario['id_usuario'], $login_digitado);
            mysqli_stmt_execute($stmt_log);

            $restantes = 3 - $novas_tentativas;
            $mensagem = "Usuário ou senha inválidos. Tentativa(s) restante(s): $restantes.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema Mundo - Login</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h1>Sistema Mundo</h1>
    <p>Faça login para continuar.</p>

    <?php if ($mensagem !== ""): ?>
        <p style="color: #b00020; font-weight: bold;"><?php echo htmlspecialchars($mensagem); ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label for="login">Usuário:</label><br>
        <input type="text" id="login" name="login" required autofocus><br><br>

        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>
