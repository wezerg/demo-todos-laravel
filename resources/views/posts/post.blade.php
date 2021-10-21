@extends('layouts.layout')

@section('titlePage')
    Détails
@endsection
@section('content')
    <div class="row my-2">
        <div class="col-12">
            <a href="/posts" class="btn btn-info">Retour a la liste des articles</a>
        </div>
    </div>
    @if($post)
        <h1>Détails de l'article n° {{$post->id}}</h1>
        <div class="row my-2 py-2 px-3" style="background: #e7e7e7">
            <div class="col-12">
                <label class="d-block" style="font-weight: 700">Title : {{$post->title}}</label>
                <label class="d-block" style="overflow-wrap: anywhere">{{$post->description}}</label>
                <img src="{{asset("storage/$post->picture")}}" alt="ImgPost" style="width: 100px;">
            </div>
            <div class="col-6">
                <a class="btn btn-warning my-2" href="{{route('updatePost', $post->id)}}">Modifier article</a>
            </div>
            <div class="col-6 text-end">
                <form method="post" action="{{route('removePost', $post->id)}}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger my-2" href="{{route('removePost', $post->id)}}">Supprimer article</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <h2>Commentaires</h2>
                <p>Nombre de commentaire : {{sizeof($post->getComments)}}</p>
                @foreach ($post->getComments as $comment)
                    <p>{{$comment->content}}</p>
                @endforeach
            </div>
        </div>
    @else
        <p>Il n'y a aucun article</p>
    @endif
@endsection