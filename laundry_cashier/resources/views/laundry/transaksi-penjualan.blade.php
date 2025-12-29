    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Transaksi Penjualan</title>

        <style>
            body { margin:0; font-family:Arial; background:#f4f6f9; }

            .navbar {
                background:#00a65a;
                padding:12px 20px;
                color:white;
                display:flex;
                justify-content:space-between;
                align-items:center;
            }

            .sidebar {
                width:230px;
                background:#222d32;
                color:white;
                height:100vh;
                position:fixed;
            }

            .sidebar .user-panel {
                padding:15px;
                border-bottom:1px solid #444;
            }

            .sidebar ul {
                list-style:none;
                padding:0;
                margin:0;
            }

            .sidebar ul li {
                padding:12px 20px;
            }

            .sidebar ul li:hover {
                background:#1e282c;
            }

            .sidebar a {
                color:white;
                text-decoration:none;
                display:block;
            }

            .content {
                margin-left:230px;
                padding:20px;
            }

            table {
                width:100%;
                border-collapse:collapse;
                background:white;
                margin-top:15px;
            }

            th, td {
                padding:10px;
                border-bottom:1px solid #ddd;
                text-align:center;
            }

            th { background:#f4f4f4; }

            /* ===== BADGE STATUS ===== */
            .badge {
                padding:5px 10px;
                border-radius:4px;
                color:white;
                font-size:12px;
                text-transform: uppercase;
            }

            .ongoing { background:#f39c12; }
            .diterima { background:#00c0ef; }
            .belum-diambil { background:#605ca8; }
            .selesai { background:#00a65a; }

            /* ===== AKSI ===== */
            .aksi {
                display:flex;
                justify-content:center;
                gap:6px;
            }

            .btn-edit {
                background:#007bff;
                color:white;
                padding:6px 12px;
                border-radius:4px;
                text-decoration:none;
                font-size:13px;
            }

            .btn-delete {
                background:#dd4b39;
                color:white;
                padding:6px 12px;
                border:none;
                border-radius:4px;
                font-size:13px;
                cursor:pointer;
            }

            /* ============================= */
    /* SEARCH & FILTER (GLOBAL) */
    /* ============================= */

    .search-box {
        margin-top: 12px;
        margin-bottom: 20px;
    }

    .search-label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 6px;
        color: #000;
    }

    .search-row {
        display: flex;
        align-items: flex-end;
        gap: 12px;
        flex-wrap: wrap;
    }

    /* INPUT & SELECT */
    .search-input {
        width: 260px;
        height: 40px;
        padding: 0 12px;
        font-size: 14px;
        border: 2px solid #333;
        border-radius: 6px;
        outline: none;
        background: #fff;
    }

    .search-input:focus {
        border-color: #198754;
    }

    /* BUTTON PROSES */
    .btn-proses {
        height: 40px;
        padding: 0 20px;
        background-color: #198754;
        color: #fff;
        font-size: 14px;
        font-weight: 600;
        border: none;
        border-radius: 6px;
        cursor: pointer;
    }

    .btn-proses:hover {
        background-color: #157347;
    }

    /* BUTTON CLEAR */
    .btn-clear {
        height: 40px;
        padding: 0 20px;
        background-color: #6c757d;
        color: #fff !important;
        font-size: 14px;
        font-weight: 600;
        border-radius: 6px;
        text-decoration: none !important;
        display: inline-flex;
        align-items: center;
    }

    .btn-clear:hover {
        background-color: #5c636a;
    }

    /* ===== BUTTON PDF ===== */
.btn-pdf {
    background: #dc3545;
    color: #fff;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 13px;
    font-weight: 600;
    text-decoration: none;
    display: inline-block;
    transition: all 0.2s ease;
}

.btn-pdf:hover {
    background: #b02a37;
    transform: scale(1.05);
}

        </style>
    </head>

    <body>

    <!-- NAVBAR -->
    <div class="navbar">
        <b>NIWASA LAUNDRY</b>
        <div>
            {{ auth()->user()->name }} |
            <a href="{{ route('logout') }}" style="color:white">Logout</a>
        </div>
    </div>

    <!-- SIDEBAR -->
    <div class="sidebar">
        <div class="user-panel">
            <b>{{ auth()->user()->name }}</b><br>
            <small style="color:#00ff99">● ON</small>
        </div>

        <ul>
            <li><a href="{{ route('kasir.dashboard') }}">Dashboard</a></li>
            <li style="background:#1e282c">
                <a href="{{ route('kasir.transaksi') }}">Transaksi Penjualan</a>
            </li>
            <li>
                <a href="{{ route('laporan.penjualan') }}">Laporan Penjualan</a>
            </li>
            <li>
                <a href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
            </li>
        </ul>
    </div>

    <!-- CONTENT -->
    <div class="content">
        <h2>Transaksi Penjualan</h2>

        <a href="{{ route('kasir.transaksi.create') }}"
        style="padding:10px 15px; background:#00a65a; color:white; text-decoration:none; border-radius:4px;">
            Tambah Transaksi
        </a>

        <form action="{{ route('kasir.transaksi') }}" method="GET" class="search-box">

        <div class="search-row">

            <div>
                <label class="search-label">Tgl Terima (Awal)</label>
                <input type="date"
                    name="tgl_terima_awal"
                    class="search-input"
                    value="{{ request('tgl_terima_awal') }}">
            </div>

            <div>
                <label class="search-label">Tgl Terima (Akhir)</label>
                <input type="date"
                    name="tgl_terima_akhir"
                    class="search-input"
                    value="{{ request('tgl_terima_akhir') }}">
            </div>

            <div>
                <label class="search-label">Status</label>
                <select name="status" class="search-input">
                    <option value="">SEMUA</option>
                    <option value="BELUM DIAMBIL" {{ request('status')=='BELUM DIAMBIL'?'selected':'' }}>BELUM DIAMBIL</option>
                    <option value="DITERIMA" {{ request('status')=='DITERIMA'?'selected':'' }}>DITERIMA</option>
                    <option value="DIPROSES" {{ request('status')=='DIPROSES'?'selected':'' }}>DIPROSES</option>
                    <option value="SELESAI" {{ request('status')=='SELESAI'?'selected':'' }}>SELESAI</option>
                </select>
            </div>

            <div>
                <label class="search-label">Search</label>
                <input type="text"
                    name="search"
                    class="search-input"
                    placeholder="Kode / Pelanggan"
                    value="{{ request('search') }}">
            </div>

            <div style="display:flex; gap:10px; align-items:flex-end">
                <button type="submit" class="btn-proses">PROSES</button>
                <a href="{{ route('kasir.transaksi') }}" class="btn-clear">CLEAR</a>
            </div>

        </div>
    </form>

        <table>
            <thead>
                <tr>
                    <th>Tgl Terima</th>
                    <th>Kode</th>
                    <th>Tgl Ambil</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                    <th>Invoice</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($transaksis as $t)
                <tr>
                    <td>{{ $t->tgl_terima }}</td>
                    <td>{{ $t->kode }}</td>
                    <td>{{ $t->tgl_ambil ?? '-' }}</td>
                    <td>{{ $t->pelanggan }}</td>
                    <td>Rp {{ number_format($t->total,0,',','.') }}</td>

                    <td>
                        @switch($t->status)
                            @case('ONGOING')
                                <span class="badge ongoing">DIPROSES</span>
                                @break
                            @case('DITERIMA')
                                <span class="badge diterima">DITERIMA</span>
                                @break
                            @case('BELUM_DIAMBIL')
                                <span class="badge belum-diambil">BELUM DIAMBIL</span>
                                @break
                            @case('SELESAI')
                                <span class="badge selesai">SELESAI</span>
                                @break
                            @default
                                <span class="badge">UNKNOWN</span>
                        @endswitch
                    </td>

                    <td>
                        <div class="aksi">
                            <a href="{{ route('kasir.transaksi.edit', $t->id) }}" class="btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('kasir.transaksi.destroy', $t->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin mau hapus transaksi ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete">Hapus</button>
                            </form>
                        </div>
                    </td>
<td>
    <a href="{{ route('kasir.transaksi.pdf', $t->id) }}"
       class="btn-pdf">
       PDF
    </a>
</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8">Data transaksi kosong</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

    </body>
    </html>
