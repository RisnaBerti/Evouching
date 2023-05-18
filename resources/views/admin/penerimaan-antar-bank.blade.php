@extends('layouts.main-bendahara')

@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Form-->
        {{-- <form class="form" id="form_ubah"> --}}
        <form method="POST" action="{{ url('/pembayaran-bank/edit') }}" id="form_edit_penerimaankas"
            enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-7 align-self-start">
                        <div class="col">
                            <h3 class="card-title">
                                PERMOHONAN DANA ANTAR BANK
                            </h3>
                        </div>
                    </div>
                    <div class="col-5 align-items-start">
                        <input hidden type="text" id="id_permohonan">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">No. Formulir:</span>
                            </div>
                            <input readonly type="text" class="form-control" id="no_resi_ajuan" name="no_resi_ajuan"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                    Ajuan:</span>
                            </div>
                            <input readonly type="text" class="form-control" id="no_resi_ajuan" name="no_resi_ajuan"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                            </div>
                            <input type="date" value="{{ date('d-m-Y') }}" class="form-control"
                                id="tanggal_pembayaran_bank" name="tanggal_pembayaran_bank"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Nama</span>
                            </div>
                            <input readonly type="text" class="form-control" id="no_resi_ajuan" name="no_resi_ajuan"
                                value="Mutasi Antar BANK" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                    {{-- <div class="col-lg-4">
                        <label>Jabatan</label>
                        <input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan"
                            readonly disabled />
                    </div>
                    <div class="col-lg-4">
                        <label>Divisi / Departemen</label>
                        <input type="text" class="form-control" placeholder="Divisi" id="divisi" name="divisi"
                            readonly disabled />
                    </div> --}}
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Dari Bank</label>
                        <select class="form-control form-control-sm jenis_dana" id="jenis_dana">
                            <option>Bank</option>
                            <option>Bank</option>
                            <option>Bank</option>
                            <option>Bank</option>
                            <option>Bank</option>
                        </select>
                        {{-- <input type="text" class="form-control form-control-sm " placeholder="Total" id="nominal_acc"
                            name="nominal_acc" /> --}}
                    </div>
                    <div class="col-lg-6">
                        <label>Ke Bank</label>
                        <select class="form-control form-control-sm jenis_dana" id="jenis_dana">
                            <option>Bank</option>
                            <option>Bank</option>
                            <option>Bank</option>
                            <option>Bank</option>
                            <option>Bank</option>
                        </select>
                        {{-- <input type="text" class="form-control form-control-sm" placeholder="Total" id="nominal_acc"
                            name="nominal_acc" /> --}}
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Nominal ACC</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nominal ACC"
                            id="nominal_acc" name="nominal_acc" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Terbilang</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Terbilang" id="terbilang"
                            name="terbilang" />
                    </div>
                    <div class="col-lg-6">
                        <label>Keterangan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Keterangan" rows="4"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="text-center">Mengetahui,</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-center">Menyetujui,</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-center">Yang Menerima</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-center">Yang Membayarkan</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary mr-2 save-pembayaran-bank">Submit</button>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->

    <!-- Modal -->
    <div class="modal fade modal-ubah-pembayaranbank" id="staticBackdrop modal-ubah-pembayaranbank" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <!--begin::Form-->
                        {{-- <form class="form" id="form_ubah"> --}}
                        <form method="POST" action="{{ url('/pembayaran-bank/edit') }}" id="form_edit_penerimaankas"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7 align-self-start">
                                        <div class="col">
                                            <h3 class="card-title">
                                                BUKTI PENERIMAAN KAS
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-5 align-items-start">
                                        <input hidden type="text" id="id_permohonan">
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                                    Bayar:</span>
                                            </div>
                                            <input readonly type="text" class="form-control" id="no_resi_ajuan"
                                                name="no_resi_ajuan" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                                            </div>
                                            <input type="date" value="{{ date('d-m-Y') }}" class="form-control"
                                                id="tanggal_pembayaran_bank" name="tanggal_pembayaran_bank"
                                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Dibayarkan Kepada</label>
                                        <input type="text" class="form-control" placeholder="Nama Legkap"
                                            id="name" name="name" readonly disabled />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Jabatan</label>
                                        <input type="text" class="form-control" placeholder="Jabatan" id="jabatan"
                                            name="jabatan" readonly disabled />
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Divisi / Departemen</label>
                                        <input type="text" class="form-control" placeholder="Divisi" id="divisi"
                                            name="divisi" readonly disabled />
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Total Taksiran</label>
                                        <input type="text" class="form-control" placeholder="Total" id="nominal_acc"
                                            name="nominal_acc" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Terbilang</label>
                                        <input type="text" class="form-control" placeholder="Terbilang"
                                            id="terbilang" name="terbilang" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Untuk Keperluan</label>
                                        <input type="text" class="form-control" placeholder="Keterangan"
                                            id="keterangan_permohonan" name="keterangan_permohonan" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Bukti Nota</label>
                                        <div></div>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file"
                                                id="inputFile" />
                                            <label class="custom-file-label" for="inputFile">Choose file</label>
                                        </div>
                                        <span class="form-text text-muted">File wajib scan</span>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary mr-2 save-pembayaran-bank">Submit</button>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
            </div>
        </div>
    </div>
    <!--end::Modal-->

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
                        {{-- <th>Status</th> --}}
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

                        // {
                        //     "render": function(data, type, row) {

                        //         if (row.status == '0')
                        //             return '<span class="label label-lg font-weight-bold label-light-danger label-inline">Belum Diarsipkan</span>';
                        //         else if (row.status == '1')
                        //             return '<span class="label label-lg font-weight-bold label-light-success label-inline">Sudah Diarsipkan</span>';
                        //         else
                        //         return row.status;

                        //     },
                        //     padding: '5px'
                        // },

                        {
                            "render": function(data, type, row) {

                                if (row.bukti_transaksi == null) {
                                    return '<a class="dropdown-item item-ubah-pembayaranbank" href="#" data-ip="' +
                                        row.id_permohonan + '" data-nm="' + row.name +
                                        '" data-jbt="' +
                                        row.jabatan + '" data-dvs="' + row.divisi + '" data-acc="' +
                                        row
                                        .nominal_acc + '" data-trb="' + row.terbilang +
                                        '" data-kp="' +
                                        row.keterangan_permohonan + '" data-st="' +
                                        row.status +
                                        '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah-pembayaranbank"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                        row.id_permohonan +
                                        '"><span class="badge bg-danger">Belum Di Unggah</span></a>';
                                } else {
                                    return '<a class="dropdown-item item-ubah-pembayaranbank" href="#" data-ip="' +
                                        row.id_permohonan + '" data-nm="' + row.name +
                                        '" data-jbt="' +
                                        row.jabatan + '" data-dvs="' + row.divisi + '" data-acc="' +
                                        row
                                        .nominal_acc + '" data-trb="' + row.terbilang +
                                        '" data-kp="' +
                                        row.keterangan_permohonan + '" data-st="' +
                                        row.status +
                                        '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah-pembayaranbank"></i></a> <span class="badge bg-success">Bukti Telah Di Unggah</span>';
                                }


                                // return '<a class="dropdown-item item-ubah-pembayaranbank" href="#" data-ip="' +
                                //     row.id_permohonan + '" data-nm="' + row.name + '" data-jbt="' +
                                //     row.jabatan + '" data-dvs="' + row.divisi + '" data-acc="' + row
                                //     .nominal_acc + '" data-trb="' + row.terbilang + '" data-kp="' +
                                //     row.keterangan_permohonan + '" data-st="' +
                                //     row.status +
                                //     '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah-pembayaranbank"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                //     row.id_permohonan +
                                //     '"><span class="badge bg-success">Bukti Telah Di Unggah</span></a>';
                            },
                            padding: '5px',
                        }
                    ],
                });
            }

            $('#table-pembayarankas').on('click', '.item-ubah-pembayaranbank', function() {

                // var id_penerimaan_kas = $(this).data('ipk');
                var id_permohonan = $(this).data('ip');
                var name = $(this).data('nm');
                var jabatan = $(this).data('jbt');
                var divisi = $(this).data('dvs');
                var acc = $(this).data(uang('acc'));
                var keterangan = $(this).data('kp');
                var terbilang = $(this).data('trb');
                var status = $(this).data('st');
                var bukti_transaksi = $(this).data('bkt');

                // $('#id_penerimaan_kas').val(id_penerimaan_kas);
                $('#id_permohonan').val(id_permohonan);
                $('#name').val(name);
                $('#jabatan').val(jabatan);
                $('#divisi').val(divisi);

                if (acc == null) {
                    $('#nominal_acc').val('0');
                } else {
                    $('#nominal_acc').val(uang(acc));
                }

                $('#keterangan_permohonan').val(keterangan);
                $('#terbilang').val(terbilang);

                if (status == null) {
                    $('#status').val('0');
                } else {
                    $('#status').val(status);
                }
                $('#status').val(status);
                $('#bukti_transaksi').val(bukti_transaksi);

                $('.modal-ubah-pembayaranbank').modal('show');
            });

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
