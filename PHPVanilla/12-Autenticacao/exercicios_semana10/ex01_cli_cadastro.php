<?php

declare(strict_types=1);

require_once __DIR__ . '/../ASAutenticacao/SAAutenticacao/src/ConexaoBanco.php';
require_once __DIR__ . '/../ASAutenticacao/SAAutenticacao/src/UsuarioDAO.php';

const CONFIG_PATH = __DIR__ . '/../ASAutenticacao/SAAutenticacao/config/database.ini';

// Validar a complexidade da senha
function senhaValida(string $senha): bool {
    return strlen($senha) >= 8
        && preg_match('/[A-Z]/', $senha)
        && preg_match('/[a-z]/', $senha)
        && preg_match('/[0-9]/', $senha)
        && preg_match('/[^a-zA-Z0-9]/', $senha);
}

// Ler os dados pelo terminal
$nome = readline('Nome: ');
$email = readline('E-mail: ');
$senha = readline('Senha: ');

if (!senhaValida($senha)) {
    echo "Senha fora dos requisitos de segurança.\n";
    exit;
}

try {
    $pdo = ConexaoBanco::obterConexao(CONFIG_PATH);
    $dao = new UsuarioDAO($pdo);

    if ($dao->emailExiste($email)) {
        echo "E-mail já cadastrado.\n";
        exit;
    }

    $resultado = $dao->cadastrar($nome, $email, $senha);

    echo $resultado
        ? "Colaborador cadastrado com sucesso!\n"
        : "Erro ao cadastrar colaborador.\n";

} catch (Throwable $erro) {
    echo "Erro na operação: " . $erro->getMessage() . "\n";
}
