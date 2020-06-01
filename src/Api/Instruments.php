<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Instruments extends Api
{

    public function search(string $ticker, string $projection = 'symbol-search')
    {
        return $this->client->getWithAuth('/instruments', [
            'query' => ['symbol' => $ticker, "projection" => $projection]
        ]);
    }


    public function get(string  $cusip)
    {
        return $this->client->getWithAuth('/instruments/' . $cusip);
    }
}
