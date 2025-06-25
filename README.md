# Stock Manager

Sistema completo para gestão de estoque, vendas, funcionários e fornecedores, desenvolvido em **Laravel** com **Backpack** para administração.

---

## 📦 Funcionalidades

- Cadastro e controle de produtos e estoque
- Registro e controle de vendas e itens vendidos
- Gerenciamento de funcionários, frequência e horas trabalhadas
- Cadastro de fornecedores
- Controle de usuários, permissões e papéis (roles)
- Validação de dados via Form Requests
- Interface administrativa com Backpack
- Exportação de dados (pdf)
- Testes unitários em PHPUnit/Pest
- Pronto para autenticação via Laravel Breeze ou Backpack

---

## 🚀 Instalação

### Pré-requisitos

- PHP >= 8.2
- Composer
- Node.js & npm (opcional, para assets)
- MySQL ou outro banco de dados compatível

### Passos

1. **Clone o repositório**
   ```bash
   git clone https://github.com/Zia3k4/stock-manager.git
   cd stock-manager
   ```

2. **Instale as dependências**
   ```bash
   composer install
   ```

3. **Configure o ambiente**
   ```bash
   cp .env.example .env
   # Edite o .env com suas configurações de banco de dados
   php artisan key:generate
   ```

4. **Execute as migrations e seeds**
   ```bash
   php artisan migrate --seed
   ```

5. **(Opcional) Instale dependências do frontend**
   ```bash
   npm install
   npm run dev
   ```

6. **Inicie o servidor**
   ```bash
   php artisan serve
   ```

---

## 🧪 Testes

- Testes unitários ficam em `tests/Unit/`
- Para rodar os testes:
  ```bash
  php artisan test
  # ou
  vendor/bin/phpunit
  ```

---

## 🗂️ Estrutura do Projeto

```
app/Models/           # Models Eloquent
app/Http/Requests/    # Form Requests (validações)
database/migrations/  # Migrations do banco
tests/Unit/           # Testes unitários para Models e Requests
public/               # Assets públicos
resources/views/      # Views Blade/Backpack
```

Principais pacotes usados:
- **backpack/crud:** Painel administrativo robusto
- **spatie/laravel-permission:** Controle de permissões/roles
- **maatwebsite/excel:** Exportação de dados para Excel
- **reliese/laravel:** Geração de models automatizada
- **laravel/sanctum:** API tokens e autenticação SPA
- **pestphp/pest:** Testes modernos (opcional)
