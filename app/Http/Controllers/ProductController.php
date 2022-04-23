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
            if($request->category == 'doces') {
                $products = Product::where('category', 'Doces')->get();
            }
            else if($request->category == 'salgadas') {
                $products = Product::where('category', 'Salgadas')->get();
            }
            else
            {
                $products = Product::all();
            }

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
