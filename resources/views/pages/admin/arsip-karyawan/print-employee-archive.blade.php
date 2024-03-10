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
            font-family: "Calibri", Courier, monospace;
            width: 1200px;
            font-size: 14px;
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
            width: 90%;
            text-align: center;
            margin: 10px;
        }

        #print table hr {
            border: 3px double #000;
        }

        #print .ttd {
            float: right;
            width: 250px;
            background-position: center;
            background-size: contain;
        }

        #print table th {
            color: #000;
            font-family: Verdana, Geneva, sans-serif;
            font-size: 14px
        }

        #print table td {
            font-size: 14px
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
            font-size: 24px;
        }
    </style>
    <title>Arsip Karyawan</title>
</head>

<body>

    <div id="print">
        <table class='table1'>
            <tr>
                <td><img src='{{ Storage::url('assets/profile-images/logo.jpeg') }}' height="200" width="200"></td>
                <td>
                    <h2 style="font-size: 2.5rem">LAPORAN ARSIP KARYAWAN</h2>
                    <h2 style="font-size: 2.5rem">SISTEM INFORMASI MANAJEMEN ARSIP</h2>
                    <h2 style="font-size: 2.5rem">PT. FRASTA SURVEY INDONESIA</h2>
                    <p style="font-size:25px;"><i>Jl. Raya Tajem No.Km 2, Panjen, Wedomartani, Ngemplak, Sleman, Daerah Istimewa Yogyakarta. 55584</i></p>
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
                <th>Retensi Arsip</th>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($item as $e)
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

    <script>
        window.print();
        window.onafterprint = window.close;
    </script>

</body>

</html>
