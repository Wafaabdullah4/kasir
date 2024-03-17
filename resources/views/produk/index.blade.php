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
                    <h1 class="text-2xl font-bold mb-4">Daftar Produk</h1>
                    <a href="{{ route('produk.create') }}"
                        class="inline-block mb-4 px-4 py-2 bg-blue-500 text-gray-900 rounded hover:bg-blue-600">Tambah
                        Produk Baru</a>

                    <!-- Tampilkan daftar produk yang stoknya masih tersedia -->
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th class="py-2 px-4 bg-gray-200">ID</th>
                                <th class="py-2 px-4 bg-gray-200">Nama Produk</th>
                                <th class="py-2 px-4 bg-gray-200">Harga</th>
                                <th class="py-2 px-4 bg-gray-200">Stok</th>
                                <th class="py-2 px-4 bg-gray-200">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($produks as $produk)
                                @if ($produk->stok > 0)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $no++ }}</td>
                                        <td class="border px-4 py-2">{{ $produk->namaproduk }}</td>
                                        <td class="border px-4 py-2">Rp {{ number_format($produk->harga, 0, ',', '.') }}
                                        </td>
                                        <td class="border px-4 py-2">{{ $produk->stok }}</td>
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('produk.destroy', $produk->produkid) }}"
                                                method="POST">
                                                <a href="{{ route('produk.edit', $produk->produkid) }}"
                                                    class="text-blue-500 hover:underline">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="ml-2 text-red-500 hover:underline">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Tempatkan daftar produk yang stoknya habis di sini -->
                    <h2 class="text-2xl font-bold mt-8 mb-4">Produk yang Stoknya Habis</h2>
                    <div class="text-gray-500">
                        @foreach ($produks as $produk)
                            @if ($produk->stok == 0)
                                <p>{{ $produk->namaproduk }}</p>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
