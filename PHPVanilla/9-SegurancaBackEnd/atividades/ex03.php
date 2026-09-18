<?php
declare(strict_types=1);

function e(string $texto): string {
    return htmlspecialchars($texto, ENT_QUOTES, 'UTF-8');
}

$busca = $_GET['q'] ?? '';

$produtos = [
    'Teclado Mecânico',
    'Mouse Gamer',
    'Headset',
    'Monitor',
    'Webcam',
    'Mousepad'
];

$resultados = [];

foreach ($produtos as $produto) {
    if ($busca !== '' && stripos($produto, $busca) !== false) {
        $resultados[] = $produto;
    }
}
?>

<style>
body{font-family:Arial;background:#f3f4f6;margin:0}
.topo{background:#0f172a;color:white;padding:25px;text-align:center}
.box{max-width:700px;margin:35px auto;padding:20px}
.busca{display:flex;gap:8px}
input{flex:1;padding:13px;border:1px solid #ddd;border-radius:8px}
button{padding:13px 20px;border:0;border-radius:8px;background:#0284c7;color:white}
.produtos{display:grid;grid-template-columns:repeat(2,1fr);gap:12px;margin-top:20px}
.produto{background:white;padding:20px;border-radius:10px;box-shadow:0 2px 8px #0001}
.vazio{color:#777}
</style>

<div class="topo">
    <h1>TechStore</h1>
</div>

<div class="box">
    <h2>Buscar produtos</h2>

    <form method="GET" class="busca">
        <input name="q" placeholder="Ex: teclado..." value="<?= e($busca) ?>">
        <button>Buscar</button>
    </form>

    <?php if ($busca !== ''): ?>
        <h3>Resultados para: "<?= e($busca) ?>"</h3>

        <?php if ($resultados): ?>
            <div class="produtos">
                <?php foreach ($resultados as $produto): ?>
                    <div class="produto">
                        🛒 <strong><?= e($produto) ?></strong>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <p class="vazio">Nenhum produto encontrado.</p>
        <?php endif; ?>
    <?php endif; ?>
</div>