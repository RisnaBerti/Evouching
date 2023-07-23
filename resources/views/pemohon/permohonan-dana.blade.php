@extends('layouts.main-pemohon')

@section('content')
    <div id="layoutSidenav_content">
        <main>
            
            <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            </header>
            <!-- Main page content-->
            <div class="container-xl px-4 mt-n10">
                <div class="card card-custom">
                    <div class="card-header ">
                        <div class="card-title">
                            <h3 class="card-label">
                                Detail Permohonan Dana
                            </h3>
                        </div>
                        <div class="card-toolbar">
                            <a href="{{ route('permohonan-pemohon') }}"> <button
                                    class="btn btn-primary btn-sm">Back</button></a>
                        </div>
                    </div>
                    <div class="card-header">
                        <div class="card-body">
                            <h4 class="text_nominal_ajuan alert alert-primary">Nominal Ajuan: </h4> <br>

                            <div class="col-md-12 table-responsive">
                                <input type="hidden" name="total_partisipan" id="total_partisipan" value="0">
                                <table id="table-barang" class="table table-striped table-row-bordered gy-5 gs-7"
                                    cellspacing="0" width="100%">
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
                        <div class="card-footer container-xl mt-5 mb-5">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Total Harga :</label>
                                    <input readonly type="text" id="total_harga_barang" value="0">
                                </div>
                                <div class="col-lg-6">
                                    <button class="btn btn-primary btn-sm float-right" id="btnAdd">Tambah</button>
                                </div>
                            </div>                                                    
                        </div>
                    </div>
                </div>
            </div>

        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(function() {
            get();
            getNominal();
            getNominalAjuan();
            let base_url = "http://localhost/koperasi/public";
            let status = 5;
            let getListUserUrl = "https://presensi.sdmdigital.id/getUsers";

            $(document).on('click', '#btnAdd, #btnAddRow', function() {

                //$('#actionContainer').remove();

                let indexRow = $(this).data("idx") + 1;

                let row = $('#table-barang tr').length;

                let html = '<tr id="barang' + indexRow + '" class="row-table" data-idx="' + indexRow + '">';

                html += '<input type="hidden" name="ids_example[]" id="id_detail_permohonan' + indexRow +
                    '" value="0">';

                html += '<input type="hidden" name="is_deleted[]" id="is_deleted' + indexRow +
                    '" value="0">';

                html +=
                    '<td><input type="checkbox" name="check_delete[]" class="check_delete mt-3" id="check_delete' +
                    indexRow + '" data-idx="' + indexRow + '"></td>';

                html += '<td class="no" id="no' + indexRow + '"><div class="mt-3">' + row + '</div></td>';

                html +=
                    '<td><input type="text" class="form-control input-sm ml-2" name="nama_barang[]" id="nama_barang' +
                    indexRow + '" required></td>';

                html +=
                    '<td><input type="text" class="form-control input-sm ml-2" name="harga_barang[]" id="harga_barang' +
                    indexRow + '" required></td>';

                html +=
                    '<td><input type="text" class="form-control input-sm ml-2" name="qty[]" id="qty' +
                    indexRow + '" required></td>';

                html +=
                    '<td><input type="text" disabled class="form-control input-sm ml-2" name="total_harga_barang[]" id="total_harga_barang' +
                    indexRow + '" required></td>';

                html += '<td id="action' + indexRow + '" class="action" data-idx="' + indexRow +
                    '"><div id="actionContainer"><i class="fa fa-plus" id="btnAddRow" data-idx="' +
                    indexRow + '"></i>&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' +
                    indexRow + '"></i></div></td>';

                html += '<input type="hidden" name="id_deleted[]" id="id_example_hapus' + indexRow +
                    '" value="0">';

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
                        let id_example_hapus = $('#id_detail_permohonan' + idx).val();
                        let nama_barang = $('#nama_barang' + idx).val();
                        let deletedIds = [];

                        let deletedHtml = '<input type="hidden" name="id_deleted[]" value="' +
                            id_example_hapus + '">';
                        $('#form').append(deletedHtml);
                        $('#barang' + idx).remove();
                        let last = 0;
                        $('.row-table').each(function(i, obj) {
                            let no = i + 1;
                            $(this).find('.no').text(no);
                            last = $(this).find('.action').attr('data-idx');
                        });

                        let lastIdx = last;
                        let html =
                            '<div id="actionContainer"><i class="fa fa-plus" id="btnAddRow" data-idx="' +
                            lastIdx +
                            '"></i>&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' +
                            lastIdx + '"></i></div>';
                        $('#action' + lastIdx).append(html);


                        // Hapus Data
                        deletedata(id_example_hapus);

                        // alert(id_example_hapus);

                    }
                });
            });

            $(document).on('click', '#btnAddRow', function() {

                let idx = $(this).data("idx") + 1;

                let id_detail_permohonan = $('#id_detail_permohonan' + idx).val();

                let nama_barang = $('#nama_barang' + idx).val();

                let harga_barang = $('#harga_barang' + idx).val();

                let qty = $('#qty' + idx).val();

                let total_harga_barang = harga_barang * qty;

                let total_harga_barang_ = $('#total_harga_barang' + idx).val(uang(total_harga_barang));

                let t = $('#total_harga_barang').val();

                let tt = parseInt(t) + total_harga_barang;

                // $('#total_harga_barang').val(tt);

                simpandata(nama_barang, qty, harga_barang, total_harga_barang);

                $('#btnAddRow').attr("hidden", "hidden");

            });

            function get() {

                $.post("{{ url('/detail-permohonan/getdata') }}", {
                    _token: "{{ csrf_token() }}",
                    id_permohonan: '<?php $segments = Request::segments();
                    echo $segments[1]; ?>',
                }).done(function(data) {

                    var res = $.parseJSON(data);


                    $.each(res, function(indexRow, value) {


                        let tot = $('#total_harga_barang').val();
                        let row = $('#table-barang tr').length;

                        let html = '<tr id="barang' + indexRow + '" class="row-table" data-idx="' +
                            indexRow + '">';

                        html += '<input type="hidden" name="ids_example[]" value="' + value
                            .id_detail_permohonan + '" id="id_detail_permohonan' + indexRow +
                            '" value="0">';

                        html += '<input type="hidden" name="is_deleted[]" id="is_deleted' +
                            indexRow + '" value="0">';

                        html +=
                            '<td><input type="checkbox" name="check_delete[]" class="check_delete mt-3" id="check_delete' +
                            indexRow + '" data-idx="' + indexRow + '"></td>';

                        html += '<td class="no" id="no' + indexRow + '"><div class="mt-3">' + row +
                            '</div></td>';

                        html +=
                            '<td><input type="text" class="form-control input-sm ml-2" value="' +
                            value.nama_barang + '" name="nama_barang[]" id="nama_barang' +
                            indexRow +
                            '" required></td>';

                        html +=
                            '<td><input type="text" class="form-control input-sm ml-2" value="' +
                            value.harga_satuan + '" name="harga_satuan[]" id="harga_satuan' +
                            indexRow +
                            '" required></td>';

                        html +=
                            '<td><input type="text" class="form-control input-sm ml-2" value="' +
                            value.qty + '" name="qty[]" id="qty' + indexRow +
                            '" required></td>';

                        html +=
                            '<td><input type="text" disabled class="form-control input-sm ml-2" value="' +
                            uang(value.total_harga_barang) +
                            '" name="total_harga_barang[]" id="total_harga_barang' +
                            indexRow + '" required></td>';

                        // html += '<td id="action' + indexRow + '" class="action" data-idx="' + indexRow + '"><div id="actionContainer"><i class="fa fa-plus" id="btnAddRow" data-idx="' + indexRow + '"></i>&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' + indexRow + '"></i></div></td>';
                        html += '<td id="action' + indexRow + '" class="action" data-idx="' +
                            indexRow +
                            '"><div id="actionContainer">&nbsp;&nbsp;<i class="fa fa-minus" id="btnDeleteRow" data-idx="' +
                            indexRow + '"></i></div></td>';

                        html += '<input type="hidden" name="id_deleted[]" id="id_example_hapus' +
                            indexRow + '" value="' + value.id_detail_permohonan + '">';

                        html += '</tr>';

                        var to = parseInt(tot) + parseInt(value.total_harga_barang);

                        $('#table-barang tbody').append(html);

                        // $('#total_harga_barang').val(to);

                    });

                });

            }

            function getNominalAjuan() {

                $.post("{{ url('/detail-permohonan/getNominalAjuan') }}", {
                        _token: "{{ csrf_token() }}",
                        id_permohonan: '<?php $segments = Request::segments(); echo $segments[1]; ?>',
                    })
                    .done(function(data) {
                        // alert(data.harga_satuan);
                        // var hargatotal = parseInt(data);
                        $(".text_nominal_ajuan").html("Nominal Dana yang di ajukan : Rp. " +uang(data.total_dana_ajuan));
                    });
            }

            function getNominal() {

                $.post("{{ url('/detail-permohonan/getNominal') }}", {
                        _token: "{{ csrf_token() }}",
                        id_permohonan: '<?php $segments = Request::segments();echo $segments[1]; ?>',
                    })
                    .done(function(data) {
                        // alert(data.harga_satuan);
                        // var hargatotal = parseInt(data);
                        $("#total_harga_barang").val(data.harga_satuan);
                    });
            }

            function simpandata(nama_barang, qty, harga_satuan, total_harga_barang) {

                $.post("{{ url('/detail-permohonan/add') }}", {
                    _token: "{{ csrf_token() }}",
                    id_permohonan: '<?php $segments = Request::segments();
                    echo $segments[1]; ?>',
                    nama_barang: nama_barang,
                    qty: qty,
                    harga_satuan: harga_satuan,
                    total_harga_barang: total_harga_barang

                }).done(function(response) {
                    if (response != null) {

                        console.log("saved")
                        location.reload();

                        getNominal();

                        Swal.fire(
                            'Detail Permohonan!',
                            'Detail Permohonan Telah Ditambah.',
                            'success'
                        )
                        location.reload();

                    } else {

                        console.log("gagal")

                        Swal.fire({
                            icon: 'error',
                            title: 'Detail Permohonan Dana gagal disimpan',
                            text: 'Detail Permohonan Dana gagal disimpan.',
                            showCancelButton: false,
                            confirmButtonColor: '#FF6347',
                            confirmButtonText: 'Siap',
                        })

                    }

                }, "json");

            }

            function deletedata(id_detail_permohonan) {

                $.post("{{ url('/detail-permohonan/delete') }}", {
                    _token: "{{ csrf_token() }}",
                    id_detail_permohonan: id_detail_permohonan

                }).done(function(response) {
                    if (response != null) {

                        console.log("deleted")

                        location.reload();

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
        });
    </script>
@endsection
