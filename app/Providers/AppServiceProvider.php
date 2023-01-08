<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PhpParser\Node\Stmt\Foreach_;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
       

        Gate::define('admin', function($user) {
            foreach($user->roles as $role){
                if($role->name=='admin') {
                    return true;
                }   
            }
            return false;
        });
    }
}
