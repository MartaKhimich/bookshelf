<?php


namespace App\Traits;


trait HttpRes {

    protected function success(int $code = 200, string $message = null, $data )
    {
        return response()->json([
            'status'    => 'Success',
            'code'      => $code,
            'message'   => $message,
            'data'      => $data,
        ], $code);
    }

    protected function error(int $code = 500, string $message = null, $data = [] )
    {
        return response()->json([
            'status'    => 'Error',
            'code'      => $code,
            'message'   => $message,
            'data'      => $data,
        ], $code);
    }

}
