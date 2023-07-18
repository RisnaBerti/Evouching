<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../../">
    <meta charset="utf-8" />
    <title>Forgot Password | E-Vouching GSC</title>
    <meta name="description" content="Singin page example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!--begin::Fonts-->
    <link rel="stylesheet" href="{{ asset('https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700') }}" />
    <!--end::Fonts-->

    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('assets/css/pages/login/login-4.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->

    <link href="{{ asset('assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
            <!--begin::Content-->
            <div
                class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
                <!--begin::Wrapper-->
                <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                    <!--begin::Logo-->
                    <a href="#" class="login-logo pb-xl-20 pb-15">
                        <img src="{{ asset('assets/media/logos/logo-4.png') }}" class="max-h-70px" alt="" />
                    </a>
                    <!--end::Logo-->

                    <!--begin::Signin-->
                    <div class="login-form">
                        <!--begin::Title-->


                        <form action="{{ url('/forgot-password') }}" method="POST" class="form"
                            id="kt_login_forgot_form">
                            @csrf
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <!--begin::Title-->
                            <div class="pb-5 pb-lg-15">
                                <h3 class="font-weight-bolder text-dark font-size-h2 font-size-h1-lg">Forgotten Password
                                    ?</h3>
                                <p class="text-muted font-weight-bold font-size-h4">Enter your email to reset your
                                    password</p>
                            </div>
                            <!--end::Title-->

                            <!--begin::Form group-->
                            <div class="form-group">
                                <input
                                    class="form-control form-control-solid h-auto py-7 px-6 border-0 rounded-lg font-size-h6"
                                    type="email" placeholder="Email" name="email" autocomplete="off" />
                                @if ($errors->has('email'))
                                    <span class="alert text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <!--end::Form group-->

                            <!--begin::Form group-->
                            <div class="form-group d-flex flex-wrap">
                                <button type="submit" id="kt_login_forgot_form_submit_button"
                                    class="btn btn-primary font-weight-bolder font-size-h6 px-8 py-4 my-3 mr-4">Submit</button>
                                <a href="{{ url('/login') }}" id="kt_login_forgot_cancel"
                                    class="btn btn-light-primary font-weight-bolder font-size-h6 px-8 py-4 my-3">Cancel</a>
                            </div>
                            <!--end::Form group-->
                        </form>
                    </div>
                    <!--end::Signin-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--begin::Content-->

            <!--begin::Aside-->
            <div class="login-aside order-1 order-lg-2 bgi-no-repeat bgi-position-x-right">
                <div class="login-conteiner bgi-no-repeat bgi-position-x-right bgi-position-y-bottom"
                    style="background-image: url(assets/media/svg/illustrations/login-visual-4.svg);">
                    <!--begin::Aside title-->
                    <h3
                        class="pt-lg-40 pl-lg-20 pb-lg-0 pl-10 py-20 m-0 d-flex justify-content-lg-start font-weight-boldest display5 display1-lg text-white">
                        Menyapa<br />
                        Dhuafa<br />
                        dengan Cinta
                    </h3>
                    <!--end::Aside title-->
                </div>
            </div>
            <!--end::Aside-->
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<!--end::Body-->


</html>
