<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
//<<<<<<< HEAD
        // if ($this->app->environment() == 'local') {
        // $this->app->register('Iber\Generator\ModelGeneratorProvider');
   // }
//=======
  //      if ($this->app->environment() == 'local') {
    //    $this->app->register('Iber\Generator\ModelGeneratorProvider');
   // }
//>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
    }
}
