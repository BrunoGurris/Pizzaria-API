<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Exception;
use Illuminate\Http\Request;

class DashboardOrderController extends Controller
{
    public function get(Request $request)
    {
        try {
            $orders = Order::paginate($request->limit);

            foreach($orders as $order) {
                $items = $order->items();

                $order->total = 0;
                foreach($items as $item) {
                    $order->total += $item->amount * $item->price;
                }

                $order->items = $items;
            }

            return response()->json([
                'status' => 'success',
                'products' => $orders
            ], 200);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível carregar os pedidos'
            ], 400);
        }
    }
}
