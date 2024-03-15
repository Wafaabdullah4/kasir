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
                        class="inline-block mb-4 px-4 py-2 bg-blue-500 text-gray-900 rounded hover:bg-blue-600">Tambah
                        Penjualan Baru</a>
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200">ID</th>
                                <th class="py-2 px-4 bg-gray-200">Tanggal Penjualan</th>
                                <th class="py-2 px-4 bg-gray-200">Total Harga</th>
                                <th class="py-2 px-4 bg-gray-200">Nama Pelanggan</th>
                                <th class="py-2 px-4 bg-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($penjualans as $penjualan)
                                <tr>
                                    <td class="border px-4 py-2">{{ $no++ }}</td>
                                    <td class="border px-4 py-2">{{ $penjualan->tanggal_penjualan }}</td>
                                    <td class="border px-4 py-2">Rp
                                        {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                    <td class="border px-4 py-2">{{ $penjualan->pelanggan->nama_pelanggan }}</td>

                                    <td class="border px-4 py-2">
                                        <form action="{{ route('penjualan.destroy', $penjualan->penjualanid) }}"
                                            method="POST">
                                            <a href="{{ route('penjualan.edit', $penjualan->penjualanid) }}"
                                                class="text-blue-500 hover:underline">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="ml-2 text-red-500 hover:underline">Hapus</button>
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
</x-app-layout>
