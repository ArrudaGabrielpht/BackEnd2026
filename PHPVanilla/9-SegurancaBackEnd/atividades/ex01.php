<?php
declare(strict_types=1);

function e(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$nome = $_POST['nome'] ?? '';
$mensagem = $_POST['mensagem'] ?? '';
$erros = [];
$recados = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (strlen(trim($nome)) < 3) {
        $erros['nome'] = 'Nome deve ter pelo menos 3 caracteres.';
    }

    if (strlen(trim($mensagem)) < 5) {
        $erros['mensagem'] = 'Mensagem deve ter pelo menos 5 caracteres.';
    }

    if (!$erros) {
        $recados[] = ['nome' => trim($nome), 'mensagem' => trim($mensagem)];
        $nome = '';
        $mensagem = '';
    }
}
?>

<style>
body{font-family:Arial;background:#eef2ff;margin:0}
.box{max-width:600px;margin:50px auto;padding:25px}
form,.recado{background:white;padding:20px;border-radius:12px;margin-bottom:15px;box-shadow:0 3px 10px #0001}
input,textarea{width:100%;padding:11px;margin:7px 0 12px;box-sizing:border-box;border:1px solid #ddd;border-radius:7px}
textarea{height:100px}
button{background:#4f46e5;color:white;border:0;padding:11px 18px;border-radius:7px}
.erro{color:#dc2626;font-size:13px}
.recado{border-left:4px solid #9fcde7}
</style>

<div class="box">
    <h1> Mural de Recados</h1>
    <p>Deixe sua mensagem.</p>

    <form method="POST">
        <input name="nome" placeholder="Seu nome" value="<?= e($nome) ?>">
        <?php if (isset($erros['nome'])): ?>
            <div class="erro"><?= e($erros['nome']) ?></div>
        <?php endif; ?>

        <textarea name="mensagem" placeholder="Digite seu recado..."><?= e($mensagem) ?></textarea>
        <?php if (isset($erros['mensagem'])): ?>
            <div class="erro"><?= e($erros['mensagem']) ?></div>
        <?php endif; ?>

        <button>Publicar</button>
    </form>

    <?php foreach ($recados as $recado): ?>
        <div class="recado">
            <strong><?= e($recado['nome']) ?></strong>
            <p><?= nl2br(e($recado['mensagem'])) ?></p>
        </div>
    <?php endforeach; ?>
</div>