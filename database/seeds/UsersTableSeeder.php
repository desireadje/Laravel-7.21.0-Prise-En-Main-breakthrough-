<?php

use App\User;
use App\Role;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Exécutez les seeds de la base de données.
     *
     * @return void
     */
    public function run()
    {
        // Je vide les tables users et role_user
        User::truncate();
        DB::table('role_user')->truncate();

        // creation de l'admin
        $admin = User::create([
            'name' => 'Admin',
            'email' =>  'admin@admin.com',
            'password'  =>  Hash::make('Admin@2018')
        ]);

        // creation de l'auteur
        $auteur = User::create([
            'name' => 'Auteur',
            'email' =>  'auteur@auteur.com',
            'password'  =>  Hash::make('Admin@2018')
        ]);

        // creation de l'utilisateur
        $utilisateur = User::create([
            'name' => 'Utilisateur',
            'email' =>  'utilisateur@utilisateur.com',
            'password'  =>  Hash::make('Admin@2018')
        ]);

        // Je selectionne les différents roles admin, auteur et utilisateur
        $adminRole = Role::where('name', 'admin')->first();
        $auteurRole = Role::where('name', 'auteur')->first();
        $utilisateurRole = Role::where('name', 'utilisateur')->first();

        // Je mappes les différents roles aux utilisateurs crées
        $admin->roles()->attach($adminRole);
        $auteur->roles()->attach($auteurRole);
        $utilisateur->roles()->attach($utilisateurRole);
    }
}
