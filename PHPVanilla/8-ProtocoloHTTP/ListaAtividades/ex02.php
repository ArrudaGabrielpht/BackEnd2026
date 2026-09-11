<?php

declare(strict_types=1);

function calcularIMC(float $peso, float $altura): float
{
    return $peso / ($altura * $altura);
}

function classificarIMC(float $imc): string
{
    if ($imc < 18.5) return 'Abaixo do peso';
    if ($imc < 25) return 'Normal';
    if ($imc < 30) return 'Sobrepeso';
    return 'Obesidade';
}

$nome = $_POST['nome'] ?? '';
$peso = $_POST['peso'] ?? '';
$altura = $_POST['altura'] ?? '';
$erro = '';
$imc = null;
$classificacao = '';
$cor = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($peso) || $peso < 20 || $peso > 300) {
        $erro = 'Peso inválido.';
    } elseif (!is_numeric($altura) || $altura < 0.5 || $altura > 2.5) {
        $erro = 'Altura inválida.';
    } else {
        $imc = calcularIMC((float) $peso, (float) $altura);
        $classificacao = classificarIMC($imc);

        if ($classificacao === 'Normal') $cor = 'green';
        elseif ($classificacao === 'Sobrepeso') $cor = 'orange';
        elseif ($classificacao === 'Obesidade') $cor = 'red';
    }
}
?>

<h1>Calculadora de IMC</h1>

<form method="POST">
    <input type="text" name="nome" placeholder="Nome" value="<?= htmlspecialchars($nome) ?>">
    <input type="number" name="peso" step="0.1" placeholder="Peso" value="<?= htmlspecialchars($peso) ?>">
    <input type="number" name="altura" step="0.01" placeholder="Altura" value="<?= htmlspecialchars($altura) ?>">
    <button>Calcular</button>
</form>

<?php if ($erro): ?>
    <p><?= htmlspecialchars($erro) ?></p>
<?php elseif ($imc !== null): ?>
    <p>Nome: <?= htmlspecialchars($nome) ?></p>
    <p>IMC: <?= number_format($imc, 2, ',', '.') ?></p>
    <p style="color: <?= $cor ?>">
        Classificação: <?= htmlspecialchars($classificacao) ?>
    </p>
<?php endif; ?>