@extends('layouts.admin')

@section('title', 'Profil')

@section('content')
@php
    $activeTab = request('tab', 'pengaturan');
@endphp
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        @if($user->profile_photo)
                            <img class="profile-user-img img-fluid img-circle" src="{{ asset('storage/' . $user->profile_photo) }}" alt="Foto Profil">
                        @else
                            <div class="profile-user-img img-fluid img-circle bg-secondary d-flex align-items-center justify-content-center" style="width: 100px; height: 100px;">
                                <i class="fas fa-user fa-3x text-white"></i>
                            </div>
                        @endif
                    </div>

                    <h3 class="profile-username text-center">{{ $user->name }}</h3>

                    <p class="text-muted text-center">{{ ucfirst($user->role) }}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>Email</b> <span class="float-right">{{ $user->email }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>No. Telepon</b> <span class="float-right">{{ $user->phone_number ?? 'Belum diisi' }}</span>
                        </li>
                        <li class="list-group-item">
                            <b>Bergabung Sejak</b> <span class="float-right">{{ $user->created_at->format('d M Y') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ $activeTab === 'pengaturan' ? 'active' : '' }}" href="{{ route('admin.profile', ['tab' => 'pengaturan']) }}">Pengaturan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $activeTab === 'password' ? 'active' : '' }}" href="{{ route('admin.profile', ['tab' => 'password']) }}">Ubah Kata Sandi</a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade {{ $activeTab === 'pengaturan' ? 'show active' : '' }}" id="pengaturan">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone_number" class="col-sm-2 col-form-label">No. Telepon</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="profile_photo" class="col-sm-2 col-form-label">Foto Profil</label>
                                    <div class="col-sm-10">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="profile_photo" name="profile_photo">
                                            <label class="custom-file-label" for="profile_photo">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-2 col-sm-10">
                                        <button type="submit" class="btn btn-success">Perbarui Profil</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab-pane fade {{ $activeTab === 'password' ? 'show active' : '' }}" id="password">
                            <form class="form-horizontal" method="POST" action="{{ route('admin.profile.password.update') }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="current_password" class="col-sm-4 col-form-label">Kata Sandi Saat Ini</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="current_password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password" class="col-sm-4 col-form-label">Kata Sandi Baru</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="new_password" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="new_password_confirmation" class="col-sm-4 col-form-label">Konfirmasi Kata Sandi</label>
                                    <div class="col-sm-8">
                                        <input type="password" name="new_password_confirmation" class="form-control" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary">Perbarui Kata Sandi</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> <!-- /.tab-content -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Menampilkan nama file yang dipilih di input file
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>
@endpush
