<?php
require_once __DIR__ . '/partials.php';
render_header();
?>
<main id="conteudo">
<section id="inicio" class="future-hero">
    <div class="future-layer future-layer-grid" aria-hidden="true"></div>
    <div class="future-layer future-layer-glow" aria-hidden="true"></div>

    <div class="container future-hero-grid">
        <div class="future-hero-copy">
            <span class="eyebrow eyebrow-light">Portal institucional • Atendimento eletrônico • Segurança jurídica</span>
            <h1>Cartório <span>Graça Rocha</span></h1>
            <p class="future-subtitle">Serventia Extrajudicial do Ofício Único de Anísio de Abreu-PI</p>
            <p class="future-lead">Um portal moderno, elegante e tecnológico para reunir informações da serventia, canais de atendimento e serviços extrajudiciais com mais identidade visual e melhor experiência para o usuário.</p>

            <div class="actions premium-actions">
                <a class="button button-gold" href="solicitacao.php">Criar solicitação</a>
                <a class="button button-glass" href="acompanhar.php">Acompanhar protocolo</a>
            </div>

            <div class="future-pills" aria-label="Destaques do portal">
                <span>Logo institucional em destaque</span>
                <span>Mascote 3D flutuante</span>
                <span>Canal com protocolo</span>
                <span>Experiência responsiva</span>
            </div>

            <?php if (str_contains($config['address'], 'PREENCHER')): ?>
            <p class="setup-warning setup-warning-dark"><strong>Configuração pendente:</strong> preencha os dados institucionais no Render ou em <code>config.php</code>.</p>
            <?php endif; ?>
        </div>

        <aside class="future-showcase" aria-label="Identidade visual do portal">
            <div class="future-brand-card">
                <div class="future-brand-top">
                    <span class="mini-badge">Identidade visual</span>
                    <strong>Logo do cartório</strong>
                </div>
                <div class="future-logo-display">
                    <img src="assets/logo-cartorio-graca-rocha.png" alt="Logo do Cartório Graça Rocha">
                </div>
                <p class="future-brand-text">A logo institucional agora aparece em destaque no site, reforçando a identidade visual do Cartório Graça Rocha.</p>
            </div>

            <div class="future-info-ribbon">
                <div>
                    <span>Atendimento</span>
                    <strong><?= e($config['hours']) ?></strong>
                </div>
                <div>
                    <span>Cidade</span>
                    <strong><?= e($config['city']) ?></strong>
                </div>
                <div>
                    <span>Contato</span>
                    <a href="https://wa.me/<?= e($config['whatsapp']) ?>" target="_blank" rel="noopener">WhatsApp</a>
                </div>
            </div>
        </aside>
    </div>

    <div class="container future-service-strip" aria-label="Especialidades da serventia">
        <span>Registro Civil</span>
        <span>Notas</span>
        <span>Protesto</span>
        <span>Registro de Imóveis</span>
        <span>RTD</span>
        <span>RCPJ</span>
    </div>
</section>

<section class="premium-pathways future-pathways" aria-label="Acessos principais">
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
            <span class="pathway-kicker">Orientação inicial</span>
            <strong>Ver documentos básicos</strong>
            <p>Confira informações iniciais para os serviços mais procurados da serventia.</p>
            <span class="pathway-link">Ver orientações →</span>
        </a>
    </div>
</section>

<section id="servicos" class="section future-services-section">
    <div class="container">
        <div class="premium-section-heading future-heading">
            <div>
                <span class="eyebrow">Especialidades</span>
                <h2>Serviços com visual mais moderno e proporcional</h2>
            </div>
            <p>Os cartões de serviços foram redesenhados com aparência mais tecnológica, mantendo leitura clara, boa proporção e organização institucional.</p>
        </div>

        <div class="future-services-grid">
            <article class="future-service-card">
                <span class="service-order">01</span>
                <div class="future-service-badge">RCPN</div>
                <h3>Registro Civil</h3>
                <p>Nascimentos, casamentos, óbitos, certidões, averbações, retificações e atos relativos ao estado civil.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>
            <article class="future-service-card">
                <span class="service-order">02</span>
                <div class="future-service-badge">Notas</div>
                <h3>Tabelionato de Notas</h3>
                <p>Escrituras, procurações, atas notariais, autenticações, reconhecimentos de firma e demais atos notariais.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>
            <article class="future-service-card">
                <span class="service-order">03</span>
                <div class="future-service-badge">Protestos</div>
                <h3>Protesto de Títulos</h3>
                <p>Apontamento, intimação, pagamento, desistência, cancelamento, certidões e informações de protesto.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>
            <article class="future-service-card">
                <span class="service-order">04</span>
                <div class="future-service-badge">RI</div>
                <h3>Registro de Imóveis</h3>
                <p>Registros, averbações, certidões, retificações, regularização fundiária e procedimentos imobiliários.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>
            <article class="future-service-card">
                <span class="service-order">05</span>
                <div class="future-service-badge">RTD</div>
                <h3>Títulos e Documentos</h3>
                <p>Publicidade, conservação, eficácia perante terceiros, notificações e registro de documentos em geral.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>
            <article class="future-service-card">
                <span class="service-order">06</span>
                <div class="future-service-badge">RCPJ</div>
                <h3>Pessoas Jurídicas</h3>
                <p>Registro e averbação de atos constitutivos, atas, alterações, livros e certidões de pessoas jurídicas.</p>
                <a href="#documentos">Consultar orientações</a>
            </article>
        </div>
    </div>
</section>

<section class="future-mission-band">
    <div class="container future-mission-grid">
        <div>
            <span class="eyebrow eyebrow-light">Conceito do novo layout</span>
            <h2>Design institucional com toque tecnológico</h2>
            <p>O site combina elementos de interface moderna, camadas translúcidas, brilhos sutis, destaque para a logo e um mascote 3D flutuante inspirado no monumento da cidade.</p>
        </div>
        <div class="future-mini-panels">
            <article><strong>Logo em evidência</strong><p>A identidade do cartório fica mais presente e memorável no layout.</p></article>
            <article><strong>Mascote 3D flutuante</strong><p>O tamanduá aparece ao lado da página como um personagem amigável.</p></article>
            <article><strong>Mais moderno</strong><p>Blocos redesenhados com proporções equilibradas e navegação mais sofisticada.</p></article>
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
                <p>Título original ou eletrônico válido, documentos das partes, comprovantes tributários e demais documentos pertinentes ao ato. O título será submetido à qualificação registral.</p>
            </details>
            <details>
                <summary>Protesto e cancelamento</summary>
                <p>Para pagamento, utilize os canais indicados na intimação. Para cancelamento, apresente o documento hábil ou autorização do credor, conforme a legislação aplicável.</p>
            </details>
            <details>
                <summary>Registro de pessoa jurídica e títulos/documentos</summary>
                <p>Requerimento, instrumento a registrar, documentos de representação e assinaturas exigidas. A documentação varia conforme a natureza do título e a finalidade do registro.</p>
            </details>
        </div>
    </div>
</section>

<section id="informacoes" class="section premium-institutional">
    <div class="container premium-institutional-grid">
        <div class="institutional-brand-panel future-brand-panel">
            <img src="assets/logo-cartorio-graca-rocha.png" alt="Logo do Cartório Graça Rocha">
            <span>Cartório Graça Rocha</span>
            <p>Serventia Extrajudicial do Ofício Único de Anísio de Abreu-PI</p>
        </div>

        <div class="institutional-data">
            <span class="eyebrow">A serventia</span>
            <h2>Informações institucionais</h2>
            <dl class="premium-data-list">
                <div><dt>Responsável</dt><dd><?= e($config['responsible']) ?> — <?= e($config['responsible_role']) ?></dd></div>
                <div><dt>CNS</dt><dd><?= e($config['cns']) ?></dd></div>
                <div><dt>Endereço</dt><dd><?= e($config['address']) ?>, <?= e($config['city']) ?></dd></div>
                <div><dt>Horário</dt><dd><?= e($config['hours']) ?></dd></div>
                <div><dt>Plantão do RCPN</dt><dd><?= e($config['plantao_rcpn']) ?></dd></div>
            </dl>
        </div>
    </div>
</section>

<section id="normas" class="section premium-transparency future-transparency">
    <div class="container">
        <div class="premium-section-heading premium-section-heading-light">
            <div>
                <span class="eyebrow eyebrow-light">Transparência</span>
                <h2>Normas, links úteis e emolumentos</h2>
            </div>
            <p>O envio de dúvida, reclamação ou elogio não constitui ato notarial ou registral e não gera cobrança de emolumentos.</p>
        </div>

        <div class="transparency-grid">
            <article>
                <span>CNJ</span>
                <h3>Código Nacional de Normas</h3>
                <p>Provimento CNJ nº 149/2023, em texto compilado.</p>
                <small>Adicionar link oficial no config.</small>
            </article>
            <article>
                <span>TJPI</span>
                <h3>Código de Normas do Piauí</h3>
                <p>Provimento CGJ/PI nº 62/2024 e alterações.</p>
                <small>Adicionar link oficial no config.</small>
            </article>
            <article>
                <span>Tabela</span>
                <h3>Emolumentos</h3>
                <p>Consulta aos atos, códigos e valores vigentes no Estado do Piauí.</p>
                <small>Adicionar PDF ou link oficial.</small>
            </article>
        </div>

        <p class="transparency-note">Os valores cobrados em atos notariais e registrais devem observar a tabela estadual vigente e as normas aplicáveis.</p>
    </div>
</section>

<section class="premium-final-cta future-final-cta">
    <div class="container premium-final-cta-inner">
        <div>
            <span class="eyebrow">Canal de atendimento</span>
            <h2>Pronto para usar o portal?</h2>
            <p>Abra sua manifestação, registre sua dúvida ou acompanhe o protocolo com praticidade.</p>
        </div>
        <div class="actions">
            <a class="button button-gold" href="solicitacao.php">Criar solicitação</a>
            <a class="button button-secondary" href="acompanhar.php">Acompanhar</a>
        </div>
    </div>
</section>
</main>
<?php render_footer(); ?>
