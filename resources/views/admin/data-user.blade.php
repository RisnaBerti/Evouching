@extends('layouts.main')

@section('content')
    <div class="modal" id="modal_user" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_user" action="datauser/add" method="post">
                    @csrf
                    <div class="modal-body">
                        <input class="d-none" type="text" id="id_user" name="id_user" autocomplete="off" />
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="name ">Nama </label>
                            <div class="col-8">
                                <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="masukan nama user" id="name" name="name" autocomplete="off" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="email">Email</label>
                            <div class="col-8">
                                <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="masukan nama user" id="email" name="email" autocomplete="off" />
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="no_hp">No Telepon</label>
                            <div class="col-8">
                                <input class="form-control @error('no_hp') is-invalid @enderror" type="text" placeholder="masukan nama user" id="no_hp" name="no_hp" autocomplete="off" />
                                @error('no_hp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="divisi ">Divisi</label>
                            <div class="col-8">
                                <input class="form-control @error('divisi') is-invalid @enderror" type="text" placeholder="masukan nama user" id="divisi" name="divisi" autocomplete="off" />
                                @error('divisi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="jabatan ">Jabatan</label>
                            <div class="col-8">
                                <input class="form-control @error('jabatan') is-invalid @enderror" type="text" placeholder="masukan nama user" id="jabatan" name="jabatan" autocomplete="off" />
                                @error('jabatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="alamat">Alamat</label>
                            <div class="col-8">
                                <input class="form-control @error('alamat') is-invalid @enderror" type="text" placeholder="masukan nama user" id="alamat" name="alamat" autocomplete="off" />
                                @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                        
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-light-primary">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    {{-- //////////// --}}

    <div class="card card-custom gutter-b">
        <div class="card-header flex-wrap border-0 pt-6 pb-0">
            <div class="card-title">
                <span class="symbol symbol-40 symbol-light-primary mr-2">
                    <span class="symbol-label">
                        <span class="svg-icon svg-icon-xl svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px"
                                height="18px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                    <path
                                        d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                        fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                    <path
                                        d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                        fill="#000000" fill-rule="nonzero"></path>
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </span>
                </span>
                <h3 class="card-label">
                    Kelola Users
                </h3>
            </div>
            <div class="card-toolbar">

                <!--begin::Dropdown-->
                <div class="dropdown dropdown-inline mr-2">
                    <button onclick="tambahuser()" type="button" class="btn btn-light-primary font-weight-bolder"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tambah Data
                    </button>
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
                                <select name="kt_datatable1_length" aria-controls="kt_datatable1"
                                    class="custom-select custom-select-sm form-control form-control-sm">
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
                            <label>Search:<input type="search" class="form-control form-control-sm" placeholder=""
                                    aria-controls="kt_datatable1"></label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="dataTables_scroll">
                            <div class="dataTables_scrollBody"
                                style="position: relative; overflow: auto; width: 100%; max-height: 50vh;">
                                <table class="table table-bordered table-head-custom table-checkable dataTable "
                                    id="kt_datatable1" role="grid" aria-describedby="kt_datatable1_info"
                                    style="width: 1159px;">
                                    <thead>
                                        <tr role="row" style="height: 0px;">
                                            <th>
                                                <center>ID</center>
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
                                                <center>EMAIL</center>
                                            </th>
                                            <th>
                                                <center>NO TELEPON</center>
                                            </th>
                                            <th>
                                                <center>SETTING</center>
                                            </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                {{-- <td><center>{{ $user->id }}</center></td> --}}
                                                <td>
                                                    <center>{{ $user->name }}</center>
                                                </td>
                                                <td>
                                                    <center>{{ $user->divisi }}</center>
                                                </td>
                                                <td>
                                                    <center>{{ $user->jabatan }}</center>
                                                </td>
                                                <td>
                                                    <center>{{ $user->email }}</center>
                                                </td>
                                                <td>
                                                    <center>{{ $user->no_hp }}</center>
                                                </td>
                                                <td>
                                                    <center>
                                                        @if ($user->is_active == 0 && $user->role_id != 1 )
                                                            <a href="{{ url('/datauser/active/{id_user}') }}"><button type="submit" class="btn btn-primary btn-sm"
                                                                 >Active</button></a>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="hapususer({{ $user->id }})">Hapus</button>
                                                        @elseif ($user->is_active == 1 && $user->role_id != 1 )
                                                            <button type="button" class="btn btn-warning btn-sm"
                                                                onclick="edituser({{ $user->id }})">Non Active</button>
                                                            <button type="button" class="btn btn-danger btn-sm"
                                                                onclick="hapususer({{ $user->id }})">Hapus</button>
                                                        @endif
                                                    </center>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="kt_datatable1_info" role="status" aria-live="polite">Showing 1
                            to 10 of 50 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="kt_datatable1_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="kt_datatable1_previous"><a
                                        href="#" aria-controls="kt_datatable1" data-dt-idx="0" tabindex="0"
                                        class="page-link"><i class="ki ki-arrow-back"></i></a></li>
                                <li class="paginate_button page-item active"><a href="#"
                                        aria-controls="kt_datatable1" data-dt-idx="1" tabindex="0"
                                        class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable1"
                                        data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable1"
                                        data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable1"
                                        data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="kt_datatable1"
                                        data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item next" id="kt_datatable1_next"><a href="#"
                                        aria-controls="kt_datatable1" data-dt-idx="6" tabindex="0"
                                        class="page-link"><i class="ki ki-arrow-next"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Datatable-->
        </div>
    </div>

    <script>
        const tambahuser = async () => {
            $('#form_user')[0].reset()
            $('#modal_user').modal('show')
        }

        //alert active user dengan onclik edituser
        // const edituser = async (id_user) => {
        //     const {
        //         value: is_active //status di sini sebagai apa? sebagai variabel?  atau sebagai value? 
        //     } = await Swal.fire({
        //         title: 'Apakah anda yakin?',
        //         // text: "Anda tidak dapat mengembalikan ini!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, active it!'
        //     })

        //     if (is_active) {
        //         $.ajax({
        //             url: "{{ url('DataUserController/active') }}/" + id_user,
        //             type: "GET",
        //             dataType: "JSON",
        //             success: function(data) {
        //                 Swal.fire(
        //                     'Active!',
        //                     'User berhasil di active.',
        //                     'success'
        //                 )
        //                 location.reload()
        //             },
        //             error: function() {
        //                 Swal.fire(
        //                     'Gagal!',
        //                     'User gagal di active.',
        //                     'error'
        //                 )
        //             }
        //         })
        //     }
        // }


    </script>
@endsection
