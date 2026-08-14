<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudo de Variáveis</title>
</head>
<body>
    <h3>Estudo de Variáveis</h3>
    <?php 
    // Sintaxe de variaveis em PHP
    // Variáveis são representadas pelo símbolo "$" seguido do nome da variável
    // Exemplo
    $nome = "João"; // Variável do tipo String 
    $idade = 25; // Variável do tipo Number
    $status = true; //Variavel do tipo Boolean
    $altura = 1.75; // Variavel do tipo Number (float)
    $email = null; // Variável do tipo Null
    #$endereço; não é possivel declarar uma variável sem atribuir um valor a ela. (não existe undefined em PHP)

    // Exibindo as variáveis na tela
    echo "Nome: $nome <br>";
    echo "Idade: $idade <br>";
    echo "Status: $status <br>";
    echo "Altura: $altura <br>";
    echo "Email: $email <br>";


     echo "<br> <h3> Constantes </h3> <br>";

    // Constantes são representadas pela palavra "const" ou "define" seguido do nome da váriavel.
    // Exemplos de constantes
    const PI = 3.14; // Constante do tipo Number (float)
    const EMPRESA = "Google"; // Constante do tipo String
    define("SITE", "www.google.com"); //Constante do tipo String
    // Uma boa prática é utilizar leras maíusculas para nomear constantes, para diferenciar das variáveis
    
    //Exibir as constantes na tela
    echo "Valor de PI:  PI <br>";
    echo "Nome da Empresa: EMPRESA <br>";
    echo "Site: SITE <br>";

    // Tentando alterar o valor de uma constante, isso irá gerar um erro, pois constantes não podem ser alteradas
    //PI = 3.14159; // Isso é um erro
    // Redeclarar uma variável também irá gerar um erro
    //const SITE = "www.google.com"; // Isso é um erro

    //Regra de ouro: Sempre coloque a instrução declare (strinct_types=1); no início do seu código PHP, isso blinda seu sistema contra mistura acidental de tipos de dados.

    // Ultilização de textos (Concatenação VS Interpolação)
    //Exemplo de Concatenação -> juntar duas ou mais string utilizando o operador "." (ponto)
    echo "Olá, " . $nome . "! Seja bem-vindo ao nosso site !<br>";
    
    // Exemplo de interpolação -> Ultilização de varíaveis dentro de um texto, ultilizando aspas duplas 
    echo "$nome, tem $idade anos e sua altura é $altura metros. <br>"; // Forma mais correta de misturar textos e varíaveis.

    ?>
</body>
</html>