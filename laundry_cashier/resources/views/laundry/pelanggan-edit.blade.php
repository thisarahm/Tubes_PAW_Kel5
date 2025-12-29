<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pelanggan</title>

    <style>
        body { margin:0; font-family:Arial; background:#f4f6f9; }
        .navbar { background:#00a65a; padding:12px 20px; color:white;
            display:flex; justify-content:space-between; align-items:center; }
        .sidebar { width:230px; background:#222d32; color:white;
            height:100vh; position:fixed; }
        .sidebar .user-panel { padding:15px; border-bottom:1px solid #444; }
        .sidebar ul { list-style:none; padding:0; margin:0; }
        .sidebar ul li { padding:12px 20px; }
        .sidebar ul li:hover { background:#1e282c; }
        .sidebar a { color:white; text-decoration:none; display:block; }
        .content { margin-left:230px; padding:20px; }
        .card { background:white; padding:20px; border-radius:5px; max-width:600px; }
        label { display:block; margin-top:12px; font-weight:bold; }
        input, textarea { width:100%; padding:8px; margin-top:5px;
            border:1px solid #ccc; border-radius:4px; }
        textarea { resize:none; }
        .btn { margin-top:15px; padding:10px 15px; border:none;
            border-radius:4px; cursor:pointer; font-size:14px; }
        .btn-save { background:#007bff; color:white; }
        .btn-back { background:#6c757d; color:white; text-decoration:none;
            margin-left:5px; padding:10px 15px; border-radius:4px; }
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
        <li><a href="{{ route('kasir.transaksi') }}">Transaksi Penjualan</a></li>
        <li>Laporan Penjualan</li>
        <li>Invoice Penjualan</li>
        <li style="background:#1e282c">
            <a href="{{ route('pelanggan.index') }}">Data Pelanggan</a>
        </li>
    </ul>
</div>

<!-- CONTENT -->
<div class="content">
    <h2>Edit Pelanggan</h2>

    <div class="card">
        <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Kode Pelanggan</label>
            <input type="text" name="kode" value="{{ $pelanggan->kode }}" required>

            <label>Nama Pelanggan</label>
            <input type="text" name="nama" value="{{ $pelanggan->nama }}" required>

            <label>No Telp</label>
            <input type="text" name="no_telp" value="{{ $pelanggan->no_telp }}" required>

            <label>Email</label>
            <input type="email" name="email" value="{{ $pelanggan->email }}">

            <label>Alamat</label>
            <textarea name="alamat" rows="3">{{ $pelanggan->alamat }}</textarea>

            <button type="submit" class="btn btn-save">Update</button>
            <a href="{{ route('pelanggan.index') }}" class="btn-back">Kembali</a>
        </form>
    </div>
</div>

</body>
</html>
