<?php

namespace App\Traits;

trait ApiResponse
{
    /**
     * Return a success JSON response.
     *
     * @param  mixed  $data
     * @param  string  $message
     * @param  int  $code
     * @return \Illuminate\Http\JsonResponse
     */
    protected function success($data = null, string $message = null, int $code = 200, $errors = null)
    {
        return response()->json([
            'status' => 'SUCCESS',
            'message' => $message,
            'data' => $data,
            'code' => $code,
            'errors' => $errors
        ], $code);
    }

    /**
     * Return an error JSON response.
     *
     * @param  string  $message
     * @param  int  $code
     * @param  mixed  $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function error(string $message = null, int $code = 500, $data = null)
    {
        return response()->json([
            'status' => 'CONNECTION_ERROR',
            'message' => $message,
            'data' => $data
        ], $code);
    }

}
