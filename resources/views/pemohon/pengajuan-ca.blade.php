@extends('layouts.main-pemohon')

@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <div class="card-body">
            <div class="row">
                <div class="col-7 align-self-start">
                    <div class="col">
                        <h3 class="card-title">
                            PENGAJUAN CA
                        </h3>
                    </div>
                </div>
                <div class="col-5 align-items-start">
                    <input hidden type="text" id="id" value="{{ Auth::user()->id }}">
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">No. Formulir:</span>
                        </div>
                        <input readonly type="text" class="form-control form-control-sm" id="id_permohonan"
                            name="id_permohonan" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                Ajuan:</span>
                        </div>
                        <input readonly type="text" class="form-control form-control-sm" id="no_resi_ajuan"
                            name="no_resi_ajuan" value="" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                        </div>
                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-sm"
                            id="tanggal_permohonan" name="tanggal_permohonan" value=""
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Nama Perkiraan</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nama Legkap" id="name"
                        value="{{ Auth::user()->name }}" readonly disabled />
                </div>
                <div class="col-lg-4">
                    <label>Jabatan</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Jabatan" id="jabatan"
                        value="{{ Auth::user()->jabatan }}" readonly disabled />
                </div>
                <div class="col-lg-4">
                    <label>Divisi / Departemen</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Divisi" id="divisi"
                        value="{{ Auth::user()->divisi }}" readonly disabled />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Dana Yang Di ajukan</label>
                    <input type="text" class="form-control form-control-sm" name="harga_satuan"
                        placeholder="Dana yang diajukan" id="harga_satuan" />
                </div>
                <div class="col-lg-4">
                    <label>Jumlah Satuan</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Jumlah Barang"
                        name="jumlah_satuan" id="jumlah_satuan" />
                </div>
                <div class="col-lg-4">
                    <label>Total</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Total" name="total_dana_ajuan"
                        id="total_dana_ajuan" readonly disabled />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Nominal ACC</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Di isi oleh bendahara"
                        id="nominal_acc" name="nominal_acc" value="" readonly disabled />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Terbilang</label>
                    <input readonly disabled type="text" class="form-control form-control-sm" placeholder="Terbilang"
                        value="" id="terbilang" name="terbilang" />
                </div>
                <div class="col-lg-6">
                    <label>Keterangan</label>
                    <textarea class="form-control form-control-sm" name="keterangan_permohonan" id="keterangan_permohonan"
                        placeholder="Keterangan" rows="4"></textarea>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-3 ">
                    <button type="button" class="btn btn-primary mr-2 simpan-ca">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    <!--end::Card-->

    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
                <h3 class="card-label">Pengjuan CA</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered display nowrap table-pengajuan-ca" id="table-pengajuan-ca"
                style="width:100%; margin-top: 13px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th hidden>id_permohonan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Dana Yang Di ajukan</th>
                        <th>Jumlah</th>
                        <th>Keterangan </th>
                        <th>Status</th>
                    </tr>
                </thead>
                
            </table>
            <!--end: Datatable-->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            getmax3();
            get();
            // $('#table-pengajuan-ca').DataTable({
            //     paging: true,
            //     scrollY: 200,
            //     scrollX: true,
            // });

            $("#harga_satuan, #jumlah_satuan").keyup(function() {

                var harga = $("#harga_satuan").val();
                var jumlah = $("#jumlah_satuan").val();

                var total = parseInt(harga.replace(/,/g, '')) * parseInt(jumlah);
                $("#total_dana_ajuan").val(uang(total));
                $('#terbilang').val(terbilang(total));
            });

            $('#harga_satuan').change(function() {
                var harga_satuan = $('#harga_satuan').val();
                $('#harga_satuan').val(uang(harga_satuan));
            });

            $(".simpan-ca").click(function() {
                simpandata();
            });

            function getmax3() {

                $.get("{{ url('/pengajuan-ca/getmax3') }}", {
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(data) {
                        var total = parseInt(data) + 1;
                        $("#no_resi_ajuan").val(total);
                    });
            }

            function simpandata() {

                var no_resi_ajuan = $('#no_resi_ajuan').val();
                var tanggal_permohonan = $('#tanggal_permohonan').val();
                var name = $('#name').val();
                var jabatan = $('#jabatan').val();
                var divisi = $('#divisi').val();
                var harga_satuan = $('#harga_satuan').val();
                var jumlah_satuan = $('#jumlah_satuan').val();
                var total_dana_ajuan = $('#total_dana_ajuan').val();
                var nominal_acc = $('#nominal_acc').val();
                var keterangan_permohonan = $('#keterangan_permohonan').val();
                var jenis_dana = $('#jenis_dana').val();
                var terbilang = $('#terbilang').val();
                var ttd_pemeriksa = $('#ttd_pemeriksa').val();
                var ttd_bendahara = $('#ttd_bendahara').val();
                var ttd_pemohon = $('#ttd_pemohon').val();
                var ttd_manajer = $('#ttd_manajer').val();

                $.post("{{ url('/pengajuan-ca/add') }}", {
                    _token: "{{ csrf_token() }}",
                    no_resi_ajuan: no_resi_ajuan,
                    tanggal_permohonan: tanggal_permohonan,
                    name: name,
                    jabatan: jabatan,
                    divisi: divisi,
                    harga_satuan: harga_satuan,
                    jumlah_satuan: jumlah_satuan,
                    total_dana_ajuan: total_dana_ajuan,
                    nominal_acc: nominal_acc,
                    keterangan_permohonan: keterangan_permohonan,
                    jenis_dana: jenis_dana,
                    terbilang: terbilang,
                    ttd_pemeriksa: ttd_pemeriksa
                }).done(function(response) {
                    if (response != null) {

                        Swal.fire(
                            'Permohonan Dana!',
                            'Permohonan Dana Sedang Diproses.',
                            'success'
                        )
                        location.reload()
                        getmax3();

                        $(".simpan-ca").attr("disabled", false);

                        $('#id').val('');
                        $('#harga_satuan').val('');
                        $('#jumlah_satuan').val('');
                        $('#total_dana_ajuan').val('');
                        $('#keterangan_permohonan').val('');
                        $('#terbilang').val('');

                        // $('#modalubah').modal('hide');

                    } else {

                        getmax3();

                        Swal.fire({
                            icon: 'error',
                            title: 'Permohonan Dana gagal diubah',
                            text: 'Permohonan Dana gagal diubah.',
                            showCancelButton: false,
                            confirmButtonColor: '#FF6347',
                            confirmButtonText: 'Siap',
                        })

                        $(".simpan-ca").attr("disabled", false);

                    }

                }, "json");
            }

            function ubahdata() {

                var id_detail_permohonan = $('#id_detail_permohonan').val();
                var nama_barang = $('#nama_barang').val();
                var harga_satuan = $('#harga_satuan').val();
                var qty = $('#qty').val();
                var total_harga_barang = $('#total_harga_barang').val();

                $('.simpan-ca').attr("disabled", "disabled");

                $.post("{{ url('/detail-permohonan/edit') }}", {
                    _token: "{{ csrf_token() }}",
                    id_detail_permohonan: id_detail_permohonan,
                    nama_barang: nama_barang,
                    harga_satuan: harga_satuan,
                    qty: qty,
                    total_harga_barang: total_harga_barang

                }).done(function(response) {

                    if (response == "success") {
                        Swal.fire(
                            'Disetujui!',
                            'Permohonan Dana Di setujui.',
                            'success'
                        )
                        // location.reload()

                        $(".simpan-ca").attr("disabled", false);

                        get();

                        $(".item-ubah").attr("disabled", false);

                        $('#id_detail_permohonan').val('');
                        $('#name').val('');
                        $('#nama_barang').val('');
                        $('#tanggal_permohonan').val('');
                        $('#harga_satuan').val('');
                        $('#qty').val('');
                        $('#total_harga_barang').val('');
                        $('#keteranang_detail').val('');

                        // $('#modalubah').modal('hide');

                    } else {
                        Swal.fire(
                            'Tidak Disetujui!',
                            'Permohonan Dana Tidak Di setujui.',
                            'error'
                        )
                        location.reload()

                        $(".item-ubah").attr("disabled", false);

                    }

                }, "json");
            }

            function get() {
                $('#table-pengajuan-ca').DataTable({
                    "destroy": true,
                    "processing": true,
                    "ordering": true,
                    "scrollX": true,
                    "pageLength": 10,
                    "ajax": {

                        url: "{{ url('/pengajuan-ca/get') }}",
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

                                return row.tanggal_permohonan;

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return row.total_dana_ajuan;

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return row.jumlah_satuan;
                                // return row.harga_satuan;

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                // return String(uang(row.qty));
                                return row.keterangan_permohonan;

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                if (row.status_permohonan == '0') {
                                    return '<span class="badge bg-warning text-dark">Belum Disetujui</span>';
                                } else if (row.status_permohonan == '1') {
                                    return '<span class="badge bg-success">Disetujui Bendahara</span>';
                                } else if (row.status_permohonan == '2') {
                                    return '<span class="badge bg-success">Disetujui Manajer</span>';
                                } else if (row.status_permohonan == '3') {
                                    return '<span class="badge bg-success">Disetujui</span>';
                                } else {
                                    return '<span class="badge bg-danger">Ditolak</span>';
                                }

                            },
                            padding: '5px'
                        }

                    ],
                });

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

            function getdetailbarang() {

                $('#keteranang_detail').empty();

                $.post("{{ route('keterangan.all') }}", {
                    _token: "{{ csrf_token() }}",
                    id_permohonan: "{{ Request::segment(2) }}"
                }).done(function(data) {

                    // var res = JSON.parse(response);
                    var res = data;

                    // var res = $.parseJSON(data);

                    $.each(res, function(index, value) {

                        $('#keteranang_detail').val(value.nama_barang + ' ' + value.qty +
                            '\n'); // Append item to list
                        //item.val(''); // Clear new item

                        // $('#keteranang_detail').text(value.nama_barang + ' ' + value.qty +
                        //     ' ' + value.harga_satuan + '\n');

                        // alert(value.nama_barang + ' ' + value.qty +
                        //     ' ' + value.satuan + '<br>')

                    });
                });

            }

        });
    </script>
@endsection