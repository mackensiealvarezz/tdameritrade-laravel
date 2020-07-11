<?php

namespace Mackensiealvarezz\Tdameritrade\Facades;

use Illuminate\Support\Facades\Facade;

class TdameritradeFacades extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'tdameritrade';
    }
}
