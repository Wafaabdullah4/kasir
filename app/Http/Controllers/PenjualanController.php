<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;

class PenjualanController extends Controller
{
    public function index()
    {
        $datapenjualans = Penjualan::all();
        return view('penjualan.index', compact('datapenjualans'));
    }

    public function create()
    {
        return view('penjualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
        ]);

        Penjualan::create($request->all());

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil disimpan.');
    }

    public function show(Penjualan $penjualan)
    {
        return view('penjualan.show', compact('penjualan'));
    }

    public function edit(Penjualan $penjualan)
    {
        return view('penjualan.edit', compact('penjualan'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'total_harga' => 'required|numeric|min:0',
        ]);

        $penjualan->update($request->all());

        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil diperbarui.');
    }

    public function destroy(Penjualan $penjualan)
    {
        $penjualan->delete();
        return redirect()->route('penjualan.index')
            ->with('success', 'Data penjualan berhasil dihapus.');
    }
}
