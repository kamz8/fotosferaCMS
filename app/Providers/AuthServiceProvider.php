<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
        $gate->define('superUser', function($user){
            return $user->email == 'admin@admin.com';
        });
        
        $gate->define('admin-access', function($user){
            return $user->role == 'admin';
        });

        $gate->define('moderator-access', function($user){
            if($user->role == 'moderator' || $user->role == 'admin') return true;
              else false;
        });

        $gate->define('normal-access', function($user){
            return !($user->role == 'normal');
        });
        
        $gate->define('active-user', function($user){
            return $user->id === \Auth::user()->id;
        });        
    }
}
