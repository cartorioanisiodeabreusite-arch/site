<?php
require_once dirname(__DIR__) . '/partials.php';
require_admin();
$status = trim((string)($_GET['status'] ?? ''));
$type = trim((string)($_GET['type'] ?? ''));
$q = trim((string)($_GET['q'] ?? ''));
$where = []; $params = [];
if ($status !== '') { $where[] = 'status = ?'; $params[] = $status; }
if ($type !== '') { $where[] = 'type = ?'; $params[] = $type; }
if ($q !== '') { $where[] = '(protocol LIKE ? OR subject LIKE ? OR name LIKE ?)'; $like = '%' . $q . '%'; array_push($params, $like, $like, $like); }
$sql = 'SELECT * FROM tickets' . ($where ? ' WHERE ' . implode(' AND ', $where) : '') . ' ORDER BY created_at DESC LIMIT 300';
$stmt = db()->prepare($sql); $stmt->execute($params); $tickets = $stmt->fetchAll();
$counts = db()->query("SELECT status, COUNT(*) total FROM tickets GROUP BY status")->fetchAll();
render_header('Painel administrativo');
?>
<main id="conteudo" class="section"><div class="container admin-wide">
<div class="admin-top"><div><span class="eyebrow">Área restrita</span><h1>Solicitações</h1><p>Usuário: <?= e($_SESSION['admin_username'] ?? '') ?></p></div><a class="button button-secondary" href="logout.php">Sair</a></div>
<div class="stats"><?php foreach ($counts as $c): ?><div><span><?= e($c['status']) ?></span><strong><?= (int)$c['total'] ?></strong></div><?php endforeach; ?></div>
<form class="filters" method="get"><input name="q" value="<?= e($q) ?>" placeholder="Buscar protocolo, assunto ou nome"><select name="status"><option value="">Todos os status</option><?php foreach (['Recebida','Em análise','Aguardando informações','Respondida','Encerrada'] as $s): ?><option <?= $status === $s ? 'selected' : '' ?>><?= e($s) ?></option><?php endforeach; ?></select><select name="type"><option value="">Todos os tipos</option><?php foreach (['Dúvida','Reclamação','Elogio','Privacidade/LGPD'] as $t): ?><option <?= $type === $t ? 'selected' : '' ?>><?= e($t) ?></option><?php endforeach; ?></select><button class="button">Filtrar</button></form>
<div class="table-wrap"><table><thead><tr><th>Protocolo</th><th>Tipo</th><th>Assunto</th><th>Solicitante</th><th>Status</th><th>Data</th></tr></thead><tbody><?php foreach ($tickets as $ticket): ?><tr><td><a href="ticket.php?id=<?= (int)$ticket['id'] ?>"><?= e($ticket['protocol']) ?></a></td><td><?= e($ticket['type']) ?></td><td><?= e($ticket['subject']) ?></td><td><?= $ticket['anonymous'] ? 'Anônimo' : e($ticket['name']) ?></td><td><span class="status"><?= e($ticket['status']) ?></span></td><td><?= e(date('d/m/Y H:i', strtotime($ticket['created_at']))) ?></td></tr><?php endforeach; ?><?php if (!$tickets): ?><tr><td colspan="6">Nenhuma solicitação encontrada.</td></tr><?php endif; ?></tbody></table></div>
</div></main>
<?php render_footer(); ?>
