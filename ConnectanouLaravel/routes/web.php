<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Pour voir la liste des routes 
// php artisan route:list

use App\Http\Controllers\CommentController;
use App\Http\Controllers\DepotController;
use App\Http\Controllers\TopicController;
use App\Topic;

Route::get('/', function () {
    return view('welcome');
});

// quand les parametres des routes sont en 'get' on peux raccourcir la syntax comme : "Route::view('contact','contact'); 1er argument de view=le nom de la route et 2eme argument=le raccourci du nom de la page : "contact.blade.php




// définition de la route 'A-propos'
// Route::get('/a-propos', function()
// {
//     return view('a-propos');
// });
Route::view('a-propos','a-propos');
Route::view('realisateur','realisateur');
Route::view('porteur','porteur');


// les routes des clients

//de cette manière si on veux changer le nom de la route par exemple : route::view('a-propos','a-propos'); en => route::view('a-propos-de-nous','a-propos'); on change que l'url et le changement de page ce feras dynamiquement

//ClientsController@list la route '/clients' appelle la fonction 'index' de notre :ClientsController 
// Route::get('clients','ClientsController@index');

//ClientsController@store la route '/clients' appelle la fonction 'store' de notre :ClientsController
// Route::post('clients','ClientsController@store');

// Route::get('clients/create','ClientsController@create');

// Route::get('clients/{client}','ClientsController@show');

// Route::get('clients/{client}/edit','ClientsController@edit');

// Route::patch('clients/{client}','ClientsController@update');

// Route::delete('clients/{client}','ClientsController@destroy');


//Avec le middleware('auth') l'user doit être obligatoirement connecté pour y acceder pour toutes les routes qui concernent "clients"
Route::resource('clients','ClientsController');

//contact
// définition de la route 'contact'
// on peut nommer nos routes à l'aide de ->name('')
Route::get('contact','ContactController@create');
Route::post('contact','ContactController@store');


Route::get('/home', 'HomeController@index')->name('home');


// authentification
Auth::routes();

//Partie forum

//le framework va relier les action et methodes de notre TopicController à certaines routes qui on comme préfixe topics

// la méthode except() permet de ne pas relier certaines routes
//Route::post('topics','TopicController')->except(['index']);

Route::resource('topics', 'TopicController');
// route::get('/','TopicController@index');
// route::get('forum','TopicController@index');

route::post ('/comments/{topic}','CommentController@store')->name('comments.store');


// cette route permet de définir ou l'on posté cette réponse au commentaire en fonction de son id
Route::post('/commentReply/{comment}','CommentController@storeCommentReply')->name('comments.storeReply');


// route pour le dêpot de projets

Route::get('depot','ProjetController@create')->name('depot.create');

Route::post('depot','ProjetController@store');

Route::get('/profiles/{user}','ProfileController@show')->name('profiles.show');


// pour la partie de création de post on a besoin de 2 routes une qui présentera le formulaire et l'autre qui la traitera 
Route::get('/posts/create','PostController@create')->name('posts.create');
Route::post('/posts','PostController@store')->name('posts.store');

// route pour affiche que l'image sur une nouvelle onglet
Route::get('/posts/{post}','PostController@show')->name('posts.show');

// Création de 2 routes pour la modification du profil
// le 1ere pour afficher le formulaire 
Route::get('/profiles/{user}/edit','ProfileController@edit')->name('profiles.edit');
// la seconde pour traiter les informations
Route::patch('/profiles/{user}','ProfileController@update')->name('profiles.update');