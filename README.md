# Pizzaria

xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx

## Autenticação
* Entrar: https://systemgurris.com.br/api/login **(POST)** { email: 'admin@email.com', password: '123' }
* Deslogar: https://systemgurris.com.br/api/logout **(GET)** { Authorization: Bearer Token }
* Usuario Logado: https://systemgurris.com.br/api/me **(GET)** { Authorization: Bearer Token }
* Renovar Token: https://systemgurris.com.br/api/refresh **(GET)** { Authorization: Bearer Token }

## Produtos
* Todas: https://systemgurris.com.br/api/products **(GET)**
* Doces: https://systemgurris.com.br/api/products?category=doces **(GET)**
* Salgadas: https://systemgurris.com.br/api/products?category=salgadas **(GET)**
* Por Slug: https://systemgurris.com.br/api/products/{slug} **(GET)**
