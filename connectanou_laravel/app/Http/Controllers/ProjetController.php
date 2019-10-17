<?php

namespace App\Http\Controllers;

use App\Projet;
use App\DepotProjet;
use Illuminate\Http\Request;
use App\Http\Requests\ProjetStore;

class ProjetController extends Controller
{

    // public function __construct()

    // {
    //     $this->middleware('auth');
    // }

    public function create()
    {
       return view('depot');
    }

    public function store(ProjetStore $request)
    {
        $validation = $request->validated();

        $add = new Projet();
        $add->titre_projet = $validation['titre_projet'];
        $add->delai = $validation['date_butor_projet'];
        $add->description = $validation['desc_projet'];
        $add->date_debut = $validation['date_debut'];

        $add->save();
        return redirect()->route('welcome')->with('success','Votre annonce à été posté!');
        // request()->validate([
        //     'c'=>'required',
        //     'delai'=>'required|email',
        //     'budget_min'=>'required',
        //     'budget_max'=>'required',
        //     'description'=>'required',
        //     // 'g-recaptcha-response' => 'required|captcha'
        // ]);

        // $projet = auth()->user()->topics()->create([
        //     'titre_projet'=> request('titre_projet'),
        //     'delai'=>request('delai'),
        //     'budget_min'=>request('budget_min'),
        //     'budget_max'=>request('budget_max'),
        //     'description'=>request('description'),
        // ]);
        // return redirect()->route('layouts.app',$projet->id);
        // // la methode send() prend une nouvelle instance de notre contactMail
        // Mail::to('test@test.com')->send(new ContactMail([

        //     'name'=>request('name'),
        //     'email'=>request('email'),
        //     'message'=>request('message')
        // ]));
        
        // //la methode flash() avec comme clé 'message' et le contenu du message
        //  session()->flash('message','Votre message à été bien envoyé!');

        return redirect('depot');
    }
}

