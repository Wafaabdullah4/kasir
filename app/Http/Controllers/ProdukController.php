<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'namaproduk' => 'required',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
        ]);

        Produk::create($request->all());

        return redirect()->route('produk.index')
            ->with('success', 'Produk created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            'namaproduk' => 'required',
            'harga' => 'required|numeric|min:0',
            'stok' => 'required|numeric|min:0',
        ]);

        $produk->update($request->all());

        return redirect()->route('produk.index')
            ->with('success', 'Produk updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        $produk->delete();

        return redirect()->route('produk.index')
            ->with('success', 'Produk deleted successfully');
    }


    //update produk yang sudah habis
    public function updateStockAndPrice(Request $request, Produk $produk)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'stok' => 'required|numeric|min:0',
            'harga' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Update stok dan harga produk
        $produk->update([
            'stok' => $request->stok,
            'harga' => $request->harga,
        ]);

        return redirect()->route('produk.index')
            ->with('success', 'Stok and price updated successfully.');
    }
}
