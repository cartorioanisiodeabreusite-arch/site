<?php
require_once __DIR__ . '/bootstrap.php';

function render_header(string $title = ''): void
{
    global $config;
    $fullTitle = $title ? $title . ' | ' . $config['short_name'] : $config['short_name'];
    $flash = get_flash();
    ?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Informações, serviços e atendimento eletrônico do Ofício Único de Anísio de Abreu - PI.">
    <meta name="theme-color" content="#0b2347">
    <title><?= e($fullTitle) ?></title>
    <link rel="stylesheet" href="<?= e(str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/') ? '../assets/style.css' : 'assets/style.css') ?>">
</head>
<body>
<a class="skip-link" href="#conteudo">Ir para o conteúdo</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="<?= str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/') ? '../index.php' : 'index.php' ?>" aria-label="Página inicial">
            <span class="brand-mark" aria-hidden="true">AA</span>
            <span><strong><?= e($config['short_name']) ?></strong><small><?= e($config['subtitle']) ?></small></span>
        </a>
        <button class="menu-button" type="button" aria-expanded="false" aria-controls="main-nav">Menu</button>
        <nav id="main-nav" class="main-nav" aria-label="Navegação principal">
            <a href="<?= str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/') ? '../index.php#inicio' : 'index.php#inicio' ?>">Início</a>
            <a href="<?= str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/') ? '../index.php#servicos' : 'index.php#servicos' ?>">Serviços</a>
            <a href="<?= str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/') ? '../index.php#informacoes' : 'index.php#informacoes' ?>">Informações</a>
            <a href="<?= str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/') ? '../solicitacao.php' : 'solicitacao.php' ?>">Atendimento</a>
            <a href="<?= str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/') ? '../acompanhar.php' : 'acompanhar.php' ?>">Acompanhar</a>
        </nav>
    </div>
</header>
<?php if ($flash): ?>
<div class="container flash flash-<?= e($flash['type']) ?>" role="status"><?= e($flash['message']) ?></div>
<?php endif; ?>
<?php
}

function render_footer(): void
{
    global $config;
    ?>
<footer class="site-footer">
    <div class="container footer-grid">
        <div>
            <strong><?= e($config['site_name']) ?></strong>
            <p><?= e($config['address']) ?><br><?= e($config['city']) ?></p>
        </div>
        <div>
            <strong>Atendimento</strong>
            <p><?= e($config['hours']) ?><br>Telefone: <?= e($config['phone']) ?><br>E-mail: <?= e($config['email']) ?></p>
        </div>
        <div>
            <strong>Transparência</strong>
            <p><a href="privacidade.php">Política de Privacidade</a><br><a href="index.php#normas">Normas e emolumentos</a><br><a href="<?= e($config['corregedoria_url']) ?>" target="_blank" rel="noopener">Corregedoria do Foro Extrajudicial</a></p>
        </div>
    </div>
    <div class="container footer-bottom">© <?= date('Y') ?> <?= e($config['short_name']) ?>. Conteúdo institucional, sem caráter publicitário.</div>
</footer>
<script src="<?= e(str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/') ? '../assets/app.js' : 'assets/app.js') ?>" defer></script>
</body>
</html>
<?php
}
