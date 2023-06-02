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
                    <h1 class="m-0">Data Restoran</h1>
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
                                <th>No HP</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </section>
        </div>
    </div>


    <div class="modal fade text-left" id="map-modal-personal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Lokasi Restoran
                </div>

                <div class="map-personal">
                    <div id="map-personal" style="width: 100%;height:500px"></div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="tambahRestoran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div style="max-width:600px;" class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div style="overflow-y: auto;" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Tambah Restoran</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="">
                        <label class="m-0 mt-1">Nama</label>
                        <input placeholder="Nama" class="form-control" id="nama" type="text" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Alamat</label>
                        <input placeholder="Alamat" class="form-control" id="alamat" type="text" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Nomor HP</label>
                        <input placeholder="Nomor HP" class="form-control" id="nomorhp" type="text" autocomplete="off"
                            required>
                        <label class="m-0 mt-1">Latitude dan Longitude</label>
                        <div class="input-group">
                            <input placeholder="latitude;longitude" disabled class="form-control" id="latlong"
                                type="text" autocomplete="off" required>
                            <span class="input-group-text" onclick="showMap()" style="cursor: pointer;">Pilih Di Map</span>
                        </div>
                        <label class="m-0 mt-1">Deskripsi</label>
                        <textarea placeholder="Deskripsi" class="form-control" id="deskripsi" autocomplete="off" required></textarea>
                        <label class="m-0 mt-1">Photo</label>
                        <input type="file" class="form-control" id="photo" accept="image/*capture=filesystem">
                        <label class="m-0 mt-1">Fasilitas</label>
                        <div id="fasilitas">
                        </div>
                        <button type="button" id="btn-add-restoran" class="btn btn-primary mt-2">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="editRestoran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div style="max-width:600px;" class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable"
            role="document">
            <div style="overflow-y: auto;" class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Edit Restoran</h4>
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
                        <label class="m-0 mt-1">Nomor HP</label>
                        <input placeholder="Nomor HP" class="form-control" id="nomorhpedit" type="text"
                            autocomplete="off" required>
                        <label class="m-0 mt-1">Alamat</label>
                        <input placeholder="Alamat" class="form-control" id="alamatedit" type="text"
                            autocomplete="off" required>
                        <label class="m-0 mt-1">Latitude dan Longitude</label>
                        <div class="input-group">
                            <input placeholder="latitude;longitude" disabled class="form-control" id="latlongedit"
                                type="text" autocomplete="off" required>
                            <span class="input-group-text" onclick="showMap()" style="cursor: pointer;">Pilih Di
                                Map</span>
                        </div>
                        <label class="m-0 mt-1">Deskripsi</label>
                        <textarea placeholder="Deskripsi" class="form-control" id="deskripsiedit" autocomplete="off" required></textarea>
                        <label class="m-0 mt-1">Photo</label>
                        <input type="file" class="form-control" id="photoedit" accept="image/*capture=filesystem">
                        <label class="m-0 mt-1">Fasilitas</label>
                        <div id="fasilitasedit">
                        </div>
                        <button type="button" id="btn-edit-restoran" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade text-left" id="map" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    Tambahkan Lokasi
                </div>

                <div class="map-input">
                    <div id="map-input" style="width: 100%;height:500px"></div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('script')
    <script type="text/javascript">
        datafasilitas();
        generateData();

        let tempChecks = "";

        function showMap() {
            $('#map').modal('toggle');
        }

        function showModalEditRestoran(id, nama, alamat, deskripsi, lat, lng, nomor_hp, fasilitas) {
            if (markerTemp != "") {
                removeMarker(markerTemp, markerIdTemp)
                markerTemp = ""
                markerIdTemp = ""
            }
            $('#editRestoran').modal('toggle');
            $("#fasilitasedit").html(tempChecks);
            $("#idedit").val(id);
            $("#namaedit").val(nama);
            $("#alamatedit").val(alamat);
            $("#deskripsiedit").val(deskripsi);
            $("#nomorhpedit").val(nomor_hp);
            $("#latlongedit").val(`${lat};${lng}`);
            var decoded = JSON.parse(decodeURI(fasilitas))
            console.log(decoded)
            for (var i = 0; i < decoded.length; i++) {
                $(`#fasilitasedit #${decoded[i]}`).prop("checked", true);
            }
        }

        function inittable(data) {
            $('#listing-data').DataTable({
                "responsive": true,
                "aaData": data,
                "dom": 'Bfrtip',
                buttons: [{
                        extend: 'excelHtml5',
                        text: '<span class="green"><img src="https://img.icons8.com/color/48/000000/ms-excel.png"/>Export</span>',
                        title: 'Data Restoran ' + getDateToday(),
                        download: 'open',
                        orientation: 'landscape',
                        exportOptions: {
                            columns: [0, 1, 2, 3]
                        }
                    },
                    {
                        text: '<i class="fas fa-plus-circle"></i> Tambah Restoran',
                        "className": "generate-code",
                        action: function(e, dt, node, config) {
                            $('#tambahRestoran').modal('toggle');
                            if (markerTemp != "") {
                                removeMarker(markerTemp, markerIdTemp)
                                markerTemp = ""
                                markerIdTemp = ""
                            }
                        }
                    }
                ],
            });
        }

        $('#btn-add-restoran').click(function(e) {
            e.preventDefault();
            let nama = $('#nama').val().trim();
            let latlong = $('#latlong').val().trim();
            let deskripsi = $('#deskripsi').val().trim();
            let alamat = $('#alamat').val().trim();
            let no_hp = $('#nomorhp').val().trim();
            var fasilitas = $('#fasilitas input[name=fasilitas]:checked').map(function() {
                return this.value;
            }).get();
            let photo = $("#photo");
            let _token = $('meta[name="csrf-token"]').attr('content');
            if (nama == "") {
                swal("error", "Nama Tidak Boleh Kosong", "error")
            } else if (alamat == "") {
                swal("error", "Alamat Tidak Boleh Kosong", "error")
            } else if (latlong == "") {
                swal("error", "Pilih Lokasi", "error")
            } else if (no_hp == "") {
                swal("error", "Nomor HP Tidak Boleh Kosong", "error")
            } else if (deskripsi == "") {
                swal("error", "Deskripsi tidak Boleh Kosong", "error")
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
                myFormData.append('latlong', latlong);
                myFormData.append('deskripsi', deskripsi);
                myFormData.append('alamat', alamat);
                myFormData.append('no_hp', no_hp);
                myFormData.append('fasilitas', JSON.stringify(fasilitas));
                myFormData.append('gambar', photo.prop("files")[0]);
                myFormData.append('_token', _token);
                $.ajax({
                    url: "{{ url('addrestoran') }}",
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

        $('#btn-edit-restoran').click(function(e) {
            e.preventDefault();
            let id = $('#idedit').val().trim();
            let nama = $('#namaedit').val().trim();
            let latlong = $('#latlongedit').val().trim();
            let deskripsi = $('#deskripsiedit').val().trim();
            let alamat = $('#alamatedit').val().trim();
            let no_hp = $('#nomorhpedit').val().trim();
            var fasilitas = $('#fasilitasedit input[name=fasilitas]:checked').map(function() {
                return this.value;
            }).get();
            let photo = $("#photoedit");
            let _token = $('meta[name="csrf-token"]').attr('content');
            if (nama == "") {
                swal("error", "Nama Tidak Boleh Kosong", "error")
            } else if (alamat == "") {
                swal("error", "Alamat Tidak Boleh Kosong", "error")
            } else if (latlong == "") {
                swal("error", "Pilih Lokasi", "error")
            } else if (no_hp == "") {
                swal("error", "Nomor HP Tidak Boleh Kosong", "error")
            } else if (deskripsi == "") {
                swal("error", "Deskripsi tidak Boleh Kosong", "error")
            } else {
                swal({
                    title: "",
                    text: "Loading...",
                    icon: "{{ asset('img/icon/loading.gif') }}",
                    buttons: false,
                    closeOnClickOutside: false,
                });

                let myFormData = new FormData();

                myFormData.append('id', id);
                myFormData.append('nama', nama)
                myFormData.append('latlong', latlong);
                myFormData.append('deskripsi', deskripsi);
                myFormData.append('alamat', alamat);
                myFormData.append('no_hp', no_hp);
                myFormData.append('fasilitas', JSON.stringify(fasilitas));
                if (photo.get(0).files.length > 0) {
                    console.log("upload");
                    myFormData.append('gambar', photo.prop("files")[0]);
                }
                myFormData.append('_token', _token);
                $.ajax({
                    url: "{{ url('editrestoran') }}",
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

        function deleteRestoran(id) {
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
                            url: "{{ url('deleterestoran') }}",
                            type: "POST",
                            data: {
                                id: id,
                                _token: _token,
                            },
                            success: function(response) {
                                if (response) {
                                    swal("", "Hapus Restoran Berhasil", "success").then(function() {
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
                url: "/datarestoran",
                type: "POST",
                data: {
                    _token: _token
                },
                success: function(data) {
                    swal.close();
                    for (let i = 0, len = data.length; i < len; i++) {
                        let id = data[i].id;
                        let nama = data[i].nama;
                        let nomorhp = data[i].no_hp;
                        let alamat = data[i].alamat;
                        let deskripsi = data[i].deskripsi;
                        let image = data[i].image;
                        let lat = data[i].lat;
                        let lng = data[i].lng;
                        let fasilitas = encodeURI(data[i].fasilitas)
                        let btnAksi = "";
                        btnAksi =
                            `<a title='detail' href='/detailrestoran/${id}' class='btn-aksi btn btn-sm btn-secondary'>Detail</a> 
                        <a title='accept' onclick="showModalEditRestoran('${id}', '${nama}', '${alamat}', '${deskripsi}', '${lat}', '${lng}', '${nomorhp}', '${fasilitas}')" class='btn-aksi btn btn-sm btn-success'>Edit</a>
                        <a title='delete' onclick="deleteRestoran('${id}')" class='btn-aksi btn btn-sm btn-danger'>Hapus</a>
                        <a title='delete' onclick="showLocation('${nama}', '${lat}', '${lng}')" class='btn-aksi btn btn-sm btn-primary'>Map</a>
                        <a title='delete' href='/favorite/${id}?t=Restoran&n=${nama}' class='btn-aksi btn btn-sm btn-warning'>Favorite</a>
                        <a title='delete' href='/komentar/${id}?t=Restoran&n=${nama}' class='btn-aksi btn btn-sm btn-info'>Komentar</a>`;
                        arrayReturn.push([i + 1, nama, nomorhp, alamat, btnAksi]);
                    }
                    inittable(arrayReturn);
                },
                error: function(request, status, error) {
                    swal("error", "Gagal Load", "error");
                }
            });
        }

        function datafasilitas() {
            let _token = $('meta[name="csrf-token"]').attr('content');
            let arrayReturn = [];
            $.ajax({
                url: "/datafasilitas",
                type: "POST",
                data: {
                    _token: _token
                },
                success: function(data) {
                    $("#fasilitas").html("");
                    var checks = "";
                    for (let i = 0, len = data.length; i < len; i++) {
                        let id = data[i].id;
                        let nama = data[i].nama;
                        if (nama != "Restoran") {
                            checks +=
                                `<div class="form-check"><input id="${id}" class="form-check-input" type="checkbox" value="${id}" name="fasilitas"><label class="form-check-label" for="${nama}">${nama}</label></div>`;
                        }
                    }
                    tempChecks = checks
                    $("#fasilitas").html(checks);
                },
                error: function(request, status, error) {
                    console.log(error);
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

    <script>
        var infowindow;
        var map;
        var markerTemp = "";
        var markerIdTemp = "";
        var red_icon = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
        var purple_icon = 'http://maps.google.com/mapfiles/ms/icons/purple-dot.png';
        var myOptions = {
            zoom: 14,
            center: new google.maps.LatLng(-7.787888191808789, 110.9457601530237),
            mapTypeId: 'roadmap'
        };
        map = new google.maps.Map(document.getElementById('map-input'), myOptions);
        var markers = {};
        var getMarkerUniqueId = function(lat, lng) {
            return lat + ';' + lng;
        };
        var getLatLng = function(lat, lng) {
            return new google.maps.LatLng(lat, lng);
        };

        var addMarker = google.maps.event.addListener(map, 'click', function(e) {
            var lat = e.latLng.lat();
            var lng = e.latLng.lng();
            var markerId = getMarkerUniqueId(lat, lng);
            var marker = new google.maps.Marker({
                position: getLatLng(lat, lng),
                map: map,
                animation: google.maps.Animation.DROP,
                id: 'marker_' + markerId,
                html: "    <div style='width:150px' id='info_" + markerId + "'>\n" +
                    "      <h5>Simpan Lokasi?</h5>" +
                    "       <div class='row'>" +
                    "       <div class='col-md-5'>" +
                    `      <button onclick='saveCurrentMarker(${lat}, ${lng})' class='btn btn-success mr-3'>Ya</button>` +
                    "       </div>" +
                    "       <div class='col-md-5'>" +
                    `      <button onclick='removeCurrentMarker()' class='btn btn-danger ml-3'>Tidak</button>` +
                    "       </div>" +
                    "       </div>" +
                    "    </div>"
            });
            markers[markerId] = marker;
            if (markerTemp != "") {
                removeMarker(markerTemp, markerIdTemp);
            }
            markerTemp = marker;
            markerIdTemp = getMarkerUniqueId(lat, lng);
            bindMarkerEvents(marker);
            bindMarkerinfo(marker);
            infowindow = new google.maps.InfoWindow();
            infowindow.setContent(marker.html);
            infowindow.open(map, marker);
        });

        var bindMarkerinfo = function(marker) {
            google.maps.event.addListener(marker, "click", function(point) {
                var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng
                    .lng()); // get marker id by using clicked point's coordinate
                var marker = markers[markerId];
                infowindow = new google.maps.InfoWindow();
                infowindow.setContent(marker.html);
                infowindow.open(map, marker);
                console.log(infowindow.open);
                // removeMarker(marker, markerId); // remove it
            });
        };
        var bindMarkerEvents = function(marker) {
            google.maps.event.addListener(marker, "rightclick", function(point) {
                var markerId = getMarkerUniqueId(point.latLng.lat(), point.latLng
                    .lng()); // get marker id by using clicked point's coordinate
                var marker = markers[markerId]; // find marker
                removeMarker(marker, markerId); // remove it
            });
        };
        var removeMarker = function(marker, markerId) {
            marker.setMap(null); // set markers setMap to null to remove it from map
            delete markers[markerId]; // delete marker instance from markers object
        };

        function removeCurrentMarker() {
            removeMarker(markerTemp, markerIdTemp);
            if ($('#editRestoran').is(':visible')) {
                $("#latlongedit").val("");
            } else {
                $("#latlong").val("");
            }
        }

        function saveCurrentMarker(lat, long) {
            // Exit Full Screen Mode
            if (document.fullscreenElement) {
                document.exitFullscreen();
            } else if (document.mozFullScreenElement) {
                document.mozCancelFullScreen();
            } else if (document.webkitFullscreenElement) {
                document.webkitExitFullscreen();
            } else if (document.msFullscreenElement) {
                document.msExitFullscreen();
            }
            $('#map').modal('hide');
            set(lat, long);
            if ($('#editRestoran').is(':visible')) {
                $("#latlongedit").val(`${lat};${long}`);
            } else {
                $("#latlong").val(`${lat};${long}`);
            }
        }

        function showLocation(nama, lat, lng) {
            var myOptionsUser = {
                zoom: 14,
                center: new google.maps.LatLng(lat, lng),
                mapTypeId: 'roadmap'
            };

            mapPersonal = new google.maps.Map(document.getElementById('map-personal'), myOptionsUser);
            $('#map-modal-personal').modal('show');
            marker = new google.maps.Marker({
                position: new google.maps.LatLng(lat, lng),
                map: mapPersonal,
                icon: red_icon,
                html: "    <div>\n" +
                    ` <p>${nama}</p>` +
                    "    </div>"
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
                return function() {
                    infowindow = new google.maps.InfoWindow();
                    infowindow.setContent(marker.html);
                    infowindow.open(map, marker);
                }
            })(marker, i));
        }

        function set(lat, long) {
            var markerId = getMarkerUniqueId(lat, long);
            var manual_marker = markers[markerId];
            manual_marker.setIcon(red_icon);
            infowindow.close();
            infowindow.setContent("<div style=' color: purple; font-size: 25px;'> lokasi Sudah Tersimpan!!</div>");
            infowindow.open(map, manual_marker);
        }
    </script>
@endpush
