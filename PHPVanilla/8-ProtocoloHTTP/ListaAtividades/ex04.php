<?php

declare(strict_types=1);

$valor = $_POST['valor_veiculo'] ?? '';
$entrada = $_POST['valor_entrada'] ?? '';
$parcelas = $_POST['numero_parcelas'] ?? '';

$opcoes = [12, 24, 36, 48, 60];
$erro = '';
$financiado = 0;
$juros = 0;
$parcela = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!is_numeric($valor) || $valor <= 0) {
        $erro = 'Valor do veículo inválido.';
    } elseif (!is_numeric($entrada) || $entrada < $valor * 0.20) {
        $erro = 'A entrada deve ser de pelo menos 20%.';
    } elseif (!in_array((int) $parcelas, $opcoes, true)) {
        $erro = 'Número de parcelas inválido.';
    } else {
        $financiado = (float) $valor - (float) $entrada;
        $juros = $financiado * 0.015 * (int) $parcelas;
        $parcela = ($financiado + $juros) / (int) $parcelas;
    }
}
?>

<style>
body { font-family: Arial; background: #f2f2f2; padding: 30px; color: #333; }
.container { width: 500px; }
h1 { color: #161222; }
form, .resultado { background: white; padding: 15px; border: 1px solid #ccc; }
input, select, button { width: 100%; padding: 10px; margin: 5px 0; box-sizing: border-box; }
button { background: #100d1b; color: white; border: none; }
.erro { color: red; }
.resultado { margin-top: 10px; }
.valor { color: green; font-weight: bold; }
</style>

<div class="container">

    <h1>Financiamento</h1>

    <form method="POST">

        <input type="number" name="valor_veiculo" step="0.01"
            placeholder="Valor do veículo"
            value="<?= htmlspecialchars($valor) ?>">

        <input type="number" name="valor_entrada" step="0.01"
            placeholder="Valor da entrada"
            value="<?= htmlspecialchars($entrada) ?>">

        <select name="numero_parcelas">
            <option value="">Escolha as parcelas</option>

            <?php foreach ($opcoes as $opcao): ?>
                <option value="<?= $opcao ?>"
                    <?= (int) $parcelas === $opcao ? 'selected' : '' ?>>
                    <?= $opcao ?>x
                </option>
            <?php endforeach; ?>
        </select>

        <button>Calcular</button>
    </form>

    <?php if ($erro): ?>
        <p class="erro"><?= htmlspecialchars($erro) ?></p>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="resultado">
            <p>Valor financiado:
                <span class="valor">
                    R$ <?= number_format($financiado, 2, ',', '.') ?>
                </span>
            </p>

            <p>Total de juros:
                R$ <?= number_format($juros, 2, ',', '.') ?>
            </p>

            <p>Valor da parcela:
                R$ <?= number_format($parcela, 2, ',', '.') ?>
            </p>
        </div>
    <?php endif; ?>

</div>