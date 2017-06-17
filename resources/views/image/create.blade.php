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
        <div class="col-lg-2">
            <a id="refresh" href="#" class="btn btn-default">Rafraichir si une image s'affiche mal</a>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="well">
                <div id="accordion" role="tablist" aria-multiselectable="true">
                    @if(count($images) != 0)
                        @foreach($images as $image)
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h5 class="mb-0">
                                        <a data-toggle="collapse" data-parent="#accordion"
                                           href="#{{ basename($image->name, '.jpg') }}" aria-expanded="false"
                                           aria-controls="collapseOne">
                                            {{ basename($image->name, '.jpg') }}
                                        </a>
                                    </h5>
                                </div>
                                <div id="{{ basename($image->name, '.jpg') }}" class="collapse show" role="tabpanel"
                                     aria-labelledby="headingOne">
                                    <div class="card-block">
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <img class="d-block img-fluid"
                                                         src="{{ asset('uploads/' . basename($image->name, '.jpg') . "_150x150.jpg") }}"
                                                         alt="First slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid"
                                                         src="{{ asset('uploads/' . basename($image->name, '.jpg') . "_500x500.jpg") }}"
                                                         alt="Second slide">
                                                </div>
                                                <div class="carousel-item">
                                                    <img class="d-block img-fluid"
                                                         src="{{ asset('uploads/' . basename($image->name, '.jpg') . "_1000x1000.jpg") }}"
                                                         alt="Third slide">
                                                </div>
                                            </div>
                                            <a class="carousel-control-prev" href="#carouselExampleIndicators"
                                               role="button" data-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                            <a class="carousel-control-next" href="#carouselExampleIndicators"
                                               role="button" data-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <p><i>Pas d'image</i></p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        (function($) {
            $('#refresh').on('click', function (e) {
               e.preventDefault();
               location.reload();
            });
        })(jQuery);
    </script>
@endsection