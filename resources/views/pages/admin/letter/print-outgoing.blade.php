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
            padding: 0 30px;
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
    <title>Surat Keluar</title>
</head>

<body>
    <div id="print">
        <table class='table1'>
            <tr>
                <td><img src='{{ url('storage/assets/profile-images/logo.jpeg') }}' height="200" width="200"></td>
                <td>
                    <h2 style="font-size: 2.5rem">LAPORAN SURAT KELUAR</h2>
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
                <th>No.</th>
                <th>No. Surat</th>
                <th>Pengirim</th>
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
                @foreach ($item as $letter)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $letter->kode_surat }}</td>
                        <td>{{ $letter->pengirim_surat->nama_pengirim_surat }}</td>
                        <td style="text-align: center">{{ date('d-m-Y', strtotime($letter->tanggal_surat)) }}
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
    </div>

    <script>
        window.print();
        window.onafterprint = window.close;
    </script>

</body>

</html>
