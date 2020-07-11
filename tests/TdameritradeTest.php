<?php

namespace Mackensiealvarezz\Tdameritrade\Tests;

use Illuminate\Support\Facades\Config;
use Mackensiealvarezz\Tdameritrade\Api\Accounts;
use Mackensiealvarezz\Tdameritrade\Api\Instruments;
use Mackensiealvarezz\Tdameritrade\Api\Market;
use Mackensiealvarezz\Tdameritrade\Api\Movers;
use Mackensiealvarezz\Tdameritrade\Api\Options;
use Mackensiealvarezz\Tdameritrade\Api\Orders;
use Mackensiealvarezz\Tdameritrade\Api\Price;
use Mackensiealvarezz\Tdameritrade\Api\Transactions;
use Mackensiealvarezz\Tdameritrade\Tdameritrade;
use Orchestra\Testbench\TestCase;

class TdameritradeTest extends TestCase
{
    public function testReturnsAccessToken()
    {

        $client = new Tdameritrade('access_token', 'refresh_token');
        $this->assertEquals('access_token', $client->getAccessToken());
        $this->assertEquals('refresh_token', $client->getRefreshToken());
    }

    public function testReturnsOAuth()
    {

        Config::set('tdameritrade.callback', 'callback');
        Config::set('tdameritrade.key', 'key');
        $this->assertEquals(Tdameritrade::generateOAuth(), "https://auth.tdameritrade.com/auth?response_type=code&redirect_uri=" . config('tdameritrade.callback') . "&client_id=" . config('tdameritrade.key') . "%40AMER.OAUTHAP");
    }

    public function testReturnsInstruments()
    {
        $client = new Tdameritrade('access_token', 'refresh_token');
        $this->assertInstanceOf(Instruments::class, $client->instruments());
    }

    public function testReturnsMakert()
    {
        $client = new Tdameritrade('access_token', 'refresh_token');
        $this->assertInstanceOf(Market::class, $client->makert());
    }

    public function testReturnsMovers()
    {
        $client = new Tdameritrade('access_token', 'refresh_token');
        $this->assertInstanceOf(Movers::class, $client->movers());
    }

    public function testReturnsOrders()
    {
        $client = new Tdameritrade('access_token', 'refresh_token');
        $this->assertInstanceOf(Orders::class, $client->orders());
    }

    public function testReturnsPrice()
    {
        $client = new Tdameritrade('access_token', 'refresh_token');
        $this->assertInstanceOf(Price::class, $client->price());
    }

    public function testReturnsTransactions()
    {
        $client = new Tdameritrade('access_token', 'refresh_token');
        $this->assertInstanceOf(Transactions::class, $client->transactions());
    }
}
