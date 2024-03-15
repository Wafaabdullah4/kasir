<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use App\Models\Produk;

class DetailPenjualanController extends Controller
{
    public function index()
    {
        $detailPenjualans = DetailPenjualan::all();
        return view('detailpenjualan.index', compact('detailPenjualans'));
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
            'jumlah_produk' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $detailPenjualan = DetailPenjualan::create($request->all());

        $produk = Produk::find($request->produkid);
        if ($produk) {
            $produk->stok -= $request->jumlah_produk;
            $produk->save();
        }

        return redirect()->route('detailpenjualan.index')
            ->with('success', 'Detail penjualan berhasil disimpan.');
    }

    public function show(DetailPenjualan $detailPenjualan)
    {
        return view('detailpenjualan.show', compact('detailPenjualan'));
    }

    public function edit(DetailPenjualan $detailPenjualan)
    {
        $produks = Produk::all();
        return view('detailpenjualan.edit', compact('detailPenjualan', 'produks'));
    }

    public function update(Request $request, DetailPenjualan $detailPenjualan)
    {
        $request->validate([
            'penjualanid' => 'required',
            'produkid' => 'required',
            'jumlah_produk' => 'required|integer|min:1',
            'subtotal' => 'required|numeric|min:0',
        ]);

        $detailPenjualan->update($request->all());

        // Kurangi stok produk yang terjual
        $produk = Produk::find($request->produkid);
        if ($produk) {
            $produk->stok -= $request->jumlah_produk;
            $produk->save();
        }

        return redirect()->route('detailpenjualan.index')
            ->with('success', 'Detail penjualan berhasil diperbarui.');
    }

    public function destroy(DetailPenjualan $detailPenjualan)
    {
        $detailPenjualan->delete();
        return redirect()->route('detailpenjualan.index')
            ->with('success', 'Detail penjualan berhasil dihapus.');
    }
}
