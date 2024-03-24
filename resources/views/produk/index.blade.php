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
                        class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah
                        Produk Baru</a>

                    <!-- Tampilkan daftar produk yang stoknya masih tersedia -->
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                                    <th class="py-3 px-6 text-left">ID</th>
                                    <th class="py-3 px-6 text-left">Nama Produk</th>
                                    <th class="py-3 px-6 text-left">Harga</th>
                                    <th class="py-3 px-6 text-left">Stok</th>
                                    <th class="py-3 px-6 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @php $no = 1; @endphp
                                @foreach ($produks as $produk)
                                    @if ($produk->stok > 0)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            <td class="py-3 px-6 text-left">{{ $no++ }}</td>
                                            <td class="py-3 px-6 text-left">{{ $produk->namaproduk }}</td>
                                            <td class="py-3 px-6 text-left">Rp
                                                {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                            <td class="py-3 px-6 text-left">{{ $produk->stok }}</td>
                                            <td class="py-3 px-6 text-left">
                                                <a href="{{ route('produk.edit', $produk->produkid) }}"
                                                    class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                                <form action="{{ route('produk.destroy', $produk->produkid) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-500 hover:text-red-700">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Tempatkan daftar produk yang stoknya habis di sini -->
                    <h2 class="text-2xl font-bold mt-8 mb-4">Produk yang Stoknya Habis</h2>
                    <div class="text-gray-600 text-sm font-light">
                        @foreach ($produks as $produk)
                            @if ($produk->stok == 0)
                                <p>{{ $produk->namaproduk }} - <a href="#"
                                        class="text-blue-500 hover:text-blue-700"
                                        onclick="showUpdateForm({{ $produk->produkid }})">Tambah Stok & Ubah Harga</a>
                                </p>
                                <!-- Form untuk menambah stok dan mengubah harga -->
                                <form action="{{ route('produk.updateStockAndPrice', $produk->produkid) }}"
                                    method="POST" id="form-{{ $produk->produkid }}" class="hidden mt-4">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-2">
                                        <label for="stok_{{ $produk->produkid }}"
                                            class="block text-sm font-medium text-gray-700">Stok Baru</label>
                                        <input type="number" id="stok_{{ $produk->produkid }}" name="stok"
                                            class="mt-1 p-2 border rounded-md w-full" required>
                                    </div>
                                    <div class="mt-4">
                                        <label for="harga_{{ $produk->produkid }}"
                                            class="block text-sm font-medium text-gray-700">Harga Baru</label>
                                        <input type="number" id="harga_{{ $produk->produkid }}" name="harga"
                                            class="mt-1 p-2 border rounded-md w-full" required>
                                    </div>
                                    <div class="mt-4">
                                        <button type="submit"
                                            class="px-4 py-2 bg-blue-500 text-white rounded-md">Simpan</button>
                                        <button type="button" class="px-4 py-2 bg-red-500 text-white rounded-md ml-2"
                                            onclick="hideUpdateForm({{ $produk->produkid }})">Batal</button>
                                    </div>
                                </form>
                            @endif
                        @endforeach
                    </div>

                    <script>
                        function showUpdateForm(productId) {
                            document.getElementById('form-' + productId).classList.remove('hidden');
                        }

                        function hideUpdateForm(productId) {
                            document.getElementById('form-' + productId).classList.add('hidden');
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
