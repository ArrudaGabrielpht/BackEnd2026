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

<h1>Financiamento</h1>

<form method="POST">
    <input
        type="number"
        name="valor_veiculo"
        placeholder="Valor do veículo"
        step="0.01"
        value="<?= htmlspecialchars($valor) ?>"
    >

    <input
        type="number"
        name="valor_entrada"
        placeholder="Valor da entrada"
        step="0.01"
        value="<?= htmlspecialchars($entrada) ?>"
    >

    <select name="numero_parcelas">
        <option value="">Parcelas</option>

        <?php foreach ($opcoes as $opcao): ?>
            <option value="<?= $opcao ?>" <?= (int) $parcelas === $opcao ? 'selected' : '' ?>>
                <?= $opcao ?>x
            </option>
        <?php endforeach; ?>
    </select>

    <button>Calcular</button>
</form>

<?php if ($erro): ?>
    <p><?= htmlspecialchars($erro) ?></p>
<?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
    <p>Valor financiado: R$ <?= number_format($financiado, 2, ',', '.') ?></p>
    <p>Total de juros: R$ <?= number_format($juros, 2, ',', '.') ?></p>
    <p>Valor da parcela: R$ <?= number_format($parcela, 2, ',', '.') ?></p>
<?php endif; ?>