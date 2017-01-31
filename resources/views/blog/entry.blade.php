@extends('layouts.master')

@section('title', 'Blog')

@section('head')
    @extends('layouts.masterhead')
    <meta name="description" content="Steve Gagné's personnal blog. Contains random diaries about software development and video games.">
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
