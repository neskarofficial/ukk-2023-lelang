<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barangs = Barang::select('id', 'nama_barang', 'tanggal', 'harga_awal')->orderBy('tanggal', 'desc')->get();
        return view('barang.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'nama_barang' => 'required|min:5|max:25',
                'tanggal' => 'required',
                'harga_awal' => 'required|numeric',
                'deskripsi' => 'required|min:10|max:100',
            ] ,
            [ 
                'nama_barang.required' => 'Nama Barang Harus Diisi',
                'nama_barang.min' => 'Nama Barang Minimal 5 Karakter',
                'nama_barang.max' => 'Nama Barang Maksimal 25 Karakter',
                'tanggal.required' => 'Tanggal Harus Diisi',
                'harga_awal.required' => 'Harga Awal Harus Diisi',
                'harga_awal.numeric' => 'Harga Awal Harus Angka',
                'deskripsi.required' => 'Deskripsi Harus Diisi',
                'deskripsi.min' => 'Deskripsi Minimal 10 Karakter',
                'deskripsi.max' => 'Deskripsi Maksimal 100 Karakter',
            ]
        );
        Barang::create(
            [
                'nama_barang' => Str::lower($request->nama_barang),
                'tanggal' => $request->tanggal,
                'harga_awal' => $request->harga_awal,
                'deskripsi' => Str::lower($request->deskripsi),
            ]
        );
        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
        $barangs = Barang::select('id', 'nama_barang', 'tanggal', 'harga_awal', 'deskripsi', 'created_at', 'update_at')->where('id', $barang->id)->get();
        return view('barang.show', compact('barangs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        //
        $barangs = Barang::select('id', 'nama_barang', 'tanggal', 'harga_awal', 'deskripsi')->where('id', $barang->id)->get();
        return view('barang.edit', compact('barangs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        //
        $request->validate(
            [
                'nama_barang' => 'required|min:5|max:25',
                'tanggal' => 'required',
                'harga_awal' => 'required|numeric',
                'deskripsi' => 'required|min:10|max:100',
            ] ,
            [ 
                'nama_barang.required' => 'Nama Barang Harus Diisi',
                'nama_barang.min' => 'Nama Barang Minimal 5 Karakter',
                'nama_barang.max' => 'Nama Barang Maksimal 25 Karakter',
                'tanggal.required' => 'Tanggal Harus Diisi',
                'harga_awal.required' => 'Harga Awal Harus Diisi',
                'harga_awal.numeric' => 'Harga Awal Harus Angka',
                'deskripsi.required' => 'Deskripsi Harus Diisi',
                'deskripsi.min' => 'Deskripsi Minimal 10 Karakter',
                'deskripsi.max' => 'Deskripsi Maksimal 100 Karakter',
            ]
        );
        Barang::where('id', $barang->id)
            ->update([
                'nama_barang' => Str::lower($request->nama_barang),
                'tanggal' => $request->tanggal,
                'harga_awal' => $request->harga_awal,
                'deskripsi' => Str::lower($request->deskripsi),
            ]);
        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        //
        Barang::destroy($barang->id);
        return redirect()->route('barang.index')->with('success', 'Barang Berhasil Dihapus');
    }
}
