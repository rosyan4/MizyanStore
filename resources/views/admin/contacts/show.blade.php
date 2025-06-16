@extends('layouts.admin')

@section('title', 'Detail Pesan')

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="card-title mb-0">Detail Pesan</h5>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Informasi Pengirim -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0">Informasi Pengirim</h6>
                        </div>
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tr>
                                    <th width="30%">Nama</th>
                                    <td>{{ $contact->name }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td>{{ $contact->phone_number ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @if($contact->is_read)
                                            <span class="badge bg-success text-white">Sudah Dibaca</span>
                                        @else
                                            <span class="badge bg-warning text-dark">Belum Dibaca</span>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Isi Pesan -->
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header bg-primary text-white">
                            <h6 class="mb-0">Isi Pesan</h6>
                        </div>
                        <div class="card-body">
                            <h5 class="mb-3">{{ $contact->subject }}</h5>
                            <div class="message-content bg-light p-3 rounded border">
                                {!! nl2br(e($contact->message)) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Balasan Admin -->
            @if($contact->admin_reply)
            <div class="card mb-4 border-left-success">
                <div class="card-header bg-success text-white">
                    <h6 class="mb-0">Balasan Anda</h6>
                </div>
                <div class="card-body">
                    <div class="admin-reply-content p-3 border rounded bg-light">
                        {!! nl2br(e($contact->admin_reply)) !!}
                    </div>
                    <small class="text-muted">Dibalas pada: {{ $contact->updated_at->format('d M Y H:i') }}</small>
                </div>
            </div>
            @endif

            <!-- Form Balasan -->
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h6 class="mb-0">Kirim Balasan</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.contacts.reply', $contact->id) }}">
                        @csrf
                        <div class="form-group">
                            <label for="admin_reply">Pesan Balasan</label>
                            <textarea name="admin_reply" id="admin_reply" class="form-control @error('admin_reply') is-invalid @enderror" rows="5" required>{{ old('admin_reply', $contact->admin_reply) }}</textarea>
                            @error('admin_reply')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-paper-plane"></i> Kirim Balasan
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .message-content, .admin-reply-content {
        white-space: pre-wrap;
        word-wrap: break-word;
    }
    .table-borderless td, .table-borderless th {
        border: none;
    }
    .table-borderless tr:not(:last-child) td {
        padding-bottom: 10px;
    }
</style>
@endsection
