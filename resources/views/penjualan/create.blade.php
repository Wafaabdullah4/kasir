<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Tambah Penjualan Baru</h1>
                    <form action="{{ route('penjualan.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="tanggal_penjualan" class="block text-gray-700">Tanggal Penjualan:</label>
                            <input type="date" id="tanggal_penjualan" name="tanggal_penjualan"
                                class="form-input mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="total_harga" class="block text-gray-700">Total Harga:</label>
                            <input type="text" id="total_harga" name="total_harga"
                                class="form-input mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="pelangganid" class="block text-gray-700">Nama Pelanggan:</label>
                            <select id="pelangganid" name="pelangganid" class="form-select mt-1 block w-full">
                                @foreach ($pelanggans as $pelanggan)
                                    <option value="{{ $pelanggan->pelangganid }}">{{ $pelanggan->nama_pelanggan }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <button type="submit"
                                class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
