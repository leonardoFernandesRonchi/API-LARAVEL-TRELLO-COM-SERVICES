# 📌 API Laravel Trello com Services

![Laravel](https://img.shields.io/badge/Laravel-10-red?logo=laravel)
![PHP](https://img.shields.io/badge/PHP-8+-blue?logo=php)
![MySQL](https://img.shields.io/badge/MySQL-Database-orange?logo=mysql)
![Status](https://img.shields.io/badge/status-em%20desenvolvimento-yellow)
![License](https://img.shields.io/github/license/leonardoFernandesRonchi/API-LARAVEL-TRELLO-COM-SERVICES)

---

## 📖 Visão Geral

O **API-LARAVEL-TRELLO-COM-SERVICES** é uma aplicação desenvolvida em **Laravel** que fornece uma API inspirada no funcionamento do Trello.

A arquitetura utiliza **Services Layer**, separando regras de negócio dos controllers, deixando o código mais organizado, reutilizável e escalável.

Permite gerenciar:

* 👤 Usuários
* 📋 Projetos
* 👥 Membros de projetos

Com autenticação segura via **Laravel Sanctum**.

---

## 🛠️ Tecnologias Utilizadas

### ⚙️ Backend

* Laravel 10
* PHP 8+

### 🗄️ Banco de Dados

* MySQL (Eloquent ORM)

### 🔐 Autenticação

* Laravel Sanctum

### 🧰 Ferramentas

* Composer
* PHPUnit
* Artisan CLI

---

## 📂 Estrutura do Projeto

```bash id="v1l0ps"
app/
 ├── Http/Controllers/   # Controllers
 ├── Models/             # Models (Eloquent)
 ├── Services/           # Regras de negócio (Service Layer)

routes/api.php           # Rotas da API
database/                # Migrations e seeds
config/                  # Configurações
tests/                   # Testes automatizados
composer.json            # Dependências PHP
```

---

## 🚀 Instalação e Configuração

### 1. Clonar repositório

```bash id="q4p2zn"
git clone https://github.com/leonardoFernandesRonchi/API-LARAVEL-TRELLO-COM-SERVICES.git
cd API-LARAVEL-TRELLO-COM-SERVICES
```

### 2. Instalar dependências

```bash id="x8s9ka"
composer install
```

### 3. Configurar ambiente

```bash id="b2m7rt"
cp .env.example .env
php artisan key:generate
```

### 4. Configurar banco de dados

* Criar banco no MySQL
* Atualizar credenciais no `.env`

### 5. Executar migrations

```bash id="d9c3lo"
php artisan migrate
```

### 6. Rodar servidor

```bash id="k0w2qs"
php artisan serve
```

---

## 📖 Guia de Rotas da API

### 🔑 Usuários

| Método | Rota         | Controller@Action     | Descrição           |
| ------ | ------------ | --------------------- | ------------------- |
| POST   | /users/login | UserController@login  | Login               |
| POST   | /users       | UserController@create | Registro de usuário |

---

### 📋 Projetos

🔒 **Protegidas por auth:sanctum**

| Método | Rota               | Controller@Action          | Descrição     |
| ------ | ------------------ | -------------------------- | ------------- |
| POST   | /project           | ProjectsController@create  | Criar projeto |
| PUT    | /project/{project} | ProjectsController@update  | Atualizar     |
| DELETE | /project/{project} | ProjectsController@destroy | Excluir       |

---

### 👥 Usuários em Projetos

🔒 **Protegidas por auth:sanctum**

| Método | Rota                                         | Controller@Action              | Descrição         |
| ------ | -------------------------------------------- | ------------------------------ | ----------------- |
| POST   | /project/{project}/projectUser               | ProjectUsersController@create  | Adicionar usuário |
| DELETE | /project/{project}/projectUser/{projectUser} | ProjectUsersController@destroy | Remover usuário   |

---

## 🧪 Testes

```bash id="c1m8de"
php artisan test
```

---

## 📈 Melhorias Futuras

* 📋 Implementação completa de tarefas (cards estilo Trello)
* 💬 Sistema de comentários
* 📎 Upload de anexos
* 🔔 Notificações
* 📊 Dashboard de projetos
* 🌐 Versionamento da API

---

## 👨‍💻 Autor

**Leonardo Fernandes**
🔗 https://github.com/leonardoFernandesRonchi

