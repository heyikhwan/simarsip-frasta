@extends('layouts.admin')

@section('title')
    Detail Arsip Karyawan
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
                                Detail Arsip Karyawan
                            </h1>
                        </div>
                        <div class="col-12 col-xl-auto mb-3">
                            <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                                <i class="me-1" data-feather="arrow-left"></i>
                                Kembali Ke Semua Arsip Karyawan
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
                        <div class="card-header">Detail Arsip Karyawan</div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <th>Kode Arsip</th>
                                            <td>{{ $item->kode_arsip_karyawan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kategori Arsip</th>
                                            <td>{{ $item->category->nama_kategori_arsip }}</td>
                                        </tr>
                                        <tr>
                                            <th>Nama Karyawan</th>
                                            <td>{{ $item->employee->nama_karyawan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Jenis Kelamin</th>
                                            <td>{{ $item->employee->jenis_kelamin }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alamat</th>
                                            <td>{{ $item->employee->alamat }}</td>
                                        </tr>
                                        <tr>
                                            <th>Status Karyawan</th>
                                            <td>{{ $item->employee->status_karyawan }}</td>
                                        </tr>
                                        <tr>
                                            <th>Kontak</th>
                                            <td>{{ $item->employee->kontak }}</td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>{{ $item->employee->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Departemen</th>
                                            <td>{{ $item->departemen->nama_departemen }}</td>
                                        </tr>
                                        <tr>
                                            <th>Retensi Arsip</th>
                                            <td>{{ $item->retensi_arsip }}</td>
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
                            <a href="{{ route('download-arsip-karyawan', $item->id_arsip_karyawan) }}"
                                class="btn btn-sm btn-primary">
                                <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Download Arsip
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 row">
                                <embed src="{{ Storage::url($item->file_arsip_karyawan) }}" width="500" height="375"
                                    type="application/pdf">
                                <a class="btn btn-sm btn-primary text-center mt-3" target="_blank"
                                    href="{{ Storage::url($item->file_arsip_karyawan) }}">View
                                    Fullscreen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
