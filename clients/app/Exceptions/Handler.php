<?php

namespace App\Exceptions;

use Throwable;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\ThrottleRequestsException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;

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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ThrottleRequestsException) {
            Log::error($exception->getMessage());

            return responseApiReturn($exception->getStatusCode(), [], $exception->getMessage());
        }

        if ($exception instanceof NotFoundHttpException) {
            Log::error($exception->getMessage());

            return responseApiReturn(404, [], 'Data not found');
        }

        if ($exception instanceof MethodNotAllowedHttpException) {
            Log::error($exception->getMessage());

            return responseApiReturn(404, [], 'Route not found');
        }

        if (config('app.env') != 'local') {
            if ($exception instanceof Throwable) {
                Log::error($exception->getMessage());

                return responseApiReturn(500, [], 'System error');
            }
        }

        return parent::render($request, $exception);
    }

    protected function invalidJson($request, ValidationException $exception)
    {
        return responseApiReturn($exception->status, [], 'Validation failed', $exception->errors());
    }
}
