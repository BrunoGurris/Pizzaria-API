<?php

namespace App\Http\Controllers;

use App\Http\Services\OrderService;
use Exception;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    private $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }


    public function create(Request $request)
    {
        try {
            return $this->orderService->create($request);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível gerar o pedido'
            ], 400);
        }
    }
}
