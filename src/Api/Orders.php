<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;
use Illuminate\Support\Carbon;

class Orders extends Api
{

    public function list(Carbon $startDate, Carbon $endDate, int $maxResults=25, string $status=null, string $account_id=null)
    {
        return $this->client->getWithAuth('/orders', [
            'query'=>[
                'fromEnteredTime'=>$startDate->format('Y-m-d'),
                'toEnteredTime'=>$endDate->format('Y-m-d'),
                'maxResults'=>$maxResults,
                'status'=>$status,
                'accountId'=>$account_id
            ]
        ]);
    }

    public function get(string  $account_id, string $order_id)
    {
        return $this->client->getWithAuth('/accounts/' . $account_id . '/orders/' . $order_id);
    }
}
