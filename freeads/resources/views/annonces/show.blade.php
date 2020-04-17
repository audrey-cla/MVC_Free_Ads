@extends('layouts.master')

@section('title', 'Annonces')

@section('navbar')
@parent

<div class="ml-auto"> <a href="/logout">log out</a></div>
@stop

@section('sidebar')
@parent
<a href="/annonces/create">Creer une annnonce</a>
<br><a href="/annonces/user/{{ Auth::user()->id }}">vos annonces crées</a>
<br><a href="/update/{{Auth::user()->id}}">Modifier votre profil</a>
@stop

@section('content')
@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@if (session('bad'))
<div class="alert alert-danger">
    {{ session('bad') }}
</div>
@endif
<form method="get" action="{{ route('annonces.index') }}">
    <div class="input-group">
        <input class="form-control" type="text" placeholder="Votre recherche" name="search" aria-label="Search">
        <button type="submit">Search</button>
    </div>
    <input type="radio" value="desc" name="tris" id=""><label for="desc"> descendant</label>
    <input type="radio" value="asc" name="tris" id=""><label for="asc"> ascendant</label>
</form>
<div class="row">
    @foreach($annonces as $annonce)
    <div class="card">
        <div class="row">
            <div class="col-auto">
                <img src="<?php echo asset("storage/" . $annonce['photo']) ?>" class="img-fluid" alt="">
                <br>
                @if( !(Auth::user()->id == $annonce['user_id']))<small>
                    <a href="/messages/{{$annonce['user_id']}}">Contacter le vendeur</a></small>
                @endif
            </div>
            <div class="col">
                <div class="card-block px-1">
                    <h6 class="card-title">{{$annonce['titre']}}</h6>
                    <h6 class="card-subtitle mb-1 text-muted"><small>{{$annonce['prix']}} clochettes</small></h6>
                    <p class="card-text"><small>{{$annonce['description']}} 
                            <br>{{$annonce['ville']}}
                            <br>{{$annonce['gouts']}}
                        </small></p>
                    @if( Auth::user()->id == $annonce['user_id'])
                    <small> <a href="update/{{$annonce['id']}}" class="card-link">Update</a>
                        <a href="delete/{{$annonce['id']}}" class="card-link">Delete</a></small>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@stop