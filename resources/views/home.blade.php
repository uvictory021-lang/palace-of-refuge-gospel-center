@extends('layouts.app')

@section('title', 'Palace Of Refuge Gospel Center | The Wealthy Place Of Word And Power')
@section('meta_description', 'Palace Of Refuge Gospel Center — The Wealthy Place Of Word And Power. A place of refuge, transformation, and the uncompromised Word of God.')

@section('content')
    @include('home._hero')
    @include('home._welcome')
    @include('home._about')
    @include('home._latest-message', ['message' => $latestMessage])
    @include('home._palace-guard', ['teaching' => $palaceGuard])
    @include('home._programs', ['programs' => $programs])
    @include('home._news', ['news' => $news])
    @include('home._prayer')
    @include('home._scripture', ['scripture' => $scripture])
    @include('home._support')
    @include('home._final-cta')
@endsection