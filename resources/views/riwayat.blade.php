<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buku yang Saya Pinjam') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-xs font-bold uppercase">Judul Buku</th>
                            <th class="px-6 py-3 text-xs font-bold uppercase">Tanggal Pinjam</th>
                            <th class="px-6 py-3 text-xs font-bold uppercase">Tenggat Kembali</th>
                            <th class="px-6 py-3 text-xs font-bold uppercase text-center">Status / Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse($pinjamans as $p)
                        <tr>
                            <td class="px-6 py-4 font-medium">{{ $p->buku->judul }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600 italic">
                                {{ \Carbon\Carbon::parse($p->tanggal_pinjam)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-red-500">
                                {{ $p->status == 'dipinjam' ? \Carbon\Carbon::parse($p->tanggal_kembali)->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 text-center">
                                @if($p->status == 'pending')
                                    <span class="px-3 py-1 rounded-full font-bold bg-yellow-100 text-yellow-600 text-xs">
                                        MENUNGGU KONFIRMASI
                                    </span>
                                @elseif($p->status == 'ditolak')
                                    <span class="px-3 py-1 rounded-full font-bold bg-red-100 text-red-600 text-xs">
                                        PINJAMAN DITOLAK
                                    </span>
                                @elseif($p->status == 'dipinjam')
                                    <form action="{{ route('kembali.buku', $p->id) }}" method="POST">
                                        @csrf
                                        <button type="submit" class="bg-blue-600 text-white px-4 py-1 rounded-md text-xs font-bold hover:bg-blue-700">
                                            KEMBALIKAN
                                        </button>
                                    </form>
                                @elseif($p->status == 'dikembalikan')
                                    <span class="px-3 py-1 rounded-full font-bold bg-green-100 text-green-600 text-xs">
                                        SUDAH DIKEMBALIKAN
                                    </span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="px-6 py-10 text-center text-gray-400 italic">Belum ada buku yang dipinjam atau diajukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>