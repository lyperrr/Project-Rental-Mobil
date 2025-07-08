@extends('components.admin-layout')
@section('title', 'Data Blog')
@section('content')
<div class="container-fluid">
  {{-- Header --}}
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3 text-gray-800 font-weight-bold">Data Blog</h1>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addBlogModal">
      <i class="fas fa-plus"></i> Tambah Blog
    </button>
  </div>

  {{-- Alert Messages --}}
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  @if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('error') }}
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  @endif

  {{-- Tabel Blog --}}
  <div class="card">
    <div class="card-body p-0">
      <table class="table table-striped table-hover mb-0">
        <thead class="bg-light">
          <tr>
            <th>No</th>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($blogs as $index => $blog)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>
                @if($blog->image)
                  <img src="data:image/jpeg;base64,{{ base64_encode($blog->image) }}" 
                       alt="Blog Image" 
                       class="img-thumbnail" 
                       style="width: 50px; height: 50px; object-fit: cover; cursor: pointer;"
                       onclick="showImageModal('{{ base64_encode($blog->image) }}', '{{ $blog->title }}')">
                @else
                  <div class="bg-light text-center d-flex align-items-center justify-content-center" 
                       style="width: 50px; height: 50px; border-radius: 4px;">
                    <i class="fas fa-image text-muted"></i>
                  </div>
                @endif
              </td>
              <td>
                <strong>{{ Str::limit($blog->title, 30) }}</strong>
                <br>
                <small class="text-muted">ID: {{ $blog->id }}</small>
              </td>
              <td>
                <span class="text-muted">{{ Str::limit($blog->description ?? 'Tidak ada deskripsi', 50) }}</span>
                @if($blog->description && strlen($blog->description) > 50)
                  <button type="button" class="btn btn-link btn-sm p-0 ml-1" 
                          onclick="showDescriptionModal('{{ addslashes($blog->description) }}', '{{ addslashes($blog->title) }}')">
                    Lihat selengkapnya
                  </button>
                @endif
              </td>
              <td>{{ \Carbon\Carbon::parse($blog->created_at)->format('d M Y H:i') }}</td>
              <td>
                <button type="button" class="btn btn-sm btn-info" 
                        onclick="viewBlog({{ $blog->id }})" title="Lihat Detail">
                  <i class="fas fa-eye"></i>
                </button>
                <button type="button" class="btn btn-sm btn-warning" 
                        onclick="editBlog({{ $blog->id }})" title="Edit">
                  <i class="fas fa-edit"></i>
                </button>
                <button type="button" class="btn btn-sm btn-danger" 
                        onclick="deleteBlog({{ $blog->id }}, '{{ addslashes($blog->title) }}')" title="Hapus">
                  <i class="fas fa-trash"></i>
                </button>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center text-muted py-4">
                <i class="fas fa-inbox fa-2x mb-2"></i>
                <br>
                Belum ada data blog.
              </td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

{{-- Modal Tambah/Edit Blog --}}
<div class="modal fade" id="addBlogModal" tabindex="-1" role="dialog" aria-labelledby="addBlogModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addBlogModalLabel">Tambah Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="blogForm" action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="form-group">
            <label for="title">Judul Blog <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="title" name="title" required maxlength="150">
          </div>
          
          <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Masukkan deskripsi singkat blog..."></textarea>
          </div>
          
          <div class="form-group">
            <label for="content">Konten Blog <span class="text-danger">*</span></label>
            <textarea class="form-control" id="content" name="content" rows="8" required placeholder="Masukkan konten blog..."></textarea>
          </div>
          
          <div class="form-group">
            <label for="image">Gambar Blog</label>
            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
            <small class="form-text text-muted">Format yang didukung: JPG, JPEG, PNG, GIF. Maksimal 2MB.</small>
            <div id="imagePreview" class="mt-2"></div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Modal Lihat Gambar --}}
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="imageModalLabel">Gambar Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
        <img id="modalImage" src="" alt="Blog Image" class="img-fluid">
      </div>
    </div>
  </div>
</div>

{{-- Modal Lihat Deskripsi --}}
<div class="modal fade" id="descriptionModal" tabindex="-1" role="dialog" aria-labelledby="descriptionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="descriptionModalLabel">Deskripsi Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p id="modalDescription"></p>
      </div>
    </div>
  </div>
</div>

{{-- Modal Lihat Detail Blog --}}
<div class="modal fade" id="viewBlogModal" tabindex="-1" role="dialog" aria-labelledby="viewBlogModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="viewBlogModalLabel">Detail Blog</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="blogDetailContent">
          <!-- Detail blog akan dimuat di sini -->
        </div>
      </div>
    </div>
  </div>
</div>

<script>
// Preview gambar saat dipilih
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('imagePreview');
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `<img src="${e.target.result}" class="img-thumbnail mt-2" style="max-width: 200px;">`;
        };
        reader.readAsDataURL(file);
    } else {
        preview.innerHTML = '';
    }
});

// Fungsi untuk menampilkan modal gambar
function showImageModal(imageData, title) {
    document.getElementById('modalImage').src = 'data:image/jpeg;base64,' + imageData;
    document.getElementById('imageModalLabel').textContent = 'Gambar - ' + title;
    $('#imageModal').modal('show');
}

// Fungsi untuk menampilkan modal deskripsi
function showDescriptionModal(description, title) {
    document.getElementById('modalDescription').textContent = description;
    document.getElementById('descriptionModalLabel').textContent = 'Deskripsi - ' + title;
    $('#descriptionModal').modal('show');
}

// Fungsi untuk melihat detail blog
function viewBlog(id) {
    // Ajax call untuk mengambil detail blog
    fetch(`/admin/blogs/${id}`)
        .then(response => response.json())
        .then(data => {
            const content = `
                <div class="row">
                    <div class="col-md-4">
                        ${data.image ? 
                            `<img src="data:image/jpeg;base64,${data.image}" class="img-fluid rounded">` : 
                            '<div class="bg-light text-center p-4 rounded"><i class="fas fa-image fa-3x text-muted"></i><br>Tidak ada gambar</div>'
                        }
                    </div>
                    <div class="col-md-8">
                        <h4>${data.title}</h4>
                        <p class="text-muted">${data.description || 'Tidak ada deskripsi'}</p>
                        <small class="text-muted">Dibuat: ${new Date(data.created_at).toLocaleDateString('id-ID')}</small>
                    </div>
                </div>
                <hr>
                <h5>Konten:</h5>
                <div class="content-preview" style="max-height: 400px; overflow-y: auto;">
                    ${data.content.replace(/\n/g, '<br>')}
                </div>
            `;
            document.getElementById('blogDetailContent').innerHTML = content;
            document.getElementById('viewBlogModalLabel').textContent = 'Detail - ' + data.title;
            $('#viewBlogModal').modal('show');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat detail blog');
        });
}

// Fungsi untuk edit blog
function editBlog(id) {
    // Ajax call untuk mengambil data blog
    fetch(`/admin/blogs/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('title').value = data.title;
            document.getElementById('description').value = data.description || '';
            document.getElementById('content').value = data.content;
            document.getElementById('addBlogModalLabel').textContent = 'Edit Blog';
            document.getElementById('blogForm').action = `/admin/blogs/${id}`;
            document.getElementById('blogForm').insertAdjacentHTML('afterbegin', '<input type="hidden" name="_method" value="PUT">');
            $('#addBlogModal').modal('show');
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Gagal memuat data blog');
        });
}

// Fungsi untuk menghapus blog
function deleteBlog(id, title) {
    if (confirm(`Apakah Anda yakin ingin menghapus blog "${title}"?`)) {
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = `/admin/blogs/${id}`;
        form.innerHTML = `
            @csrf
            @method('DELETE')
        `;
        document.body.appendChild(form);
        form.submit();
    }
}

// Reset form saat modal ditutup
$('#addBlogModal').on('hidden.bs.modal', function () {
    document.getElementById('blogForm').reset();
    document.getElementById('imagePreview').innerHTML = '';
    document.getElementById('addBlogModalLabel').textContent = 'Tambah Blog';
    document.getElementById('blogForm').action = '{{ route("admin.blogs.store") }}';
    const methodInput = document.querySelector('input[name="_method"]');
    if (methodInput) {
        methodInput.remove();
    }
});
</script>

@endsection