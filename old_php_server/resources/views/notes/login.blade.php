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
    {!! Form::open(['route' => 'notes.login']) !!}
    {!! Form::text('username', '', ['placeholder' => 'Username']) !!}
    <br>
    {!! Form::password('password') !!}
    <br>
    {!! Form::submit('Login') !!}
    {!! Form::close() !!}
    <br>
    <br>
  </div>
@endsection
