<?php
declare(strict_types=1);

$extrato = [
    ["data"=>"2026-09-01", "descricao"=>"Salário", "tipo"=>"Entrada", "valor"=>4000.00],
    ["data"=>"2026-09-02", "descricao"=>"Supermercado", "tipo"=>"Saida", "valor"=>450.50],
    ["data"=>"2026-09-05", "descricao"=>"Pix João", "tipo"=>"Entrada", "valor"=>200.00],
    ["data"=>"2026-09-10", "descricao"=>"Conta de Luz", "tipo"=>"Saida", "valor"=>120.00],
    ["data"=>"2026-09-12", "descricao"=>"Cinema", "tipo"=>"Saida", "valor"=>65.00]
];

$totalEntradas = 0;
$totalSaidas = 0;

foreach ($extrato as $item) {
    if ($item["tipo"] == "Entrada") {
        $totalEntradas += $item["valor"];
    } else {
        $totalSaidas += $item["valor"];
    }
}

$saldoAtual = $totalEntradas - $totalSaidas;

echo "Entradas: R$ " . number_format($totalEntradas, 2, ",", ".") . "<br>";
echo "Saídas: R$ " . number_format($totalSaidas, 2, ",", ".") . "<br>";
echo "Saldo Atual: R$ " . number_format($saldoAtual, 2, ",", ".") . "<br><br>";

echo "<h2>Extrato</h2>";

foreach ($extrato as $item) {
    echo $item["data"] . " - " .
         $item["descricao"] . " - " .
         $item["tipo"] . " - R$ " .
         number_format($item["valor"], 2, ",", ".") . "<br>";
}

$gastosAltos = array_filter(
    $extrato,
    fn($item) => $item["tipo"] == "Saida" && $item["valor"] > 100
);

echo "<h2>Atenção: Gastos Altos do Mês</h2>";

foreach ($gastosAltos as $gasto) {
    echo $gasto["descricao"] . " - R$ " .
         number_format($gasto["valor"], 2, ",", ".") . "<br>";
}
?>