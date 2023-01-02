@extends('layouts.main')

@section('content')
    <!--begin::Card-->
    <div class="card card-custom gutter-b">
        <div class="card-body">
            <!--begin::Details-->
            <div class="d-flex ">
                <!--begin: Pic-->
                <div class="flex-shrink-0 mr-7 mt-lg-0 mt-3">
                    <div class="symbol symbol-50 symbol-lg-120">
                        <img src="assets/media/users/300_1.jpg" alt="image" />
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
                            <a href=""
                                class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">Jason Muller</a>
                            <a href=""><i class="flaticon2-correct text-success font-size-h5"></i></a>
                        </div>

                        {{-- <div class="my-lg-0 my-3">
                        <a href="#" class="btn btn-sm btn-light-success font-weight-bolder text-uppercase mr-3">ask</a>
                        <a href="#" class="btn btn-sm btn-info font-weight-bolder text-uppercase">hire</a>
                    </div> --}}
                    </div>
                    <!--end::Title-->

                    <!--begin::Content-->
                    <div class="d-flex flex-wrap justify-content-between mt-1">
                        <div class="d-flex flex-column flex-grow-1 pr-8">
                            <div class="d-flex flex-wrap mb-4">
                                <a href=""
                                    class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i
                                        class="flaticon2-new-email mr-2 font-size-lg"></i>jason@siastudio.com</a>
                                <a href=""
                                    class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2"><i
                                        class="flaticon2-calendar-3 mr-2 font-size-lg"></i>PR Manager </a>
                                <a href="" class="text-dark-50 text-hover-primary font-weight-bold"><i
                                        class="flaticon2-placeholder mr-2 font-size-lg"></i>Melbourne</a>
                            </div>

                                            {{-- <span class="font-weight-bold text-dark-50">I distinguish three main text objectives could be merely to inform people.</span>
                                        <span class="font-weight-bold text-dark-50">A second could be persuade people.You want people to bay objective</span>
                                    --}}
                        </div>
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Details-->
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
                        <h3 class="card-label font-weight-bolder text-dark">Personal Information</h3>
                        <span class="text-muted font-weight-bold font-size-sm mt-1">Change your personal settings</span>
                    </div>
                    <div class="card-toolbar">
                        <button type="reset" class="btn btn-success mr-2">Save Changes</button>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label">Fullname</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    value="">
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label">Departmen</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    value="">
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label">Position</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    value="">
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label">Email Address</label>
                            <div class="col-lg-9 col-xl-7">
                                <div class="input-group input-group-lg input-group-solid">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="la la-at"></i></span></div>
                                    <input type="text" class="form-control form-control-lg form-control-solid"
                                        value="nick.watson@loop.com" readonly>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label">Contact Phone</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    value="">
                            </div>
                        </div>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-5 col-lg-3 col-form-label">Address</label>
                            <div class="col-lg-9 col-xl-7">
                                <input class="form-control form-control-lg form-control-solid" type="text"
                                    value="">
                            </div>
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
