<?php

declare(strict_types=1);

// Configurar e iniciar a sessão
if (session_status() === PHP_SESSION_NONE) {
    session_set_cookie_params([
        'lifetime' => 0,
        'path' => '/',
        'httponly' => true,
        'samesite' => 'Lax'
    ]);
    session_start();
}

// Verificar o nível de permissão do usuário
function verificarPermissao(string $perfilMinimo): void {
    $niveis = ['OPERADOR' => 1, 'ADMIN' => 2];

    $perfil = $_SESSION['usuario_perfil'] ?? '';
    $nivelUsuario = $niveis[$perfil] ?? 0;
    $nivelMinimo = $niveis[$perfilMinimo] ?? 99;

    if ($nivelUsuario < $nivelMinimo) {
        http_response_code(403);
        echo '<h1>Acesso negado</h1>';
        echo '<p>Você não possui permissão para acessar esta página.</p>';
        exit;
    }
}

// Simular uma página exclusiva para administrador
if (!isset($_SESSION['usuario_id'])) {
    http_response_code(401);
    echo 'Você precisa realizar o login.';
    exit;
}

verificarPermissao('ADMIN');

echo '<h1>Relatórios gerenciais</h1>';
echo '<p>Acesso autorizado para administrador.</p>';
