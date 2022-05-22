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
                $products = Product::where('category', 'Doces')->paginate($request->limit);
            }
            else if($request->category == 'salgadas') {
                $products = Product::where('category', 'Salgadas')->paginate($request->limit);
            }
            else
            {
                $products = Product::paginate($request->limit);
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
            ], 400);
        }
    }


    public function slug($slug)
    {
        try {
            $products = Product::where('slug', $slug)->first();

            return response()->json([
                'status' => 'success',
                'products' => $products
            ], 200);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível carregar os produtos'
            ], 400);
        }
    }
}
