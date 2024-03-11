@extends('layouts.admin')

@section('title')
    Arsip Karyawan
@endsection

@section('container')
    <main>
        <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
            <div class="container-xl px-4">
                <div class="page-header-content">
                    <div class="row align-items-center justify-content-between pt-3">
                        <div class="col-auto mb-3">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="user"></i></div>
                                Arsip Karyawan
                            </h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-header-actions mb-4">
                        <div class="card-header">
                            List Arsip Karyawan
                            {{-- <form action="{{ route('print-arsip-karyawan') }}" method="GET" target="_blank"
                                class="d-flex gap-2">
                                <div class="form-group d-flex">
                                    <input type="date" name="dari" class="form-control"
                                        style="border-right: none !important; border-top-right-radius: 0px; border-bottom-right-radius: 0px; width: 143px;">
                                    <input type="date" name="sampai" class="form-control"
                                        style="border-left: none !important; border-top-left-radius: 0px; border-bottom-left-radius: 0px; width: 143px;">
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i data-feather="printer"></i> &nbsp; Cetak Laporan
                                </button>
                            </form> --}}
                        </div>
                        <div class="card-body">
                            @if (auth()->user()->level !== 'manajer')
                                <a class="btn btn-sm btn-primary mb-2" href="{{ route('arsip-karyawan.create') }}">
                                    +
                                    Tambah Arsip Karyawan
                                </a>
                            @endif
                            {{-- Alert --}}
                            @if (session()->has('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button class="btn-close" type="button" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @endif
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
                            {{-- List Data --}}
                            <table class="table table-striped table-hover table-sm" id="crudTable">
                                <thead>
                                    <tr>
                                        <th width="10">No.</th>
                                        <th>Kode Arsip</th>
                                        <th>Nama Penginput</th>
                                        <th>Departemen</th>
                                        {{-- <th>Kontak</th> --}}
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

@push('addon-script')
    <script>
        var datatable = $('#crudTable').DataTable({
            processing: true,
            serverSide: true,
            ordering: true,
            ajax: {
                url: '{!! url()->current() !!}',
            },
            columns: [{
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'kode_arsip_karyawan',
                    name: 'kode_arsip_karyawan'
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap'
                },
                {
                    data: 'nama_departemen',
                    name: 'nama_departemen'
                },
                // {
                //     data: 'employee.kontak',
                //     name: 'employee.kontak'
                // },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searcable: false,
                    width: '15%'
                },
            ]
        });
    </script>
@endpush
