@extends('layouts.admin')

@section('title')
    Tambah Dokumentasi
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
                                Tambah Arsip Dokumentasi
                            </h1>
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
            <form action="{{ route('documentation.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header">Form Arsip Dokumentasi</div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="kode_surat" class="col-sm-3 col-form-label">Kode Arsip</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('kode_arsip_dokumentasi') is-invalid @enderror"
                                            value="{{ $codeAD }}" name="kode_arsip_dokumentasi"
                                            placeholder="Kode Arsip.." required readonly>
                                    </div>
                                    @error('kode_arsip_dokumentasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode_surat" class="col-sm-3 col-form-label">Tanggal Dokumentasi</label>
                                    <div class="col-sm-9">
                                        <input type="date"
                                            class="form-control @error('tanggal_dokumentasi') is-invalid @enderror"
                                            value="{{ old('tanggal_dokumentasi') }}" name="tanggal_dokumentasi"
                                            placeholder="Kode Arsip.." required>
                                    </div>
                                    @error('tanggal_dokumentasi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="id_departemen" class="col-sm-3 col-form-label">Departemen</label>
                                    <div class="col-sm-9">
                                        <select name="id_departemen" class="form-control selectx" required>
                                            <option value="">Pilih Departemen..</option>
                                            @foreach ($departments as $department)
                                                <option value="{{ $department->id_departemen }}"
                                                    {{ old('id_departemen') == $department->id_departemen ? 'selected' : '' }}>
                                                    {{ $department->nama_departemen }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('department_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="perihal" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('keterangan') is-invalid @enderror"
                                            value="{{ old('keterangan') }}" name="keterangan" placeholder="Keterangan.."
                                            required>
                                    </div>
                                    @error('keterangan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <input type="text" name="id_karyawan" value="{{ auth()->user()->id_user }}" hidden>
                                <div class="mb-3 row">
                                    <label for="file_arsip_dokumentasi" class="col-sm-3 col-form-label">File</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('file_arsip_dokumentasi') is-invalid @enderror"
                                            value="{{ old('file_arsip_dokumentasi') }}" name="file_arsip_dokumentasi"
                                            accept=".jpg,.png" required>
                                        <div id="file_arsip_dokumentasi" class="form-text">Ekstensi .jpg, .png</div>
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
                                        <button type="submit" class="btn btn-primary">Simpan</button>
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
