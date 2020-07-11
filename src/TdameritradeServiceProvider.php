<?php

namespace Mackensiealvarezz\Tdameritrade;

use illuminate\support\ServiceProvider;

class TdameritradeServiceProvider extends ServiceProvider
{


    //when the application is loaded
    public function boot()
    {
        // publish a config file
        $this->publishes([
            __DIR__ . '/../config/tdameritrade.php' => config_path('tdameritrade.php')
        ]);
    }

    public function register()
    {
        $this->app->bind('tdameritrade', function () {
            return new Tdameritrade();
        });

        $this->mergeConfigFrom(__DIR__ . '/../config/tdameritrade.php', 'tdameritrade');
    }
}
