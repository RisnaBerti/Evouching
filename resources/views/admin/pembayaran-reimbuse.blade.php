@extends('layouts.main-bendahara')

@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-header">
            <h3 class="card-title">
                BUKTI PENERIMAAN KAS
            </h3>
            <div class="card-toolbar">

            </div>
        </div>

        <!--begin::Form-->
        <form class="form">
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Dibayarkan kepada</label>
                        <input type="text" class="form-control" placeholder="Nama Legkap" id="name" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" placeholder="Harga Satuan" id="jabatan" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Divisi / Departemen</label>
                        <input type="text" class="form-control" placeholder="Jumlah" id="divisi" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Total Taksiran</label>
                        <input type="text" class="form-control" placeholder="Total" id="nama_perkiraan" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Terbilang</label>
                        <input type="text" class="form-control" placeholder="Terbilang" id="terbilang" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Untuk Keperluan</label>
                        <input type="text" class="form-control" placeholder="Keterangan" id="keterangan" />
                    </div>
                    <div class="col-lg-6">
                        <label>Bukti Nota</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" accept="image/png, image/jpeg, image/jpg, .pdf" id="bukti_transaksi" />
                            <label class="custom-file-label" for="bukti_transaksi">Choose file</label>
                        </div>
                        <span class="form-text text-muted">File wajib scan</span>
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-3">
                        <button type="button" class="btn btn-primary mr-2 save-pembayaran-kas">Sumbit</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
                <h3 class="card-label">Permohonan Dana</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered display nowrap table-pembayaranbank" id="table-pembayaranbank"
                style="width:100%; margin-top: 13px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th hidden>id_permohonan</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Divisi</th>
                        <th>Total Mominal ACC</th>
                        <th>Keterangan</th>
                        <th>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            get();

            function get() {
                $('#table-pembayaranbank').DataTable({

                    "destroy": true,
                    "processing": true,
                    "ordering": true,
                    "scrollX": true,
                    "pageLength": 10,
                    "ajax": {

                        url: "{{ url('/pembayaran-bank/get') }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_permohonan: "id_permohonan"
                        },
                        async: true,
                        dataType: 'json',
                    },

                    "deferRender": true,

                    "aLengthMenu": [
                        [5, 10, 50],
                        [5, 10, 50]
                    ],

                    "columns": [

                        {
                            "render": function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            },

                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return String(row.id_permohonan);

                            },
                            padding: '5px',
                            visible: false
                        },

                        {
                            "render": function(data, type, row) {

                                return String(row.name);

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return row.jabatan;

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return row.divisi;

                            },
                            padding: '5px'
                        },
                        {
                            "render": function(data, type, row) {

                                return String(uang(row.nominal_acc));

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return row.keterangan_permohonan;

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {
                                return '<a class="dropdown-item item-ubah-pembayaran" href="#" data-ip="' +
                                    row.id_permohonan + '" data-nm="' + row.name + '" data-nama="' +
                                    row.jabatan + '" data-jbt="' + row.divisi + '" data-dvs="' + row
                                    .nominal_acc + '" data-nra="' + row.keterangan_permohonan +
                                    '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                    row.id_permohonan +
                                    '"><i class="fas fa-trash-alt btn btn-icon btn-light-danger item-hapus"></i></a>'
                            },
                            padding: '5px',
                        }
                    ],
                });
            }

            function uang(num) {

                var str = num.toString().replace("", ""),
                    parts = false,
                    output = [],
                    i = 1,
                    formatted = null;
                if (str.indexOf(".") > 0) {
                    parts = str.split(".");
                    str = parts[0];
                }
                str = str.split("").reverse();
                for (var j = 0, len = str.length; j < len; j++) {
                    if (str[j] != ",") {
                        output.push(str[j]);
                        if (i % 3 == 0 && j < (len - 1)) {
                            output.push(",");
                        }
                        i++;
                    }
                }
                formatted = output.reverse().join("");
                return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));

            }
        });
    </script>
@endsection
