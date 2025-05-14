@extends('index')
@section('title')
    Dashboard
@endsection
@section('main')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="page-header">
            <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white me-2">
                    <i class="mdi mdi-home"></i>
                </span> Dashboard
            </h3>
            
        </div>
        <div class="row">
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card card-img-holder text-white">
                    <div class="card-body">
                        <img src="https://erp-client.cinte.id/web/image/3161-96778f70/2002DUKUNG%20PERKEMABANGAN%20USAHA%20BUMMAS%2C%20RUMAH%20ZAKAT%20HADIR%20MENYALURKAN%20BANTUAN%20MODAL%20USAHA.jpeg?access_token=688ad6f2-5064-4ca3-af88-d1f4bf2d9057" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Pendapatan Hari ini <i class="mdi mdi-chart-line mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">$ 15,0000</h2>
                        <h6 class="card-text">Increased by 60%</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card card-img-holder text-white">
                    <div class="card-body">
                        <img src="assets/images/bantuan.jpg" class="card-img-absolute " alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Pendapatan Minggu Ini <i class="mdi mdi-bookmark-outline mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">45,6334</h2>
                        <h6 class="card-text">Decreased by 10%</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-4 stretch-card grid-margin">
                <div class="card card-img-holder text-white">
                    <div class="card-body">
                        <img src="https://erp-client.cinte.id/web/image/3159-e09a02b2/2002PROGRAM%20RUMAH%20LITERASI%20TERUS%20KEMBANGKAN%20MINAT%20DAN%20BAKAT%20ANAK-ANAK%20DI%20DESA%20BERDAYA.jpg?access_token=5d3694e9-17ae-42e3-8955-eed7ab8ef5ce" class="card-img-absolute" alt="circle-image" />
                        <h4 class="font-weight-normal mb-3">Jumlah Pengunjung Hari Ini <i class="mdi mdi-diamond mdi-24px float-right"></i>
                        </h4>
                        <h2 class="mb-5">95,5741</h2>
                        <h6 class="card-text">Increased by 5%</h6>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
    <!-- content-wrapper ends -->
    <!-- partial:partials/_footer.html -->
    <!-- partial -->
</div>
@endsection


