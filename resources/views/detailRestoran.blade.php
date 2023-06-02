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
    <div class="container-fluid p-3">
        <div class="main-content">
            <section class="section list-barang-section">
                <div class="card">
                    <div class="card-header" style="font-size:22px;font-weight:600">
                        Detail Restoran
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3 text-center">
                                <a id="wrap-photo" target="_blank"><img class="card-img-top" id="photo"
                                        caption="image-restoran"></a>
                            </div>
                            <div class="col-md-9">
                                <table class="table">
                                    <tr>
                                        <td>Nama Restoran</td>
                                        <td><strong id="nama"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor HP</td>
                                        <td><strong id="nomorhp"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Alamat</td>
                                        <td><strong id="alamat"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td><strong id="deskripsi"></strong></td>
                                    </tr>
                                    <tr>
                                        <td>Fasilitas</td>
                                        <td><strong id="fasilitas"></strong></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        generateData();

        function generateData() {
            var url = '{{ Request::url() }}';
            var id = url.substring(url.lastIndexOf('/') + 1)
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "/datadetailrestoran",
                type: "POST",
                data: {
                    _token: _token,
                    id: id
                },
                success: function(data) {
                    var nama = data.nama;
                    var deskripsi = data.deskripsi;
                    var alamat = data.alamat;
                    var nomorhp = data.no_hp;
                    var kategori = data.kategori;
                    var  fasilitas = data.fasilitas;
                    var gambar = data.image;
                    $('#nama').text(nama);
                    $('#alamat').text(alamat);
                    $('#nomorhp').text(nomorhp);
                    $('#deskripsi').text(deskripsi);
                    $('#fasilitas').html(fasilitas);
                    if (gambar) {
                        var src = `{{ asset('img/restoran/${gambar}') }}`;
                        $('#photo').attr("src", src);
                        $('#wrap-photo').attr("href", src);
                    } else {
                        var src = `{{ asset('img/restoran/default.png') }}`;
                        $('#photo').attr("src", src);
                    }
                },
                error: function(request, status, error) {
                    swal("error", "Gagal Load", "error");
                }
            });
        }
    </script>
@endpush
