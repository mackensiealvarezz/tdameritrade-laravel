<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Market extends Api
{

    public function list(array $markets = null)
    {
        if (isset($markets)) {
            return $this->client->getWithAuth('/marketdata/hours', [
                'query' => ['markets' => implode(',', $markets)]
            ]);
        }
        return $this->client->getWithAuth('/marketdata/hours');
    }


    public function get(string $market)
    {
        return $this->client->getWithAuth('/marketdata/' . $market . '/hours');
    }
}
