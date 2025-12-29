<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KasirDashboardController extends Controller
{
    public function index()
    {
        return view('laundry.kasir-dashboard', [
            'user' => Auth::user()
        ]);
    }

    public function transaksi()
    {
        return view('laundry.kasir-dashboard', [
            'user' => Auth::user()
        ]);
    }
}
