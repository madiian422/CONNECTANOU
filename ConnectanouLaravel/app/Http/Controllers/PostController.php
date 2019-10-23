<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    // Avec le __construct à partir de maintenant toutes les fonctions qui sont dans le PostController ne seront pas accessible sauf si on est authentifiée

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        // mise en place de la validation pour création de post grâce au helper ' request '
        $data = request()->validate([
            'caption'=> ['required','string'],
            'image'=> ['required','image'],
        ]);

        // Store va permettre à laravel de stocker les fichier dans le dossier storage 

        $imagePath = request('image')->store('uploads','public');
        
        // On indique le chemin complet vers l'image
        $image = Image::make(public_path("/storage/{$imagePath}"))->fit(800,800);
        $image->save();
        // On recupere l'utilisateur connecté à l'aide du helper auth()

        
        auth()->user()->posts()->create([
            'caption'=> $data['caption'],
            'image'=> $imagePath
        ]);

        // redirection vers la page de profile 
        // deuxieme argument une clé user 
        // permettra d'envoyer en parametre l'utilisateur connecté
        return redirect()->route('profiles.show',['user'=>auth()->user()]);
    }

    public function show(Post $post)
    {
        return view('posts.show',compact('post'));
    }

    
}
