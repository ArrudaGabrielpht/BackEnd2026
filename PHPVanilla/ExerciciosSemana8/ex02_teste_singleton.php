<?php

declare(strict_types=1);

// Carrega a classe de conexão
require_once __DIR__ . "/src/ConexaoBanco.php";

// Define o caminho do arquivo de configuração
const ARQUIVO_CONFIG = __DIR__ . "/config/database.ini";

try {
    // Cria duas variáveis usando o Singleton
    $conexao1 = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);
    $conexao2 = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);

    // Mostra o ID de cada objeto
    echo "ID da conexão 1: " . spl_object_id($conexao1) . "\n";
    echo "ID da conexão 2: " . spl_object_id($conexao2) . "\n";

    // Verifica se as duas variáveis apontam para o mesmo objeto
    if ($conexao1 === $conexao2) {
        echo "Singleton funcionando: as duas conexões são o mesmo objeto.\n";
    }

    if ($conexao1 !== $conexao2) {
        echo "Singleton não está funcionando.\n";
    }
} catch (PDOException $e) {
    // Mostra uma mensagem simples em caso de erro
    echo "Erro ao conectar com o banco de dados.\n";
}