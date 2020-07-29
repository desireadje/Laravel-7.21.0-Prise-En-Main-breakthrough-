<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $user_nav = 'active';

        return view('admin.users.index')->with('users', $users)
                                        ->with('user_nav', $user_nav);
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
        dd($request->roles);
    }

    /**
     * Supprimez la ressource spécifiée du stockage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
