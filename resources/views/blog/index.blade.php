@extends('layouts.master')

@section('title', 'Blog')

@section('head')
    @extends('layouts.masterhead')
    <meta name="description" content="Steve Gagné's personnal blog. Contains random diaries about software development and video games.">
@endsection

@section('content')
    <div class="row top">
        <h1>Blog</h1>
        <br>
            Welcome to my blog! It contains random diaries about software development and video games.
        </br>
    </div>

  <div class="content">
    @foreach($files as $link)
        {!! $link !!} 
    @endforeach
    <br>
    <br>
  </div>
@endsection
