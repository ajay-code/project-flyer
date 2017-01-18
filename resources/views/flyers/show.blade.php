@extends('layouts.app')
@section('links')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" />
@endsection

@section('content')
    <div class="row" >
        <div class="col-md-4">
            <h1>{{$flyer->street}}</h1>
            <h2>{{ $flyer->price }}</h2>
            <hr>
            <div class="description">
                {!!  nl2br($flyer->description) !!}
            </div>
        </div>

        <div class="col-md-8">
            @foreach ($flyer->photos->chunk(4) as $set)
                <div class="row gallary">
                    @foreach($set as $photo)

                        <div class="col-md-3">

                            <form action="{{url('/photos/'.$photo->id)}}" class="rel" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="close close-button" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                            </form>
                            <a href="{{ url($storage . $photo->path) }}" data-lity>
                            <img src="{{ url($storage . $photo->thumbnail_path) }}" class="img-responsive" alt="Responsive image">
                            </a>
                        </div>
                    @endforeach
                </div>
            @endforeach


            <hr>
            @can('addPhoto', $flyer)
                <h2>Add your Photos</h2>
                <form id="addPhotos" action="{{url( $flyer->urlToPostPhotos() )}}"
                                     methos="POST"
                                     class="dropzone">
                    {{ csrf_field() }}
                </form>
            @endcan

        </div>
    </div >




@endsection

@section('scripts.footer')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js" > </script>
    <script>
         Dropzone.options.addPhotos = {
            paramName: 'photo',
            maxFilesize: 3,
            acceptedFiles: '.jpg, .jpeg, .png'
        };
    </script>
@endsection
