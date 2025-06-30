@extends('components.admin-layout')

@section('title', 'Data Blog')

@section('content')
<div class="container-fluid">

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 font-weight-bold">Data Blog</h1>
    <a href="#" class="btn btn-primary">
      <i class="fas fa-plus"></i> Tambah Blog
    </a>
  </div>

  {{-- Tabel Blog --}}
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-striped table-hover mb-0">
        <thead class="bg-light">
          <tr>
            <th>No</th>
            <th>Judul</th>
            <th>Kategori</th>
            <th>Penulis</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($blogs as $index => $blog)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $blog->title }}</td>
              <td>{{ $blog->category }}</td>
              <td>{{ $blog->author ?? '-' }}</td>
              <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y') }}</td>
              <td>
                <a href="#" class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></a>
                <a href="#" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-muted">Belum ada data blog.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

</div>
@endsection
