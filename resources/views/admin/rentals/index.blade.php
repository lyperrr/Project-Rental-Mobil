@extends('components.admin-layout')

@section('title', 'Data Penyewaan')

@section('content')
<div class="container-fluid">
  <h1 class="h3 mb-4 text-gray-800">Data Penyewaan</h1>

  {{-- Tambahkan pesan sukses/error --}}
  @if(session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger">
      {{ session('error') }}
    </div>
  @endif

  <div class="card">
    <div class="card-body">
      @if ($rentals->count())
        <table class="table table-striped">
          <thead>
            <tr>
              <th>#</th>
              <th>Pelanggan</th>
              <th>Mobil</th>
              <th>Tgl Sewa</th>
              <th>Tgl Kembali</th>
              <th>Status</th>
              <th>Total</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($rentals as $rental)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $rental->user->username ?? $rental->user->name ?? '-' }}</td>
              <td>{{ $rental->car->brand ?? '-' }} {{ $rental->car->model ?? '' }}</td>
              <td>{{ $rental->start_date->format('d-m-Y') }}</td>
              <td>{{ $rental->end_date->format('d-m-Y') }}</td>
              <td>
                {{-- PERBAIKAN: Gunakan ID rental yang benar --}}
                <form action="{{ route('admin.rentals.status', $rental->id) }}" method="POST">
                  @csrf
                  @method('PATCH')
                  <div class="d-flex">
                    <select name="status" class="form-control form-control-sm" onchange="this.form.submit()">
                      <option value="pending" {{ $rental->status === 'pending' ? 'selected' : '' }}>Pending</option>
                      <option value="confirmed" {{ $rental->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                      <option value="completed" {{ $rental->status === 'completed' ? 'selected' : '' }}>Completed</option>
                      <option value="cancelled" {{ $rental->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                  </div>
                </form>
              </td>
              <td>Rp{{ number_format($rental->total_price, 0, ',', '.') }}</td>
              <td class="d-flex gap-1">
                <a href="{{ route('admin.rentals.show', $rental) }}" class="btn btn-sm btn-info">Detail</a>
                <a href="{{ route('admin.rentals.edit', $rental) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('admin.rentals.destroy', $rental) }}" method="POST" onsubmit="return confirm('Yakin hapus penyewaan ini?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="mt-3">
          {{ $rentals->links() }}
        </div>
      @else
        <p class="text-center mb-0">Belum ada data penyewaan.</p>
      @endif
    </div>
  </div>
</div>
@endsection