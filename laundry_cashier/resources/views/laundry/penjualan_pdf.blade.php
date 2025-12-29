<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Penjualan</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        table { width: 100%; border-collapse: collapse; }
        th, td {
            border: 1px solid #000;
            padding: 6px;
            text-align: left;
        }
        th { background: #f0f0f0; }
        h2 { text-align: center; }
    </style>
</head>
<body>

<h2>LAPORAN PENJUALAN<br>NIWASA LAUNDRY</h2>

<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Tgl Terima</th>
            <th>Kode</th>
            <th>Pelanggan</th>
            <th>Tgl Ambil</th>
            <th>Status</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $i => $row)
        <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $row->tgl_terima }}</td>
            <td>{{ $row->kode }}</td>
            <td>{{ $row->pelanggan }}</td>
            <td>{{ $row->tgl_ambil }}</td>
            <td>{{ $row->status }}</td>
            <td>Rp {{ number_format($row->total,0,',','.') }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</body>
</html>
