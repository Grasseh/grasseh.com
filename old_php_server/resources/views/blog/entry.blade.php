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

    <div class = "row bottom">
        <p>
            Want to stay up to date on my publications? Follow me on
            <a href="http://twitter.com/grassehgagne">Twitter</a>, or
            subscribe to my <a href="/rss/blog/feed"> Blog's RSS Feed. </a>
        </p>
    </div>
@endsection
