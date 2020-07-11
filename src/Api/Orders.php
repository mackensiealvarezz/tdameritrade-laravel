<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;
use Illuminate\Support\Carbon;

class Orders extends Api
{

    /**
     * list
     * All orders for a specific account or, if account ID isn't specified, orders will be returned for all linked accounts.
     * @param  Carbon $startDate The start date
     * @param  Carbon $endDate The end date
     * @param  mixed $maxResults The max number of orders to retrieve.
     * @param  mixed $status Specifies that only orders of this status should be returned.
     * @param  mixed $account_id Account Number.
     * @return void
     */
    public function list(Carbon $startDate, Carbon $endDate, int $maxResults = 25, string $status = null, string $account_id = null)
    {
        return $this->client->getWithAuth('/orders', [
            'query' => [
                'fromEnteredTime' => $startDate->format('Y-m-d'),
                'toEnteredTime' => $endDate->format('Y-m-d'),
                'maxResults' => $maxResults,
                'status' => $status,
                'accountId' => $account_id
            ]
        ]);
    }

    /**
     * get
     * Get a specific order for a specific account.
     * @param  string $account_id Account Number.
     * @param  string $order_id Order ID
     * @return void
     */
    public function get(string  $account_id, string $order_id)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id . '/orders/' . $order_id);
    }


    /**
     * place
     * Place an order for a specific account.
     * @param  mixed $account_id Account ID
     * @param  mixed $order Order
     * @return void
     */
    public function place(string $account_id, array $order)
    {
        return $this->client->postWithAuth('/accounts/' . $account_id . '/orders', [
            'json' => $order
        ]);
    }
}
