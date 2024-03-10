@extends('layouts.admin')

@section('title')
    Karyawan
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
                                Karyawan
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
                            Data Karyawan
                            <a class="btn btn-sm btn-primary" href="{{ route('pengirim.create') }}" data-bs-toggle="modal"
                                data-bs-target="#createModal">
                                Tambah Data
                            </a>
                        </div>
                        <div class="card-body">
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
                                        <th>Nama Karyawan</th>
                                        <th>NIK</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Status Karyawan</th>
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
    {{-- Modal Add --}}
    <div class="modal fade" id="createModal" role="dialog" aria-labelledby="createModal" aria-hidden="true"
        style="overflow:hidden;">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModal">Tambah Karyawan</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('employee.store') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name">Nama Karyawan</label>
                                <input type="text" name="nama_karyawan" class="form-control"
                                    placeholder="Masukan Nama Karyawan.." required>
                            </div>
                            <div class="col-md-6">
                                <label for="name">NIK</label>
                                <input type="text" name="nik" class="form-control" placeholder="Masukan NIK.."
                                    required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="name">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="form-control selectx" required>
                                    <option value="">Pilih..</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control"
                                    placeholder="Masukan Karyawan.." required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="name">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Masukan Alamat.."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Kontak</label>
                                <input type="text" name="kontak" class="form-control" placeholder="Masukan Kontak.."
                                    required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="name">Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan Email.."
                                    required>
                            </div>
                            <div class="col-md-6">
                                <label for="name">Status Karyawan</label>
                                <select name="status_karyawan" class="form-control selectx" required>
                                    <option value="">Pilih..</option>
                                    <option value="Karyawan Tetap">Karyawan Tetap</option>
                                    <option value="Karyawan Kontrak">Karyawan Kontrak</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <div class="col-md-6">
                                <label for="name">Pendidikan Terakhir</label>
                                <input type="text" name="pendidikan_terakhir" class="form-control"
                                    placeholder="Masukan Pendidikan Terakhir.." required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- Modal Update --}}
    @foreach ($employees as $item)
        @php
            $id = $item->id_karyawan;
            $name = $item->nama_karyawan;
            $nik = $item->nik;
            $jenis_kelamin = $item->jenis_kelamin;
            $tanggal_lahir = $item->tanggal_lahir;
            $alamat = $item->alamat;
            $kontak = $item->kontak;
            $email = $item->email;
            $status_karyawan = $item->status_karyawan;
            $pendidikan_terakhir = $item->pendidikan_terakhir;
        @endphp
        <div class="modal fade" id="updateModal{{ $id }}" role="dialog" aria-labelledby="createModal"
            aria-hidden="true" style="overflow:hidden;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="updateModal{{ $id }}">Ubah Data</h5>
                        <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('employee.update', $item->id_karyawan) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label for="name">Nama Karyawan</label>
                                    <input type="text" name="nama_karyawan" class="form-control"
                                        value="{{ $name }}" placeholder="Masukan Nama Karyawan.." required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">NIK</label>
                                    <input type="text" name="nik" class="form-control"
                                        placeholder="Masukan NIK.." value="{{ $nik }}" required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="name">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control selectx" required>
                                        <option value="">Pilih..</option>
                                        <option value="Laki-laki" {{ $jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>
                                            Laki-laki</option>
                                        <option value="Perempuan" {{ $jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>
                                            Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" class="form-control"
                                        value="{{ $tanggal_lahir }}" placeholder="Masukan Karyawan.." required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="name">Alamat</label>
                                    <input type="text" name="alamat" class="form-control"
                                        value="{{ $alamat }}" placeholder="Masukan Alamat.." required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Kontak</label>
                                    <input type="text" name="kontak" class="form-control"
                                        value="{{ $kontak }}" placeholder="Masukan Kontak.." required>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" class="form-control"
                                        value="{{ $email }}" placeholder="Masukan Email.." required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">Status Karyawan</label>
                                    <select name="status_karyawan" class="form-control selectx" required>
                                        <option value="">Pilih..</option>
                                        <option value="Karyawan Tetap"
                                            {{ $status_karyawan == 'Karyawan Tetap' ? 'selected' : '' }}>Karyawan Tetap
                                        </option>
                                        <option value="Karyawan Kontrak"
                                            {{ $status_karyawan == 'Karyawan Kontrak' ? 'selected' : '' }}>Karyawan Kontrak
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <div class="col-md-6">
                                    <label for="name">Pendidikan Terakhir</label>
                                    <input type="text" value="{{ $pendidikan_terakhir }}" name="pendidikan_terakhir"
                                        class="form-control" placeholder="Masukan Pendidikan Terakhir.." required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-primary" type="submit">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
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
                    data: 'nama_karyawan',
                    name: 'nama_karyawan'
                },
                {
                    data: 'nik',
                    name: 'nik'
                },
                {
                    data: 'jenis_kelamin',
                    name: 'jenis_kelamin'
                },
                {
                    data: 'status_karyawan',
                    name: 'status_karyawan'
                },
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
