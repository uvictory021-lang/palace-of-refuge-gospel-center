<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Palace Of Refuge Gospel Center — The Wealthy Place Of Word And Power.')">
        <link rel="canonical" href="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Palace Of Refuge Gospel Center')">
    <meta property="og:description" content="@yield('meta_description', 'Palace Of Refuge Gospel Center — The Wealthy Place Of Word And Power.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/branding/logo.png') }}">
    <meta name="twitter:card" content="summary_large_image">
    <title>@yield('title', 'Palace Of Refuge Gospel Center')</title>

    {{-- Favicon placeholder — using the crest directly for now.
         Recommend generating proper favicon sizes (16/32/180px) from a
         transparent-background export of the logo later. --}}
    <link rel="icon" href="{{ asset('images/branding/logo.png') }}" sizes="any">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600;9..144,700&family=Inter:wght@400;500;600;700&display=swap"
        rel="stylesheet"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('head')
</head>
<body class="flex min-h-screen flex-col">
    <a
    
        href="#main-content"
        class="sr-only focus:not-sr-only focus:absolute focus:z-[100] focus:m-3 focus:rounded-brand focus:bg-gold focus:px-4 focus:py-2 focus:text-burgundy-dark"
    >
        Skip to content
    </a>

    <x-navbar />

    <main id="main-content" class="flex-1">
        @yield('content')
    </main>

    <x-footer />

    @stack('scripts')
</body>
</html>