@extends('layouts.admin')

@section('title')
Surat Keluar
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
                            Surat Keluar
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
                        List Surat Keluar
                    </div>
                    <div class="card-body">
                        <div class="d-flex gap-1 mb-3">
                            @if (auth()->user()->level !== 'manajer')
                            <a class="btn btn-sm btn-primary mb-2" href="{{ route('letter.create') }}">
                                +
                                Tambah Surat
                            </a>
                            @endif

                            @if (auth()->user()->level == 'manajer')
                            <button type="button" class="btn btn-sm btn-danger" id="btnBulkDelete"
                                onclick="handleBulkDelete()" disabled><i class="fas fa-trash me-1"></i>Hapus Data (<span
                                    id="countData">0</span>)</button>
                            @endif
                        </div>

                        {{-- Alert --}}
                        <div id="alert-container"></div>
                        @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        {{-- List Data --}}
                        <table class="table table-striped table-hover table-sm" id="crudTable">
                            <thead>
                                <tr>
                                    <th width="10" class="text-center">
                                        @if (auth()->user()->level == 'manajer')
                                        <input type="checkbox" id="checkAll">
                                        @endif
                                    </th>
                                    <th width="10">No.</th>
                                    <th>Tanggal</th>
                                    <th>Nama Penginput</th>
                                    <th>Departemen</th>
                                    <th>Perihal</th>
                                    <th>Komentar</th>
                                    <th>Status</th>
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
            columns: [
                {
                    data: 'checkbox',
                    name: 'checkbox',
                    orderable: false,
                    searcable: false,
                },    
                {
                    "data": 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'tanggal_surat',
                    name: 'tanggal_surat',
                    render: function(data, type, full, meta) {
                        return '<span style="white-space:nowrap">' + data + '</span>';
                    }
                },
                {
                    data: 'nama_lengkap',
                    name: 'nama_lengkap'
                },
                {
                    data: 'nama_departemen',
                    name: 'nama_departemen'
                },
                {
                    data: 'perihal',
                    name: 'perihal'
                },
                {
                    data: 'komentar',
                    name: 'komentar'
                },
                {
                    data: 'status_surat',
                    name: 'status_surat',
                    render: function(data, type, full, meta) {
                        // Check the status and add a corresponding badge
                        if (data === 'Pending' || data === 'Request Update') {
                            return '<span class="badge bg-warning">' + data + '</span>';
                        } else if (data === 'Not Approve') {
                            return '<span class="badge bg-danger">' + data + '</span>';
                        } else if (data === "Revisi") {
                            return '<span class="badge bg-primary">' + data + '</span>';
                        } else {
                            return '<span class="badge bg-success">' + data + '</span>';
                        }
                    }
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
<script>
    let checkedItem = [];
    
        $('#checkAll').click(function() {
            let isChecked = $(this).is(':checked');
            $('.checkItem').prop('checked', isChecked);
            updateCheckedItems();
        });
    
        $(document).on('change', '.checkItem', function() {
            updateCheckedItems();
        });
    
        function updateCheckedItems() {
            checkedItem = [];
            $('.checkItem:checked').each(function() {
                checkedItem.push($(this).val());
            });
    
            let isAllChecked = $('.checkItem:checked').length === $('.checkItem').length;
            $('#checkAll').prop('checked', isAllChecked);
            $('#btnBulkDelete').prop('disabled', checkedItem.length === 0);
            $('#countData').text(checkedItem.length);
        }
    
        const handleBulkDelete = () => {
            if (checkedItem.length > 0) {
                if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                    $.ajax({
                        url: "{{ route('letter.bulk-delete') }}",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            ids: checkedItem,
                        },
                        success: function(response) {
                            if (response.status) {
                                datatable.ajax.reload();
    
                                $('#alert-container').html(
                                    '<div class="alert alert-success alert-dismissible fade show" role="alert">' +
                                    response.message +
                                    '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>' +
                                    '</div>'
                                );
                            }
                        }
                    });
                }
            }
        }
</script>
@endpush