<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $product = new Product();
        $product->title = '4 Queijos';
        $product->price = 32.90;
        $product->status = 1;
        $product->category = 'Salgadas';
        $product->ingredients = ['catupiry', 'mussarela', 'parmesão', 'provolone'];
        $product->image = '';
        $product->save();

        $product2 = new Product();
        $product2->title = 'Bauru';
        $product2->price = 29.90;
        $product2->status = 1;
        $product2->category = 'Salgadas';
        $product2->ingredients = ['presunto', 'mussarela', 'tomate'];
        $product2->image = '';
        $product2->save();

        $product3 = new Product();
        $product3->title = 'Calabresa';
        $product3->price = 29.90;
        $product3->status = 0;
        $product3->category = 'Salgadas';
        $product3->ingredients = ['calabresa', 'mussarela', 'cebola'];
        $product3->image = '';
        $product3->save();

        $product4 = new Product();
        $product4->title = 'Brigadeiro c/ Morango';
        $product4->price = 29.90;
        $product4->status = 1;
        $product4->category = 'Doces';
        $product4->ingredients = ['chocolate', 'granulado', 'morango'];
        $product4->image = '';
        $product4->save();

        $product5 = new Product();
        $product5->title = 'Brigadeiro c/ Kit Kat';
        $product5->price = 29.90;
        $product5->status = 1;
        $product5->category = 'Doces';
        $product5->ingredients = ['chocolate', 'granulado', 'kit kat'];
        $product5->image = '';
        $product5->save();
    }
}
