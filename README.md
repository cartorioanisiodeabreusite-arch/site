# Site do Ofício Único de Anísio de Abreu - PI

Portal institucional responsivo com:

- páginas de informações e serviços;
- canal de dúvidas, reclamações, elogios e privacidade/LGPD;
- geração de protocolo e chave de acesso;
- consulta pública de andamento;
- painel administrativo para classificar, responder e encerrar solicitações;
- anexos protegidos, acessíveis apenas ao administrador;
- SQLite, sem dependência de framework;
- validação, CSRF, hash de senhas, limitação básica por IP e trilha de auditoria.

## Requisitos

- PHP 8.1 ou superior;
- extensão PDO SQLite e Fileinfo;
- Apache com suporte a `.htaccess` recomendado;
- certificado HTTPS obrigatório em produção.

## Instalação

1. Envie todos os arquivos para a hospedagem.
2. Edite `config.php` e preencha nome do responsável, CNS, endereço, telefones, e-mails, horário e dados do Encarregado.
3. Garanta permissão de escrita somente na pasta `storage`.
4. Acesse `https://SEU-DOMINIO/install.php` e crie o administrador.
5. Após concluir, exclua ou renomeie `install.php`.
6. Acesse o painel em `/admin/login.php`.
7. Teste criação, consulta, resposta e download de anexos.
8. Comunique o endereço da página à Corregedoria do Foro Extrajudicial, conforme a norma estadual aplicável.

## Antes de publicar

- revisar todo o conteúdo jurídico e a lista de serviços;
- inserir links oficiais do CNJ, TJPI, Corregedoria e tabela vigente de emolumentos;
- definir política de retenção e descarte das manifestações e anexos;
- revisar a Política de Privacidade com o Encarregado;
- configurar backups criptografados e rotina de atualização;
- adotar hospedagem no Brasil ou documentar eventual transferência internacional;
- incluir CAPTCHA ou serviço antispam compatível com a LGPD, se houver abuso;
- avaliar autenticação multifator para a área administrativa;
- realizar teste de segurança antes da publicação;
- não usar o formulário como substituto de centrais obrigatórias ou do protocolo formal de títulos.

## Observações de segurança

A implementação é uma base funcional. Para ambiente de produção, recomenda-se revisão por profissional de segurança, logs do servidor, monitoramento, proteção contra força bruta e cópias de segurança testadas. O uso de `mail()` está desativado por padrão; respostas ficam disponíveis no portal.

## Estrutura

- `index.php`: página institucional;
- `solicitacao.php`: formulário;
- `acompanhar.php`: consulta pública;
- `privacidade.php`: política inicial;
- `admin/`: painel restrito;
- `storage/`: banco e anexos, bloqueados por `.htaccess`;
- `config.php`: dados editáveis da serventia.

## Publicação pelo GitHub + Render

Esta versão já inclui `Dockerfile`, `render.yaml`, proteção do diretório `storage` e leitura opcional de dados institucionais por variáveis de ambiente.

1. Crie um repositório **privado** no GitHub.
2. Envie para a raiz do repositório o conteúdo desta pasta, não o arquivo ZIP fechado.
3. No Render, escolha **New > Blueprint** e conecte o repositório. O arquivo `render.yaml` criará um Web Service Docker com disco persistente de 1 GB.
4. Confirme um plano pago compatível com Persistent Disk. O plano gratuito não preserva o SQLite nem os anexos.
5. Em **Environment**, cadastre os dados institucionais, por exemplo: `SITE_CNS`, `SITE_RESPONSIBLE`, `SITE_ADDRESS`, `SITE_PHONE`, `SITE_WHATSAPP`, `SITE_EMAIL`, `SITE_HOURS`, `SITE_PRIVACY_OFFICER_NAME` e `SITE_PRIVACY_OFFICER_EMAIL`.
6. Após o primeiro deploy, acesse `/install.php` para criar o administrador.
7. Teste o formulário, a consulta de protocolo e o painel administrativo.
8. Configure domínio próprio e mantenha rotina externa de backup do banco e dos anexos.

### Atenção sobre dados

O banco SQLite e os anexos ficam em `/var/www/html/storage`, no disco persistente do Render. Não coloque banco, anexos, senhas ou dados reais no GitHub. Para uso em produção, valide com o Encarregado de Dados a localização da hospedagem, a transferência internacional de dados, o contrato com o provedor, a política de retenção e o plano de resposta a incidentes.
