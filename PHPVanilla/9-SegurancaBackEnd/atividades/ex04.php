<?php
declare(strict_types=1);

function e(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

function sanitizarTexto(string $dado): string {
    return strip_tags(trim($dado));
}

function validarColaborador(array $dados): array {
    $erros = [];

    if ($dados['nome'] === '') {
        $erros['nome'] = 'Nome obrigatório.';
    }

    if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
        $erros['email'] = 'E-mail inválido.';
    }

    if (filter_var($dados['matricula'], FILTER_VALIDATE_INT) === false) {
        $erros['matricula'] = 'Matrícula inválida.';
    }

    if (filter_var($dados['salario'], FILTER_VALIDATE_FLOAT) === false) {
        $erros['salario'] = 'Salário inválido.';
    }

    return $erros;
}

$nome = $_POST['nome'] ?? '';
$email = $_POST['email'] ?? '';
$matricula = $_POST['matricula'] ?? '';
$salario = $_POST['salario'] ?? '';
$erros = [];
$cadastrado = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dados = [
        'nome' => sanitizarTexto($nome),
        'email' => sanitizarTexto($email),
        'matricula' => sanitizarTexto($matricula),
        'salario' => sanitizarTexto($salario)
    ];

    $erros = validarColaborador($dados);

    if (!$erros) {
        $cadastrado = true;
        $nome = $dados['nome'];
        $email = $dados['email'];
        $matricula = $dados['matricula'];
        $salario = $dados['salario'];
    }
}
?>

<style>
body{font-family:Arial;background:#e5e7eb;margin:0}
.box{max-width:600px;margin:40px auto;background:white;padding:30px;border-radius:15px}
h1{color:#0f766e}
input{width:100%;padding:11px;margin:6px 0 12px;box-sizing:border-box;border:1px solid #ddd;border-radius:7px}
button{width:100%;padding:12px;background:#0f766e;color:white;border:0;border-radius:7px}
.erro{color:#dc2626;font-size:13px}
.sucesso{background:#dcfce7;color:#166534;padding:12px;border-radius:8px;margin-bottom:15px}
.dados{background:#f8fafc;padding:15px;margin-top:15px;border-radius:8px}
</style>

<div class="box">
    <h1>Cadastro de Colaborador</h1>
    <p>Preencha os dados abaixo.</p>

    <?php if ($cadastrado): ?>
        <div class="sucesso">Colaborador cadastrado com sucesso!</div>

        <div class="dados">
            <strong><?= e($nome) ?></strong>
            <p><?= e($email) ?></p>
            <p>Matrícula: <?= e($matricula) ?></p>
            <p>Salário: R$ <?= e($salario) ?></p>
        </div>
    <?php endif; ?>

    <form method="POST">
        <input name="nome" placeholder="Nome completo" value="<?= e($nome) ?>">
        <?php if (isset($erros['nome'])): ?><div class="erro"><?= e($erros['nome']) ?></div><?php endif; ?>

        <input name="email" placeholder="E-mail" value="<?= e($email) ?>">
        <?php if (isset($erros['email'])): ?><div class="erro"><?= e($erros['email']) ?></div><?php endif; ?>

        <input name="matricula" placeholder="Matrícula" value="<?= e($matricula) ?>">
        <?php if (isset($erros['matricula'])): ?><div class="erro"><?= e($erros['matricula']) ?></div><?php endif; ?>

        <input name="salario" placeholder="Salário" value="<?= e($salario) ?>">
        <?php if (isset($erros['salario'])): ?><div class="erro"><?= e($erros['salario']) ?></div><?php endif; ?>

        <button>Cadastrar</button>
    </form>
</div>