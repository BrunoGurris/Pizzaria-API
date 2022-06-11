<?php

namespace App\Http\Services;

use App\Http\Repositories\DashboardProductRepository;
use App\Models\Product;
use Exception;

class DashboardProductService
{
    private $dashboardProductRepository;

    public function __construct(DashboardProductRepository $dashboardProductRepository)
    {
        $this->dashboardProductRepository = $dashboardProductRepository;
    }


    public function create($request, $user)
    {
        try {
            /* Verifica se o produto tem um nome */
            if(strlen($request->title) < 5) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'O nome do produto deve ter no minimo 5 digítos',
                    'where' => 'title'
                ], 406);
            }
            /* */

            /* Verifica se existe um produto com o mesmo nome */
            if(!is_null(Product::where('title', $request->title)->first())) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Já existe um produto com esse nome',
                    'where' => 'title'
                ], 406);
            }
            /* */

            /* Verifica o preço do tamanho P */
            if(!is_float($request->priceP) && $request->priceP <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'O preço do produto (tamanho P) deve ser maior que 0',
                    'where' => 'priceP'
                ], 406);
            }
            /* */

            /* Verifica o preço do tamanho M */
            if(!is_float($request->priceM) && $request->priceM <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'O preço do produto deve ser maior que 0',
                    'where' => 'priceM'
                ], 406);
            }
            /* */

            /* Verifica o preço do tamanho G */
            if(!is_float($request->priceG) && $request->priceG <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'O preço do produto deve ser maior que 0',
                    'where' => 'priceM'
                ], 406);
            }
            /* */

            /* Verifica o status */
            if($request->status != 1 && $request->status != 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Escolha uma opção válida para o status',
                    'where' => 'status'
                ], 406);
            }
            /* */

            /* Verifica a categoria */
            if($request->category != 'Doces' && $request->category != 'Salgadas') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Escolha uma opção válida para a categoria',
                    'where' => 'category'
                ], 406);
            }
            /* */

            /* Verifica se tem igredientes */
            if(empty($request->ingredients)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Coloque pelo menos 1 ingrediente',
                    'where' => 'ingredients'
                ], 406);
            }
            /* */

            /* Verifica se a imagem existe */
            if(!$request->hasFile('image')) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'É necessário uma imagem do produto',
                    'where' => 'image'
                ]);
            }
            /* */

            /* Verifica o tamanho do arquivo */
            $maxSize = 2621440;
            if($request->file('image')->getSize() > $maxSize) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Selecione uma imagem com até 2,5MB',
                    'where' => 'image'
                ]);
            }
            /* */

            /* Verifica a extensão da imagem */
            if($request->image->extension() != 'jpeg' && $request->image->extension() != 'jpg' && $request->image->extension() != 'png') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'O formato do arquivo é inválido. Use apenas: JPEG, JPG, ou PNG',
                    'where' => 'image'
                ]);
            }
            /* */

            return $this->dashboardProductRepository->create($request, $user);
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
            /* Verifica se o produto tem um nome */
            if(strlen($request->title) < 5) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'O nome do produto deve ter no minimo 5 digítos',
                    'where' => 'title'
                ], 406);
            }
            /* */

            /* Verifica se existe um produto com o mesmo nome */
            if(!is_null(Product::where('title', $request->title)->where('id', '!=', $product->id)->first())) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Já existe um produto com esse nome',
                    'where' => 'title'
                ], 406);
            }
            /* */

            /* Verifica o preço do tamanho P */
            if(!is_float($request->priceP) && $request->priceP <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'O preço do produto (tamanho P) deve ser maior que 0',
                    'where' => 'priceP'
                ], 406);
            }
            /* */

            /* Verifica o preço do tamanho M */
            if(!is_float($request->priceM) && $request->priceM <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'O preço do produto deve ser maior que 0',
                    'where' => 'priceM'
                ], 406);
            }
            /* */

            /* Verifica o preço do tamanho G */
            if(!is_float($request->priceG) && $request->priceG <= 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'O preço do produto deve ser maior que 0',
                    'where' => 'priceM'
                ], 406);
            }
            /* */

            /* Verifica o status */
            if($request->status != 1 && $request->status != 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Escolha uma opção válida para o status',
                    'where' => 'status'
                ], 406);
            }
            /* */

            /* Verifica a categoria */
            if($request->category != 'Doces' && $request->category != 'Salgadas') {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Escolha uma opção válida para a categoria',
                    'where' => 'category'
                ], 406);
            }
            /* */

            /* Verifica se tem igredientes */
            if(empty($request->ingredients)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Coloque pelo menos 1 ingrediente',
                    'where' => 'ingredients'
                ], 406);
            }
            /* */

            /* Verifica se a imagem existe */
            if($request->hasFile('image')) {

                /* Verifica o tamanho do arquivo */
                $maxSize = 2621440;
                if($request->file('image')->getSize() > $maxSize) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Selecione uma imagem com até 2,5MB',
                        'where' => 'image'
                    ]);
                }
                /* */

                /* Verifica a extensão da imagem */
                if($request->image->extension() != 'jpeg' && $request->image->extension() != 'jpg' && $request->image->extension() != 'png') {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'O formato do arquivo é inválido. Use apenas: JPEG, JPG, ou PNG',
                        'where' => 'image'
                    ]);
                }
                /* */
            }
            /* */

            return $this->dashboardProductRepository->edit($product, $request, $user);
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
            return $this->dashboardProductRepository->destroy($product, $user);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível excluir o produto'
            ], 400);
        }
    }
}
