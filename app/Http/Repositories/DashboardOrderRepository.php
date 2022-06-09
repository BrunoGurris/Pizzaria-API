<?php

namespace App\Http\Repositories;

use Exception;

class DashboardOrderRepository
{
    public function destroy($order)
    {
        try {
            $order->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Pedido excluido com sucesso'
            ], 200);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível deletar o pedido'
            ], 400);
        }
    }
}
