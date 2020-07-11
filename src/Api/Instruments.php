<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;


class Instruments extends Api
{
    /**
     * search
     * Search or retrieve instrument data, including fundamental data.
     * @param  string $ticker Stock Ticker
     * @param  string $projection The type of request, allows: symbol-search, symbol-regex, desc-search, desc-regex, fundamental
     * @return void
     */
    public function search(string $ticker, string $projection = 'symbol-search')
    {
        return $this->client->getWithAuth('/instruments', [
            'query' => ['symbol' => $ticker, "projection" => $projection]
        ]);
    }


    /**
     * get
     * Get an instrument by CUSIP
     * @param  string $cusip
     * @return void
     */
    public function get(string  $cusip)
    {
        return $this->client->getWithAuth('/instruments/' . $cusip);
    }
}
