<?php
require_once __DIR__ . '/partials.php';
$ticket = $_SESSION['new_ticket'] ?? null;
unset($_SESSION['new_ticket']);
if (!$ticket) { header('Location: solicitacao.php'); exit; }
render_header('Solicitação recebida');
?>
<main id="conteudo" class="section">
<div class="container narrow center">
    <div class="success-icon" aria-hidden="true">✓</div>
    <span class="eyebrow">Solicitação registrada</span>
    <h1>Guarde seus dados de acompanhamento</h1>
    <p>Sua manifestação foi recebida. O protocolo e a chave são necessários para consultar o andamento e a resposta.</p>
    <div class="credential-box">
        <div><span>Protocolo</span><strong id="protocol-value"><?= e($ticket['protocol']) ?></strong></div>
        <div><span>Chave de acesso</span><strong id="key-value"><?= e($ticket['access_key']) ?></strong></div>
    </div>
    <button class="button button-secondary" type="button" data-copy="<?= e($ticket['protocol'] . ' | ' . $ticket['access_key']) ?>">Copiar dados</button>
    <a class="button" href="acompanhar.php?protocol=<?= urlencode($ticket['protocol']) ?>">Acompanhar solicitação</a>
    <p class="small">Por segurança, a chave não será exibida novamente. O cartório não solicita pagamento, senha bancária ou código de verificação por este canal.</p>
</div>
</main>
<?php render_footer(); ?>
