@extends('layouts.master')

@section('title', 'Notes')

@section('head')
    @extends('layouts.masterhead')
@endsection

@section('content')
    <div class="row top">
        <h1>Notes</h1>
    </div>

  <div class="content">
    @foreach($folders as $folder)
        <a href="/notes/{{ $folder }}/">{{ $folder }}</a> <br>
    @endforeach
    <br>
    <br>
  </div>
@endsection
