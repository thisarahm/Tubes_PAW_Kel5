<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Penjualan</title>

<style>
body{
    font-family: Arial, sans-serif;
    background:#f4f6f9;
    margin:0;
}

.container{
    max-width:1200px;
    margin:25px auto;
    background:#fff;
    padding:20px;
    border-radius:6px;
}

/* ===== HEADER FIX ===== */
.header{
    position:relative;
    margin-bottom:20px;
}

.btn-dashboard{
    position:absolute;
    left:0;
    top:0;
    background:#2196f3;
    color:#fff;
    padding:8px 14px;
    border-radius:4px;
    text-decoration:none;
    font-size:14px;
}

.header-title{
    text-align:center;
}

.header-title h2{
    margin:0;
}

.header-title p{
    margin:4px 0 0;
    font-size:14px;
    color:#666;
}

/* ===== FILTER ===== */
.filter{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    align-items:flex-end;
    margin-bottom:15px;
}

.filter input,
.filter select{
    padding:8px;
    border:1px solid #ccc;
    border-radius:4px;
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

/* ===== TABLE ===== */
table{
    width:100%;
    border-collapse:collapse;
}

th{
    background:#00a65a;
    color:white;
    padding:10px;
}

td{
    padding:10px;
    border-bottom:1px solid #ddd;
    vertical-align:top;
    text-align:center;
}

td.items{
    text-align:left;
}

.badge{
    padding:4px 10px;
    border-radius:4px;
    color:white;
    font-size:12px;
}

.ONGOING{background:#f39c12;}
.SELESAI{background:#00a65a;}
.DITERIMA{background:#00c0ef;}
.BELUM_DIAMBIL{background:#605ca8;}

/* ===== TOTAL ===== */
.total-box{
    margin-top:15px;
    text-align:right;
    font-size:17px;
    font-weight:bold;
}
.btn-download-pdf {
    display: inline-flex;
    align-items: center;
    gap: 20px;
    padding: 10px 18px;
    background: linear-gradient(135deg, #00a65a, #008d4c);
    color: #fff;
    font-size: 14px;
    font-weight: 600;
    border-radius: 6px;
    text-decoration: none;
    box-shadow: 0 4px 10px rgba(0,0,0,0.15);
    transition: all 0.25s ease;
}

.btn-download-pdf:hover {
    background: linear-gradient(135deg, #008d4c, #006b3a);
    transform: translateY(-2px);
    box-shadow: 0 6px 14px rgba(0,0,0,0.2);
}

.btn-download-pdf:active {
    transform: scale(0.96);
}

</style>
</head>

<body>
<div class="container">

    <!-- HEADER -->
    <div class="header">
        <a href="{{ route('kasir.dashboard') }}" class="btn-dashboard">
            DASHBOARD
        </a>

        <div class="header-title">
            <h2>LAPORAN PENJUALAN</h2>
            <p>NIWASA LAUNDRY</p>
        </div>
    </div>

    <!-- FILTER -->
    <form method="GET" action="{{ route('laporan.penjualan') }}" class="filter">

        <div>
            <label>Tgl Terima (Awal)</label><br>
            <input type="date" name="tgl_awal" value="{{ request('tgl_awal') }}">
        </div>

        <div>
            <label>Tgl Terima (Akhir)</label><br>
            <input type="date" name="tgl_akhir" value="{{ request('tgl_akhir') }}">
        </div>

        <div>
            <label>Status</label><br>
            <select name="status">
                <option value="">SEMUA</option>
                <option value="ONGOING" {{ request('status')=='ONGOING'?'selected':'' }}>ONGOING</option>
                <option value="DITERIMA" {{ request('status')=='DITERIMA'?'selected':'' }}>DITERIMA</option>
                <option value="BELUM_DIAMBIL" {{ request('status')=='BELUM_DIAMBIL'?'selected':'' }}>BELUM DIAMBIL</option>
                <option value="SELESAI" {{ request('status')=='SELESAI'?'selected':'' }}>SELESAI</option>
            </select>
        </div>

        <div>
            <label>Search</label><br>
            <input type="text" name="search"
                   placeholder="Kode / Pelanggan"
                   value="{{ request('search') }}">
        </div>

        <button class="btn-proses">PROSES</button>
        <a href="{{ route('laporan.penjualan') }}" class="btn-clear">CLEAR</a>
    </form>

<a href="{{ route('laporan.penjualan.pdf', request()->query()) }}" 
   class="btn-download-pdf">
    Download PDF
</a>


    <!-- TABLE -->
    <table>
        <thead>
        <tr>
            <th>No</th>
            <th>Tgl Terima</th>
            <th>Kode</th>
            <th>Pelanggan</th>
            <th>Tgl Ambil</th>
            <th>Items</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @php $grandTotal = 0; @endphp

        @forelse($transaksis as $i => $t)
            @php $grandTotal += $t->total; @endphp
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $t->tgl_terima }}</td>
                <td>{{ $t->kode }}</td>
                <td>{{ $t->pelanggan }}</td>
                <td>{{ $t->tgl_ambil ?? '-' }}</td>

                <td class="items">
                    <ul style="margin:0;padding-left:18px">
                        @foreach($t->items as $it)
                            <li>
                                {{ $it->item }}
                                ({{ $it->qty }} x Rp {{ number_format($it->harga) }})
                            </li>
                        @endforeach
                    </ul>
                </td>

                <td>
                    <span class="badge {{ $t->status }}">
                        {{ $t->status }}
                    </span>
                </td>

                <td>Rp {{ number_format($t->total) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align:center;color:red">
                    DATA TIDAK DITEMUKAN
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <!-- TOTAL KESELURUHAN -->
    <div class="total-box">
        TOTAL KESELURUHAN : Rp {{ number_format($grandTotal) }}
    </div>

</div>
</body>
</html>
