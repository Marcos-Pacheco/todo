
# Projeto Teste Seletivo - Unimed Teresina

Bem-vindo(a) ao repositório do projeto de teste seletivo para a Unimed Teresina! Este projeto consiste em uma aplicação de gestão de tarefas (To-Do List), desenvolvida para demonstrar habilidades técnicas e conhecimentos necessários para a vaga de Programador(a) Back-end.

## 📝 Sumário

- [📖 Descrição do Projeto](#-descrição-do-projeto)
- [⚙️ Instalação](#️-instalação)
- [🚀 Como Usar](#-como-usar)
- [🧪 Testes](#-testes)
- [📋 Funcionalidades](#-funcionalidades)
- [📁 Rotas da API](#-rotas-da-api)
- [📄 DER - Diagrama Entidade-Relacionamento](#-der---diagrama-entidade-relacionamento)
- [📫 Contato](#-contato)

## 📖 Descrição do Projeto

Este projeto foi desenvolvido como parte do processo seletivo para a Unimed Teresina. A aplicação é uma API RESTful de gestão de tarefas, permitindo a criação, edição, exclusão e listagem de tarefas com dois estados possíveis: "A Fazer" e "Feitas". O objetivo é demonstrar proficiência no desenvolvimento de APIs utilizando o framework Lumen (PHP) e integração com o banco de dados PostgreSQL.

## ⚙️ Instalação

Para executar este projeto localmente, você precisará ter o Docker e o Docker Compose instalados.

### Passos para Configuração:

1. Clone o projeto:
    ```bash
    git clone https://github.com/Marcos-Pacheco/todo.git todo
    ```

2. Execute o arquivo de configuração:
    ```bash
    sudo chmod +x init.sh
    ./init.sh
    ```

3. Acesse a aplicação:

    ```
    http://localhost:80
    ```

## 🚀 Como Usar

Você pode utilizar o Postman ou Insomnia para interagir com a API.

### Importando a Collection no Postman:

1. Abra o Postman.
2. Clique em **Importar** e selecione o arquivo `api-postman-docs.json` disponível na raíz do repositório.
3. A collection contém todas as rotas da API prontas para uso.

## 🧪 Testes

Para executar os testes unitários:

```bash
docker compose exec lumen php artisan test
```

Os testes cobrem as principais funcionalidades da aplicação, garantindo a qualidade e confiabilidade do sistema.

## 📋 Funcionalidades

- **Criar Tarefa**: Adicione novas tarefas com título, descrição e status.
- **Listar Tarefas**: Visualize todas as tarefas cadastradas.
- **Atualizar Tarefa**: Edite as informações de uma tarefa existente.
- **Excluir Tarefa**: Remova tarefas do sistema.

## 📁 Rotas da API

| Método | Rota         | Descrição                  |
|--------|--------------|----------------------------|
| GET    | /tasks       | Lista todas as tarefas      |
| POST   | /tasks       | Cria uma nova tarefa        |
| GET    | /tasks/{id}  | Exibe detalhes de uma tarefa|
| PUT    | /tasks/{id}  | Atualiza uma tarefa existente|
| DELETE | /tasks/{id}  | Exclui uma tarefa           |

## 📄 DER - Diagrama Entidade-Relacionamento

Tabela `tasks`:

- `id` (PK)
- `title`
- `description`
- `status`
- `created_at`
- `updated_at`

O diagrama completo está disponível no arquivo `der.png` na raíz repositório.

## 📫 Contato

Em caso de dúvidas ou sugestões, sinta-se à vontade para entrar em contato:

- **Nome**: Marcos Pachêco
- **Email**: marcos.hr.pacheco@gmail.com
- **LinkedIn**: https://www.linkedin.com/in/marcos-pach%C3%AAco/