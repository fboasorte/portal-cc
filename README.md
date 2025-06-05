# Portal CC - Sistema de Gerenciamento Acadêmico

Portal web desenvolvido para centralizar informações e recursos relacionados ao curso de Ciência da Computação do IFNMG - Campus Montes Claros. A aplicação oferece uma interface moderna e responsiva para facilitar o acesso de alunos, professores e gestores aos conteúdos acadêmicos e administrativos.

## 🚀 Funcionalidades (em desenvolvimento)

- Gerenciamento de disciplinas, turmas e horários
- Acesso a materiais de aula e recursos complementares
- Comunicação entre alunos e professores
- Publicação de avisos e eventos do curso
- Autenticação e controle de acesso

## 🛠️ Tecnologias Utilizadas

- **Laravel** – Framework backend PHP
- **Blade** – Sistema de templates do Laravel
- **Tailwind CSS** – Estilização moderna e responsiva
- **Vite** – Build tool para recursos front-end
- **Docker** – Ambiente de desenvolvimento e execução
- **MySQL** – Banco de dados relacional

## ⚙️ Como Rodar o Projeto Localmente

### Pré-requisitos

- PHP
- MySQL

### Passos

```bash
# Clone o repositório
git clone https://github.com/fboasorte/portal-cc.git
cd portal-cc

# Instale as dependências PHP
composer install

# Instale as dependências JavaScript
npm install && npm run dev

# Copie o arquivo de exemplo e configure as variáveis
cp .env.example .env
php artisan key:generate

# Execute as migrações
php artisan migrate
