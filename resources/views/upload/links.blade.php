@extends('layouts.master')

@section('title', 'Upload')

@section('head')
    @extends('layouts.masterhead')
@endsection

@section('content')
    <div class="row top">
        <h1>Upload</h1>
    </div>

  <div class="content">
    @foreach($files as $link)
        {!! $link !!}<br/>
    @endforeach
  </div>
@endsection
