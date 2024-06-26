<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the inputs that are never flashed for validation exceptions.
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
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            // This is where you can add reporting logic, if needed.
        });
    }

    public function render($request, Throwable $exception)
    {
        if ($request->wantsJson()) {
            // Determine the status code
            $status = $exception instanceof HttpException
                      ? $exception->getStatusCode()
                      : Response::HTTP_INTERNAL_SERVER_ERROR;

            // Determine the message
            $message = $exception->getMessage() ?: Response::$statusTexts[$status];

            // Prepare the error response
            $response = [
                'message' => $message,
                'status' => 'error'
            ];

            // Add additional error details in debug mode
            if (config('app.debug')) {
                $response['exception'] = get_class($exception);
                $response['trace'] = $exception->getTrace();
            }

            // Return the JSON response
            return response()->json($response, $status);
        }

        // Non-JSON response
        return parent::render($request, $exception);
    }
}
