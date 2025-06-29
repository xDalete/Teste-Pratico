# Como rodar o backend

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
