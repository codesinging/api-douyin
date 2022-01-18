<?php

namespace App\Http\Controllers;

use App\Support\Douyin\Auth\Connect;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ConnectController extends Controller
{
    public function getUrl(): JsonResponse
    {
        $url = (new Connect())->getUrl();
        return success(compact('url'));
    }

    public function code(Request $request)
    {
        dump($request->all());
    }
}
