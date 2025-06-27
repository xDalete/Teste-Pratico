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
