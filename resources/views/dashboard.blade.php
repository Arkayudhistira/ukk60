<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 leading-tight">
                {{ __('Dashboard Library') }}
            </h2>
            <span class="text-sm font-medium text-gray-500 bg-gray-100 px-3 py-1 rounded-full">
                {{ now()->format('d M Y') }}
            </span>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Hero Section: Welcome -->
            <div class="relative overflow-hidden bg-gradient-to-r from-indigo-600 to-blue-500 rounded-2xl shadow-xl">
                <div class="relative z-10 p-8 md:p-12">
                    <h1 class="text-3xl md:text-4xl font-extrabold text-white mb-2">
                        Selamat Datang, {{ explode(' ', auth()->user()->name)[0] }}! 👋
                    </h1>
                    <p class="text-indigo-100 text-lg max-w-xl">
                        Akses ribuan literasi dalam genggamanmu. Kelola peminjaman dan jelajahi wawasan baru hari ini.
                    </p>
                </div>
                <!-- Dekorasi Lingkaran Abstrak -->
                <div class="absolute top-0 right-0 -mr-20 -mt-20 w-64 h-64 bg-white opacity-10 rounded-full"></div>
                <div class="absolute bottom-0 right-0 mb-8 mr-12 w-24 h-24 bg-indigo-400 opacity-20 rounded-full blur-xl"></div>
            </div>

            <!-- Dashboard Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Stat: Aktif -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-blue-100 rounded-xl text-blue-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium uppercase tracking-wider">Buku Dipinjam</p>
                            <h4 class="text-2xl font-bold text-gray-800">{{ \App\Models\Peminjaman::where('user_id', auth()->id())->where('status', 'dipinjam')->count() }} <span class="text-sm font-normal text-gray-400 italic">Ekslempar</span></h4>
                        </div>
                    </div>
                </div>

                <!-- Stat: Pending -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-amber-100 rounded-xl text-amber-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium uppercase tracking-wider">Menunggu Antrean</p>
                            <h4 class="text-2xl font-bold text-gray-800">{{ \App\Models\Peminjaman::where('user_id', auth()->id())->where('status', 'pending')->count() }} <span class="text-sm font-normal text-gray-400 italic">Buku</span></h4>
                        </div>
                    </div>
                </div>

                <!-- Stat: History -->
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-emerald-100 rounded-xl text-emerald-600">
                            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500 font-medium uppercase tracking-wider">Total Literasi</p>
                            <h4 class="text-2xl font-bold text-gray-800">{{ \App\Models\Peminjaman::where('user_id', auth()->id())->count() }} <span class="text-sm font-normal text-gray-400 italic">Selesai</span></h4>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Navigation -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <a href="{{ route('siswa.katalog') }}" class="group relative bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:border-indigo-300 transition-all overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold text-gray-800 group-hover:text-indigo-600 transition-colors">Eksplorasi Katalog</h3>
                        <p class="text-gray-500 mt-1">Cari dan temukan referensi buku terbaru.</p>
                    </div>
                    <div class="absolute right-6 bottom-6 text-gray-100 group-hover:text-indigo-50 transition-all transform group-hover:scale-110">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"></path></svg>
                    </div>
                </a>

                <a href="{{ route('riwayat.pinjam') }}" class="group relative bg-white p-8 rounded-2xl shadow-sm border border-gray-100 hover:border-indigo-300 transition-all overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold text-gray-800 group-hover:text-indigo-600 transition-colors">Manajemen Pinjaman</h3>
                        <p class="text-gray-500 mt-1">Pantau tenggat waktu dan status buku.</p>
                    </div>
                    <div class="absolute right-6 bottom-6 text-gray-100 group-hover:text-indigo-50 transition-all transform group-hover:scale-110">
                        <svg class="w-16 h-16" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"></path></svg>
                    </div>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>