<?php

namespace App\Http\Controllers;

use App\Support\Douyin\Auth\AccessToken;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AccessTokenController extends Controller
{
    /**
     * @throws Exception
     */
    public function newToken(): JsonResponse
    {
        $accessToken = (new AccessToken())->getNewToken();

        return success(compact('accessToken'));
    }

    /**
     * @throws Exception
     */
    public function token(): JsonResponse
    {
        $accessToken = (new AccessToken())->getToken();

        return success(compact('accessToken'));
    }
}
