<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-indigo-800 leading-tight italic uppercase tracking-wider">
            {{ __('Katalog Buku Siswa') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-slate-50">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-2xl p-8 border border-slate-100">
                <div class="mb-8">
                    <h3 class="text-2xl font-extrabold text-slate-900">Daftar Buku Tersedia</h3>
                    <p class="text-sm text-slate-500">Silahkan pilih buku yang ingin kamu pinjam hari ini.</p>
                </div>

                <div class="overflow-hidden rounded-xl border border-slate-200">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="bg-slate-900 text-white">
                                <th class="px-6 py-4 font-bold uppercase text-xs tracking-widest">Judul</th>
                                <th class="px-6 py-4 font-bold uppercase text-xs tracking-widest">Penulis</th>
                                <th class="px-6 py-4 font-bold uppercase text-xs tracking-widest text-center">Status Stok</th>
                                <th class="px-6 py-4 font-bold uppercase text-xs tracking-widest text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach ($semuabuku as $b)
                            <tr class="hover:bg-indigo-50/30 transition-colors">
                                <td class="px-6 py-5">
                                    <div class="font-bold text-slate-800">{{ $b->judul }}</div>
                                </td>
                                <td class="px-6 py-5 text-slate-600 font-medium">{{ $b->penulis }}</td>
                                <td class="px-6 py-5 text-center">
                                    @if($b->stok > 0)
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-green-100 text-green-700">
                                            Tersedia: {{ $b->stok }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-red-100 text-red-600 italic">
                                            Kosong
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-5 text-center">
                                    @if($b->stok > 0)
                                        <form action="{{ route('pinjam.buku', $b->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl text-xs font-black shadow-lg shadow-indigo-100 transition-all hover:-translate-y-0.5 active:scale-95">
                                                PINJAM BUKU
                                            </button>
                                        </form>
                                    @else
                                        <button disabled class="bg-slate-200 text-slate-400 px-6 py-2 rounded-xl text-xs font-bold cursor-not-allowed">
                                            TIDAK TERSEDIA
                                        </button>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>