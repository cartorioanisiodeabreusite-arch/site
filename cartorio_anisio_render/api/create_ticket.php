<?php
declare(strict_types=1);
require_once dirname(__DIR__) . '/bootstrap.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); exit('Método não permitido.');
}
verify_csrf($_POST['csrf'] ?? null);

if (!empty($_POST['company'])) {
    header('Location: ../solicitacao.php'); exit;
}
if (!rate_limit_ok()) {
    flash('error', 'Limite temporário de solicitações atingido. Aguarde e tente novamente.');
    header('Location: ../solicitacao.php'); exit;
}

$allowedTypes = ['Dúvida', 'Reclamação', 'Elogio', 'Privacidade/LGPD'];
$type = trim((string)($_POST['type'] ?? ''));
$anonymous = isset($_POST['anonymous']) ? 1 : 0;
$name = trim((string)($_POST['name'] ?? ''));
$email = trim((string)($_POST['email'] ?? ''));
$phone = normalize_phone((string)($_POST['phone'] ?? ''));
$preferred = trim((string)($_POST['preferred_contact'] ?? 'Portal'));
$subject = trim((string)($_POST['subject'] ?? ''));
$message = trim((string)($_POST['message'] ?? ''));
$privacy = isset($_POST['privacy']);

$errors = [];
if (!in_array($type, $allowedTypes, true)) $errors[] = 'Selecione um tipo válido.';
if (!$privacy) $errors[] = 'É necessário confirmar a ciência da Política de Privacidade.';
if ($subject === '' || mb_strlen($subject) > 180) $errors[] = 'Informe um assunto válido.';
if ($message === '' || mb_strlen($message) > 5000) $errors[] = 'Informe uma mensagem válida.';
if (!$anonymous && $name === '') $errors[] = 'Informe seu nome ou marque a opção de envio sem identificação.';
if ($email !== '' && !filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = 'Informe um e-mail válido.';

if ($errors) {
    flash('error', implode(' ', $errors));
    header('Location: ../solicitacao.php'); exit;
}

$attachmentName = $attachmentPath = $attachmentMime = null;
if (!empty($_FILES['attachment']['name'])) {
    $file = $_FILES['attachment'];
    if ($file['error'] !== UPLOAD_ERR_OK) {
        flash('error', 'Não foi possível receber o anexo.');
        header('Location: ../solicitacao.php'); exit;
    }
    if ($file['size'] > ((int)$config['max_upload_mb'] * 1024 * 1024)) {
        flash('error', 'O anexo excede o limite permitido.');
        header('Location: ../solicitacao.php'); exit;
    }
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime = $finfo->file($file['tmp_name']);
    if (!in_array($mime, $config['allowed_uploads'], true)) {
        flash('error', 'Tipo de arquivo não permitido.');
        header('Location: ../solicitacao.php'); exit;
    }
    $ext = match ($mime) { 'application/pdf' => 'pdf', 'image/jpeg' => 'jpg', 'image/png' => 'png', default => 'bin' };
    $stored = bin2hex(random_bytes(16)) . '.' . $ext;
    $dest = dirname(__DIR__) . '/storage/uploads/' . $stored;
    if (!move_uploaded_file($file['tmp_name'], $dest)) {
        flash('error', 'Falha ao armazenar o anexo.');
        header('Location: ../solicitacao.php'); exit;
    }
    $attachmentName = mb_substr(basename((string)$file['name']), 0, 200);
    $attachmentPath = $stored;
    $attachmentMime = $mime;
}

$protocol = generate_protocol();
$accessKey = generate_access_key();
$now = date('Y-m-d H:i:s');
$stmt = db()->prepare('INSERT INTO tickets (protocol, access_key_hash, type, anonymous, name, email, phone, preferred_contact, subject, message, attachment_name, attachment_path, attachment_mime, status, ip_hash, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
$stmt->execute([
    $protocol,
    password_hash($accessKey, PASSWORD_DEFAULT),
    $type,
    $anonymous,
    $anonymous ? null : $name,
    $anonymous ? null : ($email ?: null),
    $anonymous ? null : ($phone ?: null),
    $preferred,
    $subject,
    $message,
    $attachmentName,
    $attachmentPath,
    $attachmentMime,
    'Recebida',
    ip_hash(),
    $now,
    $now,
]);
$id = (int)db()->lastInsertId();
audit($id, 'Usuário', 'Solicitação criada', $type);

$_SESSION['new_ticket'] = ['protocol' => $protocol, 'access_key' => $accessKey];
header('Location: ../sucesso.php');
