<?php

declare(strict_types=1);

require_once __DIR__ . '/../ASAutenticacao/SAAutenticacao/src/ConexaoBanco.php';
require_once __DIR__ . '/../ASAutenticacao/SAAutenticacao/src/UsuarioDAO.php';

const CONFIG_PATH = __DIR__ . '/../ASAutenticacao/SAAutenticacao/config/database.ini';

// Iniciar a sessão com proteção de cookies
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Inicializar o controle de tentativas
$_SESSION['tentativas_login'] ??= 0;
$_SESSION['bloqueio_ate'] ??= 0;

$erro = '';
$sucesso = '';
$tempoRestante = max(0, $_SESSION['bloqueio_ate'] - time());

// Processar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $tempoRestante === 0) {
    $email = trim($_POST['email'] ?? '');
    $senha = (string)($_POST['senha'] ?? '');

    try {
        $pdo = ConexaoBanco::obterConexao(CONFIG_PATH);
        $dao = new UsuarioDAO($pdo);
        $usuario = $dao->buscarPorEmail($email);

        if ($usuario && password_verify($senha, $usuario['senha_hash'])) {
            $_SESSION['tentativas_login'] = 0;
            $_SESSION['bloqueio_ate'] = 0;
            session_regenerate_id(true);
            $_SESSION['usuario_id'] = (int)$usuario['id'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['usuario_perfil'] = $usuario['perfil'];
            $sucesso = 'Login realizado com sucesso!';
        } else {
            $_SESSION['tentativas_login']++;

            if ($_SESSION['tentativas_login'] >= 3) {
                $_SESSION['bloqueio_ate'] = time() + 60;
                $erro = 'Muitas tentativas. Aguarde 60 segundos.';
            } else {
                $erro = 'E-mail ou senha incorretos.';
            }
        }
    } catch (Throwable $erroBanco) {
        $erro = 'Não foi possível realizar a autenticação.';
    }
}

// Atualizar o contador de bloqueio
$tempoRestante = max(0, $_SESSION['bloqueio_ate'] - time());

if ($tempoRestante === 0 && $_SESSION['bloqueio_ate'] > 0) {
    $_SESSION['tentativas_login'] = 0;
    $_SESSION['bloqueio_ate'] = 0;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Controle de tentativas</title>
</head>
<body>

<h1>Login</h1>

<?php if ($erro !== ''): ?>
    <p><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p>
<?php endif; ?>

<?php if ($sucesso !== ''): ?>
    <p><?= htmlspecialchars($sucesso, ENT_QUOTES, 'UTF-8') ?></p>
<?php endif; ?>

<?php if ($tempoRestante > 0): ?>
    <h2>Acesso bloqueado</h2>
    <p id="contador"><?= $tempoRestante ?></p>
    <script>
        let tempo = <?= $tempoRestante ?>;
        const contador = document.getElementById('contador');

        const intervalo = setInterval(() => {
            tempo--;
            contador.textContent = tempo;

            if (tempo <= 0) {
                clearInterval(intervalo);
                location.reload();
            }
        }, 1000);
    </script>
<?php else: ?>
    <form method="POST">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
<?php endif; ?>

<p>Tentativas: <?= (int)$_SESSION['tentativas_login'] ?>/3</p>

</body>
</html>