<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Transaksi Perpustakaan</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border">
                    <thead class="bg-slate-800 text-white text-xs uppercase">
                        <tr>
                            <th class="px-4 py-3">Nama Siswa</th>
                            <th class="px-4 py-3">Judul Buku</th>
                            <th class="px-4 py-3">Tgl Pinjam</th>
                            <th class="px-4 py-3 text-center">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y">
                        @foreach($semuapinjaman as $sp)
                        <tr class="text-sm">
                            <td class="px-4 py-3 font-bold">{{ $sp->user->name }}</td>
                            <td class="px-4 py-3">{{ $sp->buku->judul }}</td>
                            <td class="px-4 py-3 italic">{{ $sp->tanggal_pinjam }}</td>
                            <td class="px-4 py-3 text-center">
                                @if($sp->status == 'pending')
                                    <div class="flex justify-center gap-2">
                                        <!-- Tombol Setuju -->
                                        <form action="{{ route('admin.setujui', $sp->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded text-xs font-bold hover:bg-green-600">
                                                SETUJUI
                                            </button>
                                        </form>

                                        <!-- Tombol Tolak -->
                                        <form action="{{ route('admin.tolak', $sp->id) }}" method="POST">
                                            @csrf
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-xs font-bold hover:bg-red-600">
                                                TOLAK
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="font-bold text-xs">
                                        {{ strtoupper($sp->status) }}
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>