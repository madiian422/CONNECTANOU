{{-- héritage de la view layouts/app.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8">
            <img src="{{ asset('storage')."/".$post->image }}" class="w-100" alt="">
            </div>
            <div class="col-4">
            <h3>{{ $post->user->username }}</h3>
            <p>
                {{ $post->caption }}
            </p>
            </div>
        </div>
    </div>
@endsection