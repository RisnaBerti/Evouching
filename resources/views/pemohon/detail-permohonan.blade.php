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
            </div>

         

            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Nama Perkiraan</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nama Legkap"
                        name="nama_perkiraan" id="nama_perkiraan" value="{{ Auth::user()->name }}" readonly />
                </div>
                <div class="col-lg-4">
                    <label>Total</label>
                    <input type="text" class="form-control form-control-sm" name="total_dana_ajuan"
                        placeholder="Total Harga" id="total_dana_ajuan" />
                </div>
                <div class="col-lg-4">
                    <label>Terbilang</label>
                    <input type="text" class="form-control form-control-sm" name="terbilang" placeholder="Terbilang"
                        id="terbilang" />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Keterangan</label>
                    <textarea class="form-control form-control-sm" name="keterangan_permohonan" id="keterangan_permohonan"
                        placeholder="Keterangan" rows="4"></textarea>
                </div>
                <div hidden class="input-group input-group-sm mb-1">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                            Ajuan:</span>
                    </div>
                    <input readonly type="text" class="form-control form-control-sm" id="no_resi_ajuan"
                        name="no_resi_ajuan" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
                <div hidden class="input-group input-group-sm mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                    </div>
                    <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-sm"
                        id="tanggal_permohonan" name="tanggal_permohonan" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-sm">
                </div>
                <input hidden type="text" id="id">
                <input hidden type="text" id="id_permohonan">
                <input hidden type="text" id="tanggal_permohonan">
                <input hidden type="text" id="harga_satuan">
                <input hidden type="text" id="jumlah_satuan">
                <input hidden type="text" id="nominal_acc">
                <input hidden type="text" id="status_permohonan">
                <input hidden type="text" id="jenis_dana" value="0">
                <input hidden type="text" id="ttd_pemohon" value="0">
                <input hidden type="text" id="ttd_manajer" value="0">
                <input hidden type="text" id="ttd_bendahara" value="0">
                <input hidden type="text" id="ttd_pemeriksa" value="0">
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
    <div class="card card-custom">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
                <h3 class="card-label">Permohonan Dana</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered display nowrap table-permohonan" id="table-permohonan"
                style="width:100%; margin-top: 13px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th hidden>id_permohonan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                        <th>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permohonan as $d)
                        <tr>
                            <td>
                                <center> {{ $loop->iteration }} </center>
                            </td>
                            <td hidden>
                                <center>{{ $d->id_permohonan }}</center>
                            </td>
                            <td>
                                <center>{{ $d->name }}</center>
                            </td>
                            <td>
                                <center>{{ $d->tanggal_permohonan }}</center>
                            </td>
                            <td>
                                <center>{{ $d->total_dana_ajuan }}</center>
                            </td>
                            <td>
                                <center>{{ $d->keterangan_permohonan }}</center>
                            </td>
                            <td>
                                <center>
                                    @if ($d->status_permohonan == '1')
                                        <span
                                            class="label label-lg font-weight-bold label-light-success label-inline">Disetujui</span>
                                    @elseif ($d->status_permohonan == '0')
                                        <span
                                            class="label label-lg font-weight-bold label-light-danger label-inline">Draf</span>
                                    @endif
                                </center>
                            </td>
                            <td>
                                <center>
                                    <a href="{{ '/permohonan-pemohon/' . $d->id_permohonan }}"><i
                                            class="fas fa-edit btn btn-icon btn-light-primary item-ubah"></i> </a>
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>

    <script>
        $(document).ready(function() {
            const tambahpermohonan = async () => {
                $('#form_user')[0].reset()
                $('#modal_user').modal('show')
            }

            $('#table-permohonan').DataTable({
                paging: true,
            });

            getmax();

            $("#harga_satuan_sum, #jumlah_satuan_sum").keyup(function() {

                var harga = $("#harga_satuan_sum").val();
                var jumlah = $("#jumlah_satuan_sum").val();

                var total = parseInt(harga.replace(/,/g, '')) * parseInt(jumlah);
                $("#total_dana_ajuan").val(uang(total));
                $('#terbilang').val(terbilang(total));

            });

            $('#total_dana_ajuan').change(function() {
                var harga_satuan = $('#total_dana_ajuan').val();
                $('#total_dana_ajuan').val(uang(harga_satuan));
                $('#terbilang').val(terbilang(harga_satuan));
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
                var total_dana_ajuan = $('#total_dana_ajuan').val();
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
                    total_dana_ajuan: total_dana_ajuan,
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
                        $('#total_dana_ajuan').val('');
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

            $(".simpan-permohonan").click(function() {
                coba();
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
