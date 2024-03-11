<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Menu Heading (Account)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <div class="sidenav-menu-heading d-sm-none">Account</div>
            <!-- Sidenav Link (Alerts)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="bell"></i></div>
                Alerts
                <span class="badge bg-warning-soft text-warning ms-auto">4 New!</span>
            </a>
            <!-- Sidenav Link (Messages)-->
            <!-- * * Note: * * Visible only on and above the sm breakpoint-->
            <a class="nav-link d-sm-none" href="#!">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                Messages
                <span class="badge bg-success-soft text-success ms-auto">2 New!</span>
            </a>
            <!-- Sidenav Menu Heading (Core)-->
            <div class="sidenav-menu-heading">Menu</div>
            <!-- Sidenav Link (Dashboard)-->
            <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : '' }}"
                href="{{ route('admin-dashboard') }}">
                <div class="nav-link-icon"><i data-feather="activity"></i></div>
                Dashboard
            </a>
            @if (auth()->user()->level == 'admin')
            <a class="nav-link {{ request()->is('admin/departemen*') ? 'active' : '' }}"
                href="{{ route('departemen.index') }}">
                <div class="nav-link-icon"><i data-feather="home"></i></div>
                Data Departemen
            </a>
            <a class="nav-link {{ request()->is('admin/employee*') ? 'active' : '' }}"
                href="{{ route('employee.index') }}">
                <div class="nav-link-icon"><i data-feather="users"></i></div>
                Data Karyawan
            </a>
            <a class="nav-link {{ request()->is('admin/pengirim*') ? 'active' : '' }}"
                href="{{ route('pengirim.index') }}">
                <div class="nav-link-icon"><i data-feather="arrow-left"></i></div>
                Data Pengirim Surat
            </a>
            <a class="nav-link {{ request()->is('admin/penerima*') ? 'active' : '' }}"
                href="{{ route('penerima.index') }}">
                <div class="nav-link-icon"><i data-feather="arrow-right"></i></div>
                Data Penerima Surat
            </a>
            <!--             <a class="nav-link {{ request()->is('admin/letter/create') ? 'active' : '' }}" href="{{ route('letter.create') }}">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                Tambah Surat
            </a> -->
            <a class="nav-link {{ request()->is('admin/kategori*') ? 'active' : '' }}"
                href="{{ route('kategori.index') }}">
                <div class="nav-link-icon"><i data-feather="database"></i></div>
                Data Kategori Arsip
            </a>
            <a class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}" href="{{ route('user.index') }}">
                <div class="nav-link-icon"><i data-feather="user"></i></div>
                Data User
            </a>
            @endif
            @if (auth()->user()->level !== 'admin')

            <a class="nav-link {{ request()->is('admin/letter/surat-masuk') || request()->is('admin/letter/surat-keluar') ? 'active' : 'collapsed' }}"
                href="javascript:void(0);" data-bs-toggle="collapse" data-bs-target="#collapseArsipSurat"
                aria-expanded="{{ request()->is('admin/letter/surat-masuk') || request()->is('admin/letter/surat-keluar') ? 'true' : 'false' }}"
                aria-controls="collapseArsipSurat">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                Arsip Surat
                <div class="sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down" aria-hidden="true"
                        focusable="false" data-prefix="fas" data-icon="angle-down" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                        </path>
                    </svg></div>
            </a>
            <div class="{{ request()->is('admin/letter/surat-masuk') || request()->is('admin/letter/surat-keluar') ? 'show' : 'collapse' }}"
                id="collapseArsipSurat" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->is('admin/letter/surat-masuk') ? 'active' : '' }}"
                        href="{{ route('surat-masuk') }}">Surat Masuk</a>
                    <a class="nav-link {{ request()->is('admin/letter/surat-keluar') ? 'active' : '' }}"
                        href="{{ route('surat-keluar') }}">Surat Keluar</a>
                </nav>
            </div>

            {{-- <a class="nav-link {{ request()->is('admin/letter/surat-masuk') ? 'active' : '' }}" href="#">
                <div class="nav-link-icon"><i data-feather="mail"></i></div>
                Arsip Surat
            </a>
            <a class="nav-link ms-3 {{ request()->is('admin/letter/surat-masuk') ? 'active' : '' }}"
                href="{{ route('surat-masuk') }}">
                <div class="nav-link-icon"><i data-feather="arrow-right"></i></div>
                Surat Masuk
            </a>
            <a class="nav-link ms-3 {{ request()->is('admin/letter/surat-keluar') ? 'active' : '' }}"
                href="{{ route('surat-keluar') }}">
                <div class="nav-link-icon"><i data-feather="arrow-left"></i></div>
                Surat Keluar
            </a> --}}

            <a class="nav-link {{ request()->is('admin/arsip-karyawan') ? 'active' : '' }}"
                href="{{ route('arsip-karyawan.index') }}">
                <div class="nav-link-icon"><i data-feather="credit-card"></i></div>
                Arsip Karyawan
            </a>
            <a class="nav-link {{ request()->is('admin/documentation') ? 'active' : '' }}"
                href="{{ route('documentation.index') }}">
                <div class="nav-link-icon"><i data-feather="image"></i></div>
                Arsip Dokumentasi
            </a>
            @endif

            {{-- <a class="nav-link {{ request()->is('admin/setting*') ? 'active' : '' }}"
                href="{{ route('setting.index') }}">
                <div class="nav-link-icon"><i data-feather="settings"></i></div>
                Profile
            </a> --}}

            @if (auth()->user()->level !== 'admin')

            <a class="nav-link {{ request()->is('admin/print/arsip-karyawan') || request()->is('admin/print/dokumentasi') ? 'active' : 'collapsed' }}" href="javascript:void(0);" data-bs-toggle="collapse"
                data-bs-target="#collapseLaporan" aria-expanded="{{ request()->is('admin/print/arsip-karyawan') || request()->is('admin/print/dokumentasi') ? 'true' : 'false' }}" aria-controls="collapseLaporan">
                <div class="nav-link-icon"><i class="fa fa-print"></i></div>
                Cetak Laporan
                <div class="sidenav-collapse-arrow"><svg class="svg-inline--fa fa-angle-down" aria-hidden="true"
                        focusable="false" data-prefix="fas" data-icon="angle-down" role="img"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512" data-fa-i2svg="">
                        <path fill="currentColor"
                            d="M169.4 342.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 274.7 54.6 137.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z">
                        </path>
                    </svg></div>
            </a>
            <div class="{{ request()->is('admin/print/arsip-karyawan') || request()->is('admin/print/dokumentasi') ? 'show' : 'collapse' }}" id="collapseLaporan" data-bs-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav">
                    <a class="nav-link {{ request()->is('admin/letter/surat-masuk') ? 'active' : '' }}"
                        href="{{ route('print-surat-masuk') }}" target="_blank">Laporan Surat Masuk</a>
                    <a class="nav-link {{ request()->is('admin/letter/surat-keluar') ? 'active' : '' }}"
                        href="{{ route('print-surat-keluar') }}" target="_blank">Laporan Surat Keluar</a>

                    <a class="nav-link {{ request()->is('admin/print/arsip-karyawan') ? 'active' : '' }}"
                        href="{{ url('admin/print/arsip-karyawan') }}">Laporan Arsip Karyawan</a>
                    <a class="nav-link {{ request()->is('admin/print/dokumentasi') ? 'active' : '' }}"
                        href="{{ url('admin/print/dokumentasi') }}">Laporan Arsip Dokumentasi</a>
                </nav>
            </div>

            {{-- <a class="nav-link" href="#">
                <div class="nav-link-icon">
                    <i class="fa fa-print"></i>
                </div>
                Cetak Laporan
            </a>
            <a target="_blank" class="nav-link ms-3" href="{{ route('print-surat-masuk') }}">
                <div class="nav-link-icon"><i data-feather="arrow-right"></i></div>
                Laporan Surat Masuk
            </a>
            <a target="_blank" class="nav-link ms-3" href="{{ route('print-surat-keluar') }}">
                <div class="nav-link-icon"><i data-feather="arrow-left"></i></div>
                Laporan Surat Keluar
            </a> --}}
            @endif

        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title">{{ Auth::user()->nama_lengkap }}</div>
        </div>
    </div>
</nav>