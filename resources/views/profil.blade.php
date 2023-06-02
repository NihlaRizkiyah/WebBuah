@extends('layouts.master')

@push('style')
    <style>
        @media (max-width: 600px) {
            .card-body #photo {
                max-width: 300px;
            }
        }
    </style>
@endpush

@section('main')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid p-3">
        <div class="main-content">
            <section class="section list-barang-section">
                <div id="wrap-main" style="background:white" class="p-4">
                    <div class="card-body">
                        <div class="row">
                            {{-- <div class="col-md-3 text-center">
                                <a id="wrap-photo" target="_blank"><img class="card-img-top" id="photo"
                                        caption="image-user"></a>
                            </div> --}}
                            <div class="col-md-9">
                                <table class="table">
                                    <tr>
                                        <td>Nama</td>
                                        <td><strong id="nama"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><strong id="email"></strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0" style="font-size: 23px">Ubah Password</h3>
                </div>
            </div>
        </div>
    </div>
    <div class="content-header">
        <div class="container-fluid">
            <div id="wrap-main" style="background:white" class="p-4">
                <label for="old-password">Password Lama</label>
                <input type="password" id="old-password" class="form-control" placeholder="password lama">
                <label for="new-password" class="mt-2">Password Baru</label>
                <input type="password" id="new-password" class="form-control" placeholder="password baru">
                <label for="confirm-password" class="mt-2">Konfirmasi Password</label>
                <input type="password" id="confirm-password" class="form-control" placeholder="konfirmasi password">
                <button class="btn btn-primary mt-4" id="btn-ubah-password">Simpan</button>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        generateData();

        function generateData() {
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/dataprofil",
                type: "POST",
                data: {
                    _token: _token,
                },
                success: function(data) {
                    for (var i = 0, len = data.length; i < len; i++) {
                        var nama = data[i].name;
                        var email = data[i].email;
                        $('#nama').text(nama);
                        $('#email').text(email);
                    }
                },
                error: function(request, status, error) {
                    swal("error", "Gagal Load", "error");
                }
            });
        }

        $("#btn-ubah-password").click(function() {
            update();
        })

        function update() {
            let _token = $('meta[name="csrf-token"]').attr('content');
            let oldpassword = $("#old-password").val();
            let newpassword = $("#new-password").val();
            let confirmpassword = $("#confirm-password").val();

            if (newpassword.length < 5) {
                swal("error", "Password Minimal 5 Karakter", "error");
                return;
            }

            if (newpassword != confirmpassword) {
                swal("error", "Konfirmasi Password Tidak Sama", "error");
                return;
            }

            let myFormData = new FormData();
            myFormData.append('old_password', oldpassword);
            myFormData.append('new_password', newpassword);
            myFormData.append('_token', _token);

            swal({
                title: "",
                text: "Loading...",
                icon: "{{ asset('img/icon/loading.gif') }}",
                buttons: false,
                closeOnClickOutside: false,
            });

            $.ajax({
                url: "/updatepassword",
                type: "POST",
                data: myFormData,
                cache: false,
                success: function(response) {
                    if (response.status == "error") {
                        swal("error", response.message, "error");
                    } else {
                        swal("success", "Berhasil Update Password", "success").then(function() {
                            location.reload();
                        });
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    swal("", "Gagal Update Data", "error").then(function() {});
                },
                processData: false,
                contentType: false,
            });
        }
    </script>
@endpush
