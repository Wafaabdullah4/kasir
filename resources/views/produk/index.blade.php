@extends('layouts.navAdmin')
@section('content')

    {{-- <div class="py-12">
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
                                <p>{{ $produk->namaproduk }} - <a href="#" class="text-blue-500 hover:text-blue-700"
                                        onclick="showUpdateForm({{ $produk->produkid }})">Tambah Stok & Ubah Harga</a>
                                </p>
                                <!-- Form untuk menambah stok dan mengubah harga -->
                                <form action="{{ route('produk.updateStockAndPrice', $produk->produkid) }}" method="POST"
                                    id="form-{{ $produk->produkid }}" class="hidden mt-4">
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
    </div> --}}

    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="dark:text-white">Produk</h6>
                <a href="{{ route('produk.create') }}"
                    class="inline-block w-1/3 px-8 py-2 my-3 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px">Tambah
                    Produk Baru</a>
            </div>
            <div class="flex-auto px-0 pt-0 pb-2">

                <div class="p-0 overflow-x-auto">
                    <table class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                        <thead class="align-bottom">
                            <tr>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    No</th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Nama Produk</th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Harga</th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Stok</th>
                                <th class="px-6 py-3 font-bold  uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 "
                                    >Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @foreach ($produks as $produk)
                                @if ($produk->stok > 0)
                                    <tr>
                                        <td
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            {{ $no++ }}</td>
                                            <td
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            {{ $produk->namaproduk }}</td>
                                        <td
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>

                                        <td
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            {{ $produk->stok }}</td>
                                        <td
                                            class="  px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                            <form action="{{ route('produk.destroy', $produk->produkid) }}"
                                                method="POST">
                                                <a href="{{ route('produk.edit', $produk->produkid) }}"
                                                    class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"><i
                                                        class="mr-2 fas fa-pencil-alt text-slate-700"
                                                        aria-hidden="true"></i>Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"><i
                                                        class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endif
                                @endforeach
                        </tbody>
                    </table>
                    <h6 class="mb-0 font-bold text-slate-400 mt-10 text-center capitalize">Produk yang Stoknya Habis</h6>
                    <div class="text-gray-600 text-sm mx-3 font-light">
                        @foreach ($produks as $produk)
                            @if ($produk->stok == 0)
                                <p>{{ $produk->namaproduk }} - <a href="#" class="text-blue-500 hover:text-blue-700"
                                        onclick="showUpdateForm({{ $produk->produkid }})">Tambah Stok & Ubah Harga</a>
                                </p>
                                <!-- Form untuk menambah stok dan mengubah harga -->
                                <form action="{{ route('produk.updateStockAndPrice', $produk->produkid) }}" method="POST"
                                    id="form-{{ $produk->produkid }}" class="hidden mt-4">
                                    @csrf
                                    @method('PUT')
                                    <div class="mt-2">
                                        <label for="stok_{{ $produk->produkid }}"
                                            class="block text-sm font-medium text-gray-700">Stok Baru</label>
                                        <input type="number" id="stok_{{ $produk->produkid }}" name="stok"
                                            class="mt-1 p-2 border rounded-md w-32" required>
                                    </div>
                                    <div class="mt-4">
                                        <label for="harga_{{ $produk->produkid }}"
                                            class="block text-sm font-medium text-gray-700">Harga </label>
                                        <input type="number" id="harga_{{ $produk->produkid }}" name="harga"
                                            class="mt-1 p-2 border rounded-md w-32" required>
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
                </div>
            </div>
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
@endsection
