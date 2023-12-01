# Laravel Web CRUD

Este é um aplicativo CRUD (Create, Read, Update, Delete) simples construído com Laravel, Vue.js e MySQL. Ele permite gerenciar registros para duas entidades: `Empresa` e `Cliente`.

## Sumário

- [Recursos](#recursos)
- [Requisitos](#requisitos)
- [Instalação](#instalação)
- [Laravel](#laravel)
- [Vue](#vue)
- [Postman](#postman)

## Recursos

- Operações de Criar, Ler, Atualizar e Excluir para as entidades `Empresa` e `Cliente`.
- Rotas da API para listar todos os registros, mostrar um registro único, armazenar um novo registro, atualizar um registro existente e excluir um registro.
- Interface web Vue.js para facilitar o gerenciamento de registros.

## Requisitos

- PHP >= 8.1
- Composer
- Node.js >= 14
- NPM ou Yarn
- MySQL

## Instalação

### Laravel
Para utilizar esse projeto é preciso primeiramente clonar o repositório

```bash
    git clone https://github.com/brunorribeiro/laravel_web_crud.git
```

Em seguida, siga esses passos para instalar as dependencias:

1. Acesse a raiz do projeto Laravel e instale as dependências do PHP:
```bash
    cd rest-api
    composer install
```

2. Instale as dependências do JavaScript:
```bash
    npm install
```

3. Copie o arquivo `.env.example` para `.env`:
```bash
    cp .env.example .env
```

4. Gere a chave da aplicação:
```bash
   php artisan key:generate
```

5. Configure o seu banco de dados no arquivo `.env`.
6. Execute as migrações e popule o banco de dados:
```bash
   php artisan migrate --seed
```

7. Levante o serviço Laravel (por padrão irá rodar em http://127.0.0.1:8000):
```bash
   php artisan serve
```

### Vue

1. Acesse a raiz do projeto Vue:
```bash
    cd..
    cd vue-rest-api
```

2. Instale as dependência do projeto:
```bash
   npm install
```

3. Levante o serviço Vue (por padrão irá rodar em http://localhost:5173):
```bash
   npm run dev
```

Pronto! O projeto já está disponível para uso através da interface visual criada com Vue.js.

## Postman

Você pode testar os endpoints individualmente no Postman. Basta importar o arquivo `REST API.postman_collection`
