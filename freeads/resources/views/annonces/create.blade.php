@extends('layouts.master')

@section('title', 'Create')

@section('navbar')
@parent

<div class="ml-auto"> <a href="/logout">log out</a></div>
@stop

@section('sidebar')
@parent
<br><a href="/annonces/user/{{ Auth::user()->id }}">vos annonces crées</a>
<br><a href="/update/{{Auth::user()->id}}">Modifier votre profil</a>
@stop




@section('content')

@if(count($errors) > 0 )

@foreach($errors->all() as $error)
<p>{{ $error }}</p>
@endforeach

@endif

<form method="POST" action="{{ route('store.annonces') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group"><label for="titre">titre</label><input class="form-control" value="" type="texte" name="titre" id=""></div>
    <div class="form-group"><label for="description">description</label><input class="form-control" value="" type="text" name="description" id=""></div>
    <div class="form-group"><label for="prix">prix</label><input class="form-control" value="" type="text" name="prix" id=""></div>
    <div class="form-group"><label for="couleur">couleur</label><input class="form-control" value="" type="text" name="couleur" id=""></div>
    <div class="form-group"><label for="ville">ville</label><input class="form-control" value="" type="text" name="ville" id=""></div>
    <div class="form-group"><label for="gouts">gouts</label><input class="form-control" value="" type="text" name="gouts" id=""></div>
    <div class="form-group"><label for="photo"></label><input value="" type="file" name="photo">
      <br> <button class="mt-4 btn btn-primary" type="submit">Submit</button>

</form>
@stop