<!DOCTYPE html>
<html lang="id" class="dark h-full bg-zinc-950">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Guru')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-full flex-col bg-zinc-950 font-sans text-zinc-100 antialiased selection:bg-zinc-800 selection:text-white">
    <main id="main-content" class="mx-auto w-full max-w-4xl grow px-4 py-10 sm:px-6 sm:py-14">
        @if (session('success'))
            <div class="mb-6 flex items-center gap-2.5 rounded-lg border border-emerald-900/60 bg-emerald-950/30 px-3.5 py-2.5 text-xs text-emerald-300" role="status">
                <svg class="size-4 shrink-0 stroke-2 text-emerald-400" viewBox="0 0 24 24" fill="none" stroke="currentColor"><path d="m5 12 4 4L19 6"/></svg>
                <p class="font-medium">{{ session('success') }}</p>
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>