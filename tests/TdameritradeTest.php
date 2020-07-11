<?php

namespace Mackensiealvarezz\Tdameritrade\Tests;

use Illuminate\Support\Facades\Config;
use Mackensiealvarezz\Tdameritrade\Tdameritrade;
use Orchestra\Testbench\TestCase;

class TdameritradeTest extends TestCase
{

    /** @test */
    public function it_returns_access_token_and_refresh_token()
    {
        $client  =  Tdameritrade::create('access_token', 'refresh_token');
        $this->assertEquals('access_token', $client->getAccessToken());
        $this->assertEquals('refresh_token', $client->getRefreshToken());
    }

    /** @test */
    public function it_returns_generated_oauth()
    {

        Config::set('tdameritrade.callback', 'callback');
        Config::set('tdameritrade.key', 'key');
        $this->assertEquals(Tdameritrade::generateOAuth(), "https://auth.tdameritrade.com/auth?response_type=code&redirect_uri=" . config('tdameritrade.callback') . "&client_id=" . config('tdameritrade.key') . "%40AMER.OAUTHAP");
    }
}
