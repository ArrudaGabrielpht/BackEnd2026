<?php
declare(strict_types=1);

function e(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$arquivo = 'chat.json';
$mensagem = $_POST['mensagem'] ?? '';
$erros = [];

$chat = file_exists($arquivo)
    ? json_decode(file_get_contents($arquivo), true)
    : [];

if (!is_array($chat)) {
    $chat = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (trim($mensagem) === '') {
        $erros[] = 'Digite uma mensagem.';
    } elseif (strlen($mensagem) > 250) {
        $erros[] = 'Máximo de 250 caracteres.';
    }

    if (!$erros) {
        $chat[] = trim($mensagem);

        file_put_contents(
            $arquivo,
            json_encode($chat, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        $mensagem = '';
    }
}
?>

<style>
body{font-family:Arial;background:#111827;color:white;margin:0}
.chat{max-width:650px;margin:40px auto;background:#1f2937;border-radius:15px;overflow:hidden}
.topo{padding:20px;background:#374151}
.mensagens{padding:20px;min-height:300px}
.msg{background:#374151;padding:12px;margin:10px 0;border-radius:9px}
.form{padding:15px;background:#111827}
textarea{width:100%;height:70px;box-sizing:border-box;background:#1f2937;color:white;border:1px solid #4b5563;border-radius:7px;padding:10px}
button{margin-top:8px;padding:10px 18px;background:#2563eb;color:white;border:0;border-radius:7px}
.erro{background:#7f1d1d;padding:10px;margin:0 20px 10px;border-radius:7px}
.vazio{text-align:center;color:#9ca3af;padding-top:100px}
</style>

<div class="chat">

    <div class="topo">
        <h2>⚙️ Chat da Operação</h2>
        <small>● Sistema online</small>
    </div>

    <div class="mensagens">
        <?php if (!$chat): ?>
            <div class="vazio">Nenhuma mensagem ainda.</div>
        <?php endif; ?>

        <?php foreach ($chat as $msg): ?>
            <div class="msg"><?= nl2br(e($msg)) ?></div>
        <?php endforeach; ?>
    </div>

    <?php foreach ($erros as $erro): ?>
        <div class="erro"><?= e($erro) ?></div>
    <?php endforeach; ?>

    <div class="form">
        <form method="POST">
            <textarea name="mensagem" maxlength="250" placeholder="Digite uma mensagem..."><?= e($mensagem) ?></textarea>
            <button>Enviar</button>
        </form>
    </div>

</div>