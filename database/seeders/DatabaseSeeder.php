<?php

namespace Database\Seeders;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->name = 'Fulano';
        $user->email = 'admin@email.com';
        $user->password = Hash::make('123');
        $user->save();

        $product = new Product();
        $product->title = '4 Queijos';
        $product->priceP = 32.90;
        $product->priceM = 34.90;
        $product->priceG = 36.90;
        $product->status = 1;
        $product->category = 'Salgadas';
        $product->ingredients = 'catupiry, mussarela, parmesão, provolone';
        $product->image = 'storage/products/4queijos.jpg';
        $product->slug = '4queijos';
        $product->save();

        $product2 = new Product();
        $product2->title = 'Bauru';
        $product2->priceP = 29.90;
        $product2->priceM = 31.90;
        $product2->priceG = 33.90;
        $product2->status = 1;
        $product2->category = 'Salgadas';
        $product2->ingredients = 'presunto, mussarela, tomate';
        $product2->image = 'storage/products/bauru.jpg';
        $product2->slug = 'bauru';
        $product2->save();

        $product3 = new Product();
        $product3->title = 'Calabresa';
        $product3->priceP = 29.90;
        $product3->priceM = 33.90;
        $product3->priceG = 37.90;
        $product3->status = 0;
        $product3->category = 'Salgadas';
        $product3->ingredients = 'calabresa, mussarela, cebola';
        $product3->image = 'storage/products/calabresa.jpg';
        $product3->slug = 'calabresa';
        $product3->save();

        $product4 = new Product();
        $product4->title = 'Brigadeiro com Morango';
        $product4->priceP = 31.90;
        $product4->priceM = 33.90;
        $product4->priceG = 36.90;
        $product4->status = 1;
        $product4->category = 'Doces';
        $product4->ingredients = 'chocolate, granulado, morango';
        $product4->image = 'storage/products/brigadeiro-morango.jpg';
        $product4->slug = 'brigadeiro-com-morango';
        $product4->save();

        $product5 = new Product();
        $product5->title = 'Brigadeiro com Kit Kat';
        $product5->priceP = 32.90;
        $product5->priceM = 36.90;
        $product5->priceG = 40.90;
        $product5->status = 1;
        $product5->category = 'Doces';
        $product5->ingredients = 'chocolate, granulado, kit kat';
        $product5->image = 'storage/products/kitkat.jpg';
        $product5->slug = 'brigadeiro-com-kit-kat';
        $product5->save();

        $order = new Order();
        $order->name = 'Bruno Alexandre';
        $order->cpf = '477.500.968-09';
        $order->zip_code = '18074-658';
        $order->street = 'Rua Lucio Leme';
        $order->number = '132';
        $order->neighborhood = 'Jd. São Guilherme';
        $order->city = 'Sorocaba';
        $order->state = 'SP';
        $order->save();

        $item = new Item();
        $item->order_id = 1;
        $item->product_id = 1;
        $item->size = 'M';
        $item->amount = 1;
        $item->price = 34.90;
        $item->save();

        $item2 = new Item();
        $item2->order_id = 1;
        $item2->product_id = 2;
        $item2->size = 'G';
        $item2->amount = 3;
        $item2->price = 33.90;
        $item2->save();
    }
}
