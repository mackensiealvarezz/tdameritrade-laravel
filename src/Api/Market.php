<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Market extends Api
{

    /**
     * list
     * Retrieve market hours for specified markets
     * @param  array $markets Valid markets are EQUITY, OPTION, FUTURE, BOND, or FOREX.
     * @return void
     */
    public function list(array $markets = null)
    {
        if (isset($markets)) {
            return $this->client->getWithAuth('/marketdata/hours', [
                'query' => ['markets' => implode(',', $markets)]
            ]);
        }
        return $this->client->getWithAuth('/marketdata/hours');
    }


    /**
     * get
     * Retrieve market hours for specified single market
     * @param  string $market
     * @return void Valid markets are EQUITY, OPTION, FUTURE, BOND, or FOREX
     */
    public function get(string $market)
    {
        return $this->client->getWithAuth('/marketdata/' . $market . '/hours');
    }
}
