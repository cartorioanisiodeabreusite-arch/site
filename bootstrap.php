<?php
declare(strict_types=1);

$config = require __DIR__ . '/config.php';

date_default_timezone_set('America/Fortaleza');

if (session_status() !== PHP_SESSION_ACTIVE) {
    $secure = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off');
    session_set_cookie_params([
        'httponly' => true,
        'secure' => $secure,
        'samesite' => 'Lax',
        'path' => '/',
    ]);
    session_start();
}

function db(): PDO
{
    static $pdo;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $storage = __DIR__ . '/storage';
    if (!is_dir($storage)) {
        mkdir($storage, 0700, true);
    }

    $pdo = new PDO('sqlite:' . $storage . '/cartorio.sqlite');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->exec('PRAGMA foreign_keys = ON');
    $pdo->exec('PRAGMA journal_mode = WAL');

    $pdo->exec("CREATE TABLE IF NOT EXISTS tickets (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        protocol TEXT NOT NULL UNIQUE,
        access_key_hash TEXT NOT NULL,
        type TEXT NOT NULL,
        anonymous INTEGER NOT NULL DEFAULT 0,
        name TEXT,
        email TEXT,
        phone TEXT,
        preferred_contact TEXT,
        subject TEXT NOT NULL,
        message TEXT NOT NULL,
        attachment_name TEXT,
        attachment_path TEXT,
        attachment_mime TEXT,
        status TEXT NOT NULL DEFAULT 'Recebida',
        public_response TEXT,
        internal_notes TEXT,
        ip_hash TEXT,
        created_at TEXT NOT NULL,
        updated_at TEXT NOT NULL
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS admins (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        username TEXT NOT NULL UNIQUE,
        password_hash TEXT NOT NULL,
        created_at TEXT NOT NULL
    )");

    $pdo->exec("CREATE TABLE IF NOT EXISTS audit_log (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        ticket_id INTEGER,
        actor TEXT NOT NULL,
        action TEXT NOT NULL,
        details TEXT,
        created_at TEXT NOT NULL,
        FOREIGN KEY(ticket_id) REFERENCES tickets(id) ON DELETE SET NULL
    )");

    return $pdo;
}

function e(?string $value): string
{
    return htmlspecialchars((string)$value, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
}

function csrf_token(): string
{
    if (empty($_SESSION['csrf'])) {
        $_SESSION['csrf'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf'];
}

function verify_csrf(?string $token): void
{
    if (!$token || !hash_equals($_SESSION['csrf'] ?? '', $token)) {
        http_response_code(419);
        exit('Sessão expirada ou solicitação inválida. Atualize a página e tente novamente.');
    }
}

function flash(string $type, string $message): void
{
    $_SESSION['flash'] = ['type' => $type, 'message' => $message];
}

function get_flash(): ?array
{
    $flash = $_SESSION['flash'] ?? null;
    unset($_SESSION['flash']);
    return $flash;
}

function admin_logged_in(): bool
{
    return !empty($_SESSION['admin_id']);
}

function require_admin(): void
{
    if (!admin_logged_in()) {
        header('Location: login.php');
        exit;
    }
}

function normalize_phone(string $phone): string
{
    return preg_replace('/\D+/', '', $phone) ?? '';
}

function generate_protocol(): string
{
    return 'AA-' . date('Ymd') . '-' . strtoupper(bin2hex(random_bytes(3)));
}

function generate_access_key(): string
{
    $alphabet = 'ABCDEFGHJKLMNPQRSTUVWXYZ23456789';
    $key = '';
    for ($i = 0; $i < 8; $i++) {
        $key .= $alphabet[random_int(0, strlen($alphabet) - 1)];
    }
    return $key;
}

function ip_hash(): string
{
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
    return hash('sha256', $ip . '|cartorio-anisio-rate-limit');
}

function rate_limit_ok(): bool
{
    $stmt = db()->prepare("SELECT COUNT(*) FROM tickets WHERE ip_hash = ? AND created_at >= datetime('now', '-1 hour')");
    $stmt->execute([ip_hash()]);
    return ((int)$stmt->fetchColumn()) < 5;
}

function audit(?int $ticketId, string $actor, string $action, ?string $details = null): void
{
    $stmt = db()->prepare('INSERT INTO audit_log (ticket_id, actor, action, details, created_at) VALUES (?, ?, ?, ?, ?)');
    $stmt->execute([$ticketId, $actor, $action, $details, date('Y-m-d H:i:s')]);
}

function setup_complete(): bool
{
    return (bool)db()->query('SELECT COUNT(*) FROM admins')->fetchColumn();
}
