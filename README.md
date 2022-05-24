# Pizzaria

#### Futuramente as rotas serão criada no SwaggerHub para melhor visualização
#### Feitos: A API esta retornando os dados de: todos os produtos, produtos por categoria e produto por slug. Na parte de gerenciamento, está feito o CREATE, EDIT e DELETE
#### A fazer: Receber itens do carrinho do Front-End, e pedidos realizados

## Integrantes
[Bruno Gurris](https://github.com/BrunoGurris) RA 190567; Turma Moblile: CP110TIN3; Turma PA: PA038TIN1 <br /> [Geovanne Lopes](https://github.com/Geovannelopes) RA 190803; Turma Moblile: CP110TIN2; Turma PA: PA038TIN1 <br /> [Guilherme Pereira](https://github.com/guilherme033) RA 190570; Turma Moblile: CP110TIN1; Turma PA: PA038TIN1 <br /> [Marcos Bueno](https://github.com/marcos-bueno) RA 180565; Turma Moblile: CP110TIN3; Turma PA: PA038TIN1 <br /> [Rebecca Pedroso](https://github.com/rehpedroso) RA 190664; Turma Moblile: CP110TIN2; Turma PA: PA038TIN1

## Autenticação
* Entrar: https://systemgurris.com.br/api/login **(POST)** { email: 'admin@email.com', password: '123' }
* Deslogar: https://systemgurris.com.br/api/logout **(GET)** { Authorization: Bearer Token }
* Usuario Logado: https://systemgurris.com.br/api/me **(GET)** { Authorization: Bearer Token }
* Renovar Token: https://systemgurris.com.br/api/refresh **(GET)** { Authorization: Bearer Token }

## Produtos
<h6>GET</h6>
<ul>
    <li>Todas: https://systemgurris.com.br/api/products</li>
    <li>Doces: https://systemgurris.com.br/api/products?category=doces</li>
    <li>Salgadas: https://systemgurris.com.br/api/products?category=salgadas</li>
    <li>Por Slug: https://systemgurris.com.br/api/products/{slug}</li>
</ul>

<h6>POST</h6>
<ul>
    <li>Create: https://systemgurris.com.br/api/products/create</li>
    <ul>
        <li>title: Pizza de Teste</li>
        <li>priceP: 20</li>
        <li>priceM: 23</li>
        <li>priceG: 25</li>
        <li>status: 1</li>
        <li>category: Salgadas</li>
        <li>ingredients: molho e quiejo</li>
        <li>image: FILE</li>
    </ul>
</ul>

<h6>PUT</h6>
<ul>
    <li>Edit: https://systemgurris.com.br/api/products/{id}/edit</li>
    <ul>
        <li>title: Edit Pizza</li>
        <li>priceP: 21</li>
        <li>priceM: 25</li>
        <li>priceG: 30</li>
        <li>status: 1</li>
        <li>category: Doces</li>
        <li>ingredients: teste</li>
        <li>image: (Opcional) FILE</li>
    </ul>
</ul>

<h6>DELETE</h6>
<ul>
    <li>Delete: https://systemgurris.com.br/api/products/{id}/delete</li>
</ul>
