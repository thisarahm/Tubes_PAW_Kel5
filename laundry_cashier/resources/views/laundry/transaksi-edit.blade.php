<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Edit Transaksi</title>

<style>
body { font-family:Arial; background:#f4f6f9; margin:0; }

.container {
    margin-left:230px;
    padding:20px;
    max-width:1100px;
}

label { font-weight:bold; margin-top:12px; display:block; }
input, select {
    width:100%;
    padding:10px;
    margin-top:6px;
    border:1px solid #ccc;
    border-radius:4px;
}

input[readonly] { background:#f0f0f0; }

table {
    width:100%;
    background:white;
    border-collapse:collapse;
    margin-top:15px;
}

th {
    background:#00a65a;
    color:white;
    padding:10px;
}

td {
    padding:10px;
    border-bottom:1px solid #ddd;
    text-align:center;
}

button {
    margin-top:25px;
    padding:12px 20px;
    background:#00a65a;
    color:white;
    border:none;
    border-radius:4px;
    cursor:pointer;
}
</style>
</head>

<body>

<div class="container">
<h2>Edit Transaksi</h2>

<form method="POST" action="{{ route('kasir.transaksi.update', $transaksi->id) }}">
@csrf
@method('PUT')

<label>Tanggal Terima</label>
<input type="date" name="tgl_terima" value="{{ $transaksi->tgl_terima }}" required>

<label>Kode</label>
<input type="text" name="kode" value="{{ $transaksi->kode }}" required>

<label>Tanggal Ambil</label>
<input type="date" name="tgl_ambil" value="{{ $transaksi->tgl_ambil }}">

<label>Pelanggan</label>
<input type="text" name="pelanggan" value="{{ $transaksi->pelanggan }}" required>

<h3>Items Laundry</h3>

<table>
<thead>
<tr>
    <th>Item</th>
    <th>Harga/KG</th>
    <th>Jumlah/KG</th>
    <th>Subtotal</th>
</tr>
</thead>
<tbody>

@php
$items = [
    ['Cuci Kering', 7000],
    ['Cuci Kering + Setrika', 15000],
    ['Setrika', 10000],
    ['Cuci Express', 15000],
    ['Cuci MAX (Bahan Tebal)', 15000],
];
@endphp

@foreach($items as $item)
<tr>
    <td>
        {{ $item[0] }}
        <input type="hidden" name="items[]" value="{{ $item[0] }}">
    </td>
    <td>
        <input type="number" name="harga[]" class="harga" value="{{ $item[1] }}" readonly>
    </td>
    <td>
        <input type="number" name="qty[]" class="qty" value="0">
    </td>
    <td>
        <input type="number" class="subtotal" readonly>
    </td>
</tr>
@endforeach

</tbody>
</table>

<label>Total</label>
<input type="number" name="total" id="total" value="{{ $transaksi->total }}" readonly>

<label>Status</label>
<select name="status" required>
    <option value="ONGOING" {{ $transaksi->status=='DIPROSES'?'selected':'' }}>DIPROSES</option>
    <option value="DITERIMA" {{ $transaksi->status=='DITERIMA'?'selected':'' }}>DITERIMA</option>
    <option value="BELUM_DIAMBIL" {{ $transaksi->status=='BELUM_DIAMBIL'?'selected':'' }}>BELUM DIAMBIL</option>
    <option value="SELESAI" {{ $transaksi->status=='SELESAI'?'selected':'' }}>SELESAI</option>
</select>

<button type="submit">Simpan Perubahan</button>

</form>
</div>

<script>
function hitungTotal() {
    let total = 0;

    document.querySelectorAll('tbody tr').forEach(row => {
        let harga = row.querySelector('.harga').value || 0;
        let qty = row.querySelector('.qty').value || 0;
        let subtotal = harga * qty;
        row.querySelector('.subtotal').value = subtotal;
        total += subtotal;
    });

    document.getElementById('total').value = total;
}

document.querySelectorAll('.qty').forEach(el => {
    el.addEventListener('input', hitungTotal);
});
</script>

</body>
</html>
