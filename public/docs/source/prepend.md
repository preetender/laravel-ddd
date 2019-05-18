# Definições

Nessa seção veremos como configurar nosso cliente http.

| Cabeçalho | Valor            |
| --------- | ---------------- |
| Accept    | application/json |

# Consultas

Para realizar consultas avançadas na api estamos utilizando um pacote [laravel-qs-api](https://github.com/preetender/laravel-qs-api).

# Erros

| Codigo do Erro | Estrutura Json                        |
| -------------- | ------------------------------------- |
| 400            | `{"message": "string"}`               |
| 401            | `{"message": "string"}`               |
| 403            | `{"message": "string"}`               |
| 404            | `{"message": "string"}`               |
| 422            | `{"message": "string", "errors": []}` |
| 500            | `{"message": "string"}`               |
