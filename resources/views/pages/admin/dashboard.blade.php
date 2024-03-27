@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('container')
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="activity"></i></div>
                                Dashboard
                            </h1>
                            <div class="page-header-subtitle">Administrator Panel</div>
                            <div class="page-header-subtitle fw-bold text-white text-capitalize">{{ auth()->user()->level }}
                            </div>
                        </div>
                        {{-- <div class="col-12 col-xl-auto mt-4">
                            <div class="input-group input-group-joined border-0" style="width: 16.5rem">
                                <span class="input-group-text"><i class="text-primary" data-feather="calendar"></i></span>
                                <input class="form-control ps-0 pointer" id="litepickerRangePlugin"
                                    placeholder="Select date range..." />
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-xxl-4 col-xl-12 mb-4">
                    <div class="card h-100">
                        <div class="card-body h-100 p-5">
                            <div class="row align-items-center">
                                <div class="col-xl-8 col-xxl-12">
                                    <div class="text-center text-xl-start text-xxl-center mb-4 mb-xl-0 mb-xxl-4">
                                        <h1 class="text-primary">Selamat Datang {{ Auth::user()->nama_lengkap }}!</h1>
                                        <p class="text-gray-700 mb-0">Di Sistem Informasi Manajemen Arsip</p>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-xxl-12 text-center"><img class="img-fluid"
                                        src="/admin/assets/img/illustrations/at-work.svg" style="max-width: 26rem" /></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Example Colored Cards for Dashboard Demo-->
            <div class="row">
                @if (auth()->user()->level != 'admin')
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Surat Masuk</div>
                                        <div class="text-lg fw-bold">{{ $masuk }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="mail"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link" href="{{ route('surat-masuk') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card bg-warning text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Surat Keluar</div>
                                        <div class="text-lg fw-bold">{{ $keluar }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="mail"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link" href="{{ route('surat-keluar') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card bg-secondary text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Arsip Karyawan</div>
                                        <div class="text-lg fw-bold">{{ $arsip_karyawan }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="mail"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link"
                                    href="{{ route('arsip-karyawan.index') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card bg-success text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Arsip Dokumentasi</div>
                                        <div class="text-lg fw-bold">{{ $documentation }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="mail"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link"
                                    href="{{ route('documentation.index') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->user()->level == 'admin')
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card bg-light text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-dark small">Karyawan</div>
                                        <div class="text-lg text-dark fw-bold">{{ $karyawan }}</div>
                                    </div>
                                    <i class="feather-xl text-dark" data-feather="mail"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="stretched-link text-dark" href="{{ route('employee.index') }}">Selengkapnya</a>
                                <div class="text-dark"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card bg-dark text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Pengirim Surat</div>
                                        <div class="text-lg fw-bold">{{ $pengirim }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="mail"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link"
                                    href="{{ route('pengirim.index') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card bg-danger text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Penerima Surat</div>
                                        <div class="text-lg fw-bold">{{ $receiver }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="mail"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link"
                                    href="{{ route('penerima.index') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card bg-primary text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Kategori</div>
                                        <div class="text-lg fw-bold">{{ $category }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="mail"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link"
                                    href="{{ route('kategori.index') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-xl-6 mb-4">
                        <div class="card bg-warning text-white h-100">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="me-3">
                                        <div class="text-white-75 small">Departemen</div>
                                        <div class="text-lg fw-bold">{{ $departemen }}</div>
                                    </div>
                                    <i class="feather-xl text-white-50" data-feather="mail"></i>
                                </div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between small">
                                <a class="text-white stretched-link"
                                    href="{{ route('departemen.index') }}">Selengkapnya</a>
                                <div class="text-white"><i class="fas fa-angle-right"></i></div>
                            </div>
                        </div>
                    </div>
                @endif
                <div class="col-lg-12">
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @php
        use App\Models\Surat;
        use App\Models\ArsipKaryawan;
        use App\Models\Dokumentasi;

        $suratMasukArray = [];
        $suratKeluarArray = [];
        $ArsipKaryawanArray = [];
        $arsipDokumentasiArray = [];

        for ($i = 1; $i <= 12; $i++) {
            $suratMasukData = Surat::where('tipe_surat', 'Surat Masuk')
                ->where('status_surat', 'Approve')
                ->whereYear('created_at', now()->year)
                ->whereMonth('tanggal_surat', $i)
                ->count();

            $suratMasukArray[] = $suratMasukData;

            $suratKeluarData = Surat::where('tipe_surat', 'Surat Keluar')
                ->where('status_surat', 'Approve')
                ->whereYear('created_at', now()->year)
                ->whereMonth('tanggal_surat', $i)
                ->count();

            $suratKeluarArray[] = $suratKeluarData;

            $arsipKaryawanData = ArsipKaryawan::whereYear('created_at', now()->year)
                ->whereMonth('created_at', $i)
                ->count();

            $ArsipKaryawanArray[] = $arsipKaryawanData;

            $arsipDokumentasiData = Dokumentasi::whereYear('created_at', now()->year)
                ->whereMonth('tanggal_dokumentasi', $i)
                ->count();

            $arsipDokumentasiArray[] = $arsipDokumentasiData;
        }

    @endphp

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: 'Surat Masuk',
                    backgroundColor: 'rgb(75, 192, 192)',
                    borderColor: 'rgb(75, 192, 192)',
                    data: @php echo json_encode($suratMasukArray) @endphp,
                }, {
                    label: 'Surat Keluar',
                    backgroundColor: 'rgb(255, 99, 132)',
                    borderColor: 'rgb(255, 99, 132)',
                    data: @php echo json_encode($suratKeluarArray) @endphp,
                }, {
                    label: 'Arsip Karyawan',
                    backgroundColor: 'rgb(255, 205, 86)',
                    borderColor: 'rgb(255, 205, 86)',
                    data: @php echo json_encode($ArsipKaryawanArray) @endphp,
                }, {
                    label: 'Arsip Dokumentasi',
                    backgroundColor: 'rgb(54, 162, 235)',
                    borderColor: 'rgb(54, 162, 235)',
                    data: @php echo json_encode($arsipDokumentasiArray) @endphp,
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
