<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';
    protected $namespaceA = 'App\Http\Controllers\Admin';
    protected $namespaceMA = 'App\Http\Controllers\MerchantAdmin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapDviceRoutes();
        $this->mapUserRoutes();

        $this->mapWebRoutes();

        $this->mapAdminRoutes();

        $this->mapMerchantAdminRoutes();

        //
    }

    protected function mapDviceRoutes()
    {
        Route::prefix('api/dvice')
             ->middleware('api')
             ->group(base_path('routes/api/dvice.php'));
    }
    protected function mapUserRoutes()
    {
        Route::prefix('api/user')
            ->middleware('api')
            ->group(base_path('routes/api/user.php'));
    }

    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    protected function mapAdminRoutes()
    {
      Route::prefix('cp')->middleware('admin')
         ->namespace($this->namespaceA)
         ->group(base_path('routes/superadmin.php'));
    }

    protected function mapMerchantAdminRoutes()
    {
      Route::prefix('mcp')->middleware('madmin')
         ->namespace($this->namespaceMA)
         ->group(base_path('routes/merchantadmin.php'));
    }


}
