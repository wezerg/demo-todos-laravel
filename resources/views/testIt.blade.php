@extends('layouts.layout')

@section('titlePage')
    TestIt
@endsection
@section('content')
    <h1>Page Test</h1>
    @if(sizeof($posts) > 0)      
        @foreach ($posts as $post)
            <div class="row my-2 py-2 px-3" style="background: #e7e7e7">
                <label class="col-12" style="font-weight: 700">Title : {{$post->title}}</label>
                <label class="col-12" style="overflow-wrap: anywhere">{{$post->description}}</label>
            </div>
        @endforeach
    @else
        <p>Il n'y a aucun article</p>
    @endif
@endsection