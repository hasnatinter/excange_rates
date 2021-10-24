<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class FetchExchangeData
{
    use Dispatchable, SerializesModels;

    /**
     * @var string[]
     */
    private $currencies;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currencies = ['usd', 'gbp', 'rub'];
    }

    /**
     * Execute the jobs
     */
    public function handle()
    {
        return $this->fetchData('usd');
    }

    /**
     * Fetch data for currency
     * @return \Illuminate\Http\Client\Response
     */
    private function fetchData(string $currency): \Illuminate\Http\Client\Response {
        return Http::get("http://data.fixer.io/api/convert", [
            'access_key' => env('FLEXER_API_KEY'),
            'from' => 'eur',
            'to' => $currency,
            'amount' => 1
        ]);
    }

}
