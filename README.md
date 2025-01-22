# Ranking API

Este é um projeto de **API RESTful** desenvolvida em **Laravel 8** e com **MySQL** para gerenciamento de recordes pessoais de usuários em diferentes movimentos esportivos. A API permite retornar rankings de usuários baseados em seus recordes pessoais em cada movimento.


## Tecnologias Usadas

- **Laravel 8** para o desenvolvimento da API.
- **MySQL** como banco de dados relacional para armazenar informações de usuários, movimentos e recordes pessoais.
- **Carbon** para formatação de datas.

## Observações

- Este projeto não possui migrations pois o banco já existe

## Pré-requisitos

- PHP 7.3 ou superior.
- Composer.
- MySQL ou MariaDB para o banco de dados.

## Descrição

A API oferece um endpoint para consultar o **ranking de um movimento específico**. Cada ranking contém informações como o nome do usuário, seu recorde pessoal, a posição dele no ranking e a data do recorde.

## Funcionalidades

- Consultar o ranking de um movimento específico.
- Exibir informações do usuário no ranking:
  - Nome do usuário.
  - Recorde pessoal (maior valor).
  - Posição no ranking.
  - Data do recorde.
- Usuários com o mesmo recorde pessoal ocupam a mesma posição no ranking.

## Endpoints

### GET /ranking/{movementId}

Retorna o ranking de um movimento especificado, com base no ID do movimento.

curl -X GET "http://127.0.0.1:8000/ranking/1"


**Parâmetros:**
- `movementId` (obrigatório): ID do movimento esportivo para o qual o ranking será gerado.

**Resposta de exemplo:**
```json
{
    "movement": "Deadlift",
    "ranking": [
        {
            "nome": "Jose",
            "recorde": 190,
            "posicao": 1,
            "data": "04/01/2021 "
        },
        {
            "nome": "Joao",
            "recorde": 180,
            "posicao": 2,
            "data": "01/01/2021"
        },
        {
            "nome": "Paulo",
            "recorde": 170,
            "posicao": 3,
            "data": "01/01/2021"
        }
    ]
}



