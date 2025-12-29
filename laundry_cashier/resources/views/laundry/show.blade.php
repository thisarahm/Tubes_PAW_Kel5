@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Detail Laundry</h2>

    <div class="card p-4">
        <p><strong>Nama Customer:</strong> {{ $laundry->customer_name }}</p>
        <p><strong>Berat:</strong> {{ $laundry->weight }} kg</p>
        <p><strong>Harga:</strong> Rp {{ number_format($laundry->price) }}</p>
        <p><strong>Status:</strong> {{ $laundry->status }}</p>
        <p><strong>Dibuat:</strong> {{ $laundry->created_at }}</p>
    </div>

    <a href="{{ route('laundry.index') }}" class="btn btn-secondary mt-3">Kembali</a>
</div>
@endsection
