@extends('layouts.app')
@section('content')

<form action="{{url('/flyers')}}" method="POST" role="form" enctype="multipart/form-data" >
    @include('flyers.partials.form')

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
</form>

@endsection
