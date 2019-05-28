@extends('layouts.master')

@section('title', 'Backend Programmer')

@section('head')
    @extends('layouts.masterhead')
@endsection

@section('content')
    <p class="index row">
         Hello, my name is Steve "Grasseh" Gagné, I am a bachelor in Software Engineering, graduated from the École de Technologie Supérieure. <a href="https://www.github.com/grasseh/resume/blob/master/resume_ext.pdf">My résumé can easily be found on Github.</a>
    <br><br>
    I enjoy playing <a href="/video-game-results">video games</a>, such as <a href="http://na.op.gg/summoner/userName=grasseh"> League of Legends</a> and <a href="/hall-of-fame">Pokémon</a>. 
    <br><br>
        You might enjoy reading my <a href="/blog">blog</a>, checking my <a href="/projects">personal projects</a>, looking at the <a href="/competitions">competitions</a> I've taken part in or looking through my <a href="http://www.github.com/grasseh">Github repositories.</a>
    <br><br>
        Need to contact me? I answer my <a href="mailto:contact@grasseh.com">emails</a> regularly.

    </p>
@endsection
