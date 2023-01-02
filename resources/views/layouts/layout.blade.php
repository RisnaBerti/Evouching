<!--begin::Header-->
@include('layouts.partials.header')
<!--end::Header-->
<div class="d-flex flex-column flex-root">
	<!--begin::Page-->
	<div class="d-flex flex-row flex-column-fluid page">
        <!--begin::Aside-->
        @include('layouts.partials.aside')
        <!--end::Aside-->

			<!--begin::Wrapper-->
			<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                 <!--begin::Subheader-->
                 @include('layouts.partials.subheader')
                 <!--end::Subheader-->

                    <!--begin::Content-->
                    <div class="content  d-flex flex-column flex-column-fluid" id="kt_content">
                       
                            <!--begin::Entry-->
                            {{-- <div class="d-flex flex-column-fluid"> --}}
                                <!--begin::Container-->
                                <div class=" container-fluid ">
                                    @yield('content')
                                </div>
                                <!--end::Container-->
                            {{-- </div> --}}
                            <!--end::Entry-->
                            
                    </div>
                    <!--end::Content-->

                <!--begin::Footer-->
                    @include('layouts.partials.footer')
                <!--end::Footer-->

			</div>
			<!--end::Wrapper-->

		</div>
		<!--end::Page-->
	</div>
<!--end::Main-->