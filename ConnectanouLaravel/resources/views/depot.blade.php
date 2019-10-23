{{-- héritage de la view layouts/app.blade.php --}}
@extends('layouts.app')

@section('extra-js')
    {!! NoCaptcha::renderJs() !!}
@endsection

@section('content')

    <div class="container">
            @if (session()->has('success'))
            <div class='alert alert-success'>
                {{session()->get('success')}}
        
            </div>
            
        @endif


    <h1>Dépôt de projet</h1>
    {{-- cette directive blade @if permettra d'afficher le formulaire si aucun message n'a été envoyé --}}
    {{-- @if (!session()->('message') ) --}}
    <form action="{{ route('depot.create') }}" method="POST">
        {{-- token csrf pour se prévenir contre la faille d'authification web--}}
        {{-- permet de vérifier que la personne qui fait les actions est authentifiée --}}

        @csrf

        {{-- @error('pseudo')is-invalid @enderror permet de mettre un visuel sur une erreur et avec le  class="invalid-feedback" nous permet de mettre un message personalisé--}}
        <div class="form-group" >
        <label for="titre_projet">Titre du projet *</label>
        <input type="text" class="form-control @error('titre_projet')is-invalid @enderror" name="titre_projet" placeholder="Nom de votre projet" value="{{old('titre_projet') }}">
            @error('titre_projet')
                <div class="invalid-feedback">
                    Ce champ est requis !
                </div>
            @enderror
        </div>
        <div class="form-group">
            <label for="date_butor_projet">date_butor_projet*</label>
            <input type="date" class="form-control @error('date_butor_projet')is-invalid @enderror" name="date_butor_projet" placeholder="Le délai de votre projet"value="{{old('date_butor_projet') }}">
            @error('date_butor_projet')
            <div class="invalid-feedback">
                    Ce champ est requis !
            </div>
            @enderror
        </div>
        <div class="form-group">
                <label for="date_debut">date debut *</label>
                <input type="date" class="form-control @error('date_debut')is-invalid @enderror" name="date_debut" placeholder="Votre budget mini"value="{{old('date_debut') }}">
                @error('date_debut')
                <div class="invalid-feedback">
                        Ce champ est requis !
                </div>
                @enderror
            </div>
            {{-- <div class="form-group">
                    <label for="budget_max">Budget maximum *</label>
                    <input type="float" class="form-control @error('Budget_max')is-invalid @enderror" name="Budget_max" placeholder="Votre budget max"value="{{old('Budget_max') }}">
                    @error('Budget_max')
                    <div class="invalid-feedback">
                            Ce champ est requis !
                    </div>
                    @enderror
            </div> --}}
        <div class="form-group">
        <label for="desc_projet">Description *</label>
        <textarea name="desc_projet"  cols="30" rows="10" class="form-control @error('desc_projet')is-invalid @enderror" placeholder="La description de votre projet">{{old('desc_projet')}}</textarea>
            @error('desc_ptojet')
            <div class="invalid-feedback">
                    Ce champ est requis !
            </div>
            @enderror
        </div>
        <div class="form-group">
            {!! NoCaptcha::display() !!}
            @if ($errors->has('g-recaptcha-response'))
                <span class="help-block">
                    <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                </span>
            @endif
        </div>
        <div style="font-size:10px;">Les champs marqués d'une * sont obligatoires </div>
        <hr>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form> 
    {{-- @endif --}}
</div>
@endsection