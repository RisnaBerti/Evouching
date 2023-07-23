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
                        <h3 class="card-label font-weight-bolder text-dark">Informasi Akun</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Ubah kata sandi Anda</span>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form" method="post" action="/change-password-manajer">
                    @csrf
                    <div class="card-body">
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                {{ $message }}
                            </div>
                        @endif
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label" for="old_password">Kata sandi saat ini</label>
                            <div class="col-lg-9 col-xl-7">
                                <input
                                    class="form-control form-control-lg form-control-solid @error('old_password') is-invalid @enderror"
                                    type="Password" name="old_password" id="old_password">
                                @error('old_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label" for="new_password">Kata sandi baru</label>
                            <div class="col-lg-9 col-xl-7">
                                <input
                                    class="form-control form-control-lg form-control-solid @error('new_password') is-invalid @enderror"
                                    type="Password" name="new_password" id="new_password">
                                @error('new_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label" for="confirm_password">Konfirmasi password
                                baru</label>
                            <div class="col-lg-9 col-xl-7">
                                <input
                                    class="form-control form-control-lg form-control-solid @error('confirm_password') is-invalid @enderror"
                                    type="Password" name="confirm_password" id="confirm_password">
                                @error('confirm_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-toolbar">
                            <button type="submit" class="btn btn-success mr-2">Simpan</button>
                        </div>
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
