@extends('layouts.main-pemohon')

@section('content')

<div class="row">
    <div class="col-xl-4">
        <!--begin::Stats Widget 30-->
        <div class="card card-custom card-stretch gutter-b " style="background-color: #2C3580">
        <!--begin::Body-->
        <div class="card-body">
            <span class="svg-icon svg-icon-2x svg-icon-white">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <polygon points="0 0 24 0 24 24 0 24"></polygon>
                        <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                        <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                    </g>
                </svg>
                <!--end::Svg Icon-->
            </span>
            <span class="card-title font-weight-bolder text-white font-size-h2 mb-0 mt-6 d-block">Rp. 0</span>
            <span class="font-weight-bold text-white  font-size-sm">Total Dana Acc</span>
        </div>
        <!--end::Body-->
        </div>
        <!--end::Stats Widget 30-->
    </div>
</div>
<!--End::Row-->


{{-- /////////////////// --}}


<div class="card card-custom gutter-b">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
		<div class="card-title">
            <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
			<h3 class="card-label">
				Pengajuan Permohonan Dana
			</h3>
		</div>
		<div class="card-toolbar">
            
			<!--begin::Dropdown-->
            <div class="dropdown dropdown-inline mr-2">
                <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="svg-icon svg-icon-md"><!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"></rect>
                                <path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3"></path>
                                <path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000"></path>
                            </g>
                        </svg><!--end::Svg Icon-->
                    </span>	Export
                </button>

                <!--begin::Dropdown Menu-->
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <!--begin::Navigation-->
                    <ul class="navi flex-column navi-hover py-2">
                        <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                            Choose an option:
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon"><i class="la la-file-pdf-o"></i></span>
                                <span class="navi-text">PDF</span>
                            </a>
                        </li>
                        <li class="navi-item">
                            <a href="#" class="navi-link">
                                <span class="navi-icon"><i class="la la-file-excel-o"></i></span>
                                <span class="navi-text">Excel</span>
                            </a>
                        </li>
                    </ul>
                    <!--end::Navigation-->
                </div>
                <!--end::Dropdown Menu-->
            </div>
            <!--end::Dropdown-->
		</div>
	</div>

	<div class="card-body">
		<!--begin: Datatable-->
		<div id="kt_datatable1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
            <div class="row">
                <div class="col-sm-12 col-md-6">
                    <div class="dataTables_length" id="kt_datatable1_length">
                        <label>Show 
                            <select name="kt_datatable1_length" aria-controls="kt_datatable1" class="custom-select custom-select-sm form-control form-control-sm">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select> entries
                        </label>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6">
                    <div id="kt_datatable1_filter" class="dataTables_filter">
                        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="kt_datatable1"></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="dataTables_scroll">
                        <div class="dataTables_scrollHead" style="overflow: hidden; position: relative; border: 0px; width: 100%;">
                            <div class="dataTables_scrollHeadInner" style="box-sizing: content-box; width: 1128.22px; padding-right: 17px;">
                                <table class="table table-separate table-head-custom table-checkable dataTable no-footer" role="grid" style="margin-left: 0px; width: 1128.22px;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 55.2083px;" aria-sort="ascending" aria-label="Record ID: activate to sort column descending">Record ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 44.875px;" aria-label="Order ID: activate to sort column ascending">Order ID</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 64.875px;" aria-label="Country: activate to sort column ascending">Country</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 74.875px;" aria-label="Ship City: activate to sort column ascending">Ship City</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 61.4792px;" aria-label="Ship Address: activate to sort column ascending">Ship Address</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 68.2396px;" aria-label="Company Agent: activate to sort column ascending">Company Agent</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 68.2396px;" aria-label="Company Name: activate to sort column ascending">Company Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 51.3958px;" aria-label="Ship Date: activate to sort column ascending">Ship Date</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 59.5208px;" aria-label="Status: activate to sort column ascending">Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 31.9583px;" aria-label="Type: activate to sort column ascending">Type</th>
                                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 117.552px;" aria-label="Actions">Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                        <div class="dataTables_scrollBody" style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                            <table class="table table-separate table-head-custom table-checkable dataTable no-footer" id="kt_datatable1" role="grid" aria-describedby="kt_datatable1_info" style="width: 1159px;">
                                    <thead>
                                        <tr role="row" style="height: 0px;">
                                            <th class="sorting_asc" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 55.2083px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;">
                                                <div  style="height: 0px; overflow: hidden;">Record ID</div>
                                            </th>
                                            <th class="sorting" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 44.875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Order ID: activate to sort column ascending">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Order ID</div>
                                            </th>
                                            <th class="sorting" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 64.875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Country: activate to sort column ascending">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Country</div>
                                            </th>
                                            <th class="sorting" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 74.875px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Ship City: activate to sort column ascending">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Ship City</div>
                                            </th>
                                            <th class="sorting" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 61.4792px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Ship Address: activate to sort column ascending">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Ship Address</div>
                                            </th>
                                            <th class="sorting" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 68.2396px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Company Agent: activate to sort column ascending">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Company Agent</div>
                                            </th>
                                            <th class="sorting" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 68.2396px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Company Name: activate to sort column ascending">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Company Name</div>
                                            </th>
                                            <th class="sorting" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 51.3958px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Ship Date: activate to sort column ascending">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Ship Date</div>
                                            </th>
                                            <th class="sorting" aria-controls="kt_datatable1" rowspan="1" colspan="1" style="width: 59.5208px; padding-top: 0px; padding-bottom: 0px; border-top-width: 0px; border-bottom-width: 0px; height: 0px;" aria-label="Status: activate to sort column ascending">
                                                <div class="dataTables_sizing" style="height: 0px; overflow: hidden;">Status</div>
                                            </th>
                                    </thead>
                                    <tbody>  
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">1</td>
                                            <td>64616-103</td>
                                            <td>Brazil</td>
                                            <td>São Félix do Xingu</td>
                                            <td>698 Oriole Pass</td>
                                            <td>Hayes Boule</td>
                                            <td>Casper-Kerluke</td>
                                            <td>10/15/2017</td>
                                            <td><span class="label label-lg font-weight-bold label-light-info label-inline">Info</span></td>
                                            <td><span class="label label-danger label-dot mr-2"></span><span class="font-weight-bold text-danger">Online</span></td>
                                            <td nowrap="">	                        
                                            <div class="dropdown dropdown-inline">	                            
                                                <a href="javascript:;" class="btn btn-sm btn-clean btn-icon mr-2" data-toggle="dropdown">	                                
                                                    <span class="svg-icon svg-icon-md">	                                    
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">	                                        
                                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">	                                            
                                                                <rect x="0" y="0" width="24" height="24"></rect>	                                            
                                                                <path d="M5,8.6862915 L5,5 L8.6862915,5 L11.5857864,2.10050506 L14.4852814,5 L19,5 L19,9.51471863 L21.4852814,12 L19,14.4852814 L19,19 L14.4852814,19 L11.5857864,21.8994949 L8.6862915,19 L5,19 L5,15.3137085 L1.6862915,12 L5,8.6862915 Z M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"></path>	                                        
                                                            </g>	                                    
                                                        </svg>	                                
                                                    </span>	                            
                                                </a>	                            
                                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">	                                
                                                    <ul class="navi flex-column navi-hover py-2">	                                    
                                                        <li class="navi-header font-weight-bolder text-uppercase font-size-xs text-primary pb-2">	                                        
                                                            Choose an action:	                                    
                                                        </li>	                                    
                                                        <li class="navi-item">	                                        
                                                            <a href="#" class="navi-link">	                                            
                                                                <span class="navi-icon">
                                                                    <i class="la la-print"></i>
                                                                </span>	                                            
                                                                <span class="navi-text">PDF</span>	                                        
                                                            </a>	                                    
                                                        </li>	                                    
                                                        <li class="navi-item">	                                        
                                                            <a href="#" class="navi-link">	                                            
                                                                <span class="navi-icon"><i class="la la-copy"></i>
                                                                </span>	                                            
                                                                <span class="navi-text">Excel</span>	                                        
                                                            </a>	                                    
                                                        </li>
                                                    </ul>	
                                                </div>   
                                            </div>  
                                        </tr>
                                    </tbody>
                            </table>

        		</table></div></div></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="kt_datatable1_info" role="status" aria-live="polite">Showing 1 to 10 of 50 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="kt_datatable1_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="kt_datatable1_previous"><a href="#" aria-controls="kt_datatable1" data-dt-idx="0" tabindex="0" class="page-link"><i class="ki ki-arrow-back"></i></a></li><li class="paginate_button page-item active"><a href="#" aria-controls="kt_datatable1" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable1" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable1" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable1" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable1" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item next" id="kt_datatable1_next"><a href="#" aria-controls="kt_datatable1" data-dt-idx="6" tabindex="0" class="page-link"><i class="ki ki-arrow-next"></i></a></li></ul></div></div></div></div>
		<!--end: Datatable-->
	</div>
</div>


@endsection
