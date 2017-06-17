@extends('base')

@section('body')

    <h1>Uploader une image</h1>

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

@endsection