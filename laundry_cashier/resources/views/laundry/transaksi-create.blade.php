<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Tambah Transaksi</title>

<style>
    body {
        font-family: Arial, sans-serif;
        background: #f4f6f9;
        margin: 0;
    }

    .container {
        margin-left: 230px;
        padding: 20px;
        max-width: 1100px;
        margin-right: auto;
    }

    h2 {
        margin-bottom: 20px;
        color: #333;
    }

    h3 {
        margin-top: 30px;
        margin-bottom: 10px;
        color: #555;
    }

    label {
        font-weight: bold;
        margin-top: 12px;
        display: block;
        color: #555;
    }

    input, select {
        width: 100%;
        padding: 10px;
        margin-top: 6px;
        border: 1px solid #ccc;
        border-radius: 4px;
        font-size: 14px;
        box-sizing: border-box;
    }

    input[readonly] {
        background: #f0f0f0;
    }

    table {
        width: 100%;
        background: white;
        border-collapse: collapse;
        margin-top: 15px;
        border-radius: 6px;
        overflow: hidden;
    }

    th {
        background: #00a65a;
        color: white;
        padding: 12px;
        font-size: 14px;
    }

    td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }

    tbody tr:hover {
        background: #f9f9f9;
    }

    td input {
        text-align: center;
    }

    button {
        margin-top: 25px;
        padding: 12px 20px;
        background: #00a65a;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 14px;
        cursor: pointer;
    }

    button:hover {
        background: #008d4c;
    }
</style>
</head>

<body>

<div class="container">
<h2>Tambah Transaksi</h2>

<form method="POST" action="{{ route('kasir.transaksi.store') }}">
@csrf

<label>Tanggal Terima</label>
<input type="date" name="tgl_terima" required>

<label>Kode</label>
<input type="text" name="kode" required>

<label>Tanggal Ambil</label>
<input type="date" name="tgl_ambil">

<label>Pelanggan</label>
<input type="text" name="pelanggan" required>

<h3>Items Laundry</h3>

<table>
<thead>
<tr>
<th>Item</th>
<th>Harga / KG</th>
<th>Jumlah / KG</th>
<th>Subtotal</th>
</tr>
</thead>

<tbody>
@php
$items = [
    ['nama'=>'Cuci Kering','harga'=>7000],
    ['nama'=>'Cuci Kering + Setrika','harga'=>15000],
    ['nama'=>'Setrika','harga'=>10000],
    ['nama'=>'Cuci Express','harga'=>15000],
    ['nama'=>'Cuci MAX (Bahan Tebal)','harga'=>15000],
];
@endphp

@foreach($items as $item)
<tr>
<td>
    {{ $item['nama'] }}
    <input type="hidden" name="items[]" value="{{ $item['nama'] }}">
</td>
<td>
    <input type="number" name="harga[]" value="{{ $item['harga'] }}" class="harga" readonly>
</td>
<td>
    <input type="number" name="qty[]" class="qty" value="0" min="0">
</td>
<td>
    <input type="number" class="subtotal" readonly>
</td>
</tr>
@endforeach
</tbody>
</table>

<label>Total</label>
<input type="number" name="total" id="total" readonly>

<label>Status</label>
<select name="status" required>
    <!-- <option value="ONGOING">DIPROSES</option> -->
    <option value="DITERIMA">DITERIMA</option>
    <!-- <option value="BELUM_DIAMBIL">BELUM DIAMBIL</option>
    <option value="SELESAI">SELESAI</option> -->
</select>

<button type="submit">Simpan Transaksi</button>
</form>
</div>

<script>
function hitungTotal() {
    let total = 0;

    document.querySelectorAll('tbody tr').forEach(row => {
        let harga = row.querySelector('.harga').value;
        let qty = row.querySelector('.qty').value;
        let subtotal = harga * qty;
        row.querySelector('.subtotal').value = subtotal;
        total += subtotal;
    });

    document.getElementById('total').value = total;
}

document.querySelectorAll('.qty').forEach(input => {
    input.addEventListener('input', hitungTotal);
});
</script>

</body>
</html>
