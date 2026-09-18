<?php

declare(strict_types=1);

$cotacoes = [
    ['id' => 1, 'fornecedor' => 'Eletro Parts Ltda', 'categoria' => 'Eletrônicos', 'valor' => 4500],
    ['id' => 2, 'fornecedor' => 'Peças Mecânicas do Brasil', 'categoria' => 'Mecânica', 'valor' => 1250.50],
    ['id' => 3, 'fornecedor' => 'Supply Express', 'categoria' => 'Consumíveis', 'valor' => 2100],
    ['id' => 4, 'fornecedor' => 'Serviços Técnicos SENAI', 'categoria' => 'Serviços', 'valor' => 3200],
    ['id' => 5, 'fornecedor' => 'Eletrônicos Avançados SA', 'categoria' => 'Eletrônicos', 'valor' => 8750],
    ['id' => 6, 'fornecedor' => 'Plásticos Industriais', 'categoria' => 'Consumíveis', 'valor' => 650],
    ['id' => 7, 'fornecedor' => 'Automação Industrial Plus', 'categoria' => 'Eletrônicos', 'valor' => 15800],
    ['id' => 8, 'fornecedor' => 'Consultoria Técnica Premium', 'categoria' => 'Serviços', 'valor' => 5600]
];

const CATEGORIAS = ['Eletrônicos', 'Mecânica', 'Consumíveis', 'Serviços'];
const CONDICOES = ['À Vista', '30 dias', '60 dias', '90 dias'];

function validarCotacao(array $dados): array
{
    $erros = [];

    if (strlen(trim($dados['nome'])) < 5) {
        $erros[] = 'Nome deve ter no mínimo 5 caracteres.';
    }

    if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erros[] = 'E-mail inválido.';
    }

    if (!in_array($dados['categoria'], CATEGORIAS)) {
        $erros[] = 'Categoria inválida.';
    }

    if (strlen(trim($dados['descricao'])) < 10) {
        $erros[] = 'Descrição deve ter no mínimo 10 caracteres.';
    }

    if (!is_numeric($dados['valor']) || $dados['valor'] <= 0) {
        $erros[] = 'Valor inválido.';
    }

    if ($dados['prazo'] < 1 || $dados['prazo'] > 60) {
        $erros[] = 'Prazo deve ser entre 1 e 60 dias.';
    }

    if (!in_array($dados['condicao'], CONDICOES)) {
        $erros[] = 'Condição de pagamento inválida.';
    }

    return $erros;
}

function filtrarCotacoes(array $cotacoes, string $fornecedor, ?float $valor): array
{
    $resultado = [];

    foreach ($cotacoes as $cotacao) {
        if ($fornecedor != '' &&
            stripos($cotacao['fornecedor'], $fornecedor) === false) {
            continue;
        }

        if ($valor != null && $cotacao['valor'] > $valor) {
            continue;
        }

        $resultado[] = $cotacao;
    }

    return $resultado;
}

$fornecedor = $_GET['fornecedor'] ?? '';
$valorMax = $_GET['valor_max'] ?? null;

if ($valorMax != null) {
    $valorMax = (float) $valorMax;
}

$cotacoes = filtrarCotacoes($cotacoes, $fornecedor, $valorMax);

$erros = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $dados = [
        'nome' => $_POST['nome'] ?? '',
        'email' => $_POST['email'] ?? '',
        'categoria' => $_POST['categoria'] ?? '',
        'descricao' => $_POST['descricao'] ?? '',
        'valor' => $_POST['valor'] ?? '',
        'prazo' => (int) ($_POST['prazo'] ?? 0),
        'condicao' => $_POST['condicao'] ?? ''
    ];

    $erros = validarCotacao($dados);
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <title>SupplyChain SENAI</title>

    <style>
        body {
            font-family: Arial;
            background: #eef3f8;
            margin: 0;
            padding: 30px;
        }

        .container {
            max-width: 950px;
            margin: auto;
        }

        header, .card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 10px;
        }

        header {
            background: #0756a8;
            color: white;
        }

        h2 {
            color: #0756a8;
        }

        input, select, textarea {
            padding: 9px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background: #0756a8;
            color: white;
            border: 0;
            padding: 10px 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        th {
            background: #0756a8;
            color: white;
        }

        .erro {
            color: #c62828;
        }
    </style>
</head>

<body>

<div class="container">

    <header>
        <h1>SupplyChain SENAI</h1>
        <p>Autoatendimento e Cotação de Fornecedores</p>
    </header>

    <div class="card">

        <h2>Filtro de Cotações</h2>

        <form method="GET">

            <label>Fornecedor:</label><br>

            <input
                type="text"
                name="fornecedor"
                value="<?= htmlspecialchars($fornecedor) ?>"
            >

            <br>

            <label>Valor máximo:</label><br>

            <input
                type="number"
                step="0.01"
                name="valor_max"
                value="<?= htmlspecialchars($_GET['valor_max'] ?? '') ?>"
            >

            <br>

            <button type="submit">Filtrar</button>

        </form>

    </div>

    <div class="card">

        <h2>Cotações Abertas</h2>

        <table>

            <tr>
                <th>ID</th>
                <th>Fornecedor</th>
                <th>Categoria</th>
                <th>Valor</th>
            </tr>

            <?php foreach ($cotacoes as $cotacao): ?>

                <tr>
                    <td><?= $cotacao['id'] ?></td>

                    <td>
                        <?= htmlspecialchars($cotacao['fornecedor']) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars($cotacao['categoria']) ?>
                    </td>

                    <td>
                        R$ <?= number_format(
                            $cotacao['valor'],
                            2,
                            ',',
                            '.'
                        ) ?>
                    </td>
                </tr>

            <?php endforeach; ?>

        </table>

    </div>

    <div class="card">

        <h2>Nova Cotação</h2>

        <form method="POST">

            <label>Nome do fornecedor:</label><br>
            <input type="text" name="nome"
                value="<?= htmlspecialchars($_POST['nome'] ?? '') ?>">

            <br>

            <label>E-mail:</label><br>
            <input type="text" name="email"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">

            <br>

            <label>Categoria:</label><br>

            <select name="categoria">

                <option value="">Selecione</option>

                <?php foreach (CATEGORIAS as $categoria): ?>

                    <option value="<?= $categoria ?>">
                        <?= $categoria ?>
                    </option>

                <?php endforeach; ?>

            </select>

            <br>

            <label>Descrição:</label><br>

            <textarea name="descricao"><?= htmlspecialchars(
                $_POST['descricao'] ?? ''
            ) ?></textarea>

            <br>

            <label>Valor:</label><br>

            <input type="text" name="valor"
                value="<?= htmlspecialchars($_POST['valor'] ?? '') ?>">

            <br>

            <label>Prazo de entrega:</label><br>

            <input type="number" name="prazo"
                value="<?= htmlspecialchars($_POST['prazo'] ?? '') ?>">

            <br>

            <label>Condição de pagamento:</label><br>

            <select name="condicao">

                <option value="">Selecione</option>

                <?php foreach (CONDICOES as $condicao): ?>

                    <option value="<?= $condicao ?>">
                        <?= $condicao ?>
                    </option>

                <?php endforeach; ?>

            </select>

            <br><br>

            <button type="submit">Cadastrar</button>

        </form>

        <?php foreach ($erros as $erro): ?>

            <p class="erro">
                <?= htmlspecialchars($erro) ?>
            </p>

        <?php endforeach; ?>

    </div>

</div>

</body>
</html>