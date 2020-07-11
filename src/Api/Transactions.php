<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;
use Illuminate\Support\Carbon;

class Transactions extends Api
{

    /**
     * list
     * Transactions for a specific account.
     * @param  mixed $account_id
     * @param  mixed $type Only transactions with the specified type will be returned.
     * @param  mixed $symbol Only transactions with the specified symbol will be returned.
     * @param  Carbon $startDate
     * @param  Carbon $endDate
     * @return void
     */
    public function list(string $account_id, string $type = 'ALL', string $symbol = null, Carbon $startDate, Carbon $endDate)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id . '/transactions', [
            'query' => [
                'type' => $type,
                "symbol" => $symbol,
                'startDate' => $startDate->format('Y-m-d'),
                'endDate' => $endDate->format('Y-m-d')
            ]
        ]);
    }


    /**
     * get
     * Transaction for a specific account.
     * @param  mixed $account_id
     * @param  mixed $transaction_id
     * @return void
     */
    public function get(string  $account_id, string $transaction_id)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id . '/transactions/' . $transaction_id);
    }
}
