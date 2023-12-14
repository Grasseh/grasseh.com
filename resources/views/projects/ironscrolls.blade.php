@extends('layouts.masternofooter')

@section('title', 'Iron Scrolls Random Roller')

@section('head')
    <link href='https://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/public/css/style.css">
    <link rel="stylesheet" href="/public/libs/Skeleton/css/normalize.css">
    <link rel="stylesheet" href="/public/libs/Skeleton/css/skeleton.css">
    <link rel="stylesheet" href="/public/LogParser/css/style.css">
    <link rel="icon" type="image/png" href="/public/images/logo.png">
    <script type="text/javascript" src="/public/libs/jquery.js" ></script>
    <script src="/public/IronScrolls/main.js" ></script>
@endsection

@section('content')
<div class="content">
    Race:<span id="ironscrolls-race" /><br/>
    Skills:<span id="ironscrolls-skills" /><br/>
    Quest Order:<span id="ironscrolls-quests" /><br/>
    <button id="roll">Roll</button>
</div>
@endsection
