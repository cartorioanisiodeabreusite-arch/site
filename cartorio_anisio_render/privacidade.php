<?php
require_once __DIR__ . '/partials.php';
render_header('Política de Privacidade');
?>
<main id="conteudo" class="section legal-page">
<div class="container narrow">
    <span class="eyebrow">Proteção de dados</span><h1>Política de Privacidade do canal eletrônico</h1>
    <p>Esta política descreve o tratamento de dados realizado exclusivamente no formulário de atendimento deste site. Deve ser revisada pelo responsável da serventia e pelo Encarregado antes da publicação.</p>
    <h2>1. Controlador e contato</h2>
    <p>Controlador: <?= e($config['site_name']) ?>. Contato institucional: <?= e($config['email']) ?>. Encarregado: <?= e($config['privacy_officer_name']) ?> — <?= e($config['privacy_officer_email']) ?>.</p>
    <h2>2. Dados tratados</h2>
    <p>Conforme a opção do usuário, podem ser tratados nome, e-mail, telefone, assunto, mensagem, anexo, dados técnicos de segurança e registros de auditoria. O formulário permite manifestação sem identificação pessoal.</p>
    <h2>3. Finalidades</h2>
    <p>Receber, classificar, responder e documentar dúvidas, reclamações, elogios e solicitações de titulares de dados; prevenir abuso; proteger o sistema; e demonstrar o atendimento realizado.</p>
    <h2>4. Necessidade e minimização</h2>
    <p>O usuário deve fornecer somente os dados necessários. Documentos sensíveis, documentos de identidade e dados bancários não devem ser enviados, salvo quando expressamente solicitados em canal seguro para finalidade legítima.</p>
    <h2>5. Compartilhamento</h2>
    <p>Os dados poderão ser acessados por pessoas autorizadas da serventia, pelo Encarregado, por fornecedores indispensáveis à hospedagem e segurança, e por autoridades competentes quando houver dever legal ou regulatório.</p>
    <h2>6. Conservação e descarte</h2>
    <p>O prazo de conservação deverá ser definido no inventário de dados e na tabela de temporalidade adotada pela serventia, considerando a finalidade, obrigações legais, regulatórias e necessidade de defesa de direitos.</p>
    <h2>7. Segurança</h2>
    <p>O sistema utiliza autenticação administrativa, hash de senhas, controle de sessão, validação de arquivos, limitação de requisições, registros de auditoria e armazenamento não público de anexos. A hospedagem deverá usar HTTPS, backups e atualizações regulares.</p>
    <h2>8. Direitos e reclamações</h2>
    <p>Solicitações de titulares podem ser enviadas pela categoria “Privacidade/LGPD”. Também permanecem disponíveis os canais do Encarregado e das autoridades competentes.</p>
    <h2>9. Versão</h2><p>Versão inicial: <?= date('d/m/Y') ?>. Revisar sempre que houver mudança relevante no sistema ou no tratamento de dados.</p>
</div>
</main>
<?php render_footer(); ?>
