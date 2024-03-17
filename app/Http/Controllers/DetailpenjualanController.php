<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detailpenjualan;
use App\Models\Produk;

class DetailpenjualanController extends Controller
{
    public function index()
    {

        $detailpenjualans = Detailpenjualan::all();
        return view('detailpenjualan.index', compact('detailpenjualans'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('detailpenjualan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualanid' => 'required',
            'produkid' => 'required',
            'jumlah_produk' => 'required|numeric|min:1',
            'subtotal' => 'required|numeric|min:0'
        ]);

        // Cek stok produk yang tersedia
        $produk = Produk::findOrFail($request->produkid);
        if ($produk->stok < $request->jumlah_produk) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
        }

        // Kurangi stok produk yang terkait
        $stok_terbaru = $produk->stok - $request->jumlah_produk;
        $produk->update(['stok' => $stok_terbaru]);

        Detailpenjualan::create($request->all());

        return redirect()->route('detailpenjualan.index')
            ->with('success', 'Detail penjualan berhasil ditambahkan.');
    }

    public function edit(Detailpenjualan $detailpenjualan)
    {
        $produks = Produk::all();
        return view('detailpenjualan.edit', compact('detailpenjualan', 'produks'));
    }

    public function update(Request $request, Detailpenjualan $detailpenjualan)
    {
        $request->validate([
            'penjualanid' => 'required',
            'produkid' => 'required',
            'jumlah_produk' => 'required|numeric|min:1',
            'subtotal' => 'required|numeric|min:0'
        ]);

        // Cek perubahan jumlah produk
        $jumlah_produk_lama = $detailpenjualan->jumlah_produk;
        $jumlah_produk_baru = $request->jumlah_produk;

        // Hitung selisih jumlah produk
        $selisih = $jumlah_produk_baru - $jumlah_produk_lama;

        // Cek stok produk yang tersedia
        $produk = Produk::findOrFail($request->produkid);
        if ($produk->stok < $selisih) {
            return redirect()->back()->with('error', 'Stok produk tidak mencukupi.');
        }

        // Update stok produk yang terkait
        $stok_terbaru = $produk->stok - $selisih;
        $produk->update(['stok' => $stok_terbaru]);

        // Update detail penjualan
        $detailpenjualan->update($request->all());

        return redirect()->route('detailpenjualan.index')
            ->with('success', 'Detail penjualan berhasil diperbarui.');
    }

    public function destroy(Detailpenjualan $detailpenjualan)
    {
        // Hapus detail penjualan
        $detailpenjualan->delete();

        return redirect()->route('detailpenjualan.index')
            ->with('success', 'Detail penjualan berhasil dihapus.');
    }
}
