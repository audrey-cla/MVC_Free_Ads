@extends('layouts.master')

@section('title', 'Messages')

@section('navbar')
@parent

<div class="ml-auto"> <a href="/logout">log out</a></div>
@stop


@section('content')


@foreach ($conversations as $conversation)
@foreach ($conversation->users as $member)
@if($member->name != Auth::user()->name)

<a href="/messages/{{$member->id}}">{{$member->name}}</a><br>
@endif
@endforeach
@endforeach

@stop
