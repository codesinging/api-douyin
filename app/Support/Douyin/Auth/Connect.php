<?php
/**
 * Author: codesinging <codesinging@gmail.com>
 * Github: https://github.com/codesinging
 */

namespace App\Support\Douyin\Auth;

use Illuminate\Support\Facades\Http;

class Connect
{
    protected string $api = 'https://open.douyin.com/platform/oauth/connect/';
    protected string $clientKey = '';
    protected array $scopes = [
        'user_info',
        'video.create',
        'jsb.open.auth',
        'trial.whitelist',
    ];

    public function __construct()
    {
        $this->clientKey = config('douyin.client_key');
    }

    public function getUrl(): string
    {
        $query = http_build_query([
            'client_key' => $this->clientKey,
            'response_type' => 'code',
            'scope' => implode(',', $this->scopes),
            'redirect_uri' => 'https://douyin.pinfankeji.com/douyin',
        ]);

        return $this->api . '?' . $query;
    }
}
