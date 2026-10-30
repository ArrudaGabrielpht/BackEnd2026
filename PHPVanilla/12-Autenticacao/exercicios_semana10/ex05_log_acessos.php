<?php

declare(strict_types=1);

require_once __DIR__ . '/../ASAutenticacao/SAAutenticacao/src/ConexaoBanco.php';
require_once __DIR__ . '/../ASAutenticacao/SAAutenticacao/src/UsuarioDAO.php';

const CONFIG_PATH = __DIR__ . '/../ASAutenticacao/SAAutenticacao/config/database.ini';

// Iniciar sessão com cookies protegidos
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Registrar uma tentativa de autenticação
function registrarTentativa(PDO $pdo, string $email, bool $sucesso): void {
    $sql = "INSERT INTO auditoria_logins
            (email, ip, user_agent, sucesso)
            VALUES (:email, :ip, :agente, :sucesso)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':email' => $email,
        ':ip' => $_SERVER['REMOTE_ADDR'] ?? 'desconhecido',
        ':agente' => $_SERVER['HTTP_USER_AGENT'] ?? 'desconhecido',
        ':sucesso' => $sucesso
    ]);
}

$pdo = ConexaoBanco::obterConexao(CONFIG_PATH);
$dao = new UsuarioDAO($pdo);
$erro = '';

// Processar tentativa de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $senha = (string)($_POST['senha'] ?? '');

    $usuario = $dao->buscarPorEmail($email);
    $autenticado = $usuario !== null
        && password_verify($senha, $usuario['senha_hash']);

    registrarTentativa($pdo, $email, $autenticado);

    if ($autenticado) {
        session_regenerate_id(true);
        $_SESSION['usuario_id'] = (int)$usuario['id'];
        $_SESSION['usuario_nome'] = $usuario['nome'];
        $_SESSION['usuario_perfil'] = $usuario['perfil'];
    } else {
        $erro = 'E-mail ou senha incorretos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Auditoria de acessos</title>
</head>
<body>

<h1>Autenticação e auditoria</h1>

<?php if ($erro !== ''): ?>
    <p><?= htmlspecialchars($erro, ENT_QUOTES, 'UTF-8') ?></p>
<?php endif; ?>

<?php if (!isset($_SESSION['usuario_id'])): ?>
    <form method="POST">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="senha" placeholder="Senha" required>
        <button type="submit">Entrar</button>
    </form>
<?php elseif ($_SESSION['usuario_perfil'] === 'ADMIN'): ?>

    <h2>Últimas tentativas de acesso</h2>

    <?php
    $sql = "SELECT * FROM auditoria_logins
            ORDER BY data_hora DESC LIMIT 20";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <table border="1" cellpadding="8">
        <tr>
            <th>E-mail</th>
            <th>IP</th>
            <th>Navegador</th>
            <th>Resultado</th>
            <th>Data</th>
        </tr>

        <?php foreach ($registros as $registro): ?>
            <tr>
                <td><?= htmlspecialchars($registro['email']) ?></td>
                <td><?= htmlspecialchars($registro['ip']) ?></td>
                <td><?= htmlspecialchars($registro['user_agent'] ?? '') ?></td>
                <td><?= $registro['sucesso'] ? 'Sucesso' : 'Falha' ?></td>
                <td><?= htmlspecialchars($registro['data_hora']) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php else: ?>
    <h2>Acesso permitido</h2>
    <p>Você está autenticado, mas não possui permissão para consultar a auditoria.</p>
<?php endif; ?>

</body>
</html>