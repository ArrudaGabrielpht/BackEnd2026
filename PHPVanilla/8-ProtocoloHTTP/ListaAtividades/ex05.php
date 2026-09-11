<?php

declare(strict_types=1);

$nome = $_POST['nome_candidato'] ?? '';
$idade = $_POST['idade'] ?? '';
$curso = $_POST['curso_desejado'] ?? '';
$termos = isset($_POST['aceite_termos']);

$cursos = ['Desenvolvimento de Sistemas', 'Mecatrônica', 'Redes'];
$erros = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strlen(trim($nome)) < 5) $erros['nome'] = 'Nome deve ter pelo menos 5 caracteres.';
    if (!is_numeric($idade) || $idade < 16 || $idade > 100) {
        $erros['idade'] = 'A idade deve estar entre 16 e 100 anos.';
    }
    if (!in_array($curso, $cursos, true)) $erros['curso'] = 'Escolha um curso válido.';
    if (!$termos) $erros['termos'] = 'Aceite os termos.';
}
?>

<style>
    .erro {
        color: red;
    }
</style>

<h1>Inscrição SENAI</h1>

<form method="POST">

    <input type="text" name="nome_candidato" placeholder="Nome" value="<?= htmlspecialchars($nome) ?>">
    <?php if (isset($erros['nome'])): ?>
        <p class="erro"><?= htmlspecialchars($erros['nome']) ?></p>
    <?php endif; ?>

    <input type="number" name="idade" min="16" max="100" placeholder="Idade" value="<?= htmlspecialchars($idade) ?>">
    <?php if (isset($erros['idade'])): ?>
        <p class="erro"><?= htmlspecialchars($erros['idade']) ?></p>
    <?php endif; ?>

    <select name="curso_desejado">
        <option value="">Escolha o curso</option>

        <?php foreach ($cursos as $opcao): ?>
            <option value="<?= htmlspecialchars($opcao) ?>" <?= $curso === $opcao ? 'selected' : '' ?>>
                <?= htmlspecialchars($opcao) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <?php if (isset($erros['curso'])): ?>
        <p class="erro"><?= htmlspecialchars($erros['curso']) ?></p>
    <?php endif; ?>

    <label>
        <input type="checkbox" name="aceite_termos" <?= $termos ? 'checked' : '' ?>>
        Aceito os termos
    </label>

    <?php if (isset($erros['termos'])): ?>
        <p class="erro"><?= htmlspecialchars($erros['termos']) ?></p>
    <?php endif; ?>

    <button>Enviar</button>
</form>

<?php if ($_SERVER['REQUEST_METHOD'] === 'POST' && !$erros): ?>
    <h2>Inscrição realizada com sucesso!</h2>
<?php endif; ?>