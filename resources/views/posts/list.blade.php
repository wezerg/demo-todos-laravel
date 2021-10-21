@extends('layouts.layout')

@section('titlePage')
    Liste
@endsection
@section('content')
    <h1>Liste des articles</h1>
    <a href="/add/post" class="btn btn-success">Créer nouvel article</a>
    @if(sizeof($posts) > 0)
        <div class="row my-2 py-2 px-3 justify-content-center">
            @foreach ($posts as $post)
                <div class="col-3 m-2 card-body" style="background: #e7e7e7">
                    <label style="font-weight: 700">Title : {{$post->title}}</label>
                    <label style="overflow-wrap: anywhere">{{$post->extrait}}</label>
                    <a class="btn btn-info my-2" href="{{route('postDetail', $post->id)}}">Voir l'article</a>
                </div>
            @endforeach
        </div>
    @else
        <p>Il n'y a aucun article</p>
    @endif
@endsection