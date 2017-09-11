@extends('layouts.master')

@section('title', 'Backend Programmer')

@section('head')
    @extends('layouts.masterhead')
@endsection

@section('content')
<h1>
  Projects
</h1>
<hr>
<div id="project1" class="project">
  <p>
    <h2>
      <a href="http://esports.grasseh.com">
        EsporTS Scouter
      </a>
    </h2>
    A WIP project to scout opposing teams in collegiate matches.
  </p>
</div>
<div id="project2" class="project">
  <p>
    <h2>
      <a href="/logparser">
        JSON Log Parser
      </a>
    </h2>
    A quick JavaScript project that allows to parse a list of different structured JSON logs.
  </p>
</div>
@endsection
