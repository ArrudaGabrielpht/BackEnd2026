<?php
declare(strict_types=1);

function e(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$nome = $_POST['nome'] ?? '';
$link = $_POST['link'] ?? '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!filter_var($link, FILTER_VALIDATE_URL)) {
        $erro = 'Digite uma URL válida.';
    } elseif (
        !str_starts_with($link, 'http://') &&
        !str_starts_with($link, 'https://')
    ) {
        $erro = 'Use apenas http:// ou https://.';
    }
}
?>

<style>
body{font-family:Arial;background:#111827;color:#fff;margin:0}
.box{max-width:500px;margin:80px auto;background:#1f2937;padding:30px;border-radius:15px}
input{width:100%;padding:12px;margin:8px 0 15px;box-sizing:border-box;border:0;border-radius:7px}
button,.link{display:block;width:100%;padding:12px;border:0;border-radius:7px;background:#6366f1;color:white;text-align:center;text-decoration:none;box-sizing:border-box}
.erro{background:#7f1d1d;padding:10px;border-radius:7px;margin-bottom:15px}
.resultado{margin-top:20px;text-align:center}
</style>

<div class="box">
    <h1>🔗 Meu Portfólio</h1>
    <p>Cadastre seu GitHub ou LinkedIn.</p>

    <?php if ($erro): ?>
        <div class="erro"><?= e($erro) ?></div>
    <?php endif; ?>

    <form method="POST">
        <input name="nome" placeholder="Seu nome" value="<?= e($nome) ?>">
        <input name="link" placeholder="https://github.com/..." value="<?= e($link) ?>">
        <button>Cadastrar</button>
    </form>

    <?php if (!$erro && $link && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <div class="resultado">
            <strong><?= e($nome) ?>, seu link foi validado!</strong>
            <br><br>
            <a class="link" href="<?= e($link) ?>" target="_blank">Visitar Portfólio</a>
        </div>
    <?php endif; ?>
</div>