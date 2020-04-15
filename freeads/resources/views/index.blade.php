
@extends('layouts.master')

@section('title', 'Index')

@section('navbar')
@parent
<div class="ml-auto"><a href="/logout">log out</a></div>
@stop

@section('sidebar')
@parent
<a href="/update/{{Auth::user()->id}}">Modifier votre profil</a>
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
<p>Bienvenue {{Auth::user()->name}} !</p>
@stop