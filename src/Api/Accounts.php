<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Accounts extends Api
{

    public function list(string $fields = null)
    {
        return $this->client->getWithAuth('/accounts', [
            'query' => ['fields' => $fields]
        ]);
    }


    public function get(string  $account_id)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id);
    }
}
