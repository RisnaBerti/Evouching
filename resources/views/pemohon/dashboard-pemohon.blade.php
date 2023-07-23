@extends('layouts.main-pemohon')
@section('content')
    <!-- Dashboard -->
    <div class="row">
        <div class="col-lg-6 col-xxl-4">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0  " style="background-color: #2C3580">
                    <h3 class="card-title font-weight-bolder text-white text-center">E-Vouching GSC</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                    <!--begin::Chart-->
                    <div class="card-rounded-bottom"
                        style="height: 200px; min-height: 200px; background-color: #2C3580">

                        <h3 class="card-title font-weight-bolder text-white text-center">Selamat Datang <br> Dashboard Pemohon</h3>
                       
                        {{-- <div id="apexchartskma0simii" class="apexcharts-canvas apexchartskma0simii apexcharts-theme-light"
                            style="width: 413px; height: 200px;"><svg id="SvgjsSvg1082" width="413" height="200"
                                xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                                xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS"
                                transform="translate(0, 0)" style="background: transparent;">
                                <g id="SvgjsG1084" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(0, 0)">
                                    <defs id="SvgjsDefs1083">
                                        <clipPath id="gridRectMaskkma0simii">
                                            <rect id="SvgjsRect1087" width="420" height="203" x="-3.5"
                                                y="-1.5" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="gridRectMarkerMaskkma0simii">
                                            <rect id="SvgjsRect1088" width="417" height="204" x="-2"
                                                y="-2" rx="0" ry="0" opacity="1" stroke-width="0"
                                                stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                        </clipPath>
                                        <filter id="SvgjsFilter1094" filterUnits="userSpaceOnUse" width="200%"
                                            height="200%" x="-50%" y="-50%">
                                            <feFlood id="SvgjsFeFlood1095" flood-color="#d13647" flood-opacity="0.5"
                                                result="SvgjsFeFlood1095Out" in="SourceGraphic"></feFlood>
                                            <feComposite id="SvgjsFeComposite1096" in="SvgjsFeFlood1095Out"
                                                in2="SourceAlpha" operator="in" result="SvgjsFeComposite1096Out">
                                            </feComposite>
                                            <feOffset id="SvgjsFeOffset1097" dx="0" dy="5"
                                                result="SvgjsFeOffset1097Out" in="SvgjsFeComposite1096Out"></feOffset>
                                            <feGaussianBlur id="SvgjsFeGaussianBlur1098" stdDeviation="3 "
                                                result="SvgjsFeGaussianBlur1098Out" in="SvgjsFeOffset1097Out">
                                            </feGaussianBlur>
                                            <feMerge id="SvgjsFeMerge1099" result="SvgjsFeMerge1099Out" in="SourceGraphic">
                                                <feMergeNode id="SvgjsFeMergeNode1100" in="SvgjsFeGaussianBlur1098Out">
                                                </feMergeNode>
                                                <feMergeNode id="SvgjsFeMergeNode1101" in="[object Arguments]">
                                                </feMergeNode>
                                            </feMerge>
                                            <feBlend id="SvgjsFeBlend1102" in="SourceGraphic" in2="SvgjsFeMerge1099Out"
                                                mode="normal" result="SvgjsFeBlend1102Out"></feBlend>
                                        </filter>
                                        <filter id="SvgjsFilter1104" filterUnits="userSpaceOnUse" width="200%"
                                            height="200%" x="-50%" y="-50%">
                                            <feFlood id="SvgjsFeFlood1105" flood-color="#d13647" flood-opacity="0.5"
                                                result="SvgjsFeFlood1105Out" in="SourceGraphic"></feFlood>
                                            <feComposite id="SvgjsFeComposite1106" in="SvgjsFeFlood1105Out"
                                                in2="SourceAlpha" operator="in" result="SvgjsFeComposite1106Out">
                                            </feComposite>
                                            <feOffset id="SvgjsFeOffset1107" dx="0" dy="5"
                                                result="SvgjsFeOffset1107Out" in="SvgjsFeComposite1106Out"></feOffset>
                                            <feGaussianBlur id="SvgjsFeGaussianBlur1108" stdDeviation="3 "
                                                result="SvgjsFeGaussianBlur1108Out" in="SvgjsFeOffset1107Out">
                                            </feGaussianBlur>
                                            <feMerge id="SvgjsFeMerge1109" result="SvgjsFeMerge1109Out"
                                                in="SourceGraphic">
                                                <feMergeNode id="SvgjsFeMergeNode1110" in="SvgjsFeGaussianBlur1108Out">
                                                </feMergeNode>
                                                <feMergeNode id="SvgjsFeMergeNode1111" in="[object Arguments]">
                                                </feMergeNode>
                                            </feMerge>
                                            <feBlend id="SvgjsFeBlend1112" in="SourceGraphic" in2="SvgjsFeMerge1109Out"
                                                mode="normal" result="SvgjsFeBlend1112Out"></feBlend>
                                        </filter>
                                    </defs>
                                    <g id="SvgjsG1113" class="apexcharts-xaxis" transform="translate(0, 0)">
                                        <g id="SvgjsG1114" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)">
                                        </g>
                                    </g>
                                    <g id="SvgjsG1116" class="apexcharts-grid">
                                        <g id="SvgjsG1117" class="apexcharts-gridlines-horizontal"
                                            style="display: none;">
                                            <line id="SvgjsLine1119" x1="0" y1="0" x2="413"
                                                y2="0" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1120" x1="0" y1="20" x2="413"
                                                y2="20" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1121" x1="0" y1="40" x2="413"
                                                y2="40" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1122" x1="0" y1="60" x2="413"
                                                y2="60" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1123" x1="0" y1="80" x2="413"
                                                y2="80" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1124" x1="0" y1="100" x2="413"
                                                y2="100" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1125" x1="0" y1="120" x2="413"
                                                y2="120" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1126" x1="0" y1="140" x2="413"
                                                y2="140" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1127" x1="0" y1="160" x2="413"
                                                y2="160" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1128" x1="0" y1="180" x2="413"
                                                y2="180" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                            <line id="SvgjsLine1129" x1="0" y1="200" x2="413"
                                                y2="200" stroke="#e0e0e0" stroke-dasharray="0"
                                                class="apexcharts-gridline"></line>
                                        </g>
                                        <g id="SvgjsG1118" class="apexcharts-gridlines-vertical" style="display: none;">
                                        </g>
                                        <line id="SvgjsLine1131" x1="0" y1="200" x2="413"
                                            y2="200" stroke="transparent" stroke-dasharray="0"></line>
                                        <line id="SvgjsLine1130" x1="0" y1="1" x2="0"
                                            y2="200" stroke="transparent" stroke-dasharray="0"></line>
                                    </g>
                                    <g id="SvgjsG1089" class="apexcharts-area-series apexcharts-plot-series">
                                        <g id="SvgjsG1090" class="apexcharts-series" seriesName="NetxProfit"
                                            data:longestSeries="true" rel="1" data:realIndex="0">
                                            <path id="SvgjsPath1093"
                                                d="M0 200L0 125C24.091666666666665 125 44.74166666666666 87.5 68.83333333333333 87.5C92.925 87.5 113.57499999999999 120 137.66666666666666 120C161.75833333333333 120 182.40833333333333 25 206.5 25C230.59166666666667 25 251.24166666666665 100 275.3333333333333 100C299.42499999999995 100 320.075 100 344.16666666666663 100C368.2583333333333 100 388.9083333333333 100 413 100C413 100 413 100 413 200M413 100C413 100 413 100 413 100 "
                                                fill="transparent" fill-opacity="1" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="0" stroke-dasharray="0"
                                                class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskkma0simii)" filter="url(#SvgjsFilter1094)"
                                                pathTo="M 0 200L 0 125C 24.091666666666665 125 44.74166666666666 87.5 68.83333333333333 87.5C 92.925 87.5 113.57499999999999 120 137.66666666666666 120C 161.75833333333333 120 182.40833333333333 25 206.5 25C 230.59166666666667 25 251.24166666666665 100 275.3333333333333 100C 299.42499999999995 100 320.075 100 344.16666666666663 100C 368.2583333333333 100 388.9083333333333 100 413 100C 413 100 413 100 413 200M 413 100z"
                                                pathFrom="M -1 200L -1 200L 68.83333333333333 200L 137.66666666666666 200L 206.5 200L 275.3333333333333 200L 344.16666666666663 200L 413 200">
                                            </path>
                                            <path id="SvgjsPath1103"
                                                d="M0 125C24.091666666666665 125 44.74166666666666 87.5 68.83333333333333 87.5C92.925 87.5 113.57499999999999 120 137.66666666666666 120C161.75833333333333 120 182.40833333333333 25 206.5 25C230.59166666666667 25 251.24166666666665 100 275.3333333333333 100C299.42499999999995 100 320.075 100 344.16666666666663 100C368.2583333333333 100 388.9083333333333 100 413 100C413 100 413 100 413 100 "
                                                fill="none" fill-opacity="1" stroke="#d13647" stroke-opacity="1"
                                                stroke-linecap="butt" stroke-width="3" stroke-dasharray="0"
                                                class="apexcharts-area" index="0"
                                                clip-path="url(#gridRectMaskkma0simii)" filter="url(#SvgjsFilter1104)"
                                                pathTo="M 0 125C 24.091666666666665 125 44.74166666666666 87.5 68.83333333333333 87.5C 92.925 87.5 113.57499999999999 120 137.66666666666666 120C 161.75833333333333 120 182.40833333333333 25 206.5 25C 230.59166666666667 25 251.24166666666665 100 275.3333333333333 100C 299.42499999999995 100 320.075 100 344.16666666666663 100C 368.2583333333333 100 388.9083333333333 100 413 100"
                                                pathFrom="M -1 200L -1 200L 68.83333333333333 200L 137.66666666666666 200L 206.5 200L 275.3333333333333 200L 344.16666666666663 200L 413 200">
                                            </path>
                                            <g id="SvgjsG1091" class="apexcharts-series-markers-wrap" data:realIndex="0">
                                                <g class="apexcharts-series-markers">
                                                    <circle id="SvgjsCircle1137" r="0" cx="0"
                                                        cy="0"
                                                        class="apexcharts-marker w25a7motg no-pointer-events"
                                                        stroke="#d13647" fill="#ffe2e5" fill-opacity="1"
                                                        stroke-width="3" stroke-opacity="0.9" default-marker-size="0">
                                                    </circle>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1092" class="apexcharts-datalabels" data:realIndex="0"></g>
                                    </g>
                                    <line id="SvgjsLine1132" x1="0" y1="0" x2="413"
                                        y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1133" x1="0" y1="0" x2="413"
                                        y2="0" stroke-dasharray="0" stroke-width="0"
                                        class="apexcharts-ycrosshairs-hidden"></line>
                                    <g id="SvgjsG1134" class="apexcharts-yaxis-annotations"></g>
                                    <g id="SvgjsG1135" class="apexcharts-xaxis-annotations"></g>
                                    <g id="SvgjsG1136" class="apexcharts-point-annotations"></g>
                                </g>
                                <g id="SvgjsG1115" class="apexcharts-yaxis" rel="0"
                                    transform="translate(-18, 0)"></g>
                                <g id="SvgjsG1085" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-light">
                                <div class="apexcharts-tooltip-title" style="font-family: Poppins; font-size: 12px;">
                                </div>
                                <div class="apexcharts-tooltip-series-group"><span class="apexcharts-tooltip-marker"
                                        style="background-color: transparent;"></span>
                                    <div class="apexcharts-tooltip-text" style="font-family: Poppins; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-label"></span><span
                                                class="apexcharts-tooltip-text-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                <div class="apexcharts-yaxistooltip-text"></div>
                            </div>
                        </div> --}}
                    </div>
                    <!--end::Chart-->

                    <!--begin::Stats-->
                    <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-light-white px-6 py-6 rounded-xl mr-5 mb-7">
                                <span class="svg-icon svg-icon-primary svg-icon-3x">
                                    <!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Shopping\Gift.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M4,6 L20,6 C20.5522847,6 21,6.44771525 21,7 L21,8 C21,8.55228475 20.5522847,9 20,9 L4,9 C3.44771525,9 3,8.55228475 3,8 L3,7 C3,6.44771525 3.44771525,6 4,6 Z M5,11 L10,11 C10.5522847,11 11,11.4477153 11,12 L11,19 C11,19.5522847 10.5522847,20 10,20 L5,20 C4.44771525,20 4,19.5522847 4,19 L4,12 C4,11.4477153 4.44771525,11 5,11 Z M14,11 L19,11 C19.5522847,11 20,11.4477153 20,12 L20,19 C20,19.5522847 19.5522847,20 19,20 L14,20 C13.4477153,20 13,19.5522847 13,19 L13,12 C13,11.4477153 13.4477153,11 14,11 Z"
                                                fill="#000000"></path>
                                            <path
                                                d="M14.4452998,2.16794971 C14.9048285,1.86159725 15.5256978,1.98577112 15.8320503,2.4452998 C16.1384028,2.90482849 16.0142289,3.52569784 15.5547002,3.83205029 L12,6.20185043 L8.4452998,3.83205029 C7.98577112,3.52569784 7.86159725,2.90482849 8.16794971,2.4452998 C8.47430216,1.98577112 9.09517151,1.86159725 9.5547002,2.16794971 L12,3.79814957 L14.4452998,2.16794971 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span
                                    class="card-title font-weight-bolder text-dark-75 font-size-h2 mb-0 mt-6 d-block"></span>
                                <span class="font-weight-bold text-muted  font-size-sm">Total Dana Permohonan</span>
                                <span class="font-weight-bold text-muted  font-size-sm">{{ $countDanaAccId }}</span>
                            </div>
                            <div class="col px-6 py-8 rounded-xl mb-7">
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 414px; height: 463px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Mixed Widget 1-->
        </div>
        <div class="col-lg-6 col-xxl-4">
            <!--begin::List Widget 9-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header align-items-center border-0 mt-4">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="font-weight-bolder text-dark">My Activity</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">permohonan dana</span>
                    </h3>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::Timeline-->
                    <div class="timeline timeline-6 mt-3">
                        <div class="item-ac"></div>
                    </div>
                    <!--end::Timeline-->
                </div>
                <!--end: Card Body-->
            </div>
            <!--end: List Widget 9-->
        </div>
    </div>
    <!-- end dashboard -->

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
                <h3 class="card-label">Permohonan Dana</h3>
            </div>
        </div>
        <div class="card-body">
            <!--begin: Datatable-->
            <table class="table table-bordered table-permohonandana" id="table-permohonandana"
                style="margin-top: 13px !important">
                <thead>
                    </tr>
                    <th>
                        <center>NO</center>
                    </th>
                    <th hidden>
                        <center>id_permohonan</center>
                    </th>
                    <th>
                        <center>NAMA</center>
                    </th>
                    <th>
                        <center>TOTAL PERMOHONAN</center>
                    </th>
                    <th>
                        <center>NOMINAL ACC</center>
                    </th>
                    <th>
                        <center>KETERANGAN</center>
                    </th>
                    <th>
                        <center>STATUS</center>
                    </th>
                </thead>
                <tbody>
                    @foreach ($data as $d)
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
                                <center>{{ $d->total_dana_ajuan }}</center>
                            </td>
                            <td>
                                <center>{{ $d->nominal_acc }}</center>
                            </td>
                            <td>
                                <center>{{ $d->keterangan_permohonan }}</center>
                            </td>
                            <td>
                                <center>
                                    @if ($d->status_permohonan == '0')
                                        <span
                                            class="label label-lg font-weight-bold label-secondary label-inline">Belum
                                            ACC</span>
                                    @elseif ($d->status_permohonan == '2')
                                        <span
                                            class="label label-lg font-weight-bold label-light-warning label-inline">Diperiksa
                                            Pemeriksa
                                        </span>
                                    @elseif ($d->status_permohonan == '1')
                                        <span class="label label-lg font-weight-bold label-light-primary label-inline">
                                            Diperiksa Bendahara</span>
                                    @elseif ($d->status_permohonan == '3')
                                        <span
                                            class="label label-lg font-weight-bold label-light-success label-inline">SUDAH
                                            ACC
                                        </span>
                                    @elseif ($d->status_permohonan == '4')
                                        <span
                                            class="label label-lg font-weight-bold label-light-danger label-inline">DITOLAK
                                        </span>
                                    @endif
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
            //Mengaktifkan datatable
            $('#table-permohonandana').DataTable({
                paging: true,
            });

            get();

            function get() {

                $.get("{{ url('/activiti-pemohon/get') }}", {
                    _token: "{{ csrf_token() }}"
                }).done(function(data) {

                    var res = $.parseJSON(data);


                    $.each(res, function(indexRow, value) {

                        var tanggal = value.tanggal_permohonan.split("-").reverse().join("-");

                        var bulan = tanggal.split("-")[1];
                        var tahun = tanggal.split("-")[0];

                        if (value.status_permohonan == '1') {

                            var html =
                                '<div class="timeline-item align-items-start"><div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">' +
                                bulan + '/' + tahun +
                                '</div><div class="timeline-badge"><i class="fa fa-genderless text-warning  icon-xl"></i></div><div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">' +
                                value.keterangan_permohonan +
                                ' <a href="#" class="text-primary">#' + value.no_resi_ajuan +
                                '</a>.</div> </div>';
                        } else if (value.status_permohonan == '2') {

                            var html =
                                '<div class="timeline-item align-items-start"><div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">' +
                                bulan + '/' + tahun +
                                '</div><div class="timeline-badge"><i class="fa fa-genderless text-primary icon-xl"></i></div><div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">' +
                                value.keterangan_permohonan +
                                ' <a href="#" class="text-primary">#' + value.no_resi_ajuan +
                                '</a>.</div> </div>';

                        } else if (value.status_permohonan == '3') {

                            var html =
                                '<div class="timeline-item align-items-start"><div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">' +
                                bulan + '/' + tahun +
                                '</div><div class="timeline-badge"><i class="fa fa-genderless text-success icon-xl"></i></div><div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">' +
                                value.keterangan_permohonan +
                                ' <a href="#" class="text-primary">#' + value.no_resi_ajuan +
                                '</a>.</div> </div>';

                        } else if (value.status_permohonan == '4') {

                            var html =
                                '<div class="timeline-item align-items-start"><div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">' +
                                bulan + '/' + tahun +
                                '</div><div class="timeline-badge"><i class="fa fa-genderless text-danger icon-xl"></i></div><div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">' +
                                value.keterangan_permohonan +
                                ' <a href="#" class="text-primary">#' + value.no_resi_ajuan +
                                '</a>.</div> </div>';

                        } else {

                            var html =
                                '<div class="timeline-item align-items-start"><div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">' +
                                bulan + '/' + tahun +
                                '</div><div class="timeline-badge"><i class="fa fa-genderless text-info icon-xl"></i></div><div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">' +
                                value.keterangan_permohonan +
                                ' <a href="#" class="text-primary">#' + value.no_resi_ajuan +
                                '</a>.</div> </div>';

                        }





                        $('.item-ac').append(html);


                    });

                });

            }


        });
    </script>
@endsection
