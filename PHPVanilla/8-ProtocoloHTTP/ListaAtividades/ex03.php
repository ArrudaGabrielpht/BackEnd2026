<?php

declare(strict_types=1);

$email = $_POST['email'] ?? '';
$erro = '';
$sucesso = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'Digite um e-mail válido.';
    } elseif (strlen($senha) < 6) {
        $erro = 'A senha deve ter no mínimo 6 caracteres.';
    } elseif ($email === 'admin@senai.br' && $senha === 'senhaSegura123') {
        $sucesso = true;
    } else {
        $erro = 'Credenciais inválidas';
    }
}
?>

<h1>Login</h1>

<form method="POST">
    <input type="email" name="email" placeholder="E-mail" value="<?= htmlspecialchars($email) ?>">
    <input type="password" name="senha" placeholder="Senha">
    <button>Entrar</button>
</form>

<?php if ($erro): ?>
    <p><?= htmlspecialchars($erro) ?></p>
<?php endif; ?>

<?php if ($sucesso): ?>
    <h2>Bem-vindo!</h2>
<?php endif; ?>