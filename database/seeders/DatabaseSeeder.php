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
        $product->category = 'Salgadas';
        $product->ingredients = ['catupiry', 'mussarela', 'parmesão', 'provolone'];
        $product->image = '';
        $product->save();

        $product2 = new Product();
        $product2->title = 'Bauru';
        $product2->price = 29.90;
        $product2->category = 'Salgadas';
        $product2->ingredients = ['presunto', 'mussarela', 'tomate'];
        $product2->image = '';
        $product2->save();
    }
}
