<?php

namespace App\Http\Controllers\Admin;

use App\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategorieController extends Controller
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
        // Je recupere la liste des categories
        $categeries = Categorie::all()->where('etat', '<> -1');

        return view('admin.categories.index')->with('categeries', $categeries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Affichage du formulaire de creation
        return view('admin.categories.create');
    }

    /**
     * Stockez une ressource nouvellement créée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name_cat' => 'required|unique:categories|max:255'
        ]);

        $options = $request->except('_token');
        $options['etat'] = 1;

        $save = Categorie::create($options);

        return redirect()->route('admin.categories.index')
                         ->with(
                             'set_flashdata',
                             '<div class="alert alert-success"><strong>Succès !</strong> Catégorie ajouté.</div>'
                            );
    }

    /**
     * Affichez la ressource spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categorie = Categorie::findOrFail($id);
    }

    /**
     * Afficher le formulaire pour modifier la ressource spécifiée.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorie = Categorie::findOrFail($id);
    }

    /**
     * Mettez à jour la ressource spécifiée dans le stockage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categorie = Categorie::findOrFail($id);
        $input = Request::all();
        $categorie->update($input);

        return redirect('admin.categories.index');
    }

    /**
     * Supprimez la ressource spécifiée du stockage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect('admin.categories.index');
    }
}
