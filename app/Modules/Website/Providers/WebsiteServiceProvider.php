<?php

namespace Website\Providers;

use Illuminate\Support\ServiceProvider;

class WebsiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'Website\Http\Interfaces\UserRepositoryInterface',
            'Website\Http\Repositories\UserRepository'
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $ds = DIRECTORY_SEPARATOR;
        $this->loadViewsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'views', 'Website');
        $this->loadTranslationsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'lang', 'Website');
        $this->loadRoutesFrom(__DIR__.$ds.'..'.$ds.'routes'.$ds.'web.php');
    }
}
