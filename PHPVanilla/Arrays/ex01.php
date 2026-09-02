<?php
declare(strict_types=1);

$notas = [7.5, 8.0, 6.5, 9.0, 5.5];
$soma = 0;

foreach ($notas as $nota) {
    $soma += $nota;
}

$media = $soma / count($notas);

echo "A média final do aluno é " . number_format($media, 1);

if ($media >= 7) {
    echo "<p style='color:green'>Aprovado</p>";
} else {
    echo "<p style='color:red'>Reprovado</p>";
}
?>
