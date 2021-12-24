<?php

use Illuminate\Support\Facades\URL;

if (! function_exists('responseApiReturn')) {
    function responseApiReturn($status, $userData = [], $msg = 'OK', $errors = [], $unauthorizedType = null)
    {
        $data = [
            'base_url' => URL::to('/'),
            'status' => (200 == $status) ? true : false,
            'status_code' => $status,
            'message' => $msg,
        ];

        if (! is_null($unauthorizedType) && (($status == 401) || ($status=404))) {
            $data['flag'] = $unauthorizedType;
        }

        if (! empty($userData)) {
            $data['data'] = $userData;
        }

        if (! empty($errors)) {
            $data['errors'] = $errors;
        }

        return response()->json($data, $status);
    }
}
