@extends('layouts.admin')

@section('title')
    Detail Arsip Dokumentasi
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
                                Detail Arsip Dokumentasi
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
            <div class="row gx-4">
                <div class="col-lg-7">
                    <div class="card mb-4">
                        <div class="card-header">Detail Arsip Dokumentasi</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Kode Arsip</th>
                                            <td>{{ $item->kode_arsip_dokumentasi }}</td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Dokumentasi</th>
                                            <td>{{ $item->tanggal_dokumentasi }}</td>
                                        </tr>
                                        <tr>
                                            <th>Departemen</th>
                                            <td>{{ $item->departemen->nama_departemen }}</td>
                                        </tr>
                                        <tr>
                                            <th>Judul</th>
                                            <td>{{ $item->judul }}</td>
                                        </tr>
                                        <tr>
                                            <th>Deskrispsi</th>
                                            <td>{{ $item->deskripsi }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card mb-4">
                        <div class="card-header">
                            File Surat -
                            <a href="{{ route('download-arsip-dokumentasi', $item->id_arsip_dokumentasi) }}"
                                class="btn btn-sm btn-primary">
                                <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Download Arsip
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">

                                <img src="{{ url('storage/' . $item->file_arsip_dokumentasi) }}" width="500" height="375">
                                <a class="btn btn-sm btn-primary text-center mt-3" target="_blank"
                                    href="{{ url('storage/' . $item->file_arsip_dokumentasi) }}">View
                                    Fullscreen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
