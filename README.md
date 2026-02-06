# 🚀 Projeto Senac — MVC em PHP Puro

<p align="center">
  <strong>Mini framework MVC desenvolvido em PHP puro</strong><br>
  Estrutura simples, profissional e ideal para fins educacionais
</p>

<p align="center">
  <img src="https://img.shields.io/badge/PHP-8%2B-blue?logo=php">
  <img src="https://img.shields.io/badge/Composer-Autoload-orange?logo=composer">
  <img src="https://img.shields.io/badge/Apache-XAMPP-red?logo=apache">
  <img src="https://img.shields.io/badge/Status-Em%20Desenvolvimento-yellow">
</p>

---

## 📌 Sobre o projeto

O **Projeto Senac** é um **mini framework MVC em PHP puro**, criado com foco **educacional**, inspirado em frameworks modernos como o Laravel, porém com uma estrutura **mais simples e transparente**, ideal para estudo e ensino de backend.

O projeto utiliza:
- PHP puro
- Composer para autoload
- Front Controller
- Rotas amigáveis
- VirtualHost para ambiente profissional

---

## 👨‍🏫 Autor

Projeto desenvolvido por **Pedro Leandro Gomes da Silva**, com foco educacional, para ensino de:

- PHP Orientado a Objetos
- Arquitetura MVC
- Organização profissional de projetos fullstack
- Boas práticas sem uso de frameworks

📌 *Projeto criado para fins educacionais — Senac*

---
## 📚 Público-alvo

Este projeto é indicado para:
- Estudantes de PHP
- Cursos técnicos (ex: Senac)
- Introdução a MVC e organização de projetos

---

## 📁 Estrutura do Projeto

```txt
projeto-senac/
│
├── app/
│   ├── Controllers/
│   └── Core/
│   └── Models/
│
├── public/
│   ├── css/
│   ├── images/
│   ├── js/
│   ├── .htaccess
│   └── index.php
│
├── routes/
│   └── web.php
│
├── storage/
│   └── cache/
│   └── logs/
│   └── sessions/
│   └── uploads/
│
├── vendor/
│
├── views/
│   └── user/
│       └── login.php
│   └── home.php/
│
├── .env
├── .gitignore
├── composer.json
└── README.md
```

## ⚙️ Requisitos

Para executar o projeto corretamente, é necessário ter o seguinte ambiente configurado:

- 🐘 **PHP 8.0+**
- 📦 **Composer**
- 🌐 **Servidor Apache**
- 💻 **Sistema operacional**: Windows, Linux ou macOS
---


## ▶️ Como executar o projeto

Siga os passos abaixo para rodar o projeto corretamente em ambiente local.

---

### 1️⃣ Clonar o repositório

```bash
git clone https://github.com/seu-usuario/projeto-senac.git
cd projeto-senac
```

### 2️⃣ Instalar as dependências com Composer

```bash
composer install
```

### 3️⃣ Configurar o VirtualHost (forma profissional)

Abra o arquivo do Apache:

```txt
C:/xampp/apache/conf/extra/httpd-vhosts.conf
```

Adicione o seguinte VirtualHost:

```apache
<VirtualHost *:80>
    ServerName projeto-senac.local
    DocumentRoot "C:/xampp/htdocs/projeto-senac/public"

    <Directory "C:/xampp/htdocs/projeto-senac/public">
        AllowOverride All
        Require all granted
    </Directory>

    ErrorLog "C:/xampp/htdocs/projeto-senac/storage/logs/error.log"
CustomLog "C:/xampp/htdocs/projeto-senac/storage/logs/access.log" common
</VirtualHost>
```

### 4️⃣ Configurar o arquivo hosts

Edite o arquivo do sistema:

```txt
C:\Windows\System32\drivers\etc\hosts
```

Reinicie o Apache após essa configuração.

Adicione a linha:
```txt
127.0.0.1 projeto-senac.local
```

### 5️⃣ Acessar o projeto no navegador

Abra no navegador:

```txt
http://projeto-senac.local
```
