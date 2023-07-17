# desafio-php

Este projeto foi gerado com Laravel e VueJs.

Esta é uma API de cadastro de produtos eletrônicos construído com Laravel e VueJS. Ela oferece funcionalidades básicas de CRUD que servem como um catálogo externo para diferentes lojas.

A API possui funcionalidades para que os usuários possam visualizarr, cadastrar, atualizar e deletar produtos.

# Instalação e uso

1º Passo
Antes de começar, certifique-se de ter instalado o Docker e o NodeJS em sua máquina.
Faça um fork deste repositório, depois clone o fork em sua máquina.

2º Passo - 
# Configurando a Pasta Back-end
Em seu terminal:

#entre na pasta do back-end
$ cd back-end

#instala todas as dependências necessárias
$ docker-compose install

#inicia a aplicação
$ docker-compose up

# Rotas disponiveis
URL: http://localhost:8080/api/appliance/

```Method: GET
Request Body: {}
Return: {}
Code: 200```

```Method: GET
Base: URL/{id}
Request Body: {}
Return: {
 "id": ""
 "name": ""
 "description": "",
 "brand": "",
 "url": "",
 "created_at": "",
 "updated_at": ""
}
Code: 200```

```Method: POST
Request Body: {
 "name": ""
 "description": "",
 "brand": "",
 "url": ""
}
Return: {
 "id": ""
 "name": ""
 "description": "",
 "brand": "",
 "url": "",
 "created_at": "",
 "updated_at": ""
}
Code: 201```

```Method: PATCH
Base: URL/{id}
Body: {
 "name": ""
 "description": "",
 "brand": "",
 "url": ""
}
Return: {
 "id": ""
 "name": ""
 "description": "",
 "brand": "",
 "url": "",
 "created_at": "",
 "updated_at": ""
}
Code: 200```

```Method: DELETE
Base: URL/{id}
Request Body: {}
Return: {}
Code: 204```

# Configurando a Pasta Front-End

obs: certifique-se de estar rodando o back-end antes de iniciar o front-end

Em seu terminal:

#entre na pasta do front-end
$ cd front-end-2/front-end-php/

#instala todas as dependências necessárias
$ npm install

#inicia a aplicação
$ npm run dev

