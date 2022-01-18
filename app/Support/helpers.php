<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

use Illuminate\Http\JsonResponse;

if (!function_exists('success')) {
    /**
     * Return a success json response.
     *
     * @param $message
     * @param $data
     *
     * @return JsonResponse
     */
    function success($message = null, $data = null): JsonResponse
    {
        $code = 0;
        is_string($message) or list($data, $message) = [$message, $data];
        return response()->json(compact('code', 'message', 'data'));
    }
}

if (!function_exists('error')) {
    /**
     * Return an error json response.
     *
     * @param $message
     * @param int $code
     * @param $data
     *
     * @return JsonResponse
     */
    function error($message = null, int $code = -1, $data = null): JsonResponse
    {
        return response()->json(compact('message', 'code', 'data'));
    }
}
