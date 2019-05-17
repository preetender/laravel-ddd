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

#Inicio
<!-- START_5ef90dd4846f0d2902b89354bf5c42bb -->
## Autenticação

> Example request:

```bash
curl -X POST "http://imatchs.local/api/auth" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"username":"nihil","password":"aut"}'

```

```javascript
const url = new URL("http://imatchs.local/api/auth");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "username": "nihil",
    "password": "aut"
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
> Example response (400):


```json
{
    "message": ""
}
```
> Example response (422):


```json
{
    "errors": {
        "username": [
            "a"
        ],
        "password": [
            "a"
        ]
    }
}
```

### HTTP Request
`POST api/auth`

#### Body Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    username | string |  required  | 
    password | string |  required  | digits:6

<!-- END_5ef90dd4846f0d2902b89354bf5c42bb -->

<!-- START_2e1c96dcffcfe7e0eb58d6408f1d619e -->
## Cadastro de usuários

> Example request:

```bash
curl -X POST "http://imatchs.local/api/auth/register" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json" \
    -d '{"name":"aspernatur","email":"soluta","avatar":"nihil","password":"sed","password_confirmation":"cum"}'

```

```javascript
const url = new URL("http://imatchs.local/api/auth/register");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

let body = {
    "name": "aspernatur",
    "email": "soluta",
    "avatar": "nihil",
    "password": "sed",
    "password_confirmation": "cum"
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
    name | string |  required  | 
    email | string |  required  | 
    avatar | file |  optional  | 
    password | string |  required  | 
    password_confirmation | string |  required  | 

<!-- END_2e1c96dcffcfe7e0eb58d6408f1d619e -->


