@extends('layouts.main-bendahara')

@section('content')
    <!-- Modal -->
    <div class="modal fade modal-ubah-pembayarankas" id="staticBackdrop" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <!--begin::Form-->
                        {{-- <form class="form" id="form_ubah"> --}}
                        <form method="POST" action="{{ url('/pembayaran-kas/edit') }}" id="form_edit_penerimaankas"
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
                                            <input readonly type="text" class="form-control" id="no_resi_bayar_kas"
                                                name="no_resi_bayar_kas" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                                            </div>
                                            <input type="date" value="{{ date('d-m-Y') }}" class="form-control"
                                                id="tanggal_pembayaran_kas" name=" tanggal_pembayaran_kas"
                                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Dibayarkan Kepada</label>
                                        <input type="text" class="form-control" placeholder="Nama Legkap" id="name"
                                            name="name" readonly disabled />
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
                                        <input type="text" class="form-control" placeholder="Terbilang" id="terbilang"
                                            name="terbilang" />
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
                                            <input type="file" class="custom-file-input" name="file" id="inputFile" />
                                            <label class="custom-file-label" for="inputFile">Choose file</label>
                                        </div>
                                        <span class="form-text text-muted">File wajib scan</span>
                                    </div>
                                </div>

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary mr-2 save-pembayaran-kas">Submit</button>
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

                        // {
                        //     "render": function(data, type, row) {

                        //         if (row.status == '1') 
                        //         {
                        //         return '<span class="badge bg-success">Bukti Telah Di Unggah</span>';

                        //         } else if (row.status =='0') {

                        //             return '<span class="badge bg-warning text-dark">Bukti Belum Di Unggah</span>';

                        //         }

                        //     },
                        //     padding: '5px'
                        // },

                        {
                            "render": function(data, type, row) {

                                if (row.bukti_transaksi == null) {
                                    return '<a class="dropdown-item item-ubah-pembayarankas" href="#" data-ip="' +
                                        row.id_permohonan + '" data-nm="' + row.name +
                                        '" data-jbt="' +
                                        row.jabatan + '" data-dvs="' + row.divisi + '" data-acc="' +
                                        row
                                        .nominal_acc + '" data-trb="' + row.terbilang +
                                        '" data-kp="' +
                                        row.keterangan_permohonan +
                                        '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah-pembayarankas"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                        row.id_permohonan +
                                        '"><span class="badge bg-danger">Belum Di Unggah</span></a>';
                                } else {
                                    return '<a class="dropdown-item item-ubah-pembayarankas" href="#" data-ip="' +
                                        row.id_permohonan + '" data-nm="' + row.name +
                                        '" data-jbt="' +
                                        row.jabatan + '" data-dvs="' + row.divisi + '" data-acc="' +
                                        row
                                        .nominal_acc + '" data-trb="' + row.terbilang +
                                        '" data-kp="' +
                                        row.keterangan_permohonan +
                                        '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah-pembayarankas"></i></a> <span class="badge bg-success">Bukti Telah Di Unggah</span>';
                                }
                                // return '<a class="dropdown-item item-ubah-pembayarankas" href="#" data-ip="' +
                                //     row.id_permohonan + '" data-nm="' + row.name + '" data-jbt="' +
                                //     row.jabatan + '" data-dvs="' + row.divisi + '" data-acc="' + row
                                //     .nominal_acc + '" data-trb="' + row.terbilang + '" data-kp="' +
                                //     row.keterangan_permohonan + '" data-st="' +
                                //     row.status +
                                //     '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah-pembayarankas"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                //     row.id_permohonan +
                                //     '"><span class="badge bg-success">Bukti Telah Di Unggah</span></a>'
                            },
                            padding: '5px',
                        }
                    ],
                });
            }
            // end of get

            // uang
            $('#nominal_acc').change(function() {
                var acc = $('#nominal_acc').val();
                $('#nominal_acc').val(uang(acc));
            });
            // end of uang

            // ubah
            $('#table-pembayarankas').on('click', '.item-ubah-pembayarankas', function() {
                console.log('Jalan gak sih');
                // var id_penerimaan_kas = $(this).data('ipk');
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
            //                 $('#total_harga').val('');
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
@endsection
