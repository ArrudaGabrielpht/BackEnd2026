<?php
declare(strict_types=1);

$usuario = [
    "nome" => "Carlos Eduardo",
    "idade" => 28,
    "cidade" => "Americana",
    "estado" => "SP",
    "premium" => true
];
?>

<div style="border:1px solid black; padding:15px; width:250px">
    <h2>
        <?php
        echo $usuario["nome"];
        if ($usuario["premium"]) echo " ⭐";
        ?>
    </h2>

    <p>Idade: <?php echo $usuario["idade"]; ?></p>
