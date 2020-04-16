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
@foreach($annonces as $annonce)
<div class="card" style="width: 18rem;">
    <img class="card-img-top" src="<?php echo asset("storage/" . $annonce['photo']) ?>"></img>
    <div class="card-body">
        <h5 class="card-title">{{$annonce['titre']}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$annonce['prix']}} clochettes</h6>
        <p class="card-text">{{$annonce['description']}}</p>
        <a href="#" class="card-link">Card link</a>
    </div>
</div>
@endforeach



<form method="POST" action="<?php echo "/annonces/delete/" . $annonce['id'] ?>">
    @csrf
    <a href="/annonces/all">Annuler</butaton> <button type="submit">Supprimer</button>

</form>
@stop