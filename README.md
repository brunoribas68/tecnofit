

# Movement Ranking API

Esta aplicação é uma API para obter o ranking de recordes pessoais para um determinado movimento.

## Tecnologias

- **Laravel** (Framework PHP)
- **MySQL** (Banco de dados)
- **Docker** (Para orquestrar os containers)

## Requisitos

Antes de começar, você vai precisar ter instalado em sua máquina:

- [Docker](https://www.docker.com/get-started)

## Passo a Passo para Rodar a Aplicação com Docker

### 1. Clone o repositório:

```bash
git clone https://https://github.com/brunoribas68/tecnofit
cd tecnofit
```

### 2. Configure o `.env`

No diretório raiz, renomeie o arquivo `.env.example` para `.env` e ajuste as configurações, se necessário, como as credenciais do banco de dados.

```bash
cp .env.example .env
```

### 3. Build e subir os containers Docker

Agora vamos rodar os containers do Docker. Isso irá configurar a aplicação Laravel e o banco de dados MySQL.

```bash
docker-compose up --build
```

Este comando irá:
- Construir a imagem da aplicação.
- Subir o ambiente com a aplicação Laravel e o banco de dados MySQL.
- Instalar as dependências do Laravel.

### 4. Acessar o container e rodar as migrações

Após o ambiente estar em execução, você precisa rodar as migrações para criar as tabelas no banco de dados:

```bash
docker exec -it laravel bash
php artisan migrate
```

> **Nota**: Substitua `app_container_name` pelo nome do container da aplicação definido no `docker-compose.yml`.

### 5. Popular o banco de dados (opcional)

Se quiser popular a base com dados iniciais para teste, você pode rodar um seeder ou script SQL:

```bash
php artisan db:seed
```

### 6. Acessar a aplicação

Após tudo estar rodando corretamente, a aplicação estará disponível na URL:

```bash
http://127.0.0.1
```

## Uso da API

### Rota: `/api/getMovementRanking`

A API oferece um endpoint para obter o ranking de um movimento.

- **Método**: `GET`
- **URL**: `http://127.0.0.1/api/getMovementRanking`

#### Parâmetros:

- **$movementName** (opcional): Nome do movimento que deseja obter o ranking. Se não for enviado, retornará o ranking do primeiro movimento encontrado.

#### Exemplo de Requisição:

```bash
curl -X GET "http://127.0.0.1/api/getMovementRanking?movementName=Squat"
```

#### Exemplo de Resposta (JSON):

```json
{
    "movement_name": "Squat",
    "ranking": [
        {
            "user_name": "João",
            "personal_record": 150.0,
            "record_date": "2024-09-15",
            "ranking_position": 1
        },
        {
            "user_name": "Maria",
            "personal_record": 140.0,
            "record_date": "2024-09-14",
            "ranking_position": 2
        }
    ]
}
```

### Rotas Disponíveis

- **`/api/getMovementRanking`**: Retorna o ranking dos recordes pessoais de um determinado movimento.

## Parando o Docker

Para parar os containers do Docker, execute o comando:

```bash
docker-compose down
```

---

Esse `README.md` orienta sobre como rodar a aplicação e utilizar a API para obter o ranking. Certifique-se de ajustar os nomes de containers e URLs conforme sua configuração real.
