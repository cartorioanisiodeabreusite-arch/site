<?php
require_once dirname(__DIR__) . '/bootstrap.php';
require_admin();
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$stmt = db()->prepare('SELECT attachment_name, attachment_path, attachment_mime FROM tickets WHERE id = ?');
$stmt->execute([$id]); $file = $stmt->fetch();
if (!$file || !$file['attachment_path']) { http_response_code(404); exit('Arquivo não encontrado.'); }
$path = dirname(__DIR__) . '/storage/uploads/' . basename($file['attachment_path']);
if (!is_file($path)) { http_response_code(404); exit('Arquivo não encontrado.'); }
header('Content-Type: ' . $file['attachment_mime']);
header('Content-Length: ' . filesize($path));
header('Content-Disposition: attachment; filename="' . rawurlencode($file['attachment_name']) . '"');
readfile($path);
