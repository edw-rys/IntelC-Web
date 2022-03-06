<?php

namespace App\Exceptions;

use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

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
    
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Exception
     */
    public function render($request, Throwable $exception)
    {
        
        /**
         * App Exceptions
         */
        if ($exception instanceof HttpResponseException) {
            return $exception->getResponse();
        }

        /**
         * Custom Exceptions
         */

        if ($exception instanceof MethodNotAllowedHttpException) {
            return response()->view('errors.404', ['exception' => $exception, 'title'=> '¡Página no encontrada!'],404);
        }

        if ($exception instanceof NotFoundHttpException) {
            return response()->view('errors.404', ['exception' => $exception, 'title'=> '¡Página no encontrada!'],404);
        }
        if ($exception instanceof ValidationException) {
            return $this->convertValidationExceptionToResponse($exception, $request);
            return redirect()->back();
            // return response()->view('errors.404', ['exception' => $exception, 'title'=>trans('global.pages.not_found')],404);
        }

        return $request->expectsJson()
            ? $this->prepareJsonResponse($request, $exception)
            : $this->prepareResponse($request, $exception);
    }

}
