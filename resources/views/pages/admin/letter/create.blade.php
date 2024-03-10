@extends('layouts.admin')

@section('title')
    Tambah Surat
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
                                Tambah Surat
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
            <form action="{{ route('letter.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row gx-4">
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-header">Form Surat</div>
                            <div class="card-body">
                                <div class="mb-3 row">
                                    <label for="tipe_surat" class="col-sm-3 col-form-label">Jenis Surat</label>
                                    @if (request('tipe_surat') == 'Surat Masuk')
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('tipe_surat') is-invalid @enderror"
                                                name="tipe_surat" placeholder="Kode Arsip.." value="Surat Masuk" required
                                                readonly>
                                        </div>
                                    @elseif(request('tipe_surat') == 'Surat Keluar')
                                        <div class="col-sm-9">
                                            <input type="text"
                                                class="form-control @error('tipe_surat') is-invalid @enderror"
                                                name="tipe_surat" placeholder="Kode Arsip.." value="Surat Keluar" required
                                                readonly>
                                        </div>
                                    @else
                                        <div class="col-sm-9">
                                            <select name="tipe_surat" id="tipe_surat" class="form-control" required>
                                                <option value="">Pilih..</option>
                                                <option value="Surat Masuk"
                                                    {{ old('tipe_surat') == 'Surat Masuk' ? 'selected' : '' }}>Surat Masuk
                                                </option>
                                                <option value="Surat Keluar"
                                                    {{ old('tipe_surat') == 'Surat Keluar' ? 'selected' : '' }}>Surat
                                                    Keluar</option>
                                            </select>
                                        </div>
                                    @endif
                                    @error('tipe_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode_surat" class="col-sm-3 col-form-label">Kode Surat</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="kode_surat"
                                            class="form-control @error('kode_surat') is-invalid @enderror"
                                            value="{{ old('kode_surat') }}" name="kode_surat" placeholder="Nomor Surat.."
                                            required readonly>
                                    </div>
                                    @error('kode_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="tanggal_surat" class="col-sm-3 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-9">
                                        <input type="date"
                                            class="form-control @error('tanggal_surat') is-invalid @enderror"
                                            value="{{ old('tanggal_surat') }}" name="tanggal_surat" required>
                                    </div>
                                    @error('tanggal_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="tanggal_diterima" class="col-sm-3 col-form-label">Tanggal Diterima</label>
                                    <div class="col-sm-9">
                                        <input type="date"
                                            class="form-control @error('tanggal_diterima') is-invalid @enderror"
                                            value="{{ old('tanggal_diterima') }}" name="tanggal_diterima" required>
                                    </div>
                                    @error('tanggal_diterima')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="perihal" class="col-sm-3 col-form-label">Perihal</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control @error('perihal') is-invalid @enderror"
                                            value="{{ old('perihal') }}" name="perihal" placeholder="Perihal.." required>
                                    </div>
                                    @error('perihal')
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
                                <div class="mb-3 row" id="divsender">
                                    <label for="id_pengirim_surat" class="col-sm-3 col-form-label">Pengirim</label>
                                    <div class="col-sm-9">
                                        <select name="id_pengirim_surat" class="form-control selectx">
                                            <option value="">Pilih..</option>
                                            @foreach ($senders as $sender)
                                                <option value="{{ $sender->id_pengirim_surat }}"
                                                    {{ old('id_pengirim_surat') == $sender->id_pengirim_surat ? 'selected' : '' }}>
                                                    {{ $sender->nama_pengirim_surat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_pengirim_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row" id="divreceiver">
                                    <label for="id_penerima_surat" class="col-sm-3 col-form-label">Penerima</label>
                                    <div class="col-sm-9">
                                        <select name="id_penerima_surat" class="form-control selectx">
                                            <option value="">Pilih..</option>
                                            @foreach ($receivers as $receiver)
                                                <option value="{{ $receiver->id_penerima_surat }}"
                                                    {{ old('id_penerima_surat') == $receiver->id_penerima_surat ? 'selected' : '' }}>
                                                    {{ $receiver->nama_penerima_surat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('id_penerima_surat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="mb-3 row">
                                    <label for="file_arsip_surat" class="col-sm-3 col-form-label">File</label>
                                    <div class="col-sm-9">
                                        <input type="file"
                                            class="form-control @error('file_arsip_surat') is-invalid @enderror"
                                            value="{{ old('file_arsip_surat') }}" accept=".pdf" name="file_arsip_surat"
                                            required>
                                        <div id="file_arsip_surat" class="form-text">Ekstensi .pdf</div>
                                    </div>
                                    @error('file_arsip_surat')
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
    <script>
        $(document).ready(function() {
            const codeSM = `@php echo $codeSM @endphp`;
            const codeSK = `@php echo $codeSK @endphp`;
            $("#divreceiver").hide();
            $("#divsender").hide();
            $("#tipe_surat").on('change', function() {

                if ($(this).val() == 'Surat Masuk') {
                    $("#divreceiver").show();
                    $("#divsender").hide();
                    $("#kode_surat").val(codeSM);
                }
                if ($(this).val() == 'Surat Keluar') {
                    $("#divreceiver").hide();
                    $("#divsender").show();
                    $("#kode_surat").val(codeSK);
                }
            });
        })
    </script>
@endpush
