@extends('layouts.admin')

@section('title')
Detail Surat
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
                            Detail Surat
                        </h1>
                    </div>
                    <div class="col-12 col-xl-auto mb-3">
                        <button class="btn btn-sm btn-light text-primary" onclick="javascript:window.history.back();">
                            <i class="me-1" data-feather="arrow-left"></i>
                            Kembali Ke Semua Surat
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
                    <div class="card-header">Detail Surat</div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>Jenis Surat</th>
                                    <td>{{ $item->tipe_surat }}</td>
                                </tr>
                                <tr>
                                    <th>Kode Surat</th>
                                    <td>{{ $item->kode_surat }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Surat</th>
                                    <td>{{ $item->tanggal_surat }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Diterima</th>
                                    <td>{{ $item->tanggal_diterima }}</td>
                                </tr>
                                <tr>
                                    <th>Perihal</th>
                                    <td>{{ $item->perihal }}</td>
                                </tr>
                                @if ($item->tipe_surat == 'Surat Keluar')
                                <tr>
                                    <th>Pengirim Surat</th>
                                    <td>{{ $item->pengirim_surat->nama_pengirim_surat }}</td>
                                </tr>
                                @endif
                                @if ($item->tipe_surat == 'Surat Masuk')
                                <tr>
                                    <th>Penerima Surat</th>
                                    <td>{{ $item->penerima_surat->nama_penerima_surat }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th>Departemen</th>
                                    <td>{{ $item->departemen->nama_departemen }}</td>
                                </tr>
                                @if (Auth::user()->level == "manajer")
                                @if ($item->status_surat == "Pending" || $item->status_surat == "Revisi")
                                <form action="{{ url('/admin/letter/surat/' . $item->id_arsip_surat ) }}" method="POST">
                                    {{ csrf_field() }}
                                    @method("PUT")
                                    <tr>
                                        <th>Komentar</th>
                                        <td>
                                            <textarea name="komentar"
                                                class="form-control @error('komentar') is-invalid @enderror"
                                                id="komentar" rows="5" placeholder="Masukkan Komentar"></textarea>

                                            @error('komentar')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                            @enderror

                                            @foreach ($item->komentar as $kom)
                                            <div>
                                                <small class="text-muted" style="font-size: 10px">{{ date('d F Y',
                                                    strtotime($item->created_at)) }}</small>
                                                <p class="m-0">{{ $kom->komentar }}</p>
                                            </div>
                                            @endforeach
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button type="submit" class="btn btn-primary btn-sm" value="approve"
                                                name="btn_tipe">
                                                <i class="fa fa-check" style="margin-right: 5px"></i> Approve
                                            </button>
                                            <button type="submit" class="btn btn-warning btn-sm" value="revisi"
                                                name="btn_tipe">
                                                <i class="fa fa-edit" style="margin-right: 5px"></i> Revisi
                                            </button>

                                            @php
                                            if ($item->tipe_surat == 'Surat Masuk') {
                                            $batalUrl = route('surat-masuk');
                                            } else {
                                            $batalUrl = route('surat-keluar');
                                            }
                                            @endphp

                                            <a href="{{ $batalUrl }}" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-times" style="margin-right: 5px"></i>Batal</a>
                                            {{-- <button type="reset" class="btn btn-danger btn-sm">
                                                <i class="fa fa-times" style="margin-right: 5px"></i> Batal
                                            </button> --}}
                                        </td>
                                    </tr>
                                </form>
                                @else
                                <tr>
                                    <th>Komentar</th>
                                    <td>
                                        @foreach ($item->komentar as $kom)
                                        <div>
                                            <small class="text-muted" style="font-size: 10px">{{ date('d F Y H:i',
                                                strtotime($item->created_at)) }}</small>
                                            <p class="m-0">{{ $kom->komentar }}</p>
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @endif
                                @if (Auth::user()->level == "karyawan")
                                <tr>
                                    <th>Komentar</th>
                                    <td>
                                        @foreach ($item->komentar as $kom)
                                        <div>
                                            <small class="text-muted" style="font-size: 10px">{{ date('d F Y H:i',
                                                strtotime($item->created_at)) }}</small>
                                            <p class="m-0">{{ $kom->komentar }}</p>
                                        </div>
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                                @if($item->status_surat == "Request Update")
                                @if (Auth::user()->level == "karyawan" && $item->user_id == Auth::user()->id_user)
                                <form action="{{ url('/admin/letter/surat/'. $item->id_arsip_surat . '/dokumen') }}"
                                    method="POST" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    @method("PUT")
                                    <tr>
                                        <th>Upload Dokumen</th>
                                        <td>
                                            <input type="file" name="dokumen" class="form-control" accept=".pdf"
                                                required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button type="submit" class="btn btn-primary btn-sm">
                                                <i class="fa fa-check" style="margin-right: 5px"></i> Simpan
                                            </button>
                                        </td>
                                    </tr>
                                </form>
                                @endif
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-header">
                        File Surat -
                        <a href="{{ route('download-surat', $item->id_arsip_surat) }}" class="btn btn-sm btn-primary">
                            <i class="fa fa-download" aria-hidden="true"></i> &nbsp; Download Surat
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="mb-3 row">
                            <embed src="{{ url('storage/' . $item->file_arsip_surat) }}" width="500" height="375"
                                type="application/pdf">
                            <a class="btn btn-sm btn-primary text-center mt-3" target="_blank"
                                href="{{ url('storage/' . $item->file_arsip_surat) }}">View
                                Fullscreen</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection