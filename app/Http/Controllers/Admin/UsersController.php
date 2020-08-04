<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class UsersController extends Controller
{
    /**
     * Créer une nouvelle instance de contrôleur.
     *
     * Ce controller est accessible uniquement en
     * se connctant.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Affichez une liste de la ressource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user());
        $users = User::all();

        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Afficher le formulaire de création d'une nouvelle ressource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Stockez une ressource nouvellement créée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Affichez la ressource spécifiée.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Afficher le formulaire pour modifier la ressource spécifiée.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // denies : Non autorisé, il arrete tous
        if (Gate::denies('edit-users')) {
            // L'utilisateur connecté ne peut pas faire de modification
            return redirect()->route('admin.users.index');
        }

        // Récupération de la liste des roles
        $roles = Role::all();
        // dd($user->roles); // Role de l'utilisateur

        $data = array(
            'user' => $user,
            'roles' => $roles,
            $user_nav = 'active'
        );

        return view('admin.users.edit', $data);
    }

    /**
     * Mettez à jour la ressource spécifiée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Je fais la synchronisation
        $user->roles()->sync($request->roles);

        // Je fais la redirection vers la liste des uers
        return redirect()->route('admin.users.index');
    }

    /**
     * Supprimez la ressource spécifiée du stockage.
     *
     * Avant toute suppresion de users, je vais tous
     * d'abord retirer les relation qui existe entre
     * le user et ses roles puis on supprime.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // denies : Non autorisé, il arrete tous
        if (Gate::denies('delete-users')) {
            // L'utilisateur connecté ne peut pas faire de modification
            return redirect()->route('admin.users.index');
        }

        exit('okkokk');
        dd($user);
    }
}
