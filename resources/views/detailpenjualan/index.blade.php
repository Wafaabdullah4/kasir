@extends('layouts.navAdmin')

@section('tittle')
Detail Penjualan
@endsection
@section('content')

<div class="flex-none w-full max-w-full px-3">
    <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Detail Penjualan</p>
                    <!-- Form Filter Tanggal -->
                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">Filter berdasarkan tanggal</p>
                    <form action="{{ route('detail') }}" method="GET" class="mb-4">
                        <div class="flex items-center">
                            <label for="start_date" class="mr-2">Mulai Tanggal:</label>
                            <input type="date" id="start_date" name="start_date" class="p-2 border rounded-full mr-4"
                                value="{{ request('start_date') }}">
                            <label for="end_date" class="mr-2">Sampai Tanggal:</label>
                            <input type="date" id="end_date" name="end_date" class="p-2 border rounded-md mr-4"
                                value="{{ request('end_date') }}">
                            <button type="submit" class="px-4 text-xs py-2 bg-blue-500 text-white rounded-md">Filter</button>
                            <a href="{{ route('detail') }}"
                            class="px-4 text-xs py-2 bg-blue-500 text-white rounded-md mx-3">Refresh</a>
                        </div>
                    </form>
                    @if (session('error'))
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                            role="alert">
                            <span class="block sm:inline">{{ session('error') }}</span>
                        </div>
                    @endif



                    <div class="overflow-x-auto">
                        <table class="w-full bg-white shadow-md rounded my-6">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Tanggal Penjualan</th>
                                    <th class="py-3 px-6 text-left">Nama Pelanggan</th>
                                    <th class="py-3 px-6 text-left">Nama Produk</th>
                                    <th class="py-3 px-6 text-left">Jumlah Produk</th>
                                    <th class="py-3 px-6 text-left">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                @php
                                    $groupedDetailPenjualans = $detailpenjualans->groupBy(
                                        'penjualan.tanggal_penjualan',
                                    );
                                    $totalSubtotal = 0;
                                @endphp
                                @foreach ($groupedDetailPenjualans as $tanggal => $details)
                                    @php
                                        $subtotal = 0;
                                    @endphp
                                    @foreach ($details as $index => $detail)
                                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                                            @if ($index === 0)
                                                <td rowspan="{{ $details->count() }}"
                                                    class="py-3 px-6 text-left whitespace-nowrap">
                                                    {{ \Carbon\Carbon::parse($detail->penjualan->tanggal_penjualan)->translatedFormat('d F Y') }}
                                                </td>
                                            @endif
                                            <td class="py-3 px-6 text-left">
                                                {{ $detail->penjualan->pelanggan->nama_pelanggan }}</td>
                                            <td class="py-3 px-6 text-left">{{ $detail->produk->namaproduk }}</td>
                                            <td class="py-3 px-6 text-left">{{ $detail->jumlah_produk }}</td>
                                            <td class="py-3 px-6 text-left">Rp
                                                {{ number_format($detail->subtotal, 0, ',', '.') }}</td>
                                        </tr>
                                        @php
                                            $subtotal += $detail->subtotal;
                                            $totalSubtotal += $detail->subtotal;
                                        @endphp
                                    @endforeach
                                    {{-- <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                        <td colspan="4" class="py-3 px-6 text-right font-bold">Total Tanggal
                                            {{ \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y') }}</td>
                                        <td class="py-3 px-6 text-left font-bold" colspan="2">Rp
                                            {{ number_format($subtotal, 0, ',', '.') }}</td>
                                    </tr> --}}
                                @endforeach
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <td colspan="4" class="py-3 px-6 text-left font-bold">Jumlah Total</td>
                                    <td class="py-3 px-6 text-left font-bold">Rp
                                        {{ number_format($totalSubtotal, 0, ',', '.') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection
