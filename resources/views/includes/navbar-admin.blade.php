@php
use App\Models\Notifikasi;

$notification = Notifikasi::leftJoin('users', 'users.id_user', '=', 'notifikasi.user_id')
->where('notifikasi.penerima_id', auth()->user()->id_user)
->latest('notifikasi.created_at')
->get();

$notificationCount = Notifikasi::where('notifikasi.penerima_id', auth()->user()->id_user)
->where('notifikasi.read_at', null)
->count();

use Carbon\Carbon;
@endphp

<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white"
    id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle">
        <i data-feather="menu"></i>
    </button>
    <!-- Navbar Brand-->
    <!-- * * Tip * * You can use text or an image for your navbar brand.-->
    <!-- * * * * * * When using an image, we recommend the SVG format.-->
    <!-- * * * * * * Dimensions: Maximum height: 32px, maximum width: 240px-->
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" href="{{ route('admin-dashboard') }}">
        Sistem Informasi Manajemen Arsip
    </a>
    <!-- Navbar Search Input-->
    <!-- * * Note: * * Visible only on and above the lg breakpoint-->
    <form class="form-inline me-auto d-none d-lg-block me-3">
        <div class="input-group input-group-joined input-group-solid">

        </div>
    </form>
    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
        <!-- Navbar Search Dropdown-->
        <!-- * * Note: * * Visible only below the lg breakpoint-->

        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4" onclick="readNotif('{{ $notification }}')">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle position-relative" id="navbarDropdownUserImage"
                href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                @if ($notificationCount > 0)
                <div class="text-danger position-absolute" style="right:10px;top:10px" id="notif-count">
                    {{ $notificationCount }}
                </div>
                @endif
                <i class="far fa-bell"></i>
            </a>
            @if (!empty($notification))
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownUserImage" style="height: 30rem; overflow: scroll; width: 400px">
                @foreach ($notification as $item)
                <form action="{{ url($item->url) }}" method="GET">
                    <button type="submit" class="dropdown-item d-flex align-items-center justify-content-between">

                        <div class="d-flex gap-3">
                            <div>
                                @if ($item->profile != null)
                                <img class="img-fluid rounded-circle" width="50"
                                    src="{{ url('storage/' . $item->profile) }}" />
                                @else
                                <img class="img-fluid rounded-circle" width="50"
                                    src="https://ui-avatars.com/api/?name={{ $item->nama_lengkap }}" />
                                @endif
                            </div>

                            <div>
                                <p class="text-wrap mb-1">{!! $item->keterangan !!}</p>
                                @php
                                $updatedAt = Carbon::parse($item->updated_at);
                                @endphp

                                <small class="d-block fw-bold">{{ $updatedAt->diffForHumans() }}</small>
                            </div>

                        </div>
                    </button>
                </form>
                <div class="dropdown-divider"></div>
                @endforeach
            </div>
            @endif
        </li>
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage"
                href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false">
                @if (Auth::user()->profile != null)
                <img class="img-fluid" src="{{ url('storage/' . Auth::user()->profile) }}" />
                @else
                <img class="img-fluid" src="https://ui-avatars.com/api/?name={{ Auth::user()->nama_lengkap }}" />
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up"
                aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    @if (Auth::user()->profile != null)
                    <img class="dropdown-user-img" src="{{ url('storage/' . Auth::user()->profile) }}" />
                    @else
                    <img class="dropdown-user-img"
                        src="https://ui-avatars.com/api/?name={{ Auth::user()->nama_lengkap }}" />
                    @endif

                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name">{{ Auth::user()->nama_lengkap }}</div>
                        <div class="dropdown-user-details-email">{{ Auth::user()->email }}</div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('setting.index') }}">
                    <div class="dropdown-item-icon"><i data-feather="settings"></i></div>
                    Account
                </a>
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">
                        <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                        Logout
                    </button>
                </form>
            </div>
        </li>
    </ul>
</nav>

@push('addon-script')
    <script>
        function readNotif(notif) {
            $.ajax({
                type: "POST",
                url: "{{ route('read-notif') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    notif: notif

                },
                success: function(response) {
                    if (response.success) {
                        $("#notif-count").remove();
                    }
                },
                error: function(xhr) {
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
    
@endpush