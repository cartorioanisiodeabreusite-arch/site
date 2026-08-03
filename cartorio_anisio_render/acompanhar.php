<?php
require_once __DIR__ . '/partials.php';
$ticket = null; $error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf($_POST['csrf'] ?? null);
    $protocol = strtoupper(trim((string)($_POST['protocol'] ?? '')));
    $key = strtoupper(trim((string)($_POST['access_key'] ?? '')));
    $stmt = db()->prepare('SELECT * FROM tickets WHERE protocol = ?');
    $stmt->execute([$protocol]);
    $row = $stmt->fetch();
    if ($row && password_verify($key, $row['access_key_hash'])) {
        $ticket = $row;
        audit((int)$row['id'], 'Usuário', 'Consulta de andamento');
    } else {
        $error = 'Protocolo ou chave de acesso inválidos.';
    }
}
render_header('Acompanhar solicitação');
?>
<main id="conteudo" class="section">
<div class="container narrow">
    <span class="eyebrow">Consulta</span><h1>Acompanhar solicitação</h1>
    <form class="form-card compact" method="post">
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <label>Protocolo<input type="text" name="protocol" required value="<?= e($_GET['protocol'] ?? '') ?>" placeholder="AA-AAAAMMDD-XXXXXX"></label>
        <label>Chave de acesso<input type="password" name="access_key" required maxlength="8"></label>
        <button class="button" type="submit">Consultar</button>
    </form>
    <?php if ($error): ?><div class="flash flash-error" role="alert"><?= e($error) ?></div><?php endif; ?>
    <?php if ($ticket): ?>
    <article class="ticket-view">
        <div class="ticket-head"><div><span>Protocolo</span><h2><?= e($ticket['protocol']) ?></h2></div><span class="status"><?= e($ticket['status']) ?></span></div>
        <dl>
            <div><dt>Tipo</dt><dd><?= e($ticket['type']) ?></dd></div>
            <div><dt>Assunto</dt><dd><?= e($ticket['subject']) ?></dd></div>
            <div><dt>Recebida em</dt><dd><?= e(date('d/m/Y H:i', strtotime($ticket['created_at']))) ?></dd></div>
            <div><dt>Atualizada em</dt><dd><?= e(date('d/m/Y H:i', strtotime($ticket['updated_at']))) ?></dd></div>
        </dl>
        <h3>Mensagem</h3><p class="prewrap"><?= e($ticket['message']) ?></p>
        <h3>Resposta da serventia</h3>
        <?php if ($ticket['public_response']): ?><p class="response-box prewrap"><?= e($ticket['public_response']) ?></p><?php else: ?><p class="muted">Ainda não há resposta publicada.</p><?php endif; ?>
    </article>
    <?php endif; ?>
</div>
</main>
<?php render_footer(); ?>
