# Challenge D3 Works

Este guia detalhado irá auxiliá-lo na configuração e execução do sistema de perguntas e respostas, com backend em PHP e frontend em Nuxt.js.

## Pré-requisitos

Antes de começar, certifique-se de que você tem as seguintes ferramentas instaladas:

- [Node](https://nodejs.org) (v20.17.0 ou superior)
- [PHP](https://www.php.net) (v8.2.12 ou superior)
- [XAMPP](https://www.apachefriends.org/index.html) ou outro ambiente de PHP/MySQL para rodar o backend

## Instalação e Configuração

### 1. Backend (PHP)

Após clonar o projeto para sua máquina local, navegue até a pasta `back` e execute os seguintes comandos para configurar o banco de dados e iniciar o servidor:

```bash
php setup.php
php -S localhost:8000
```

O servidor backend estará rodando em http://localhost:8000.

### 1. Frontend (Nuxt.js)

Em seguida, navegue até a pasta do frontend e instale as dependências com o comando:

```bash
cd frontend
npm install
```

Após a instalação das dependências, inicie o servidor de desenvolvimento:

```bash
npm run dev
```

O frontend estará disponível em http://localhost:3000.

Agora você pode acessar o sistema de perguntas e respostas no navegador e começar a interagir com o sistema.
