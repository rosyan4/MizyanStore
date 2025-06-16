@extends('layouts.admin')

@section('title', 'Galeri')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- Header Kartu -->
                <div class="card-header">
                    <h3 class="card-title">Daftar Galeri</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Baru
                        </a>
                    </div>
                </div>

                <!-- Body Kartu -->
                <div class="card-body">
                    <!-- Form Filter -->
                    <form action="{{ route('admin.gallery.index') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="category_id" class="form-control">
                                    <option value="">Semua Kategori</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select name="is_active" class="form-control">
                                    <option value="">Semua Status</option>
                                    <option value="1" {{ request('is_active') == '1' ? 'selected' : '' }}>Aktif</option>
                                    <option value="0" {{ request('is_active') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                        </div>
                    </form>

                    <!-- Daftar Galeri -->
                    <div class="row">
                        @foreach($galleryItems as $item)
                        <div class="col-md-3 mb-4">
                            <div class="card h-100">
                                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top" alt="{{ $item->title }}" style="height: 180px; object-fit: cover;">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $item->title }}</h6>
                                    <p class="card-text text-muted small">
                                        {{ $item->category->name ?? 'Tanpa Kategori' }}
                                    </p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-{{ $item->is_active ? 'success' : 'danger' }}">
                                            {{ $item->is_active ? 'Aktif' : 'Tidak Aktif' }}
                                        </span>
                                        <span>Urutan: {{ $item->order }}</span>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('admin.gallery.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.gallery.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <!-- Footer Kartu -->
                <div class="card-footer clearfix">
                    {{ $galleryItems->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
