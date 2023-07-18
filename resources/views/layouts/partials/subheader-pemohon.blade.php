<!--begin::Header-->
<div id="kt_header" class="header header-fixed">
    <!--begin::Container-->
    <div class="container-fluid d-flex align-items-stretch justify-content-between">
        <div></div>

        <!--begin::Topbar-->
        <div class="topbar">

            <!--begin::User-->
            <div class="dropdown">
                <!--begin::Toggle-->
                <div class="topbar-item" data-toggle="dropdown" data-offset="0px,0px">
                    <div
                        class="
							btn btn-icon
							w-auto
							btn-clean
							d-flex
							align-items-center
							btn-lg
							px-2
						">
                        <span
                            class="
								text-muted
								font-weight-bold font-size-base
								d-none d-md-inline
								mr-1
							">Hallo,</span>
                        <span
                            class="
								text-dark-50
								font-weight-bolder font-size-base
								d-none d-md-inline
								mr-3
							">
                            {{ Auth::user()->name }}</span>
                        <span class="symbol symbol-35 symbol-light-success">
                            <span class="symbol-label font-size-h5 font-weight-bold">a</span>
                        </span>
                    </div>
                </div>

                <!--end::Toggle-->

                <!--begin::Dropdown-->
                <div
                    class="
						dropdown-menu
						p-0
						m-0
						dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg
						p-0
					">
                    @include('layouts.partials.extras.user')
                </div>

                <!--end::Dropdown-->
            </div>

            <!--end::User-->
        </div>

        <!--end::Topbar-->
    </div>

    <!--end::Container-->
</div>
<!--end::Header-->

<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4  subheader-solid " id="kt_subheader">
    <div class=" container-fluid  d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Mobile Toggle-->
            <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                <span></span>
            </button>
            <!--end::Mobile Toggle-->

            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                    {{ $title }}
                </h5>
                {{-- <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
                <span class="text-muted font-weight-bold mr-4">{{ Auth::user()->jabatan }}</span>
                <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div> --}}
                {{-- <h5 class="text-dark font-weight-bold my-1 mr-5">
                    Profile 1 </h5> --}}
                <!--end::Page Title-->

                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    {{-- <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div> --}}
                    <li class="breadcrumb-item">
                        {{-- <a href="{{ url('detail-permohonan') }}" class="text-muted">
                            Permohonan</a> --}}
                    </li>
                    {{-- <li class="breadcrumb-item">
                        <a href="{{ url('detail-permohonan') }}" class="text-muted">
                            Permohonan</a>
                    </li> --}}
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->


        {{-- <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-2">

            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{ $title }}
            </h5>
            <!--end::Page Title-->

            <!--begin::Actions-->
            
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4">{{ Auth::user()->jabatan; }}</span>

            <!--end::Actions-->

        </div>
        <!--end::Info-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
        </div>
        <!--end::Toolbar--> --}}

    </div>
</div>
<!--end::Subheader-->
