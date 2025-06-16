<!-- resources/views/admin/blog/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Postingan Blog')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Postingan Blog</h3>
                    <div class="card-tools">
                        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus"></i> Tambah Baru
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.blog.index') }}" method="GET" class="mb-4">
                        <div class="row">
                            <div class="col-md-3">
                                <select name="published" class="form-control">
                                    <option value="">Semua Status</option>
                                    <option value="1" {{ request('published') == '1' ? 'selected' : '' }}>Telah Dipublikasikan</option>
                                    <option value="0" {{ request('published') == '0' ? 'selected' : '' }}>Draft</option>
                                </select>
                            </div>
                            <div class="col-md-7">
                                <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">Filter</button>
                            </div>
                        </div>
                    </form>

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Status</th>
                                <th>Tanggal Publikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($posts as $post)
                            <tr>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->user->name }}</td>
                                <td>
                                    <span class="badge bg-{{ $post->is_published ? 'success' : 'warning' }}">
                                        {{ $post->is_published ? 'Dipublikasikan' : 'Draft' }}
                                    </span>
                                </td>
                                <td>{{ $post->published_at->format('d M Y') }}</td>
                                <td>
                                    <a href="{{ route('admin.blog.edit', $post->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.blog.destroy', $post->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus postingan ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center">Belum ada postingan blog.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer clearfix">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
