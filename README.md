# Project

Projeto padrão _domain drive design_.

## Instalação

Para instalar os pacotes

> composer install

Para registrar os dominios

```$php
  <?php

  return [
    ...
    'register' => [
        'auth' => 'App\\Domain\\Auth'
    ]
  ]
```

## Documentação

Visualizar socumentação:

Abra em **to/url/docs**.

Para gerar a documentação, execute:

> php artisan apidoc:generate
