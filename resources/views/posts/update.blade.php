@extends('layouts.layout')

@section('titlePage')
    Ajout
@endsection
@section('content')
    <div class="row my-2">
        <div class="col-12">
            <a href="/posts" class="btn btn-info">Retour a la liste des articles</a>
        </div>
    </div>
    <h1>Modification de l'article n° {{$post->id}}</h1>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p class="mb-0" style="color: red">{{$error}}</p>
        @endforeach
    @endif
    <div class="row">
        <div class="col-6">
            <form action="{{route('updatePost', $post->id)}}" method="POST">
                @csrf
                @method('PUT')
                <label class="d-block">Titre</label>
                <input type="text" name="title" id="" required value="{{$post->title}}">
                <label for="" class="d-block">Contenu de l'article</label>
                <textarea name="description" id="" cols="30" rows="10" required>{{$post->description}}</textarea>
                <label class="d-block" for="">Résumé</label>
                <textarea name="extrait" id="" cols="30" rows="10" required>{{$post->extrait}}</textarea>
                <button class="btn btn-warning btn-lg" value="submit">Modifier</button>
            </form>
        </div>
        <div class="col-6">
            <form action="{{route('updatePicturePost', $post->id)}}" method="POST" enctype="multipart/form-data">
                <img src="{{asset("storage/$post->picture")}}" alt="ImgPost" style="width: 100px;">
                <label class="d-block" for="">Image</label>
                <input type="file" name="picture" id="" accept="image/*">
                <button class="btn btn-success">Modifier image</button>
            </form>
        </div>
    </div>
@endsection