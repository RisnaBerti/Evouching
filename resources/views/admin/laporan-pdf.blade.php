@extends('layouts.main-bendahara')

@section('content')
    <div class="card card-custom ">
        <div class="card-header ">
            <div class="card-title">
                <span class="symbol  symbol-40 symbol-light-primary mr-2">
                    <span class="symbol-label">
                        <span class="svg-icon svg-icon-xl svg-icon-primary"><!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <rect x="0" y="0" width="24" height="24"></rect>
                            <rect fill="#000000" x="4" y="4" width="7" height="7" rx="1.5"></rect>
                            <path d="M5.5,13 L9.5,13 C10.3284271,13 11,13.6715729 11,14.5 L11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L5.5,20 C4.67157288,20 4,19.3284271 4,18.5 L4,14.5 C4,13.6715729 4.67157288,13 5.5,13 Z M14.5,4 L18.5,4 C19.3284271,4 20,4.67157288 20,5.5 L20,9.5 C20,10.3284271 19.3284271,11 18.5,11 L14.5,11 C13.6715729,11 13,10.3284271 13,9.5 L13,5.5 C13,4.67157288 13.6715729,4 14.5,4 Z M14.5,13 L18.5,13 C19.3284271,13 20,13.6715729 20,14.5 L20,18.5 C20,19.3284271 19.3284271,20 18.5,20 L14.5,20 C13.6715729,20 13,19.3284271 13,18.5 L13,14.5 C13,13.6715729 13.6715729,13 14.5,13 Z" fill="#000000" opacity="0.3"></path>
                        </g>
                        </svg><!--end::Svg Icon--></span>                
                    </span>
                </span>
                <h3 class="card-label">
                    Laporan
                </h3>
            </div>
            <div class="card-toolbar">

                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="svg-icon svg-icon-md">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"></rect>
                                    <path
                                        d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z"
                                        fill="#000000" opacity="0.3"></path>
                                    <path
                                        d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z"
                                        fill="#000000"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span> Export
                    </button>

                    <!--begin::Dropdown Menu-->
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <!--begin::Navigation-->
                        <ul class="navi flex-column navi-hover py-2">
                            <li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">
                                Choose an option:
                            </li>
                            <li class="navi-item">
                                <a href="/laporan-bendahara/pdf" class="navi-link">
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
            <table class="table table-bordered" id="table_datauser" style="margin-top: 13px !important">
                <thead>
                    </tr>
                    <th>
                        <center>NO</center>
                    </th>
                    <th>
                        <center>TANGGAL</center>
                    </th>
                    <th>
                        <center>NAMA</center>
                    </th>
                    <th>
                        <center>TF/CASH</center>
                    </th>
                    <th>
                        <center>URAIAN TRANSAKSI</center>
                    </th>
                    <th>
                        <center>MASUK</center>
                    </th>
                    <th>
                        <center>KELUAR</center>
                    </th>
                    <th>
                        <center>SALDO</center>
                    </th>
                    <th>
                        <center>KETERANGAN</center>
                    </th>
                    <th>
                        <center>PJ</center>
                    </th>
                    <th>
                        <center>SETTING</center>
                    </th>
                </thead>
                <tbody>
                    @foreach ($data as $dt)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td >
                                <center>{{ $dt->tanggal_permohonan }}</center>
                            </td>
                            <td>
                                <center>{{ $dt->nama_perkiraan }}</center>
                            </td>
                            <td>
                                <center>
                                    @if ($dt->jenis_dana == 'Penerimaan Kas' && $dt->jenis_dana == 'Pembayaran Kas')
                                        <span class="label label-lg label-light-primary label-inline">CASH</span>
                                    @else
                                        <span class="label label-lg label-light-success label-inline">TF</span>
                                    @endif
                                </center>
                            </td>
                            <td>
                                <center>{{ $dt->keterangan_permohonan }}</center>
                            </td>
                            <td>
                                <center>
                                    @if ($dt->jenis_dana == 'Penerimaan Kas' && $dt->jenis_dana == 'Penerimaan Bank')
                                        {{ $dt->nominal_acc}}
                                    @endif
                                </center>
                            </td>
                            <td>
                                <center>
                                    @if ($dt->jenis_dana == 'Pembayaran Kas' && $dt->jenis_dana == 'Pembayaran Bank')
                                        {{ $dt->nominal_acc}}
                                    @endif
                                </center>
                            </td>
                            <td>
                                <center>
                                    {{ $dt->nominal_acc }}
                                </center>
                            </td>
                            <td>
                                <center>{{ $dt->keterangan_permohonan }}</center>
                            </td>
                            <td>
                                <center>{{ $dt->name }}</center>
                            </td>
                            <td>
                                <center>{{ $dt->bukti_transaksi }}</center>
                            </td>
                            <td>
                                <center>
                                    {{-- @if ($user->is_active == 0 && $user->role_id != 1)
                                        <i class='fas fas fa-toggle-off  btn btn-icon btn-light-primary item-aktivasi'></i> --}}
                                        {{-- <i class='fas fa-trash-alt btn btn-icon btn-light-danger item-hapus'></i> --}}
                                    {{-- @elseif ($user->is_active == 1 && $user->role_id != 1)
                                        <i class='fas fa-edit btn btn-icon btn-light-primary item-ubah'></i>
                                        <i class='fas fas fa-toggle-on btn btn-icon btn-light-danger item-nonaktivasi'></i>
                                    @endif --}}
                                </center>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--end: Datatable-->
        </div>
    </div>
@endsection
