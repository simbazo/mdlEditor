<?php

namespace App\Providers;

use App\Models\User;
use App\Events\UserRegistered;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Schema::defaultStringLength(191);
           \Blade::directive('set', function($expression) {
            list($name, $val) = explode(',', $expression);
            return "<?php {$name} = {$val}; ?>";
        });

        User::created(function($user){
           
            $token = $user->activationToken()->create([
                'token' => str_random(128),
                'otp'   => mt_rand(100000, 999999)
                ]);

            event(new UserRegistered($user));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
