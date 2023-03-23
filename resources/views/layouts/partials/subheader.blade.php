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
					<div class="
							btn btn-icon
							w-auto
							btn-clean
							d-flex
							align-items-center
							btn-lg
							px-2
						">
						<span class="
								text-muted
								font-weight-bold font-size-base
								d-none d-md-inline
								mr-1
							">Hallo,</span>
						<span class="
								text-dark-50
								font-weight-bolder font-size-base
								d-none d-md-inline
								mr-3
							">
							Admin</span>
						<span class="symbol symbol-35 symbol-light-success">
							<span class="symbol-label font-size-h5 font-weight-bold">a</span>
						</span>
					</div>
				</div>

				<!--end::Toggle-->

				<!--begin::Dropdown-->
				<div class="
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
        <div class="d-flex align-items-center flex-wrap mr-2">

            <!--begin::Page Title-->
            <h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">
                {{ $title }} 
            </h5>
            <!--end::Page Title-->

            <!--begin::Actions-->
            <div class="subheader-separator subheader-separator-ver mt-2 mb-2 mr-4 bg-gray-200"></div>
            <span class="text-muted font-weight-bold mr-4">{{ Auth::user()->jabatan }}</span>

            <!--end::Actions-->

        </div>
        <!--end::Info-->

        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Actions-->
            {{-- <a href="#" class="btn btn-clean  btn-sm font-weight-bold font-size-base mr-1">
                Today
            </a>
            <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base  mr-1">
                Month
            </a>
            <a href="#" class="btn btn-clean btn-sm font-weight-bold font-size-base mr-1">
                Year
            </a> --}}
            <!--end::Actions-->

            <!--begin::Daterange-->
                {{-- <a href="#" class="btn btn-sm btn-light font-weight-bold mr-2" id="kt_dashboard_daterangepicker" data-toggle="tooltip" title="" data-placement="left" data-original-title="Select dashboard daterange">
                    <span class="text-muted font-size-base font-weight-bold mr-2" id="kt_dashboard_daterangepicker_title">Today:</span>
                    <span class="text-primary font-size-base font-weight-bolder" id="kt_dashboard_daterangepicker_date">Nov 24</span>
                </a> --}}
            <!--end::Daterange-->
        </div>
        <!--end::Toolbar-->

    </div>
</div>
<!--end::Subheader-->


