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
        <div class="card">
            <div class="card-header">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <img src="{{ asset('admin/assets/img/frasta.png') }}" width="150">
                    </div>

                    <form action="{{ url('admin/print/arsip-karyawan') }}" method="POST">
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
                                                    <input class="form-check-input" type="checkbox" value="kode_arsip" name="kolom[kode_arsip]"
                                                        id="kode_arsip" checked>
                                                    <label class="form-check-label" for="kode_arsip">
                                                        Kode Arsip
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="kategori" name="kolom[kategori]"
                                                        id="kategori" checked>
                                                    <label class="form-check-label" for="kategori">
                                                        Kategori
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="nama" name="kolom[nama]"
                                                        id="nama" checked>
                                                    <label class="form-check-label" for="nama">
                                                        Nama
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="jenis_kelamin" name="kolom[jenis_kelamin]"
                                                        id="jenis_kelamin" checked>
                                                    <label class="form-check-label" for="jenis_kelamin">
                                                        Jenis Kelamin
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="alamat" name="kolom[alamat]"
                                                        id="alamat" checked>
                                                    <label class="form-check-label" for="alamat">
                                                        Alamat
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="alamat" name="kolom[alamat]"
                                                        id="alamat" checked>
                                                    <label class="form-check-label" for="alamat">
                                                        Alamat
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
                                                    <input class="form-check-input" type="checkbox" value="kontak" name="kolom[kontak]"
                                                        id="kontak" checked>
                                                    <label class="form-check-label" for="kontak">
                                                        Kontak
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="email" name="kolom[email]"
                                                        id="email" checked>
                                                    <label class="form-check-label" for="email">
                                                        Email
                                                    </label>
                                                </div>
                                            </div>
                                        </li>

                                        <li>
                                            <div class="dropdown-item">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="masa_berlaku" name="kolom[masa_berlaku]"
                                                        id="masa_berlaku" checked>
                                                    <label class="form-check-label" for="masa_berlaku">
                                                        Masa Berlaku
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
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <th width="10">No.</th>
                            <th>Kode Arsip</th>
                            <th>Kategori</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Status</th>
                            <th>Departemen</th>
                            <th>Kontak</th>
                            <th>Email</th>
                            <th>Masa Berlaku</th>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($data as $e)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $e->kode_arsip_karyawan }}</td>
                                <td>{{ $e->category->nama_kategori_arsip }}</td>
                                <td>{{ $e->employee->nama_karyawan }}</td>
                                <td>{{ $e->employee->jenis_kelamin }}</td>
                                <td>{{ $e->employee->alamat }}</td>
                                <td>{{ $e->employee->status_karyawan }}</td>
                                <td>{{ $e->departemen->nama_departemen }}</td>
                                <td>{{ $e->employee->kontak }}</td>
                                <td>{{ $e->employee->email }}</td>
                                <td>{{ $e->retensi_arsip }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</main>
@endsection