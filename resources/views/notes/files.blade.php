@extends('layouts.master')

@section('title', 'Notes')

@section('head')
    @extends('layouts.masterhead')
@endsection

@section('content')
    <div class="row top">
        <h1><a href="/notes/{{$dir}}">{{$name}}</a></h1>
    </div>

  <div class="BlogText">
    {!! nl2br($content) !!}
    <br>
    <br>
  </div>
@endsection
