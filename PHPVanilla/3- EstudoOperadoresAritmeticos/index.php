<?php 
// 1. Blindagem de operações entre variáveis de tipos diferentes
declare(strict_types=1);

// Criar um cáclculo de Holerite em PHP

// 2. Declaração das constantes

const TAXA_INSS = 0.08; //8% => 8/100
const DESCONTO_VT = 150.00;

// 3. Declarar as variáveis 
// Dados do Funcionário
$nomeFuncionario = "Gabriel de Arruda";
$salarioBase = 1200.00;
$horasExtras = 10; //10 horas extras no mês

// Declaração de variáveis o LowerCamelCase
// Regra -> primeira palavra toda minúscula e depois as demais palavras usa-se maiúscula na primeira letra
//Ex: $hojeEstaUmDiaBonito

// 4. Cálculos do salário
// Valor da hora extra (1.6 da hora normal)
$valorHoraExtra = ($salarioBase/220) * 1.6;
// -> Crie uma variável $totalHorasExtras
$totalHorasExtras = $valorHoraExtra * $horasExtras;
// -> Crie uma variável chamado $salarioBruto
$salarioBruto = $salarioBase + $totalHorasExtras;
// -> Crie uma variável $descontoInss
$descontoInss = $salarioBruto * TAXA_INSS;
// -> Crie uma variável $salarioLiquido
$salarioLiquido = ($salarioBruto - $descontoInss) - DESCONTO_VT;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holerite <?php echo $nomeFuncionario ?></title>
    <!-- folha de estilizaçõa CSS -->
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Folha de Pagamento

    </h2>
    <!-- Saida de dados misturando HTML e PHP -->
    <table>
        <tr>
            <th>Colaborador(a)</th>
            <td><?php echo $nomeFuncionario; ?></td>
        </tr>
        <tr>
            <th>Salário Base</th>
            <td>R$ <?php echo number_format($salarioBase, 2, ",", "."); ?></td>
            <!-- Usando uma função chamada number_format (formata a saída de números) -->
        </tr>
        <!-- Fazer as demais linhas da tabela utilizando as variáveis criadas -->
         <tr>
            <th>Horas Extras</th>
            <td>R$ <?php echo number_format($horasExtras, 2, ",", "."); ?></td>
         </tr>
         <tr>
            <th>Valor da hora extra</th>
            <td>R$ <?php echo number_format($valorHoraExtra, 2, ",", "."); ?></td>
         </tr>
         <tr>
            <th>Total das horas extras</th>
            <td>R$ <?php echo number_format($totalHorasExtras, 2, ",", "."); ?></td>
         </tr>
         <tr>
            <th>Salário Bruto</th>
            <td>R$ <?php echo number_format($salarioBruto, 2, ",", "."); ?></td>
         </tr>
         <tr>
            <th>Desconto do INSS</th>
            <td>R$ <?php echo number_format($descontoInss, 2, ",", "."); ?></td>
         </tr>
         <tr>
            <th>Salário Líquido do Colaborador</th>
            <td>R$ <?php echo number_format($salarioLiquido, 2, ",", "."); ?></td>
         </tr>
    </table>

</body>
</html>