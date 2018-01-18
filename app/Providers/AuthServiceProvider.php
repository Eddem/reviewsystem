<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

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
     * Register any authentication / authorization services.
     *
     * @return void
     */
//    public function boot()
//    {
//        $this->registerPolicies();
//
//        //
//    }

    public function boot(GateContract $gate)
    {
        $this->registerPolicies();
        //$this->registerPolicies($gate);

        $gate->define('update-comment', function ($user, $comment) {
            return $user->id === $comment->user_id;
        });
    }
}
