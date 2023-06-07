<!DOCTYPE html>
<html lang="en">

<!--begin::Head-->


<head>
    <style type="text/css">
        .tg {
            border-collapse: collapse;
            border-spacing: 0;
        }

        .tg td {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg th {
            border-color: black;
            border-style: solid;
            border-width: 1px;
            font-family: Arial, sans-serif;
            font-size: 14px;
            font-weight: normal;
            overflow: hidden;
            padding: 10px 5px;
            word-break: normal;
        }

        .tg .tg-x244 {
            background-color: #cbcefb;
            border-color: #000000;
            color: #000000;
            font-family: "Times New Roman", Times, serif !important;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            vertical-align: top
        }
    </style>
    <base href="">
    <meta charset="utf-8" />
    <title> {{ $title }} | E-Vouching GSC</title>
    <meta name="description" content="Manajemen web dunibuah" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />

    <!--end::Fonts-->

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{ url('') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />

    <link href="{{ url('') }}/assets/plugins/custom/datatables/datatables.bundle.css?v=7.1.6" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ url('') }}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/plugins/custom/prismjs/prismjs.bundle.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
    <!-- <link href="{{ url('') }}/assets/css/sweetalert2.min.css" rel="stylesheet" type="text/css" /> -->

    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ url('') }}/assets/css/themes/layout/header/base/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/css/themes/layout/header/menu/light.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/css/themes/layout/brand/dark.css" rel="stylesheet" type="text/css" />
    <link href="{{ url('') }}/assets/css/themes/layout/aside/dark.css" rel="stylesheet" type="text/css" />

    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="{{ url('') }}/assets/media/logos/favicon.ico" />

    <link rel="stylesheet" href="{{ url('') }}/assets/dropzone/593/dropzone.min.css" type="text/css" />


    <link href="/{{ url('') }}/assets/datatable/datatables.min.css" rel="stylesheet" />

    <script src="/{{ url('') }}/assets/jquery/jquery-3.6.4.min.js"></script>

    <script src="/{{ url('') }}/assets/dropzone/593/dropzone.min.js"></script>

    <script src="/{{ url('') }}/assets/datatable/datatables.min.js"></script>

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body"
    class="header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">

    @include('layouts.layout-bendahara')

    <script>
        var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";
    </script>

    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            "breakpoints": {
                "sm": 576,
                "md": 768,
                "lg": 992,
                "xl": 1200,
                "xxl": 1400
            },
            "colors": {
                "theme": {
                    "base": {
                        "white": "#ffffff",
                        "primary": "#3699FF",
                        "secondary": "#E5EAEE",
                        "success": "#1BC5BD",
                        "info": "#8950FC",
                        "warning": "#FFA800",
                        "danger": "#F64E60",
                        "light": "#E4E6EF",
                        "dark": "#181C32"
                    },
                    "light": {
                        "white": "#ffffff",
                        "primary": "#E1F0FF",
                        "secondary": "#EBEDF3",
                        "success": "#C9F7F5",
                        "info": "#EEE5FF",
                        "warning": "#FFF4DE",
                        "danger": "#FFE2E5",
                        "light": "#F3F6F9",
                        "dark": "#D6D6E0"
                    },
                    "inverse": {
                        "white": "#ffffff",
                        "primary": "#ffffff",
                        "secondary": "#3F4254",
                        "success": "#ffffff",
                        "info": "#ffffff",
                        "warning": "#ffffff",
                        "danger": "#ffffff",
                        "light": "#464E5F",
                        "dark": "#ffffff"
                    }
                },
                "gray": {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#EBEDF3",
                    "gray-300": "#E4E6EF",
                    "gray-400": "#D1D3E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#7E8299",
                    "gray-700": "#5E6278",
                    "gray-800": "#3F4254",
                    "gray-900": "#181C32"
                }
            },
            "font-family": "Poppins"
        };
    </script>

    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ url('') }}/assets/plugins/global/plugins.bundle.js"></script>
    <script src="{{ url('') }}/assets/plugins/custom/prismjs/prismjs.bundle.js"></script>
    <script src="{{ url('') }}/assets/js/scripts.bundle.js"></script>
    <script src="{{ url('') }}/assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="{{ url('') }}/assets/js/pages/crud/datatables/extensions/responsive.min.js"></script>
    <!--end::Global Theme Bundle-->

    <!--begin::Page Vendors(used by this page)-->
    <script src="{{ url('') }}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>

    <!--end::Page Vendors-->

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ url('') }}/assets/js/pages/widgets.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>

    <!-- our project just needs Font Awesome Solid + Brands -->
    <link href="/{{ url('') }}/assets/fontawesome/css/fontawesome.css" rel="stylesheet">
    <link href="/{{ url('') }}/assets/fontawesome/css/brands.css" rel="stylesheet">
    <link href="/{{ url('') }}/assets/fontawesome/css/solid.css" rel="stylesheet">


    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>
