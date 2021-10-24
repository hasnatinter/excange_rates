<?php

namespace App\ExchangeService;

use Illuminate\Support\Facades\Http;

class FixerService implements FetchCurrencies
{
    public function fetchData()
    {
        return Http::get("http://data.fixer.io/api/latest", [
            'access_key' => env('FLEXER_API_KEY'),
            'symbols' => "USD,GBP,RUB,EUR"
        ])->json();
    }
}