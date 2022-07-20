<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

/**
 * Response trait for api
 */
trait ResponseTrait
{

    /**
     * Success response
     *
     * @param mixed $data Data from response
     * @param int $statusCode Code http for response
     * @param string $message Info message
     *
     * @return JsonResponse Object with response
     */
    public function successResponse(mixed $data, int $statusCode = Response::HTTP_ACCEPTED, string $message = 'Success operation'): JsonResponse
    {
        return response()->json([
            'message' => $message,
            'statusCode' => $statusCode,
            'data' => $data
        ], $statusCode);
    }

    /**
     * Error response
     *
     * @param int $statusCode Http status code
     * @param string $message Descriptive message for error
     * @param array $errors List of errors to send to front
     *
     * @return JsonResponse
     */
    public function errorResponse(int $statusCode, string $message = 'An error has occurred', array $errors = []): JsonResponse
    {
        return response()->json([
            'errors' => $errors,
            'message' => $message,
            'statusCode' => $statusCode
        ], $statusCode);
    }

}
