<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-Library | Literasi Digital</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="antialiased bg-slate-50 text-slate-900">
    <!-- Navbar Simpel -->
    <nav class="flex items-center justify-between px-8 py-6 max-w-7xl mx-auto">
        <div class="flex items-center gap-2">
            <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200">
                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
            </div>
            <span class="text-xl font-bold tracking-tight uppercase italic text-indigo-900">Perpus<span class="text-indigo-500">Digital</span></span>
        </div>

        <div class="flex items-center gap-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-600 hover:text-indigo-600 transition">Masuk</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="bg-indigo-600 text-white px-5 py-2.5 rounded-full text-sm font-bold shadow-md hover:bg-indigo-700 hover:-translate-y-0.5 transition-all">Daftar Sekarang</a>
                    @endif
                @endauth
            @endif
        </div>
    </nav>

    <!-- Hero Section -->
    <main class="max-w-7xl mx-auto px-8 py-20 lg:py-32 grid lg:grid-cols-2 gap-12 items-center">
        <div>
            <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-xs font-bold uppercase tracking-widest mb-6">UKK Project 2026</span>
            <h1 class="text-5xl lg:text-7xl font-extrabold leading-tight mb-6">
                Baca Buku <br>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 to-purple-500">Kapan Saja</span> Tanpa Ribet.
            </h1>
            <p class="text-lg text-slate-500 mb-10 max-w-lg leading-relaxed">
                Kelola data buku perpustakaan dengan sistem digital yang cepat, aman, dan terintegrasi. Membaca jadi lebih asik dengan akses yang mudah.
            </p>

            <div class="flex items-center gap-4">
                <a href="{{ route('register') }}" class="bg-slate-900 text-white px-8 py-4 rounded-2xl font-bold hover:bg-slate-800 shadow-xl transition-all">Mulai Gratis</a>
                <div class="flex -space-x-3 italic text-sm text-slate-400">
                    <div class="w-10 h-10 rounded-full border-2 border-white bg-slate-200 flex items-center justify-center font-bold">A</div>
                    <div class="w-10 h-10 rounded-full border-2 border-white bg-indigo-200 flex items-center justify-center font-bold text-indigo-600 text-xs text-center">UKK</div>
                </div>
            </div>
        </div>

        <!-- Visual "Buku" (Placeholder Sederhana Tapi Estetik) -->
        <div class="relative hidden lg:block">
            <div class="absolute -top-10 -left-10 w-64 h-64 bg-indigo-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
            <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-purple-200 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse delay-700"></div>

            <div class="bg-white p-8 rounded-[2rem] shadow-2xl border border-slate-100 transform rotate-3 hover:rotate-0 transition-all duration-500">
                <div class="flex items-center justify-between mb-8">
                    <span class="font-bold text-slate-400 text-xs uppercase tracking-tighter">New Arrivals</span>
                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                </div>
                <div class="space-y-4">
                    <div class="h-4 w-3/4 bg-slate-100 rounded-full"></div>
                    <div class="h-4 w-1/2 bg-slate-100 rounded-full"></div>
                    <div class="h-32 w-full bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-2xl"></div>
                </div>
                <div class="mt-8 flex justify-center text-indigo-600 font-bold text-sm">
                    Sistem Perpustakaan Digital v1.0
                </div>
            </div>
        </div>
    </main>

    <!-- Footer Tipis -->
    <footer class="max-w-7xl mx-auto px-8 py-10 border-t border-slate-200 mt-20 text-center lg:text-left">
        <p class="text-slate-400 text-sm italic">&copy; 2026 Dibuat untuk Ujian Kompetensi Keahlian.</p>
    </footer>
</body>
</html>