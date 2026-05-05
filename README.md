# Projeto Senac — MVC em PHP Puro

Mini framework MVC desenvolvido em PHP puro para fins educacionais. Inspirado em frameworks modernos como o Laravel, mas com estrutura simples e transparente — ideal para aprender como uma aplicação web funciona por dentro.

![PHP](https://img.shields.io/badge/PHP-8.2-blue?logo=php)
![Composer](https://img.shields.io/badge/Composer-Autoload-orange?logo=composer)
![Tailwind CSS](https://img.shields.io/badge/Tailwind-CSS-38bdf8?logo=tailwindcss)
![Docker](https://img.shields.io/badge/Docker-ready-2496ED?logo=docker)
![Status](https://img.shields.io/badge/Status-Em%20Desenvolvimento-yellow)

---

## O que é esse projeto?

Um ponto de partida para construir sites e sistemas em PHP sem depender de um framework completo. Você encontra aqui o essencial já configurado: roteamento, MVC, conexão com banco, sessões, autenticação, flash messages e proteção CSRF.

O professor explica como funciona. O aluno usa como base e constrói em cima.

---

## O que já vem incluído

| Recurso | Descrição |
|---|---|
| **Roteamento** | `coffeecode/router` com rotas GET e POST amigáveis |
| **MVC** | Controllers, Models e Views separados por responsabilidade |
| **Template Engine** | `league/plates` para renderização de views PHP |
| **Banco de dados** | Conexão PDO com padrão Singleton + AbstractModel com query builder |
| **Autenticação** | `Auth` com sessão, controle de login e sistema de permissões por role |
| **Flash Messages** | `Message` com tipos semânticos e partial Tailwind pronto |
| **Proteção CSRF** | Token gerado e validado automaticamente em formulários |
| **Sessão segura** | `Session` com cookies httponly, samesite e regeneração de ID |
| **E-mail** | `PHPMailer` configurado e pronto para uso |
| **Variáveis de ambiente** | `vlucas/phpdotenv` para configuração via `.env` |
| **Paginação** | `coffeecode/paginator` incluso |
| **Tailwind CSS** | CDN incluído nas views, pronto para uso imediato |
| **Docker** | Ambiente completo com PHP 8.2, Nginx e MySQL prontos para rodar |

---

## Estrutura do projeto

```
projeto-senac/
├── app/
│   ├── Controllers/        # Lógica de cada rota
│   ├── Core/               # Núcleo do framework (não edite sem entender)
│   │   ├── AbstractModel.php
│   │   ├── Auth.php
│   │   ├── Connection.php
│   │   ├── Controller.php
│   │   ├── Email.php
│   │   ├── Message.php
│   │   ├── Permission.php
│   │   ├── Session.php
│   │   └── SessionTimeoutMiddleware.php
│   ├── Helpers/            # Funções globais: url(), redirect(), csrf_input(), old()
│   ├── Models/             # Models da aplicação (estendem AbstractModel)
│   │   └── Role/           # Sistema de perfis e permissões
│   ├── Services/           # Lógica de negócio complexa (organize aqui)
│   └── Views/
│       ├── Admin/          # Views da área administrativa
│       ├── Web/            # Views da área pública
│       └── partials/       # Componentes reutilizáveis (ex: flash.php)
├── config/
│   └── app.php             # Constantes da aplicação
├── docker/
│   ├── nginx/
│   │   └── default.conf    # Configuração do Nginx
│   └── php/
│       ├── Dockerfile      # Imagem PHP 8.2-FPM
│       └── php.ini         # Configurações PHP
├── public/
│   ├── css/
│   └── js/
├── routes/
│   └── web.php             # Todas as rotas da aplicação
├── storage/
│   ├── sessions/
│   └── uploads/
├── .env                    # Suas configurações locais (não sobe para o Git)
├── .env.docker             # Modelo de configuração para Docker
├── .env.example            # Modelo de configuração para XAMPP
├── .htaccess               # Redireciona tudo para index.php (Apache)
├── docker-compose.yml      # Orquestração dos containers
├── composer.json
└── index.php               # Front Controller — ponto de entrada único
```

---

## Como instalar

### Opção 1 — Docker (recomendado)

A forma mais simples de rodar o projeto. Não precisa instalar PHP, Apache ou MySQL na máquina.

**Requisitos**
- [Docker Desktop](https://www.docker.com/products/docker-desktop/) instalado e rodando

**Passo a passo**

**1. Clone o repositório**
```bash
git clone https://github.com/seu-usuario/projeto-senac.git
cd projeto-senac
```

**2. Configure o ambiente**
```bash
cp .env.docker .env
```

Edite o `.env` se quiser mudar o nome do banco ou as credenciais.

**3. Suba os containers**
```bash
docker-compose up -d
```

Na primeira vez o Docker vai baixar as imagens — aguarde alguns minutos.

**4. Instale as dependências**
```bash
docker-compose exec app composer install
```

**5. Acesse no navegador**

| Endereço | O quê |
|---|---|
| `http://localhost:8080` | Aplicação |
| `http://localhost:8081` | phpMyAdmin |

---

**Comandos Docker úteis**

```bash
# Ver se os containers estão rodando
docker-compose ps

# Parar os containers
docker-compose down

# Ver logs em tempo real
docker-compose logs -f

# Entrar no container PHP
docker-compose exec app bash

# Reiniciar apenas o Nginx
docker-compose restart nginx
```

---

### Opção 2 — XAMPP (Apache local)

**Requisitos**
- PHP 8.1+
- Composer
- Apache com `mod_rewrite` ativado (XAMPP funciona bem)
- MySQL 5.7+ ou MariaDB

**Passo a passo**

**1. Clone o repositório**
```bash
git clone https://github.com/seu-usuario/projeto-senac.git
cd projeto-senac
```

**2. Instale as dependências**
```bash
composer install
```

**3. Configure o ambiente**
```bash
cp .env.example .env
```

Edite o `.env` com seus dados de banco e URL.

**4. Configure o VirtualHost no Apache**

Abra `C:/xampp/apache/conf/extra/httpd-vhosts.conf` e adicione:

```apache
<VirtualHost *:80>
    ServerName projeto-senac.local
    DocumentRoot "C:/xampp/htdocs/projeto-senac"
    <Directory "C:/xampp/htdocs/projeto-senac">
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

**5. Adicione o host no sistema**

Edite `C:\Windows\System32\drivers\etc\hosts` e adicione:
```
127.0.0.1 projeto-senac.local
```

Reinicie o Apache e acesse `http://projeto-senac.local`.

> **Alternativa sem VirtualHost:** coloque o projeto em `C:/xampp/htdocs/projeto-senac` e acesse via `http://localhost/projeto-senac`. Ajuste `APP_URL` no `.env` de acordo.

---

## Conceitos que você vai aprender

- **MVC** — separação entre dados (Model), lógica (Controller) e apresentação (View)
- **Front Controller** — uma única entrada (`index.php`) para todas as requisições
- **Rotas amigáveis** — URLs limpas no lugar de `?pagina=login`
- **PDO e prepared statements** — acesso seguro ao banco de dados
- **Sessões seguras** — autenticação e controle de acesso
- **CSRF** — proteção contra ataques em formulários
- **Flash messages** — mensagens temporárias entre requisições
- **Autoload PSR-4** — organização de classes com Composer
- **Variáveis de ambiente** — configuração sem expor dados sensíveis no código
- **Docker** — ambiente isolado e reproduzível em qualquer máquina

---

## Uso básico

### Criar uma rota

```php
// routes/web.php
$router->get('/contact', 'ContactController@index');
$router->post('/contact', 'ContactController@send');
```

### Criar um controller

```php
// app/Controllers/ContactController.php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Message;

class ContactController extends Controller
{
    public function index(): void
    {
        echo $this->view->render('contact', ['title' => 'Contato']);
    }

    public function send(): void
    {
        Message::success('Mensagem enviada com sucesso!');
        redirect('/contact');
    }
}
```

### Criar um model

```php
// app/Models/Product.php
namespace App\Models;

use App\Core\AbstractModel;

class Product extends AbstractModel
{
    protected string $table = 'products';
    protected array $fillable = ['name', 'price', 'description'];
    protected array $required = [
        'name'  => 'O campo nome é obrigatório.',
        'price' => 'O campo preço é obrigatório.',
    ];
}
```

### Proteger uma rota

```php
use App\Core\Auth;

public function dashboard(): void
{
    Auth::requireLogin();
    echo $this->view->render('dashboard', ['title' => 'Painel']);
}
```

### Exibir flash messages na view

```php
<?php include __DIR__ . '/../partials/flash.php'; ?>
```

---

## Padrão de commits

Este projeto segue o padrão **Conventional Commits** com descrições em português no infinitivo:

```
feat: adicionar nova funcionalidade
fix: corrigir comportamento incorreto
refactor: reorganizar código sem mudar comportamento
docs: atualizar documentação
```

---

## Autor

Desenvolvido por **Pedro Leandro Gomes da Silva**
Professor de Tecnologia — Senac Maranhão

Projeto criado para fins educacionais no curso Programador Web.

---

## Licença

MIT — use, estude, modifique e compartilhe.