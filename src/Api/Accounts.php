<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Accounts extends Api
{

    /**
     * list
     * Account balances, positions, and orders for all linked accounts.
     * @param  mixed $fields
     * @return void
     */
    public function list(string $fields = null)
    {
        return $this->client->getWithAuth('/accounts', [
            'query' => ['fields' => $fields]
        ]);
    }


    /**
     * get
     * Account balances, positions, and orders for a specific account.
     * @param  string $account_id
     * @return void
     */
    public function get(string  $account_id)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id);
    }
}
