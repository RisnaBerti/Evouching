@extends('layouts.main-bendahara')

@section('content')
    <!-- Modal -->
    <div class="modal fade modal-ubah" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <!--begin::Card-->
                    <div class="card card-custom gutter-b example example-compact">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-7 align-self-start">
                                    <div class="col">
                                        <h3 class="card-title">
                                            BUKTI PEMBAYARAN ANTAR BANK
                                        </h3>
                                    </div>
                                </div>
                                <div class="col-5 align-items-start">
                                    <input hidden type="text" id="id_pembayaran_antar_bank_edit">
                                    <div class="input-group input-group-sm mb-1">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                                Bayar:</span>
                                        </div>
                                        <input readonly type="text" class="form-control"
                                            id="no_resi_pembayaran_antar_bank_edit"
                                            name="no_resi_pembayaran_antar_bank_edit" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                    <div class="input-group input-group-sm mb-5">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                                        </div>
                                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control"
                                            id="tanggal_pembayaran_antar_bank_edit"
                                            name="tanggal_pembayaran_antar_bank_edit" aria-label="Sizing example input"
                                            aria-describedby="inputGroup-sizing-sm">
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Dibayarkan Kepada</label>
                                    <input type="text" class="form-control" placeholder="Nama Legkap" id="name"
                                        name="name" Value="Mutasi Antar Bank" readonly disabled />
                                </div>
                                <div class="col-lg-4">
                                    <label>Jabatan</label>
                                    <input type="text" class="form-control" placeholder="Jabatan" id="jabatan"
                                        name="jabatan" value="{{ Auth::user()->jabatan }}" readonly disabled />
                                </div>
                                <div class="col-lg-4">
                                    <label>Divisi / Departemen</label>
                                    <input type="text" class="form-control" placeholder="Divisi" id="divisi"
                                        name="divisi" value="{{ Auth::user()->divisi }}" readonly disabled />
                                </div>
                            </div>


                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Total Taksiran</label>
                                    <input type="text" class="form-control" placeholder="Total" id="total_dana_edit"
                                        name="total_dana_edit" />
                                </div>
                                <div class="col-lg-6">
                                    <label>Terbilang</label>
                                    <input type="text" class="form-control" placeholder="Terbilang" id="terbilang_edit"
                                        name="terbilang_edit" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Untuk Keperluan</label>
                                    <textarea class="form-control" id="keperluan_edit" name="keperluan_edit" rows="4"></textarea>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary mr-2 ubah">Simpan</button>
                        </div>
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Modal body-->
            </div>
        </div>
    </div>
    <!--end::Modal-->

    <div class="modal" id="modal-hapus" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                {{-- <form id="form_user" action="/datauser/delete" method="POST"> --}}
                {{-- @csrf --}}
                <div class="modal-body">
                    <input hidden type="text" id="id_pembayaran_antar_bank" name="id_pembayaran_antar_bank">
                    Data Pembayaran Antar Bank yang anda pilih akan dihapus tekan konfirmasi, untuk mengahapus.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary hapus">Ya</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
                {{-- </form> --}}

            </div>
        </div>
    </div>

    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Form-->
        {{-- <form method="POST" action="{{ url('/pembayaran-bank/edit') }}" id="form_edit_pembayarankas" enctype="multipart/form-data">
        @csrf --}}
        <div class="card-body">
            <div class="row">
                <div class="col-7 align-self-start">
                    <div class="col">
                        <h3 class="card-title">
                            BUKTI PEMBAYARAN ANTAR BANK
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
                        <input readonly type="text" class="form-control" id="no_resi_pembayaran_antar_bank"
                            name="no_resi_pembayaran_antar_bank" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-5">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                        </div>
                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control"
                            id="tanggal_pembayaran_antar_bank" name="tanggal_pembayaran_antar_bank"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Dibayarkan Kepada</label>
                    <input type="text" class="form-control" placeholder="Nama Legkap" id="name" name="name"
                        Value="Mutasi Antar Bank" readonly disabled />
                </div>
                <div class="col-lg-4">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" placeholder="Jabatan" id="jabatan" name="jabatan"
                        value="{{ Auth::user()->jabatan }}" readonly disabled />
                </div>
                <div class="col-lg-4">
                    <label>Divisi / Departemen</label>
                    <input type="text" class="form-control" placeholder="Divisi" id="divisi" name="divisi"
                        value="{{ Auth::user()->divisi }}" readonly disabled />
                </div>
            </div>


            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Total Taksiran</label>
                    <input type="text" class="form-control" placeholder="Total" id="total_dana" name="total_dana" />
                </div>
                <div class="col-lg-6">
                    <label>Terbilang</label>
                    <input readonly type="text" class="form-control" placeholder="Terbilang" id="terbilang"
                        name="terbilang" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Untuk Keperluan</label>
                    <textarea class="form-control" id="keperluan" name="keperluan" rows="4"></textarea>
                </div>
                <input hidden type="text" id="sisa_saldo" name="sisa_saldo" value="0">
                <input hidden type="text" id="bulan" name="bulan" value="{{ date('m') }}">
                <input hidden type="text" id="tahun" name="tahun" value="{{ date('Y') }}">
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-primary mr-2 simpan">Simpan</button>
        </div>
        {{-- </form> --}}
        <!--end::Form-->
    </div>
    <!--end::Card-->

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
                <h3 class="card-label">Pembayaran Antar Bank</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered display nowrap table-antarbank" id="table-antarbank"
                style="width:100%; margin-top: 13px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th hidden>id_pembayaran_antar_bank</th>
                        <th>Tanggal</th>
                        <th>Total Saldo</th>
                        <th>Keterangan</th>
                        <th>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
            </table>
            <!--end: Datatable-->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            getmax();
            get();

            $('#total_dana').change(function() {
                var total_dana = $('#total_dana').val();
                $('#total_dana').val(uang(total_dana));
                $('#terbilang').val(terbilang(total_dana));
            });

            $(".simpan").click(function() {
                simpandata();
            });

            $('#table-antarbank').on('click', '.item-ubah', function() {
                // getmax();
                // var id_pembayaran_kas = $(this).data('ipk');
                var id_pembayaran_antar_bank = $(this).data('ip');
                var no_resi_pembayaran_antar_bank = $(this).data('resi');
                var tanggal_pembayaran_antar_bank = $(this).data('tgl');
                var total_dana = $(this).data('ttl');
                var keperluan = $(this).data('kprl');
                var terbilang = $(this).data('trb');

                // $('#id_pembayaran_kas').val(id_pembayaran_kas);
                $('#id_pembayaran_antar_bank_edit').val(id_pembayaran_antar_bank);
                $('#no_resi_pembayaran_antar_bank_edit').val(no_resi_pembayaran_antar_bank);
                $('#tanggal_pembayaran_antar_bank_edit').val(tanggal_pembayaran_antar_bank);
                $('#total_dana_edit').val(total_dana);
                $('#keperluan_edit').val(keperluan);
                $('#terbilang_edit').val(terbilang);

                $('.modal-ubah').modal('show');
            });

            //edit data
            // $(".ubah").click(function() {
            //     // ubahdata();
            // });

            $(".ubah").click(function() {

                var id_pembayaran_antar_bank = $('#id_pembayaran_antar_bank_edit').val();
                var no_resi_pembayaran_antar_bank = $('#no_resi_pembayaran_antar_bank_edit').val();
                var tanggal_pembayaran_antar_bank = $('#tanggal_pembayaran_antar_bank_edit').val();
                var total_dana = $('#total_dana_edit').val();
                var keperluan = $('#keperluan_edit').val();
                var terbilang = $('#terbilang_edit').val();

                $('.ubah').attr("disabled", "disabled");

                if (!id_pembayaran_antar_bank) {

                    alert("ID User tidak terdefinisi!");

                    $('.ubah').attr("disabled", false);

                } else {

                    $.post("{{ url('/pembayaran-antarbank/edit') }}", {
                        _token: "{{ csrf_token() }}",
                        id_pembayaran_antar_bank_edit: id_pembayaran_antar_bank,
                        no_resi_pembayaran_antar_bank_edit: no_resi_pembayaran_antar_bank,
                        tanggal_pembayaran_antar_bank_edit: tanggal_pembayaran_antar_bank,
                        total_dana_edit: total_dana,
                        keperluan_edit: keperluan,
                        terbilang_edit: terbilang

                    }).done(function(response) {

                        if (response == "success") {
                            Swal.fire(
                                'Ubah Data!',
                                'Data berhasil diubah.',
                                'success'
                            )
                            location.reload()

                            // get();

                            $(".ubah").attr("disabled", false);

                            $('#id_pembayaran_antar_bank_edit').val('');
                            $('#no_resi_pembayaran_antar_bank_edit').val('');
                            $('#tanggal_pembayaran_antar_bank_edit').val('');
                            $('#total_dana_edit').val('');
                            $('#keperluan_edit').val('');
                            $('#terbilang_edit').val('');

                            $('#modal-ubah').modal('hide');

                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'User gagal diubah',
                                text: 'User gagal diubah.',
                                showCancelButton: false,
                                confirmButtonColor: '#FF6347',
                                confirmButtonText: 'Siap',
                            })

                            $(".ubah").attr("disabled", false);

                        }

                    });

                }

            });

            $(".hapus").click(function() {

                var id_pembayaran_antar_bank = $('#id_pembayaran_antar_bank').val();


                $.post("{{ url('/pembayaran-antarbank/delete') }}", {
                    _token: "{{ csrf_token() }}",
                    id_pembayaran_antar_bank: id_pembayaran_antar_bank

                }).done(function(response) {

                    if (response == "success") {
                        Swal.fire(
                            'Ubah Data!',
                            'Data berhasil diubah.',
                            'success'
                        )
                        location.reload()

                        // get();

                        $(".hapus").attr("disabled", false);

                        $('#id_pembayaran_antar_bank').val('');


                        $('#modal-hapus').modal('hide');

                    } else {

                        Swal.fire({
                            icon: 'error',
                            title: 'User gagal diubah',
                            text: 'User gagal diubah.',
                            showCancelButton: false,
                            confirmButtonColor: '#FF6347',
                            confirmButtonText: 'Siap',
                        })

                        $(".hapus").attr("disabled", false);

                    }

                });

            });

            //hapus data
            $('#table-antarbank').on('click', '.item-hapus', function() {

                var id_pembayaran_antar_bank = $(this).data('ip');

                $('#id_pembayaran_antar_bank').val(id_pembayaran_antar_bank);

                $('#modal-hapus').modal('show');
                //alert(id_pembayaran_antar_bank);

            });

            function getmax() {
                $.get("{{ url('/pembayaran-antarbank/getmax') }}", {
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(data) {
                        var total = parseInt(data) + 1;
                        $("#no_resi_pembayaran_antar_bank").val(total);
                    });
            }

            function get() {
                $('#table-antarbank').DataTable({

                    "destroy": true,
                    "processing": true,
                    "ordering": true,
                    "scrollX": true,
                    "pageLength": 10,
                    "ajax": {

                        url: "{{ url('/pembayaran-antarbank/get') }}",
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

                                return String(row.id_pembayaran_antar_bank);

                            },
                            padding: '5px',
                            visible: false
                        },

                        {
                            "render": function(data, type, row) {

                                return String(row.tanggal_pembayaran_antar_bank);

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return String(uang(row.total_dana));

                            },
                            padding: '5px'
                        },
                        {
                            "render": function(data, type, row) {

                                return row.keperluan;

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return '<a class="dropdown-item item-ubah" href="#" data-ip="' +
                                    row.id_pembayaran_antar_bank + '" data-resi="' + row
                                    .no_resi_pembayaran_antar_bank + '" data-tgl="' + row
                                    .tanggal_pembayaran_antar_bank + '" data-ttl="' +
                                    row.total_dana + '" data-trbl="' + row.terbilang +
                                    '" data-trb="' + row.terbilang + '" data-kprl="' +
                                    row.keperluan +
                                    '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah"></i></a> <a class="dropdown-item item-hapus" href="#" data-ip="' +
                                    row.id_pembayaran_antar_bank +
                                    '"><i class="far fa-trash-alt btn btn-icon btn-light-danger"></i></a>';
                            },
                            padding: '5px',
                        }
                    ],
                });
            }

            function simpandata() {

                var no_resi_pembayaran_antar_bank = $('#no_resi_pembayaran_antar_bank').val();
                var tanggal_pembayaran_antar_bank = $('#tanggal_pembayaran_antar_bank').val();
                var total_dana = $('#total_dana').val().replace(/\,/g, '');
                var terbilang = $('#terbilang').val();
                var keperluan = $('#keperluan').val();
                var sisa_saldo = $('#sisa_saldo').val();
                var bulan = $('#bulan').val();
                var tahun = $('#tahun').val();

                $.post("{{ url('/pembayaran-antarbank/add') }}", {
                    _token: "{{ csrf_token() }}",
                    no_resi_pembayaran_antar_bank: no_resi_pembayaran_antar_bank,
                    tanggal_pembayaran_antar_bank: tanggal_pembayaran_antar_bank,
                    total_dana: total_dana.replace(",", ""),
                    terbilang: terbilang,
                    keperluan: keperluan,
                    sisa_saldo: sisa_saldo.replace(",", ""),
                    bulan: bulan,
                    tahun: tahun
                }).done(function(response) {
                    if (response != null) {

                        Swal.fire(
                            'Data Ditambahkan!',
                            'Data Antar Bank Berhasil Ditambahkan.',
                            'success'
                        )
                        location.reload()
                        getmax();

                        $(".simpan").attr("disabled", false);

                        $('#id').val('');
                        $('#no_resi_pembayaran_antar_bank').val('');
                        $('#total_dana').val('');
                        $('#terbilang').val('');
                        $('#keperluan').val('');
                        $('#sisa_saldo').val('');

                        // $('#modalubah').modal('hide');

                    } else {

                        // getmax();

                        Swal.fire({
                            icon: 'error',
                            title: 'Data gagal diubah',
                            text: 'Data diubah.',
                            showCancelButton: false,
                            confirmButtonColor: '#FF6347',
                            confirmButtonText: 'Siap',
                        })

                        $(".simpan").attr("disabled", false);

                    }

                }, "json");
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

            function terbilang(angka) {

                var bilne = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan",
                    "sembilan",
                    "sepuluh", "sebelas"
                ];

                if (angka < 12) {

                    return bilne[angka];

                } else if (angka < 20) {

                    return terbilang(angka - 10) + " belas";

                } else if (angka < 100) {

                    return terbilang(Math.floor(parseInt(angka) / 10)) + " puluh " + terbilang(parseInt(
                            angka) %
                        10);

                } else if (angka < 200) {

                    return "seratus " + terbilang(parseInt(angka) - 100);

                } else if (angka < 1000) {

                    return terbilang(Math.floor(parseInt(angka) / 100)) + " ratus " + terbilang(
                        parseInt(
                            angka) %
                        100);

                } else if (angka < 2000) {

                    return "seribu " + terbilang(parseInt(angka) - 1000);

                } else if (angka < 1000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000)) + " ribu " + terbilang(
                        parseInt(
                            angka) %
                        1000);

                } else if (angka < 1000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000)) + " juta " + terbilang(
                        parseInt(
                            angka) %
                        1000000);

                } else if (angka < 1000000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000000)) + " milyar " + terbilang(
                        parseInt(
                            angka) % 1000000000);

                } else if (angka < 1000000000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000000000)) + " trilyun " +
                        terbilang(
                            parseInt(angka) % 1000000000000);

                }

            }
        });
    </script>
@endsection
