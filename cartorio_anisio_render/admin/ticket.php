<?php
require_once dirname(__DIR__) . '/partials.php';
require_admin();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?: filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
if (!$id) { http_response_code(404); exit('Solicitação não encontrada.'); }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf($_POST['csrf'] ?? null);
    $status = trim((string)($_POST['status'] ?? 'Recebida'));
    $response = trim((string)($_POST['public_response'] ?? ''));
    $notes = trim((string)($_POST['internal_notes'] ?? ''));
    $allowed = ['Recebida','Em análise','Aguardando informações','Respondida','Encerrada'];
    if (!in_array($status, $allowed, true)) $status = 'Recebida';
    $stmt = db()->prepare('UPDATE tickets SET status = ?, public_response = ?, internal_notes = ?, updated_at = ? WHERE id = ?');
    $stmt->execute([$status, $response ?: null, $notes ?: null, date('Y-m-d H:i:s'), $id]);
    audit((int)$id, 'Admin:' . ($_SESSION['admin_username'] ?? ''), 'Solicitação atualizada', $status);
    flash('success', 'Solicitação atualizada.');
    header('Location: ticket.php?id=' . $id); exit;
}
$stmt = db()->prepare('SELECT * FROM tickets WHERE id = ?'); $stmt->execute([$id]); $ticket = $stmt->fetch();
if (!$ticket) { http_response_code(404); exit('Solicitação não encontrada.'); }
$logStmt = db()->prepare('SELECT * FROM audit_log WHERE ticket_id = ? ORDER BY created_at DESC'); $logStmt->execute([$id]); $logs = $logStmt->fetchAll();
render_header('Atender solicitação');
?>
<main id="conteudo" class="section"><div class="container admin-wide"><a href="index.php">← Voltar ao painel</a><div class="ticket-head"><div><span>Protocolo</span><h1><?= e($ticket['protocol']) ?></h1></div><span class="status"><?= e($ticket['status']) ?></span></div>
<div class="admin-grid"><article class="ticket-view"><h2>Dados da manifestação</h2><dl><div><dt>Tipo</dt><dd><?= e($ticket['type']) ?></dd></div><div><dt>Solicitante</dt><dd><?= $ticket['anonymous'] ? 'Anônimo' : e($ticket['name']) ?></dd></div><div><dt>E-mail</dt><dd><?= e($ticket['email']) ?></dd></div><div><dt>Telefone</dt><dd><?= e($ticket['phone']) ?></dd></div><div><dt>Contato preferido</dt><dd><?= e($ticket['preferred_contact']) ?></dd></div><div><dt>Data</dt><dd><?= e(date('d/m/Y H:i', strtotime($ticket['created_at']))) ?></dd></div></dl><h3><?= e($ticket['subject']) ?></h3><p class="prewrap"><?= e($ticket['message']) ?></p><?php if ($ticket['attachment_path']): ?><p><a class="button button-secondary" href="download.php?id=<?= (int)$ticket['id'] ?>">Baixar anexo: <?= e($ticket['attachment_name']) ?></a></p><?php endif; ?></article>
<form class="form-card" method="post"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>"><input type="hidden" name="id" value="<?= (int)$ticket['id'] ?>"><label>Status<select name="status"><?php foreach (['Recebida','Em análise','Aguardando informações','Respondida','Encerrada'] as $s): ?><option <?= $ticket['status'] === $s ? 'selected' : '' ?>><?= e($s) ?></option><?php endforeach; ?></select></label><label>Resposta pública<textarea name="public_response" rows="10" maxlength="10000"><?= e($ticket['public_response']) ?></textarea></label><label>Notas internas<textarea name="internal_notes" rows="6" maxlength="10000"><?= e($ticket['internal_notes']) ?></textarea></label><button class="button">Salvar atualização</button></form></div>
<section class="audit"><h2>Histórico</h2><?php foreach ($logs as $log): ?><p><strong><?= e(date('d/m/Y H:i', strtotime($log['created_at']))) ?></strong> — <?= e($log['actor']) ?>: <?= e($log['action']) ?><?= $log['details'] ? ' (' . e($log['details']) . ')' : '' ?></p><?php endforeach; ?></section>
</div></main>
<?php render_footer(); ?>
