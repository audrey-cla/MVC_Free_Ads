@extends('layouts.master')

@section('title', 'Modifier Profil')

@section('navbar')
@parent
<div class="ml-auto"><a href="/logout">log out</a></div>
@stop


@section('content')
<form method='POST' action='/update/{{$user->id}}'>
    @csrf
   <div class="form-group"> <label for='name'>name:</label><input class="form-control" type='name' name='name' id='' value='{{$user->name}}'></div>
   <div class="form-group"> <label for='email'>Email:</label><input class="form-control" type='email' name='email' id='' value='{{$user->email}}'></div>
   <div class="form-group"> <label for='password'>password:</label><input class="form-control" type='password' name='password' id='' value=''></div>
   <div class="form-group"> <label for='ville'>Ville:</label><input class="form-control" type='ville' name='ville' id='' value='{{$user->ville}}'></div>
   <div class="form-group"> <label for='gouts'>gouts:</label><input class="form-control" type='gouts' name='gouts' id='' value='{{$user->gouts}}'></div>
    <button type="submit">Changer</button>
</form>
@stop