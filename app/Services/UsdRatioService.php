<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class UsdRatioService {
    
    public static function getUsdValueOfOneCoin($cryptoCurrency, $date) {

        $date = $date->format('Y-m-d');
        
        $response = Http::withHeaders([
            'Accept' => 'application/json'
        ])->get(config('app.crypto_api_url').'/'.$date, [
            'symbols' => $cryptoCurrency,
            'access_key' => config('app.crypto_api_key'),
            'target' => 'USD',
        ]);

        if ($response->failed()) {
            throw new \Exception("Request for usd ratio failed");
        }

        $usdRatio = $response->json()["rates"][$cryptoCurrency];

        return $usdRatio;
    }
}