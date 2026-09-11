<?php

declare(strict_types=1);

$produtos = [
    ['nome' => 'Teclado USB', 'categoria' => 'Eletrônicos', 'preco' => 80],
    ['nome' => 'Mouse Gamer', 'categoria' => 'Eletrônicos', 'preco' => 120],
    ['nome' => 'Monitor 24"', 'categoria' => 'Eletrônicos', 'preco' => 750],
    ['nome' => 'Cadeira Gamer', 'categoria' => 'Móveis', 'preco' => 900],
    ['nome' => 'Fone Bluetooth', 'categoria' => 'Eletrônicos', 'preco' => 150],
    ['nome' => 'Mesa', 'categoria' => 'Móveis', 'preco' => 450]
];

$nome = $_GET['nome'] ?? '';
$precoMaximo = $_GET['preco_maximo'] ?? '';

$produtos = array_filter($produtos, function ($produto) use ($nome, $precoMaximo) {
    return ($nome === '' || stripos($produto['nome'], $nome) !== false)
        && ($precoMaximo === '' || $produto['preco'] <= (float) $precoMaximo);
});
?>

<style>
    body {
        font-family: Arial;
        background: #f2f2f2;
        padding: 30px;
        color: #333;
    }

    .container {
        width: 600px;
    }

    h1 {
        color: #130f24;
    }

    form {
        background: white;
        padding: 20px;
        border: 1px solid #ccc;
    }

    input, button {
        padding: 10px;
        margin: 5px;
    }

    button {
        background: #080511;
        color: white;
        border: none;
    }

    .produto {
        background: white;
        padding: 15px;
        margin-top: 10px;
        border: 1px solid #ccc;
    }

    .produto p {
        color: #777;
    }

    .preco {
        color: green;
        font-weight: bold;
    }
</style>

<div class="container">

    <h1>Busca de Produtos</h1>

    <form method="GET">
        <input type="text" name="nome" placeholder="Nome"
            value="<?= htmlspecialchars($nome) ?>">

        <input type="number" name="preco_maximo"
            placeholder="Preço máximo"
            value="<?= htmlspecialchars($precoMaximo) ?>">

        <button>Buscar</button>
    </form>

    <?php foreach ($produtos as $produto): ?>
        <div class="produto">
            <strong><?= htmlspecialchars($produto['nome']) ?></strong>

            <p><?= htmlspecialchars($produto['categoria']) ?></p>

            <span class="preco">
                R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
            </span>
        </div>
    <?php endforeach; ?>

    <?php if (!$produtos): ?>
        <p>Nenhum produto encontrado.</p>
    <?php endif; ?>

</div>