<?php
require_once __DIR__ . '/bootstrap.php';

function render_header(string $title = ''): void
{
    global $config;
    $fullTitle = $title ? $title . ' | ' . $config['short_name'] : $config['short_name'];
    $flash = get_flash();
    $isAdmin = str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/');
    $prefix = $isAdmin ? '../' : '';
    ?>
<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Informações, serviços e atendimento eletrônico do Cartório Graça Rocha - Serventia Extrajudicial do Ofício Único de Anísio de Abreu - PI.">
    <meta name="theme-color" content="#0b2347">
    <title><?= e($fullTitle) ?></title>
    <link rel="stylesheet" href="<?= e($prefix . 'assets/style.css') ?>">
</head>
<body>
<a class="skip-link" href="#conteudo">Ir para o conteúdo</a>
<header class="site-header">
    <div class="container header-inner">
        <a class="brand" href="<?= e($prefix . 'index.php') ?>" aria-label="Página inicial">
            <span class="brand-logo-wrap">
                <img class="brand-logo" src="<?= e($prefix . 'assets/logo-cartorio-graca-rocha.png') ?>" alt="Logo do Cartório Graça Rocha">
            </span>
            <span>
                <strong><?= e($config['short_name']) ?></strong>
                <small><?= e($config['subtitle']) ?></small>
            </span>
        </a>
        <button class="menu-button" type="button" aria-expanded="false" aria-controls="main-nav">Menu</button>
        <nav id="main-nav" class="main-nav" aria-label="Navegação principal">
            <a href="<?= e($prefix . 'index.php#inicio') ?>">Início</a>
            <a href="<?= e($prefix . 'index.php#servicos') ?>">Serviços</a>
            <a href="<?= e($prefix . 'index.php#informacoes') ?>">Informações</a>
            <a href="<?= e($prefix . 'solicitacao.php') ?>">Atendimento</a>
            <a href="<?= e($prefix . 'acompanhar.php') ?>">Acompanhar</a>
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
<script src="<?= e((str_contains($_SERVER['SCRIPT_NAME'] ?? '', '/admin/') ? '../' : '') . 'assets/app.js') ?>" defer></script>
</body>
</html>
<?php
}
