@extends('layouts.navAdmin')
@section('content')
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Tambah Pelanggan Baru</h1>
                    <form action="{{ route('pelanggan.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_pelanggan" class="block text-sm font-medium text-gray-700">Nama
                                Pelanggan:</label>
                            <input type="text" id="nama_pelanggan" name="nama_pelanggan"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat:</label>
                            <input type="text" id="alamat" name="alamat"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor
                                Telepon:</label>
                            <input type="number" id="nomor_telepon" name="nomor_telepon"
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
                    <h1 class="text-xl font-bold mb-4">Tambah Pelanggan Baru</h1>
                    <form action="{{ route('pelanggan.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="nama_pelanggan" class="block text-sm font-medium text-gray-700">Nama Pelanggan:</label>
                            <input type="text" id="nama_pelanggan" name="nama_pelanggan" class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat:</label>
                            <input type="text" id="alamat" name="alamat" class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="nomor_telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon:</label>
                            <input type="number" id="nomor_telepon" name="nomor_telepon" class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mt-4">
                            <button type="submit" class="py-2 px-4 bg-blue-500 text-gray-900 rounded hover:bg-blue-600">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



@endsection
