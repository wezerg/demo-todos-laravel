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
    <h1>Ajout d'un article</h1>
    @if($errors->any())
        @foreach ($errors->all() as $error)
            <p class="mb-0" style="color: red">{{$error}}</p>
        @endforeach
    @endif
    <div class="row">
        <form action="{{route('insertPost')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-12">
                <label class="d-block">Titre</label>
                <input type="text" name="title" id="" required>
            </div>
            <div class="col-12">
                <label for="" class="d-block">Contenu de l'article</label>
                <textarea name="description" id="" cols="30" rows="10" required></textarea>
            </div>
            <div class="col-12">
                <label class="d-block" for="">Résumé</label>
                <textarea name="extrait" id="" cols="30" rows="10" required></textarea>
            </div>
            <div class="col-12">
                <label for="" class="d-block">Mon image</label>
                <input type="file" name="picture" id="" accept="image/*" required>
            </div>
            <div class="col-12 my-2">
                <button class="btn btn-success" value="submit">Soumettre formulaire</button>
            </div>
        </form>
    </div>
@endsection