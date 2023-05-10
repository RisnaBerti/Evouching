@extends('layouts.main-bendahara')

@section('content')
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
                        <div class="col align-self-end">
                            <div class="form-group row ">
                                <label class="col-3 col-form-label">No. Formulir:</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-end">
                            <div class="form-group row ">
                                <label class="col-3 col-form-label">No. Resi Ajuan:</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col align-self-end">
                            <div class="form-group row ">
                                <label class="col-3 col-form-label">Tanggal:</label>
                                <div class="col-9">
                                    <input type="text" class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="form-group row">
                    <div class="col-lg-3">
                        <label>Nama Perkiraan</label>
                        <input type="text" class="form-control" placeholder="Nama Legkap" />
                    </div>
                    <div class="col-lg-3">
                        <label>Harga Satuan</label>
                        <input type="text" class="form-control" placeholder="Harga Satuan" />
                    </div>
                    <div class="col-lg-3">
                        <label>Jumlah</label>
                        <input type="text" class="form-control" placeholder="Jumlah" />
                    </div>
                    <div class="col-lg-3">
                        <label>Total</label>
                        <input type="text" class="form-control" placeholder="Total" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Nominal ACC</label>
                        <input type="text" class="form-control" placeholder="Nominal Uang Acc" />
                    </div>
                    <div class="col-lg-6">
                        <label>Keterangan</label>
                        <input type="text" class="form-control" placeholder="Keterangan" />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Terbilang</label>
                        <input type="text" class="form-control" placeholder="Terbilang" />
                    </div>
                </div>
            </div>

            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-3">
                        <button type="reset" class="btn btn-primary mr-2">Menyetujui</button>
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
            {{-- <div class="card-toolbar">
			<span class="btn btn-light-primary" onclick="tambahProduk()">Tambah Produk</span>
		</div> --}}
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

            function get() {
                $('#table-permohonan').DataTable({

                    "destroy": true,

                    "processing": true,

                    "ordering": true,

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

                                return String(uang(row.total_harga));

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

                                return '<a class="dropdown-item item-ubah-catatan" href="#" data-icp="' +
                                    row.id_permohonan + '" data-tg="' + row
                                    .name + '" data-kg="' + row.no_resi_ajuan +
                                    '"  data-po="' + row.tanggal_permohonan + '" data-ke="' +
                                    row.harga_satuan + '" data-jd="' + row.jumlah_satuan +
                                    '" data-js="' + row.total_harga + '" data-ts="' + row
                                    .nominal_acc + '" data-ts="' + row
                                    .keterangan_permohonan +
                                    '"><i class="fas fa-edit btn btn-icon btn-light-primary item-ubah"></i></a> <a class="dropdown-item item-hapus-catatan" href="#" data-icp="' +
                                    row.id_permohonan +
                                    '"><i class="fas fa-trash-alt btn btn-icon btn-light-danger item-hapus"></i></a>'
                            },
                            padding: '5px',
                        }
                    ],
                });

            }

            $('#table_permohonan').on('click', '.item-ubah', function() {

                var currow = $(this).closest('tr');

                var id_permohonan = currow.find('td:eq(1)').text();
                var name = currow.find('td:eq(2)').text();
                var no_resi_ajuan = currow.find('td:eq(3)').text();
                var tanggal_permohonan = currow.find('td:eq(4)').text();
                var harga_satuan = currow.find('td:eq(5)').text();
                var jumlah_satuan = currow.find('td:eq(6)').text();
                var total_harga = currow.find('td:eq(7)').text();
                var nominal_acc = currow.find('td:eq(8)').text();
                var keterangan_permohonan = currow.find('td:eq(9)').text();


                $('#id_permohonan').val(id.trim());
                $('#name').val(nama.trim());
                $('#no_resi_ajuan').val(email.trim());
                $('#tanggal_permohonan').val(hp.trim());
                $('#harga_satuan').val(divisi.trim());
                $('#jumlah_satuan').val(jabatan.trim());
                $('#total_harga').val(alamat.trim());
                $('#nominal_acc').val(alamat.trim());
                $('#keterangan_permohonan').val(alamat.trim());

                $('#modal_ubah').modal('show');
            });

            $(".ubah-permohonan").click(function() {

                var id_permohonan = $('#id_permohonan').val();
                var name = $('#name').val();
                var no_resi_ajuan = $('#no_resi_ajuan').val();
                var tanggal_permohonan = $('#tanggal_permohonan').val();
                var jumlah_satuan = $('#jumlah_satuan').val();
                var total_harga = $('#total_harga').val();
                var nominal_acc = $('#nominal_acc').val();
                var keterangan_permohonan = $('#keterangan_permohonan').val();

                $('.ubah-permohonan').attr("disabled", "disabled");

                if (!id_permohonan) {

                    alert("ID User tidak terdefinisi!");

                    $('.ubah-permohonan').attr("disabled", false);

                } else {

                    $.post("{{ url('/permohonan/edit') }}", {
                        _token: "{{ csrf_token() }}",
                        id_permohonan: id_permohonan,
                        name: name,
                        no_resi_ajuan: no_resi_ajuan,
                        tanggal_permohonan: tanggal_permohonan,
                        harga_satuan: harga_satuan,
                        jumlah_satuan: jumlah_satuan,
                        total_harga: total_harga,
                        nominal_acc: nominal_acc,
                        keterangan_permohonan: keterangan_permohonan,

                    }).done(function(response) {

                        if (response == "success") {
                            Swal.fire(
                                'Disetujui!',
                                'Permohonan Dana Di setujui.',
                                'success'
                            )
                            location.reload()

                            // get();

                            $(".ubah-permohonan").attr("disabled", false);

                            $('#id_permohonan').val('');
                            $('#name').val('');
                            $('#no_resi_ajuan').val('');
                            $('#tanggal_permohonan').val('');
                            $('#harga_satuan').val('');
                            $('#jumlah_satuan').val('');
                            $('#total_harga').val('');
                            $('#nominal_acc').val('');
                            $('#keterangan_permohonan').val('');

                            $('#modalubah').modal('hide');

                        } else {
                            Swal.fire(
                                'Tidak Disetujui!',
                                'Permohonan Dana Tidak Di setujui.',
                                'error'
                            )
                            location.reload()

                            // Swal.fire({
                            //     icon: 'error',
                            //     title: 'Tidak Disetujui!',
                            //     text: 'Permoohonan Dana Tidak Di setujui.',
                            //     showCancelButton: false,
                            //     confirmButtonColor: '#FF6347',
                            //     confirmButtonText: 'Siap',
                            // })

                            $(".ubah-permohonan").attr("disabled", false);

                        }

                    });

                }

            });

            //Update Nonaktif menjadi Aktif
            $('#table_permohonan').on('click', '.item-aktivasi', function() {

                var currow = $(this).closest('tr');

                var id_permohonan = currow.find('td:eq(1)').text();

                $.get("{{ url('permohonan/disetujui/') }}/" + id_permohonan.trim(), {

                    })
                    .done(function(data) {
                        Swal.fire(
                            'Active!',
                            'Permohonan Dana Di setujui.',
                            'success'
                        )
                        location.reload()
                    });

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
