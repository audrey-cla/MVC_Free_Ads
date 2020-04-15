@extends('layouts.master')

@section('title', 'Update Annonce')

@section('navbar')
@parent

<div class="ml-auto"> <a href="/logout">log out</a></div>
@stop

@section('sidebar')
@parent
<a href="/annonces/user/{{ Auth::user()->id }}">vos annonces crées</a>
<br>
<a href="/update/{{Auth::user()->id}}">Modifier votre profil</a>
@stop



@section('content')
@if(count($errors) > 0 )
    
    @foreach($errors->all() as $error)
    <p>{{ $error }}</p>
    @endforeach

@endif

@foreach($annonces as $annonce)


<form method="POST" action="{{$annonce['id']}}/done" enctype="multipart/form-data">
    @csrf
    <input class="form-control" type="hidden" name="id" value="{{$annonce['id']}}">
    <div class="form-group"><label for="titre">titre</label><input class="form-control" value="{{$annonce['titre']}}" type="texte" name="titre" id=""></div>
    <div class="form-group"><label for="description">description</label><input class="form-control" value="{{$annonce['description']}}" type="text" name="description" id=""></div>
    <div class="form-group"><label for="prix">prix</label><input class="form-control" value="{{$annonce['prix']}}" type="text" name="prix" id=""></div>
    <div class="form-group"><label for="couleur">couleur</label><input class="form-control" value="{{$annonce['couleur']}}" type="text" name="couleur" id=""></div>
    <div class="form-group"><label for="ville">ville</label><input class="form-control" value="{{$annonce['ville']}}" type="text" name="ville" id=""></div>
    <div class="form-group"><label for="gouts">gouts</label><input class="form-control" value="{{$annonce['gouts']}}" type="text" name="gouts" id=""></div>
    <div class="form-group"><label for="photo"></label><input  value="{{$annonce['photo']}}" type="file" name="photo"></div>
    <button class="btn btn-primary" type="submit">Submit</button>

</form>

@endforeach
@stop