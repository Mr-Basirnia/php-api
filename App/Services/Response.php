<?php

namespace App\Services;

class Response
{

    public static function json(array $data = [] , $status = 200)
    {
        $response = [
            'status'  => 'success',
            'data'    => $data,
            'message' => '',
            'code'    => $status,
        ];

        return json_encode($response);
    }

    /**
     * @param array $data
     * @param $message
     * @param $code
     */
    public static function success($data = [], $message = '', $code = 200)
    {

    }

    /**
     * @param $message
     * @param $code
     */
    public static function error($message = '', $code = 400)
    {

    }
}
