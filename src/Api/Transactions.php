<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Transactions extends Api
{

    public function list(string $account_id, string $type = 'ALL', string $symbol = null, string $startDate = null, string $endDate = null)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id . '/transactions', [
            'query' => [
                'type' => $type,
                "symbol" => $symbol,
                'startDate' => $startDate,
                'endDate' => $endDate
            ]
        ]);
    }


    public function get(string  $account_id, string $transaction_id)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id . '/transactions/' . $transaction_id);
    }
}
