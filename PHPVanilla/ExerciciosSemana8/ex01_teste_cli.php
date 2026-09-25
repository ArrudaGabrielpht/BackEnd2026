<?php

declare(strict_types=1);

// Carrega a classe de conexão
require_once __DIR__ . "/src/ConexaoBanco.php";

// Define o caminho do arquivo de configuração
const ARQUIVO_CONFIG = __DIR__ . "/config/database.ini";

try {
    // Obtém a conexão com o banco
    $pdo = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);

    // Consulta a versão do PostgreSQL
    $resultado = $pdo->query("SELECT version()");
    $versao = $resultado->fetchColumn();

    echo "Conexão realizada com sucesso!\n";
    echo "PostgreSQL: " . $versao . "\n";
} catch (PDOException $e) {
    // Mostra uma mensagem simples em caso de erro
    echo "Erro ao conectar com o banco de dados.\n";
}