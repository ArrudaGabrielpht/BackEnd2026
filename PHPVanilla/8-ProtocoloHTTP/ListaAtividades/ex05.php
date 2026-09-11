<?php

declare(strict_types=1);

$nome = $_POST['nome_candidato'] ?? '';
$idade = $_POST['idade'] ?? '';
$curso = $_POST['curso_desejado'] ?? '';
$termos = isset($_POST['aceite_termos']);

$cursos = ['Desenvolvimento de Sistemas', 'Mecatrônica', 'Redes'];
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strlen(trim($nome)) < 5) {
        $erros['nome'] = 'Nome deve ter pelo menos 5 caracteres.';
    }

    if (!is_numeric($idade) || $idade < 16 || $idade > 100) {
        $erros['idade'] = 'A idade deve estar entre 16 e 100 anos.';
    }

    if (!in_array($curso, $cursos, true)) {
        $erros['curso'] = 'Escolha um curso válido.';
    }

    if (!$termos) {
        $erros['termos'] = 'Aceite os termos.';
    }
}
?>

<style>
body { font-family: Arial; background: #f2f2f2; padding: 30px; color: #333; }
.container { width: 500px; }
h1 { color: #151124; }
form { background: white; padding: 15px; border: 1px solid #ccc; }
input, select, button { width: 100%; padding: 10px; margin: 5px 0; box-sizing: border-box; }
input[type="checkbox"] { width: auto; }
button { background: #161224; color: white; border: none; }
.erro { color: red; }
.sucesso { background: white; color: green; padding: 15px; margin-top: 10px; }
</style>

<div class="container">

    <h1>Inscrição SENAI</h1>

    <form method="POST">

        <input type="text" name="nome_candidato"
            placeholder="Nome completo"
            value="<?= htmlspecialchars($nome) ?>">

        <?php if (isset($erros['nome'])): ?>
            <p class="erro"><?= htmlspecialchars($erros['nome']) ?></p>
        <?php endif; ?>

        <input type="number" name="idade"
            placeholder="Idade"
            value="<?= htmlspecialchars($idade) ?>">

        <?php if (isset($erros['idade'])): ?>
            <p class="erro"><?= htmlspecialchars($erros['idade']) ?></p>
        <?php endif; ?>

        <select name="curso_desejado">
            <option value="">Escolha o curso</option>

            <?php foreach ($cursos as $opcao): ?>
                <option value="<?= htmlspecialchars($opcao) ?>"
                    <?= $curso === $opcao ? 'selected' : '' ?>>
                    <?= htmlspecialchars($opcao) ?>
                </option>
            <?php endforeach; ?>
        </select>

        <?php if (isset($erros['curso'])): ?>
            <p class="erro"><?= htmlspecialchars($erros['curso']) ?></p>
        <?php endif; ?>

        <label>
            <input type="checkbox" name="aceite_termos"
                <?= $termos ? 'checked' : '' ?>>
            Aceito os termos
        </label>

        <?php if (isset($erros['termos'])): ?>
            <p class="erro"><?= htmlspecialchars($erros['termos']) ?></p>
        <?php endif; ?>

        <button>Enviar inscrição</button>

    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$erros): ?>
        <div class="sucesso">
            Inscrição realizada com sucesso!
        </div>
    <?php endif; ?>

</div>