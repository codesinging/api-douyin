<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace App\Support\Douyin\Auth;

use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AccessToken
{
    protected string $clientKey = '';
    protected string $clientSecret = '';
    protected string $grantType = 'client_credential';
    protected string $apiPrefix = 'https://open.douyin.com/';

    protected string $key = '';

    public function __construct()
    {
        $this->clientKey = config('douyin.client_key');
        $this->clientSecret = config('douyin.client_secret');
    }

    public function getKey(): string
    {
        return $this->key ?: $this->key = sprintf('douyin.access_token.%s', $this->clientKey);
    }

    /**
     * @throws Exception
     */
    private function getData()
    {
        $response = Http::post($this->apiPrefix . 'oauth/client_token/', [
            'client_key' => $this->clientKey,
            'client_secret' => $this->clientSecret,
            'grant_type' => $this->grantType,
        ]);

        $data = $response->json('data');

        if ($data['error_code'] !== 0) {
            throw new \HttpException('Failed to get access_token');
        }

        return $data;
    }

    /**
     * @throws Exception
     */
    public function getNewToken()
    {
        $data = $this->getData();

        return $data['access_token'];
    }

    /**
     * @throws Exception
     */
    public function getToken()
    {
        $key = $this->getKey();

        if ($token = Cache::get($key)) {
            return $token;
        }

        $data = $this->getData();

        Cache::put($key, $token = $data['access_token'], $data['expires_in'] - 10);

        return $token;
    }
}
