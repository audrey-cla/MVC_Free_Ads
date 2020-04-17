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
<nav class="navbar navbar-light  mb-4 border-bottom border-warning">
    <a class="navbar-brand" href="#">{{$member->name}}</a>
</nav>

<br>
<div class="container-fluid">
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
</div>

<div class="row m-2 p-2 foo">
    <form action="/messages/done" method="POST" class="w-100">
    @csrf
        <div class="input-group">
            <input type="hidden" name="conversation_id" value="{{$conversation->id}}">
            <input type="hidden" name="talkingto" value="{{$member->id}}">
            <input type="text" name="content" class="form-control">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit">Go!</button>
            </span>
        </div>
    </form>
</div>

@endif
@endforeach

@endif
@endforeach

@stop