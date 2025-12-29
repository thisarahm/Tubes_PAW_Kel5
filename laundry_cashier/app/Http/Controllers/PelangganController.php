<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $pelanggans = Pelanggan::when($search, function ($query, $search) {
        $query->where('kode', 'like', '%' . $search . '%')
              ->orWhere('nama', 'like', '%' . $search . '%');
    })
    ->orderBy('id', 'desc') // ⬅️ INI KUNCINYA
    ->get();

    return view('laundry.pelanggan', compact('pelanggans'));
}


    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        return view('laundry.pelanggan-edit', compact('pelanggan'));
    }

    public function update(Request $request, $id)
    {
        Pelanggan::findOrFail($id)->update($request->all());

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil diupdate');
    }

    public function create()
    {
        return view('laundry.pelanggan-create');
    }

    public function destroy($id)
    {
        Pelanggan::findOrFail($id)->delete();

        return redirect()->route('pelanggan.index')
            ->with('success', 'Data pelanggan berhasil dihapus');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:pelanggans,kode',
            'nama' => 'required',
            'no_telp' => 'required',
            'email' => 'nullable|email',
            'alamat' => 'nullable',
        ]);

        Pelanggan::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('pelanggan.index')
            ->with('success', 'Pelanggan berhasil ditambahkan');
    }
}
