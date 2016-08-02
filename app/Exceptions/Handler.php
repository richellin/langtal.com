<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthorizationException::class,
        HttpException::class,
        ModelNotFoundException::class,
        ValidationException::class,
        
        TokenExpiredException::class,
        TokenInvalidException::class,
        JWTException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     *
     * @return void
     */
    public function report(Exception $e)
    {
        parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     *
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if (is_api_request()) {
            $code = method_exists($e, 'getStatusCode')
                ? $e->getStatusCode()
                : $e->getCode();

            // Exception 별로 메시지를 다르게 처리한다.
            // 특히, 같은 400, 401 이라도 클라이언트가 이해하고 다음 액션을 취할 수 있는
            // 메시지를 주는 것이 중요하다. 해서 xxx_yyy 식의 영어 메시지를 쓰고 있다.
            if ($e instanceof TokenExpiredException) {
                $message = 'token_expired';
            } else if ($e instanceof TokenInvalidException) {
                $message = 'token_invalid';
            } else if ($e instanceof JWTException) {
                $message = $e->getMessage() ?: 'could_not_create_token';
            } else if ($e instanceof NotFoundHttpException) {
                $message = $e->getMessage() ?: 'not_found';
            } else if ($e instanceof Exception){
                $message = $e->getMessage() ?: 'Something broken :(';
            }

            return response()->json([
                'code' => $code ?: 400,
                'errors' => $message,
            ], $code ?: 400);
        }
        return parent::render($request, $e);
    }
}
