@extends('layouts.main-bendahara')

@section('content')
<!--begin::Card-->
<div class="card card-custom gutter-b example example-compact">
    <div class="card-header">
        <h3 class="card-title">
            BUKTI PEMBAYARAN REIMBUSE
        </h3>
        <div class="card-toolbar">

        </div>
    </div>

    <!--begin::Form-->
    <form class="form">
        <div class="card-body">
            <div class="form-group row">
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

@endsection