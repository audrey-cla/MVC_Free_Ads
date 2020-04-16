@extends('layouts.master')

@section('title', 'Messages')

@section('navbar')
@parent

<div class="ml-auto"> <a href="/logout">log out</a></div>
@stop


@section('content')

@foreach ($conversations as $conversation)
@if($conversation == $trueconversation)

@foreach ($conversation->users as $member)
@if($member->name != Auth::user()->name)
<!-- As a link -->
<nav class="navbar navbar-light  mb-4 border-bottom border-warning">
    <a class="navbar-brand" href="#">{{$member->name}}</a>
</nav>
<div class="container-fluid">
</div>
<br>
@endif
@endforeach



@foreach($conversation->messages as $message)

@if($message->user_id != Auth::user()->id)
<div class="row mt-2 ml-3  justify-content-start mr-3">
    <div class="col-6 p-2  pl-4 rounded-pill color-custom ">{{$message->content}}</div>
</div>
@else
<div class="row mt-2 ml-3 justify-content-end mr-3">
    <div class="col-6 p-2  pl-4 rounded-pill bg-primary">{{$message->content}}</div>
</div>
@endif
@endforeach



@endif
@endforeach

@stop