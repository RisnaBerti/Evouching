@extends('layouts.main-bendahara')
@section('content')
    <!-- Modal -->
    <div class="modal fade modal-ubah-permohonan" id="staticBackdrop modal-ubah-permohonan" data-backdrop="static"
        data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <!--begin::Form-->
                        <form class="form" id="form_ubah">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7 align-self-start">
                                        <div class="col">
                                            <h3 class="card-title">
                                                PENGAJUAN PERMOHONAN DANA
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="col-5 align-items-start">
                                        <input hidden type="text" id="id">
                                        <div hidden class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">No.
                                                    Formulir:</span>
                                            </div>
                                            <input readonly disabled type="text" class="form-control text-right"
                                                id="id_permohonan" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                                    Ajuan:</span>
                                            </div>
                                            <input readonly disabled type="text" class="form-control text-right"
                                                id="no_resi_ajuan" aria-label="Sizing example input"
                                                aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                                            </div>
                                            <input readonly disabled type="date" value="{{ date('d-m-Y') }}"
                                                class="form-control text-right" id="tanggal_permohonan"
                                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        </div>
                                        <div class="input-group input-group-sm mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroup-sizing-sm">Jenis Dana:</span>
                                            </div>
                                            <select class="form-control jenis_dana text-right" id="jenis_dana">
                                                <option>Penerimaan Kas</option>
                                                <option>Pembayaran Kas</option>
                                                <option>Penerimaan Bank</option>
                                                <option>Pembayaran Bank</option>
                                                <option>Chartered Accountant</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row row-cols-3">
                                    <div class="input-group input-group-sm mb-3 p-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Nama</span>
                                        </div>
                                        <input readonly disabled type="text" class="form-control" id="name"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <div class="input-group input-group-sm mb-3 p-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Jabatan</span>
                                        </div>
                                        <input readonly disabled type="text" class="form-control" id="jabatan"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <div class="input-group input-group-sm mb-3 p-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Divisi</span>
                                        </div>
                                        <input readonly disabled type="text" class="form-control" id="divisi"
                                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label>Nama Perkiraan</label>
                                        <input type="text" class="form-control" placeholder="Nama Legkap"
                                            id="nama_perkiraan" readonly disabled />
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Harga Satuan</label>
                                        <input type="text" class="form-control" placeholder="Harga Satuan"
                                            id="harga_satuan" readonly disabled />
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Jumlah</label>
                                        <input type="text" class="form-control" placeholder="Jumlah" id="jumlah_satuan"
                                            readonly disabled />
                                    </div>
                                    <div class="col-lg-3">
                                        <label>Total</label>
                                        <input type="text" class="form-control" placeholder="Total"
                                            id="total_dana_ajuan" readonly disabled />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label>Nominal ACC</label>
                                        <input type="text" class="form-control" placeholder="Nominal Uang Acc"
                                            id="nominal_acc" />
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Keterangan</label>
                                        <textarea readonly class="form-control" placeholder="Keterangan" id="keterangan_permohonan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label>Terbilang</label>
                                        <input type="text" class="form-control" placeholder="Terbilang"
                                            id="terbilang" readonly disabled />
                                    </div>
                                    <input type="text" id="status_permohonan" hidden>
                                    <input type="text" id="ttd_bendahara" hidden>
                                </div>
                            </div>
                            <!--end::Form-->
                    </div>
                    <!--end::Card-->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary mr-2 button-menyetujui">Menyetujui</button>
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
            <table class="table table-bordered" id="table-permohonan" style="margin-top: 13px !important">
                <thead>
                    <tr>
                        <th>No</th>
                        <th hidden>id</th>
                        <th>Nama perkiraan</th>
                        <th>No Resi</th>
                        <th>Tanggal</th>
                        <th>Harga</th>
                        <th>Jumlah Satuan</th>
                        <th>Total Harga</th>
                        <th>Nominal Acc</th>
                        <th>Keterangan</th>
                        <th>Status</th>
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
        const ubahform = async () => {
            $('#form_ubah')[0].reset()
            $('#modal_user').modal('show')
        }



        $(document).ready(function() {
            //fungsi menampilkan data permohonan
            get();

            // $('#table-permohonan').DataTable({
            //     scrollY: 200,
            //     scrollX: true,
            // });

            function get() {
                $('#table-permohonan').DataTable({
                    "destroy": true,
                    "processing": true,
                    "ordering": true,
                    "scrollY": true,
                    "scrollX": true,
                    "pageLength": 10,
                    "ajax": {
                        url: "{{ url('/permohonan-bendahara/get') }}",
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

                                return '<span class="badge badge-pill  badge-primary">' + row
                                    .no_resi_ajuan + '</span>';

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return row.tanggal_permohonan;

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return 'Rp ' + String(uang(row.harga_satuan));

                            },
                            padding: '5px'
                        },
                        {
                            "render": function(data, type, row) {

                                return String(uang(row.jumlah_satuan));

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return String(uang(row.total_dana_ajuan));

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

                                if (row.ttd_bendahara == 1) {

                                    return '<span class="badge bg-success">DI SETUJUI</span>';

                                } else if (row.ttd_bendahara == 0) {

                                    return '<span class="badge bg-warning text-dark">BELUM DI SETUJUI </span>';

                                } else {

                                    return '<span class="badge bg-danger">Ditolak</span>';

                                }

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {
                                if (row.ttd_bendahara == '0') {
                                    return '<a class="dropdown-item item-ubah-permohonan" href="#" data-id="' +
                                        row.id + '" data-ip="' +
                                        row.id_permohonan + '" data-nama="' + row.name +
                                        '" data-jbt="' + row.jabatan + '" data-dvs="' + row.divisi +
                                        '" data-nra="' + row.no_resi_ajuan + '"  data-tp="' + row
                                        .tanggal_permohonan +
                                        '" data-hrg="' + row.harga_satuan + '" data-jml="' + row
                                        .jumlah_satuan + '" data-ttl="' + row.total_dana_ajuan +
                                        '" data-acc="' + row.nominal_acc + '" data-kp="' + row
                                        .keterangan_permohonan + '" data-trb="' + row.terbilang +
                                        '" data-st="' + row.status_permohonan +
                                        '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah"></i></a> '
                                } else {
                                    return '<span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Done-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"> <g stroke = "none"stroke - width = "1" fill = "none" fill - rule = "evenodd"> <rect x = "0" y = "0" width = "24" height = "24" /> <circle fill = "#000000" opacity = "0.3" cx = "12" cy = "12" r = "10" /> <path d ="M16.7689447,7.81768175 C17.1457787,7.41393107 17.7785676,7.39211077 18.1823183,7.76894473 C18.5860689,8.1457787 18.6078892,8.77856757 18.2310553,9.18231825 L11.2310553,16.6823183 C10.8654446,17.0740439 10.2560456,17.107974 9.84920863,16.7592566 L6.34920863,13.7592566 C5.92988278,13.3998345 5.88132125,12.7685345 6.2407434,12.3492086 C6.60016555,11.9298828 7.23146553,11.8813212 7.65079137,12.2407434 L10.4229928,14.616916 L16.7689447,7.81768175 Z" fill = "#000000" fill - rule = "nonzero" / > </g> </svg><!--end::Svg Icon--></span >'
                                }

                            },
                            padding: '5px',
                        }
                    ],
                });

            }

            $('#nominal_acc').change(function() {
                var acc = $('#nominal_acc').val();
                $('#nominal_acc').val(uang(acc));
            });

            $('#table-permohonan').on('click', '.item-ubah-permohonan', function() {

                var id_permohonan = $(this).data('ip');
                var id = $(this).data('id');
                var name = $(this).data('nama');
                var jabatan = $(this).data('jbt');
                var divisi = $(this).data('dvs');
                var resi = $(this).data('nra');
                var tanggal = $(this).data('tp');
                var harga = $(this).data('hrg');
                var jumlah = $(this).data('jml');
                var total = $(this).data('ttl');
                var acc = $(this).data(uang('acc'));
                var keterangan = $(this).data('kp');
                var terbilang = $(this).data('trb');
                var status = $(this).data('st');

                $('#id_permohonan').val(id_permohonan);
                $('#id').val(id);
                $('#name').val(name);
                $('#jabatan').val(jabatan);
                $('#divisi').val(divisi);
                $('#nama_perkiraan').val(name);
                $('#no_resi_ajuan').val(resi);
                $('#tanggal_permohonan').val(tanggal);
                $('#harga_satuan').val(harga);
                $('#jumlah_satuan').val(jumlah);
                $('#total_dana_ajuan').val(total);
                $('#nominal_acc').val(uang(acc));
                $('#keterangan_permohonan').val(keterangan);
                $('#terbilang').val(terbilang);
                $('#status_permohonan').val(status);

                $('.modal-ubah-permohonan').modal('show');
            });

            $(".button-menyetujui").click(function() {

                var id_permohonan = $('#id_permohonan').val();
                var id = $('#id').val();
                var nominal_acc = $('#nominal_acc').val();
                var status_permohonan = $('#status_permohonan').val();
                var jenis_dana = $('#jenis_dana').val();

                $('.button-menyetujui').attr("disabled", "disabled");

                if (!id_permohonan) {

                    alert("ID User tidak terdefinisi!");

                    $('.button-menyetujui').attr("disabled", false);

                } else {

                    $.post("{{ url('/permohonan-bendahara/edit') }}", {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        id_permohonan: id_permohonan,
                        nominal_acc: nominal_acc,
                        status_permohonan: status_permohonan,
                        jenis_dana: jenis_dana

                    }).done(function(response) {

                        if (response == "success") {
                            Swal.fire(
                                'Disetujui!',
                                'Permohonan Dana Di setujui.',
                                'success'
                            )
                            location.reload()

                            get();

                            $(".item-ubah").attr("disabled", false);

                            $('#id_permohonan').val('');
                            $('#id').val('');
                            $('#name').val('');
                            $('#no_resi_ajuan').val('');
                            $('#tanggal_permohonan').val('');
                            $('#harga_satuan').val('');
                            $('#jumlah_satuan').val('');
                            $('#total_dana_ajuan').val('');
                            $('#nominal_acc').val('');
                            $('#jenis_dana').val('');
                            $('#keterangan_permohonan').val('');

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
