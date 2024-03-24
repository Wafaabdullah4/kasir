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

                    <div class="container mx-auto">
                        <h2 class="text-2xl font-semibold mb-4">Tambah Penjualan</h2>
                        <form action="{{ route('penjualan.store') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="tanggal_penjualan" class="block font-medium text-gray-700">Tanggal
                                    Penjualan</label>
                                <input type="date" id="tanggal_penjualan" name="tanggal_penjualan"
                                    class="mt-1 p-2 border rounded-md w-full" required>
                            </div>
                            <div class="mb-4">
                                <label for="total_harga" class="block font-medium text-gray-700">Total Harga</label>
                                <input type="number" id="total_harga" name="total_harga"
                                    class="mt-1 p-2 border rounded-md w-full" readonly>
                            </div>
                            <div class="mb-4">
                                <label for="pelangganid" class="block font-medium text-gray-700">Pelanggan</label>
                                <select id="pelangganid" name="pelangganid" class="mt-1 p-2 border rounded-md w-full"
                                    required>
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach ($pelanggans as $pelanggan)
                                        <option value="{{ $pelanggan->pelangganid }}">{{ $pelanggan->nama_pelanggan }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-4">
                                <label for="detail" class="block font-medium text-gray-700">Detail Penjualan</label>
                                <table class="border-collapse border border-gray-300 w-full">
                                    <thead>
                                        <tr class="bg-gray-100">
                                            <th class="border border-gray-300 p-2">Produk</th>
                                            <th class="border border-gray-300 p-2">Jumlah Produk</th>
                                            <th class="border border-gray-300 p-2">Subtotal</th>
                                            <th class="border border-gray-300 p-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="dynamic_field">
                                        <tr>
                                            <td>
                                                <select name="detail[0][produkid]"
                                                    class="mt-1 p-2 border rounded-md w-full produk-select" required>
                                                    <option value="">Pilih Produk</option>
                                                    @foreach ($produks as $produk)
                                                        @if ($produk->stok > 0)
                                                            <option value="{{ $produk->produkid }}"
                                                                data-harga="{{ $produk->harga }}">
                                                                {{ $produk->namaproduk }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </td>
                                            <td><input type="number" name="detail[0][jumlah_produk]"
                                                    class="mt-1 p-2 border rounded-md w-full jumlah-produk" required>
                                            </td>
                                            <td><input type="number" name="detail[0][subtotal]"
                                                    class="mt-1 p-2 border rounded-md w-full subtotal" readonly></td>
                                            <td><button type="button" name="remove" id="add"
                                                    class="px-4 py-2 bg-red-500 text-white rounded-md btn_remove">Tambah</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="button" name="add" id="add"
                                    class="mt-4 px-4 py-2 bg-green-500 text-white rounded-md">Tambah Produk</button>
                            </div>
                            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">Simpan</button>
                        </form>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            var i = 0;
                            document.getElementById('add').addEventListener('click', function() {
                                i++;
                                var dynamicField = document.getElementById('dynamic_field');
                                var newRow = document.createElement('tr');
                                newRow.id = 'row' + i;
                                newRow.innerHTML =
                                    `
                                    <td>
                                        <select name="detail[${i}][produkid]" class="mt-1 p-2 border rounded-md w-full produk-select" required>
                                            <option value="">Pilih Produk</option>
                                            @foreach ($produks as $produk)
                                                <option value="{{ $produk->produkid }}" data-harga="{{ $produk->harga }}">{{ $produk->namaproduk }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" name="detail[${i}][jumlah_produk]" class="mt-1 p-2 border rounded-md w-full jumlah-produk" required></td>
                                    <td><input type="number" name="detail[${i}][subtotal]" class="mt-1 p-2 border rounded-md w-full subtotal" readonly></td>
                                    <td><button type="button" name="remove" id="${i}" class="px-4 py-2 bg-red-500 text-white rounded-md btn_remove">Hapus</button></td>`;
                                dynamicField.appendChild(newRow);
                            });

                            document.getElementById('dynamic_field').addEventListener('change', function(event) {
                                var target = event.target;
                                if (target.classList.contains('produk-select') || target.classList.contains(
                                        'jumlah-produk')) {
                                    var row = target.closest('tr');
                                    var harga = row.querySelector('.produk-select').selectedOptions[0].getAttribute(
                                        'data-harga');
                                    var jumlahProduk = row.querySelector('.jumlah-produk').value;
                                    row.querySelector('.subtotal').value = harga * jumlahProduk;
                                    calculateTotal();
                                }
                            });

                            document.addEventListener('click', function(event) {
                                if (event.target && event.target.className === 'btn_remove') {
                                    var buttonId = event.target.id;
                                    document.getElementById('row' + buttonId).remove();
                                    calculateTotal();
                                }
                            });

                            function calculateTotal() {
                                var subtotals = document.querySelectorAll('.subtotal');
                                var totalHarga = 0;
                                subtotals.forEach(function(subtotal) {
                                    totalHarga += parseFloat(subtotal.value);
                                });
                                document.getElementById('total_harga').value = totalHarga;
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>
