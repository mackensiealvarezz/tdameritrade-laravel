<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Movers extends Api
{

    /**
     * get
     * Top 10 (up or down) movers by value or percent for a particular market
     * @param  mixed $index The index symbol to get movers from. Can be $COMPX, $DJI, or $SPX.X.
     * @param  mixed $direction Direction can be up or down
     * @param  mixed $change To return movers with the specified change types of percent or value
     * @return void
     */
    public function get(string $index = '$SPX.X', string $direction = "up", string $change = "percent")
    {
        return $this->client->getWithAuth('/marketdata/' . $index . '/movers', [
            'query' => ['direction' => $direction, 'change' => $change]
        ]);
    }
}
