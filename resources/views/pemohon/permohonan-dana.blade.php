@extends('layouts.main')

@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b example example-compact">
        <!--begin::Form-->
        <form class="form">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <h3 class="card-title">
                            PENGAJUAN PERMOHONAN DANA
                        </h3>
                    </div>
                    <div class="col">
                        <div class="col align-self-end">
                            One of three columns
                        </div>
                        <div class="col align-self-end">
                            One of three columns
                        </div>
                        <div class="col align-self-end">
                            One of three columns
                        </div>
                    </div>
                </div>
                <div class="separator separator-dashed "></div>

                {{-- <div class="form-group row mt-3">
                <label class="col-lg-1 col-form-label text-right">Full Name</label>
                <div class="col-lg-3">
                    <input type="email" class="form-control" placeholder="Full name"/>
                </div>
                <label class="col-lg-1 col-form-label text-right">Email:</label>
                <div class="col-lg-3">
                    <input type="email" class="form-control" placeholder="Email"/>
                </div>
                <label class="col-lg-1 col-form-label text-right">Username:</label>
                <div class="col-lg-3">
                    <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                        <input type="text" class="form-control" placeholder=""/>
                    </div>
                </div>
            </div> --}}

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
                        <button type="reset" class="btn btn-primary mr-2">Submit</button>
                    </div>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </div>
    <!--end::Card-->
@endsection
