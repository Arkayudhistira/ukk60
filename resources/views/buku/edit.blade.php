<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ubah Data Buku') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <div class="mb-6 flex justify-between items-center">
                    <h3 class="text-lg font-medium text-gray-900">Formulir Update</h3>
                    <a href="{{ route('buku.index') }}" class="text-sm font-semibold text-gray-600 hover:text-gray-900 flex items-center gap-1 transition">
                        ← Kembali
                    </a>
                </div>

                <form action="{{ route('buku.update', $buku->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT') <div>
                        <label for="judul" class="block text-sm font-medium text-gray-700">Judul Buku</label>
                        <input type="text" name="judul" id="judul" value="{{ $buku->judul }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="penulis" class="block text-sm font-medium text-gray-700">Penulis</label>
                        <input type="text" name="penulis" id="penulis" value="{{ $buku->penulis }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div>
                        <label for="stok" class="block text-sm font-medium text-gray-700">Stok</label>
                        <input type="number" name="stok" id="stok" value="{{ $buku->stok }}" required
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                        <a href="{{ route('buku.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-md text-sm font-semibold transition">
                            Batal
                        </a>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md text-sm font-semibold transition">
                            Simpan Perubahan
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>