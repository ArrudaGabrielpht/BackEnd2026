<?php

declare(strict_types=1);

// Carrega a classe de conexão
require_once __DIR__ . "/src/ConexaoBanco.php";

const ARQUIVO_CONFIG = __DIR__ . "/config/database.ini";
const ARQUIVO_LOG = __DIR__ . "/logs/sistema.log";

// Registra mensagens no arquivo de log
function registrarLog(string $nivel, string $mensagem): void
{
    // Verifica se o nível informado é permitido
    if ($nivel == "INFO" || $nivel == "WARNING" || $nivel == "ERROR") {
        $data = date("Y-m-d H:i:s");
        $linha = "[$data] [$nivel] $mensagem" . PHP_EOL;

        // Adiciona a mensagem ao final do arquivo
        file_put_contents(ARQUIVO_LOG, $linha, FILE_APPEND);
    }
}

try {
    // Tenta realizar a conexão normal
    $pdo = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);

    // Registra a conexão realizada
    registrarLog("INFO", "Conexão com o banco realizada com sucesso.");

    echo "Conexão realizada com sucesso.\n";
} catch (PDOException $e) {
    // Registra o erro técnico no arquivo
    registrarLog("ERROR", $e->getMessage());

    echo "Erro ao conectar com o banco de dados.\n";
}

try {
    // Simula uma conexão com banco inexistente
    $pdo = new PDO(
        "pgsql:host=127.0.0.1;port=5432;dbname=banco_inexistente",
        "postgres",
        "postgres"
    );

    registrarLog("INFO", "Conexão simulada realizada.");
} catch (PDOException $e) {
    // Registra a falha simulada
    registrarLog("ERROR", $e->getMessage());

    echo "Falha simulada registrada no log.\n";
}