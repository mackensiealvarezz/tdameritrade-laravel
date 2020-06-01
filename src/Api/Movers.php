<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Movers extends Api
{

    //The index symbol to get movers from. Can be $COMPX, $DJI, or $SPX.X.
    public function get(string $index = '$SPX.X', string $direction = "up", string $change = "percent")
    {
        return $this->client->getWithAuth('/marketdata/' . $index . '/movers', [
            'query' => ['direction' => $direction, 'change' => $change]
        ]);
    }
}
