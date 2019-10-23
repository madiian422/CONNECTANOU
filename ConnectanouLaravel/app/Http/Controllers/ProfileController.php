<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    public function show(User $user)
    {
       // On demande à eloquent de faire une requete et de rechercher l'utilisateur qui correspond à l'id passé en paramétre
    //    $user = User::find($username);

    //    dd($username);
        return view('profiles.show',[
            'user'=> $user,
        ]);


    }

    public function edit(User $user)
    {
        $this->authorize('update',$user->profile);

        return view('profiles.edit',compact('user'));
    }

    public function update(User $user)
    {
        $this->authorize('update',$user->profile);

        $data = request()->validate([
            'title'=>'required',
            'description'=>'required',
            'link'=>'required|url',
            'image'=>'sometimes|image|max:3000'
        ]);

        if(request('image')){
            // Store va permettre à laravel de stocker les fichier dans le dossier storage 

            $imagePath = request('image')->store('avatars','public');
            
            // On indique le chemin complet vers l'image
            $image = Image::make(public_path("/storage/{$imagePath}"))->fit(600,600);
            $image->save();
            // On recupere l'utilisateur connecté à l'aide du helper auth()

            auth()->user()->profile->update(array_merge(
                $data,
                ['image' => $imagePath]
            ));
        } else {
            auth()->user()->profile->update($data);
        }

        

        return redirect()->route('profiles.show',['user'=> $user]);
    }
}
