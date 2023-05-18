@extends('layouts.main-pemohon')

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
                                PERMOHONAN DANA
                            </h3>
                        </div>
                    </div>
                    <div class="col-5 align-items-start">
                        <input hidden type="text" id="id_permohonan">
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">No. Formulir:</span>
                            </div>
                            <input readonly type="text" class="form-control form-control-sm" id="no_resi_ajuan"
                                name="no_resi_ajuan" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                    Ajuan:</span>
                            </div>
                            <input readonly type="text" class="form-control form-control-sm" id="no_resi_ajuan"
                                name="no_resi_ajuan" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                            </div>
                            <input type="date" value="{{ date('d-m-Y') }}" class="form-control form-control-sm"
                                id="tanggal_pembayaran_bank" name="tanggal_pembayaran_bank"
                                aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Nama </label>
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
                    <div class="col-lg-3">
                        <label>Nama Perkiraan</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nama Legkap"
                            name="nama_perkiraan" id="nama_perkiraan" value="{{ Auth::user()->name }}" readonly />
                    </div>
                    <div class="col-lg-3">
                        <label>Harga Satuan</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Harga Satuan"
                            id="harga_satuan_sum"  />
                    </div>
                    <div class="col-lg-3">
                        <label>Jumlah</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Jumlah"
                            id="jumlah_satuan_sum" />
                    </div>
                    <div class="col-lg-3">
                        <label>Total</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Total" id="total_harga_sum"
                            readonly disabled />
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Nominal ACC</label>
                        <input type="text" class="form-control form-control-sm" placeholder="Nominal ACC"
                            id="nominal_acc" name="nominal_acc" value="000" readonly disabled />
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
                        <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" placeholder="Keterangan"
                            rows="4"></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-3">
                        <label class="text-center">Mengetahui,</label>
                        <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" readonly disabled rows="4"></textarea>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-center">Menyetujui,</label>
                        <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" readonly disabled rows="4"></textarea>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-center">Yang Menerima</label>
                        <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" rows="4"></textarea>
                    </div>
                    <div class="col-lg-3">
                        <label class="text-center">Yang Membayarkan</label>
                        <textarea class="form-control form-control-sm" id="exampleFormControlTextarea1" readonly disabled rows="4"></textarea>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-lg-3">
                        <button type="submit" class="btn btn-primary mr-2 save-pembayaran-bank">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->

    <script>
        $(document).ready(function() {
            getmax();
            $('#harga_satuan_sum').change(function() {
                var harga_satuan = $('#harga_satuan_sum').val();
                $('#harga_satuan_sum').val(uang(harga_satuan));
            });

            $(".simpan-permohonan").click(function() {
                var id = $('#id').val();
                var no_resi_ajuan = $('#no_resi_ajuan').val();
                var tanggal_permohonan = $('#tanggal_permohonan').val();
                var jenis_dana = $('#jenis_dana').val();
                var name = $('#name').val();
                var jabatan = $('#jabatan').val();
                var divisi = $('#divisi').val();
                var nama_perkiraan = $('#nama_perkiraan').val();
                var harga_satuan = $('#harga_satuan_sum').val();
                var jumlah_satuan = $('#jumlah_satuan_sum').val();
                var total_harga = $('#total_harga_sum').val();
                var nominal_acc = $('#nominal_acc').val();
                var keterangan_permohonan = $('#keterangan_permohonan').val();
                var terbilang = $('#terbilang').val();

                $('.simpan-permohonan').attr("disabled", "disabled");

                $.post("{{ url('/permohonan/add') }}", {
                    _token: "{{ csrf_token() }}",
                    id: id,
                    no_resi_ajuan: no_resi_ajuan,
                    tanggal_permohonan: tanggal_permohonan,
                    jenis_dana: jenis_dana,
                    name: name,
                    jabatan: jabatan,
                    divisi: divisi,
                    nama_perkiraan: nama_perkiraan,
                    harga_satuan: harga_satuan,
                    jumlah_satuan: jumlah_satuan,
                    total_harga: total_harga,
                    nominal_acc: nominal_acc,
                    keterangan_permohonan: keterangan_permohonan,
                    terbilang: terbilang,

                }).done(function(response) {


                    if (response != null) {

                        Swal.fire(
                            'Permohonan Dana!',
                            'Permohonan Dana Sedang Diproses.',
                            'success'
                        )
                        location.reload()

                        // simpanPembayaran(response.toString());

                        getmax();

                        $(".simpan-permohonan").attr("disabled", false);

                        $('#id').val('');
                        $('#no_resi_ajuan').val('');
                        $('#tanggal_permohonan').val('');
                        $('#jenis_dana').val('');
                        $('#name').val('');
                        $('#jabatan').val('');
                        $('#divisi').val('');
                        $('#nama_perkiraan').val('');
                        $('#harga_satuan_sum').val('');
                        $('#jumlah_satuan_sum').val('');
                        $('#total_harga_sum').val('');
                        $('#nominal_acc').val('');
                        $('#keterangan_permohonan').val('');
                        $('#terbilang').val('');

                        $('#modalubah').modal('hide');

                    } else {

                        getmax();

                        Swal.fire({
                            icon: 'error',
                            title: 'Permohonan Dana gagal diubah',
                            text: 'Permohonan Dana gagal diubah.',
                            showCancelButton: false,
                            confirmButtonColor: '#FF6347',
                            confirmButtonText: 'Siap',
                        })

                        $(".simpan-permohonan").attr("disabled", false);

                    }

                });

            });

            // function simpanPembayaran(id_permohonan) {

            //     $.post("{{ url('/permohonan/add/kas') }}", {
            //         _token: "{{ csrf_token() }}",
            //         id_permohonan: id_permohonan

            //     }).done(function(response) {

            //         if (response == "success") {

            //             getmax();

            //         } else {

            //             getmax();

            //         }

            //     });


            // }

            $(document).ready(function() {
                $("#harga_satuan_sum, #jumlah_satuan_sum").keyup(function() {
                    var harga = $("#harga_satuan_sum").val();
                    var jumlah = $("#jumlah_satuan_sum").val();

                    var total = parseInt(harga.replace(/,/g, '')) * parseInt(jumlah);
                    $("#total_harga_sum").val(uang(total));
                    $('#terbilang').val(terbilang(total));

                });
            });

            function getmax() {

                $.get("{{ url('/permohonan/getmax') }}", {
                        _token: "{{ csrf_token() }}"
                    })
                    .done(function(data) {
                        var total = parseInt(data) + 1;
                        $("#no_resi_ajuan").val(total);
                    });



            }

            function terbilang(angka) {

                var bilne = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan",
                    "sepuluh", "sebelas"
                ];

                if (angka < 12) {

                    return bilne[angka];

                } else if (angka < 20) {

                    return terbilang(angka - 10) + " belas";

                } else if (angka < 100) {

                    return terbilang(Math.floor(parseInt(angka) / 10)) + " puluh " + terbilang(parseInt(angka) %
                        10);

                } else if (angka < 200) {

                    return "seratus " + terbilang(parseInt(angka) - 100);

                } else if (angka < 1000) {

                    return terbilang(Math.floor(parseInt(angka) / 100)) + " ratus " + terbilang(parseInt(angka) %
                        100);

                } else if (angka < 2000) {

                    return "seribu " + terbilang(parseInt(angka) - 1000);

                } else if (angka < 1000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000)) + " ribu " + terbilang(parseInt(angka) %
                        1000);

                } else if (angka < 1000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000)) + " juta " + terbilang(parseInt(angka) %
                        1000000);

                } else if (angka < 1000000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000000)) + " milyar " + terbilang(parseInt(
                        angka) % 1000000000);

                } else if (angka < 1000000000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000000000)) + " trilyun " + terbilang(
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


        });
    </script>
@endsection
