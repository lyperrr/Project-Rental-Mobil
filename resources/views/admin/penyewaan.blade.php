@extends('components.admin-layout')

@section('title', 'Data Penyewaan')

@section('content')

<div class="container-fluid">

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 font-weight-bold">Data Penyewaan</h1>
    <a href="#" class="btn btn-primary">
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
          <tr>
            <td>1</td>
            <td>Andi</td>
            <td>Toyota Avanza</td>
            <td>2025-06-20</td>
            <td>2025-06-23</td>
            <td><span class="badge badge-warning">Berlangsung</span></td>
            <td>Rp1.500.000</td>
            <td>
              <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
              <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Sri</td>
            <td>Honda Brio</td>
            <td>2025-06-18</td>
            <td>2025-06-21</td>
            <td><span class="badge badge-success">Selesai</span></td>
            <td>Rp1.800.000</td>
            <td>
              <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
              <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          {{-- Tambahkan baris lain di sini --}}
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
