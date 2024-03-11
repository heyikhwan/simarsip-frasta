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
            font-size: 20px
        }

        #print table td {
            font-size: 20px
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
    <title>Arsip Dokumentasi</title>
</head>

<body>

    <div id="print">
        <table class='table'>
            <tr>
                <td><img src='{{ url('storage/assets/profile-images/logo.jpeg') }}' height="200" width="200"></td>
                <td>
                    <h2 style="font-size: 2.5rem">LAPORAN ARSIP DOKUMENTASI</h2>
                    <h2 style="font-size: 2.5rem">SISTEM INFORMASI MANAJEMEN ARSIP</h2>
                    <h2 style="font-size: 2.5rem">PT. FRASTA SURVEY INDONESIA</h2>
                    <p style="font-size:25px;"><i>Jl. Raya Tajem No.Km 2, Kenayan, Wedomartani, Kec. Ngemplak, Kabupaten
                            Sleman, Daerah Istimewa Yogyakarta 55584</i></p>
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
                <th>Tanggal Dokumentasi</th>
                <th>Departemen</th>
                <th>Keterangan</th>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($item as $e)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $e->kode_arsip_dokumentasi }}</td>
                    <td style="text-align: center">{{ date('d-m-Y', strtotime($e->tanggal_dokumentasi)) }}
                    </td>
                    <td>
                        {{ $e->departemen->nama_departemen }}
                    </td>
                    <td>
                        {{ $e->keterangan }}
                    </td>
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