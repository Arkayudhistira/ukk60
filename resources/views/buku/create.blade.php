<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Input Buku Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-8">

                <div class="mb-6 flex justify-between items-center border-b pb-4">
                    <h3 class="text-lg font-bold text-gray-700">Formulir Tambah Data</h3>
                    <a href="{{ route('buku.index') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800 transition">
                        ← Kembali ke List
                    </a>
                </div>

                <form action="{{ route('buku.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <!-- Input Judul -->
                    <div>
                        <label for="judul" class="block text-sm font-semibold text-gray-700 mb-1">Judul Lengkap Buku</label>
                        <input type="text" name="judul" id="judul" placeholder="Masukkan judul buku..." required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2.5">
                    </div>

                    <!-- Input Penulis -->
                    <div>
                        <label for="penulis" class="block text-sm font-semibold text-gray-700 mb-1">Nama Penulis / Pengarang</label>
                        <input type="text" name="penulis" id="penulis" placeholder="Contoh: Andrea Hirata" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2.5">
                    </div>

                    <!-- Input Stok -->
                    <div class="w-1/2">
                        <label for="stok" class="block text-sm font-semibold text-gray-700 mb-1">Jumlah Stok</label>
                        <input type="number" name="stok" id="stok" min="1" placeholder="0" required
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-indigo-500 focus:ring-indigo-500 py-2.5">
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="flex items-center justify-end gap-4 mt-8 pt-6 border-t border-gray-100">
                        <button type="reset" class="text-sm font-bold text-gray-500 hover:text-gray-700 px-4">
                            Reset Form
                        </button>
                        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2.5 rounded-lg text-sm font-bold shadow-md transition-all active:scale-95">
                            Simpan Data Baru
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>