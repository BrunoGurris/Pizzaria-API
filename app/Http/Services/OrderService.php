<?php

namespace App\Http\Services;

use App\Http\Repositories\OrderRepository;
use Exception;

class OrderService
{
    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function create($request)
    {
        try {
            /* Verifica o nome da pessoa */
            if(strlen($request->name) < 5) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Seu nome deve ter mais de 5 dígitos',
                    'where' => 'name'
                ], 406);
            }
            /* */

            /* Verifica o cpf da pessoa */
            if(strlen($request->cpf) != 14) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Informe seu CPF corretamente',
                    'where' => 'cpf'
                ], 406);
            }
            /* */

            /* Verifica o cep */
            if(empty($request->zip_code)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Informe o CEP da residência',
                    'where' => 'zip_code'
                ], 406);
            }
            /* */

            /* Verifica o numero */
            if(empty($request->number)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Informe o numero da residência',
                    'where' => 'number'
                ], 406);
            }
            /* */

            /* Verifica a cidade */
            if(empty($request->city)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Informe a cidade da residência',
                    'where' => 'city'
                ], 406);
            }
            /* */

            /* Verifica a estado */
            if(empty($request->state)) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Informe o estado da residência',
                    'where' => 'state'
                ], 406);
            }
            /* */

            /* Verifica se tem item */
            $request->items = json_decode($request->items);
            if(count($request->items) < 1) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Seu carrinho esta vazio',
                    'where' => 'items'
                ], 406);
            }
            /* */

            return $this->orderRepository->create($request);
        }
        catch(Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Não foi possível gerar o pedido'
            ], 400);
        }
    }

}
