<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Laundry</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        h3 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        th, td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background: #f2f2f2;
            text-align: left;
        }

        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }
    </style>
</head>
<body>

<h3>
    INVOICE LAUNDRY<br>
    NIWASA LAUNDRY
</h3>

<!-- ================= DATA TRANSAKSI ================= -->
<table>
    <tr>
        <th width="35%">Kode Transaksi</th>
        <td>{{ $transaksi->kode }}</td>
    </tr>
    <tr>
        <th>Pelanggan</th>
        <td>{{ $transaksi->pelanggan }}</td>
    </tr>
    <tr>
        <th>Tanggal Terima</th>
        <td>{{ $transaksi->tgl_terima }}</td>
    </tr>
    <tr>
        <th>Tanggal Ambil</th>
        <td>{{ $transaksi->tgl_ambil ?? '-' }}</td>
    </tr>
    <tr>
        <th>Status</th>
        <td>{{ $transaksi->status }}</td>
    </tr>
</table>

<!-- ================= DETAIL ITEM CUCIAN ================= -->
<h4>Detail Cucian</h4>

<table>
    <thead>
        <tr>
            <th class="text-center" width="5%">No</th>
            <th>Jenis Cucian</th>
            <th class="text-center" width="10%">Qty</th>
            <th class="text-right" width="20%">Harga</th>
            <th class="text-right" width="20%">Subtotal</th>
        </tr>
    </thead>
    <tbody>
@forelse ($transaksi->items as $i => $item)
<tr>
    <td class="text-center">{{ $i + 1 }}</td>
    <td>{{ $item->item }}</td>
    <td class="text-center">{{ $item->qty }}</td>
    <td class="text-right">
        Rp {{ number_format($item->harga,0,',','.') }}
    </td>
    <td class="text-right">
        Rp {{ number_format($item->subtotal,0,',','.') }}
    </td>
</tr>
@empty
<tr>
    <td colspan="5" class="text-center">
        Tidak ada detail cucian
    </td>
</tr>
@endforelse
</tbody>

</table>

<!-- ================= TOTAL ================= -->
<table>
    <tr>
        <th class="text-right">TOTAL BAYAR</th>
        <th class="text-right" width="25%">
            Rp {{ number_format($transaksi->total,0,',','.') }}
        </th>
    </tr>
</table>

</body>
</html>
