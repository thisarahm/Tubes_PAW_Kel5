<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pelanggan</title>

    <style>
        body { margin:0; font-family:Arial; background:#f4f6f9; }

        /* ===== NAVBAR ===== */
        .navbar {
            background:#00a65a;
            padding:12px 20px;
            color:white;
            display:flex;
            justify-content:space-between;
            align-items:center;
        }

        /* ===== SIDEBAR ===== */
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

        /* ===== CONTENT ===== */
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

        th {
            background:#f4f4f4;
        }

        /* ===== TOMBOL ===== */
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

        .btn-add {
            padding:10px 15px;
            background:#00a65a;
            color:white;
            text-decoration:none;
            border-radius:4px;
            display:inline-block;
        }
        /* ===== SEARCH PELANGGAN (FINAL FIX) ===== */

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
    align-items: center;
    gap: 10px;
}

/* INPUT */
.search-input {
    width: 260px;
    height: 40px;
    padding: 0 12px;
    font-size: 14px;
    border: 2px solid #333;
    border-radius: 6px;
    outline: none;
}

.search-input:focus {
    border-color: #198754;
}

/* TOMBOL PROSES */
.btn-proses {
    height: 40px;
    padding: 0 18px;
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

/* TOMBOL CLEAR — FIX LINK UNGU */
.btn-clear {
    height: 40px;
    padding: 0 18px;
    background-color: #6c757d;
    color: #fff !important;        /* FIX UNGU */
    font-size: 14px;
    font-weight: 600;
    border-radius: 6px;
    text-decoration: none !important; /* FIX GARIS BAWAH */
    display: inline-flex;
    align-items: center;
}

.btn-clear:hover {
    background-color: #5c636a;
    color: #fff;
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
        <li>
            <a href="{{ route('kasir.dashboard') }}">Dashboard</a>
        </li>
        <li>
            <a href="{{ route('kasir.transaksi') }}">Transaksi Penjualan</a>
        </li>
        <li><a href="{{ route('laporan.penjualan') }}">
        Laporan Penjualan   
        </a></li>


        <li style="background:#1e282c">
            <a href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
        </li>
    </ul>
</div>

<!-- CONTENT -->
<div class="content">
    <h2>Data Pelanggan</h2>


   <a href="{{ route('pelanggan.create') }}" class="btn-add">Tambah Pelanggan</a> 
        <form action="{{ route('pelanggan.index') }}" method="GET" class="search-box">
    <label class="search-label">Search</label>

    <div class="search-row">
        <input
            type="text"
            name="search"
            class="search-input"
            placeholder="Kode / Pelanggan"
            value="{{ request('search') }}"
        >

        <button type="submit" class="btn-proses">
            PROSES
        </button>

        <a href="{{ route('pelanggan.index') }}" class="btn-clear">
            CLEAR
        </a>
    </div>
</form>



    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Nama</th>
                <th>No Telp</th>
                <th>Email</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($pelanggans as $p)
            <tr>
                <td>{{ $p->kode }}</td>
                <td>{{ $p->nama }}</td>
                <td>{{ $p->no_telp }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->alamat }}</td>
                <td>
                    <div class="aksi">
                        <a href="{{ route('pelanggan.edit', $p->id) }}" class="btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('pelanggan.destroy', $p->id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus pelanggan ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn-delete">
                                Hapus
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Data pelanggan kosong</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

</body>
</html>
