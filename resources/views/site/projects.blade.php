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
<div id="project2" class="project">
  <p>
    <h2>
      <a href="https://www.github.com/grasseh/ba-bot">
        BA-Bot (18+)
      </a>
    </h2>
    A Discord bot to allow duels through a pretty <em>restrictive</em> framework.
  </p>
</div>
<div id="project2" class="project">
  <p>
    <h2>
      <a href="https://www.github.com/grasseh/taffee">
        Taffee
      </a>
    </h2>
    A NodeJS-built test framework which converts and runs Markdown-based test suites, converting them to an HTML format for non-tech clients.
  </p>
</div>
<div id="project2" class="project">
  <p>
    <h2>
      <a href="https://www.github.com/grasseh/muffle">
        Muffle
      </a>
    </h2>
    Silence your friends in Discord with this bot.
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
