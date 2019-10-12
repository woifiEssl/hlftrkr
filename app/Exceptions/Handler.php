<?php

namespace App\Exceptions;

use App\Exceptions\Auth\LoginException;
use App\Exceptions\Cache\CacheException;
use App\Exceptions\Cache\InvalidArgumentException;
use App\Http\Response\ApiResponseBuilder;
use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use StaticCacheManager\InvalidCacheArgumentException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param \Exception $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse|Response|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        $code = Response::HTTP_INTERNAL_SERVER_ERROR;

        switch ($exception) {
            case $exception instanceof LoginException:
                $code = Response::HTTP_UNAUTHORIZED;
                break;
            case $exception instanceof ValidationException:
                return ApiResponseBuilder::withMultipleErrors(
                    $exception->validator->errors()->toArray(),
                    Response::HTTP_UNPROCESSABLE_ENTITY);
                break;
                break;
                break;
        }
        return parent::render($request, $exception);
    }
}
