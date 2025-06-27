# Teste pratico

## Análise de Requisitos e Decisões Técnicas

### Requisitos Funcionais

O sistema deve permitir que um estudante:

* Realize login com email e senha.
* Visualize suas disciplinas matriculadas.
* Veja as notas atribuídas e a média final calculada pelo backend.

---

## Decisões Técnicas

### Backend

* Framework: Laravel.
* Linguagem: PHP 8.
* Autenticação: Laravel Sanctum.
* Estrutura do banco:
  * A tabela `alunos` referencia `users` via chave estrangeira, permitindo manter as informações de autenticação (email, senha) separadas dos dados específicos do aluno (CPF).
  * As tabelas `disciplinas`, `matriculas` e `notas` seguem modelo relacional que facilita consultas por disciplina e por aluno.

* APIs RESTful expõem:

  * Login
  * Perfil do aluno autenticado
  * Matriculas do aluno
  * Notas por disciplina

---

### Frontend

* Framework: React Native com Expo.
* Navegação: Expo Router, por ser uma solução moderna que simplifica rotas aninhadas.
* Comunicação com a API: Axios configurado em um módulo único (`/src/api/api.ts`).

---

### Segurança

* Senhas armazenadas com hash padrão Laravel.
* Todas as rotas de dados sensíveis protegidas por middleware `auth:sanctum`.

---

## Como rodar o backend

> Crie um arquivo `.env`
>
> Copie o conteudo do arquivo `.env.example`
>
> Cole no arquivo `.env` criado

## comandos para rodar o backend

> Instala todas as dependências PHP do Laravel.

```bash
    composer install
```

> Gera a chave da aplicação (`APP_KEY`) no `.env` para encriptação.

```bash
    php artisan key:generate
```

> Cria todas as tabelas do banco de dados.

```bash
    php artisan migrate
```

> Popula o banco com dados iniciais de teste.

```bash
    php artisan db:seed
```

> Inicia o servidor Laravel acessível pela rede local.

```bash
    php artisan serve --host=0.0.0.0
```

---

## Como rodar o frontend

> Instala todas as bibliotecas do projeto React Native.

```bash
    npm install
```

---

> Crie um arquivo `.env` na raiz do projeto com a URL da API:
>
> Substitua pelo IP da máquina onde o Laravel está rodando.

```env
    EXPO_PUBLIC_API_BASE_URL=http://seu.ip:8000/api
```

> Exemplo

```env
    EXPO_PUBLIC_API_BASE_URL=http://192.168.100.4:8000/api
```

> Inicia o servidor de desenvolvimento Expo.

```bash
    npm start
```

---

> Escaneie o QR code com o app **Expo Go** no seu celular.
>
> O app será carregado automaticamente no dispositivo.
