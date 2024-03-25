@extends('layouts.navAdmin')
@section('content')
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Tambah Produk Baru</h1>
                    <form action="{{ route('produk.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="namaproduk" class="block text-sm font-medium text-gray-700">Nama Produk:</label>
                            <input type="text" id="namaproduk" name="namaproduk"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                            <input type="number" id="harga" name="harga" step="0.01"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="stok" class="block text-sm font-medium text-gray-700">Stok:</label>
                            <input type="number" id="stok" name="stok"
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
    </div> --}}


    <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6">
                <h1 class="text-xl font-bold mb-4">Tambah Produk Baru</h1>
                <form action="{{ route('produk.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="namaproduk" class="block text-sm font-medium text-gray-700">Nama Produk:</label>
                        <input type="text" id="namaproduk" name="namaproduk" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="harga" class="block text-sm font-medium text-gray-700">Harga:</label>
                        <input type="number" id="harga" name="harga" class="mt-1 p-2 border rounded-md w-full">
                    </div>
                    <div class="mb-4">
                        <label for="stok" class="block text-sm font-medium text-gray-700">Stok:</label>
                        <input type="number" id="stok" name="stok" class="mt-1 p-2 border rounded-md w-full " min="1">
                    </div>
                    <div class="mt-4">
                        <button type="submit" class="inline-block w-1/3 px-8 py-2 my-3 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @endsection
