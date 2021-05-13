<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class CacheService
{
    public function get(string $key)
    {
        try {
            return json_decode(Cache::get($key));
        } catch(\Exception $e) {
            throw new \Exception("Error on get cache. ".$e->getMessage());
        }
    }

    public function set(string $key, $value): void
    {
        try {
            Cache::put($key, json_encode($value));
        } catch(\Exception $e) {
            throw new \Exception("Error on set cache. ".$e->getMessage());
        }
    }

    public function clear(string $key): void
    {
        try {
            $this->set($key, '');
        } catch(\Exception $e) {
            throw new \Exception("Error on clear cache. ".$e->getMessage());
        }
    }
}
