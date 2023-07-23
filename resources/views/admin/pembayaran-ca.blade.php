@extends('layouts.main-bendahara')

@section('content')
    <!-- Modal -->
    <div class="modal fade modal-upload" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="panel-body card-body">
                            <form action="{{ route('pembayaranca.upload') }}" method="POST" id="file-upload"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 align-self-start">
                                            <div class="col">
                                                <h3 class="card-title">
                                                    BUKTI PEMBAYARAN KAS
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-5 align-items-start">
                                            <input hidden type="text" name="id_permohonan" id="id_permohonan">
                                            <input hidden type="text" name="id_ca" id="id_ca">
                                            <div class="input-group input-group-sm mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                                        Bayar:</span>
                                                </div>
                                                <input readonly type="text" class="form-control" id="no_resi_ca"
                                                    name="no_resi_ca" aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                                                </div>
                                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control"
                                                    id="tanggal_penerimaan_ca" name="tanggal_penerimaan_ca"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Dibayarkan Kepada</label>
                                            <input type="text" class="form-control" placeholder="Nama Legkap"
                                                id="name" readonly disabled />
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Total Dana Yang Diajukan</label>
                                            <input type="text" class="form-control" placeholder=""
                                                id="total_dana_ajuan"readonly disabled />
                                        </div>
                                        {{-- <div class="col-lg-4">
                                            <label>Divisi / Departemen</label>
                                            <input type="text" class="form-control" placeholder="Divisi" id="divisi"
                                                readonly disabled />
                                        </div> --}}
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Nominal ACC</label>
                                            <input type="text" class="form-control" placeholder="Total"
                                                name="nominal_acc" id="nominal_acc" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Nominal Terpakai</label>
                                            <input type="text" class="form-control" placeholder="Total"
                                                name="nominal_terpakai" id="nominal_terpakai" />
                                        </div>
                                    </div>
                                    <div hidden class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Terbilang</label>
                                            <input readonly type="text" class="form-control" placeholder="Terbilang"
                                                name="terbilang" id="terbilang" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Untuk Keperluan</label>
                                            <input readonly type="text" class="form-control" placeholder="Keterangan"
                                                name="keterangan_permohonan" id="keterangan_permohonan" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label" for="inputFile">Bukti Nota</label>
                                            <input type="file" accept=".pdf" name="file" id="inputFile"
                                                class="form-control">
                                            <span class="text-danger" id="file-input-error"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Modal-->

    <!-- Modal -->
    <div class="modal fade modal-upload-edit" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="panel-body card-body">
                            <form action="{{ route('pembayaranca.uploadid') }}" method="POST" id="file-upload-edit"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 align-self-start">
                                            <div class="col">
                                                <h3 class="card-title">
                                                    BUKTI PEMBAYARAN KAS
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-5 align-items-start">
                                            <input hidden type="text" name="id_permohonan_edit"
                                                id="id_permohonan_edit">
                                            <input hidden type="text" name="id_ca_edit" id="id_ca_edit">
                                            <div class="input-group input-group-sm mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                                        Bayar:</span>
                                                </div>
                                                <input readonly type="text" class="form-control" id="no_resi_ca_edit"
                                                    name="no_resi_ca_edit" aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-sm">Tanggal:</span>
                                                </div>
                                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control"
                                                    id="tanggal_penerimaan_ca_edit" name="tanggal_penerimaan_ca_edit"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Dibayarkan Kepada</label>
                                            <input type="text" class="form-control" placeholder="Nama Legkap"
                                                id="name_edit" readonly disabled />
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Total Dana Yang Diajukan</label>
                                            <input type="text" class="form-control"
                                                placeholder="Dana yang diajukan"id="total_dana_ajuan_edit" readonly
                                                disabled />
                                        </div>
                                        {{-- <div class="col-lg-4">
                                            <label>Divisi / Departemen</label>
                                            <input type="text" class="form-control" placeholder="Divisi"
                                                id="divisi_edit" readonly disabled />
                                        </div> --}}
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Nominal ACC</label>
                                            <input readonly type="text" class="form-control" placeholder="Total"
                                                name="nominal_acc_edit" id="nominal_acc_edit" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label>Nominal Terpakai</label>
                                            <input type="text" class="form-control" placeholder="Total"
                                                name="nominal_terpakai_edit" id="nominal_terpakai_edit" />
                                        </div>
                                    </div>
                                    <div hidden class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Terbilang</label>
                                            <input readonly type="text" class="form-control" placeholder="Terbilang"
                                                name="terbilang_edit" id="terbilang_edit" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Untuk Keperluan</label>
                                            <input readonly type="text" class="form-control" placeholder="Keterangan"
                                                name="keterangan_permohonan_edit" id="keterangan_permohonan_edit" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label" for="inputFile">Bukti Nota</label>
                                            <input type="file" accept=".pdf" name="file_edit" id="inputFile"
                                                class="form-control">
                                            <p class="text-mute">File Max 8 Mb</p>
                                            <span class="text-danger" id="file-input-error"></span>
                                        </div>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--end::Card-->
            </div>
        </div>
    </div>
    <!--end::Modal-->

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
                <h3 class="card-label">Pembayaran Kas</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered display nowrap table-pembayaranca" id="table-pembayaranca"
                style="width:100%; margin-top: 13px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th hidden>id_permohonan</th>
                        <th hidden>id_ca</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Divisi</th>
                        <th>Total Nominal ACC</th>
                        <th>Tanggal Pengajuan CA</th>
                        <th>Keterangan</th>
                        <th>Total Nominal Terpakai</th>
                        <th>Tanggal Pengembalian CA</th>
                        <th>Bukti Transaksi</th>
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
            getmax_ca();

            function get() {
                $('#table-pembayaranca').DataTable({

                    "destroy": true,
                    "processing": true,
                    "ordering": true,
                    "scrollX": true,
                    "pageLength": 10,
                    "ajax": {

                        url: "{{ url('/pembayaran-ca/get') }}",
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

                                return String(row.id_ca);

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

                                return String(row.jabatan);

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return String(row.divisi);

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

                                return '<span class="badge badge-pill  badge-primary">' + row
                                    .tanggal_permohonan + '</span>';

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return String(row.keterangan_permohonan);

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return String(uang(row.nominal_terpakai));

                            },
                            padding: '5px'
                        },
                        {
                            "render": function(data, type, row) {

                                return '<span class="badge badge-pill badge-primary">' + row
                                    .tanggal_penerimaan_ca + '</span>';

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                if (row.bukti_transaksi == '0' || row.bukti_transaksi == null) {
                                    return '<a href="{{ url('') }}/bukti/ca/' + row
                                        .bukti_transaksi +
                                        '" target="_blank"><span class="badge badge-pill  badge-danger">Belum Upload</span></a>';
                                } else {
                                    return '<a href="{{ url('') }}/bukti/ca/' + row
                                        .bukti_transaksi +
                                        '" target="_blank"><span class="badge badge-pill  badge-primary">Lihat Bukti</span></a>';
                                }
                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {
                                if (row.bukti_transaksi == '0' || row.bukti_transaksi == null) {
                                    return '<a class="dropdown-item item-upload" href="#" data-id="' +
                                        row.id_ca + '" data-ip="' + row.id_permohonan +
                                        '" data-nm="' + row.name + '" data-jbt="' + row.jabatan +
                                        '" data-dvs="' + row.divisi + '" data-acc="' + row
                                        .nominal_acc + '" data-tglajuan="' + row
                                        .tanggal_permohonan + '" data-kp="' + row
                                        .keterangan_permohonan + '" data-terpakai="' + row
                                        .nominal_terpakai +
                                        '" data-trb="' + row.terbilang + '" data-tglpenerimaan="' +
                                        row.tanggal_penerimaan_ca + '" data-bkt="' + row
                                        .bukti_transaksi + '" data-da="' + row.total_dana_ajuan +
                                        '"><i class="ki ki-plus  text-danger btn btn-icon btn-light-danger"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                        row.id_permohonan + '"></a>';

                                } else {
                                    return '<a class="dropdown-item item-edit" href="#" data-id="' +
                                        row.id_ca + '" data-ip="' + row.id_permohonan + '" data-resi="' + row.no_resi_ca +
                                        '" data-nm="' + row.name + '" data-jbt="' + row.jabatan +
                                        '" data-dvs="' + row.divisi + '" data-acc="' + row
                                        .nominal_acc + '" data-tglajuan="' + row
                                        .tanggal_permohonan + '" data-kp="' + row
                                        .keterangan_permohonan + '" data-terpakai="' + row
                                        .nominal_terpakai +
                                        '" data-trb="' + row.terbilang + '" data-tglpenerimaan="' +
                                        row.tanggal_penerimaan_ca + '" data-bkt="' + row
                                        .bukti_transaksi + '" data-da="' + row.total_dana_ajuan +
                                        '"><i class="ki ki-plus  text-dark btn btn-icon btn-light-dark"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                        row.id_permohonan + '"></a>';
                                }
                            },
                            padding: '5px',
                        }
                    ],
                });
            }
            // end of get

            function getmax_ca() {

                $.get("{{ url('/pembayaran-ca/getmax_ca') }}", {
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(data) {
                        var total = parseInt(data) + 1;
                        $("#no_resi_ca").val(total);
                    });
            }
            
            // uang
            $('#nominal_acc').change(function() {
                var acc = $('#nominal_acc').val();
                $('#nominal_acc').val(uang(acc));
            });

            $('#nominal_terpakai').change(function() {
                var acc = $('#nominal_terpakai').val();
                $('#nominal_terpakai').val(uang(acc));
            });

            $('#nominal_terpakai_edit').change(function() {
                var acc = $('#nominal_terpakai_edit').val();
                $('#nominal_terpakai_edit').val(uang(acc));
            });
            // end of uang

            // upload
            $('#table-pembayaranca').on('click', '.item-upload', function() {
                // alert('apa ya');

                getmax_ca();

                // var id_penerimaan_kas = $(this).data('ipk');
                var id_ca = $(this).data('id');
                var no_resi_ca = $(this).data('resi');
                var tanggal_penerimaan_ca = $(this).data('tgl');
                var id_permohonan = $(this).data('ip');
                var name = $(this).data('nm');
                var total_dana_ajuan = $(this).data('da');
                var divisi = $(this).data('dvs');
                var jabatan = $(this).data('jbt');
                var acc = $(this).data(uang('acc'));
                var tanggal_pengajuan_ca = $(this).data(uang('tglajuan'));
                var terpakai = $(this).data(uang('terpakai'));
                var keterangan = $(this).data('kp');
                var terbilang = $(this).data('trb');
                var tanggal_penerimaan_ca = $(this).data('tglpenerimaan');
                var bukti_transaksi = $(this).data('bkt');

                // alert(id_ca);

                //$('#id_penerimaan_kas').val(id_penerimaan_kas);
                $('#id_permohonan').val(id_permohonan);
                $('#id_ca').val(id_ca);
                $('#name').val(name);
                $('#total_dana_ajuan').val(total_dana_ajuan);
                // $('#divisi').val(divisi);

                if (acc == null) {
                    $('#nominal_acc').val('0');
                } else {
                    $('#nominal_acc').val(uang(acc));
                }

                if (terpakai == null) {
                    $('#nominal_terpakai').val('0');
                } else {
                    $('#nominal_terpakai').val(uang(terpakai));
                }
                $('#keterangan_permohonan').val(keterangan);
                $('#terbilang').val(terbilang);
                $('#bukti_transaksi').val(bukti_transaksi);

                $('.modal-upload').modal('show');
            });
            // end of upload

            //get data by id ca
            function getdatapembayaranid(id_ca) {

                $.post("{{ route('pembayaranca.getid') }}", {
                        _token: "{{ csrf_token() }}",
                        id_ca: id_ca
                    })
                    .done(function(data) {
                        $("#id_permohonan_edit").val(data.id_permohonan);
                        $("#id_ca_edit").val(data.id_ca);
                        $("#no_resi_ca_edit").val(data.no_resi_ca);
                        $("#tanggal_penerimaan_ca_edit").val(data.tanggal_penerimaan_ca);
                        $("#nominal_terpakai_edit").val(data.nominal_terpakai);
                        $("#file_edit").val(data.bukti_transaksi);
                        // alert(data.no_resi_bayar_bank);
                    });
            }

            // edit nota
            $('#table-pembayaranca').on('click', '.item-edit', function() {
                // getmax_ca();

                // var id_penerimaan_kas = $(this).data('ipk');
                var id_ca = $(this).data('id');
                var no_resi_ca = $(this).data('resi');
                var tanggal_penerimaan_ca = $(this).data('tgl');
                var id_permohonan = $(this).data('ip');
                var name = $(this).data('nm');
                var jabatan = $(this).data('jbt');
                var total_dana_ajuan = $(this).data('da');

                // alert(total_dana_ajuan);
                // var divisi = $(this).data('dvs');
                var acc = $(this).data(uang('acc'));
                var terpakai = $(this).data(uang('terpakai'));
                var keterangan = $(this).data('kp');
                var terbilang = $(this).data('trb');
                var bukti_transaksi = $(this).data('bkt');

                //$('#id_penerimaan_kas').val(id_penerimaan_kas);
                $('#id_permohonan_edit').val(id_permohonan);
                $('#id_ca_edit').val(id_ca);
                $('#no_resi_ca_edit').val(no_resi_ca);
                $('#name_edit').val(name);
                $('#jabatan_edit').val(jabatan);

                if (acc == null) {
                    $('#nominal_acc_edit').val('0');
                } else {
                    $('#nominal_acc_edit').val(uang(acc));
                }

                if (terpakai == null) {
                    $('#nominal_terpakai_edit').val('0');
                } else {
                    $('#nominal_terpakai_edit').val(uang(terpakai));
                }
                $('#keterangan_permohonan_edit').val(keterangan);
                $('#total_dana_ajuan_edit').val(uang(total_dana_ajuan));
                $('#terbilang_edit').val(terbilang);
                $('#bukti_transaksi_edit').val(bukti_transaksi);

                getdatapembayaranid(id_ca);

                $('.modal-upload-edit').modal('show');
            });
            // end of 

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
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function update(filename, no_resi_ca, id_ca, id_permohonan, tanggal_penerimaan_ca, nominal_terpakai) {

            //var tanggal_penerimaan_ca = $('#tanggal_penerimaan_ca').val();
            //var no_resi_ca = $('#no_resi_ca').val();
            //var id_permohonan = $('#id_permohonan').val();
            //var id_ca = $('#id_ca').val();
            //var nominal_terpakai = $('#nominal_terpakai').val();

            $.post("{{ route('pembayaranca.edit') }}", {
                _token: "{{ csrf_token() }}",
                id_ca: id_ca,
                id_permohonan: id_permohonan,
                no_resi_ca: no_resi_ca,
                tanggal_penerimaan_ca: tanggal_penerimaan_ca,
                nominal_terpakai: nominal_terpakai.replace(/\,/g, ''),
                bukti_transaksi: filename

            }).done(function(response) {

                if (response == "success") {
                    Swal.fire(
                        'Terupload!',
                        'Bukti Transaksi Berhasil Di Unggah.',
                        'success'
                    )
                    location.reload()

                    // get();

                    $(".item-ubah").attr("disabled", false);

                    $('#id_permohonan').val('');

                    $('#modalubah').modal('hide');

                } else {
                    Swal.fire(
                        'Terupload',
                        'Bukti Transaksi Berhasil Di Unggah!.',
                        'success'
                    )
                    location.reload()

                    $(".item-ubah").attr("disabled", false);

                }

            });
        }

        $('#file-upload').submit(function(e) {

            e.preventDefault();
            let formData = new FormData(this);
            $('#file-input-error').text('');

            $.ajax({

                type: 'POST',
                url: "{{ route('pembayaranca.upload') }}",
                data: formData,
                contentType: false,
                processData: false,

                success: (response) => {

                    if (response) {
                        this.reset();

                        update(response.filename, response.no_resi_ca, response.id_ca, response
                            .id_permohonan, response.tanggal_penerimaan_ca, response
                            .nominal_terpakai);

                        // alert('File has been uploaded successfully');

                    }

                },

                error: function(response) {

                    $('#file-input-error').text(response.responseJSON.message);

                }

            });

        });

        function update_edit(filename, no_resi_ca, id_ca, id_permohonan, tanggal_penerimaan_ca, nominal_terpakai) {

            $.post("{{ route('pembayaranca.editid') }}", {
                _token: "{{ csrf_token() }}",
                id_ca: id_ca,
                id_permohonan: id_permohonan,
                no_resi_ca: no_resi_ca,
                tanggal_penerimaan_ca: tanggal_penerimaan_ca,
                nominal_terpakai: nominal_terpakai.replace(/\,/g, ''),
                bukti_transaksi: filename

            }).done(function(response) {

                if (response == "success") {
                    Swal.fire(
                        'Terupload!',
                        'Bukti Transaksi Berhasil Di Unggah.',
                        'success'
                    )
                    location.reload()


                    $(".item-ubah").attr("disabled", false);

                    $('#id_permohonan').val('');

                    $('#modalubah').modal('hide');

                } else {
                    // Swal.fire(
                    //     'Terupload!',
                    //     'Bukti Transaksi Gagal Di Unggah.',
                    //     'error'
                    // )
                    // location.reload()

                    Swal.fire(
                        'Terupload',
                        'Bukti Transaksi Berhasil Di Unggah!.',
                        'success'
                    )
                    location.reload()

                    $(".item-ubah").attr("disabled", false);

                }

            });
        }

        $('#file-upload-edit').submit(function(e) {

            e.preventDefault();
            let formData = new FormData(this);
            $('#file-input-error').text('');

            $.ajax({

                type: 'POST',
                url: "{{ route('pembayaranca.uploadid') }}",
                data: formData,
                contentType: false,
                processData: false,

                success: (response) => {

                    if (response) {
                        this.reset();

                        update(response.filename, response.no_resi_ca_edit, response.id_ca_edit, response.id_permohonan_edit, response.tanggal_penerimaan_ca_edit, response.nominal_terpakai_edit);

                        // alert('File has been uploaded successfully');

                    }

                },

                error: function(response) {

                    $('#file-input-error').text(response.responseJSON.message);

                }

            });

        });
    </script>
@endsection
