<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Video;
use App\Policies\VideoPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Les politiques d'autorisation de l'application.
     */
    protected $policies = [
        Video::class => VideoPolicy::class,
    ];

    /**
     * Enregistrement des gates.
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('is-admin', function (User $user) {
            return $user->role->id === '1';
        });

        Gate::define('is-enseignant', function (User $user) {
            return $user->role->id === '3';
        });

        Gate::define('is-etudiant', function (User $user) {
            return $user->role->id === '2';
        });
        // Gate::define('manage-videos', function (User $user) {
        //     return $user->role->id === 3;
        // });
        // Gate::define('manage-videos', function ($user) {
        //     return $user->role_id == 1 || $user->role_id == 3; // 1=admin, 2=enseignant
        // });
    }
}

