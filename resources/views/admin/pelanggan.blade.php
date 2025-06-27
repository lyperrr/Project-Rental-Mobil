@extends('components.admin-layout')

@section('title', 'Data Pelanggan')

@section('content')

<div class="container-fluid">

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 font-weight-bold">Data Pelanggan</h1>
    <a href="#" class="btn btn-primary">
      <i class="fas fa-plus"></i> Tambah Pelanggan
    </a>
  </div>

  {{-- Table --}}
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-striped table-hover mb-0">
        <thead class="bg-light">
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No Telepon</th>
            <th>Alamat</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Andi Saputra</td>
            <td>andi@gmail.com</td>
            <td>08123456789</td>
            <td>Denpasar</td>
            <td>
              <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
              <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          <tr>
            <td>2</td>
            <td>Sri Wahyuni</td>
            <td>sri@gmail.com</td>
            <td>08234567890</td>
            <td>Badung</td>
            <td>
              <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
              <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
            </td>
          </tr>
          {{-- Tambahkan data lainnya --}}
        </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
