@extends('layouts.master')

@section('title')
    {{ $name }}
@endsection

@section('head')
    @extends('layouts.masterhead')
    <meta name="description" content="{{ $description }}">
@endsection

@section('content')
    <div class="row top">
        <h1><a href="/blog">Blog</a></h1>
    </div>

  <div class="BlogText">
    {!! $content !!} 
    <br>
    <br>
  </div>
@endsection
