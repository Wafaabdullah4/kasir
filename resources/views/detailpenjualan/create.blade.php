<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('AdminDashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Tambah Detail Penjualan</h1>
                    <form action="{{ route('detailpenjualan.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="penjualanid" class="block text-sm font-medium text-gray-700">ID
                                Penjualan:</label>
                            <input type="number" id="penjualanid" name="penjualanid"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="produkid" class="block text-sm font-medium text-gray-700">ID Produk:</label>
                            <input type="number" id="produkid" name="produkid"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="jumlah_produk" class="block text-sm font-medium text-gray-700">Jumlah
                                Produk:</label>
                            <input type="number" id="jumlah_produk" name="jumlah_produk"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="subtotal" class="block text-sm font-medium text-gray-700">Subtotal:</label>
                            <input type="number" id="subtotal" name="subtotal" step="0.01"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                class="py-2 px-4 bg-blue-500 text-gray-900 rounded hover:bg-blue-600">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
