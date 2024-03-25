@extends('layouts.navAdmin')
@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-4">Edit Petugas</h1>
                    <form action="{{ route('petugas.update', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Nama Petugas:</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email:</label>
                            <input type="text" id="email" name="email" value="{{ $user->email }}"
                                class="mt-1 p-2 border rounded-md w-full">
                        </div>
                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password:</label>
                            <input type="text" id="password" name="password" value="{{ $user->password }}"
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
    </div>
@endsection
