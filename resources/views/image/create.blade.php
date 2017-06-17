@extends('base')

@section('body')

    <h1>Uploader une image</h1>

    @if(session()->has('message'))
        <div class="alert alert-danger">{{ session('message') }}</div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <form action="/" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="file">Fichier image</label>
                    <input type="file" class="form-control" id="file" name="file">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Envoyer l'image</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="well">
                @if(count($images) != 0)
                    @foreach($images as $image)
                        {{ $image->name }}
                    @endforeach
                @else
                    <p><i>Pas d'image</i></p>
                @endif
            </div>
        </div>
    </div>

@endsection