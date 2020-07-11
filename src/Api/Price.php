<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;
use Illuminate\Support\Carbon;

class Price extends Api
{

    /**
     * history
     * Historical price data for charts
     * @param  string $symbol Stock Symbol
     * @param  Carbon $startDate The start date
     * @param  Carbon $endDate The end date
     * @param  string $periodType The type of period to show. Valid values are day, month, year, or ytd (year to date). Default is day.
     * @param  string $period The number of periods to show.
     * @param  string frequencyType The type of frequency with which a new candle is formed.
     * @param  string $frequency The number of the frequencyType to be included in each candle.
     * @param  string $needExtendedHoursData Include Extended hours, true or false.
     * @return void
     */
    public function history(
        string $symbol,
        Carbon $startDate,
        Carbon $endDate,
        string $periodType = 'day',
        string $period = '1',
        string $frequencyType = 'min',
        string $frequency = '1',
        string $needExtendedHoursData = 'false'
    ) {

        $data = [
            'symbol' => $symbol,
            "endDate" => $endDate->format('Y-m-d'),
            'startDate' => $startDate->format('Y-m-d'),
            'periodType' => $periodType,
            'period' => $period,
            'frequencyType' => $frequencyType,
            'frequency' => $frequency,
            'needExtendedHoursData' => $needExtendedHoursData
        ];
        $data = array_filter($data);
        return $this->client->getWithAuth('/marketdata/' . $symbol . '/pricehistory', [
            'query' => $data
        ]);
    }

    /**
     * quote
     * Get quote for a symbol
     * @param  mixed $symbol
     * @return void
     */
    public function quote(string $symbol)
    {
        return $this->client->getWithAuth('/marketdata/' . $symbol . '/quotes');
    }

    /**
     * quotes
     * Get quote for one or more symbols
     * @param  mixed $symbols
     * @return void
     */
    public function quotes(array $symbols)
    {
        return $this->client->getWithAuth('/marketdata/quotes', [
            'query' => ['symbol' => implode(',', $symbols)]
        ]);
    }
}
