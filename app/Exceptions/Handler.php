<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
// use Laravel\Passport\Exceptions\MissingScopeException;
use Spatie\Permission\Exceptions\UnauthorizedException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of exception types with their corresponding custom log levels.
     *
     * @var array<class-string<\Throwable>, \Psr\Log\LogLevel::*>
     */
    protected $levels = [
        //
    ];

    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<\Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($exception instanceof ModelNotFoundException || $exception instanceof NotFoundHttpException) {
            return response()->json(['success' => false,'message' => "Not Found",], 404);
        }
        if ($exception instanceof UnauthorizedHttpException || $exception instanceof ValidationUnauthorizedException) {
            return response()->json(['success' => false,'message' => "Un Authorized",], 401);
        }
        // if ($exception instanceof MissingScopeException) {
        //     return response()->json(['success' => false,'message' => "Access Denied",], 403);
        // }
        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->json(['success' => false,'message' => 'Method Not Allowed',], 404);
        }

        if ($exception instanceof ErrorException) {
            if (preg_match('/^file_put_contents/', $exception->getMessage())) {
                return;
            }
        }

        return parent::render($request, $exception);
    }

}
