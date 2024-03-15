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
                    <h1 class="text-2xl font-bold mb-4">Daftar Pelanggan</h1>
                    <a href="{{ route('pelanggan.create') }}"
                        class="inline-block mb-4 px-4 py-2 bg-blue-500 text-gray-600 rounded hover:bg-blue-600">Tambah
                        Pelanggan Baru</a>
                    <table class="w-full border-collapse border border-gray-200">
                        <thead>
                            <tr class="bg-gray-200">
                                <th class="py-2 px-4">ID</th>
                                <th class="py-2 px-4">Nama Pelanggan</th>
                                <th class="py-2 px-4">Alamat</th>
                                <th class="py-2 px-4">Nomor Telepon</th>
                                <th class="py-2 px-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($pelanggans as $pelanggan)
                                <tr class="border">
                                    <td class="py-2 px-4">{{ $no++ }}</td>
                                    <td class="py-2 px-4">{{ $pelanggan->nama_pelanggan }}</td>
                                    <td class="py-2 px-4">{{ $pelanggan->alamat }}</td>
                                    <td class="py-2 px-4">{{ $pelanggan->nomor_telepon }}</td>
                                    <td class="py-2 px-4">
                                        <form action="{{ route('pelanggan.destroy', $pelanggan->pelangganid) }}"
                                            method="POST">
                                            <a href="{{ route('pelanggan.edit', $pelanggan->pelangganid) }}"
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
