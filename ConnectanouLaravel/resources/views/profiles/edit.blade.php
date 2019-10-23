@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Modifier mes informations</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('profiles.update',['user'=>$user]) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                        <div class="form-group ">
                            <label for="title" >Titre</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}"  autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="description" >Description</label>
                            <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value=""  autocomplete="description" autofocus>{{ old('description') ?? $user->profile->description }}</textarea>
    
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group ">
                            <label for="link" >URL</label>
                            <input id="link" type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') ?? $user->profile->link  }}"  autocomplete="link" autofocus>
        
                            @error('link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="image" class="custom-file-input @error('image') is-invalid @enderror" id="validatedCustomFile" >
                                <label class="custom-file-label" for="validatedCustomFile">Choisr une image</label>
                                @error('image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Modifier mes informations
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
