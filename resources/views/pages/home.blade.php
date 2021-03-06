@extends('layouts.app')
@section('content')
<div class="jumbotron">
      <div class="container">
        <h1>Project Flyer</h1>
        <p>
        This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.
        </p>
        @if (auth()->check())
            <p><a class="btn btn-primary" href="{{url('flyers/create')}}" role="button">Create a Flyer</a></p>
        @else
            <p><a class="btn btn-primary" href="{{url('register')}}" role="button">Sign Up</a></p>
        @endif
      </div>
    </div>
@endsection
