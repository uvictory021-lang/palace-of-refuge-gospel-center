<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login — Palace Of Refuge</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen items-center justify-center bg-gray-100 px-4">
    <div class="w-full max-w-sm rounded-lg bg-white p-8 shadow">
        <h1 class="mb-6 text-xl font-semibold text-gray-800">Sign in</h1>

        @if ($errors->any())
            <div class="mb-4 rounded border border-red-300 bg-red-50 p-3 text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input
                    id="email"
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    class="mt-1 w-full rounded border border-gray-300 px-3 py-2 text-sm focus:border-gray-500 focus:outline-none"
                >
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input
                    id="password"
                    type="password"
                    name="password"
                    required
                    class="mt-1 w-full rounded border border-gray-300 px-3 py-2 text-sm focus:border-gray-500 focus:outline-none"
                >
            </div>

            <label class="flex items-center gap-2 text-sm text-gray-600">
                <input type="checkbox" name="remember">
                Remember me
            </label>

            <button
                type="submit"
                class="w-full rounded bg-gray-800 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700"
            >
                Sign in
            </button>
        </form>
    </div>
</body>
</html>