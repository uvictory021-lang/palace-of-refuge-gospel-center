@extends('layouts.dashboard')

@section('title', 'New Announcement')

@section('content')
    <div class="mb-6">
        <h2 class="font-display text-2xl font-semibold text-burgundy-dark">New Announcement</h2>
        <p class="mt-1 text-sm text-charcoal/50">Share news or an update with the congregation.</p>
    </div>

    <form method="POST" action="{{ route('announcements.store') }}" enctype="multipart/form-data" class="max-w-2xl rounded-brand-lg border border-burgundy/10 bg-ivory p-6 shadow-brand-sm sm:p-8">
        @csrf
        @include('announcements._form')
    </form>
@endsection