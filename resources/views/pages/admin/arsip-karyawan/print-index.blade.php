@extends('layouts.admin')

@section('title')
Laporan Arsip Karyawan
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
                            Laporan Arsip Karyawan
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ url('admin/print/arsip-karyawan') }}" method="POST" target="_blank">
                            @csrf

                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label for="dari" class="form-label">Tanggal Dari</label>
                                    <input type="date" class="form-control" id="dari" name="dari">
                                </div>
                                <div class="col-md-6">
                                    <label for="sampai" class="form-label">Tanggal Sampai</label>
                                    <input type="date" class="form-control" id="sampai" name="sampai">
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-sm btn-primary mt-3">
                                    <i data-feather="printer" class="me-2"></i>Cetak Laporan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection