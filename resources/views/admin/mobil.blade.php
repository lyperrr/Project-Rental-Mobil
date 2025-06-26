@extends('components.admin-layout')

@section('title', 'Data Mobil')

@section('content')

<div class="container-fluid">

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 font-weight-bold">Data Mobil</h1>
    <a href="#" class="btn btn-primary">
      <i class="fas fa-plus"></i> Tambah Mobil
    </a>
  </div>

  {{-- Table --}}
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-striped table-hover mb-0">
        <thead class="bg-light">
          <tr>
            <th>#</th>
            <th>Foto</th>
            <th>Nama Mobil</th>
            <th>Merk</th>
            <th>Plat Nomor</th>
            <th>Status</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td><img src="/images/mobil1.jpg" alt="Mobil" width="80"></td>
            <td>Toyota Avanza</td>
            <td>Toyota</td>
            <td>DK 1234 AB</td>
            <td><span class="badge badge-success">Tersedia</span></td>
            <td>
              <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
              <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td><img src="/images/mobil2.jpg" alt="Mobil" width="80"></td>
            <td>Honda Brio</td>
            <td>Honda</td>
            <td>DK 5678 CD</td>
            <td><span class="badge badge-secondary">Disewa</span></td>
            <td>
              <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
              <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          {{-- Tambahkan data lain di sini --}}
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
