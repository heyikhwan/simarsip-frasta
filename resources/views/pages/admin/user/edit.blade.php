@extends('layouts.admin')

@section('title')
    Ubah Pengguna
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user-plus"></i></div>
                                Ubah Pengguna
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <a class="btn btn-sm btn-light text-primary" href="{{ route('user.index') }}">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali ke Semua Pengguna
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-xl-12">
                    <!-- Account details card-->
                    <div class="card mb-4">
                        <div class="card-header">Informasi Akun</div>
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
                            <form action="{{ route('user.update', $item->id_user) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <!-- Form Row-->
                                <div class="row gx-3 mb-3">
                                    <!-- Form Group (first name)-->
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="nama_lengkap">Nama</label>
                                        <input class="form-control @error('nama_lengkap') is-invalid @enderror"
                                            name="nama_lengkap" type="text" value="{{ $item->nama_lengkap }}" required />
                                        @error('nama_lengkap')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Form Group (email address)-->
                                <div class="mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="email">Email</label>
                                        <input class="form-control @error('email') is-invalid @enderror" name="email"
                                            type="email" value="{{ $item->email }}" required />
                                        @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="id_departemen">Department</label>
                                        <select name="id_departemen" class="form-select">
                                            @foreach ($department as $d)
                                                <option value="{{ $d->id_departemen }}"
                                                    @if ($d->id_departemen == $item->id_departemen) selected @endif>
                                                    {{ $d->nama_departemen }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('id_departemen')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="level">Level</label>
                                        <select name="level" class="form-select">
                                            <option value="karyawan" @if ($item->level == 'karyawan') selected @endif>
                                                Karyawan</option>
                                            <option value="admin" @if ($item->level == 'admin') selected @endif>Admin
                                            </option>
                                            <option value="manajer" @if ($item->level == 'manajer') selected @endif>
                                                Manajer</option>
                                        </select>
                                        @error('level')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Form Group (Password)-->
                                <div class="mb-3">
                                    <div class="col-md-6">
                                        <label class="small mb-1" for="password">Password</label>
                                        <input class="form-control @error('password') is-invalid @enderror" name="password"
                                            type="password" />
                                        <small class="form-text text-muted">Kosongkan jika tidak ingin mengganti
                                            password</small>
                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <!-- Submit button-->
                                <button class="btn btn-primary" type="submit">
                                    Perbarui Profil
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Ambil elemen-elemen yang dibutuhkan
            var levelSelect = document.querySelector("select[name='level']");
            var departmentLabel = document.querySelector("label[for='id_departemen']");
            var departmentSelect = document.querySelector("select[name='id_departemen']");

            // Tambahkan event listener untuk mengidentifikasi perubahan pada field "Level"
            levelSelect.addEventListener("change", function() {
                // Periksa apakah level yang dipilih adalah "Admin" atau "Manajer"
                if (levelSelect.value === "admin" || levelSelect.value === "manajer") {
                    // Sembunyikan label dan field "Department"
                    departmentLabel.style.display = "none";
                    departmentSelect.style.display = "none";
                    departmentSelect.value = "";
                } else {
                    // Tampilkan kembali label dan field "Department" jika level yang dipilih bukan "Admin" atau "Manajer"
                    departmentLabel.style.display = "block";
                    departmentSelect.style.display = "block";
                }
            });

            // Inisialisasi status awal pada halaman load
            if (levelSelect.value === "admin" || levelSelect.value === "manajer") {
                departmentLabel.style.display = "none";
                departmentSelect.style.display = "none";
                departmentSelect.value = "";
            }
        });
    </script>
@endsection
