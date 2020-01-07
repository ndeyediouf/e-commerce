<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
       Gate::define('admin',function(User $user){
        return $user->isAdmin();
       });
       Gate::define('moderator', function(User $user){
           return $user->isModerator();
        });
    }
     

        
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
