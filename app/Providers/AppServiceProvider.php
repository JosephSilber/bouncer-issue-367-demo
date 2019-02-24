<?php

namespace App\Providers;

use Bouncer;
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
        Bouncer::cache();
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Bouncer::useUserModel(\App\User::class);
        Bouncer::runAfterPolicies();

        Bouncer::scope()
            ->onlyRelations()
            ->dontScopeRoleAbilities()
            // For the demo, let's hard-code it as 1. Shouldn't matter.
            ->to(1);
    }
}
