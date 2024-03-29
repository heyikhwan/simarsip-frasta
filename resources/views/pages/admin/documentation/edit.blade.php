@extends('layouts.admin')

@section('title')
Ubah Arsip Dokumentasi
@endsection

@section('container')
<main>
    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
        <div class="container-fluid px-4">
            <div class="page-header-content">
                <div class="row align-items-center justify-content-between pt-3">
                    <div class="col-auto mb-3">
                        <h1 class="page-header-title">
                            <div class="page-header-icon"><i data-feather="file-text"></i></div>
                            Ubah Arsip Dokumentasi
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali Ke Semua Arsip Dokumentasi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main page content-->
    <div class="container-fluid px-4">
        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ route('documentation.update', $item->id_arsip_dokumentasi) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row gx-4">
                <div class="col-lg-9">
                    <div class="card mb-4">
                        <div class="card-header">Form Arsip Dokumentasi</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <label for="kode_arsip_dokumentasi" class="col-sm-3 col-form-label">Kode Arsip</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control @error('kode_arsip_dokumentasi') is-invalid @enderror"
                                        value="{{ $item->kode_arsip_dokumentasi }}" name="kode_arsip_dokumentasi"
                                        placeholder="Kode Arsip.." required readonly>
                                </div>
                                @error('kode_arsip_dokumentasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggal_dokumentasi" class="col-sm-3 col-form-label">Tanggal
                                    Dokumentasi</label>
                                <div class="col-sm-9">
                                    <input type="date"
                                        class="form-control @error('tanggal_dokumentasi') is-invalid @enderror"
                                        value="{{ $item->tanggal_dokumentasi }}" name="tanggal_dokumentasi" required>
                                </div>
                                @error('tanggal_dokumentasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="judul" class="col-sm-3 col-form-label">Judul</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror"
                                        value="{{ $item->judul }}" name="judul" placeholder="Judul" required>
                                </div>
                                @error('judul')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror"
                                        name="deskripsi" id="deskripsi" rows="3" placeholder="Deskripsi.."
                                        required>{{ $item->deskripsi }}</textarea>
                                </div>
                                @error('deskripsi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="id_departemen" class="col-sm-3 col-form-label">Departemen</label>
                                <div class="col-sm-9">
                                    <select name="id_departemen" class="form-control selectx" required>
                                        <option value="">Pilih..</option>
                                        @foreach ($departments as $department)
                                        <option value="{{ $department->id_departemen }}" {{ $item->id_departemen ==
                                            $department->id_departemen ? 'selected' : '' }}>
                                            {{ $department->nama_departemen }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('id_departemen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="file_arsip_dokumentasi" class="col-sm-3 col-form-label">File</label>
                                <div class="col-sm-9">
                                    <input type="file"
                                        class="form-control @error('file_arsip_dokumentasi') is-invalid @enderror"
                                        value="{{ old('file_arsip_dokumentasi') }}" accept=".jpg,.png"
                                        name="file_arsip_dokumentasi">
                                    <div id="file_arsip_dokumentasi" class="form-text">Ekstensi .jpg, .png | Kosongkan
                                        file jika tidak diisi</div>
                                </div>
                                @error('file_arsip_dokumentasi')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3 row">
                                <label for="file_arsip_surat" class="col-sm-3 col-form-label"></label>
                                <div class="col-sm-9">
                                    <button type="submit" class="btn btn-primary">Ubah</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection

@push('addon-style')
<link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.1.1/dist/select2-bootstrap-5-theme.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
@endpush

@push('addon-script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(".selectx").select2({
            theme: "bootstrap-5"
        });
</script>
@endpush