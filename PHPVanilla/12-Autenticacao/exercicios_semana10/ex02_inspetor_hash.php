
<?php

declare(strict_types=1);

// Receber a senha pelo terminal
$senha = readline('Digite uma senha para analisar: ');

// Gerar o hash Argon2id
$hash = password_hash($senha, PASSWORD_ARGON2ID);

// Separar as partes do hash
$partes = explode('$', $hash);

echo "\n--- INSPEÇÃO DO HASH ---\n";

echo "Algoritmo: " . $partes[1] . "\n";

// Separar versão e custos
echo "Versão: " . $partes[2] . "\n";
echo "Custos: " . $partes[3] . "\n";

$custos = explode(',', $partes[3]);

echo "Memória: " . $custos[0] . "\n";
echo "Tempo: " . $custos[1] . "\n";
echo "Paralelismo: " . $custos[2] . "\n";

echo "Salt codificado em Base64: " . $partes[4] . "\n";
echo "Hash final: " . $partes[5] . "\n";

echo "\nHash completo:\n" . $hash . "\n";
