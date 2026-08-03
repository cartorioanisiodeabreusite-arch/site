<?php
require_once dirname(__DIR__) . '/partials.php';
if (!setup_complete()) { header('Location: ../install.php'); exit; }
if (admin_logged_in()) { header('Location: index.php'); exit; }
$error = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    verify_csrf($_POST['csrf'] ?? null);
    $username = trim((string)($_POST['username'] ?? ''));
    $password = (string)($_POST['password'] ?? '');
    $stmt = db()->prepare('SELECT * FROM admins WHERE username = ?');
    $stmt->execute([$username]);
    $admin = $stmt->fetch();
    if ($admin && password_verify($password, $admin['password_hash'])) {
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_username'] = $admin['username'];
        audit(null, 'Admin:' . $admin['username'], 'Login');
        header('Location: index.php'); exit;
    }
    $error = 'Credenciais inválidas.';
    usleep(500000);
}
render_header('Acesso administrativo');
?>
<main id="conteudo" class="section"><div class="container narrow"><span class="eyebrow">Área restrita</span><h1>Acesso administrativo</h1><?php if ($error): ?><div class="flash flash-error"><?= e($error) ?></div><?php endif; ?><form class="form-card compact" method="post"><input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>"><label>Usuário<input name="username" autocomplete="username" required></label><label>Senha<input type="password" name="password" autocomplete="current-password" required></label><button class="button">Entrar</button></form></div></main>
<?php render_footer(); ?>
