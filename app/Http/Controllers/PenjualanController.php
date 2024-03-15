<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Pelanggan;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::all();
        return view('penjualan.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all();
        return view('penjualan.create', compact('pelanggans'));
    }

    public function store(Request $request)
    {
        // Validasi data yang dikirimkan
        $validatedData = $request->validate([
            'tanggal_penjualan' => 'required|date',
            'total_harga' => 'required|numeric',
            'pelanggan_id' => 'required|exists:pelanggans,pelangganid'
        ]);

        // Simpan data ke dalam database
        $penjualan = Penjualan::create([
            'tanggal_penjualan' => $validatedData['tanggal_penjualan'],
            'total_harga' => $validatedData['total_harga'],
            'pelanggan_id' => $validatedData['pelanggan_id'],
        ]);

        // Redirect atau response yang sesuai, misalnya kembali ke halaman yang sesuai
        return redirect()->route('penjualan.index')->with('success', 'Penjualan berhasil ditambahkan.');
    }

    public function edit(Penjualan $penjualan)
    {
        return view('penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'total_harga' => 'required|numeric',
            'pelanggan_id' => 'required|exists:pelanggans,PelangganID'
        ]);

        $penjualan->tanggal_penjualan = $request->tanggal_penjualan;
        $penjualan->total_harga = $request->total_harga;
        $penjualan->pelanggan_id = $request->pelanggan_id;
        $penjualan->save();

        return redirect()->route('penjualan.index')
            ->with('success', 'Penjualan berhasil diperbarui.');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();

        return redirect()->route('penjualan.index')
            ->with('success', 'Penjualan berhasil dihapus.');
    }
}
