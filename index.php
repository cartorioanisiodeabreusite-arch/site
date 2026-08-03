<?php
require_once __DIR__ . '/partials.php';
render_header();
?>
<main id="conteudo">
<section id="inicio" class="hero hero-modern">
    <div class="container hero-grid hero-grid-modern">
        <div class="hero-copy">
            <span class="eyebrow">Atendimento digital • Informação • Transparência</span>
            <h1>Cartório Graça Rocha</h1>
            <p class="hero-subtitle">Serventia Extrajudicial do Ofício Único de Anísio de Abreu-PI</p>
            <p class="lead">Um portal institucional mais moderno para facilitar o acesso às informações do cartório, aos serviços mais procurados e ao canal oficial de dúvidas, reclamações e elogios.</p>

            <div class="actions">
                <a class="button" href="solicitacao.php">Criar solicitação</a>
                <a class="button button-secondary" href="acompanhar.php">Acompanhar protocolo</a>
            </div>

            <div class="hero-highlights">
                <span>Registro Civil</span>
                <span>Tabelionato de Notas</span>
                <span>Registro de Imóveis</span>
                <span>Protesto</span>
                <span>RTD</span>
                <span>RCPJ</span>
            </div>

            <?php if (str_contains($config['address'], 'PREENCHER')): ?>
            <p class="setup-warning"><strong>Versão de configuração:</strong> antes de publicar, preencha os dados institucionais em <code>config.php</code> ou nas variáveis de ambiente do Render.</p>
            <?php endif; ?>
        </div>

        <aside class="hero-side">
            <div class="logo-showcase">
                <img src="assets/logo-cartorio-graca-rocha.png" alt="Logo do Cartório Graça Rocha">
            </div>

            <div class="hero-card hero-contact-card" aria-label="Informações rápidas">
                <div class="hero-card-top">
                    <span class="mini-badge">Atendimento</span>
                    <h2>Informações rápidas</h2>
                </div>
                <dl>
                    <div><dt>Endereço</dt><dd><?= e($config['address']) ?></dd></div>
                    <div><dt>Horário</dt><dd><?= e($config['hours']) ?></dd></div>
                    <div><dt>Telefone</dt><dd><?= e($config['phone']) ?></dd></div>
                    <div><dt>WhatsApp</dt><dd><a href="https://wa.me/<?= e($config['whatsapp']) ?>" target="_blank" rel="noopener">Abrir conversa</a></dd></div>
                </dl>
            </div>
        </aside>
    </div>
</section>

<section class="quick-links modern-quick-links" aria-label="Acessos rápidos">
    <div class="container quick-grid modern-quick-grid">
        <a href="#servicos"><span>01</span><strong>Serviços</strong><small>Conheça os atos praticados pela serventia</small></a>
        <a href="#documentos"><span>02</span><strong>Orientações</strong><small>Documentos básicos e informações iniciais</small></a>
        <a href="#normas"><span>03</span><strong>Transparência</strong><small>Normas, links úteis e emolumentos</small></a>
        <a href="solicitacao.php"><span>04</span><strong>Atendimento</strong><small>Canal para dúvidas, reclamações e elogios</small></a>
    </div>
</section>

<section class="section section-soft">
    <div class="container stats-row">
        <article class="stat-card"><strong>Canal oficial</strong><span>Solicitações com protocolo e consulta posterior.</span></article>
        <article class="stat-card"><strong>Atendimento institucional</strong><span>Informações do cartório organizadas em um só lugar.</span></article>
        <article class="stat-card"><strong>Portal responsivo</strong><span>Experiência moderna para celular, tablet e computador.</span></article>
    </div>
</section>

<section id="servicos" class="section">
    <div class="container">
        <div class="section-heading"><span class="eyebrow">Serviços</span><h2>Atos praticados pela serventia</h2><p>As exigências podem variar conforme o caso concreto e a qualificação jurídica do título ou pedido apresentado.</p></div>
        <div class="cards cards-modern">
            <article class="card service-card"><span class="card-number">01</span><h3>Registro Civil</h3><p>Nascimento, casamento, óbito, certidões, averbações, retificações e demais atos do estado civil.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card service-card"><span class="card-number">02</span><h3>Tabelionato de Notas</h3><p>Escrituras, procurações, atas notariais, reconhecimento de firma, autenticação e apostilamento, quando credenciado.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card service-card"><span class="card-number">03</span><h3>Protesto de Títulos</h3><p>Apontamento, intimação, pagamento, desistência, cancelamento, certidões e informações.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card service-card"><span class="card-number">04</span><h3>Registro de Imóveis</h3><p>Registros, averbações, certidões, retificações, REURB e procedimentos extrajudiciais.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card service-card"><span class="card-number">05</span><h3>Títulos e Documentos</h3><p>Registro de documentos para publicidade, eficácia perante terceiros, conservação e notificações.</p><a href="#documentos">Ver orientações</a></article>
            <article class="card service-card"><span class="card-number">06</span><h3>Pessoas Jurídicas</h3><p>Registro e averbação de atos constitutivos, atas, alterações, livros e certidões de pessoas jurídicas.</p><a href="#documentos">Ver orientações</a></article>
        </div>
    </div>
</section>

<section id="documentos" class="section section-muted">
    <div class="container narrow">
        <div class="section-heading center"><span class="eyebrow">Orientações iniciais</span><h2>Documentos básicos e informações preliminares</h2><p>Lista meramente indicativa. Conforme o caso, o cartório poderá solicitar documentos complementares para a segurança jurídica do ato.</p></div>
        <div class="accordion">
            <details><summary>Certidões</summary><p>Informe o tipo de registro, nome completo, filiação, data aproximada do ato e demais dados que facilitem a localização. Pedidos sujeitos às regras de publicidade e proteção de dados.</p></details>
            <details><summary>Reconhecimento de firma e autenticação</summary><p>Apresente documento de identificação original e o documento a ser reconhecido ou autenticado. Não assine antecipadamente quando o reconhecimento for por autenticidade.</p></details>
            <details><summary>Procuração pública</summary><p>Documento de identificação, CPF, estado civil, endereço, profissão, qualificação do procurador e descrição clara dos poderes. Dependendo do objeto, poderão ser exigidos documentos complementares.</p></details>
            <details><summary>Registro de imóvel</summary><p>Título original ou eletrônico válido, documentos das partes, comprovantes tributários e demais documentos relacionados ao ato. O título será submetido à qualificação registral.</p></details>
            <details><summary>Protesto e cancelamento</summary><p>Para pagamento, utilize os canais indicados na intimação. Para cancelamento, apresente o documento hábil ou autorização do credor, conforme a legislação aplicável.</p></details>
            <details><summary>Registro de pessoa jurídica e títulos/documentos</summary><p>Requerimento, instrumento a registrar, documentos de representação e assinaturas exigidas. A documentação depende da natureza do documento e da finalidade do registro.</p></details>
        </div>
    </div>
</section>

<section id="informacoes" class="section">
    <div class="container info-grid info-grid-modern">
        <div>
            <span class="eyebrow">Informações institucionais</span>
            <h2>Identificação da serventia</h2>
            <div class="info-panel">
                <p><strong>Nome institucional:</strong> Cartório Graça Rocha</p>
                <p><strong>Denominação:</strong> <?= e($config['site_name']) ?></p>
                <p><strong>Responsável:</strong> <?= e($config['responsible']) ?> — <?= e($config['responsible_role']) ?></p>
                <p><strong>CNS:</strong> <?= e($config['cns']) ?></p>
                <p><strong>Endereço:</strong> <?= e($config['address']) ?>, <?= e($config['city']) ?></p>
                <p><strong>Atendimento:</strong> <?= e($config['hours']) ?></p>
                <p><strong>Plantão do RCPN:</strong> <?= e($config['plantao_rcpn']) ?></p>
            </div>
        </div>
        <div class="contact-box modern-contact-box">
            <h3>Fale com a serventia</h3>
            <p>O portal disponibiliza um canal eletrônico para manifestações com geração de protocolo e resposta administrativa.</p>
            <a class="button" href="solicitacao.php">Abrir atendimento</a>
            <p class="small">Também é possível consultar o andamento da sua solicitação informando o número do protocolo e a chave de acesso.</p>
        </div>
    </div>
</section>

<section id="normas" class="section section-dark modern-dark">
    <div class="container">
        <div class="section-heading"><span class="eyebrow">Transparência</span><h2>Normas, links úteis e emolumentos</h2><p>O envio de dúvida, reclamação ou elogio não constitui ato notarial ou registral e não gera cobrança de emolumentos.</p></div>
        <div class="norm-grid">
            <div><h3>Código Nacional de Normas</h3><p>Provimento CNJ nº 149/2023, em texto compilado.</p><span class="tag">Adicionar link oficial no config</span></div>
            <div><h3>Código de Normas do Piauí</h3><p>Provimento CGJ/PI nº 62/2024 e alterações.</p><span class="tag">Adicionar link oficial no config</span></div>
            <div><h3>Tabela de emolumentos</h3><p>Consulta aos atos, códigos e valores vigentes no Estado do Piauí.</p><span class="tag">Adicionar PDF ou link oficial</span></div>
        </div>
    </div>
</section>

<section class="section callout modern-callout">
    <div class="container callout-inner">
        <div>
            <span class="eyebrow">Canal eletrônico</span>
            <h2>Precisa registrar uma manifestação?</h2>
            <p>Envie uma dúvida, reclamação, elogio ou solicitação relacionada à proteção de dados com protocolo para acompanhamento.</p>
        </div>
        <a class="button button-light" href="solicitacao.php">Criar solicitação</a>
    </div>
</section>
</main>
<?php render_footer(); ?>
