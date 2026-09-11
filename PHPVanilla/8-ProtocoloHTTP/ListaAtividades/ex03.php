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

<style>
body { font-family: Arial; background: #f2f2f2; padding: 30px; color: #333; }
.container { width: 400px; }
h1 { color: #151220; }
form { background: white; padding: 15px; border: 1px solid #ccc; }
input, button { width: 100%; padding: 10px; margin: 5px 0; box-sizing: border-box; }
button { background: #141020; color: white; border: none; }
.erro { color: red; }
.sucesso { background: white; color: green; padding: 15px; margin-top: 10px; }
</style>

<div class="container">

    <h1>Login SENAI</h1>

    <form method="POST">
        <input type="email" name="email" placeholder="E-mail"
            value="<?= htmlspecialchars($email) ?>">

        <input type="password" name="senha" placeholder="Senha">

        <button>Entrar</button>
    </form>

    <?php if ($erro): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php endif; ?>

    <?php if ($sucesso): ?>
        <div class="sucesso">
            <strong>Bem-vindo!</strong>
            <p>Login realizado com sucesso.</p>
        </div>
    <?php endif; ?>

</div>