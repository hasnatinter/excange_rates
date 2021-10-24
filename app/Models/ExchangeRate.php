<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ExchangeRate
 *
 * @property int $id
 * @property string $currency_iso_code
 * @property float $rate
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\ExchangeRateFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate query()
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereCurrencyIsoCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ExchangeRate whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ExchangeRate extends Model
{
    protected $fillable = ['currency_iso_code', 'rate'];

    use HasFactory;
}
