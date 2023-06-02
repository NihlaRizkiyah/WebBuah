@extends("layouts.master")

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
            <h1 class="m-0">Dashboard</h1>
        </div>
        </div>
    </div>
    </div>

    <div class="container-fluid p-3">
        <div class="main-content">
            <section class="content">
                <div class="container-fluid">
                  <!-- Small boxes (Stat box) -->
                  <div class="row">
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-info">
                        <div class="inner">
                          <h3 id="cManager">3</h3>
                          <p>Barang</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-utensils"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="height:30px"></a>
                      </div>
                    </div>
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-danger">
                        <div class="inner">
                          <h3 id="cWakil">0</h3>
                          <p>Pesanan</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-location-arrow"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="height:30px"></a>
                      </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                      <!-- small box -->
                      <div class="small-box bg-warning">
                        <div class="inner">
                          <h3 id="cUser">{{$user}}</h3>
                          <p>User</p>
                        </div>
                        <div class="icon">
                          <i class="fas fa-users"></i>
                        </div>
                        <a href="#" class="small-box-footer" style="height:30px"></a>
                      </div>
                    </div>
                    <!-- ./col -->
                  </div>
                </div>
              </section>
        </div>
    </div>

@endsection

@push('script') 

@endpush