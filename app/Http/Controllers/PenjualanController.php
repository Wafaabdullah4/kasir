<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Produk;

class PenjualanController extends Controller
{
    public function index()
    {
        // Ambil data penjualan dan tampilkan pada view

        $penjualans = Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    public function detailpenjualan(Request $request)
    {
        // Ambil tanggal awal dan akhir dari request
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        // Validasi rentang tanggal
        $startCarbon = Carbon::parse($start_date);
        $endCarbon = Carbon::parse($end_date);

        if ($startCarbon->diffInDays($endCarbon) > 31) {
            return redirect()->route('detail')->with('error', 'Rentang tanggal tidak boleh lebih dari 31 hari.');
        }

        // Ambil data detail penjualan
        $detailpenjualans = DetailPenjualan::query();

        // Filter berdasarkan rentang tanggal jika parameter tanggal diberikan
        if ($request->has('start_date') && $request->has('end_date')) {
            $detailpenjualans->whereHas('penjualan', function ($query) use ($start_date, $end_date) {
                $query->whereBetween('tanggal_penjualan', [$start_date, $end_date]);
            });
        }

        $detailpenjualans = $detailpenjualans->get();

        return view('detailpenjualan.index', compact('detailpenjualans'));
    }


    public function create()
    {
        // Ambil data pelanggan dan produk untuk dropdown
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('penjualan.create', compact('pelanggans', 'produks'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'pelangganid' => 'required|exists:pelanggan,pelangganid',
            'detail' => 'required|array',
            'detail.*.produkid' => 'required|exists:produk,produkid',
            'detail.*.jumlah_produk' => 'required|integer|min:1',
        ]);

        // Hitung total harga dan simpan data penjualan
        $total_harga = 0;
        foreach ($request->detail as $detail) {
            $produk = Produk::findOrFail($detail['produkid']);
            $subtotal = $produk->harga * $detail['jumlah_produk'];
            $total_harga += $subtotal;

            // Validasi stok
            if ($detail['jumlah_produk'] > $produk->stok) {
                return redirect()->back()->with('error', 'Jumlah produk melebihi stok yang tersedia.');
            }

            // Kurangi stok produk
            $produk->stok -= $detail['jumlah_produk'];
            $produk->save();
        }

        // Simpan data penjualan
        $penjualan = Penjualan::create([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'total_harga' => $total_harga,
            'pelangganid' => $request->pelangganid,
        ]);

        // Simpan detail penjualan
        foreach ($request->detail as $detail) {
            $subtotal = Produk::findOrFail($detail['produkid'])->harga * $detail['jumlah_produk'];
            $penjualan->detailPenjualan()->create([
                'produkid' => $detail['produkid'],
                'jumlah_produk' => $detail['jumlah_produk'],
                'subtotal' => $subtotal,
            ]);
        }

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $pelanggans = Pelanggan::all();
        $produks = Produk::all();
        return view('penjualan.edit', compact('penjualan', 'pelanggans', 'produks'));
    }

    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'pelangganid' => 'required|exists:pelanggan,pelangganid',
            'detail' => 'required|array',
            'detail.*.produkid' => 'required|exists:produk,produkid',
            'detail.*.jumlah_produk' => 'required|integer|min:1',
        ]);

        // Temukan penjualan berdasarkan ID
        $penjualan = Penjualan::findOrFail($id);

        // Hapus detail penjualan yang ada
        $penjualan->detailPenjualan()->delete();

        // Inisialisasi array untuk menyimpan jumlah produk yang perlu dikembalikan ke stok
        $produkToUpdateStock = [];

        // Hitung total harga dari detail penjualan yang diperbarui
        $total_harga = 0;
        foreach ($request->detail as $detail) {
            $produk = Produk::findOrFail($detail['produkid']);
            $subtotal = $produk->harga * $detail['jumlah_produk'];
            $total_harga += $subtotal;

            // Periksa apakah jumlah produk pada detail penjualan sebelumnya
            // kurang dari atau sama dengan jumlah produk yang baru diupdate
            if ($penjualan->detailPenjualan()->where('produkid', $detail['produkid'])->exists()) {
                $prevDetail = $penjualan->detailPenjualan()->where('produkid', $detail['produkid'])->first();
                if ($prevDetail->jumlah_produk <= $detail['jumlah_produk']) {
                    $diff = $detail['jumlah_produk'] - $prevDetail->jumlah_produk;
                    $produkToUpdateStock[$detail['produkid']] = $diff;
                }
            }

            // Validasi stok
            if ($detail['jumlah_produk'] > $produk->stok) {
                return redirect()->back()->with('error', 'Jumlah produk melebihi stok yang tersedia.');
            }

            // Kurangi stok produk
            $produk->stok -= $detail['jumlah_produk'];
            $produk->save();

            // Simpan detail penjualan
            $penjualan->detailPenjualan()->create([
                'produkid' => $detail['produkid'],
                'jumlah_produk' => $detail['jumlah_produk'],
                'subtotal' => $subtotal,
            ]);
        }

        // Kembalikan jumlah produk ke stok untuk produk yang jumlahnya dikurangi sebelumnya
        foreach ($produkToUpdateStock as $produkid => $diff) {
            $produk = Produk::findOrFail($produkid);
            $produk->stok += $diff;
            $produk->save();
        }

        // Update data penjualan
        $penjualan->update([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'pelangganid' => $request->pelangganid,
            'total_harga' => $total_harga, // Jika total harga dihitung ulang dari detail penjualan
        ]);

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil diperbarui!');
    }



    public function show($penjualanid)
    {
        $penjualan = Penjualan::findOrFail($penjualanid);
        $detailpenjualan = DetailPenjualan::all();
        return view('penjualan.detail', compact('penjualan', 'detailpenjualan'));
    }


    public function destroy($id)
    {
        // Temukan penjualan berdasarkan ID
        $penjualan = Penjualan::findOrFail($id);

        // Hapus detail penjualan terlebih dahulu
        $penjualan->detailPenjualan()->delete();

        // Hapus penjualan
        $penjualan->delete();

        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil dihapus!');
    }
}
