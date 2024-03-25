@extends('layouts.navAdmin')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <h1 class="text-2xl font-bold mb-4">Data Petugas</h1>
                <a href="{{ route('users.create') }}"
                    class="inline-block mb-4 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Tambah
                    Petugas</a>

                <!-- Tampilkan daftar petugas -->
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm">
                                <th class="py-3 px-6 text-left">No</th>
                                <th class="py-3 px-6 text-left">Nama Petugas</th>
                                <th class="py-3 px-6 text-left">Email</th>
                                <th class="py-3 px-6 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @php $no = 1; @endphp
                            @foreach ($users as $petugas)
                            @if ($petugas->usertype == 'user')
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left">{{ $no++ }}</td>
                                <td class="py-3 px-6 text-left">{{ $petugas->name }}</td>
                                <td class="py-3 px-6 text-left">{{ $petugas->email }}</td>
                                <td class="py-3 px-6 text-left">
                                    <a href="{{ route('users.edit', $petugas->id) }}"
                                        class="text-blue-500 hover:text-blue-700 mr-2">Edit</a>
                                    <form action="{{ route('users.destroy', $petugas->id) }}" method="POST"
                                        class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-700">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
