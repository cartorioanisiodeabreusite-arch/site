<?php
require_once __DIR__ . '/partials.php';
render_header('Criar solicitação');
?>
<main id="conteudo" class="section">
<div class="container form-layout">
    <div>
        <span class="eyebrow">Atendimento eletrônico</span>
        <h1>Criar solicitação</h1>
        <p>Use este canal para dúvidas, reclamações, elogios ou assuntos de privacidade e proteção de dados. Ao concluir, será gerado um protocolo e uma chave de acesso.</p>
        <div class="notice"><strong>Atenção:</strong> este formulário não substitui o protocolo formal de títulos, pedidos de certidão ou atos que devam ingressar pelas centrais eletrônicas oficiais. Não envie documentos sensíveis além do necessário.</div>
    </div>
    <form class="form-card" action="api/create_ticket.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf" value="<?= e(csrf_token()) ?>">
        <div class="honeypot" aria-hidden="true"><label>Empresa<input type="text" name="company" tabindex="-1" autocomplete="off"></label></div>
        <label>Tipo de manifestação
            <select name="type" required>
                <option value="">Selecione</option>
                <option>Dúvida</option>
                <option>Reclamação</option>
                <option>Elogio</option>
                <option>Privacidade/LGPD</option>
            </select>
        </label>
        <label class="check"><input type="checkbox" name="anonymous" value="1" id="anonymous"> Enviar sem identificação pessoal</label>
        <div id="identity-fields" class="grid-2">
            <label>Nome completo<input type="text" name="name" maxlength="120" autocomplete="name"></label>
            <label>E-mail<input type="email" name="email" maxlength="160" autocomplete="email"></label>
            <label>Telefone/WhatsApp<input type="tel" name="phone" maxlength="25" autocomplete="tel"></label>
            <label>Preferência de contato
                <select name="preferred_contact"><option value="Portal">Resposta no portal</option><option value="E-mail">E-mail</option><option value="WhatsApp">WhatsApp</option><option value="Telefone">Telefone</option></select>
            </label>
        </div>
        <label>Assunto<input type="text" name="subject" maxlength="180" required></label>
        <label>Mensagem<textarea name="message" rows="8" maxlength="5000" required placeholder="Descreva os fatos de modo objetivo, incluindo datas e números de protocolo quando houver."></textarea></label>
        <label>Anexo opcional <small>(PDF, JPG ou PNG; até <?= (int)$config['max_upload_mb'] ?> MB)</small><input type="file" name="attachment" accept=".pdf,.jpg,.jpeg,.png"></label>
        <label class="check"><input type="checkbox" name="privacy" value="1" required> Li a <a href="privacidade.php" target="_blank">Política de Privacidade</a> e estou ciente do tratamento dos dados necessários ao atendimento.</label>
        <button class="button" type="submit">Enviar e gerar protocolo</button>
    </form>
</div>
</main>
<?php render_footer(); ?>
