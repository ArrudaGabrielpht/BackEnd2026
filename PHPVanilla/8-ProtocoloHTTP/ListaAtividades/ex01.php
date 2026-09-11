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

<h1>Busca de Produtos</h1>

<form method="GET">
    <input type="text" name="nome" placeholder="Nome" value="<?= htmlspecialchars($nome) ?>">
    <input type="number" name="preco_maximo" placeholder="Preço máximo" value="<?= htmlspecialchars($precoMaximo) ?>">
    <button>Buscar</button>
</form>

<?php foreach ($produtos as $produto): ?>
    <p>
        <?= htmlspecialchars($produto['nome']) ?> -
        <?= htmlspecialchars($produto['categoria']) ?> -
        R$ <?= number_format($produto['preco'], 2, ',', '.') ?>
    </p>
<?php endforeach; ?>

<?php if (!$produtos): ?>
    <p>Nenhum produto encontrado.</p>
<?php endif; ?>