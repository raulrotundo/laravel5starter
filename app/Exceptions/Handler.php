<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Request;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if($this->isHttpException($e)){
            \Log::error($e);
            $prefix = Request::segments();
            //Redirect to the error folder depending of the prefix
            if ($prefix[0] == config('admin.prefix')) {
                //Back-end error folder
                return \Response::view(config('admin.prefix').'/errors/'.$e->getStatusCode());
            } else {
                //Front-End error folder
                return \Response::view('frontend/errors/'.$e->getStatusCode());
            }
        } else {
            return parent::render($request, $e);
        }
    }
}
