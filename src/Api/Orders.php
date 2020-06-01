<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Orders extends Api
{

    public function list()
    {
        return $this->client->getWithAuth('/orders');
    }


    public function get(string  $account_id, string $order_id)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id . '/orders/' . $order_id);
    }
}
