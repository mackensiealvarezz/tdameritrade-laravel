<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Price extends Api
{

    public function history(
        string $symbol,
        string $endDate = null,
        string $startDate = null,
        string $periodType = 'day',
        string $period = '1',
        string $frequencyType = 'min',
        string $frequency = '1',
        string $needExtendedHoursData = 'false'
    ) {

        $data = [
            'symbol' => $symbol,
            "endDate" => $endDate,
            'startDate' => $startDate,
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

    // For a single stock
    public function quote(string $symbol)
    {
        return $this->client->getWithAuth('/marketdata/' . $symbol . '/quotes');
    }


    //for multiple tickers
    public function quotes(array $symbols)
    {
        return $this->client->getWithAuth('/marketdata/quotes', [
            'query' => implode(',', $symbols)
        ]);
    }
}
