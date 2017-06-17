@extends('base')

@section('body')

    <h1>Uploader une image</h1>

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
                @if ($image)
                    {{ var_dump($image) }}
                @else
                    <p><i>Pad d'image</i></p>
                @endif
            </div>
        </div>
    </div>

@endsection