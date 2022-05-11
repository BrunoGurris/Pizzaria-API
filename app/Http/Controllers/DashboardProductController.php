<?php

namespace App\Http\Controllers;

use App\Http\Services\DashboardProductService;
use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardProductController extends Controller
{
    private $dashboardProductService;

    public function __construct(DashboardProductService $dashboardProductService)
    {
        $this->dashboardProductService = $dashboardProductService;
    }


    public function create(Request $request)
    {
        try {
            $user = Auth::user();

            return $this->dashboardProductService->create($request, $user);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível adicionar o produto'
            ], 400);
        }
    }


    public function destroy($id)
    {
        try {
            $user = Auth::user();
            $product = Product::findOrFail($id);

            return $this->dashboardProductService->destroy($product, $user);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível excluir o produto'
            ], 400);
        }
    }
}
