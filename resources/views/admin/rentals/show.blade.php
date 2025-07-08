@extends('components.admin-layout')

@section('title', 'Detail Penyewaan')

@section('content')
<div class="container-fluid">

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 font-weight-bold">Detail Penyewaan</h1>
    <a href="{{ route('admin.rentals.index') }}" class="btn btn-secondary">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
  </div>

  {{-- Card Detail --}}
  <div class="card shadow">
    <div class="card-body">

      <div class="mb-3">
        <strong>Nama Pelanggan:</strong><br>
        {{ $rental->user->username ?? $rental->user->name ?? '-' }}
      </div>

      <div class="mb-3">
        <strong>Mobil:</strong><br>
        {{ $rental->car->brand ?? '-' }} {{ $rental->car->model ?? '' }}
      </div>

      <div class="mb-3">
        <strong>Tanggal Sewa:</strong><br>
        {{ $rental->start_date->format('d-m-Y') }}
      </div>

      <div class="mb-3">
        <strong>Tanggal Kembali:</strong><br>
        {{ $rental->end_date->format('d-m-Y') }}
      </div>

      <div class="mb-3">
        <strong>Total Harga:</strong><br>
        Rp{{ number_format($rental->total_price, 0, ',', '.') }}
      </div>

      <div class="mb-3">
        <strong>Status:</strong><br>
        @php
          $badge = [
            'pending' => 'badge-secondary',
            'confirmed' => 'badge-primary',
            'cancelled' => 'badge-danger',
            'completed' => 'badge-success',
          ];
        @endphp
        <span class="badge {{ $badge[$rental->status] ?? 'badge-light' }}">
          {{ ucfirst($rental->status) }}
        </span>
      </div>

      <div class="mb-3">
        <strong>ID Transaksi:</strong><br>
        {{ $rental->transaction_id ?? '-' }}
      </div>

      <div class="mb-3">
        <strong>Dibuat pada:</strong><br>
        {{ $rental->created_at->format('d-m-Y H:i') }}
      </div>

    </div>
  </div>

</div>
@endsection
