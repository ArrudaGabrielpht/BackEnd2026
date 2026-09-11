```php
<?php

declare(strict_types=1);

$produtos = [
    ['nome' => 'Teclado USB', 'categoria' => 'Eletrônicos', 'preco' => 80.00],
    ['nome' => 'Mouse sem fio', 'categoria' => 'Eletrônicos', 'preco' => 65.00],
    ['nome' => 'Caderno', 'categoria' => 'Papelaria', 'preco' => 25.00],
    ['nome' => 'Caneta azul', 'categoria' => 'Papelaria', 'preco' => 3.50],
    ['nome' => 'Monitor 24 polegadas', 'categoria' => 'Eletrônicos', 'preco' => 899.90],
];

$mensagemSucesso = "";
$erros = [];
$nome = "";
$email = "";

$buscaProduto = trim((string) ($_GET["produto"] ?? ""));
$precoMaximoTexto = trim((string) ($_GET["preco_maximo"] ?? ""));

$produtosFiltrado = $produtos;

if ($buscaProduto !== "" || $precoMaximoTexto !== "") {
    $produtosFiltrado = array_filter($produtos, function (array $produto) use ($buscaProduto, $precoMaximoTexto): bool {
        $nomeStatus = true;
        $precoStatus = true;

        if ($buscaProduto !== "") {
            $nomeStatus = str_contains(strtolower($produto["nome"]), strtolower($buscaProduto));
        }

        if ($precoMaximoTexto !== "") {
            $precoMaximo = filter_var($precoMaximoTexto, FILTER_VALIDATE_FLOAT);
            $precoStatus = $precoMaximo !== false && $produto["preco"] <= $precoMaximo;
        }

        return $nomeStatus && $precoStatus;
    });
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim((string) ($_POST["nome"] ?? ""));
    $email = trim((string) ($_POST["email"] ?? ""));

    if (strlen($nome) < 3) {
        $erros["nome"] = "Informe um nome com pelo menos 3 caracteres";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros["email"] = "Informe um email válido!";
    }

    if ($erros === []) {
        $mensagemSucesso = "Cadastro realizado com sucesso!";
    }
}

?>
```
