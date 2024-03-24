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
                    <div class="container mx-auto">
                        <h2 class="text-2xl font-semibold mb-4">Edit Penjualan</h2>
                        <form action="{{ route('penjualan.update', $penjualan->penjualanid) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="tanggal_penjualan" class="block font-medium text-gray-700">Tanggal
                                    Penjualan</label>
                                <input type="date" id="tanggal_penjualan" name="tanggal_penjualan"
                                    class="mt-1 p-2 border rounded-md w-full"
                                    value="{{ $penjualan->tanggal_penjualan }}" required>
                            </div>
                            <div class="mb-4">
                                <label for="total_harga" class="block font-medium text-gray-700">Total Harga</label>
                                <input type="number" id="total_harga" name="total_harga"
                                    class="mt-1 p-2 border rounded-md w-full" value="{{ $penjualan->total_harga }}"
                                    readonly>
                            </div>
                            <div class="mb-4">
                                <label for="pelangganid" class="block font-medium text-gray-700">Pelanggan</label>
                                <select id="pelangganid" name="pelangganid" class="mt-1 p-2 border rounded-md w-full"
                                    required>
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->pelangganid }}"
                                            {{ $penjualan->pelangganid == $pelanggan->pelangganid ? 'selected' : '' }}>
                                            {{ $pelanggan->nama_pelanggan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <h2 class="text-2xl font-semibold mb-4">Detail Penjualan</h2>
                            <table class="border-collapse border border-gray-300 w-full mb-4">
                                <thead>
                                    <tr class="bg-gray-100">
                                        <th class="border border-gray-300 p-2">Produk</th>
                                        <th class="border border-gray-300 p-2">Jumlah Produk</th>
                                        <th class="border border-gray-300 p-2">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody id="dynamic_field">
                                    @foreach ($penjualan->detailPenjualan as $detail)
                                        <tr>
                                            <td>
                                                <select name="detail[{{ $loop->index }}][produkid]"
                                                    class="mt-1 p-2 border rounded-md w-full produk-select" required>
                                                    <option value="">Pilih Produk</option>
                                                    @foreach ($produks as $produk)
                                                        <option value="{{ $produk->produkid }}"
                                                            {{ $detail->produkid == $produk->produkid ? 'selected' : '' }}
                                                            data-harga="{{ $produk->harga }}">
                                                            {{ $produk->namaproduk }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" name="detail[{{ $loop->index }}][jumlah_produk]"
                                                    class="mt-1 p-2 border rounded-md w-full jumlah-produk"
                                                    value="{{ $detail->jumlah_produk }}" required></td>
                                            <td><input type="number" name="detail[{{ $loop->index }}][subtotal]"
                                                    class="mt-1 p-2 border rounded-md w-full subtotal"
                                                    value="{{ $detail->subtotal }}" readonly></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="button" name="add" id="add"
                                class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md">Tambah Produk</button>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
