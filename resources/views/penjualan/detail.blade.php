@extends('layouts.navAdmin')
@section('content')
    <div class="py-6">
        <div class="max-w-full mx-auto sm:px-4 lg:px-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4">
                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Detail Penjualan</p>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <tbody>
                                <tr class="bg-gray-50">
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-100">
                                        Tanggal Penjualan:</th>
                                    <td
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                        {{ \Carbon\Carbon::parse($penjualan->tanggal_penjualan)->translatedFormat('d F Y ') }}
                                    </td>
                                </tr>
                                <tr class="bg-gray-50">
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-100">
                                        Total Harga:</th>
                                    <td
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                        Rp. {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                </tr>
                                <tr class="bg-gray-50">
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-100">
                                        Pelanggan:</th>
                                    <td
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                        {{ $penjualan->pelanggan->nama_pelanggan }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                            <p class="leading-normal mt-10 uppercase dark:text-white dark:opacity-60 text-sm">Detail Produk</p>
                    <div class="overflow-x-auto">
                        <table class="w-full border-collapse border border-gray-300">
                            <thead>
                                <tr class="bg-gray-50">
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                        Nama Produk</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                        Jumlah</th>
                                    <th
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                        Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualan->detailPenjualan as $detail)
                                    <tr class="border-b border-gray-200">
                                        <td
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                            {{ $detail->produk->namaproduk }}</td>
                                        <td
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                            {{ $detail->jumlah_produk }}</td>
                                        <td
                                            class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                            Rp. {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                                <tr class="font-bold">
                                    <td    class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200" colspan="2">Total Harga</td>
                                    <td
                                        class="px-6 py-3 font-bold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-400 opacity-200">
                                        Rp. {{ number_format($penjualan->total_harga, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="w-full max-w-full px-3 lg:flex-none">
        <div class="relative flex flex-col h-full min-w-0 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
            <div class="p-4 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                <div class="flex flex-wrap -mx-3">
                    <div class="flex items-center flex-none w-1/2 max-w-full px-3">
                        <h6 class="mb-0 dark:text-white">Detail Penjualan</h6>
                    </div>
                </div>
            </div>
            <div class="flex-auto p-4 pb-0">
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-t-inherit text-inherit rounded-xl">
                        <div class="flex flex-col">
                            <h6 class="mb-1 text-sm font-semibold leading-normal dark:text-white text-slate-700">Tanggal Penjualan:</h6>
                            <span class="text-xs leading-tight dark:text-white dark:opacity-80">{{ $penjualan->tanggal_penjualan }}</span>
                        </div>
                    </li>
                    <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-xl text-inherit">
                        <div class="flex flex-col">
                            <h6 class="mb-1 text-sm font-semibold leading-normal dark:text-white text-slate-700">Total Harga:</h6>
                            <span class="text-xs leading-tight dark:text-white dark:opacity-80">Rp. {{ number_format($penjualan->total_harga, 0, ',', '.') }}</span>
                        </div>
                    </li>
                    <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-xl text-inherit">
                        <div class="flex flex-col">
                            <h6 class="mb-1 text-sm font-semibold leading-normal dark:text-white text-slate-700">Pelanggan:</h6>
                            <span class="text-xs leading-tight dark:text-white dark:opacity-80">{{ $penjualan->pelanggan->nama_pelanggan }}</span>
                        </div>
                    </li>
                </ul>
                <h3 class="text-xl font-bold my-4">Detail Produk</h3>
                <ul class="flex flex-col pl-0 mb-0 rounded-lg">
                    @foreach ($penjualan->detailPenjualan as $detail)
                    <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-xl text-inherit">
                        <div class="flex flex-col">
                            <h6 class="mb-1 text-sm font-semibold leading-normal dark:text-white text-slate-700">Nama Produk:</h6>
                            <span class="text-xs leading-tight dark:text-white dark:opacity-80">{{ $detail->produk->namaproduk }}</span>
                            <span class="mr-2">{{ $detail->jumlah_produk }}</span>

                        </div>

                        <div class="flex items-center text-sm leading-normal dark:text-white/80">
                        <span>Sub Total=    Rp. {{ number_format($detail->subtotal, 0, ',', '.') }}</span>
                        </div>
                    </li>
                    @endforeach
                    <li class="relative flex justify-between px-4 py-2 pl-0 mb-2 border-0 rounded-xl text-inherit">
                        <div class="flex flex-col">
                            <h6 class="mb-1 text-sm font-semibold leading-normal dark:text-white text-slate-700">Total Harga:</h6>
                            <span class="text-xs leading-tight dark:text-white dark:opacity-80">Rp. {{ number_format($penjualan->total_harga, 0, ',', '.') }}</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}
@endsection
