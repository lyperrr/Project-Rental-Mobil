@extends('components.admin-layout')

@section('title', 'Laporan Penyewaan')

@section('content')

<div class="container-fluid">

  {{-- Judul dan Filter --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
      <h1 class="h3 text-gray-800 font-weight-bold">Laporan Penyewaan</h1>
      <p class="text-muted mb-0">Daftar penyewaan mobil berdasarkan rentang tanggal.</p>
    </div>

    {{-- Form Filter Tanggal --}}
    <form action="#" method="GET" class="form-inline">
      <label class="mr-2">Dari</label>
      <input type="date" name="dari" class="form-control mr-2" required>
      <label class="mr-2">Sampai</label>
      <input type="date" name="sampai" class="form-control mr-2" required>
      <button type="submit" class="btn btn-primary">
        <i class="fas fa-filter"></i> Filter
      </button>
    </form>
  </div>

  {{-- Tabel Laporan --}}
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-bordered table-striped mb-0">
        <thead class="bg-light">
          <tr>
            <th>No</th>
            <th>Pelanggan</th>
            <th>Mobil</th>
            <th>Tanggal Sewa</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Andi</td>
            <td>Toyota Avanza</td>
            <td>2025-06-20</td>
            <td>2025-06-23</td>
            <td><span class="badge badge-success">Selesai</span></td>
            <td>Rp1.500.000</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Rina</td>
            <td>Honda Brio</td>
            <td>2025-06-22</td>
            <td>2025-06-25</td>
            <td><span class="badge badge-success">Selesai</span></td>
            <td>Rp1.800.000</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Budi</td>
            <td>Xenia</td>
            <td>2025-06-21</td>
            <td>2025-06-23</td>
            <td><span class="badge badge-danger">Dibatalkan</span></td>
            <td>Rp0</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
