<?php
declare(strict_types=1);

$funcionarios = [
    ["id"=>1, "nome"=>"Ana Souza", "cargo"=>"Dev Front-End", "salario"=>4500.00],
    ["id"=>2, "nome"=>"Bruno Costa", "cargo"=>"Dev Back-End", "salario"=>5200.00],
    ["id"=>3, "nome"=>"Carla Dias", "cargo"=>"Tech Lead", "salario"=>8900.00],
    ["id"=>4, "nome"=>"Daniel Silva", "cargo"=>"Estagiário", "salario"=>1500.00]
];

$totalFolha = 0;
?>

<h2>Folha de Pagamento</h2>

<table border="1">
<tr><th>ID</th><th>Nome</th><th>Cargo</th><th>Salário</th></tr>

<?php foreach ($funcionarios as $f): ?>
<tr>
    <td><?php echo $f["id"]; ?></td>
    <td><?php echo $f["nome"]; ?></td>
    <td><?php echo $f["cargo"]; ?></td>
    <td><?php echo "R$ " . number_format($f["salario"], 2, ",", "."); ?></td>
</tr>
<?php $totalFolha += $f["salario"]; ?>
<?php endforeach; ?>

</table>

<p>Total da folha:
<?php echo "R$ " . number_format($totalFolha, 2, ",", "."); ?>
</p>
