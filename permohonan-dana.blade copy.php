@extends('layouts.main-pemohon')

@section('content')
    <!--begin::Card-->
    {{-- <div class="card card-custom gutter-b example example-compact">
        <div class="card-body">
            <div class="row">
                <div class="col-7 align-self-start">
                    <div class="col">
                        <h3 class="card-title">
                            PERMOHONAN DANA
                        </h3>
                    </div>
                </div>
                <div class="col-5 align-items-start">

                    <input hidden type="text" id="id_detail_permohonan">
                    <input hidden type="text" id="id" value="{{ Auth::user()->id }}">
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">No. Formulir:</span>
                        </div>
                        <input readonly type="text" class="form-control form-control-sm" id="id_permohonan"
                            name="id_permohonan" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-1">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">No. Resi
                                Ajuan:</span>
                        </div>
                        <input readonly type="text" class="form-control form-control-sm" id="no_resi_ajuan"
                            name="no_resi_ajuan" value="{{ $permohonan->no_resi_ajuan }}" aria-label="Sizing example input"
                            aria-describedby="inputGroup-sizing-sm">
                    </div>
                    <div class="input-group input-group-sm mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-sm">Tanggal:</span>
                        </div>
                        <input type="date" value="{{ date('Y-m-d') }}" class="form-control form-control-sm"
                            id="tanggal_permohonan" name="tanggal_permohonan" value="{{ $permohonan->tanggal_permohonan }}"
                            aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                    </div>
                </div>
            </div>

            <div hidden class="form-group row">
                <div class="col-lg-4">
                    <label>Nama </label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nama Legkap" id="name"
                        value="{{ Auth::user()->name }}" readonly disabled />
                </div>
                <div class="col-lg-4">
                    <label>Jabatan</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Jabatan" id="jabatan"
                        value="{{ Auth::user()->jabatan }}" readonly disabled />
                </div>
                <div class="col-lg-4">
                    <label>Divisi / Departemen</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Divisi" id="divisi"
                        value="{{ Auth::user()->divisi }}" readonly disabled />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Nama Perkiraan</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nama Legkap" id="name"
                        value="{{ Auth::user()->name }}" readonly disabled />
                </div>
                <div class="col-lg-6">
                    <label>Dana Yang Di ajukan</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Nominal ACC"
                        id="total_dana_ajuan" name="total_dana_ajuan" value="{{ $permohonan->total_dana_ajuan }}" readonly
                        disabled />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-3">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control form-control-sm" name="nama_barang" placeholder="Nama Barang"
                        id="nama_barang" />
                </div>
                <div class="col-lg-3">
                    <label>Harga Satuan</label>
                    <input type="text" class="form-control form-control-sm" name="harga_satuan"
                        placeholder="Harga Satuan" id="harga_satuan" />
                </div>
                <div class="col-lg-3">
                    <label>Qty</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Jumlah Barang" name="qty"
                        id="qty" />
                </div>
                <div class="col-lg-3">
                    <label>Total Harga</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Total"
                        name="total_harga_barang" id="total_harga_barang" readonly disabled />
                </div>
            </div>
            <div hidden class="form-group row">
                <div class="col-lg-6">
                    <label>Nominal ACC</label>
                    <input type="text" class="form-control form-control-sm" placeholder="Di isi oleh bendahara"
                        id="nominal_acc" name="nominal_acc" value="" readonly disabled />
                </div>
            </div>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Terbilang</label>
                    <input readonly disabled type="text" class="form-control form-control-sm" placeholder="Terbilang"
                        value="{{ $permohonan->terbilang }}" id="terbilang" name="terbilang" />
                </div>
                <div class="col-lg-6">
                    <label>Keterangan</label>
                    <textarea readonly disabled class="form-control form-control-sm" name="keterangan_detail" id="keteranang_detail"
                        placeholder="Keterangan" rows="4"></textarea>
                </div>

            </div>
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-3 ">
                    <button type="button" class="btn btn-primary mr-2 simpan-permohonan">Simpan</button>
                </div>
                <div class="col-lg-3">
                    <button type="button" id="ubah-permohonan"
                        class="btn btn-primary mr-2 ubah-permohonan">Ubah</button>
                </div>
            </div>
        </div>
    </div> --}}
    <!--end::Card-->

    {{-- <div class="card card-custom"> --}}
    {{-- <div class="card-header">
            <div class="card-title">
                <span class="card-icon"><i class="flaticon-squares-1 text-primary"></i></span>
                <h3 class="card-label">Permohonan Dana</h3>
            </div>
        </div> --}}
    {{-- <div class="card-body"> --}}
    {{-- <div id="layoutSidenav_content"> --}}
    <main>
        {{-- <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="layout"></i></div>
                                            Breadcrumbs
                                        </h1>
                                        <div class="page-header-subtitle">The custom page header supports and styles
                                            Bootstrap breadcrumbs</div>
                                    </div>
                                </div>
                                <nav class="mt-4 rounded" aria-label="breadcrumb">
                                    <ol class="breadcrumb px-3 py-2 rounded mb-0">
                                        <li class="breadcrumb-item"><a href="dashboard-1.html">Dashboard</a></li>
                                        <li class="breadcrumb-item active">Breadcrumbs</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </header> --}}
        <!-- Main page content-->
        {{-- <div class="container-xl px-4 mt-n10"> --}}
        <div class="card card-header-actions">
            <div class="card-header">
                Header Button
                <button class="btn btn-primary btn-sm" id="btnAdd">Tambah</button>
            </div>
            <div class="card-body">
                <div class="col-md-12 table-responsive">
                    <input type="hidden" name="total_partisipan" id="total_partisipan" value="0">
                    <table id="table-barang" class="table table-striped table-row-bordered gy-5 gs-7" cellspacing="0"
                        width="100%">
                        <thead>
                            <tr class="fw-semibold fs-6 text-gray-800">
                                <th class="min-w-50px">
                                    <input type="checkbox" name="check_all" id="check_all">
                                </th>
                                <th class="min-w-20px">No</th>
                                <th class="min-w-250px" width="250">Nama Barang</th>
                                <th class="min-w-250px" width="250">Harga</th>
                                <th class="min-w-100px" width="100">Jumlah</th>
                                <th class="min-w-100px" width="100">Total Harga</th>
                                <th class="min-w-40px"></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <input type="text" id="total_harga_barang" value="0">
            </div>
        </div>
        {{-- </div> --}}
    </main>
    {{-- <footer class="footer-admin mt-auto footer-light">
                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-md-6 small">Copyright &copy; Your Website 2021</div>
                            <div class="col-md-6 text-md-end small">
                                <a href="#!">Privacy Policy</a>
                                &middot;
                                <a href="#!">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer> --}}
    {{-- </div> --}}

    <!--begin: Datatable-->
    {{-- <table class="table table-bordered display nowrap table-permohonan" id="table-permohonan"
                style="width:100%; margin-top: 13px;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th hidden>id_permohonan</th>
                        <th hidden>id_detail_permohonan</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Nama Barang</th>
                        <th>Harga Satuan</th>
                        <th>Qty </th>
                        <th>Total Harga Barang</th>
                        <th>Status</th>
                        <th>
                            <center>Aksi</center>
                        </th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table> --}}
    <!--end: Datatable-->
    {{-- </div> --}}
    {{-- </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            let base_url = "https://api.sdmdigital.id/crud/";
            let indexRow = "2";
            let status = 5;

            let getListUserUrl = "https://presensi.sdmdigital.id/getUsers";

            $(document).on('click', '#btnAdd, #btnAddRow', function() {

                $('#actionContainer').remove();

                let row = $('#table-barang tr').length;

                let html = '<tr id="barang' + indexRow + '" class="row-table" data-idx="' + indexRow + '">';

                html += '<input type="hidden" name="id_permohonan[]" id="id_permohonan' + indexRow +
                    '" value="0">';

                html +=
                    '<td><input type="checkbox" name="check_delete[]" class="check_delete mt-3" id="check_delete' +
                    indexRow + '" data-idx="' + indexRow + '"></td>';

                html += '<td class="no" id="no' + indexRow + '"><div class="mt-3">' + row + '</div></td>';

                html +=
                    '<td><input type="text" class="form-control nama_barang input-sm ml-2" name="nama_barang[]" id="nama_barang' +
                    indexRow + '" value="" required></td>';

                html +=
                    '<td><input type="text" class="form-control input-sm ml-2" name="harga_satuan[]" id="harga_satuan' +
                    indexRow + '" required></td>';

                html +=
                    '<td><input type="text" class="form-control input-sm ml-2" name="qty[]" id="qty' +
                    indexRow + '" required></td>';

                html +=
                    '<td><input type="text" class="form-control input-sm ml-2" name="total_harga_barang[]" id="total_harga_barang' +
                    indexRow + '" required></td>';

                html += '<td id="action' + indexRow + '" class="action" data-idx="' + indexRow +
                    '"><div id="actionContainer"><i class="fa fa-plus" id="btnAddRow" data-idx="' +
                    indexRow + '"></i>&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' +
                    indexRow + '"></i></div></td>';

                html += '<input type="hidden" name="id_deleted[]" id="pelatihan_session_kehadiran_id' +
                    indexRow + '" value="0">';

                html += '</tr>';

                $('#table-barang tbody').append(html);
                indexRow++;
            });

            $(document).on('click', '#btnDeleteRow', function() {
                Swal.fire({
                    title: "Hapus Partisipan",
                    text: "Apakah anda yakin ingin menghapus?",
                    icon: 'warning',
                    confirmButtonText: "Yes",
                    cancelButtonText: "No",
                    showCancelButton: true,
                    showCloseButton: true
                }).then((result) => {
                    if (result.value) {
                        let idx = $(this).data("idx");
                        let pelatihan_session_kehadiran_id = $('#pelatihan_session_kehadiran_id' +
                            idx).val();
                        let deletedIds = [];

                        let deletedHtml = '<input type="hidden" name="id_deleted[]" value="' +
                            pelatihan_session_kehadiran_id + '">';
                        $('#form').append(deletedHtml);
                        $('#barang' + idx).remove();
                        let last = 0;
                        $('.row-table').each(function(i, obj) {
                            let no = i + 1;
                            $(this).find('.no').text(no);
                            last = $(this).find('.action').attr('data-idx');
                        });

                        $('#actionContainer').remove();
                        let lastIdx = last;
                        let html =
                            '<div id="actionContainer"><i class="fa fa-plus" id="btnAddRow" data-idx="' +
                            lastIdx +
                            '"></i>&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' +
                            lastIdx + '"></i></div>';
                        $('#action' + lastIdx).append(html);

                        //call ajax delete
                        deletedIds[0] = pelatihan_session_kehadiran_id;
                        deletePeserta(deletedIds);
                    }
                });
            });

            function deletePeserta(deletedIds) {
                //ajax delete
                let token = "yqHqsCfAaCLiqadh3Y9LSoOhhBPnzWvMi4sjhhDj";
                let urlDeletePeserta =
                    "https://presensi.sdmdigital.id/pelatihan/kelola-sesi/kehadiran-manual/delete-peserta";
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });

                $.ajax({
                    type: "POST",
                    url: urlDeletePeserta,
                    dataType: "json",
                    data: {
                        _token: token,
                        id_deleted: deletedIds
                    },
                    success: function(response) {
                        $('#deletePesertaMessage').text('Berhasil menghapus data peserta.');
                        $('#deletePesertaMessage').css('display', 'block');
                    },
                    error: function(e) {
                        console.log(e.responseText);
                    }
                });
            }
            
            $(document).on('click', '#btnAddRow', function() {

                let idx = $(this).data("idx");

                let pelatihan_session_kehadiran_id = $('#pelatihan_session_kehadiran_id' + idx).val();

                let nama_barang = $('#nama_barang' + idx).val();

                let harga_barang = $('#harga_barang' + idx).val();

                let jumlah_barang = $('#jumlah_barang' + idx).val();

                //let total_harga = $('#total_harga'+idx).val();

                let total_harga = harga_barang * jumlah_barang;

                let total_harga_ = $('#total_harga' + idx).val(uang(total_harga));
                //$('#total_dana_ajuan').val(uang(total_dana_ajuan)); 

                let t = $('#total_harga_barang').val();

                let tt = parseInt(t) + total_harga;

                $('#total_harga_barang').val(tt);

                alert(nama_barang + harga_barang + jumlah_barang);

            });

            function simpandata() {

                var nama_barang = $('#nama_barang').val();
                var id_permohonan = '{{ Request::segment(2) }}';
                // var qty = $('#qty').val();
                var qty = "2";
                // var harga_satuan = $('#harga_satuan').val();
                var harga_satuan = "5000";
                // $('#harga_satuan').val(uang(harga_satuan));
                // var total_harga_barang = $('#total_harga_barang').val();
                var total_harga_barang = "10000";

                $.post("{{ url('/detail-permohonan/add') }}", {
                    _token: "{{ csrf_token() }}",
                    id_permohonan: id_permohonan,
                    nama_barang: nama_barang,
                    qty: qty,
                    harga_satuan: harga_satuan,
                    total_harga_barang: total_harga_barang

                }).done(function(response) {
                    if (response != null) {

                        Swal.fire(
                            'Detail Permohonan!',
                            'Detail Permohonan Telah Ditambah.',
                            'success'
                        )
                        location.reload()

                        $(".simpan-permohonan").attr("disabled", false);

                        $('#nama_barang').val('');
                        $('#qty').val('');
                        $('#harga_satuan').val('');
                        $('#nominal_acc').val('');
                        $('#total_harga_barang').val('');

                        // $('#modalubah').modal('hide');

                    } else {

                        getmax();

                        Swal.fire({
                            icon: 'error',
                            title: 'Detail Permohonan Dana gagal diubah',
                            text: 'Detail Permohonan Dana gagal diubah.',
                            showCancelButton: false,
                            confirmButtonColor: '#FF6347',
                            confirmButtonText: 'Siap',
                        })

                        $(".simpan-permohonan").attr("disabled", false);

                    }

                }, "json");
            }

            function save() {

                var rows = $("#table-barang").find("tr").length;
                var savingRows = [];

                for (var rowOn = 1; rowOn < rows; rowOn++) {

                    var startDate = $("#table-barang").find("tr").eq(rowOn).find("td").eq(0).text();
                    var endDate = $("#table-barang").find("tr").eq(rowOn).find("td").eq(1).val();
                    var thing = $("#table-barang").find("tr").eq(rowOn).find("td").eq(2).val();

                    var rowData = [{
                        start_date: startDate,
                        end_date: endDate,
                        thing: thing
                    }]

                    savingRows.push(rowData);

                    alert(rowData)

                }

            }

        });
   
        $(document).ready(function() {
            $('#table-permohonan').DataTable({
                paging: true,
                scrollY: 200,
                scrollX: true,
            });

            get();
            getdetailbarang();

            $("#harga_satuan, #qty").keyup(function() {

                var harga = $("#harga_satuan").val();
                var jumlah = $("#qty").val();

                var total = parseInt(harga.replace(/,/g, '')) * parseInt(jumlah);
                $("#total_harga_barang").val(uang(total));
            });

            $('#total_dana_ajuan').change(function() {
                var total_dana_ajuan = $('#total_dana_ajuan').val();
                $('#total_dana_ajuan').val(uang(total_dana_ajuan));
            });

            $('#table-permohonan').on('click', '.item-ubah', function() {

                // var id_permohonan = $(this).data('ip');
                var id_detail_permohonan = $(this).data('idp');
                var name = $(this).data('nama');
                var tanggal_permohonan = $(this).data('tgl');
                var nama_barang = $(this).data('brg');
                var harga_satuan = $(this).data('hrg');
                var qty = $(this).data('qty');
                var total_harga_barang = $(this).data('ttlhrg');

                $('#id_detail_permohonan').val(id_detail_permohonan);
                $('#name').val(name);
                $('#tanggal_permohonan').val(tanggal_permohonan);
                $('#nama_barang').val(nama_barang);
                $('#harga_satuan').val(harga_satuan);
                $('#qty').val(qty);
                $('#total_harga_barang').val(total_harga_barang);

                // ('#ubah-permohonan').attr("hidden",false);
                //('.btn-simpan-hide').attr('hidden', true);

            });

            $(".simpan-permohonan").click(function() {
                simpandata();
            });

            $(".ubah-permohonan").click(function() {
                ubahdata();
            });

            $('#table-permohonan').on('click', '.item-hapus', function() {

                var currow = $(this).closest('tr');

                var id = currow.find('td:eq(1)').text();

                $('#id_hapus').val(id.trim());

                $('#modal_hapus').modal('show');

            });

            $('#qty').change(function() {
                $('#keteranang_detail').val($('#nama_barang').val() + '=' + $('#harga_satuan').val() +
                    'x' + $('#qty').val());
            });



            function ubahdata() {

                var id_detail_permohonan = $('#id_detail_permohonan').val();
                var nama_barang = $('#nama_barang').val();
                var harga_satuan = $('#harga_satuan').val();
                var qty = $('#qty').val();
                var total_harga_barang = $('#total_harga_barang').val();

                $('.simpan-permohonan').attr("disabled", "disabled");

                $.post("{{ url('/detail-permohonan/edit') }}", {
                    _token: "{{ csrf_token() }}",
                    id_detail_permohonan: id_detail_permohonan,
                    nama_barang: nama_barang,
                    harga_satuan: harga_satuan,
                    qty: qty,
                    total_harga_barang: total_harga_barang

                }).done(function(response) {

                    if (response == "success") {
                        Swal.fire(
                            'Disetujui!',
                            'Permohonan Dana Di setujui.',
                            'success'
                        )
                        // location.reload()

                        $(".simpan-permohonan").attr("disabled", false);

                        get();

                        $(".item-ubah").attr("disabled", false);

                        $('#id_detail_permohonan').val('');
                        $('#name').val('');
                        $('#nama_barang').val('');
                        $('#tanggal_permohonan').val('');
                        $('#harga_satuan').val('');
                        $('#qty').val('');
                        $('#total_harga_barang').val('');
                        $('#keteranang_detail').val('');

                        // $('#modalubah').modal('hide');

                    } else {
                        Swal.fire(
                            'Tidak Disetujui!',
                            'Permohonan Dana Tidak Di setujui.',
                            'error'
                        )
                        location.reload()

                        $(".item-ubah").attr("disabled", false);

                    }

                }, "json");
            }

            function get() {
                $('#table-permohonan').DataTable({

                    "destroy": true,
                    "processing": true,
                    "ordering": true,
                    "pageLength": 10,
                    "ajax": {

                        url: "{{ url('/detail-permohonan/getdata') }}/{{ Request::segment(2) }}",
                        type: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            id_permohonan: "id_permohonan",
                            id_detail_permohonan: "id_detail_permohonan"
                        },
                        async: true,
                        dataType: 'json',
                    },

                    "deferRender": true,

                    "aLengthMenu": [
                        [5, 10, 50],
                        [5, 10, 50]
                    ],

                    "columns": [

                        {
                            "render": function(data, type, row, meta) {
                                return meta.row + meta.settings._iDisplayStart + 1;
                            },

                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return String(row.id_permohonan);

                            },
                            padding: '5px',
                            visible: false
                        },

                        {
                            "render": function(data, type, row) {

                                return String(row.id_detail_permohonan);

                            },
                            padding: '5px',
                            visible: false
                        },

                        {
                            "render": function(data, type, row) {

                                return String(row.name);

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return row.tanggal_permohonan;

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return row.nama_barang;

                            },
                            padding: '5px'
                        },
                        {
                            "render": function(data, type, row) {

                                return 'Rp ' + String(uang(row.harga_satuan));

                            },
                            padding: '5px'
                        },
                        {
                            "render": function(data, type, row) {

                                return String(uang(row.qty));

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                return String(uang(row.total_harga_barang));

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {

                                if (row.status_permohonan == 0) {
                                    return '<span class="badge bg-warning text-dark">Belum Disetujui</span>';
                                } else if (row.status_permohonan == 1) {
                                    return '<span class="badge bg-success">Disetujui Bendahara</span>';
                                } else if (row.status_permohonan == 2) {
                                    return '<span class="badge bg-success">Disetujui Manajer</span>';
                                } else if (row.status_permohonan == 3) {
                                    return '<span class="badge bg-success">Disetujui</span>';
                                } else {
                                    return '<span class="badge bg-danger">Ditolak</span>';
                                }

                            },
                            padding: '5px'
                        },

                        {
                            "render": function(data, type, row) {
                                return '<a class="dropdown-item item-ubah" href="#" data-idp="' +
                                    row.id_detail_permohonan + '" data-nama="' + row
                                    .name +
                                    '" data-tgl="' + row.tanggal_permohonan +
                                    '" data-brg="' + row
                                    .nama_barang +
                                    '" data-hrg="' + row.harga_satuan +
                                    '"  data-qty="' + row
                                    .qty +
                                    '" data-ttlhrg="' + row.total_harga_barang +
                                    '" data-st="' + row.status_permohonan +
                                    '"><i class="fas fa-edit btn btn-icon btn-light-primary"></i></a> <a class="dropdown-item item-hapus" href="#" data-idp="' +
                                    row.id_detail_permohonan +
                                    '"><i class="fas fa-trash-alt btn btn-icon btn-light-danger item-hapus"></i></a>'
                            },
                            padding: '5px'
                        }
                    ],
                });

            }

            function terbilang(angka) {

                var bilne = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan",
                    "sembilan",
                    "sepuluh", "sebelas"
                ];

                if (angka < 12) {

                    return bilne[angka];

                } else if (angka < 20) {

                    return terbilang(angka - 10) + " belas";

                } else if (angka < 100) {

                    return terbilang(Math.floor(parseInt(angka) / 10)) + " puluh " + terbilang(parseInt(
                            angka) %
                        10);

                } else if (angka < 200) {

                    return "seratus " + terbilang(parseInt(angka) - 100);

                } else if (angka < 1000) {

                    return terbilang(Math.floor(parseInt(angka) / 100)) + " ratus " + terbilang(
                        parseInt(
                            angka) %
                        100);

                } else if (angka < 2000) {

                    return "seribu " + terbilang(parseInt(angka) - 1000);

                } else if (angka < 1000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000)) + " ribu " + terbilang(
                        parseInt(
                            angka) %
                        1000);

                } else if (angka < 1000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000)) + " juta " + terbilang(
                        parseInt(
                            angka) %
                        1000000);

                } else if (angka < 1000000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000000)) + " milyar " + terbilang(
                        parseInt(
                            angka) % 1000000000);

                } else if (angka < 1000000000000000) {

                    return terbilang(Math.floor(parseInt(angka) / 1000000000000)) + " trilyun " +
                        terbilang(
                            parseInt(angka) % 1000000000000);

                }

            }

            function uang(num) {

                var str = num.toString().replace("", ""),
                    parts = false,
                    output = [],
                    i = 1,
                    formatted = null;
                if (str.indexOf(".") > 0) {
                    parts = str.split(".");
                    str = parts[0];
                }
                str = str.split("").reverse();
                for (var j = 0, len = str.length; j < len; j++) {
                    if (str[j] != ",") {
                        output.push(str[j]);
                        if (i % 3 == 0 && j < (len - 1)) {
                            output.push(",");
                        }
                        i++;
                    }
                }
                formatted = output.reverse().join("");
                return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));

            }

            function getdetailbarang() {

                $('#keteranang_detail').empty();

                $.post("{{ route('keterangan.all') }}", {
                    _token: "{{ csrf_token() }}",
                    id_permohonan: "{{ Request::segment(2) }}"
                }).done(function(data) {

                    // var res = JSON.parse(response);
                    var res = data;

                    // var res = $.parseJSON(data);

                    $.each(res, function(index, value) {

                        $('#keteranang_detail').val(value.nama_barang + ' ' + value.qty +
                            '\n'); // Append item to list
                        //item.val(''); // Clear new item

                        // $('#keteranang_detail').text(value.nama_barang + ' ' + value.qty +
                        //     ' ' + value.harga_satuan + '\n');

                        // alert(value.nama_barang + ' ' + value.qty +
                        //     ' ' + value.satuan + '<br>')

                    });
                });

            }

        });
    </script>
@endsection


<script>
    // Shorthand for $( document ).ready()
    $(function() {

        get();

        let base_url = "http://localhost/koperasi/public";
        //let indexRow = "2";
        let status = 5;
        let getListUserUrl = "https://presensi.sdmdigital.id/getUsers";
        
        $(document).on('click', '#btnAdd, #btnAddRow', function() {

            //$('#actionContainer').remove();

            let indexRow = $(this).data("idx") + 1;

            let row = $('#table-barang tr').length;

            let html = '<tr id="barang' + indexRow + '" class="row-table" data-idx="' + indexRow + '">';

                html += '<input type="hidden" name="ids_example[]" id="id_example'+ indexRow +'" value="0">';

                html += '<input type="hidden" name="is_deleted[]" id="is_deleted'+ indexRow +'" value="0">';

                html += '<td><input type="checkbox" name="check_delete[]" class="check_delete mt-3" id="check_delete' + indexRow + '" data-idx="' + indexRow + '"></td>';

                html += '<td class="no" id="no' + indexRow + '"><div class="mt-3">' + row + '</div></td>';

                html += '<td><input type="text" class="form-control input-sm ml-2" name="nama_barang[]" id="nama_barang' + indexRow +'" required></td>';

                html += '<td><input type="text" class="form-control input-sm ml-2" name="harga_barang[]" id="harga_barang' + indexRow +'" required></td>';

                html += '<td><input type="text" class="form-control input-sm ml-2" name="jumlah_barang[]" id="jumlah_barang' + indexRow +'" required></td>';

                html += '<td><input type="text" disabled class="form-control input-sm ml-2" name="total_harga[]" id="total_harga' + indexRow +'" required></td>';
                        
                html += '<td id="action' + indexRow + '" class="action" data-idx="' + indexRow + '"><div id="actionContainer"><i class="fa fa-plus" id="btnAddRow" data-idx="' + indexRow + '"></i>&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' + indexRow + '"></i></div></td>';
                
                html += '<input type="hidden" name="id_deleted[]" id="id_example_hapus'+ indexRow +'" value="0">';
            
            html += '</tr>';

            $('#table-barang tbody').append(html);

            indexRow++;
        });

        $(document).on('click', '#btnDeleteRow', function() {

            Swal.fire({
                title: "Hapus Barang",
                text: "Apakah anda yakin ingin menghapus?",
                icon: 'warning',
                confirmButtonText: "Yes",
                cancelButtonText: "No",
                showCancelButton: true,
                showCloseButton: true
            }).then((result) => {
                if (result.value) {

                    let idx = $(this).data("idx");
                    let id_example_hapus = $('#id_example'+idx).val();
                    let nama_barang = $('#nama_barang'+idx).val();
                    let deletedIds = [];

                    let deletedHtml = '<input type="hidden" name="id_deleted[]" value="'+id_example_hapus+'">';
                    $('#form').append(deletedHtml);
                    $('#barang' + idx).remove();
                    let last = 0;
                    $('.row-table').each(function(i, obj) {
                        let no = i + 1;
                        $(this).find('.no').text(no);
                        last = $(this).find('.action').attr('data-idx');
                    });
                    
                    let lastIdx = last;
                    let html = '<div id="actionContainer"><i class="fa fa-plus" id="btnAddRow" data-idx="' + lastIdx + '"></i>&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' + lastIdx + '"></i></div>';
                    $('#action' + lastIdx).append(html);


                    //Hapus Data
                    deletedata(id_example_hapus);

                }
            });
        });

        $(document).on('click', '#btnAddRow', function() {
        
            let idx = $(this).data("idx") + 1;

            let id_example = $('#id_example'+idx).val();

            let nama_barang = $('#nama_barang'+idx).val();

            let harga_barang = $('#harga_barang'+idx).val();

            let jumlah_barang = $('#jumlah_barang'+idx).val();

            let total_harga = harga_barang * jumlah_barang;

            let total_harga_ = $('#total_harga'+idx).val(uang(total_harga));

            let t = $('#total_harga_barang').val();

            let tt = parseInt(t) + total_harga;

            $('#total_harga_barang').val(tt);            
       
            simpandata(nama_barang, harga_barang, jumlah_barang, total_harga);

            $('#btnAddRow').attr("hidden", "hidden");

        });

        function get() {

            $.post("http://localhost/koperasi/public/example/get", {
                data: "data"
            }).done(function(data) {

                var res = $.parseJSON(data);                

                $.each(res, function(indexRow, value) {

                    let tot = $('#total_harga_barang').val();

                    let row = $('#table-barang tr').length;

                    let html = '<tr id="barang' + indexRow + '" class="row-table" data-idx="' + indexRow + '">';

                        html += '<input type="hidden" name="ids_example[]" value="'+value.id_example+'" id="id_example'+ indexRow +'" value="0">';

                        html += '<input type="hidden" name="is_deleted[]" id="is_deleted'+ indexRow +'" value="0">';

                        html += '<td><input type="checkbox" name="check_delete[]" class="check_delete mt-3" id="check_delete' + indexRow + '" data-idx="' + indexRow + '"></td>';

                        html += '<td class="no" id="no' + indexRow + '"><div class="mt-3">' + row + '</div></td>';

                        html += '<td><input type="text" class="form-control input-sm ml-2" value="'+value.nama+'" name="nama_barang[]" id="nama_barang' + indexRow +'" required></td>';

                        html += '<td><input type="text" class="form-control input-sm ml-2" value="'+value.harga+'" name="harga_barang[]" id="harga_barang' + indexRow +'" required></td>';

                        html += '<td><input type="text" class="form-control input-sm ml-2" value="'+value.jumlah+'" name="jumlah_barang[]" id="jumlah_barang' + indexRow +'" required></td>';

                        html += '<td><input type="text" disabled class="form-control input-sm ml-2" value="'+ uang(value.total)+'" name="total_harga[]" id="total_harga' + indexRow +'" required></td>';
                                
                        // html += '<td id="action' + indexRow + '" class="action" data-idx="' + indexRow + '"><div id="actionContainer"><i class="fa fa-plus" id="btnAddRow" data-idx="' + indexRow + '"></i>&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' + indexRow + '"></i></div></td>';
                        html += '<td id="action' + indexRow + '" class="action" data-idx="' + indexRow + '"><div id="actionContainer">&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' + indexRow + '"></i></div></td>';
                        
                        html += '<input type="hidden" name="id_deleted[]" id="id_example_hapus'+ indexRow +'" value="'+ value.id_example +'">';
                    
                    html += '</tr>';

                    var to = parseInt(tot) + parseInt(value.total);                    

                    $('#table-barang tbody').append(html);

                    $('#total_harga_barang').val(to);
                
                });

            });

        }

        function uang(num) {

            var str = num.toString().replace("", ""),
                parts = false,
                output = [],
                i = 1,
                formatted = null;

            if (str.indexOf(".") > 0) {
                parts = str.split(".");
                str = parts[0];
            }

            str = str.split("").reverse();
            for (var j = 0, len = str.length; j < len; j++) {
                if (str[j] != ",") {
                    output.push(str[j]);
                    if (i % 3 == 0 && j < (len - 1)) {
                        output.push(",");
                    }
                    i++;
                }
            }

            formatted = output.reverse().join("");

            return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));

        }

        function simpandata(nama, harga, jumlah, total) {

            $.post("http://localhost/koperasi/public/example/save", {
                nama: nama,
                harga: harga,
                jumlah: jumlah,
                total: total

            }).done(function(response) {
                if (response != null) {

                    console.log("saved")

                    // Swal.fire(
                    //     'Detail Permohonan!',
                    //     'Detail Permohonan Telah Ditambah.',
                    //     'success'
                    // )                    

                } else {

                    console.log("gagal")

                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'Detail Permohonan Dana gagal diubah',
                    //     text: 'Detail Permohonan Dana gagal diubah.',
                    //     showCancelButton: false,
                    //     confirmButtonColor: '#FF6347',
                    //     confirmButtonText: 'Siap',
                    // })                  

                }

            }, "json");

        }

        function deletedata(id){            

            $.post("http://localhost/koperasi/public/example/delete", {
                id_example: id               

            }).done(function(response) {
                if (response != null) {

                    console.log("deleted")

                    // Swal.fire(
                    //     'Detail Permohonan!',
                    //     'Detail Permohonan Telah Ditambah.',
                    //     'success'
                    // )                    

                } else {

                    console.log("gagal")

                    // Swal.fire({
                    //     icon: 'error',
                    //     title: 'Detail Permohonan Dana gagal diubah',
                    //     text: 'Detail Permohonan Dana gagal diubah.',
                    //     showCancelButton: false,
                    //     confirmButtonColor: '#FF6347',
                    //     confirmButtonText: 'Siap',
                    // })                  

                }

            }, "json");
           
        }
    });
</script>