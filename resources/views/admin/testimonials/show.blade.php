@extends('layouts.admin')

@section('title', 'Detail Testimonial')

@section('content')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary btn-sm">
            <i class="fas fa-arrow-left me-1"></i> Kembali
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-1"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Testimonial dari {{ $testimonial->name }}</h6>
        </div>
        <div class="card-body">
            <div class="row">
                {{-- Detail --}}
                <div class="col-md-8">
                    <table class="table table-borderless">
                        <tr>
                            <th>Nama</th>
                            <td>: {{ $testimonial->name }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>: {{ $testimonial->location ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Rating</th>
                            <td>: {{ $testimonial->rating }} / 5</td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td>:
                                @if ($testimonial->is_approved)
                                    <span class="badge bg-success">Disetujui</span>
                                @else
                                    <span class="badge bg-warning text-dark">Menunggu</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Isi Testimonial</th>
                            <td>: {{ $testimonial->content }}</td>
                        </tr>
                    </table>
                </div>

                {{-- Foto --}}
                <div class="col-md-4 text-center">
                    @if ($testimonial->photo && file_exists(storage_path('app/public/' . $testimonial->photo)))
                        <img src="{{ Storage::url($testimonial->photo) }}" class="img-fluid rounded shadow-sm mb-2" style="max-height: 250px;" alt="Foto Testimonial">
                    @else
                        <p class="text-muted"><i class="fas fa-image fa-2x"></i><br>Foto tidak tersedia</p>
                    @endif
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-4">
                @if (!$testimonial->is_approved)
                    <form action="{{ route('admin.testimonials.approve', $testimonial->id) }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fas fa-check me-1"></i> Setujui
                        </button>
                    </form>
                @endif
                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus testimonial ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        <i class="fas fa-trash me-1"></i> Hapus
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
