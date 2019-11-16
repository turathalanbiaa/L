<?php

namespace LecturerControlPanel\Providers;

use Illuminate\Support\ServiceProvider;

class LecturerControlPanelServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $ds = DIRECTORY_SEPARATOR;
        $moduleName = 'LCP';
        $this->loadViewsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'views', $moduleName);
        $this->loadTranslationsFrom(__DIR__.$ds.'..'.$ds.'resources'.$ds.'lang', $moduleName);
        $this->loadRoutesFrom(__DIR__.$ds.'..'.$ds.'routes'.$ds.'web.php');
    }
}
