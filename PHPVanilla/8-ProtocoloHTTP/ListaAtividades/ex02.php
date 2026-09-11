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
$cor = '#333';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($peso) || $peso < 20 || $peso > 300) {
        $erro = 'Peso inválido.';
    } elseif (!is_numeric($altura) || $altura < 0.5 || $altura > 2.5) {
        $erro = 'Altura inválida.';
    } else {
        $imc = calcularIMC((float) $peso, (float) $altura);
        $classificacao = classificarIMC($imc);

        if ($classificacao === 'Normal') $cor = 'green';
        elseif ($classificacao === 'Sobrepeso') $cor = '#b88600';
        elseif ($classificacao === 'Obesidade') $cor = 'red';
    }
}
?>

<style>
body { font-family: Arial; background: #f2f2f2; padding: 30px; color: #333; }
.container { width: 500px; }
h1 { color: #141022; }
form, .resultado { background: white; padding: 15px; border: 1px solid #ccc; }
input, button { width: 100%; padding: 10px; margin: 5px 0; box-sizing: border-box; }
button { background: #130f20; color: white; border: none; }
.erro { color: red; }
.resultado { margin-top: 10px; }
</style>

<div class="container">

    <h1>Calculadora de IMC</h1>

    <form method="POST">
        <input type="text" name="nome" placeholder="Nome"
            value="<?= htmlspecialchars($nome) ?>">

        <input type="number" name="peso" step="0.1" placeholder="Peso em kg"
            value="<?= htmlspecialchars($peso) ?>">

        <input type="number" name="altura" step="0.01" placeholder="Altura em metros"
            value="<?= htmlspecialchars($altura) ?>">

        <button>Calcular</button>
    </form>

    <?php if ($erro): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php elseif ($imc !== null): ?>
        <div class="resultado">
            <p>Nome: <?= htmlspecialchars($nome) ?></p>
            <p>IMC: <?= number_format($imc, 2, ',', '.') ?></p>
            <strong style="color: <?= $cor ?>">
                <?= htmlspecialchars($classificacao) ?>
            </strong>
        </div>
    <?php endif; ?>

</div>