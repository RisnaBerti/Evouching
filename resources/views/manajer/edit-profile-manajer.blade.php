@extends('layouts.main')

@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <!--begin::Details-->
            <div class="d-flex mb-9">
                <!--begin: Pic-->
                <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                    @php
                        $name = explode(' ', Auth::user()->name);
                        $initials = substr($name[0], 0, 1);
                        if (count($name) > 1) {
                            $initials .= substr($name[1], 0, 1);
                        }
                    @endphp
                    <div class="symbol symbol-50 symbol-lg-120">
                        {{-- <img src="{{ $initials }}" alt="image" /> --}}
                        <span class="symbol symbol-35 symbol-light-success">
                            <span class="symbol-label font-size-h5 font-weight-bold">{{ $initials }}</span>
                        </span>
                    </div>

                    <div class="symbol symbol-50 symbol-lg-120 symbol-primary d-none">
                        <span class="font-size-h3 symbol-label font-weight-boldest">JM</span>
                    </div>
                </div>
                <!--end::Pic-->

                <!--begin::Info-->
                <div class="flex-grow-1">
                    <!--begin::Title-->
                    <div class="d-flex justify-content-between flex-wrap mt-1">
                        <div class="d-flex mr-3">
                            <a href="#"
                                class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ old('name', Auth::user()->name) }}</a>
                            <a href="#"><i class="flaticon2-correct text-success font-size-h5"></i></a>
                        </div>

                        <div class="my-lg-0 my-3">
                            <a href="/profile-manajer"
                                class="btn btn-sm btn-light-success font-weight-bolder text-uppercase">Kembali</a>
                        </div>
                    </div>
                    <!--end::Title-->

                    <!--begin::Content-->
                    <div class="d-flex flex-wrap justify-content-between mt-1">
                        <div class="d-flex flex-column flex-grow-1 pr-8">
                            <div class="d-flex flex-wrap mb-4">
                                <a href="/profile"
                                    class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i
                                        class="flaticon2-new-email mr-2 font-size-lg"></i>{{ old('name', Auth::user()->email) }}</a>
                                <a href="/profile"
                                    class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i
                                        class="flaticon2-calendar-3 mr-2 font-size-lg"></i>{{ old('jabatan', Auth::user()->jabatan) }}</a>
                                <a href="/profile" class="text-dark-50 text-hover-primary font-weight-bold"><i
                                        class="flaticon2-placeholder mr-2 font-size-lg"></i>{{ old('alamat', Auth::user()->alamat) }}</a>
                            </div>
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->

            <div class="separator separator-solid"></div>

            <!--begin::Items-->
            <div class="d-flex align-items-center flex-wrap mt-8">
                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">Transaksi</span>
                        <span class="font-weight-bolder font-size-h5"><span class="text-dark-50 font-weight-bold">Rp.
                                782,300</span></span>
                    </div>
                </div>
                <!--end::Item-->

                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-file-2 display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column flex-lg-fill">
                        <span class="text-dark-75 font-weight-bolder font-size-sm">Permohonan</span>
                        <span class="font-weight-bolder font-size-h5"><span
                                class="text-dark-50 font-weight-bold">782,300</span></span>
                    </div>
                </div>
                <!--end::Item-->
                <!--begin::Item-->
                <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                    <span class="mr-4">
                        <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
                    </span>
                    <div class="d-flex flex-column text-dark-75">
                        <span class="font-weight-bolder font-size-sm">Bergabung Sejak</span>
                        <span class="font-weight-bolder font-size-h5"><span
                                class="text-dark-50 font-weight-bold">{{ old('created_at', Auth::user()->created_at->format('D, d M Y')) }}</span></span>
                    </div>
                </div>
                <!--end::Item-->
            </div>
            <!--begin::Items-->
        </div>
    </div>
    <!--end::Card-->


    <div class="d-flex flex-row">
        <!--begin::Content-->
        <div class="flex-row-fluid ">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">Informasi Pribadi</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah Informasi pribadi</span>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" method="post" action="/edit-profile-manajer">
                    @csrf
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <strong>{{ $message }}</strong>
                        </div>
                    @endif
                    <div class="card-body">
                        <!--begin::Form Group-->
                        <input class="form-control form-control-lg form-control-solid" name="id" id="id"
                            type="hidden" value="{{ old('id', Auth::user()->id) }}">

                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label" for="name">Nama Lengkap</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" name="name" id="name"
                                    type="text" value="{{ old('name', Auth::user()->name) }}">
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label" for="divisi">Departmen</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" name="divisi" id="divisi"
                                    type="text" value="{{ old('divisi', Auth::user()->divisi) }}">
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label" for="jabatan">Jabatan</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" name="jabatan" id="jabatan"
                                    type="text" value="{{ old('jabatan', Auth::user()->jabatan) }}">
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label" for="email">Email</label>
                            <div class="col-lg-9 col-xl-7">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="la la-at"></i></span></div>
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        name="email" id="email" value="{{ old('email', Auth::user()->email) }}"
                                        readonly>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label" for="no_hp">No. Hp</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" name="no_hp"
                                    id="no_hp" type="text" value="{{ old('no_hp', Auth::user()->no_hp) }}">
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label" for="alamat">Alamat</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" name="alamat"
                                    id="alamat" type="text" value="{{ old('alamat', Auth::user()->alamat) }}">
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-success mr-2">Simpan</button>
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <!--begin::Form Group-->
                        <div class="separator separator-dashed "></div>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Content-->
    </div>
@endsection
