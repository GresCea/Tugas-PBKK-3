<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', config('app.name', 'Profil Mahasiswa ITS'))</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="site-shell bg-slate-50 text-slate-900 dark:bg-slate-950 dark:text-slate-100">
    <nav class="site-nav" aria-label="Navigasi utama">
        <a class="site-brand" href="{{ route('home') }}">ITS / PBKK</a>
        <div class="site-nav-links">
            <a href="{{ route('home') }}">Beranda</a>
            <a href="{{ route('profile') }}">Profil</a>
            <a href="{{ route('agent') }}">Ide-Riset</a>
            <a href="{{ route('gpa') }}">Hitung-IPK</a>
            <button type="button" class="theme-toggle" id="theme-toggle" aria-pressed="false">
                Mode Gelap
            </button>
        </div>
    </nav>

    <main class="page-container">
        @yield('content')
    </main>

    <footer class="site-footer">Institut Teknologi Sepuluh Nopember (ITS) &middot; PBKK</footer>
</body>
</html>