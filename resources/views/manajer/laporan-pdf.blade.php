<div>
    <!-- Order your soul. Reduce your wants. - Augustine -->
</div><!DOCTYPE html>
<html>

<head>
    {{-- <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }

        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-x244 {
            background-color: #cbcefb;
            border-color: #000000;
            color: #000000;
            font-family: "Times New Roman", Times, serif !important;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            vertical-align: top
        }
    </style>
    <style>

        *{
            margin: 0;
            padding: 0;
        }

        .judul {
            width: 100%;
            font-size: 14px;
            margin-left: auto;
            margin-right: auto;
            text-align: center;
            margin-top: 20px;
        }

        .content{
            margin-left: 20px;
            margin-top: 20px;
            margin-bottom: 20px;
            margin-right: 20px;
        }

        table {
            border-collapse: collapse; 
            border: 2px solid black;
            padding: 5px;
            font-size: 18px;
            text-align: left;
            width: 100%;
        }

        th.lima{
            width: 5%;
            text-align: left;
            border-collapse: collapse; 
            border: 2px solid black;
            padding: 5px;
        }

        th.dua{
            width: 25%;
            text-align: left;
            border-collapse: collapse; 
            border: 2px solid black;
            padding: 5px;
        }

        th.tiga {
            width: 40%;
            text-align: left;
            border-collapse: collapse; 
            border: 2px solid black;
            padding: 5px;
        }

        td{
            border-collapse: collapse; 
            border: 2px solid black;
        }

    </style>
    <center>
        <h5>LAPORAN E-VOUCHING</h4>
            <h6><a target="_blank"
                    href="">Gerak Sedekah Cilacap</a>
        </h5>
    </center>

    <table class='table table-bordered' width="100%">
        <thead>
            <tr>
                <td class="tg-x244" rowspan="2">NO</td>
                <td class="tg-x244" rowspan="2">TANGGAL</td>
                <td class="tg-x244" rowspan="2">NAMA</td>
                <td class="tg-x244" rowspan="2">TF / CASH</td>
                <td class="tg-x244" rowspan="2">URAIAN TRANSAKSI</td>
                <td class="tg-x244" rowspan="2">MASUK</td>
                <td class="tg-x244" rowspan="2">KELUAR</td>
                <td class="tg-x244" rowspan="2">SALDO</td>
                <td class="tg-x244" rowspan="2">KETERANGAN</td>
                <td class="tg-x244" rowspan="2">PJ</td>
                <td class="tg-x244" rowspan="2">BUKTI TRANSAKSI</td>
            </tr>
            <tr>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($laporan as $l)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $l->tanggal_permohonan }}</td>
                    <td>{{ $l->name }}</td>
                    <td>{{ $l->tanggal_permohonan }}</td>
                    <td>{{ $l->keterangan_permohonan }}</td>
                    <td>{{ $l->nominal_acc }}</td>
                    <td>{{ $l->name }}</td>
                    <td>{{ $l->tanggal_permohonan }}</td>
                    <td>{{ $l->keterangan_permohonan }}</td>
                    <td>{{ $l->nominal_acc }}</td>
                    {{-- <td><img src="http://127.0.0.1:8000/bukti/{{ $l->bukti_transaksi }}" width="75" alt="Bukti Transaksi"></td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
{{-- <style type="text/css">
    .tg {
        border-collapse: collapse;
        border-spacing: 0;
    }

    .tg td {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg th {
        border-color: black;
        border-style: solid;
        border-width: 1px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        overflow: hidden;
        padding: 10px 5px;
        word-break: normal;
    }

    .tg .tg-x244 {
        background-color: #cbcefb;
        border-color: #000000;
        color: #000000;
        font-family: "Times New Roman", Times, serif !important;
        font-size: 14px;
        font-weight: bold;
        text-align: center;
        vertical-align: top
    }
</style> --}}
{{-- <table class="tg">
    <thead>
        <tr>
            <td class="tg-x244" rowspan="2">NO</td>
            <td class="tg-x244" rowspan="2">TANGGAL</td>
            <td class="tg-x244" rowspan="2">NAMA</td>
            <td class="tg-x244" rowspan="2">TF / CASH</td>
            <td class="tg-x244" rowspan="2">URAIAN TRANSAKSI</td>
            <td class="tg-x244" rowspan="2">MASUK</td>
            <td class="tg-x244" rowspan="2">KELUAR</td>
            <td class="tg-x244" rowspan="2">SALDO</td>
            <td class="tg-x244" rowspan="2">KETERANGAN</td>
            <td class="tg-x244" rowspan="2">PJ</td>
            <td class="tg-x244" rowspan="2">BUKTI TRANSAKSI</td>
        </tr>
        <tr>
        </tr>
    </thead>
    <tbody>
        @php $i=1 @endphp
        @foreach ($laporan as $l)
            <tr>
                <td>{{ $i++ }}</td>
                <td>{{ $l->tanggal_permohonan }}</td>
                <td>{{ $l->name }}</td>
                <td>{{ $l->tanggal_permohonan }}</td>
                <td>{{ $l->keterangan_permohonan }}</td>
                <td>{{ $l->nominal_acc }}</td>
                <td>{{ $l->name }}</td>
                <td>{{ $l->tanggal_permohonan }}</td>
                <td>{{ $l->keterangan_permohonan }}</td>
                <td>{{ $l->nominal_acc }}</td>
                <td>{{ $l->bukti_transaksi }}</td>
            </tr>
        @endforeach
    </tbody>
</table> --}}
