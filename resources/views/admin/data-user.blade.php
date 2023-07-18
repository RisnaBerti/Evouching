@extends('layouts.main-bendahara')

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
                <form id="form_user" action="/datauser/add" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="name ">Nama </label>
                            <div class="col-8">
                                <input required class="form-control @error('name') is-invalid @enderror" type="text"
                                    value="" placeholder="masukan nama user" id="name" name="name"
                                    autocomplete="off" />
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="email">Email</label>
                            <div class="col-8">
                                <input required class="form-control @error('email') is-invalid @enderror" type="text"
                                    value="" placeholder="masukan nama user" id="email" name="email"
                                    autocomplete="off" />
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="no_hp">No Telepon</label>
                            <div class="col-8">
                                <input required class="form-control @error('no_hp') is-invalid @enderror" type="text"
                                    value="" placeholder="masukan nama user" id="no_hp" name="no_hp"
                                    autocomplete="off" />
                                @error('no_hp')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="divisi ">Divisi</label>
                            <div class="col-8">
                                <input required class="form-control @error('divisi') is-invalid @enderror" value=""
                                    type="text" placeholder="masukan nama user" id="divisi" name="divisi"
                                    autocomplete="off" />
                                @error('divisi')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="jabatan ">Jabatan</label>
                            <div class="col-8">
                                <input required class="form-control @error('jabatan') is-invalid @enderror" value=""
                                    type="text" placeholder="masukan nama user" id="jabatan" name="jabatan"
                                    autocomplete="off" />
                                @error('jabatan')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-4" for="alamat">Alamat</label>
                            <div class="col-8">
                                <input required class="form-control @error('alamat') is-invalid @enderror" value=""
                                    type="text" placeholder="masukan nama user" id="alamat" name="alamat"
                                    autocomplete="off" />
                                @error('alamat')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-light-primary simpan-user">Simpan</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal" id="modal_ubah" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @csrf
                <div class="modal-body">
                    <input hidden type="text" id="id_ubah" name="id">
                    <div class="form-group row">
                        <label class="col-form-label col-4" for="name ">Nama </label>
                        <div class="col-8">
                            <input required class="form-control @error('name') is-invalid @enderror" type="text"
                                placeholder="masukan nama user" id="name_ubah" name="name" autocomplete="off" />
                            @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-4" for="email">Email</label>
                        <div class="col-8">
                            <input required class="form-control @error('email') is-invalid @enderror" type="text"
                                value="" placeholder="masukan nama user" id="email_ubah" name="email"
                                autocomplete="off" />
                            @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-4" for="no_hp">No Telepon</label>
                        <div class="col-8">
                            <input required class="form-control @error('no_hp') is-invalid @enderror" type="text"
                                value="" placeholder="masukan nama user" id="no_hp_ubah" name="no_hp"
                                autocomplete="off" />
                            @error('no_hp')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-4" for="divisi ">Divisi</label>
                        <div class="col-8">
                            <input required class="form-control @error('divisi') is-invalid @enderror" value=""
                                type="text" placeholder="masukan nama user" id="divisi_ubah" name="divisi"
                                autocomplete="off" />
                            @error('divisi')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-4" for="jabatan ">Jabatan</label>
                        <div class="col-8">
                            <input required class="form-control @error('jabatan') is-invalid @enderror" value=""
                                type="text" placeholder="masukan nama user" id="jabatan_ubah" name="jabatan"
                                autocomplete="off" />
                            @error('jabatan')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-form-label col-4" for="alamat">Alamat</label>
                        <div class="col-8">
                            <input required class="form-control @error('alamat') is-invalid @enderror" value=""
                                type="text" placeholder="masukan nama user" id="alamat_ubah" name="alamat"
                                autocomplete="off" />
                            @error('alamat')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light-primary ubah-user">Simpan</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                </div>


            </div>
        </div>
    </div>

    <div class="modal" id="modal_hapus" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="form_user" action="/datauser/delete" method="POST">
                    @csrf
                    <div class="modal-body">
                        <input hidden type="text" id="id_hapus" name="id_hapus">
                        Data pegguna yang anda pilih akan dihapus tekan konfirmasi, untuk mengahapus.
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-light-primary hapus-user">Ya</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- //////////// --}}

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <span class="symbol symbol-40 symbol-light-primary mr-2">
                    <span class="symbol-label">
                        <span class="svg-icon svg-icon-sm svg-icon-primary">
                            <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Group.svg--><svg
                                xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="18px" height="18px" viewBox="0 0 24 24" version="1.1">
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
                <h3 class="card-label">Kelola Data User
                </h3>
            </div>
            <div class="card-toolbar">
                <button onclick="tambahuser()" type="button" class="btn btn-light-primary font-weight-bolder"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Tambah Data
                </button>
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
                    <th hidden>
                        <center>ID</center>
                    </th>
                    <th>
                        <center>NAMA</center>
                    </th>
                    <th>
                        <center>EMAIL</center>
                    </th>
                    <th>
                        <center>NO TELEPON</center>
                    </th>
                    <th>
                        <center>DIVISI</center>
                    </th>
                    <th>
                        <center>JABATAN</center>
                    </th>
                    <th>
                        <center>ALAMAT</center>
                    <th>
                        <center>SETTING</center>
                    </th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <center> {{ $loop->iteration }} </center>
                            </td>
                            <td hidden>
                                <center>{{ $user->id }}</center>
                            </td>
                            <td>
                                <center>{{ $user->name }}</center>
                            </td>
                            <td>
                                <center>{{ $user->email }}</center>
                            </td>
                            <td>
                                <center>{{ $user->no_hp }}</center>
                            </td>
                            <td>
                                <center>{{ $user->divisi }}</center>
                            </td>
                            <td>
                                <center>{{ $user->jabatan }}</center>
                            </td>
                            <td>
                                <center>{{ $user->alamat }}</center>
                            <td>
                                <center>
                                    @if ($user->is_active == 0 && $user->role_id != 1)
                                        <i class='fas fas fa-toggle-off  btn btn-icon btn-light-primary item-aktivasi'></i>
                                        {{-- <i class='fas fa-trash-alt btn btn-icon btn-light-danger item-hapus'></i> --}}
                                    @elseif ($user->is_active == 1 && $user->role_id != 1)
                                        <i class='fas fa-edit btn btn-icon btn-light-primary item-ubah'></i>
                                        <i class='fas fas fa-toggle-on btn btn-icon btn-light-danger item-nonaktivasi'></i>
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
        const tambahuser = async () => {
            $('#form_user')[0].reset()
            $('#modal_user').modal('show')
        }

        $(document).ready(function() {

            //Mengaktifkan datatable
            $('#table_datauser').DataTable({
                paging: true,
            });

            //Update Nonaktif menjadi Aktif
            $('#table_datauser').on('click', '.item-aktivasi', function() {

                var currow = $(this).closest('tr');

                var id = currow.find('td:eq(1)').text();

                $.get("{{ url('datauser/active/') }}/" + id.trim(), {

                    })
                    .done(function(data) {
                        Swal.fire(
                            'Active!',
                            'User berhasil di active.',
                            'success'
                        )
                        location.reload()
                    });

            });

            //Update Aktif menjadi NonAktif
            $('#table_datauser').on('click', '.item-nonaktivasi', function() {

                var currow = $(this).closest('tr');

                var id = currow.find('td:eq(1)').text();

                $.get("{{ url('datauser/nonactive/') }}/" + id.trim(), {

                    })
                    .done(function(data) {
                        Swal.fire(
                            'Non Aktif!',
                            'User berhasil di non aktifkan.',
                            'success'
                        )
                        location.reload()
                    });

            });

            //Update pengguna
            $('#table_datauser').on('click', '.item-ubah', function() {

                var currow = $(this).closest('tr');

                var id = currow.find('td:eq(1)').text();
                var name = currow.find('td:eq(2)').text();
                var email = currow.find('td:eq(3)').text();
                var hp = currow.find('td:eq(4)').text();
                var divisi = currow.find('td:eq(5)').text();
                var jabatan = currow.find('td:eq(6)').text();
                var alamat = currow.find('td:eq(7)').text();

                $('#id_ubah').val(id.trim());
                $('#name_ubah').val(name.trim());
                $('#email_ubah').val(email.trim());
                $('#no_hp_ubah').val(hp.trim());
                $('#divisi_ubah').val(divisi.trim());
                $('#jabatan_ubah').val(jabatan.trim());
                $('#alamat_ubah').val(alamat.trim());

                $('#modal_ubah').modal('show');
            });

            $(".ubah-user").click(function() {

                var id = $('#id_ubah').val();
                var name = $('#name_ubah').val();
                var email = $('#email_ubah').val();
                var no_hp = $('#no_hp_ubah').val();
                var divisi = $('#divisi_ubah').val();
                var jabatan = $('#jabatan_ubah').val();
                var alamat = $('#alamat_ubah').val();

                $('.ubah-user').attr("disabled", "disabled");

                if (!id) {

                    alert("ID User tidak terdefinisi!");

                    $('.ubah-user').attr("disabled", false);

                } else {

                    $.post("{{ url('/datauser/edit') }}", {
                        _token: "{{ csrf_token() }}",
                        id: id,
                        name: name,
                        email: email,
                        no_hp: no_hp,
                        divisi: divisi,
                        jabatan: jabatan,
                        alamat: alamat,

                    }).done(function(response) {

                        if (response == "success") {
                            Swal.fire(
                                'Ubah User!',
                                'User berhasil diubah.',
                                'success'
                            )
                            location.reload()

                            // get();

                            $(".ubah-user").attr("disabled", false);

                            $('#id_ubah').val('');
                            $('#name_ubah').val('');
                            $('#email_ubah').val('');
                            $('#no_hp_ubah').val('');
                            $('#divisi_ubah').val('');
                            $('#jabatan_ubah').val('');
                            $('#alamat_ubah').val('');

                            $('#modalubah').modal('hide');

                        } else {

                            Swal.fire({
                                icon: 'error',
                                title: 'User gagal diubah',
                                text: 'User gagal diubah.',
                                showCancelButton: false,
                                confirmButtonColor: '#FF6347',
                                confirmButtonText: 'Siap',
                            })

                            $(".ubah-user").attr("disabled", false);

                        }

                    });

                }

            });

            // $('#table_datauser').modal('hide');
            // 			Swal.fire("", "Berhasil menyimpan data", "success");
            // 			table.ajax.reload();


            //Hapus user
            $('#table_datauser').on('click', '.item-hapus', function() {

                var currow = $(this).closest('tr');

                var id = currow.find('td:eq(1)').text();

                $('#id_hapus').val(id.trim());

                $('#modal_hapus').modal('show');

            });

            $(".hapus-user").click(function() {


            });



        });
    </script>
@endsection
