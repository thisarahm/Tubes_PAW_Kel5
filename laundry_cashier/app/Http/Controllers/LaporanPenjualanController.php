<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanPenjualanController extends Controller
{
    /**
     * Menampilkan halaman laporan penjualan
     */
    public function index(Request $request)
    {
        $query = Transaksi::with('items');

        // FILTER TANGGAL AWAL
        if ($request->filled('tgl_awal')) {
            $query->whereDate('tgl_terima', '>=', $request->tgl_awal);
        }

        // FILTER TANGGAL AKHIR
        if ($request->filled('tgl_akhir')) {
            $query->whereDate('tgl_terima', '<=', $request->tgl_akhir);
        }

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // SEARCH
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode', 'LIKE', "%$search%")
                  ->orWhere('pelanggan', 'LIKE', "%$search%");
            });
        }

        $transaksis = $query
            ->orderBy('tgl_terima', 'desc')
            ->get();

        return view('laundry.penjualan', compact('transaksis'));
    }

    /**
     * Download laporan penjualan PDF
     */
    public function downloadPdf(Request $request)
    {
        $query = Transaksi::with('items');

        // FILTER TANGGAL
        if ($request->filled('tgl_awal')) {
            $query->whereDate('tgl_terima', '>=', $request->tgl_awal);
        }

        if ($request->filled('tgl_akhir')) {
            $query->whereDate('tgl_terima', '<=', $request->tgl_akhir);
        }

        // FILTER STATUS
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // SEARCH
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode', 'LIKE', "%$search%")
                  ->orWhere('pelanggan', 'LIKE', "%$search%");
            });
        }

        $data = $query
            ->orderBy('tgl_terima', 'desc')
            ->get();

        $pdf = Pdf::loadView(
            'laundry.penjualan_pdf',
            compact('data')
        )->setPaper('A4', 'landscape');

        return $pdf->download('laporan-penjualan.pdf');
    }
}
