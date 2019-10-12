<?php

namespace App\Http\Response;

use Illuminate\Http\JsonResponse;

/**
 * Class ApiResponseBuilder
 * @package App\Http\Response
 */
class ApiResponseBuilder
{
    /**
     * @param int $status
     * @param array $headers
     * @return JsonResponse
     */
    public static function success(int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse([
            'success' => 'true',
        ], $status, $headers);
    }

    /**
     * @param null $data
     * @param int $status
     * @param array $headers
     * @return \Illuminate\Http\JsonResponse
     */
    public static function successWithData($data = null, int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse([
            'success' => 'true',
            'data' => $data,
        ], $status, $headers);
    }

    /**
     * @param null $data
     * @param int $status
     * @param array $headers
     * @return JsonResponse
     */
    public static function successWithDataPaginated($data = null, int $status = 200, array $headers = []): JsonResponse
    {
        return new JsonResponse([
            'success' => 'true',
            'data' => $data->items(),
            'pagination' => [
                'hasMore' => $data->hasMorePages(),
                'current' => $data->currentPage(),
                'maxPages' => $data->lastPage(),
                'maxItems' => $data->total(),
            ]
        ], $status, $headers);
    }

    /**
     * @param array $errors
     * @param int $status
     * @return JsonResponse
     */
    public static function withMultipleErrors(array $errors, int $status = 400): JsonResponse
    {
        $errors = collect($errors);

        return new JsonResponse([
            'success' => false,
            'message' => $errors->first(),
            'errors' => $errors,
        ], $status);
    }

    /**
     * @param string $message
     * @param int $status
     * @return JsonResponse
     */
    public static function withError(string $message = 'Error', int $status = 400): JsonResponse
    {
        return new JsonResponse([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}
