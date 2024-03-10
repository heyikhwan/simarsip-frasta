@extends('layouts.admin')

@section('title')
    Tambah Arsip Karyawan
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
                                Tambah Arsip Karyawan
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
            <form action="{{ route('arsip-karyawan.store') }}" method="post" enctype="multipart/form-data">

                @csrf
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header">Form Arsip Karyawan</div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="kode_surat" class="col-sm-3 col-form-label">Kode Arsip</label>
                                    <div class="col-sm-9">
                                        <input type="text"
                                            class="form-control @error('kode_arsip_karyawan') is-invalid @enderror"
                                            value="{{ $codeAK }}" name="kode_arsip_karyawan"
                                            placeholder="Kode Arsip.." required readonly>
                                    </div>
                                    @error('kode_arsip_karyawan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row" id="divreceiver">
                                    <label for="sender_id" class="col-sm-3 col-form-label">Kategori Arsip</label>
                                    <div class="col-sm-9">
                                        <select name="id_kategori_arsip" class="form-control selectx">
                                            <option value="">Pilih Kategori Arsip..</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id_kategori_arsip }}"
                                                    {{ old('id_kategori_arsip') == $category->id_kategori_arsip ? 'selected' : '' }}>
                                                    {{ $category->nama_kategori_arsip }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_kategori_arsip')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="mb-3 row" id="divsender">
                                    <label for="id_karyawan" class="col-sm-3 col-form-label">Karyawan</label>
                                    <div class="col-sm-9">
                                        <select name="id_karyawan" class="form-control selectx">
                                            <option value="">Pilih Karyawan..</option>
                                            @foreach ($employees as $employee)
                                                <option value="{{ $employee->id_karyawan }}"
                                                    {{ old('employee_id') == $employee->id_karyawan ? 'selected' : '' }}>
                                                    {{ $employee->nama_karyawan }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_karyawan')
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
                                    @error('id_departemen')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="perihal" class="col-sm-3 col-form-label">Retensi Arsip</label>
                                    <div class="col-sm-9 d-flex ">
                                        <input type="date" class="form-control @error('from') is-invalid @enderror"
                                            value="{{ old('from') }}" name="from" placeholder="Retensi arsip.."
                                            required>
                                        <input type="date" class="form-control @error('to') is-invalid @enderror"
                                            value="{{ old('to') }}" name="to" placeholder="Retensi arsip.."
                                            required>
                                    </div>
                                    @error('retensi_arsip')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="file_arsip_karyawan" class="col-sm-3 col-form-label">File</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('file_arsip_karyawan') is-invalid @enderror"
                                            value="{{ old('file_arsip_karyawan') }}" name="file_arsip_karyawan"
                                            accept=".pdf" required>
                                        <div id="file_arsip_karyawan" class="form-text">Ekstensi .pdf</div>
                                    </div>
                                    @error('file_arsip_karyawan')
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
