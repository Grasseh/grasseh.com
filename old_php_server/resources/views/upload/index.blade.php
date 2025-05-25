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
    {!! Form::open(['route' => ['upload.addFile'], 'files' =>true]) !!}
    {!! Form::file('file') !!}
    {!! Form::submit('Add') !!}
    {!! Form::close() !!}
  </div>
@endsection
