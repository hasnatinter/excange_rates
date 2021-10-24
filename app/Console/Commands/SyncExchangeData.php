<?php

namespace App\Console\Commands;

use App\ExchangeService\FetchCurrencies;
use App\Models\ExchangeRate;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SyncExchangeData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sync:exchange-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run exchange data';
    /**
     * @var FetchCurrencies
     */
    private $fetchCurrencies;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(FetchCurrencies $fetchCurrencies)
    {
        parent::__construct();
        $this->fetchCurrencies = $fetchCurrencies;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
         $data = $this->fetchCurrencies->fetchData();
         foreach ($data['rates'] as $currency_iso_code => $rate) {
            ExchangeRate::updateOrCreate(
                ['currency_iso_code' => $currency_iso_code],
                ['currency_iso_code' => $currency_iso_code, 'rate' => $rate]
            );
         }
    }

}
