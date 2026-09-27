<?php
session_start();
require_once __DIR__ . '/../conexao.php';

// Só pode chegar aqui quem já fez login.
if (!isset($_SESSION['id_usuario'])) {
    header("Location: login.php");
    exit;
}

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nova_senha = $_POST['nova_senha'];
    $confirmar_senha = $_POST['confirmar_senha'];

    if (strlen($nova_senha) < 6) {
        $mensagem = "A nova senha deve ter pelo menos 6 caracteres.";
    } elseif ($nova_senha !== $confirmar_senha) {
        $mensagem = "As senhas digitadas não coincidem.";
    } else {
        $hash = password_hash($nova_senha, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($conexao, "UPDATE Usuarios SET senha = ?, primeiro_acesso = 0 WHERE id_usuario = ?");
        mysqli_stmt_bind_param($stmt, "si", $hash, $_SESSION['id_usuario']);
        mysqli_stmt_execute($stmt);

        $_SESSION['primeiro_acesso'] = 0;

        header("Location: ../index.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sistema Mundo - Trocar Senha</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<div class="container">
    <h1>Troca de senha obrigatória</h1>
    <p>Este é o seu primeiro acesso. Defina uma nova senha para continuar.</p>

    <?php if ($mensagem !== ""): ?>
        <p style="color: #b00020; font-weight: bold;"><?php echo htmlspecialchars($mensagem); ?></p>
    <?php endif; ?>

    <form method="POST" action="trocar_senha.php">
        <label for="nova_senha">Nova senha:</label><br>
        <input type="password" id="nova_senha" name="nova_senha" required minlength="6"><br><br>

        <label for="confirmar_senha">Confirmar nova senha:</label><br>
        <input type="password" id="confirmar_senha" name="confirmar_senha" required minlength="6"><br><br>

        <button type="submit">Salvar nova senha</button>
    </form>
</div>

</body>
</html>
