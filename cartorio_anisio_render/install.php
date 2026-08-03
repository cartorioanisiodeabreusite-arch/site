<?php
require_once __DIR__ . '/partials.php';
if (setup_complete()) { header('Location: admin/login.php'); exit; }
$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf($_POST['csrf'] ?? null);
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $confirm = (string)($_POST['confirm'] ?? '');
    if (!preg_match('/^[a-zA-Z0-9._-]{4,40}$/', $username)) $error = 'Usuário inválido.';
    elseif (strlen($password) < 12) $error = 'A senha deve ter ao menos 12 caracteres.';
    elseif ($password !== $confirm) $error = 'As senhas não coincidem.';
    else {
        $stmt = db()->prepare('INSERT INTO admins (username, password_hash, created_at) VALUES (?, ?, ?)');
        $stmt->execute([$username, password_hash($password, PASSWORD_DEFAULT), date('Y-m-d H:i:s')]);
        audit(null, 'Instalador', 'Administrador inicial criado', $username);
        flash('success', 'Administrador criado. O instalador ficará automaticamente bloqueado enquanto existir um administrador cadastrado.');
        header('Location: admin/login.php'); exit;
    }
}
render_header('Instalação');
?>
<main id="conteudo" class="section"><div class="container narrow"><span class="eyebrow">Configuração inicial</span><h1>Criar administrador</h1><?php if ($error): ?><div class="flash flash-error"><?= e($error) ?></div><?php endif; ?><form class="form-card" method="post"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>"><label>Usuário<input name="username" required minlength="4"></label><label>Senha forte<input type="password" name="password" required minlength="12"></label><label>Confirmar senha<input type="password" name="confirm" required minlength="12"></label><button class="button">Concluir instalação</button></form></div></main>
<?php render_footer(); ?>
