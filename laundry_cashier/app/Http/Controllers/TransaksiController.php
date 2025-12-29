<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class TransaksiController extends Controller
{
    // =========================
    // INDEX
    // =========================
    public function index(Request $request)
    {
        $query = Transaksi::query();

        // FILTER TANGGAL TERIMA
        if ($request->tgl_terima_awal && $request->tgl_terima_akhir) {
            $query->whereBetween('tgl_terima', [
                $request->tgl_terima_awal,
                $request->tgl_terima_akhir
            ]);
        }

        // FILTER STATUS
        if ($request->status) {
            $query->where('status', $request->status);
        }

        // SEARCH KODE / PELANGGAN
        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('kode', 'like', '%' . $request->search . '%')
                  ->orWhere('pelanggan', 'like', '%' . $request->search . '%');
            });
        }

        $transaksis = $query->orderBy('tgl_terima', 'desc')->get();

        return view('laundry.transaksi-penjualan', compact('transaksis'));
    }

    // =========================
    // CREATE
    // =========================
    public function create()
    {
        return view('laundry.transaksi-create');
    }

    // =========================
    // STORE
    // =========================
    public function store(Request $request)
    {
        // SIMPAN TRANSAKSI UTAMA
        $transaksi = Transaksi::create([
            'tgl_terima' => $request->tgl_terima,
            'tgl_ambil'  => $request->tgl_ambil,
            'kode'       => $request->kode,
            'pelanggan'  => $request->pelanggan,
            'status'     => $request->status,
            'total'      => $request->total,
        ]);

        // SIMPAN DETAIL ITEM (HANYA QTY > 0)
        if ($request->has('items')) {
            foreach ($request->items as $i => $namaItem) {

                $qty   = $request->qty[$i] ?? 0;
                $harga = $request->harga[$i] ?? 0;

                if ($qty > 0) {
                    $transaksi->items()->create([
                        'nama_item' => $namaItem,
                        'qty'       => $qty,
                        'harga'     => $harga,
                        'subtotal'  => $qty * $harga,
                    ]);
                }
            }
        }

        return redirect()->route('kasir.transaksi')
            ->with('success', 'Transaksi berhasil disimpan');
    }

    // =========================
    // EDIT
    // =========================
    public function edit($id)
    {
        $transaksi = Transaksi::with('items')->findOrFail($id);

        return view('laundry.transaksi-edit', compact('transaksi'));
    }

    // =========================
    // UPDATE
    // =========================
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $transaksi->update([
            'tgl_terima' => $request->tgl_terima,
            'kode'       => $request->kode,
            'tgl_ambil'  => $request->tgl_ambil,
            'pelanggan'  => $request->pelanggan,
            'total'      => $request->total,
            'status'     => $request->status,
        ]);

        return redirect()->route('kasir.transaksi')
            ->with('success', 'Transaksi berhasil diupdate');
    }

    // =========================
    // DESTROY
    // =========================
    public function destroy($id)
    {
        Transaksi::findOrFail($id)->delete();

        return redirect()->route('kasir.transaksi')
            ->with('success', 'Transaksi berhasil dihapus');
    }

    // =========================
    // PDF INVOICE
    // =========================
    public function pdf($id)
    {
        $transaksi = Transaksi::with('items')->findOrFail($id);

        $pdf = Pdf::loadView(
            'laundry.transaksi_pdf',
            compact('transaksi')
        );

        return $pdf->download('invoice-' . $transaksi->kode . '.pdf');
    }
}
