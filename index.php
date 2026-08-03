<?php
require_once __DIR__ . '/partials.php';
render_header();
?>
<main id="conteudo">
<section id="inicio" class="hero">
    <div class="container hero-grid">
        <div>
            <span class="eyebrow">Serviço extrajudicial • Anísio de Abreu - PI</span>
            <h1>Informação clara e atendimento acessível para os serviços do cartório.</h1>
            <p class="lead">Consulte orientações, documentos básicos, canais oficiais e envie dúvidas, reclamações ou elogios com geração de protocolo.</p>
            <div class="actions">
                <a class="button" href="solicitacao.php">Criar solicitação</a>
                <a class="button button-secondary" href="acompanhar.php">Acompanhar protocolo</a>
            </div>
            <?php if (str_contains($config['address'], 'PREENCHER')): ?>
            <p class="setup-warning"><strong>Versão de configuração:</strong> antes de publicar, preencha os dados institucionais em <code>config.php</code>.</p>
            <?php endif; ?>
        </div>
        <aside class="hero-card" aria-label="Informações rápidas">
            <h2>Atendimento</h2>
            <dl>
                <div><dt>Endereço</dt><dd><?= e($config['address']) ?></dd></div>
                <div><dt>Horário</dt><dd><?= e($config['hours']) ?></dd></div>
                <div><dt>Telefone</dt><dd><?= e($config['phone']) ?></dd></div>
                <div><dt>WhatsApp</dt><dd><a href="https://wa.me/<?= e($config['whatsapp']) ?>" target="_blank" rel="noopener">Abrir conversa</a></dd></div>
            </dl>
        </aside>
    </div>
</section>

<section class="quick-links" aria-label="Acessos rápidos">
    <div class="container quick-grid">
        <a href="#servicos"><span>01</span>Conheça os serviços</a>
        <a href="#documentos"><span>02</span>Documentos básicos</a>
        <a href="#normas"><span>03</span>Normas e emolumentos</a>
        <a href="solicitacao.php"><span>04</span>Ouvidoria e atendimento</a>
    </div>
</section>

<section id="servicos" class="section">
    <div class="container">
        <div class="section-heading"><span class="eyebrow">Serviços</span><h2>Atos praticados pela serventia</h2><p>As exigências podem variar conforme o caso concreto e a qualificação jurídica do título.</p></div>
        <div class="cards">
            <article class="card"><h3>Registro Civil</h3><p>Nascimento, casamento, óbito, certidões, averbações, retificações e demais atos do estado civil.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card"><h3>Tabelionato de Notas</h3><p>Escrituras, procurações, atas notariais, reconhecimento de firma, autenticação e apostilamento, quando credenciado.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card"><h3>Protesto de Títulos</h3><p>Apontamento, intimação, pagamento, desistência, cancelamento, certidões e informações.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card"><h3>Registro de Imóveis</h3><p>Registros, averbações, certidões, retificações, regularização fundiária e procedimentos extrajudiciais.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card"><h3>Títulos e Documentos</h3><p>Registro de documentos para publicidade, eficácia perante terceiros, conservação e notificações.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card"><h3>Pessoas Jurídicas</h3><p>Registro e averbação de atos constitutivos, atas, alterações, livros e certidões de pessoas jurídicas.</p><a href="#documentos">Ver orientações</a></article>
        </div>
    </div>
</section>

<section id="documentos" class="section section-muted">
    <div class="container narrow">
        <div class="section-heading"><span class="eyebrow">Orientações iniciais</span><h2>Documentos básicos</h2><p>Lista indicativa. O atendimento poderá solicitar documentos complementares previstos em lei ou necessários à segurança do ato.</p></div>
        <div class="accordion">
            <details><summary>Certidões</summary><p>Informe o tipo de registro, nome completo, filiação, data aproximada do ato e demais dados que facilitem a localização. Pedidos sujeitos à identificação e às regras de publicidade e proteção de dados.</p></details>
            <details><summary>Reconhecimento de firma e autenticação</summary><p>Apresente documento de identificação original e o documento a ser reconhecido ou autenticado. Não assine antecipadamente quando o reconhecimento for por autenticidade.</p></details>
            <details><summary>Procuração pública</summary><p>Documento de identificação, CPF, estado civil, endereço, profissão, qualificação do procurador e descrição clara dos poderes. Para bens e operações específicas, poderão ser exigidos documentos complementares.</p></details>
            <details><summary>Registro de imóvel</summary><p>Título original ou eletrônico válido, documentos das partes, comprovantes tributários e demais documentos relacionados ao ato. O título será submetido à qualificação registral.</p></details>
            <details><summary>Protesto e cancelamento</summary><p>Para pagamento, utilize os canais indicados na intimação. Para cancelamento, apresente o documento hábil ou autorização do credor, conforme a legislação aplicável.</p></details>
            <details><summary>Registro de pessoa jurídica e títulos/documentos</summary><p>Requerimento, instrumento a registrar, documentos de representação e assinaturas exigidas. A lista depende da natureza do documento e da finalidade do registro.</p></details>
        </div>
    </div>
</section>

<section id="informacoes" class="section">
    <div class="container info-grid">
        <div>
            <span class="eyebrow">Informações institucionais</span>
            <h2><?= e($config['site_name']) ?></h2>
            <p><strong>Responsável:</strong> <?= e($config['responsible']) ?> — <?= e($config['responsible_role']) ?></p>
            <p><strong>CNS:</strong> <?= e($config['cns']) ?></p>
            <p><strong>Endereço:</strong> <?= e($config['address']) ?>, <?= e($config['city']) ?></p>
            <p><strong>Atendimento:</strong> <?= e($config['hours']) ?></p>
            <p><strong>Plantão do RCPN:</strong> <?= e($config['plantao_rcpn']) ?></p>
        </div>
        <div class="contact-box">
            <h3>Fale com a serventia</h3>
            <p>Para registro formal e acompanhamento, utilize o formulário eletrônico.</p>
            <a class="button" href="solicitacao.php">Abrir atendimento</a>
            <p class="small">Para críticas, elogios ou reclamações à fiscalização, consulte também os canais da <?= e($config['corregedoria_name']) ?>.</p>
        </div>
    </div>
</section>

<section id="normas" class="section section-dark">
    <div class="container">
        <div class="section-heading"><span class="eyebrow">Transparência</span><h2>Normas e emolumentos</h2><p>Os valores dos atos são os previstos na tabela estadual vigente. O envio de dúvida, reclamação ou elogio não constitui ato notarial ou registral e não gera emolumentos.</p></div>
        <div class="norm-grid">
            <div><h3>Código Nacional de Normas</h3><p>Provimento CNJ nº 149/2023, em texto compilado.</p><span class="tag">Adicionar link oficial no config</span></div>
            <div><h3>Código de Normas do Piauí</h3><p>Provimento CGJ/PI nº 62/2024 e alterações.</p><span class="tag">Adicionar link oficial no config</span></div>
            <div><h3>Tabela de emolumentos</h3><p>Consulta aos atos, códigos e valores vigentes no Estado do Piauí.</p><span class="tag">Adicionar PDF ou link oficial</span></div>
        </div>
    </div>
</section>

<section class="section callout">
    <div class="container callout-inner"><div><span class="eyebrow">Canal de atendimento</span><h2>Precisa registrar uma manifestação?</h2><p>Envie uma dúvida, reclamação, elogio ou solicitação relacionada à proteção de dados.</p></div><a class="button button-light" href="solicitacao.php">Criar solicitação</a></div>
</section>
</main>
<?php render_footer(); ?>
