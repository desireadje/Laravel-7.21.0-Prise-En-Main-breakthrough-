<?php

use Illuminate\Support\Facades\Route;

/**
 * --------------------------------------------------------------------------
 * Web Routes
 * --------------------------------------------------------------------------
 *
 * C'est ici que vous pouvez enregistrer des itinéraires Web pour votre application.
 * Ces routes sont chargées par RouteServiceProvider au sein d'un groupe qui contient le groupe middleware "web".
 * Maintenant, créez quelque chose de génial!
 */

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function() {
    Route::resource('users', 'UsersController');
    Route::resource('categories', 'CategorieController');
    Route::resource('roles', 'RolesController');
    Route::resource('postes', 'RolesController');
});

// Route de la liste des roles
// Route::group([
//     'prefix' => 'admin'
// ], function () {
//     Route::get('roles', 'RolesController@index');

// });

// Route de la liste des roles
// Route::get('/admin/role', 'RolesController@index')->name('admin/role');
// Route::get('/admin/categorie', 'CategorieController@index')->name('admin/categorie');
// Route::get('/admin/categorie/create', 'CategorieController@create')->name('admin/categorie/create');

Route::get('/admin/postes', 'PosteController@index')->name('admin/postes');
