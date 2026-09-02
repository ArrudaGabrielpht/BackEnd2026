<?php
declare(strict_types=1);

$produtos = [
    ['id' => 1, 'nome' => 'iPhone 15', 'categoria' => 'Smartphone', 'preco' => 6500.00],
    ['id' => 2, 'nome' => 'Galaxy S24', 'categoria' => 'Smartphone', 'preco' => 5400.00],
    ['id' => 3, 'nome' => 'MacBook Air', 'categoria' => 'Notebook', 'preco' => 8900.00],
    ['id' => 4, 'nome' => 'Monitor Dell 27', 'categoria' => 'Perifericos', 'preco' => 1200.00],
    ['id' => 5, 'nome' => 'Mouse Logitech', 'categoria' => 'Perifericos', 'preco' => 450.00],
];

$smartphones = array_filter(
    $produtos,
    fn($p) => $p['categoria'] == 'Smartphone'
);

$smartphonesComDesconto = array_map(function($p) {
    $p['preco'] *= 0.85;
    return $p;
}, $smartphones);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>InnerTechs</title>

    <style>
        body {
            font-family: Arial;
            margin: 0;
            padding: 40px;
            background-color: #f1f2f6;
            text-align: center;
        }

        h1 {
            margin-bottom: 5px;
        }

        .subtitulo {
            color: #777;
            margin-bottom: 30px;
        }

        .card {
            background-color: white;
            border-radius: 12px;
            padding: 20px;
            margin: 10px;
            width: 250px;
            display: inline-block;
            vertical-align: top;
            box-shadow: 0 4px 10px rgba(0,0,0,0.12);
            text-align: left;
        }

        .categoria {
            color: #777;
            font-size: 13px;
            text-transform: uppercase;
        }

        .card h2 {
            margin: 12px 0;
        }

        .preco-antigo {
            color: #999;
            text-decoration: line-through;
            margin-bottom: 5px;
        }

        .preco {
            color: #27ae60;
            font-size: 22px;
            font-weight: bold;
            margin-top: 5px;
        }

        .desconto {
            display: inline-block;
            background-color: #27ae60;
            color: white;
            padding: 5px 8px;
            border-radius: 5px;
            font-size: 12px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <h1>InnerTechs</h1>
    <p class="subtitulo">Ofertas especiais em Smartphones</p>

    <?php foreach ($smartphonesComDesconto as $produto): ?>

        <div class="card">

            <span class="categoria">
                <?php echo $produto['categoria']; ?>
            </span>

            <h2>
                <?php echo $produto['nome']; ?>
            </h2>

            <span class="desconto">15% OFF</span>

            <p class="preco-antigo">
                R$ <?php echo number_format($produto['preco'] / 0.85, 2, ",", "."); ?>
            </p>

            <p class="preco">
                R$ <?php echo number_format($produto['preco'], 2, ",", "."); ?>
            </p>

        </div>

    <?php endforeach; ?>

</body>

</html