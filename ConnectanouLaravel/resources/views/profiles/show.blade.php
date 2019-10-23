{{-- héritage de la view layouts/app.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4 ">
        <div class="col-4 text-center">
            <img src="{{ $user->profile->getImage() }}" class="rounded-circle" alt="" width="220px;" class="pr-2" height="200px;">
        </div>
        <div class="col-8 pl-5">
            <div class="d-flex  align-items-baseline">
            <div class="mr-4 h4 pt-2">{{ $user->name}}</div>
                {{-- <button class="btn btn-sm btn-primary ">S'abonner</button> --}}
            </div>
            <div class="d-flex mt-3">
            <div class="mr-3"> <strong> {{ $user->posts->count() }}</strong> publication(s)</div>
                {{-- <div class="mr-3"><strong>1 536</strong> abonnés</div>
                <div class="mr-3"><strong>1 </strong>abonnements</div> --}}
            </div>
            @can('update', $user->profile)
                <a href="{{ route('profiles.edit',['username'=>$user->username]) }}" class="btn btn-outline-secondary mt-3">Modifier les informations</a>
            @endcan
            <div class="mt-3">
                <div class="font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <a href="#">{{$user->profile->link}}</a>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        @foreach ( $user->posts as $post )
            <div class="col-4">
                {{-- php artisan storage:link pour lier le dossier storage et le dossier link et pouvoir exploiter le contenu de storage --}}

                {{-- on récupére l'image posté --}}
            <a href="{{ route('posts.show',['post'=>$post->id])}}"><img src="{{ asset('storage').'/'.$post->image}}" class="w-100" alt=""></a>
            </div>
        @endforeach
    </div>
</div>
@endsection

