<?php
namespace duncanrmorris\profile;

use Illuminate\Support\ServiceProvider;

class ProfileServiceProvider extends ServiceProvider

{
    
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
        $this->loadViewsFrom(__DIR__.'/views','profile');
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        
        
    }

    public function register()
    {
        
    }
}

