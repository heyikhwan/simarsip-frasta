@extends('layouts.admin')

@section('title')
Laporan Surat Masuk
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
                            Laporan Surat Masuk
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

                    <form action="{{ url('admin/print/surat-masuk') }}" method="POST">
                        @csrf

                        <div class="row g-2 align-items-end">
                            <div class="col">
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-secondary dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Filter Kolom
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="no" id="no" name="kolom[no]"
                                                        checked>
                                                    <label class="form-check-label" for="no">
                                                        No
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="no_surat" name="kolom[no_surat]"
                                                        id="no_surat" checked>
                                                    <label class="form-check-label" for="no_surat">
                                                        No. Surat
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="penerima" name="kolom[penerima]"
                                                        id="penerima" checked>
                                                    <label class="form-check-label" for="penerima">
                                                        Penerima
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="tgl_surat" name="kolom[tgl_surat]"
                                                        id="tgl_surat" checked>
                                                    <label class="form-check-label" for="tgl_surat">
                                                        Tanggal Surat
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="tgl_diterima" name="kolom[tgl_diterima]"
                                                        id="tgl_diterima" checked>
                                                    <label class="form-check-label" for="tgl_diterima">
                                                        Tanggal Diterima
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="perihal" name="kolom[perihal]"
                                                        id="perihal" checked>
                                                    <label class="form-check-label" for="perihal">
                                                        Perihal
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="department" name="kolom[department]"
                                                        id="department" checked>
                                                    <label class="form-check-label" for="department">
                                                        Department
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="status" name="kolom[status]"
                                                        id="status" checked>
                                                    <label class="form-check-label" for="status">
                                                        Status
                                                    </label>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col">
                                <small>Tanggal Dari</small>
                                <input type="date" class="form-control form-control-sm" id="dari" name="dari">
                            </div>
                            <div class="col">
                                <small>Tanggal Sampai</small>
                                <input type="date" class="form-control form-control-sm" id="sampai" name="sampai">
                            </div>

                            <div class="col">
                                <button type="submit" class="btn btn-sm btn-primary text-nowrap">
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
                        <th>No.</th>
                        <th>No. Surat</th>
                        <th>Penerima</th>
                        <th style="text-align: center">Tanggal Surat</th>
                        <th style="text-align: center">Tanggal Diterima</th>
                        <th>Perihal</th>
                        <th>Departemen</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($data as $letter)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $letter->kode_surat }}</td>
                            <td>{{ $letter->penerima_surat->nama_penerima_surat }}</td>
                            <td style="text-align: center">
                                {{ date('d-m-Y', strtotime($letter->tanggal_surat)) }}
                            </td>
                            <td style="text-align: center">
                                {{ date('d-m-Y', strtotime($letter->tanggal_diterima)) }}</td>
                            <td>{{ $letter->perihal }}</td>
                            <td>{{ $letter->departemen->nama_departemen }}</td>
                            <td>{{ $letter->status_surat }}</td>
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