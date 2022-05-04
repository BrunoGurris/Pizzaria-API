# Pizzaria

Futuramente as rotas sera criada no SwaggerHub para melhor visualização

## Integrantes
[Bruno Gurris](https://github.com/BrunoGurris) RA 190567;<br /> [Geovanne Lopes](https://github.com/Geovannelopes) RA 190803;<br /> [Guilherme Pereira](https://github.com/guilherme033) RA 190570;<br /> [Marcos Bueno](https://github.com/marcos-bueno) RA 180565;<br /> [Rebecca Pedroso](https://github.com/rehpedroso) RA 190664;

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

## Produtos (Dashboard)


