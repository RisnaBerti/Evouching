@extends('layouts.main-pemohon')

@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Form-->
        {{-- <form class="form" id="form_ubah"> --}}
        {{-- <form method="POST" action="{{ url('/permohonan/add') }}" id="form_permohonan" class="form_permohonan"
            enctype="multipart/form-data">
            @csrf --}}
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
                            name="no_resi_ajuan" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                        </div>
                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-sm"
                            id="tanggal_permohonan" name="tanggal_permohonan" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm">
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
                    <input type="text" class="form-control form-control-sm" name="harga_satuan_sum"
                        placeholder="Harga Satuan" id="harga_satuan_sum" />
                </div>
                <div class="col-lg-3">
                    <label>Jumlah</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Jumlah" name="jumlah_satuan_sum"
                        id="jumlah_satuan_sum" />
                </div>
                <div class="col-lg-3">
                    <label>Total</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Total" name="total_harga_sum"
                        id="total_harga_sum" readonly disabled />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Nominal ACC</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nominal ACC" id="nominal_acc"
                        name="nominal_acc" value="000" readonly disabled />
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
                    <textarea class="form-control form-control-sm" name="keterangan_permohonan" id="keterangan_permohonan"
                        placeholder="Keterangan" rows="4"></textarea>
                </div>
                <input hidden type="text" id="jenis_dana" value="0">
                <input hidden type="text" id="ttd_pemohon" value="0">
                <input hidden type="text" id="ttd_manajer" value="0">
                <input hidden type="text" id="ttd_bendahara" value="0">
                <input hidden type="text" id="ttd_pemeriksa" value="0">

            </div>

            <div class="form-group row">
                <div class="col-lg-3">
                    <label class="text-center">Mengetahui,</label><br>
                    <span class="badge badge-pill badge-warning">Menunggu proses persetujuan</span>
                </div>
                <div class="col-lg-3">
                    <label class="text-center">Menyetujui,</label>
                    <span class="badge badge-pill badge-warning">Menunggu proses persetujuan</span>
                </div>
                <div class="col-lg-3">
                    <label class="text-center">Yang Menerima</label>
                    <img id="ttd_pemohon" name="ttd_pemohon"
                        src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ad/Signature_of_Ann_Miller.svg/2560px-Signature_of_Ann_Miller.svg.png"
                        class="rounded img-thumbnail" alt="...">
                </div>
                <div class="col-lg-3">
                    <label class="text-center">Yang Membayarkan</label>
                    <span class="badge badge-pill badge-warning">Menunggu proses persetujuan</span>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-3">
                    <button type="button" class="btn btn-primary mr-2 simpan-permohonan">Submit</button>
                </div>
            </div>
        </div>
        {{-- </form> --}}
        <!--end::Form-->
    </div>
    <!--end::Card-->

    <script>
        $(document).ready(function() {
            getmax();
            coba();


            $("#harga_satuan_sum, #jumlah_satuan_sum").keyup(function() {

                var harga = $("#harga_satuan_sum").val();
                var jumlah = $("#jumlah_satuan_sum").val();

                var total = parseInt(harga.replace(/,/g, '')) * parseInt(jumlah);
                $("#total_harga_sum").val(uang(total));
                $('#terbilang').val(terbilang(total));

            });

            $('#harga_satuan_sum').change(function() {
                var harga_satuan = $('#harga_satuan_sum').val();
                $('#harga_satuan_sum').val(uang(harga_satuan));
            });

            function coba() {

                var no_resi_ajuan = $('#no_resi_ajuan').val();
                var tanggal_permohonan = $('#tanggal_permohonan').val();
                var name = $('#name').val();
                var jabatan = $('#jabatan').val();
                var divisi = $('#divisi').val();
                var nama_perkiraan = $('#nama_perkiraan').val();
                var harga_satuan_sum = $('#harga_satuan_sum').val();
                var jumlah_satuan_sum = $('#jumlah_satuan_sum').val();
                var total_harga_sum = $('#total_harga_sum').val();
                var nominal_acc = $('#nominal_acc').val();
                var keterangan_permohonan = $('#keterangan_permohonan').val();
                var jenis_dana = $('#jenis_dana').val();
                var terbilang = $('#terbilang').val();
                var ttd_pemeriksa = $('#ttd_pemeriksa').val();
                var ttd_bendahara = $('#ttd_bendahara').val();
                var ttd_pemohon = $('#ttd_pemohon').val();
                var ttd_manajer = $('#ttd_manajer').val();

                $.post("{{ url('/permohonan/add') }}", {
                    _token: "{{ csrf_token() }}",
                    no_resi_ajuan: no_resi_ajuan,
                    tanggal_permohonan: tanggal_permohonan,
                    name: name,
                    jabatan: jabatan,
                    divisi: divisi,
                    nama_perkiraan: nama_perkiraan,
                    harga_satuan_sum: harga_satuan_sum,
                    jumlah_satuan_sum: jumlah_satuan_sum,
                    total_harga_sum: total_harga_sum,
                    nominal_acc: nominal_acc,
                    keterangan_permohonan: keterangan_permohonan,
                    jenis_dana: jenis_dana,
                    terbilang: terbilang,
                    ttd_pemeriksa: ttd_pemeriksa,
                }).done(function(response) {
                    if (response != null) {

                        Swal.fire(
                            'Permohonan Dana!',
                            'Permohonan Dana Sedang Diproses.',
                            'success'
                        )
                        location.reload()
                        getmax();

                        $(".simpan-permohonan").attr("disabled", false);

                        $('#id').val('');
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

                }, "json");
            }

            // $(".simpan-permohonan").click(function() {
            //     coba();
            // });


            $(".simpan-permohonan").click(function() {

                coba();

                // var no_resi_ajuan = $('#no_resi_ajuan').val();
                // var tanggal_permohonan = $('#tanggal_permohonan').val();
                // var name = $('#name').val();
                // var jabatan = $('#jabatan').val();
                // var divisi = $('#divisi').val();
                // var nama_perkiraan = $('#nama_perkiraan').val();
                // var harga_satuan_sum = $('#harga_satuan_sum').val();
                // var jumlah_satuan_sum = $('#jumlah_satuan_sum').val();
                // var total_harga_sum = $('#total_harga_sum').val();
                // var nominal_acc = $('#nominal_acc').val();
                // var keterangan_permohonan = $('#keterangan_permohonan').val();
                // var terbilang = $('#terbilang').val();
                // var ttd_pemeriksa = $('#ttd_pemeriksa').val();
                // var ttd_bendahara = $('#ttd_bendahara').val();
                // var ttd_pemohon = $('#ttd_pemohon').val();
                // var ttd_manajer = $('#ttd_manajer').val();

                // $('.simpan-permohonan').attr("disabled", "disabled");

                // $.post("{{ url('/permohonan/add') }}", {
                //     _token: "{{ csrf_token() }}",
                //     id: id,
                //     no_resi_ajuan: no_resi_ajuan,
                //     tanggal_permohonan: tanggal_permohonan,
                //     // jenis_dana: jenis_dana,
                //     name: name,
                //     jabatan: jabatan,
                //     divisi: divisi,
                //     nama_perkiraan: nama_perkiraan,
                //     harga_satuan_sum: harga_satuan_sum,
                //     jumlah_satuan_sum: jumlah_satuan_sum,
                //     total_harga_sum: total_harga_sum,
                //     nominal_acc: nominal_acc,
                //     keterangan_permohonan: keterangan_permohonan,
                //     terbilang: terbilang,
                //     ttd_pemeriksa: ttd_pemeriksa,
                //     ttd_bendahara: ttd_bendahara,
                //     ttd_manajer: ttd_manajer,
                //     ttd_pemohon: ttd_pemohon

                // }).done(function(response) {


                //     if (response != null) {

                //         Swal.fire(
                //             'Permohonan Dana!',
                //             'Permohonan Dana Sedang Diproses.',
                //             'success'
                //         )
                //         location.reload()

                //         // simpanPembayaran(response.toString());

                //         getmax();

                //         $(".simpan-permohonan").attr("disabled", false);

                //         $('#id').val('');
                //         $('#no_resi_ajuan').val('');
                //         $('#tanggal_permohonan').val('');
                //         // $('#jenis_dana').val('');
                //         $('#name').val('');
                //         $('#jabatan').val('');
                //         $('#divisi').val('');
                //         $('#nama_perkiraan').val('');
                //         $('#harga_satuan_sum').val('');
                //         $('#jumlah_satuan_sum').val('');
                //         $('#total_harga_sum').val('');
                //         $('#nominal_acc').val('');
                //         $('#keterangan_permohonan').val('');
                //         $('#terbilang').val('');
                //         $('#ttd_pemeriksa').val('');
                //         $('#ttd_bendahara').val('');
                //         $('#ttd_manajer').val('');
                //         $('#ttd_pemohon').val('');

                //         $('#modalubah').modal('hide');

                //     } else {

                //         getmax();

                //         Swal.fire({
                //             icon: 'error',
                //             title: 'Permohonan Dana gagal diubah',
                //             text: 'Permohonan Dana gagal diubah.',
                //             showCancelButton: false,
                //             confirmButtonColor: '#FF6347',
                //             confirmButtonText: 'Siap',
                //         })

                //         $(".simpan-permohonan").attr("disabled", false);

                //     }

                // });

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


            // 

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

                    return terbilang(Math.floor(parseInt(angka) / 100)) + " ratus " + terbilang(parseInt(
                            angka) %
                        100);

                } else if (angka < 2000) {

                    return "seribu " + terbilang(parseInt(angka) - 1000);

                } else if (angka < 1000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000)) + " ribu " + terbilang(parseInt(
                            angka) %
                        1000);

                } else if (angka < 1000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000)) + " juta " + terbilang(parseInt(
                            angka) %
                        1000000);

                } else if (angka < 1000000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000000)) + " milyar " + terbilang(
                        parseInt(
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
