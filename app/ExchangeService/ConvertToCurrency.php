<?php

namespace App\ExchangeService;

use App\Models\ExchangeRate;

class ConvertToCurrency
{
    /**
     * @var float
     */
    private $price;
    /**
     * @var string
     */
    private $currency_iso_code;

    public function __construct(float $price, string $currency_iso_code)
    {
        $this->price = $price;
        $this->currency_iso_code = $currency_iso_code;
    }

    public function getPrice()
    {
        // get exchange rate
        $data = ExchangeRate::where('currency_iso_code', '=', $this->currency_iso_code)->first();
        if (!$data) {
            return $this->price;
        }

        return round($this->price * $data->rate, 2);
    }
}