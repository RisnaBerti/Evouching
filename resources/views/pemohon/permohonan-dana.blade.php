@extends('layouts.main-pemohon')

@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Form-->

        <div class="card-body ">
            {{-- < class="row">
                    <div class="col">
                        <h3 class="card-title">
                            PENGAJUAN PERMOHONAN DANA
                        </h3>
                    </div> --}}
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

                        </div>
                    </div>
                    <div class="col align-self-end">
                        <div class="form-group row ">
                            <label class="col-3 col-form-label">No. Resi Ajuan:</label>
                            <div class="col-9">
                                <input type="text" class="form-control" name="no_resi_ajuan" id="no_resi_ajuan"
                                    value="EV-1" readonly />
                            </div>
                        </div>
                    </div>
                    <div class="col align-self-end">
                        <div class="form-group row ">
                            <label class="col-3 col-form-label">Tanggal:</label>
                            <div class="col-9">
                                <input type="date" class="form-control" name="tanggal_permohonan" id="tanggal_permohonan"
                                    required />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="separator separator-dashed "></div>

            <div class="form-group row">
                <input type="text" class="form-control" placeholder="Nama Legkap" name="id" id="id"
                    value="{{ Auth::user()->id }}" hidden />
                <div class="col-lg-3">
                    <label>Nama Perkiraan</label>
                    <input type="text" class="form-control" placeholder="Nama Legkap" name="nama_perkiraan"
                        id="nama_perkiraan" value="{{ Auth::user()->name }}" required />
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-3">
                    <label>Harga Satuan</label>
                    <input type="text" class="form-control @error('harga_satuan') is-invalid @enderror"
                        placeholder="Harga Satuan" name="harga_satuan" id="harga_satuan" required />
                    @error('harga_satuan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-3">
                    <label>Jumlah</label>
                    <input type="text" class="form-control @error('jumlah_satuan') is-invalid @enderror"
                        placeholder="Jumlah" name="jumlah_satuan" id="jumlah_satuan" required />
                    @error('jumlah_satuan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-3">
                    <label>Total</label>
                    <input type="text" class="form-control @error('total_harga') is-invalid @enderror"
                        placeholder="Total" name="total_harga" id="total_harga" required />
                    @error('total_harga')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Nominal ACC</label>
                    <input type="text" class="form-control @error('nominal_acc') is-invalid @enderror"
                        placeholder="Nominal Uang Acc" name="nominal_acc" id="nominal_acc" required />
                    @error('nominal_acc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-lg-6">
                    <label>Keterangan</label>
                    <input type="text" class="form-control @error('keterangan_permohonan') is-invalid @enderror"
                        placeholder="Keterangan" name="keterangan_permohonan" id="keterangan_permohonan" required />
                    @error('keterangan_permohonan')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-12">
                    <label>Terbilang</label>
                    <input type="text" class="form-control @error('terbilang') is-invalid @enderror"
                        placeholder="Terbilang" name="terbilang" id="terbilang" required />
                    @error('terbilang')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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

        <!--end::Form-->
    </div>
    <!--end::Card-->

    <script>
        $(document).ready(function() {

            $(".simpan-permohonan").click(function() {

                var no_resi_ajuan = $('#no_resi_ajuan').val();
                var tanggal_permohonan = $('#tanggal_permohonan').val();
                var nama_perkiraan = $('#nama_perkiraan').val();
                var harga_satuan = $('#harga_satuan').val();
                var jumlah_satuan = $('#jumlah_satuan').val();
                var total_harga = $('#total_harga').val();
                var nominal_acc = $('#nominal_acc').val();
                var keterangan_permohonan = $('#keterangan_permohonan').val();
                var terbilang = $('#terbilang').val();

                $('.simpan-permohonan').attr("disabled", "disabled");

                $.post("{{ url('/permohonan/add') }}", {
                    _token: "{{ csrf_token() }}",
                    no_resi_ajuan: no_resi_ajuan,
                    tanggal_permohonan: tanggal_permohonan,
                    nama_perkiraan: nama_perkiraan,
                    harga_satuan: harga_satuan,
                    jumlah_satuan: jumlah_satuan,
                    total_harga: total_harga,
                    nominal_acc: nominal_acc,
                    keterangan_permohonan: keterangan_permohonan,
                    terbilang: terbilang,

                }).done(function(response) {

                    if (response == "success") {
                        Swal.fire(
                            'Permohonan Dana!',
                            'Permohonan Dana Sedang Diproses.',
                            'success'
                        )

                        // Swal.fire({
                        //     icon: 'success',
                        //     title: 'User diubah',
                        //     text: 'User berhasil diubah.',
                        //     showCancelButton: false,
                        //     confirmButtonColor: '#FF6347',
                        // })
                        location.reload()

                        // get();

                        $(".simpan-permohonan").attr("disabled", false);

                        $('#no_resi_ajuan').val('');
                        $('#tanggal_permohonan').val('');
                        $('#nama_perkiraan').val('');
                        $('#jumlah_satuan').val('');
                        $('#total_harga').val('');
                        $('#nominal_acc').val('');
                        $('#keterangan_permohonan').val('');
                        $('#terbilang').val('');

                        $('#modalubah').modal('hide');

                    } else {

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


        });
    </script>
@endsection
