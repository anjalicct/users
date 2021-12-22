<?php

namespace Anjalicct\User;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Http\FormRequest;

class UserServiceProvider extends ServiceProvider
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
        $this->loadRoutesFrom(__DIR__.'/routes/users.php');

        $this->loadViewsFrom(__DIR__.'/views', 'users');

        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

         $this->publishes([__DIR__.'/public' => public_path('/'),
        ], 'asset');

        $this->publishes([__DIR__.'/routes/users.php' => resource_path('routes/users.php'),
        ], 'routes');
        
        $this->publishes([
            __DIR__.'/views' => resource_path('views/userpkg/'),
        ],'views');

        $this->publishes([__DIR__.'/database/migrations' => 'database/migrations/'], 'migration');

        $this->publishes([__DIR__.'/controllers' => 'app/http/controllers/',
        ], 'controller');

        $this->publishes([__DIR__.'/models' => 'app/Models/',
        ], 'models');
    }
}
