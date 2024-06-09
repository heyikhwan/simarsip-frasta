@extends('layouts.admin')

@section('title')
Laporan Arsip Dokumentasi
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
                            Laporan Arsip Dokumentasi
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <img src="{{ asset('admin/assets/img/frasta.png') }}" width="150">
                    </div>
                    
                    <form action="{{ url('admin/print/dokumentasi') }}" method="POST">
                        @csrf

                        <div class="row g-2 align-items-end">
                            <div class="col">
                                <small>Tanggal Dari</small>
                                <input type="date" class="form-control form-control-sm" id="dari" name="dari">
                            </div>
                            <div class="col">
                                <small>Tanggal Sampai</small>
                                <input type="date" class="form-control form-control-sm" id="sampai" name="sampai">
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    <i data-feather="printer" class="me-2"></i>Cetak Laporan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <th width="10">No.</th>
                        <th>Kode Arsip</th>
                        <th>Tanggal Dokumentasi</th>
                        <th>Departemen</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data as $e)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $e->kode_arsip_dokumentasi }}</td>
                            <td style="text-align: center">{{ date('d-m-Y', strtotime($e->tanggal_dokumentasi)) }}
                            </td>
                            <td>
                                {{ $e->departemen->nama_departemen }}
                            </td>
                            <td>
                                {{ $e->judul }}
                            </td>
                            <td>
                                {{ $e->deskripsi }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-end">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection