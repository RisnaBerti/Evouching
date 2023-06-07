@extends('layouts.main-bendahara')

@section('content')
    <!-- Dashboard -->
    <div class="row">
        <div class="col-lg-6 col-xxl-4">
            <!--begin::Mixed Widget 1-->
            <div class="card card-custom bg-gray-100 card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0  py-5" style="background-color: #2C3580">
                    <h3 class="card-title font-weight-bolder text-white">Grafik Transaksi</h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body p-0 position-relative overflow-hidden">
                    <!--begin::Chart-->
                    <div id="kt_mixed_widget_1_chart" class="card-rounded-bottom "
                        style="height: 200px; min-height: 200px; background-color: #2C3580">
                        <div id="apexchartskma0simii" class="apexcharts-canvas apexchartskma0simii apexcharts-theme-light"
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
                        </div>
                    </div>
                    <!--end::Chart-->

                    <!--begin::Stats-->
                    <div class="card-spacer mt-n25">
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col bg-light-white px-6 py-8 rounded-xl mr-7 mb-7">
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
                                <span class="font-weight-bold text-muted  font-size-sm">Total Dana ACC </span>
                                <span class="font-weight-bold text-muted  font-size-sm">{{ $danaAccCount }}</span>
                            </div>
                            <div class="col bg-light-white px-6 py-8 rounded-xl mb-7">
                                <span class="svg-icon svg-icon-3x svg-icon-primary d-block my-2">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path
                                                d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                            <path
                                                d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="font-weight-bold text-muted  font-size-sm">Total User
                                    {{ $danabank }}</span>
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row m-0">
                            <div class="col px-6 py-8 rounded-xl mr-7" style="background-color: #2C3580">
                                <span class="svg-icon svg-icon-3x svg-icon-white d-block my-2">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path
                                                d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                fill="#000000" fill-rule="nonzero"></path>
                                            <path
                                                d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                fill="#000000" opacity="0.3"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="font-weight-bold text-muted  font-size-sm">Total Dana Kas
                                    {{ $danakas }}</span>
                            </div>
                            <div class="col px-6 py-8 rounded-xl" style="background-color: #2C3580">
                                <span class="svg-icon svg-icon-3x svg-icon-white d-block my-2">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Urgent-mail.svg--><svg
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect x="0" y="0" width="24" height="24"></rect>
                                            <path
                                                d="M12.7037037,14 L15.6666667,10 L13.4444444,10 L13.4444444,6 L9,12 L11.2222222,12 L11.2222222,14 L6,14 C5.44771525,14 5,13.5522847 5,13 L5,3 C5,2.44771525 5.44771525,2 6,2 L18,2 C18.5522847,2 19,2.44771525 19,3 L19,13 C19,13.5522847 18.5522847,14 18,14 L12.7037037,14 Z"
                                                fill="#000000" opacity="0.3"></path>
                                            <path
                                                d="M9.80428954,10.9142091 L9,12 L11.2222222,12 L11.2222222,16 L15.6666667,10 L15.4615385,10 L20.2072547,6.57253826 C20.4311176,6.4108595 20.7436609,6.46126971 20.9053396,6.68513259 C20.9668779,6.77033951 21,6.87277228 21,6.97787787 L21,17 C21,18.1045695 20.1045695,19 19,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,6.97787787 C3,6.70173549 3.22385763,6.47787787 3.5,6.47787787 C3.60510559,6.47787787 3.70753836,6.51099993 3.79274528,6.57253826 L9.80428954,10.9142091 Z"
                                                fill="#000000"></path>
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="font-weight-bold text-muted  font-size-sm">Total User
                                    {{ $userCount }}</span>
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
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">890,344 Sales</span>
                    </h3>
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body pt-4">
                    <!--begin::Timeline-->
                    <div class="timeline timeline-6 mt-3">
                        <!--begin::Item-->
                        <div class="timeline-item align-items-start">
                            <!--begin::Label-->
                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">08:42</div>
                            <!--end::Label-->

                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-warning icon-xl"></i>
                            </div>
                            <!--end::Badge-->

                            <!--begin::Text-->
                            <div class="font-weight-mormal font-size-lg timeline-content text-muted pl-3">
                                Outlines keep you honest. And keep structure
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="timeline-item align-items-start">
                            <!--begin::Label-->
                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">10:00</div>
                            <!--end::Label-->

                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-success icon-xl"></i>
                            </div>
                            <!--end::Badge-->

                            <!--begin::Content-->
                            <div class="timeline-content d-flex">
                                <span class="font-weight-bolder text-dark-75 pl-3 font-size-lg">AEOL meeting</span>
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="timeline-item align-items-start">
                            <!--begin::Label-->
                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">14:37</div>
                            <!--end::Label-->

                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger icon-xl"></i>
                            </div>
                            <!--end::Badge-->

                            <!--begin::Desc-->
                            <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">
                                Make deposit
                                <a href="#" class="text-primary">USD 700</a>.
                                to ESL
                            </div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="timeline-item align-items-start">
                            <!--begin::Label-->
                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
                            <!--end::Label-->

                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-primary icon-xl"></i>
                            </div>
                            <!--end::Badge-->

                            <!--begin::Text-->
                            <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">
                                Indulging in poorly driving and keep structure keep great
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="timeline-item align-items-start">
                            <!--begin::Label-->
                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
                            <!--end::Label-->

                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger icon-xl"></i>
                            </div>
                            <!--end::Badge-->

                            <!--begin::Desc-->
                            <div class="timeline-content font-weight-bolder text-dark-75 pl-3 font-size-lg">
                                New order placed <a href="#" class="text-primary">#XF-2356</a>.
                            </div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="timeline-item align-items-start">
                            <!--begin::Label-->
                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">23:07</div>
                            <!--end::Label-->

                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-info icon-xl"></i>
                            </div>
                            <!--end::Badge-->

                            <!--begin::Text-->
                            <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">
                                Outlines keep and you honest. Indulging in poorly driving
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="timeline-item align-items-start">
                            <!--begin::Label-->
                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">16:50</div>
                            <!--end::Label-->

                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-primary icon-xl"></i>
                            </div>
                            <!--end::Badge-->

                            <!--begin::Text-->
                            <div class="timeline-content font-weight-mormal font-size-lg text-muted pl-3">
                                Indulging in poorly driving and keep structure keep great
                            </div>
                            <!--end::Text-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Item-->
                        <div class="timeline-item align-items-start">
                            <!--begin::Label-->
                            <div class="timeline-label font-weight-bolder text-dark-75 font-size-lg">21:03</div>
                            <!--end::Label-->

                            <!--begin::Badge-->
                            <div class="timeline-badge">
                                <i class="fa fa-genderless text-danger icon-xl"></i>
                            </div>
                            <!--end::Badge-->

                            <!--begin::Desc-->
                            <div class="timeline-content font-weight-bolder font-size-lg text-dark-75 pl-3">
                                New order placed <a href="#" class="text-primary">#XF-2356</a>.
                            </div>
                            <!--end::Desc-->
                        </div>
                        <!--end::Item-->
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
                        <center>DIVISI</center>
                    </th>
                    <th>
                        <center>JABATAN</center>
                    </th>
                    <th>
                        <center>TOTAL HARGA</center>
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
                                <center>{{ $d->divisi }}</center>
                            </td>
                            <td>
                                <center>{{ $d->jabatan }}</center>
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
                                    @if ($d->ttd_bendahara == '0')
                                        <span class="label label-lg font-weight-bold label-light-danger label-inline">Belum
                                            ACC</span>
                                    @elseif ($d->ttd_bendahara == '1')
                                        <span
                                            class="label label-lg font-weight-bold label-light-primary label-inline">Sudah
                                            ACC
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

        });
    </script>
@endsection
