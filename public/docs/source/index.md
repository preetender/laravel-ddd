---
title: API Reference

language_tabs:
- bash

- javascript


includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://imatchs.local/docs/collection.json)

<!-- END_INFO -->
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


#Inicio
<!-- START_5ef90dd4846f0d2902b89354bf5c42bb -->
## Autenticação

> Example request:

```bash
curl -X POST "http://imatchs.local/api/auth" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"username":"in","password":"adipisci"}'

```

```javascript
const url = new URL("http://imatchs.local/api/auth");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "username": "in",
    "password": "adipisci"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):


```json
{
    "token": "hash",
    "expires_in": "timestamp"
}
```

### HTTP Request
`POST api/auth`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | Usuario
    password | string |  required  | Senha de acesso

<!-- END_5ef90dd4846f0d2902b89354bf5c42bb -->

<!-- START_2e1c96dcffcfe7e0eb58d6408f1d619e -->
## Cadastro de usuários

> Example request:

```bash
curl -X POST "http://imatchs.local/api/auth/register" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"name":"eos","email":"explicabo","avatar":"sunt","password":"consequatur","password_confirmation":"aut"}'

```

```javascript
const url = new URL("http://imatchs.local/api/auth/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "name": "eos",
    "email": "explicabo",
    "avatar": "sunt",
    "password": "consequatur",
    "password_confirmation": "aut"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (201):


```json
[]
```

### HTTP Request
`POST api/auth/register`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Nome
    email | string |  required  | Email
    avatar | file |  optional  | Avatar
    password | string |  required  | Senha de acesso
    password_confirmation | string |  required  | Repetir senha

<!-- END_2e1c96dcffcfe7e0eb58d6408f1d619e -->


