
@extends('layouts.master')

@section('title', 'Index')

@section('navbar')
@parent
<div class="ml-auto"><a href="/register">register</a><a href="/login">login</a></div>
@stop



@section('content')
Veillez vous connecter ou vous enregister
@stop