<?php

namespace Mackensiealvarezz\Tdameritrade\Api;

use Mackensiealvarezz\Tdameritrade\Api\Api;

class Options extends Api
{

    /**
     * chains
     * Get option chain for an optionable Symbol
     * @param string $symbol Stock Symbol
     * @param string $strikeCount The number of strikes to return above and below the at-the-money price.
     * @param string $contractType Type of contracts to return in the chain. Can be CALL, PUT, or ALL. Default is ALL.
     * @param string $includeQuotes Include quotes for options in the option chain. Can be TRUE or FALSE. Default is FALSE.
     * @param string $strategy Passing a value returns a Strategy Chain. Possible values are SINGLE, ANALYTICAL (allows use of the volatility, underlyingPrice, interestRate, and daysToExpiration params to calculate theoretical values), COVERED, VERTICAL, CALENDAR, STRANGLE, STRADDLE, BUTTERFLY, CONDOR, DIAGONAL, COLLAR, or ROLL. Default is SINGLE.
     * @return void
     */
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
