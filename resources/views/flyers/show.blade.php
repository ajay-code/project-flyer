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
            @foreach($flyer->photos as $photo)
                <img src="{{ url('../storage/app/'.$photo->path) }}" class="img-responsive" alt="Responsive image">
            @endforeach
        </div>        
    </div >


    <hr>
    <h2>Add your Photos</h2>
    <form id="addPhotos" action="{{url( $flyer->urlToPostPhotos() )}}" methos="POST" class="dropzone">
        {{ csrf_field() }}
    </form>
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