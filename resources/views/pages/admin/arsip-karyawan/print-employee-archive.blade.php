<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
        #print {
            margin: auto;
            text-align: center;
            /* font-family: "Calibri", Courier, monospace; */
            width: 100%;
            font-size: 14px;
            /* padding: 0 30px; */
        }

        #print .title {
            margin: 20px;
            text-align: right;
            font-family: "Calibri", Courier, monospace;
            font-size: 12px;
        }

        #print span {
            text-align: center;
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            font-size: 18px;
        }

        #print table {
            border-collapse: collapse;
            width: 100%;
            margin: 10px;
        }

        #print .table1 {
            border-collapse: collapse;
            /* width: 90%; */
            text-align: center;
            /* margin: 10px; */
        }

        #print table hr {
            border: 3px double #000;
        }

        #print .ttd {
            float: right;
            width: 250px;
            background-position: center;
            background-size: contain;
            font-weight: bold;
        }

        #print table th {
            color: #000;
            font-family: Verdana, Geneva, sans-serif;

        }

        #logo {
            width: 111px;
            height: 90px;
            padding-top: 10px;
            margin-left: 10px;
        }

        h2,
        h3 {
            margin: 0px 0px 0px 0px;
        }

        #content {
            /* font-size: 24px; */
        }
    </style>
    <title>Arsip Karyawan</title>
</head>

<body>

    <div id="print">
        <table class='table1'>
            <tr>
                <td><img src="{{ url('storage/assets/profile-images/logo.jpeg') }}" height="150" width="150"></td>

                <td>
                    <h2 style="font-size: 1.5rem">LAPORAN SURAT MASUK</h2>
                    <h2 style="font-size: 1.5rem">SISTEM INFORMASI MANAJEMEN ARSIP</h2>
                    <h2 style="font-size: 1.5rem">PT. FRASTA SURVEY INDONESIA</h2>
                    <p style="font-size:15px;"><i>Jl. Raya Tajem No.Km 2, Panjen, Wedomartani, Ngemplak, Sleman, Daerah
                            Istimewa Yogyakarta. 55584</i></p>
                </td>
            </tr>
        </table>
        <table class='table'>
            <td>
                <hr />
            </td>
        </table>

        <table class="table" border="1" id="content">
            <thead>
                @if (!empty($kolom['no']))
                <th width="10">No.</th>
                @endif
                @if (!empty($kolom['kode_arsip']))
                <th>Kode Arsip</th>
                @endif
                @if (!empty($kolom['kategori']))
                <th>Kategori</th>
                @endif
                @if (!empty($kolom['nama']))
                <th>Nama</th>
                @endif
                @if (!empty($kolom['jenis_kelamin']))
                <th>Jenis Kelamin</th>
                @endif
                @if (!empty($kolom['alamat']))
                <th>Alamat</th>
                @endif
                @if (!empty($kolom['status']))
                <th>Status</th>
                @endif
                @if (!empty($kolom['departemen']))
                <th>Departemen</th>
                @endif
                @if (!empty($kolom['kontak']))
                <th>Kontak</th>
                @endif
                @if (!empty($kolom['email']))
                <th>Email</th>
                @endif
                @if (!empty($kolom['masa_berlaku']))
                <th>Masa Berlaku</th>
                @endif
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($item as $e)
                <tr>
                    @if (!empty($kolom['no']))
                    <td>{{ $no++ }}</td>
                    @endif
                    @if (!empty($kolom['kode_arsip']))
                    <td>{{ $e->kode_arsip_karyawan }}</td>
                    @endif
                    @if (!empty($kolom['kategori']))
                    <td>{{ $e->category->nama_kategori_arsip }}</td>
                    @endif
                    @if (!empty($kolom['nama']))
                    <td>{{ $e->employee->nama_karyawan }}</td>
                    @endif
                    @if (!empty($kolom['jenis_kelamin']))
                    <td>{{ $e->employee->jenis_kelamin }}</td>
                    @endif
                    @if (!empty($kolom['alamat']))
                    <td>{{ $e->employee->alamat }}</td>
                    @endif
                    @if (!empty($kolom['status']))
                    <td>{{ $e->employee->status_karyawan }}</td>
                    @endif
                    @if (!empty($kolom['departemen']))
                    <td>{{ $e->departemen->nama_departemen }}</td>
                    @endif
                    @if (!empty($kolom['kontak']))
                    <td>{{ $e->employee->kontak }}</td>
                    @endif
                    @if (!empty($kolom['email']))
                    <td>{{ $e->employee->email }}</td>
                    @endif
                    @if (!empty($kolom['masa_berlaku']))
                    <td>{{ $e->retensi_arsip }}</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="ttd" style="margin-top: 30px">
            Yogyakarta, {{ date('d F Y') }}
            <br>
            <br>
            <img src="{{ asset('admin/assets/img/frasta.png') }}" height="60" style="margin-right: 60%">
            <br>
            <br>
            Ir. Arif Setiawan, M.Eng., ASEAN Eng
            <br>
            Direktur Utama
        </div>
    </div>

</body>

</html>