@extends('layouts.navAdmin')
@section('content')
    {{-- <div class="py-12">
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
                                                <button type="submit" class="text-red-500 hover:underline">Hapus</button>
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
    </div> --}}

    <div class="flex-none w-full max-w-full px-3">
        <div
            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <h6 class="dark:text-white">Daftar Penjualan</h6>
                <a href="{{ route('penjualan.create') }}"
                    class="inline-block w-1/4 px-8 py-2 my-3 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px">Tambah
                    Penjualan Baru</a>
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
                                    Tanggal</th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Total Harga</th>
                                <th
                                    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70">
                                    Pelanggan</th>
                                <th class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70 "
                                    colspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sortedPenjualans = $penjualans->sortBy('tanggal_penjualan');
                            @endphp
                            @foreach ($sortedPenjualans as $penjualan)
                                <tr>

                                    <td
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        {{ $loop->iteration }}</td>
                                    <td
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        {{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->translatedFormat('d F Y', 'id') }}
                                    </td>
                                    <td
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                    </td>
                                    <td
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70"class="px-6 py-3 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                        {{ $penjualan->pelanggan->nama_pelanggan }}</td>
                                    </td>
                                    <td
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-70" colspan="3">
                                        <form action="{{ route('penjualan.destroy', $penjualan->penjualanid) }}"
                                            method="POST">
                                            <a href="{{ route('penjualan.edit', $penjualan->penjualanid) }}"
                                                class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"><i
                                                    class="mr-2 fas fa-pencil-alt text-slate-700"
                                                    aria-hidden="true"></i>Edit</a>
                                                    <a href="{{ route('penjualan.show', $penjualan->penjualanid) }}"
                                                        class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold text-center align-middle transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700">Detail</a>

                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-center text-transparent align-middle transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal text-sm ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"><i
                                                    class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Hapus</button>
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
@endsection
