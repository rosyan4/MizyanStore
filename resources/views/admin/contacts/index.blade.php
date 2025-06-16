@extends('layouts.admin')

@section('title', 'Pesan Masuk')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Pesan Masuk</h3>
        </div>
        <div class="card-body">
            <form method="GET" action="{{ route('admin.contacts.index') }}" class="mb-4">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan nama atau subjek..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-3">
                        <select name="is_read" class="form-control">
                            <option value="">Semua Status</option>
                            <option value="0" {{ request('is_read') == '0' ? 'selected' : '' }}>Belum Dibaca</option>
                            <option value="1" {{ request('is_read') == '1' ? 'selected' : '' }}>Sudah Dibaca</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-filter mr-1"></i> Filter
                        </button>
                    </div>
                    <div class="col-md-3 text-right">
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-sync-alt"></i> Reset
                        </a>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Pengirim</th>
                            <th>Subjek</th>
                            <th>Tanggal</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contacts as $contact)
                        <tr class="{{ $contact->is_read ? '' : 'table-warning' }}">
                            <td>{{ $loop->iteration + ($contacts->currentPage() - 1) * $contacts->perPage() }}</td>
                            <td>
                                <strong>{{ $contact->name }}</strong><br>
                                <small>{{ $contact->email }}</small>
                                @if($contact->phone_number)
                                <br><small>{{ $contact->phone_number }}</small>
                                @endif
                            </td>
                            <td>{{ Str::limit($contact->subject, 50) }}</td>
                            <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                            <td>
                                @if($contact->is_read)
                                    <span class="badge bg-success text-white">Dibaca</span>
                                @else
                                    <span class="badge bg-warning text-dark">Baru</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fas fa-eye"></i> Lihat
                                </a>
                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Hapus pesan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Tidak ada pesan ditemukan.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $contacts->appends(request()->query())->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
@endsection
