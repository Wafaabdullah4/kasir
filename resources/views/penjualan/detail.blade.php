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
                    <h1 class="text-2xl font-bold mb-4">Detail Penjualan</h1>

                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <tbody>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">Tanggal Penjualan:</th>
                                    <td class="border border-gray-300 px-4 py-2">{{ $penjualan->tanggal_penjualan }}
                                    </td>
                                </tr>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">Total Harga:</th>

                                    <td class="border border-gray-300 px-4 py-2">Rp.
                                        {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2 w-1/3">Pelanggan:</th>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $penjualan->pelanggan->nama_pelanggan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h3 class="text-xl font-bold my-4">Detail Produk</h3>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="border border-gray-300 px-4 py-2">Nama Produk</th>
                                    <th class="border border-gray-300 px-4 py-2">Jumlah</th>
                                    <th class="border border-gray-300 px-4 py-2">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan->detailPenjualan as $detail)
                                    <tr class="border-b border-gray-200">
                                        <td class="border border-gray-300 px-4 py-2">{{ $detail->produk->namaproduk }}
                                        </td>
                                        <td class="border border-gray-300 px-4 py-2">{{ $detail->jumlah_produk }}</td>
                                        <td class="border border-gray-300 px-4 py-2">Rp.
                                            {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                <tr class="font-bold">
                                    <td class=" border border-gray-300 px-4 py-2" colspan="2">Total Harga
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">Rp.
                                        {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
