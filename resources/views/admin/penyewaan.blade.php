@extends('components.admin-layout')

@section('title', 'Data Penyewaan')

@section('content')

<div class="container-fluid">

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 font-weight-bold">Data Penyewaan</h1>
    <a href="{{ route('admin.rentals.create') }}" class="btn btn-primary">
      <i class="fas fa-plus"></i> Tambah Penyewaan
    </a>
  </div>

  {{-- Table --}}
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-striped table-hover mb-0">
        <thead class="bg-light">
          <tr>
            <th>#</th>
            <th>Nama Pelanggan</th>
            <th>Mobil</th>
            <th>Tgl Sewa</th>
            <th>Tgl Kembali</th>
            <th>Status</th>
            <th>Total</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($rentals as $rental)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $rental->user->name ?? '-' }}</td>
            <td>{{ $rental->car->brand ?? '-' }} {{ $rental->car->model ?? '' }}</td>
            <td>{{ $rental->start_date }}</td>
            <td>{{ $rental->end_date }}</td>
            <td>
              @php
                $statusBadge = [
                  'pending' => 'badge badge-secondary',
                  'confirmed' => 'badge badge-primary',
                  'cancelled' => 'badge badge-danger',
                  'completed' => 'badge badge-success',
                ];
              @endphp
              <span class="{{ $statusBadge[$rental->status] ?? 'badge badge-light' }}">
                {{ ucfirst($rental->status) }}
              </span>
            </td>
            <td>Rp{{ number_format($rental->total_price, 0, ',', '.') }}</td>
            <td>
              <a href="{{ route('admin.rentals.edit', $rental->id) }}" class="btn btn-sm btn-warning">
                <i class="fas fa-edit"></i>
              </a>
              <form action="{{ route('admin.rentals.destroy', $rental->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin hapus penyewaan ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-sm btn-danger">
                  <i class="fas fa-trash"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="text-center">Belum ada data penyewaan.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
