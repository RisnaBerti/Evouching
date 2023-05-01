@extends('layouts.main-bendahara')

@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title" style="font-size:22px; font: bold;">
            BUKTI PEMBAYARAN BANK
        </h3>
        <div class="card-toolbar">
            {{-- <div class="mb-15">
                <div class="form-group row">
                    <label class="col-lg-6 col-form-label">Full Name</label>
                    <label class="col-lg-6 col-form-label">Full Name</label>
                </div>
            </div> --}}
            {{-- <div class="row">
                <div class="col-lg-4">
                    <label class="col-form-label">No. Formulir</label>
                    <input type="text" class="form-control" placeholder="No. Transaksi"/>
                </div>
                <div class="col-lg-4">
                    <label class="col-form-label">No. Resi Bayar</label>
                    <input type="text" class="form-control" placeholder="No. Transaksi"/>
                </div>
                <div class="col-lg-4">
                    <label class="col-form-label">Tanggal</label>
                    <input type="text" class="form-control" placeholder="Tanggal"/>
                </div>
            </div> --}}
        </div>
    </div>

    <!--begin::Form-->
    <form class="form">
        <div class="card-body">
            <!--begin::Form Group-->
            <div class="form-group row">
                <label class="col-xl-4 col-form-label">Current Password</label>
                <div class="col-xl-4">
                    <input class="form-control form-control-lg form-control-solid" type="Password"
                        value="">
                </div>
            </div>
            <!--begin::Form Group-->
            <div class="form-group row">
                <label class="col-xl-4 col-form-label">New Password</label>
                <div class="col-xl-4">
                    <input class="form-control form-control-lg form-control-solid" type="Password"
                        value="">
                </div>
            </div>
            <!--begin::Form Group-->
            <div class="form-group row">
                <label class="col-xl-4 col-form-label">Confirm New Password</label>
                <div class="col-xl-4">
                    <input class="form-control form-control-lg form-control-solid" type="Password"
                        value="">
                </div>
            </div>
            {{-- <div class="form-group row">
                <div class="col-lg-6">
                    <label>Dibayarkan kepada</label>
                    <input type="text" class="form-control" placeholder="Nama Legkap"/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" placeholder="Harga Satuan"/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Divisi / Departemen</label>
                    <input type="text" class="form-control" placeholder="Jumlah"/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Total Taksiran</label>
                    <input type="text" class="form-control" placeholder="Total"/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Terbilang</label>
                    <input type="text" class="form-control" placeholder="Terbilang"/>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Untuk Keperluan</label>
                    <input type="text" class="form-control" placeholder="Keterangan"/>
                </div>
                <div class="col-lg-6">
                    <label>Bukti Nota</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile"/>
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <span class="form-text text-muted">Jenis file JPG/PNG/PDF</span>
                </div>
            </div> --}}

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

@endsection