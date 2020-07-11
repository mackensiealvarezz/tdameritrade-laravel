<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

/**
 * @method void list(string $fields = null)
 * @method void get(string  $account_id)
 */
class Accounts extends Api
{

    /**
     * list
     *
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
     *
     * @param  string $account_id
     * @return void
     */
    public function get(string  $account_id)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id);
    }
}
