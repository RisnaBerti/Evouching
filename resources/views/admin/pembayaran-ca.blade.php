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
                                            <input type="text" name="id_permohonan" id="id_permohonan">
                                            <input type="text" name="id" id="id">
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
                                            <input type="file" name="file" id="inputFile" class="form-control">
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
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Divisi</th>
                        <th>Total Mominal ACC</th>
                        <th>Periode</th>
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

                                return '<span class="badge badge-pill  badge-primary">' + row.periode_ca + '</span>';

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
                                if (row.bukti_transaksi == '0') {
                                    return '<a class="dropdown-item item-ubah-pembayaran-ca" href="#" data-id="' +
                                        row.id + '" data-ip="' +
                                        row.id_permohonan + '" data-nm="' + row.name +
                                        '" data-jbt="' + row.jabatan + '" data-dvs="' + row.divisi +
                                        '" data-acc="' + row.nominal_acc + '" data-trb="' + row
                                        .terbilang + '" data-kp="' + row.keterangan_permohonan +
                                        '"><i class="ki ki-plus  text-danger btn btn-icon btn-light-danger item-ubah-pembayaran-ca"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                        row.id_permohonan +
                                        '"><span class="badge bg-danger">Belum Di Unggah</span></a>';


                                } else {
                                    return '<a class="dropdown-item item-ubah-pembayaran-ca" href="#" data-id="' +
                                        row.id + '" data-ip="' +
                                        row.id_permohonan + '" data-nm="' + row.name +
                                        '" data-jbt="' + row.jabatan + '" data-dvs="' + row.divisi +
                                        '" data-acc="' + row.nominal_acc + '" data-trb="' + row
                                        .terbilang + '" data-kp="' + row.keterangan_permohonan +
                                        '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah-pembayaran-ca"></i></a> <span class="badge bg-success">Bukti Telah Di Unggah</span>';

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
            // end of uang

            // ubah
            $('#table-pembayaranca').on('click', '.item-ubah-pembayaran-ca', function() {

                // console.log('ubah');

                getmax();

                // var id_penerimaan_kas = $(this).data('ipk');
                var id = $(this).data('id');
                var id_permohonan = $(this).data('ip');
                var name = $(this).data('nm');
                var jabatan = $(this).data('jbt');
                var divisi = $(this).data('dvs');
                var acc = $(this).data(uang('acc'));
                var keterangan = $(this).data('kp');
                var terbilang = $(this).data('trb');
                var bukti_transaksi = $(this).data('bkt');

                // $('#id_penerimaan_kas').val(id_penerimaan_kas);
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
            // end of ubah

            // $(".save-pembayaran-kas").click(function() {

            //     var id_permohonan = $('#id_permohonan').val();
            //     var bukti_transaksi = $('#bukti_transaksi').val();
            //     // var status_permohonan = $('#status_permohonan').val();
            //     // var jenis_dana = $('#jenis_dana').val();

            //     $('.save-pembayaran-kas').attr("disabled", "disabled");

            //     if (!id_permohonan) {

            //         alert("ID User tidak terdefinisi!");

            //         $('.save-pembayaran-kas').attr("disabled", false);

            //     } else {

            //         $.post("{{ url('/permohonan-bendahara/edit') }}", {
            //             _token: "{{ csrf_token() }}",
            //             id_permohonan: id_permohonan,
            //             nominal_acc: nominal_acc,
            //             status_permohonan: status_permohonan,
            //             jenis_dana: jenis_dana

            //         }).done(function(response) {

            //             if (response == "success") {
            //                 Swal.fire(
            //                     'Disetujui!',
            //                     'Permohonan Dana Di setujui.',
            //                     'success'
            //                 )
            //                 location.reload()

            //                 // get();

            //                 $(".item-ubah").attr("disabled", false);

            //                 $('#id_permohonan').val('');
            //                 $('#name').val('');
            //                 $('#no_resi_ajuan').val('');
            //                 $('#tanggal_permohonan').val('');
            //                 $('#harga_satuan').val('');
            //                 $('#jumlah_satuan').val('');
            //                 $('#total_dana_ajuan').val('');
            //                 $('#nominal_acc').val('');
            //                 $('#jenis_dana').val('');
            //                 $('#keterangan_permohonan').val('');

            //                 $('#modalubah').modal('hide');

            //             } else {
            //                 Swal.fire(
            //                     'Tidak Disetujui!',
            //                     'Permohonan Dana Tidak Di setujui.',
            //                     'error'
            //                 )
            //                 location.reload()

            //                 $(".item-ubah").attr("disabled", false);

            //             }

            //         });

            //     }

            // });

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


        function update(filename, no_resi_bayar_kas, id_permohonan) {

            var tanggal_penerimaan_ca = $('#tanggal_penerimaan_ca').val();

            $.post("{{ route('pembayarankas.ubah') }}", {
                _token: "{{ csrf_token() }}",
                id_permohonan: id_permohonan,
                no_resi_ca:  no_resi_ca,
                tanggal_penerimaan_ca: tanggal_penerimaan_ca,
                bukti_transaksi: filename


            }).done(function(response) {

                if (response == "success") {
                    Swal.fire(
                        'Disetujui!',
                        'Permohonan Dana Di setujui.',
                        'success'
                    )
                    location.reload()

                    // get();

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
                        this.reset();
                        update(response.filename, response.no_resi_bayar_kas, response.id_permohonan);

                        alert('File has been uploaded successfully');

                    }

                },

                error: function(response) {

                    $('#file-input-error').text(response.responseJSON.message);

                }

            });

        });
    </script>
@endsection
