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
                    <h1 class="text-2xl font-bold mb-4">Daftar Detail Penjualan</h1>
                    <a href="{{ route('detailpenjualan.create') }}"
                        class="inline-block mb-4 px-4 py-2 bg-blue-500 text-gray-900 rounded hover:bg-blue-600">Tambah
                        Detail Penjualan Baru</a>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200">ID</th>
                                <th class="py-2 px-4 bg-gray-200">Tanggal Penjualan </th>
                                <th class="py-2 px-4 bg-gray-200">Nama Pelanggan </th>
                                <th class="py-2 px-4 bg-gray-200">Nama Produk</th>
                                <th class="py-2 px-4 bg-gray-200">Jumlah Produk</th>
                                <th class="py-2 px-4 bg-gray-200">Subtotal</th>
                                <th class="py-2 px-4 bg-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                                $previousDate = null;
                                $previousCustomer = null;
                                $dateRowCount = 0;
                                $customerRowCount = 0;
                            @endphp
                            @foreach ($detailpenjualans as $detailPenjualan)
                                <tr>
                                    <td class="border px-4 py-2">{{ $no++ }}</td>
                                    @if ($previousDate != $detailPenjualan->penjualan->tanggal_penjualan)
                                        @php $dateRowCount = $detailpenjualans->where('penjualan.tanggal_penjualan', $detailPenjualan->penjualan->tanggal_penjualan)->count(); @endphp
                                        <td rowspan="{{ $dateRowCount }}" class="border px-4 py-2 text-center">
                                            {{ \Carbon\Carbon::parse($detailPenjualan->penjualan->tanggal_penjualan)->translatedFormat('d F Y') }}
                                        </td>
                                    @endif

                                    @if ($previousCustomer != $detailPenjualan->penjualan->pelanggan->nama_pelanggan)
                                        @php $customerRowCount = $detailpenjualans->where('penjualan.pelanggan.nama_pelanggan', $detailPenjualan->penjualan->pelanggan->nama_pelanggan)->count(); @endphp
                                        <td rowspan="{{ $customerRowCount }}" class="border px-4 py-2">
                                            {{ $detailPenjualan->penjualan->pelanggan->nama_pelanggan }}
                                        </td>
                                    @endif

                                    <td class="border px-4 py-2">{{ $detailPenjualan->produk->namaproduk }}</td>
                                    <td class="border px-4 py-2">{{ $detailPenjualan->jumlah_produk }}</td>
                                    <td class="border px-4 py-2">Rp
                                        {{ number_format($detailPenjualan->subtotal, 0, ',', '.') }}</td>

                                    <td class="border px-4 py-2">
                                        <form
                                            action="{{ route('detailpenjualan.destroy', $detailPenjualan->detailid) }}"
                                            method="POST">
                                            <a href="{{ route('detailpenjualan.edit', $detailPenjualan->detailid) }}"
                                                class="text-blue-500 hover:underline">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="ml-2 text-red-500 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @php
                                    $previousDate = $detailPenjualan->penjualan->tanggal_penjualan;
                                    $previousCustomer = $detailPenjualan->penjualan->pelanggan->nama_pelanggan;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
