<x-app-layout>
    <!-- Header Halaman -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Koleksi Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- Bagian Atas Tabel (Tombol Tambah) -->
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-medium text-gray-900">List Inventaris</h3>
                    <a href="{{ route('buku.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                        + Tambah Buku
                    </a>
                </div>


                <!-- Tabel Data -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-50 text-left text-xs uppercase font-semibold text-gray-600 tracking-wider">
                                <th class="px-6 py-3 border-b">Judul Buku</th>
                                <th class="px-6 py-3 border-b">Penulis</th>
                                <th class="px-6 py-3 border-b text-center">Stok</th>
                                <th class="px-6 py-3 border-b text-center">Opsi</th>

                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($semuabuku as $b)
                            <tr class="hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-sm text-gray-900 font-medium">{{ $b->judul }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600">{{ $b->penulis }}</td>
                                <td class="px-6 py-4 text-sm text-gray-600 text-center">
                                    <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-xs font-bold">
                                        {{ $b->stok }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm text-center">
                                    <div class="flex justify-center gap-3">
                                        <!-- Edit -->
                                        <a href="{{ route('buku.edit', $b->id) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">
                                            Edit
                                        </a>

                                        <!-- Hapus -->
                                        <form action="{{ route('buku.destroy', $b->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 font-semibold" onclick="return confirm('Data ini bakal hilang, yakin?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
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
