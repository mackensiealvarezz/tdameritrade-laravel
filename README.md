![Continuous Integration](https://github.com/mackensiealvarezz/tdameritrade-laravel/workflows/Continuous%20Integration/badge.svg?branch=master)
# TD Ameritrade API for Laravel

This package is a wrapper for the TD Ameritrade API. You will need a [developer account](https://developer.tdameritrade.com/) to use this API.

# Installing

## 1 . install the package via composer:
```
composer require mackensiealvarezz/tdameritrade-laravel
```
## 2. Publish Config
```
php artisan vendor:publish
```

## 3. Set ENV Variables
Include these two variables inside of your .env
```
// .env
TD_KEY="YOUR_KEY"
TD_CALLBACK="CALLBACK"
```

## 4. Include Package
When using the package, don't forget to include It on top of the file

    use Mackensiealvarezz\Tdameritrade\Tdameritrade;

# OAuth

To use the API, the must have an access_token.  You can easily create an access token using the redirect function.

## Creating OAuth URL
To create a OAuth URL, you will need to use: 

     Tdameritrade::redirectOAuth(); // will return string (url)
**It is important that you create a callback route for the URL you set inside of the .env**

## Refresh Token
To refresh the token and create another access_token.

    //Create client 
    $client =  new Tdameritrade('access_token', 'refresh_token');
    //Refresh token
    $response = $client->refreshToken();

# Usage

The package is written to use every class inside of **/src/api** as a function. 

## Accounts

### List accounts 

This will return a list of all the accounts
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
$accounts = $client->accounts()->list();
```

### Get account

This will return all the information for one account. **Requires account_id**
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
$accounts = $client->accounts()->get('account_id');
```

## Instruments

### Search 

This will return a list of tickers based on the symbol entered
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
//Response
$response = $client->instruments()->search('TESLA');
```

### Get

This wil return one ticker information
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
//Response
$accounts = $client->instruments()->get('TSLA');
```

## Market Hours

### List 

This will return a list of all the different market hours
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
//Response
$response = $client->market()->list();
```

### Get

This wil return one market information
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
//Response
$response = $client->market()->get('SPY.X');
```


## Movers

### Get

This wil return a list of symbols that are moving
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
//Response
$response = $client->movers()->get('SPY.X', 'up', 'percent');
```

## Price

### History 

This will return a list of quotes for the ticker
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
//Response
$response = $client->price()->history('TSLA', Carbon::now(), Carbon::now());
```

### Get Quote

This wil return the quote for one ticker
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
//Response
$response = $client->price()->quote('TSLA');
```

### Get Quotes

This wil return the quote for multiple tickers
```
//Create client
$client =  new Tdameritrade('access_token', 'refresh_token');
//Response
$response = $client->price()->quotes(['AAPL', 'FB']);
```

## License

 
The MIT License (MIT). Please see [MIT license](http://opensource.org/licenses/MIT) for more information.
