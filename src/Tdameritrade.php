<?php


namespace Mackensiealvarezz\Tdameritrade;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Mackensiealvarezz\Tdameritrade\Api\Accounts;

class Tdameritrade
{
    const BASE_URL = "https://api.tdameritrade.com";
    const API_VER = "v1";

    private $access_token;
    private $refresh_token;

    public function  __construct($access_token = null, $refresh_token = null)
    {
        $this->access_token = $access_token;
        $this->refresh_token = $refresh_token;
    }

    public static function create($access_token = null, $refresh_token = null)
    {
        return new static($access_token, $refresh_token);
    }

    public static function generateOAuth()
    {
        return "https://auth.tdameritrade.com/auth?response_type=code&redirect_uri=" . config('tdameritrade.callback') . "&client_id=" . config('tdameritrade.key') . "%40AMER.OAUTHAP";
    }

    public static function redirectOAuth()
    {
        return redirect(static::generateOAuth());
    }

    public function refreshToken()
    {
        $body = [
            'grant_type' => "refresh_token",
            'access_type' => 'offline',
            'client_id' => config('tdameritrade.key'),
            'refresh_token' => $this->refresh_token
        ];

        return static::post('/oauth2/token', [
            'form_params' => $body
        ]);
    }

    public static function createAccessToken(string $code = null)
    {
        $body = [
            'grant_type' => 'authorization_code',
            'access_type' => 'offline',
            'client_id' => config('tdameritrade.key'),
            'redirect_uri' => config('tdameritrade.callback'),
            'code'  => $code
        ];

        return static::post('/oauth2/token', [
            'form_params' => $body
        ]);
    }

    public static function post(string $path, array $data = [])
    {
        $client = new Client([
            'base_uri' => SELF::BASE_URL
        ]);

        try {
            $res = $client->request('post', SELF::API_VER . $path, $data);
            return json_decode($res->getBody(), true);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function postWithAuth(string $path, array $data = [])
    {
        $client = new Client([
            'base_uri' => SELF::BASE_URL,
            'headers'  => ['Authorization' => 'Bearer ' . $this->access_token]
        ]);

        try {
            $res = $client->request('post', SELF::API_VER . $path, $data);
            return json_decode($res->getBody(), true);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function getWithAuth(string $path, array $data = [])
    {
        $client = new Client([
            'base_uri' => SELF::BASE_URL,
            'headers'  => ['Authorization' => 'Bearer ' . $this->access_token]
        ]);

        try {
            $res = $client->request('get', SELF::API_VER . $path, $data);
            return json_decode($res->getBody(), true);
        } catch (GuzzleException $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function __call($method, $parameters)
    {
        $class =  static::getNamespace() . ucfirst($method);
        return new $class($this);
    }

    public static function getNamespace()
    {
        return __NAMESPACE__ . '\\Api\\';
    }
}
