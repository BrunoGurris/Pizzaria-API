<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function get(Request $request)
    {
        try {
            $products = Product::all();

            return response()->json([
                'status' => 'success',
                'products' => $products
            ], 200);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível carregar os produtos'
            ], 404);
        }
    }
}
