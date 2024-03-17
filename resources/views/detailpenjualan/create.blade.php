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
                    <h1 class="text-2xl font-bold mb-4">Tambah Detail Penjualan Baru</h1>
                    <form action="{{ route('detailpenjualan.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="penjualanid" class="block text-gray-700">Penjualan ID:</label>
                            <input type="text" id="penjualanid" name="penjualanid"
                                class="form-input mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="produkid" class="block text-gray-700">Produk ID:</label>
                            <select id="produkid" name="produkid" class="form-select mt-1 block w-full">
                                @foreach ($produks as $produk)
                                    <option value="{{ $produk->produkid }}">{{ $produk->namaproduk }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_produk" class="block text-gray-700">Jumlah Produk:</label>
                            <input type="text" id="jumlah_produk" name="jumlah_produk"
                                class="form-input mt-1 block w-full">
                        </div>
                        <div class="mb-4">
                            <label for="subtotal" class="block text-gray-700">Subtotal:</label>
                            <input type="text" id="subtotal" name="subtotal" class="form-input mt-1 block w-full">
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
