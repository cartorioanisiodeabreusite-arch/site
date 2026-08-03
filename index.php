<?php
require_once __DIR__ . '/partials.php';
render_header();
?>
<main id="conteudo">
<section id="inicio" class="premium-hero">
    <div class="hero-glow hero-glow-one" aria-hidden="true"></div>
    <div class="hero-glow hero-glow-two" aria-hidden="true"></div>

    <div class="container premium-hero-grid">
        <div class="premium-hero-copy">
            <span class="eyebrow eyebrow-light">Segurança jurídica • Atendimento próximo • Transparência</span>
            <h1>Cartório<br><span>Graça Rocha</span></h1>
            <p class="premium-subtitle">Serventia Extrajudicial do Ofício Único de Anísio de Abreu-PI</p>
            <p class="premium-lead">Informação clara, atendimento acessível e soluções extrajudiciais reunidas em um portal institucional moderno.</p>

            <div class="actions premium-actions">
                <a class="button button-gold" href="solicitacao.php">Criar solicitação</a>
                <a class="button button-glass" href="acompanhar.php">Acompanhar protocolo</a>
            </div>

            <div class="hero-trust-list" aria-label="Diferenciais do portal">
                <span>Protocolo eletrônico</span>
                <span>Consulta de andamento</span>
                <span>Canal de manifestações</span>
            </div>

            <?php if (str_contains($config['address'], 'PREENCHER')): ?>
            <p class="setup-warning setup-warning-dark"><strong>Configuração pendente:</strong> preencha os dados institucionais no Render ou em <code>config.php</code>.</p>
            <?php endif; ?>
        </div>

        <aside class="premium-identity-card" aria-label="Identidade institucional e informações de atendimento">
            <div class="identity-logo-area">
                <div class="identity-logo-ring">
                    <img src="assets/logo-cartorio-graca-rocha.png" alt="Logo do Cartório Graça Rocha">
                </div>
                <p>Fé pública, segurança e cidadania</p>
            </div>

            <div class="identity-details">
                <div class="identity-detail">
                    <span>Atendimento</span>
                    <strong><?= e($config['hours']) ?></strong>
                </div>
                <div class="identity-detail">
                    <span>Localização</span>
                    <strong><?= e($config['city']) ?></strong>
                </div>
                <div class="identity-detail">
                    <span>WhatsApp</span>
                    <a href="https://wa.me/<?= e($config['whatsapp']) ?>" target="_blank" rel="noopener">Abrir conversa</a>
                </div>
            </div>
        </aside>
    </div>

    <div class="container hero-service-strip" aria-label="Especialidades da serventia">
        <span>Registro Civil</span>
        <span>Tabelionato de Notas</span>
        <span>Registro de Imóveis</span>
        <span>Protesto</span>
        <span>RTD e RCPJ</span>
    </div>
</section>

<section class="premium-pathways" aria-label="Acessos principais">
    <div class="container pathways-grid">
        <a class="pathway-card pathway-primary" href="solicitacao.php">
            <span class="pathway-kicker">Atendimento eletrônico</span>
            <strong>Enviar uma manifestação</strong>
            <p>Dúvidas, reclamações, elogios ou solicitações relacionadas à proteção de dados.</p>
            <span class="pathway-link">Criar protocolo →</span>
        </a>
        <a class="pathway-card" href="acompanhar.php">
            <span class="pathway-kicker">Consulta segura</span>
            <strong>Acompanhar atendimento</strong>
            <p>Consulte a resposta e o andamento usando protocolo e chave de acesso.</p>
            <span class="pathway-link">Consultar agora →</span>
        </a>
        <a class="pathway-card" href="#documentos">
            <span class="pathway-kicker">Antes de comparecer</span>
            <strong>Ver documentos básicos</strong>
            <p>Confira orientações iniciais para os serviços mais procurados.</p>
            <span class="pathway-link">Ver orientações →</span>
        </a>
    </div>
</section>

<section id="servicos" class="section premium-services">
    <div class="container">
        <div class="premium-section-heading">
            <div>
                <span class="eyebrow">Serviços extrajudiciais</span>
                <h2>Soluções para diferentes momentos da vida civil</h2>
            </div>
            <p>A serventia reúne atribuições notariais e registrais. Cada pedido é analisado conforme a legislação e as particularidades do caso concreto.</p>
        </div>

        <div class="premium-service-grid">
            <article class="premium-service-card">
                <span class="service-index">01</span>
                <div class="service-symbol" aria-hidden="true">N</div>
                <h3>Registro Civil</h3>
                <p>Nascimentos, casamentos, óbitos, certidões, averbações, retificações e atos relativos ao estado civil.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>

            <article class="premium-service-card">
                <span class="service-index">02</span>
                <div class="service-symbol" aria-hidden="true">F</div>
                <h3>Tabelionato de Notas</h3>
                <p>Escrituras, procurações, atas notariais, autenticações, reconhecimentos de firma e demais atos notariais.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>

            <article class="premium-service-card">
                <span class="service-index">03</span>
                <div class="service-symbol" aria-hidden="true">P</div>
                <h3>Protesto de Títulos</h3>
                <p>Apontamento, intimação, pagamento, desistência, cancelamento, certidões e informações de protesto.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>

            <article class="premium-service-card">
                <span class="service-index">04</span>
                <div class="service-symbol" aria-hidden="true">I</div>
                <h3>Registro de Imóveis</h3>
                <p>Registros, averbações, certidões, retificações, regularização fundiária e procedimentos imobiliários.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>

            <article class="premium-service-card">
                <span class="service-index">05</span>
                <div class="service-symbol" aria-hidden="true">D</div>
                <h3>Títulos e Documentos</h3>
                <p>Publicidade, conservação, eficácia perante terceiros, notificações e registro de documentos em geral.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>

            <article class="premium-service-card">
                <span class="service-index">06</span>
                <div class="service-symbol" aria-hidden="true">J</div>
                <h3>Pessoas Jurídicas</h3>
                <p>Registro e averbação de atos constitutivos, atas, alterações, livros e certidões de pessoas jurídicas.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>
        </div>
    </div>
</section>

<section class="premium-values-section">
    <div class="container premium-values-grid">
        <div class="values-intro">
            <span class="eyebrow eyebrow-light">Compromisso institucional</span>
            <h2>Atendimento com clareza, respeito e responsabilidade</h2>
            <p>O portal foi organizado para facilitar o acesso às informações da serventia e oferecer um canal formal de comunicação com o usuário.</p>
        </div>

        <div class="values-list">
            <article>
                <span>01</span>
                <div><strong>Segurança jurídica</strong><p>Atos praticados com observância da legislação aplicável e da qualificação jurídica.</p></div>
            </article>
            <article>
                <span>02</span>
                <div><strong>Transparência</strong><p>Informações institucionais, normas e canais de atendimento disponíveis ao público.</p></div>
            </article>
            <article>
                <span>03</span>
                <div><strong>Acessibilidade</strong><p>Navegação responsiva e linguagem objetiva para facilitar o atendimento.</p></div>
            </article>
        </div>
    </div>
</section>

<section id="documentos" class="section section-muted premium-guidance">
    <div class="container premium-guidance-grid">
        <div class="guidance-intro">
            <span class="eyebrow">Orientações iniciais</span>
            <h2>Prepare-se antes de solicitar o serviço</h2>
            <p>As listas abaixo são indicativas. Dependendo do ato e do caso concreto, poderão ser solicitados documentos adicionais para garantir a segurança jurídica.</p>
            <a class="text-link" href="solicitacao.php">Ainda tem dúvida? Fale com a serventia →</a>
        </div>

        <div class="accordion premium-accordion">
            <details open>
                <summary>Certidões</summary>
                <p>Informe o tipo de registro, nome completo, filiação, data aproximada do ato e demais dados que facilitem a localização. O fornecimento observará as regras de publicidade e proteção de dados.</p>
            </details>
            <details>
                <summary>Reconhecimento de firma e autenticação</summary>
                <p>Apresente documento de identificação original e o documento objeto do serviço. Para reconhecimento por autenticidade, a assinatura deverá ser lançada perante o atendente.</p>
            </details>
            <details>
                <summary>Procuração pública</summary>
                <p>Documento de identificação, CPF, estado civil, profissão, endereço, qualificação do procurador e descrição dos poderes. Poderão ser exigidos documentos relacionados ao objeto da procuração.</p>
            </details>
            <details>
                <summary>Registro de imóvel</summary>
                <p>Título original ou eletrônico válido, documentos das partes, comprovantes tributários e demais elementos relacionados ao ato. O título será submetido à qualificação registral.</p>
            </details>
            <details>
                <summary>Protesto e cancelamento</summary>
                <p>Para pagamento, utilize os canais indicados na intimação. Para cancelamento, apresente documento hábil ou autorização do credor, conforme a legislação aplicável.</p>
            </details>
            <details>
                <summary>RTD e Pessoas Jurídicas</summary>
                <p>Apresente requerimento, instrumento a registrar, documentos de representação e assinaturas exigidas. A documentação varia conforme a natureza e a finalidade do ato.</p>
            </details>
        </div>
    </div>
</section>

<section id="informacoes" class="section premium-institutional">
    <div class="container premium-institutional-grid">
        <div class="institutional-brand-panel">
            <img src="assets/logo-cartorio-graca-rocha.png" alt="Logo do Cartório Graça Rocha">
            <span>Cartório Graça Rocha</span>
            <p>Serventia Extrajudicial do Ofício Único de Anísio de Abreu-PI</p>
        </div>

        <div class="institutional-data">
            <span class="eyebrow">Informações institucionais</span>
            <h2>Dados da serventia</h2>
            <dl class="premium-data-list">
                <div><dt>Responsável</dt><dd><?= e($config['responsible']) ?> — <?= e($config['responsible_role']) ?></dd></div>
                <div><dt>CNS</dt><dd><?= e($config['cns']) ?></dd></div>
                <div><dt>Endereço</dt><dd><?= e($config['address']) ?>, <?= e($config['city']) ?></dd></div>
                <div><dt>Atendimento</dt><dd><?= e($config['hours']) ?></dd></div>
                <div><dt>Telefone</dt><dd><?= e($config['phone']) ?></dd></div>
                <div><dt>E-mail</dt><dd><?= e($config['email']) ?></dd></div>
                <div><dt>Plantão do RCPN</dt><dd><?= e($config['plantao_rcpn']) ?></dd></div>
            </dl>
        </div>
    </div>
</section>

<section id="normas" class="section premium-transparency">
    <div class="container">
        <div class="premium-section-heading premium-section-heading-light">
            <div>
                <span class="eyebrow eyebrow-light">Transparência</span>
                <h2>Normas e emolumentos</h2>
            </div>
            <p>Os atos notariais e registrais seguem a legislação federal, as normas do CNJ, o Código de Normas do Estado do Piauí e a tabela estadual vigente.</p>
        </div>

        <div class="transparency-grid">
            <article>
                <span>Norma nacional</span>
                <h3>Provimento CNJ nº 149/2023</h3>
                <p>Código Nacional de Normas da Corregedoria Nacional de Justiça — Foro Extrajudicial, em texto compilado.</p>
                <small>Adicionar link oficial no arquivo de configuração.</small>
            </article>
            <article>
                <span>Norma estadual</span>
                <h3>Código de Normas do Piauí</h3>
                <p>Provimento CGJ/PI nº 62/2024 e alterações posteriores aplicáveis aos serviços extrajudiciais.</p>
                <small>Adicionar link oficial no arquivo de configuração.</small>
            </article>
            <article>
                <span>Valores</span>
                <h3>Tabela de emolumentos</h3>
                <p>Consulta dos códigos, atos e valores vigentes para os serviços notariais e registrais do Estado do Piauí.</p>
                <small>Adicionar PDF ou link oficial.</small>
            </article>
        </div>

        <p class="transparency-note">O envio de dúvida, reclamação ou elogio por este portal é gratuito e não corresponde à prática de ato notarial ou registral.</p>
    </div>
</section>

<section class="premium-final-cta">
    <div class="container premium-final-cta-inner">
        <div>
            <span class="eyebrow">Canal oficial de atendimento</span>
            <h2>Como podemos ajudar?</h2>
            <p>Registre sua manifestação e receba um protocolo para acompanhar a resposta da serventia.</p>
        </div>
        <div class="actions">
            <a class="button button-gold" href="solicitacao.php">Criar solicitação</a>
            <a class="button button-secondary" href="acompanhar.php">Consultar protocolo</a>
        </div>
    </div>
</section>
</main>
<?php render_footer(); ?>
