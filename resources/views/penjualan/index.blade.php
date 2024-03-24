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
                    <h1 class="text-2xl font-bold mb-4">Daftar Penjualan</h1>
                    <a href="{{ route('penjualan.create') }}"
                        class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah
                        Penjualan Baru</a>

                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="py-2 px-4">No</th>
                                    <th class="py-2 px-4">Tanggal</th>
                                    <th class="py-2 px-4">Total Harga</th>
                                    <th class="py-2 px-4">Pelanggan</th>
                                    <th class="py-2 px-4">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sortedPenjualans = $penjualans->sortBy('tanggal_penjualan');
                                @endphp
                                @foreach ($sortedPenjualans as $penjualan)
                                    <tr class="border-b border-gray-200">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">
                                            {{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->translatedFormat('d F Y', 'id') }}
                                        </td>

                                        <td class="px-4 py-3">Rp.
                                            {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                        <td class="px-4 py-3">{{ $penjualan->pelanggan->nama_pelanggan }}</td>
                                        <td class="px-4 py-3">
                                            <a href="{{ route('penjualan.show', $penjualan->penjualanid) }}"
                                                class="text-blue-500 hover:underline mr-2">Detail</a>
                                            <form action="{{ route('penjualan.destroy', $penjualan->penjualanid) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="text-red-500 hover:underline">Hapus</button>
                                                <a href="{{ route('penjualan.edit', $penjualan->penjualanid) }}"
                                                    class="text-blue-500 hover:underline ml-2">Edit</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
