@extends('layouts.master')

@section('title', 'Notes')

@section('head')
    @extends('layouts.masterhead')
@endsection

@section('content')
    <div class="row top">
        <h1>{{$class}}</h1>
    </div>

  <div class="content">
    {!! Form::open(['route' => ['notes.addFile',$class], 'files' =>true]) !!}
    {!! Form::file('file') !!}
    {!! Form::submit('Add') !!}
    {!! Form::close() !!}
    <br>
    @foreach($files as $file)
        <a href="/notes/{{$class}}/{{$file}}">{{$file}}</a> <br>
    @endforeach
    <br>
    <br>
  </div>
@endsection
