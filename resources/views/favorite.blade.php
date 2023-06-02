@extends('layouts.master')

@push('style')
    <style>
    </style>
    <script type="text/javascript"
        src="https://maps.googleapis.com/maps/api/js?language=en&key=AIzaSyA4zifrmt70Z_JhxVcl6OGeSmyPCt5hsoA"></script>
@endpush

@section('main')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Favorite Untuk {{ $tipe }} {{request()->get('n')}}</h1>
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
                                <th>Nama User</th>
                                <th>Nama Tempat {{ $tipe }}</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </section>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        generateData();

        function inittable(data) {
            $('#listing-data').DataTable({
                "responsive": true,
                "aaData": data,
                "dom": 'Bfrtip',
                buttons: [],
            });
        }

        function generateData() {
            var url = '{{ Request::url() }}';
            var id = url.substring(url.lastIndexOf('/') + 1)
            var _token = $('meta[name="csrf-token"]').attr('content');
            let arrayReturn = [];
            swal({
                title: "",
                text: "Loading...",
                icon: "{{ asset('img/icon/loading.gif') }}",
                buttons: false,
                closeOnClickOutside: false,
            });
            $.ajax({
                url: "/datafavorite",
                type: "POST",
                data: {
                    id: id,
                    tipe: '{{ $tipe }}',
                    _token: _token
                },
                success: function(data) {
                    
                    swal.close();
                    for (let i = 0, len = data.length; i < len; i++) {
                        let nama = data[i].user.name;
                        let tipe = "";
                        if(data[i].tipe == "wisata"){
                            tipe = data[i].wisata.nama;
                        }else {
                            tipe = data[i].restoran.nama;
                        }
                        let tanggal = data[i].tanggal;
                        arrayReturn.push([i + 1, nama, tipe, tanggal]);
                    }
                    inittable(arrayReturn);
                },
                error: function(request, status, error) {
                    swal("error", "Gagal Load", "error");
                }
            });
        }
    </script>
@endpush
