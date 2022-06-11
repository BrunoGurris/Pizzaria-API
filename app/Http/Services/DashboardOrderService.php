<?php

namespace App\Http\Services;

use App\Http\Repositories\DashboardOrderRepository;
use Exception;

class DashboardOrderService
{
    private $dashboardOrderRepository;

    public function __construct(DashboardOrderRepository $dashboardOrderRepository)
    {
        $this->dashboardOrderRepository = $dashboardOrderRepository;
    }

    public function destroy($order)
    {
        try {
            return $this->dashboardOrderRepository->destroy($order);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível deletar o pedido'
            ], 400);
        }
    }
}
