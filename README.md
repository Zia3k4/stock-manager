# Stock-Manager
## obs :  Atualizar depois
 Gerenciamento de Estoque, API de administraçao e controle de estoque

## 📸 Demonstração (opcional)



## 🚀 Funcionalidades

- ✅ Cadastro de funcionários
- ✅ Controle de estoque
- ✅ Gerenciamento de fornecedores
- ✅ Registro de frequência
- ✅ Geração de relatórios
- ✅ Autenticação por tipo de usuário (Gerente, Supervisores)

## 🛠️ Tecnologias Utilizadas

- PHP (Laravel)
- Mariadb
-PhpMyAdmin
- HTML/CSS
- JavaScript
- Laravel 12
- Laravel Breeze
- Spatie Laravel Permission
- Inertia


## ⚙️ Instalação

## ⚙️ Instalação

```bash
git clone 'link do repositorio'
cd nome-do-repo
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
composer require spatie/laravel-permission
composer require breeze
composer require laravel/breeze --dev
php artisan breeze:install vue
```
## 👤 Perfis de Usuário
Gerente: acesso total, relatórios, RH, estoque

Supervisor 1: fornecedores

Supervisor 2: produtos e estoque

## Estrutura do Projeto

  ### depois atualizar pq nao terminei ainda
 ```bash
├── app
│   ├── Http
│   │   ├── Controllers
│   │   ├── Kernel.php
│   │   ├── Middleware
│   │   └── Requests
│   ├── Models
│   │   ├── Estoque.php
│   │   ├── Fornecedor.php
│   │   ├── Frequencia.php
│   │   ├── Funcionario.php
│   │   ├── Produtos.php
│   │   └── User.php
│   ├── Policies
│   │   ├── DashboardPolicy.php
│   │   ├── EstoquePolicy.php
│   │   ├── FornecedorPolicy.php
│   │   ├── FuncionarioPolicy.php
│   │   ├── ProdutoPolicy.php
│   │   ├── RegistroPolicy.php
│   │   └── RelatorioPolicy.php
│   ├── Providers
│   │   └── AppServiceProvider.php
│   ├── Repositories
│   │   ├── FuncionarioRepository.php
│   │   ├── ProdutoRepository.php
│   │   └── UsuarioRepository.php
│   ├── Services
│   │   ├── AuthService.php
│   │   ├── BackupService.php
│   │   ├── EstoqueService.php
│   │   └── RhServiceService.php
│   └── View
│       └── Components
├── artisan
├── bootstrap
│   ├── app.php
│   └── cache
│       ├── packages.php
│       └── services.php
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── hashing.php
│   ├── logging.php
│   ├── mail.php
│   ├── permission.php
│   ├── queue.php
│   ├── services.php
│   └── session.php
├── database
│   ├── database.sqlite
│   ├── factories
│   │   └── UserFactory.php
│   ├── migrations
│   │   └── [... arquivos de migração ...]
│   └── seeders
│       ├── DatabaseSeeder.php
│       ├── FornecedoresSeeder.php
│       ├── FuncionarioSeeder.php
│       ├── ProdutoSeeder.php
│       └── UsersSeeder.php
├── jsconfig.json
├── package.json
├── package-lock.json
├── phpunit.xml
├── postcss.config.js
├── public
│   ├── build
│   │   └── [... arquivos compilados ...]
│   ├── favicon.ico
│   ├── index.php
│   └── robots.txt
├── README.md
├── resources
│   ├── css
│   │   └── app.css
│   ├── js
│   │   └── [... arquivos e componentes Vue/Inertia ...]
│   └── views
│       └── [... views Blade divididas por perfil e função ...]
├── routes
│   ├── auth.php
│   ├── console.php
│   └── web.php
├── schemas
│   └── schema.json
├── storage
│   └── [... estrutura de cache, sessões, logs ...]
├── tailwind.config.js
├── tests
│   └── [... testes unitários e de feature ...]
├── utils
│   └── helpers.php
├── vendor
│   └── [... dependências instaladas pelo Composer ...]
└── vite.config.js
```
