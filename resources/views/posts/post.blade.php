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
                    <button class="btn btn-danger my-2">Supprimer article</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <form class="d-flex justify-content-between" action="{{route('insertComment', $post->id)}}" method="POST">
                    @csrf
                    <div>
                        <label for="" class="d-block mb-2">Ajouter un commentaire</label>
                        <input type="text" name="content" id="" required>
                    </div>
                    <button class="btn btn-success" value="submit">Créer</button>
                </form>
            </div>
            <div class="col-12">
                <h2>Commentaires</h2>
                <p>Nombre de commentaire(s) : {{sizeof($post->getComments)}}</p>
            </div>
            @foreach ($post->getComments as $comment)
                <div class="col-12 d-flex p-3 justify-content-between" style="background: rgba( 231, 231, 231 , 0.5)">
                    <p class="my-auto">{{$comment->content}}</p>
                    <form action="{{route('removeComment', $comment->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            @endforeach
        </div>
    @else
        <p>Il n'y a aucun article</p>
    @endif
@endsection