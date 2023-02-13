<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response as ResponseFacade;
use Illuminate\Http\Response;

class ApiResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // 正常リクエストのレスポンス
        ResponseFacade::macro('success', function (mixed $data, int $code = Response::HTTP_OK) {
            return response()->json([
                'status' => 'success',
                'payload' => $data
            ], $code);
        });

        // 失敗リクエストのレスポンス
        ResponseFacade::macro('error', function (mixed $errors, int $code = Response::HTTP_BAD_REQUEST) {
            return response()->json([
                'status' => 'error',
                'message' => Response::$statusTexts[$code],
                'errors' => $errors
            ], $code);
        });

        // デバッグ
        ResponseFacade::macro('debug', function ($data, $code = Response::HTTP_PROCESSING, $trace = null) {
            return response()->json([
                'status' => 'debug',
                'code' => $code,
                'message' => Response::$statusTexts[$code],
                'debug' => $data
            ], $code);
        });
    }
}
