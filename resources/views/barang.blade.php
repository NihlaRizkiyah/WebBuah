@extends('layouts.master')

@push('style')
    <style>
    </style>
@endpush

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Barang</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid p-3">
        <div class="main-content">
            <section class="section mt-1 list-barang-section">
                <div class="tabel-barang">
                    <table id="listing-data" class="table table-hover" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Gambar</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Satuan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </section>
        </div>
    </div>

    <div class="modal fade text-left" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div style="max-width:600px;" class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div style="overflow-y: auto;" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Barang</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <label class="m-0 mt-1">Nama</label>
                        <input placeholder="Nama" class="form-control" id="nama" type="text" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Harga</label>
                        <input placeholder="Harga" class="form-control" id="harga" type="number" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Stok</label>
                        <input placeholder="Stok" class="form-control" id="stok" type="number" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Satuan</label>
                        <input placeholder="Satuan" class="form-control" id="satuan" type="text" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Photo</label>
                        <input type="file" class="form-control" id="photo" accept="image/*capture=filesystem">
                        <button type="button" id="btn-add-barang" class="btn btn-primary mt-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="editBarang" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div style="max-width:600px;" class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div style="overflow-y: auto;" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Edit Barang</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <input type="hidden" id="idedit" />
                        <label class="m-0 mt-1">Nama</label>
                        <input placeholder="Nama" class="form-control" id="namaedit" type="text" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Harga</label>
                        <input placeholder="Harga" class="form-control" id="hargaedit" type="number" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Stok</label>
                        <input placeholder="Stok" class="form-control" id="stokedit" type="number" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Satuan</label>
                        <input placeholder="Satuan" class="form-control" id="satuanedit" type="text"
                            autocomplete="off" required>
                        <label class="m-0 mt-1">Photo</label>
                        <input type="file" class="form-control" id="photoedit" accept="image/*capture=filesystem">
                        <button type="button" id="btn-edit-barang" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        generateData();

        function showModalEditBarang(id, nama, harga, stok, satuan) {
            $('#editBarang').modal('toggle');
            $("#idedit").val(id);
            $("#namaedit").val(nama);
            $("#hargaedit").val(harga);
            $("#stokedit").val(stok);
            $("#satuanedit").val(satuan);
        }

        function inittable(data) {
            $('#listing-data').DataTable({
                "responsive": true,
                "aaData": data,
                "dom": 'Bfrtip',
                buttons: [
                    // {
                    //     extend: 'excelHtml5',
                    //     text: '<span class="green"><img src="https://img.icons8.com/color/48/000000/ms-excel.png"/>Export</span>',
                    //     title: 'Data Barang ' + getDateToday(),
                    //     download: 'open',
                    //     orientation: 'landscape',
                    //     exportOptions: {
                    //         columns: [0, 1, 2, 3, 4]
                    //     }
                    // },
                    {
                        text: '<i class="fas fa-plus-circle"></i> Tambah Barang',
                        "className": "generate-code",
                        action: function(e, dt, node, config) {
                            $('#tambahBarang').modal('toggle');
                        }
                    }
                ],
            });
        }

        $('#btn-add-barang').click(function(e) {
            e.preventDefault();
            let nama = $('#nama').val().trim();
            let harga = $('#harga').val().trim();
            let stok = $('#stok').val().trim();
            let satuan = $('#satuan').val().trim();
            let photo = $("#photo");
            let _token = $('meta[name="csrf-token"]').attr('content');
            if (nama == "") {
                swal("error", "Nama Tidak Boleh Kosong", "error")
            } else if (harga == "") {
                swal("error", "Harga Tidak Boleh Kosong", "error")
            } else if (stok == "") {
                swal("error", "Stok Tidak Boleh Kosong", "error")
            } else if (satuan == "") {
                swal("error", "Satuan Tidak Boleh Kosong", "error")
            } else if (photo.get(0).files.length == 0) {
                swal("error", "Masukkan Gambar", "error")
            } else {
                swal({
                    title: "",
                    text: "Loading...",
                    icon: "{{ asset('img/icon/loading.gif') }}",
                    buttons: false,
                    closeOnClickOutside: false,
                });

                let myFormData = new FormData();
                myFormData.append('nama', nama)
                myFormData.append('harga', harga);
                myFormData.append('stok', stok);
                myFormData.append('satuan', satuan);
                myFormData.append('gambar', photo.prop("files")[0]);
                myFormData.append('_token', _token);
                $.ajax({
                    url: "{{ url('addbarang') }}",
                    type: "POST",
                    data: myFormData,
                    cache: false,
                    success: function(response) {
                        if (response.status == "error") {
                            swal("error", response.message, "error");
                        } else {
                            swal("", "Input Data Berhasil", "success").then(function() {
                                location.reload();
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("", "Gagal Input Data", "error").then(function() {});
                    },
                    processData: false,
                    contentType: false,
                });
            }
        })

        $('#btn-edit-barang').click(function(e) {
            e.preventDefault();
            let id = $('#idedit').val().trim();
            let nama = $('#namaedit').val().trim();
            let harga = $('#hargaedit').val().trim();
            let stok = $('#stokedit').val().trim();
            let satuan = $('#satuanedit').val().trim();
            let photo = $("#photoedit");
            let _token = $('meta[name="csrf-token"]').attr('content');
            if (nama == "") {
                swal("error", "Nama Tidak Boleh Kosong", "error")
            } else if (harga == "") {
                swal("error", "Harga Tidak Boleh Kosong", "error")
            } else if (stok == "") {
                swal("error", "Stok Tidak Boleh Kosong", "error")
            } else if (satuan == "") {
                swal("error", "Satuan Tidak Boleh Kosong", "error")
            } else {
                swal({
                    title: "",
                    text: "Loading...",
                    icon: "{{ asset('img/icon/loading.gif') }}",
                    buttons: false,
                    closeOnClickOutside: false,
                });

                let myFormData = new FormData();
                myFormData.append('id', id)
                myFormData.append('nama', nama)
                myFormData.append('harga', harga);
                myFormData.append('stok', stok);
                myFormData.append('satuan', satuan);
                if (photo.get(0).files.length > 0) {
                    console.log("upload");
                    myFormData.append('gambar', photo.prop("files")[0]);
                }
                myFormData.append('_token', _token);
                $.ajax({
                    url: "{{ url('editbarang') }}",
                    type: "POST",
                    data: myFormData,
                    cache: false,
                    success: function(response) {
                        if (response.status == "error") {
                            swal("error", response.message, "error");
                        } else {
                            swal("", "Input Data Berhasil", "success").then(function() {
                                location.reload();
                            });
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        swal("", "Gagal Input Data", "error").then(function() {});
                    },
                    processData: false,
                    contentType: false,
                });
            }
        })

        function deleteBarang(id) {
            let _token = $('meta[name="csrf-token"]').attr('content');
            swal({
                    title: "Apakah Anda Yakin?",
                    text: "Data Tidak Akan Bisa Dikembalikan Lagi",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        swal({
                            title: "",
                            text: "Loading...",
                            icon: "{{ asset('img/icon/loading.gif') }}",
                            buttons: false,
                            closeOnClickOutside: false,
                        });
                        $.ajax({
                            url: "{{ url('deletebarang') }}",
                            type: "POST",
                            data: {
                                id: id,
                                _token: _token,
                            },
                            success: function(response) {
                                if (response) {
                                    swal("", "Hapus Barang Berhasil", "success").then(function() {
                                        location.reload();
                                    });
                                }
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                swal("", "Gagal hapus data", "error").then(function() {});
                            },
                        });
                    }
                });
        }

        function generateData() {
            let _token = $('meta[name="csrf-token"]').attr('content');
            let arrayReturn = [];
            swal({
                title: "",
                text: "Loading...",
                icon: "{{ asset('img/icon/loading.gif') }}",
                buttons: false,
                closeOnClickOutside: false,
            });
            $.ajax({
                url: "/databarang",
                type: "POST",
                data: {
                    _token: _token
                },
                success: function(data) {
                    console.log(data);
                    swal.close();
                    for (let i = 0, len = data.length; i < len; i++) {
                        let id = data[i].id;
                        let nama = data[i].nama;
                        let harga = data[i].harga;
                        let satuan = data[i].satuan;
                        let stok = data[i].stok;
                        let image = `<img src={{ asset('img/barang/${data[i].photo}') }}  style="width:40px;height:40px" />`;
                        let btnAksi = "";
                        btnAksi =
                            `
                        <a title='accept' onclick="showModalEditBarang('${id}', '${nama}', '${harga}', '${stok}', '${satuan}')" class='btn-aksi btn btn-sm btn-success'>Edit</a>
                        <a title='delete' onclick="deleteBarang('${id}')" class='btn-aksi btn btn-sm btn-danger'>Hapus</a>`;
                        arrayReturn.push([i + 1, nama, image, harga, stok, satuan, btnAksi]);
                    }
                    inittable(arrayReturn);
                },
                error: function(request, status, error) {
                    swal("error", "Gagal Load", "error");
                }
            });
        }

        function getDateToday() {
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth() + 1).padStart(2, '0');
            var yyyy = today.getFullYear();
            today = dd + '-' + mm + '-' + yyyy;
            return today;
        }
    </script>

@endpush
