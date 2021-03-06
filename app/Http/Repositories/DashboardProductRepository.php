<?php

namespace App\Http\Repositories;

use App\Models\Product;
use Exception;

class DashboardProductRepository
{
    public function create($request, $user)
    {
        try {
            /* Faz o upload e verifica se o uplaod foi feito */
            $upload = $request->file('image')->store('products');
            if(!$upload) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Falha ao fazer upload da imagem',
                    'where' => 'image'
                ]);
            }

            $product = new Product();
            $product->title = $request->title;
            $product->priceP = $request->priceP;
            $product->priceM = $request->priceM;
            $product->priceG = $request->priceG;
            $product->status = $request->status;
            $product->category = ucwords(strtolower($request->category));
            $product->ingredients = $request->ingredients;
            $product->image = 'storage/'.$upload;
            $product->slug = mb_strtolower(str_replace(' ', '-', $request->title));
            $product->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Produto adicionado com sucesso'
            ], 200);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível adicionar o produto'
            ], 400);
        }
    }


    public function edit($product, $request, $user)
    {
        try {
            /* Faz o upload e verifica se o uplaod foi feito (Se houver) */
            if($request->hasFile('image')) {
                $upload = $request->file('image')->store('products');
                if(!$upload) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Falha ao fazer upload da imagem',
                        'where' => 'image'
                    ]);
                }

                $product->image = 'storage/'.$upload;
            }

            $product->title = $request->title;
            $product->priceP = $request->priceP;
            $product->priceM = $request->priceM;
            $product->priceG = $request->priceG;
            $product->status = $request->status;
            $product->category = ucwords(strtolower($request->category));
            $product->ingredients = $request->ingredients;
            $product->slug = mb_strtolower(str_replace(' ', '-', $request->title));
            $product->update();

            return response()->json([
                'status' => 'success',
                'message' => 'Produto editado com sucesso'
            ], 200);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível editar o produto'
            ], 400);
        }
    }


    public function destroy($product, $user)
    {
        try {
            $product->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Produto excluído com sucesso'
            ], 200);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível excluir o produto'
            ], 400);
        }
    }
}
