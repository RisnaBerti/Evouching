@extends('layouts.main-bendahara')

@section('content')
    <!-- Modal -->
    <div class="modal fade modal-ubah-pembayarankas" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="panel-body card-body">
                            <form action="{{ route('pembayarankas.upload') }}" method="POST" id="file-upload"
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
                                            <input hidden type="text" name="id" id="id">
                                            <div class="input-group input-group-sm mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                                        Bayar:</span>
                                                </div>
                                                <input readonly type="text" class="form-control" id="no_resi_bayar_kas"
                                                    name="no_resi_bayar_kas" aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                                                </div>
                                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control"
                                                    id="tanggal_pembayaran_kas" name="tanggal_pembayaran_kas"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>Dibayarkan Kepada</label>
                                            <input type="text" class="form-control" placeholder="Nama Legkap"
                                                id="name" readonly disabled />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control" placeholder="Jabatan" id="jabatan"
                                                readonly disabled />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Divisi / Departemen</label>
                                            <input type="text" class="form-control" placeholder="Divisi" id="divisi"
                                                readonly disabled />
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Total Taksiran</label>
                                            <input type="text" class="form-control" placeholder="Total"
                                                id="nominal_acc" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Terbilang</label>
                                            <input type="text" class="form-control" placeholder="Terbilang"
                                                id="terbilang" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Untuk Keperluan</label>
                                            <input type="text" class="form-control" placeholder="Keterangan"
                                                id="keterangan_permohonan" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label" for="inputFile">Bukti Nota</label>
                                            <input type="file" name="file" accept=".pdf" id="inputFile" class="form-control">
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
    <div class="modal fade modal-edit-pembayarankas" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
        tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="panel-body card-body">
                            <form action="{{ route('pembayarankas.ubahid') }}" method="POST" id="file-upload-edit"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-7 align-self-start">
                                            <div class="col">
                                                <h3 class="card-title">
                                                    EDIT BUKTI PEMBAYARAN KAS
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-5 align-items-start">
                                            <input type="text" name="id_permohonan_edit" id="id_permohonan_edit">
                                            {{-- <input type="text" name="id_edit" id="id_edit"> --}}
                                            <div class="input-group input-group-sm mb-1">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                                        Bayar:</span>
                                                </div>
                                                <input readonly type="text" class="form-control"
                                                    id="no_resi_bayar_kas_edit" name="no_resi_bayar_kas_edit"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                            <div class="input-group input-group-sm mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text"
                                                        id="inputGroup-sizing-sm">Tanggal:</span>
                                                </div>
                                                <input type="date" value="{{ date('Y-m-d') }}" class="form-control"
                                                    id="tanggal_pembayaran_kas_edit" name="tanggal_pembayaran_kas_edit"
                                                    aria-label="Sizing example input"
                                                    aria-describedby="inputGroup-sizing-sm">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-lg-4">
                                            <label>Dibayarkan Kepada</label>
                                            <input type="text" class="form-control" placeholder="Nama Legkap"
                                                id="name_edit" readonly disabled />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Jabatan</label>
                                            <input type="text" class="form-control" placeholder="Jabatan"
                                                id="jabatan_edit" readonly disabled />
                                        </div>
                                        <div class="col-lg-4">
                                            <label>Divisi / Departemen</label>
                                            <input type="text" class="form-control" placeholder="Divisi"
                                                id="divisi_edit" readonly disabled />
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Total Taksiran</label>
                                            <input type="text" class="form-control" placeholder="Total"
                                                id="nominal_acc_edit" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Terbilang</label>
                                            <input type="text" class="form-control" placeholder="Terbilang"
                                                id="terbilang_edit" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-6">
                                            <label>Untuk Keperluan</label>
                                            <input type="text" class="form-control" placeholder="Keterangan"
                                                id="keterangan_permohonan_edit" />
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="form-label" for="inputFile">Bukti Nota</label>
                                            <input type="file" accept=".pdf" name="file_edit" id="inputFile" class="form-control">
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
                <h3 class="card-label">pembayaran Kas</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered display nowrap table-pembayarankas" id="table-pembayarankas"
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
            getmax();

            function get() {
                $('#table-pembayarankas').DataTable({

                    "destroy": true,
                    "processing": true,
                    "ordering": true,
                    "scrollX": true,
                    "pageLength": 10,
                    "ajax": {

                        url: "{{ url('/pembayaran-kas/get') }}",
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

                                return String(row.keterangan_permohonan);

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                               if (row.bukti_pembayaran_kas == '0' || row.bukti_pembayaran_kas == null) { 
                                    return '<a href="{{ url('') }}/bukti/' + row.bukti_pembayaran_kas +'" target="_blank"><span class="badge badge-pill  badge-danger">Belum Upload</span></a>';
                                } else {
                                    return '<a href="{{ url('') }}/bukti/' + row.bukti_pembayaran_kas +'" target="_blank"><span class="badge badge-pill  badge-primary">Lihat Bukti</span></a>';
                                }
                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {
                                if (row.bukti_pembayaran_kas == '0' && row.bukti_pembayaran_kas == null) {
                                    return '<a class="dropdown-item item-ubah-pembayarankas" href="#" data-id="' +
                                        row.id + '" data-ip="' +
                                        row.id_permohonan + '" data-nm="' + row.name +
                                        '" data-jbt="' + row.jabatan + '" data-dvs="' + row.divisi +
                                        '" data-acc="' + row.nominal_acc + '" data-trb="' + row
                                        .terbilang + '" data-kp="' + row.keterangan_permohonan +
                                        '"><i class="ki ki-plus text-danger btn btn-icon btn-light-danger item-ubah-pembayarankas"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                        row.id_permohonan +
                                        '"></a>';


                                } else {
                                    return '<a class="dropdown-item item-edit-pembayarankas" href="#" data-id="' +
                                        row.id + '" data-ip="' +
                                        row.id_permohonan + '" data-nm="' + row.name +
                                        '" data-jbt="' + row.jabatan + '" data-dvs="' + row.divisi +
                                        '" data-acc="' + row.nominal_acc + '" data-trb="' + row
                                        .terbilang + '" data-kp="' + row.keterangan_permohonan +
                                        '"><i class="fas fa-edit btn btn-icon btn-light-primary item-edit-pembayarankas"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                        row.id_permohonan +
                                        '"></a>';
                                }
                            },
                            padding: '5px',
                        }
                    ],
                });
            }
            // end of get

            function getmax() {

                $.get("{{ url('/pembayaran-kas/getmax2') }}", {
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(data) {
                        var total = parseInt(data) + 1;
                        $("#no_resi_bayar_kas").val(total);
                    });
            }

            function getdatapembayaranid(id_permohonan) {

                $.post("{{ route('pembayarankas.getid') }}", {
                        _token: "{{ csrf_token() }}",
                        id_permohonan: id_permohonan
                    })
                    .done(function(data) {
                        $("#id_permohonan_edit").val(data.id_permohonan);
                        $("#no_resi_bayar_kas_edit").val(data.no_resi_bayar_kas);
                        $("#tanggal_pembayaran_kas_edit").val(data.tanggal_pembayaran_kas);
                        $("#file_edit").val(data.bukti_transaksi);
                        // alert(data.no_resi_bayar_kas);
                    });
            }

            // edit nota
            $('#table-pembayarankas').on('click', '.item-edit-pembayarankas', function() {
                var id_permohonan = $(this).data('ip');
                var name = $(this).data('nm');
                var jabatan = $(this).data('jbt');
                var divisi = $(this).data('dvs');
                var acc = $(this).data(uang('acc'));
                var keterangan = $(this).data('kp');
                var terbilang = $(this).data('trb');
                var bukti_transaksi = $(this).data('bkt');

                // $('#id_pembayaran_kas').val(id_pembayaran_kas);
                $('#id_permohonan').val(id_permohonan);
                $('#id').val(id);
                $('#name_edit').val(name);
                $('#jabatan_edit').val(jabatan);
                $('#divisi_edit').val(divisi);
                if (acc == null) {
                    $('#nominal_acc_edit').val('0');
                } else {
                    $('#nominal_acc_edit').val(uang(acc));
                }
                $('#keterangan_permohonan_edit').val(keterangan);
                $('#terbilang_edit').val(terbilang);
                $('#bukti_transaksi_edit').val(bukti_transaksi);


                getdatapembayaranid(id_permohonan);


                $('.modal-edit-pembayarankas').modal('show');
            });
            // end of 

            // uang
            $('#nominal_acc').change(function() {
                var acc = $('#nominal_acc').val();
                $('#nominal_acc').val(uang(acc));
            });
            // end of uang

            // upload nota
            $('#table-pembayarankas').on('click', '.item-ubah-pembayarankas', function() {
                getmax();

                // var id_pembayaran_kas = $(this).data('ipk');
                var id = $(this).data('id');
                var id_permohonan = $(this).data('ip');
                var name = $(this).data('nm');
                var jabatan = $(this).data('jbt');
                var divisi = $(this).data('dvs');
                var acc = $(this).data(uang('acc'));
                var keterangan = $(this).data('kp');
                var terbilang = $(this).data('trb');
                var bukti_transaksi = $(this).data('bkt');

                // $('#id_pembayaran_kas').val(id_pembayaran_kas);
                $('#id_permohonan').val(id_permohonan);
                $('#id').val(id);
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
                $('#bukti_transaksi').val(bukti_transaksi);

                $('.modal-ubah-pembayarankas').modal('show');
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

    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $.ajaxSetup({
                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function updateid(filename, no_resi_bayar_kas, id_permohonan, tanggal_pembayaran_kas) {

                $.post("{{ route('pembayarankas.ubahid') }}", {
                    _token: "{{ csrf_token() }}",
                    id_permohonan: id_permohonan,
                    no_resi_bayar_kas: no_resi_bayar_kas,
                    tanggal_pembayaran_kas: tanggal_pembayaran_kas,
                    bukti_transaksi: filename

                }).done(function(response) {

                    if (response.message == "success") {
                        Swal.fire(
                            'Terpload!',
                            'Bukti Transaksi Berhasil Di Edit.',
                            'success'
                        )
                        location.reload()

                        $(".item-ubah").attr("disabled", false);

                        $('#id_permohonan').val('');

                        $('#modalubah').modal('hide');

                    } else {
                        Swal.fire(
                            'Tidak Disetujui!',
                            'Permohonan Dana Tidak Di setujui.',
                            'error'
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
                    url: "{{ route('pembayarankas.uploadid') }}",
                    data: formData,
                    contentType: false,
                    processData: false,

                    success: (response) => {

                        if (response) {
                            this.reset();
                            update(response.filename, response.no_resi_bayar_kas, response.id_permohonan, response.tanggal_pembayaran_kas);

                            // alert(response.id_permohonan);
                            alert('File has been uploaded successfully');
                        }

                    },

                    error: function(response) {
                        $('#file-input-error').text(response.responseJSON.message);
                    }

                });

            });


            function update(filename, no_resi_bayar_kas, id_permohonan, tanggal_pembayaran_kas) {


                $.post("{{ route('pembayarankas.ubah') }}", {
                    _token: "{{ csrf_token() }}",
                    id_permohonan: id_permohonan,
                    no_resi_bayar_kas: no_resi_bayar_kas,
                    tanggal_pembayaran_kas: tanggal_pembayaran_kas,
                    bukti_transaksi: filename

                }).done(function(response) {

                    if (response.message == "success") {
                        Swal.fire(
                            'Disetujui!',
                            'Permohonan Dana Di setujui.',
                            'success'
                        )
                        location.reload()

                        $(".item-ubah").attr("disabled", false);

                        $('#id_permohonan').val('');

                        $('#modalubah').modal('hide');

                    } else {
                        Swal.fire(
                            'Tidak Disetujui!',
                            'Permohonan Dana Tidak Di setujui.',
                            'error'
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
                    url: "{{ route('pembayarankas.upload') }}",
                    data: formData,
                    contentType: false,
                    processData: false,

                    success: (response) => {

                        if (response) {
                            // this.reset();
                            // update(response.filename, response.no_resi_bayar_kas, response.id_permohonan, response.tanggal_pembayaran_kas);

                            alert(response.id_permohonan);
                            // alert('File has been uploaded successfully');
                        }

                    },

                    error: function(response) {
                        $('#file-input-error').text(response.responseJSON.message);
                    }

                });

            });
        });
    </script>
@endsection
