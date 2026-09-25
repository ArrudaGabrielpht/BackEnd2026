<?php

declare(strict_types=1);

// Define o caminho do arquivo de configuração
const ARQUIVO_CONFIG = __DIR__ . "/config/database.ini";

// Carrega os dados do ambiente escolhido
function carregarAmbiente(string $ambiente): array
{
    // Lê todas as seções do arquivo ini
    $dados = parse_ini_file(ARQUIVO_CONFIG, true);

    // Verifica se o ambiente existe
    if ($dados === false || !isset($dados[$ambiente])) {
        throw new RuntimeException("Ambiente não encontrado.");
    }

    return $dados[$ambiente];
}

// Cria uma conexão usando os dados do ambiente
function conectarAmbiente(array $config): PDO
{
    // Monta o endereço de conexão
    $dsn = sprintf(
        "pgsql:host=%s;port=%s;dbname=%s",
        $config["db_host"],
        $config["db_port"],
        $config["db_name"]
    );

    // Cria a conexão com as opções de segurança
    return new PDO(
        $dsn,
        $config["db_user"],
        $config["db_pass"],
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_TIMEOUT => 5
        ]
    );
}

try {
    // Carrega o ambiente de desenvolvimento
    $config = carregarAmbiente("development");

    // Realiza a conexão
    $pdo = conectarAmbiente($config);

    echo "Ambiente conectado: development\n";
    echo "Banco: " . $config["db_name"] . "\n";
} catch (PDOException $e) {
    // Mostra uma mensagem simples em caso de erro
    echo "Erro ao conectar com o ambiente.\n";
}