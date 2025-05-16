<?php

namespace App\Exceptions;

use Throwable;
use App\Traits\ApiResponse;
use App\Exceptions\CustomException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Handler extends ExceptionHandler
{
    use ApiResponse;

    public function render($request, Throwable $exception)
    {
        if ($request->expectsJson()) {
            if ($exception instanceof ValidationException) {
                return $this->error('Validation Error', 422, $exception->errors());
            }

            if ($exception instanceof AuthenticationException) {
                return $this->error('Unauthenticated', 401);
            }

            if ($exception instanceof NotFoundHttpException) {
                return $this->error('Route Not Found', 404);
            }

            if ($exception instanceof CustomException) {
                return $this->error($exception->getMessage(), $exception->getStatusCode());
            }

            return $this->error($exception->getMessage(), 500);
        }

        return parent::render($request, $exception);
    }
}
