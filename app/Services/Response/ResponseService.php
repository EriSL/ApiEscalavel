<?php

namespace App\Services\Response;


class ResponseService 
{
    public function success($data = null, $message = 'Success', $code = 200)
    {
        return [
            'status' => 'success',
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];
    }


    public function error($message = 'Error', $code = 400, $data = null)
    {
        return [
            'status' => 'error',
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];
    }

    public function notFound($message = 'Not Found', $code = 404, $data = null)
    {
        return [
            'status' => 'error',
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];
    }

    public function unauthorized($message = 'Unauthorized', $code = 401, $data = null)
    {
        return [
            'status' => 'error',
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];
    }

    public function forbidden($message = 'Forbidden', $code = 403, $data = null)
    {
        return [
            'status' => 'error',
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];
    }

    public function validationError($message = 'Validation Error', $code = 422, $data = null)
    {
        return [
            'status' => 'error',
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];
    }

    public function serverError($message = 'Server Error', $code = 500, $data = null)
    {
        return [
            'status' => 'error',
            'message' => $message,
            'data' => $data,
            'code' => $code
        ];
    }
}