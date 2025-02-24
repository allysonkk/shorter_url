<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;

class UrlService
{
    public function encode($url)
    {
        $encoded = substr(md5(Crypt::encryptString($url)), 0, 6);
        Cache::put($encoded, $url, now()->addDays(30)); // Cache for 30 days
        return $encoded;
    }

    public function decode($encodedUrl)
    {
        return Cache::get($encodedUrl);
    }
}
