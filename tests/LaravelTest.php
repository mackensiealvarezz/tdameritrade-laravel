<?

namespace Mackensiealvarezz\Tdameritrade\Tests;

use Orchestra\Testbench\TestCase;
use Mackensiealvarezz\Tdameritrade\TdameritradeServiceProvider;

class LaravelTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            TdameritradeServiceProvider::class,
        ];
    }
}
