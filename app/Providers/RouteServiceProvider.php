<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

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
    //Namespace of controllers which handle's front end processing
    protected $frontend_namespace = 'App\Http\Controllers\Frontend';
    //Namespace of controllers which handle's back end processing
    protected $backend_namespace = 'App\Http\Controllers\Backend';
    //Namespace of controllers which handle's back end processing
    protected $api_namespace = 'App\Http\Controllers\API';
    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapAdminRoutes();
        $this->mapWebRoutes();
        $this->mapfrontRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/frontend/web.php'));
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * These routes just for Backend operations
     * And Controlled by App\Http\Controllers\Backend
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->prefix('back_end')
            ->namespace($this->backend_namespace)
            ->group(base_path('routes/admin.php'));
    }

    /**
     * Define the "front end" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * These routes just for front end operations
     * And Controlled by App\Http\Controllers\Frontend
     * @return void
     */
    protected function mapfrontRoutes()
    {
        Route::middleware('web')
            ->namespace($this->frontend_namespace)
            ->group(base_path('routes/frontend/front.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->api_namespace)
            ->group(base_path('routes/api.php'));
    }
}
