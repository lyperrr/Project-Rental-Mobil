@extends('components.admin-layout')

@section('title', 'Dashboard')

@section('content')

<div class="container-fluid">

  {{-- Judul Halaman --}}
  <div class="mb-4">
    <h1 class="h3 text-gray-800 font-weight-bold">Dashboard Admin</h1>
    <p class="text-muted">Selamat datang di sistem manajemen rental mobil.</p>
  </div>

  {{-- Statistik Ringkas --}}
  <div class="row">

    <div class="col-lg-4 col-md-6 mb-4">
      <div class="small-box bg-info">
        <div class="inner">
          <h3>25</h3>
          <p>Total Mobil</p>
        </div>
        <div class="icon">
          <i class="fas fa-car"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
      <div class="small-box bg-success">
        <div class="inner">
          <h3>120</h3>
          <p>Total Pelanggan</p>
        </div>
        <div class="icon">
          <i class="fas fa-users"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

    <div class="col-lg-4 col-md-6 mb-4">
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>15</h3>
          <p>Rental Berlangsung</p>
        </div>
        <div class="icon">
          <i class="fas fa-receipt"></i>
        </div>
        <a href="#" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>

  </div>

  {{-- Penyewaan Terbaru --}}
  <div class="card">
    <div class="card-header bg-white">
      <h3 class="card-title font-weight-bold text-dark">Penyewaan Terbaru</h3>
    </div>
    <div class="card-body p-0">
      <table class="table table-hover table-striped mb-0">
        <thead class="bg-light">
          <tr>
            <th>Nama</th>
            <th>Mobil</th>
            <th>Tanggal Sewa</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Andi</td>
            <td>Toyota Avanza</td>
            <td>2025-06-25</td>
            <td><span class="badge badge-success">Berlangsung</span></td>
          </tr>
          <tr>
            <td>Sari</td>
            <td>Honda Brio</td>
            <td>2025-06-23</td>
            <td><span class="badge badge-secondary">Selesai</span></td>
          </tr>
          <tr>
            <td>Budi</td>
            <td>Daihatsu Xenia</td>
            <td>2025-06-22</td>
            <td><span class="badge badge-danger">Dibatalkan</span></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
