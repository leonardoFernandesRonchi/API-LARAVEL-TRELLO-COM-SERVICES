<?php

namespace App\Helpers;

class Responses
{
    public static function success($data = null, $message = 'Operação realizada com sucesso', $status = 200)
    {
        return response()->json([
            'status' => true,
            'message' => $message,
            'data' => $data
        ], $status);
    }

    public static function error($message = 'Erro na operação', $status = 400, $errors = null)
    {
        return response()->json([
            'status' => false,
            'message' => $message,
            'errors' => $errors
        ], $status);
    }
}
