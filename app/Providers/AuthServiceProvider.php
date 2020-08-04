<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate; //** J'importe la facade pour la création des Gates */

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        /**
         * Création du Gate
         * La gate 'edit-users' permettant de dire si l'utilisateur
         * connecté a le droit de faire une action (ajouter, modifier ou supprimer)
         *
         * La gate retourne le resultat de la fonction isAdmin() dans le controller User
         * permettant de savvoir si l'utilisateur connecté a le role admin
         *
         * $user : l'utilisateur connecté
         * isAdmin() : Retourne un true ou un false
         *
         */
        Gate::define('edit-users', function ($user) {
            return $user->isAdmin();
        });

        Gate::define('delete-users', function ($user) {
            return $user->isAdmin();
        });
    }
}
