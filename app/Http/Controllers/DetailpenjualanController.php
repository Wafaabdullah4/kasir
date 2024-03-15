<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Detailpenjualan;

class DetailpenjualanController extends Controller
{
    public function index()
    {
        $detailpenjualans = Detailpenjualan::all();
        return view('detailpenjualan.index', compact('detailpenjualans'));
    }

    public function create()
    {
        return view('detailpenjualan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualanid' => 'required',
            'produkid' => 'required',
            'jumlah_produk' => 'required',
            'subtotal' => 'required'
        ]);

        Detailpenjualan::create($request->all());

        return redirect()->route('detailpenjualan.index')
            ->with('success', 'Detail penjualan berhasil ditambahkan.');
    }

    // Implementasikan fungsi edit(), update(), destroy() sesuai kebutuhan
}
