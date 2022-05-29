<?php

namespace App\Http\Repositories;

use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use Exception;
use Illuminate\Support\Facades\DB;

class OrderRepository
{
    public function create($request)
    {
        try {
            $order = new Order();
            $order->name = ucwords(mb_strtolower($request->name));
            $order->cpf = $request->cpf;
            $order->zip_code = $request->zip_code;
            $order->street = $request->street;
            $order->number = $request->number;
            $order->complement = $request->complement;
            $order->neighborhood = $request->neighborhood;
            $order->city = $request->city;
            $order->state = $request->state;
            $order->save();

            foreach($request->items as $item) {

                $product = Product::where('id', $item->id)->first();
                if(!is_null($product)) {
                    $new_item = new Item();
                    $new_item->order_id = $order->id;
                    $new_item->product_id = $product->id;
                    $new_item->amount = $item->amount;

                    if($item->size == 'P') {
                        $new_item->size = 'P';
                        $new_item->price = $product->priceP;
                    }
                    else if($item->size == 'M') {
                        $new_item->size = 'M';
                        $new_item->price = $product->priceM;
                    }
                    else
                    {
                        $new_item->size = 'G';
                        $new_item->price = $product->priceG;
                    }

                    $new_item->save();
                }
            }

            return response()->json([
                'status' => 'success',
                'message' => 'Pedido gerado com sucesso'
            ], 200);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível gerar o pedido'
            ], 400);
        }
    }
}
