<?php

declare(strict_types=1);

function env_value(string $key, string $default = ''): string
{
    $value = getenv($key);
    return ($value === false || trim($value) === '') ? $default : trim($value);
}

return [
    'site_name' => env_value('SITE_NAME', 'Serventia Extrajudicial do Ofício Único de Anísio de Abreu-PI'),
    'short_name' => env_value('SITE_SHORT_NAME', 'Cartório Graça Rocha'),
    'subtitle' => env_value('SITE_SUBTITLE', 'Serventia Extrajudicial do Ofício Único de Anísio de Abreu-PI'),
    'cns' => env_value('SITE_CNS', '140517'),
    'responsible' => env_value('SITE_RESPONSIBLE', 'Eliésio José da Rocha'),
    'responsible_role' => env_value('SITE_RESPONSIBLE_ROLE', 'Tabelião/Oficial responsável'),
    'address' => env_value('SITE_ADDRESS', 'Rua Lino Ribeiro Soares, n.° 95, Centro'),
    'city' => env_value('SITE_CITY', 'Anísio de Abreu - PI'),
    'phone' => env_value('SITE_PHONE', '89 98114203'),
    'whatsapp' => env_value('SITE_WHATSAPP', '5589981142030'),
    'email' => env_value('SITE_EMAIL', 'cartoriounicoanisio@outlook.com'),
    'hours' => env_value('SITE_HOURS', '08:00 as 14:00'),
    'plantao_rcpn' => env_value('SITE_PLANTAO_RCPN', 'Ativo'),
    'corregedoria_name' => env_value('SITE_CORREGEDORIA_NAME', 'Corregedoria do Foro Extrajudicial do Estado do Piauí'),
    'corregedoria_url' => env_value('SITE_CORREGEDORIA_URL', 'https://www.tjpi.jus.br/'),
    'privacy_officer_name' => env_value('SITE_PRIVACY_OFFICER_NAME', 'PREENCHER NOME/EMPRESA DO ENCARREGADO'),
    'privacy_officer_email' => env_value('SITE_PRIVACY_OFFICER_EMAIL', 'PREENCHER@EMAIL.COM'),
    'base_url' => env_value('APP_URL', ''),
    'mail_enabled' => filter_var(env_value('MAIL_ENABLED', 'false'), FILTER_VALIDATE_BOOL),
    'mail_to' => env_value('MAIL_TO', 'PREENCHER@EMAIL.COM'),
    'max_upload_mb' => max(1, (int) env_value('MAX_UPLOAD_MB', '5')),
    'allowed_uploads' => ['application/pdf', 'image/jpeg', 'image/png'],
];
