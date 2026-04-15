# Desafio Técnico – Estágio em Desenvolvimento

## Resumo do Projeto

Um sistema web integrado desenvolvido para **Escola Estadual de Educação Profissional Miguel Gurgel**, combinando uma landing page institucional com um **chatbot inteligente** e um **painel administrativo**.

### Objetivo
Modernizar a comunicação digital com alunos e interessados através de um chatbot capaz de responder dúvidas sobre a escola (cursos, funcionamento, horários, etc.), mantido por um painel administrativo intuitivo.

---

## O que foi desenvolvido

### Projeto feito no Linux Mint

### 1. **Landing Page (Dashboard Público)**
- Página inicial com informações sobre a escola
- Chatbot integrado que responde perguntas automaticamente
- Interface responsiva com Bootstrap 5
- Integração com API OpenRouter para respostas inteligentes

### 2. **Painel Administrativo (Dashboard Admin)**
- ✅ Autenticação de usuários
- ✅ CRUD completo de prompts (Criar, Ler, Atualizar, Deletar)
- ✅ Ativação/desativação de prompts
- ✅ Gerenciamento do prompt principal do chatbot
- ✅ Interface responsiva com Tailwind CSS

### 3. **API REST**
- Endpoint para enviar mensagens ao chatbot
- Integração com OpenRouter para processamento de linguagem natural
- Suporte a múltiplos prompts configuráveis

### 4. **Banco de Dados**
- Tabelas: `users`, `prompts`, `chat_settings`, `cache`, `jobs`
- Migrations versionadas
- Seeders para dados iniciais

---

## Como Rodar a Aplicação

### Requisitos
- Windows 10/11 com PowerShell 7, Git Bash ou WSL
- Linux (Ubuntu/Debian recomendado)
- **PHP 8.3+**
- **Composer** (verifique com `composer --version`)
- **Node.js 18+** e **npm** (verifique com `node --version` e `npm --version`)
- **SQLite** ou outro banco de dados suportado
- **Git**
- **Chave da API OpenRouter** (crie gratuitamente em [openrouter.ai](https://openrouter.ai))

---

### 1. Instalação das Dependências (Sistema Operacional)

#### **Windows**
Recomendamos o uso do terminal do VS Code (PowerShell ou Git Bash). Você pode instalar tudo via Chocolatey ou Winget:

```powershell
# Usando Winget
winget install PHP.PHP.8.3
winget install Composer
winget install OpenJS.NodeJS
winget install Git.Git
```

#### **Linux (Ubuntu/Debian)**
Abra o terminal e execute os comandos para instalar o PHP 8.3 e as extensões necessárias para o Laravel:

```bash
# Adicionar repositório do PHP se necessário
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update

# Instalar PHP e extensões
sudo apt install php8.3 php8.3-curl php8.3-xml php8.3-sqlite3 php8.3-mbstring php8.3-zip unzip -y

# Instalar Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Instalar Node.js e NPM
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs
```

---

### 2. Configuração do Projeto

Após instalar as ferramentas acima, siga os passos abaixo no seu terminal (independente do SO):

### Passo 1: Clonar o Repositório
```bash
git clone <Desafio_Estagio_3e>
cd desafio-3e
```

### Passo 2: Instalar Dependências PHP
No Windows, execute:

```powershell
composer install
```

Se usar Git Bash ou WSL, o mesmo comando também funciona:

```bash
composer install
```

> Se o comando `composer install` ainda não funcionar, tente estes passos:
> 1. Verifique se o Composer está instalado e no `PATH`:
>    - PowerShell:
>      ```powershell
>      composer --version
>      ```
>    - Git Bash/WSL:
>      ```bash
>      composer --version
>      ```
> 2. Se o comando não for encontrado, instale o Composer ou use o instalador oficial.
> 3. Se você tiver apenas o `composer.phar`, execute:
>    - PowerShell:
>      ```powershell
>      php composer.phar install
>      ```
>    - Git Bash/WSL:
>      ```bash
>      php composer.phar install
>      ```
> 4. Confirme que você está na pasta do projeto onde existe o arquivo `composer.json`.

### Passo 3: Instalar Dependências JavaScript
```bash
npm install
```

### Passo 4: Configurar Variáveis de Ambiente
No PowerShell:

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

No Git Bash ou WSL:

```bash
cp .env.example .env
php artisan key:generate
```

**Obrigatório:** configure a chave da API OpenRouter no `.env`:

```env
OPENROUTER_API_KEY=sk-or-xxxxx
```

> **Nota:** Crie sua conta gratuita em [openrouter.ai](https://openrouter.ai) e gere uma chave API. Sem ela, o chatbot não funcionará.

### Passo 5: Configurar o Banco de Dados
```bash
php artisan migrate
php artisan db:seed
```

### Passo 6: Compilar Assets (CSS/JS)
```bash
npm run build
```


### Passo 7: Iniciar o Servidor rode esses 2 comandos, cada um vai precisar de um terminal proprio

```bash
npm run dev
```

```bash
php artisan serve
```

Acesse em: **http://localhost:8000**

---

## Credenciais de Teste
As credenciais administrativas são configuradas via variáveis de ambiente no arquivo `.env`. Se não alteradas, os valores padrão do seeder são:
- **Email**: `admin@example.com`
- **Senha**: `password`

---

## Estrutura do Projeto

```
desafio-3e/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php      # Autenticação
│   │   │   ├── ChatController.php      # Lógica do chatbot
│   │   │   └── Admin/PromptController.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Prompt.php
│   │   └── ChatSetting.php
│   └── Providers/
├── database/
│   ├── migrations/                      # Schema do banco
│   ├── seeders/                         # Dados iniciais
│   └── factories/                       # Factories para testes
├── resources/
│   ├── views/
│   │   ├── dashboard.blade.php         # Landing page com chat
│   │   ├── welcome.blade.php
│   │   ├── admin/                      # Painel administrativo
│   │   ├── auth/                       # Telas de login
│   │   └── layouts/
│   ├── css/
│   │   ├── app.css
│   │   └── dashboard.css
│   └── js/
│       ├── app.js
│       └── bootstrap.js
├── routes/
│   ├── web.php                         # Rotas web (Django-style)
│   └── api.php                         # Rotas API (POST /api/chat/send)
├── public/
│   ├── index.php                       # Entry point
│   └── build/                          # Assets compilados (Vite)
├── tests/                              # Testes com Pest
├── vite.config.js                      # Configuração do Vite (build)
├── composer.json                       # Dependências PHP
└── package.json                        # Dependências Node
```

---

## Rotas Principais

### Web (Públicas)
- `GET /` - Landing page com chatbot
- `GET /welcome` - Página de boas-vindas
- `GET /login` - Formulário de login
- `POST /login` - Enviar credenciais

### Web (Autenticadas)
- `POST /logout` - Deslogar usuário
- `GET /admin` - Redirect para prompts
- `GET /admin/prompts` - Listar prompts
- `POST /admin/prompts` - Criar prompt
- `GET /admin/prompts/{id}/edit` - Editar prompt
- `PUT /admin/prompts/{id}` - Atualizar prompt
- `DELETE /admin/prompts/{id}` - Deletar prompt
- `POST /admin/prompts/{id}/activate` - Ativar prompt
- `POST /admin/prompts/main` - Atualizar prompt principal

### API
- `POST /api/chat/send` - Enviar mensagem ao chatbot (sem autenticação)

---

## Tecnologias Utilizadas

| Stack | Tecnologia |
|-------|-----------|
| **Backend** | Laravel 13 (PHP 8.3) |
| **Frontend** | Blade Templates, JavaScript |
| **Styling** | Tailwind CSS, Bootstrap 5 |
| **Build** | Vite |
| **Database** | SQLite (padrão) |
| **IA** | OpenRouter API |
| **Testing** | Pest |
| **Task Running** | Npm scripts, Artisan |

---

## Variables de Ambiente Importantes

```env
# Banco de dados
DB_CONNECTION=sqlite
DB_DATABASE=./database.sqlite

# API OpenRouter (chatbot)
OPENROUTER_API_KEY=sk-or-xxxxx

# Credenciais Admin (Seeder)
ADMIN_EMAIL=admin@example.com
ADMIN_PASSWORD=password

# APP
APP_NAME=Laravel
APP_ENV=local
APP_DEBUG=true
APP_KEY=base64:...
``


## Autor
**Matheus Diogenes** - Desenvolvimento do Desafio Técnico
