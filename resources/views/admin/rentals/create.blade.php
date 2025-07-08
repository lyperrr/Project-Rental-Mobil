@extends('components.admin-layout')

@section('title', 'Tambah Penyewaan')

@section('content')
<div class="container-fluid">

  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 font-weight-bold">Tambah Penyewaan</h1>
    <a href="{{ route('admin.rentals.index') }}" class="btn btn-secondary">
      <i class="fas fa-arrow-left"></i> Kembali
    </a>
  </div>

  {{-- Form --}}
  <div class="card">
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul class="mb-0">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('admin.rentals.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="user_id" class="form-label">Pelanggan</label>
          <select name="user_id" id="user_id" class="form-control" required>
            <option value="">-- Pilih Pelanggan --</option>
            @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->username ?? $user->name }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label for="car_id" class="form-label">Mobil</label>
          <select name="car_id" id="car_id" class="form-control" required>
            <option value="">-- Pilih Mobil --</option>
            @foreach ($cars as $car)
              <option value="{{ $car->id }}" {{ old('car_id') == $car->id ? 'selected' : '' }}>
                {{ $car->brand }} {{ $car->model }}
              </option>
            @endforeach
          </select>
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="start_date" class="form-label">Tanggal Mulai Sewa</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ old('start_date') }}" required>
          </div>
          <div class="col-md-6 mb-3">
            <label for="end_date" class="form-label">Tanggal Selesai Sewa</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ old('end_date') }}" required>
          </div>
        </div>

        <div class="mb-3">
          <label for="total_price" class="form-label">Total Harga</label>
          <input type="number" name="total_price" id="total_price" class="form-control" value="{{ old('total_price') }}" required>
        </div>

        <div class="mb-3">
          <label for="status" class="form-label">Status</label>
          <select name="status" id="status" class="form-control" required>
            <option value="">-- Pilih Status --</option>
            @foreach (['pending','confirmed','cancelled','completed'] as $status)
              <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : '' }}>
                {{ ucfirst($status) }}
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">
          <i class="fas fa-save"></i> Simpan
        </button>
      </form>
    </div>
  </div>
</div>
@endsection
