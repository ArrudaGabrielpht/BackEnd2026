<?php

declare(strict_types=1);

// Carrega a classe Singleton
require_once __DIR__ . "/src/ConexaoBanco.php";

const ARQUIVO_CONFIG = __DIR__ . "/config/database.ini";

// Carrega as configurações do banco
$config = parse_ini_file(ARQUIVO_CONFIG, true)["database"];

// Inicia o teste sem Singleton
$inicio = microtime(true);

// Cria 50 conexões diferentes
for ($i = 0; $i < 50; $i++) {
    $pdo = new PDO(
        "pgsql:host={$config["db_host"]};port={$config["db_port"]};dbname={$config["db_name"]}",
        $config["db_user"],
        $config["db_pass"]
    );
}

// Calcula o tempo gasto
$tempoSemSingleton = microtime(true) - $inicio;

// Inicia o teste com Singleton
$inicio = microtime(true);

// Reutiliza a mesma conexão 50 vezes
for ($i = 0; $i < 50; $i++) {
    $pdo = ConexaoBanco::obterConexao(ARQUIVO_CONFIG);
}

// Calcula o tempo gasto
$tempoComSingleton = microtime(true) - $inicio;

// Mostra os resultados em uma tabela HTML
echo "<table border='1'>";
echo "<tr><th>Método</th><th>Tempo</th></tr>";
echo "<tr><td>50 conexões PDO</td><td>" . $tempoSemSingleton . " segundos</td></tr>";
echo "<tr><td>50 chamadas Singleton</td><td>" . $tempoComSingleton . " segundos</td></tr>";
echo "</table>";