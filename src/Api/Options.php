<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Options extends Api
{

    public function chains(
        string $symbol,
        string $strikeCount,
        string $contractType = 'ALL',
        string $includeQuotes = 'FALSE',
        string $strategy = 'SINGLE'
    ) {
        return $this->client->getWithAuth('/accounts/marketdata/chains', [
            'query' => [
                'symbol' => $symbol,
                "strikeCount" => $strikeCount,
                'contractType' => $contractType,
                'includeQuotes' => $includeQuotes,
                'strategy' => $strategy
            ]
        ]);
    }
}
